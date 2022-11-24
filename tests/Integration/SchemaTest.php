<?php declare(strict_types=1);

namespace LinkORB\Authzed\Tests\Integration;

use LinkORB\Authzed\Dto\Request\Schema as SchemaRequest;
use LinkORB\Authzed\Dto\Response\Schema as SchemaResponse;
use LinkORB\Authzed\SpiceDB;
use PHPUnit\Framework\TestCase;

class SchemaTest extends TestCase
{
    use SpicedbClientAwareTrait;

    private ?SpiceDB $client;

    public function setUp(): void
    {
        $this->client = $this->getClient();
    }

    public function testReadWriteSchema(): void
    {
        $schema = $this->getSchema();

        $this->client->writeSchema(new SchemaRequest($schema));

        $schemaResponse = $this->client->readSchema();

        $this->assertInstanceOf(SchemaResponse::class, $schemaResponse);
        $this->assertEquals(
            str_replace(' ', '', $schema),
            str_replace([' ', "\t"], '', $schemaResponse->getSchemaText())
        );
    }
}
