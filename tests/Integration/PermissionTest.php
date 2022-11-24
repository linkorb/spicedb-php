<?php declare(strict_types=1);

namespace LinkORB\Authzed\Tests\Integration;

use LinkORB\Authzed\Dto\Consistency;
use LinkORB\Authzed\Dto\ObjectReference;
use LinkORB\Authzed\Dto\PermissionUpdate;
use LinkORB\Authzed\Dto\Relationship;
use LinkORB\Authzed\Dto\RelationshipUpdate;
use LinkORB\Authzed\Dto\Request\PermissionCheck as PermissionCheckRequest;
use LinkORB\Authzed\Dto\Request\RelationshipWrite as RelationshipWriteRequest;
use LinkORB\Authzed\Dto\Request\Schema as SchemaRequest;
use LinkORB\Authzed\Dto\SubjectReference;
use LinkORB\Authzed\SpiceDB;
use PHPUnit\Framework\TestCase;

class PermissionTest extends TestCase
{
    use SpicedbClientAwareTrait;

    private ?SpiceDB $client;

    public function setUp(): void
    {
        $this->client = $this->getClient();
    }

    public function testPermissionCheck()
    {
        $this->client->writeSchema(new SchemaRequest($this->getSchema()));

        $checkRequestNoPermission = new PermissionCheckRequest(
            null,
            new ObjectReference('blog/post', 'mypost'),
            'writer',
            new SubjectReference(new ObjectReference('blog/user', 'john'))
        );

        $checkResponseNoPermission = $this->client->checkPermission($checkRequestNoPermission);
        $this->assertEquals(
            PermissionUpdate::PERMISSIONSHIP_NO_PERMISSION,
            $checkResponseNoPermission->getPermissionship()
        );

        $writeRequest = new RelationshipWriteRequest([
            new RelationshipUpdate(
                RelationshipUpdate::OPERATION_CREATE,
                new Relationship(
                    new ObjectReference('blog/post', 'mypost'),
                    'writer',
                    new SubjectReference(new ObjectReference('blog/user', 'john'))
                )
            )
        ]);
        $writeResponse = $this->client->writeRelationship($writeRequest);
        $this->assertNotNull($writeResponse->getWrittenAt());

        $checkRequestPermission = new PermissionCheckRequest(
            new Consistency(null, $writeResponse->getWrittenAt(), null),
            new ObjectReference('blog/post', 'mypost'),
            'writer',
            new SubjectReference(new ObjectReference('blog/user', 'john'))
        );
        $this->assertEquals(
            PermissionUpdate::PERMISSIONSHIP_HAS_PERMISSION,
            $this->client->checkPermission($checkRequestPermission)->getPermissionship()
        );
    }
}
