<?php declare(strict_types=1);

namespace LinkORB\Authzed;

use Generator;
use LinkORB\Authzed\Dto\Request\LookupResource as LookupResourceRequest;
use LinkORB\Authzed\Dto\Request\PermissionCheck as PermissionCheckRequest;
use LinkORB\Authzed\Dto\Request\PermissionExpand as PermissionExpandRequest;
use LinkORB\Authzed\Dto\Request\RelationshipDeletion as RelationshipDeletionRequest;
use LinkORB\Authzed\Dto\Request\RelationshipRead as RelationshipReadRequest;
use LinkORB\Authzed\Dto\Request\RelationshipWrite as RelationshipWriteRequest;
use LinkORB\Authzed\Dto\Request\Schema as SchemaRequest;
use LinkORB\Authzed\Dto\Request\Watch as WatchRequest;
use LinkORB\Authzed\Dto\Response\Error;
use LinkORB\Authzed\Dto\Response\LookupResource as LookupResourceResponse;
use LinkORB\Authzed\Dto\Response\PermissionCheck as PermissionCheckResponse;
use LinkORB\Authzed\Dto\Response\PermissionExpand as PermissionExpandResponse;
use LinkORB\Authzed\Dto\Response\RelationshipDeletion as RelationshipDeletionResponse;
use LinkORB\Authzed\Dto\Response\RelationshipRead as RelationshipReadResponse;
use LinkORB\Authzed\Dto\Response\RelationshipReadResponse as RelationshipReadResponseResult;
use LinkORB\Authzed\Dto\Response\RelationshipWrite as RelationshipWriteResponse;
use LinkORB\Authzed\Dto\Response\Schema as SchemaResponse;
use LinkORB\Authzed\Dto\Response\Watch as WatchResponse;
use LinkORB\Authzed\Dto\Response\WatchResponse as WatchResponseResult;
use LinkORB\Authzed\Exception\SpiceDBServerException;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Component\HttpClient\Exception\TimeoutException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class SpiceDB implements ConnectorInterface
{
    private SerializerInterface $serializer;
    private HttpClientInterface $httpClient;

    public function __construct(
        SerializerInterface $serializer,
        HttpClientInterface $httpClient,
        string $baseUri,
        string $apiKey
    ) {
        $this->serializer = $serializer;
        $this->httpClient = $httpClient->withOptions(
            [
                'base_uri' => $baseUri,
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $apiKey,
                ],
                'http_version' => '2.0',
            ]
        );
    }

    public function readSchema(): SchemaResponse
    {
        $response = $this->httpClient->request(
            'POST',
            '/v1/schema/read',
            [
                'body' => '{}',
            ]
        );

        $this->assertSuccessful($response);

        return $this->serializer->deserialize($response->getContent(), SchemaResponse::class, 'json');
    }

    public function writeSchema(SchemaRequest $request): void
    {
        $this->assertSuccessful(
            $this->httpClient->request(
                'POST',
                '/v1/schema/write',
                [
                    'body' => $this->serializer->serialize($request, 'json'),
                ]
            )
        );
    }

    public function checkPermission(PermissionCheckRequest $request): PermissionCheckResponse
    {
        $response = $this->httpClient->request(
            'POST',
            '/v1/permissions/check',
            [
                'body' => $this->serializer->serialize($request, 'json'),
            ]
        );

        $this->assertSuccessful($response);

        return $this->serializer->deserialize($response->getContent(), PermissionCheckResponse::class, 'json');
    }

    public function writeRelationship(RelationshipWriteRequest $request): RelationshipWriteResponse
    {
        $response = $this->httpClient->request(
            'POST',
            '/v1/relationships/write',
            [
                'body' => $this->serializer->serialize($request, 'json'),
            ]
        );

        $this->assertSuccessful($response);

        return $this->serializer->deserialize($response->getContent(), RelationshipWriteResponse::class, 'json');
    }

    public function readRelationship(RelationshipReadRequest $request): RelationshipReadResponse
    {
        $response = $this->httpClient->request(
            'POST',
            '/v1/relationships/read',
            [
                'body' => $this->serializer->serialize($request, 'json'),
            ]
        );

        $this->assertSuccessful($response);

        if ($response->getContent() === '') {
            return new RelationshipReadResponse(new RelationshipReadResponseResult());
        }

        return $this->serializer->deserialize($response->getContent(), RelationshipReadResponse::class, 'json');
    }

    public function deleteRelationship(RelationshipDeletionRequest $request): RelationshipDeletionResponse
    {
        $response = $this->httpClient->request(
            'POST',
            '/v1/relationships/delete',
            [
                'body' => $this->serializer->serialize($request, 'json'),
            ]
        );

        $this->assertSuccessful($response);

        return $this->serializer->deserialize($response->getContent(), RelationshipDeletionResponse::class, 'json');
    }

    public function expandPermission(PermissionExpandRequest $request): PermissionExpandResponse
    {
        $response = $this->httpClient->request(
            'POST',
            '/v1/permissions/expand',
            [
                'body' => $this->serializer->serialize($request, 'json'),
            ]
        );

        $this->assertSuccessful($response);

        return $this->serializer->deserialize($response->getContent(), PermissionExpandResponse::class, 'json');
    }

    public function showResourcesPermission(LookupResourceRequest $request): LookupResourceResponse
    {
        $response = $this->httpClient->request(
            'POST',
            '/v1/permissions/resources',
            [
                'body' => $this->serializer->serialize($request, 'json'),
            ]
        );

        $this->assertSuccessful($response);

        return $this->serializer->deserialize($response->getContent(), LookupResourceResponse::class, 'json');
    }

    public function watch(WatchRequest $request, float $abortIdleTimeout): Generator
    {
        $response = $this->httpClient->request(
            'POST',
            '/v1/watch',
            [
                'body' => $this->serializer->serialize($request, 'json'),
            ]
        );

        try {
            foreach ($this->httpClient->stream($response, $abortIdleTimeout) as $chunk) {
                if (empty($chunk->getContent())) {
                    $reply = new WatchResponse(new WatchResponseResult());
                } else {
                    $reply = $this->serializer->deserialize($chunk->getContent(), WatchResponse::class, 'json');
                }

                yield $reply;
            }
        } catch (TimeoutException $e) {
            // We reached abort timeout here, so can exit safely
        } catch (ClientException $e) {
            /** @var WatchResponse $reply */
            $reply = $this->serializer->deserialize($e->getResponse()->getContent(false), WatchResponse::class, 'json');
            throw new SpiceDBServerException($reply->getError());
        }
    }

    private function assertSuccessful(ResponseInterface $response): void
    {
        if ($response->getStatusCode() >= 400) {
            throw new SpiceDBServerException(
                $this->serializer->deserialize($response->getContent(false), Error::class, 'json')
            );
        }
    }
}
