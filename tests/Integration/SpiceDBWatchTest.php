<?php declare(strict_types=1);

namespace Integration;

use LinkORB\Authzed\Dto\Request\Watch as WatchRequest;
use LinkORB\Authzed\Dto\Response\Watch as WatchResponse;
use LinkORB\Authzed\Dto\Response\WatchResponse as WatchResponseResult;
use LinkORB\Authzed\Exception\SpiceDBServerException;
use LinkORB\Authzed\Serializer\JsonLinesDecoder;
use LinkORB\Authzed\SpiceDB;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Component\HttpClient\Exception\TimeoutException;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\HttpClient\Response\ResponseStream;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\ChunkInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\ResponseStreamInterface;

class SpiceDBWatchTest extends TestCase
{
    public function testWatchYieldsEmptyResultWhenChunkHasNoContent(): void
    {
        $chunk = $this->createMock(ChunkInterface::class);
        $chunk->method('getContent')->willReturn('');

        $replies = iterator_to_array($this->spiceDb([$chunk])->watch(new WatchRequest(['blog/post']), 0.2));

        $this->assertCount(1, $replies);
        $reply = $replies[0];
        $this->assertInstanceOf(WatchResponse::class, $reply);
        $this->assertNull($reply->getError());
        $this->assertInstanceOf(WatchResponseResult::class, $reply->getResult());
        $this->assertEquals([], $reply->getResult()->getUpdates());
        $this->assertNull($reply->getResult()->getChangesThrough());
    }

    public function testWatchDeserializesChunkContent(): void
    {
        $chunk = $this->createMock(ChunkInterface::class);
        $chunk->method('getContent')->willReturn('{"result":{"updates":[],"changesThrough":{"token":"zed-1"}}}');

        $replies = iterator_to_array($this->spiceDb([$chunk])->watch(new WatchRequest(['blog/post']), 0.2));

        $this->assertCount(1, $replies);
        $reply = $replies[0];
        $this->assertNull($reply->getError());
        $this->assertEquals([], $reply->getResult()->getUpdates());
        $this->assertEquals('zed-1', $reply->getResult()->getChangesThrough()->getToken());
    }

    public function testWatchStopsWhenStreamTimesOut(): void
    {
        $chunk = $this->createMock(ChunkInterface::class);
        $chunk->method('getContent')->willThrowException(new TimeoutException('Idle timeout reached'));

        $replies = iterator_to_array($this->spiceDb([$chunk])->watch(new WatchRequest(['blog/post']), 0.2));

        $this->assertEquals([], $replies);
    }

    public function testWatchError(): void
    {
        $body = '{"error":{"code":3,"message":"value does not match regex pattern"}}';
        $errorResponse = $this->createMock(ResponseInterface::class);
        $errorResponse->method('getInfo')->willReturnCallback(static function (?string $type = null) {
            if ('http_code' === $type) {
                return 400;
            }
            if ('url' === $type) {
                return 'http://spicedb:8443/v1/watch';
            }
            if ('response_headers' === $type) {
                return ['HTTP/1.1 400 Bad Request'];
            }

            return null;
        });
        $errorResponse->method('getContent')->willReturn($body);

        $chunk = $this->createMock(ChunkInterface::class);
        $chunk->method('getContent')->willThrowException(new ClientException($errorResponse));

        $this->expectException(SpiceDBServerException::class);

        try {
            iterator_to_array($this->spiceDb([$chunk])->watch(new WatchRequest(['not-found-error']), 0.1));
        } catch (SpiceDBServerException $e) {
            $this->assertEquals(3, $e->getError()->getCode());
            $this->assertTrue(false !== strpos($e->getError()->getMessage(), 'value does not match regex pattern'));

            throw $e;
        }
    }

    private function spiceDb(array $chunks): SpiceDB
    {
        return new SpiceDB(
            new Serializer(
                [new ArrayDenormalizer(), new UnwrappingDenormalizer(), new ObjectNormalizer(null, null, null, new ReflectionExtractor())],
                [new JsonEncoder(), new JsonLinesDecoder()]
            ),
            new SpiceDBWatchHttpClient($chunks),
            'http://spicedb:8443',
            'somerandomkeyhere'
        );
    }
}

class SpiceDBWatchHttpClient extends MockHttpClient
{
    private $chunks;

    public function __construct(array $chunks)
    {
        parent::__construct(new MockResponse(''));
        $this->chunks = $chunks;
    }

    public function stream($responses, ?float $timeout = null): ResponseStreamInterface
    {
        $key = $responses instanceof ResponseInterface ? $responses : null;
        $chunks = $this->chunks;

        return new ResponseStream((static function () use ($chunks, $key) {
            foreach ($chunks as $chunk) {
                yield $key => $chunk;
            }
        })());
    }
}
