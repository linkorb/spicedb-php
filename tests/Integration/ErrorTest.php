<?php declare(strict_types=1);

namespace Integration;

use LinkORB\Authzed\Dto\Consistency;
use LinkORB\Authzed\Dto\ObjectReference;
use LinkORB\Authzed\Dto\Request\PermissionCheck as PermissionCheckRequest;
use LinkORB\Authzed\Dto\Request\Schema as SchemaRequest;
use LinkORB\Authzed\Dto\Request\Watch as WatchRequest;
use LinkORB\Authzed\Dto\SubjectReference;
use LinkORB\Authzed\Exception\SpiceDBServerException;
use LinkORB\Authzed\SpiceDB;
use LinkORB\Authzed\Tests\Integration\SpicedbClientAwareTrait;
use PHPUnit\Framework\TestCase;

class ErrorTest extends TestCase
{
    use SpicedbClientAwareTrait;

    private ?SpiceDB $client;

    public function setUp(): void
    {
        $this->client = $this->getClient();
    }

    public function testPermissionError(): void
    {
        $this->client->writeSchema(new SchemaRequest($this->getSchema()));

        $checkRequestPermission = new PermissionCheckRequest(
            new Consistency(null, null, null, true),
            new ObjectReference('blog/post', 'mypost'),
            'writer',
            new SubjectReference(new ObjectReference('not-exist', 'john'))
        );

        $this->expectException(SpiceDBServerException::class);

        try {
            $this->client->checkPermission($checkRequestPermission)->getPermissionship();
        } catch (SpiceDBServerException $e) {
            $this->assertEquals(3, $e->getError()->getCode());
            $this->assertTrue(false !== strpos($e->getError()->getMessage(), 'failed validation'));

            throw $e;
        }
    }

    public function testInvalidSchemaError(): void
    {
        $this->expectException(SpiceDBServerException::class);

        try {
            $this->client->writeSchema(
                new SchemaRequest('definition blog/post {
       relation reader: blog/user
       relation writer: blog/user
       permis read = reader + writer
       sion write = writer
}

definition blog/user {}')
            );
        } catch (SpiceDBServerException $e) {
            $this->assertEquals(3, $e->getError()->getCode());
            $this->assertTrue(false !== strpos($e->getError()->getMessage(), 'parse error in `schema`'));

            throw $e;
        }
    }
}
