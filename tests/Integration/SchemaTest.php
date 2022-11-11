<?php declare(strict_types=1);

namespace Integration;

use LinkORB\Authzed\Dto\Request\Schema as SchemaRequest;
use LinkORB\Authzed\Dto\Response\Schema as SchemaResponse;
use LinkORB\Authzed\SpiceDB;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SchemaTest extends TestCase
{
    private ?SpiceDB $client;

    public function setUp(): void
    {
        $this->client = new SpiceDB(
            new Serializer([new ObjectNormalizer()], [new JsonEncoder()]),
            HttpClient::create(),
            getenv('SPICEDB_HOST'),
            getenv('SPICEDB_API_KEY')
        );
    }

    public function testReadWriteSchema(): void
    {
        $schema = 'definition blog/post {
       relation reader: blog/user
       relation writer: blog/user
       permission read = reader + writer
       permission write = writer
}

definition blog/user {}';

        $this->client->writeSchema(new SchemaRequest($schema));

        $schemaResponse = $this->client->readSchema();

        $this->assertInstanceOf(SchemaResponse::class, $schemaResponse);
        $this->assertEquals(
            str_replace(' ', '', $schema),
            str_replace([' ', "\t"], '', $schemaResponse->getSchemaText())
        );
    }
}
