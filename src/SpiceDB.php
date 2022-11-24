<?php declare(strict_types=1);

namespace LinkORB\Authzed;

use LinkORB\Authzed\Dto\Request\PermissionCheck as PermissionCheckRequest;
use LinkORB\Authzed\Dto\Request\RelationshipWrite as RelationshipWriteRequest;
use LinkORB\Authzed\Dto\Request\Schema as SchemaRequest;
use LinkORB\Authzed\Dto\Response\Error;
use LinkORB\Authzed\Dto\Response\PermissionCheck as PermissionCheckResponse;
use LinkORB\Authzed\Dto\Response\RelationshipWrite as RelationshipWriteResponse;
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

    private function assertSuccessful(ResponseInterface $response): void
    {
        if ($response->getStatusCode() >= 400) {
            throw new SpiceDBServerException(
                $this->serializer->deserialize($response->getContent(false), Error::class, 'json')
            );
        }
    }
}
