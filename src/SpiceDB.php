<?php declare(strict_types=1);

namespace LinkORB\Authzed;

use LinkORB\Authzed\Dto\Request\Schema as SchemaRequest;
use LinkORB\Authzed\Dto\Response\Error;
use LinkORB\Authzed\Dto\Response\Schema as SchemaResponse;
use LinkORB\Authzed\Exception\SpiceDBServerException;
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
        $data = $this->serializer->serialize($request, 'json');
        $response = $this->httpClient->request(
            'POST',
            '/v1/schema/write',
            [
                'body' => $data,
            ]
        );

        $this->assertSuccessful($response);
    }

    private function assertSuccessful(ResponseInterface $response): void
    {
        if ($response->getStatusCode() >= 400) {
            throw new SpiceDBServerException(
                $this->serializer->deserialize($response->getContent(), Error::class, 'json')
            );
        }
    }
}
