<?php declare(strict_types=1);

namespace LinkORB\Authzed\Tests\Integration;

use LinkORB\Authzed\Dto\Consistency;
use LinkORB\Authzed\Dto\ObjectReference;
use LinkORB\Authzed\Dto\PermissionUpdate;
use LinkORB\Authzed\Dto\Relationship;
use LinkORB\Authzed\Dto\RelationshipFilter;
use LinkORB\Authzed\Dto\RelationshipUpdate;
use LinkORB\Authzed\Dto\Request\LookupResource as LookupResourceRequest;
use LinkORB\Authzed\Dto\Request\LookupSubject as LookupSubjectRequest;
use LinkORB\Authzed\Dto\Request\PermissionCheck as PermissionCheckRequest;
use LinkORB\Authzed\Dto\Request\PermissionExpand as PermissionExpandRequest;
use LinkORB\Authzed\Dto\Request\RelationshipDeletion as RelationshipDeletionRequest;
use LinkORB\Authzed\Dto\Request\RelationshipRead as RelationshipReadRequest;
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

    public function testPermissionCheck(): void
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

        $deleteRequest = new RelationshipWriteRequest([
            new RelationshipUpdate(
                RelationshipUpdate::OPERATION_DELETE,
                new Relationship(
                    new ObjectReference('blog/post', 'mypost'),
                    'writer',
                    new SubjectReference(new ObjectReference('blog/user', 'john'))
                )
            )
        ]);
        $deleteResponse = $this->client->writeRelationship($deleteRequest);
        $this->assertNotNull($deleteResponse->getWrittenAt());
    }

    public function testRelationshipRead(): void
    {
        $this->client->writeSchema(new SchemaRequest($this->getSchema()));

        $relationship = new Relationship(
            new ObjectReference('blog/post', 'mypost'),
            'writer',
            new SubjectReference(new ObjectReference('blog/user', 'john'))
        );

        $writeRequest = new RelationshipWriteRequest([
            new RelationshipUpdate(RelationshipUpdate::OPERATION_CREATE, $relationship)
        ]);
        $writeResponse = $this->client->writeRelationship($writeRequest);
        $this->assertNotNull($writeResponse->getWrittenAt());

        $readRequest = new RelationshipReadRequest(
            new Consistency(null, $writeResponse->getWrittenAt(), null),
            new RelationshipFilter('blog/post')
        );
        $readResponse = $this->client->readRelationship($readRequest);
        $this->assertEquals($relationship, $readResponse[0]->getResult()->getRelationship());

        $deleteRequest = new RelationshipWriteRequest([
            new RelationshipUpdate(RelationshipUpdate::OPERATION_DELETE, $relationship)
        ]);
        $deleteResponse = $this->client->writeRelationship($deleteRequest);
        $this->assertNotNull($deleteResponse->getWrittenAt());
    }

    public function testRelationshipDelete(): void
    {
        $this->client->writeSchema(new SchemaRequest($this->getSchema()));

        $writeRequest = new RelationshipWriteRequest([
            new RelationshipUpdate(
                RelationshipUpdate::OPERATION_CREATE,
                new Relationship(
                    new ObjectReference('blog/post', 'mypost-to-delete'),
                    'writer',
                    new SubjectReference(new ObjectReference('blog/user', 'john'))
                )
            )
        ]);
        $writeResponse = $this->client->writeRelationship($writeRequest);
        $this->assertNotNull($writeResponse->getWrittenAt());

        $deleteRequest = new RelationshipDeletionRequest(
            new RelationshipFilter('blog/post', 'mypost-to-delete'),
        );
        $deleteResponse = $this->client->deleteRelationship($deleteRequest);
        $this->assertNotNull($deleteResponse->getDeletedAt());

        $readRequest = new RelationshipReadRequest(
            new Consistency(null, $deleteResponse->getDeletedAt(), null),
            new RelationshipFilter('blog/post')
        );
        $readResponse = $this->client->readRelationship($readRequest);
        $this->assertNull($readResponse[0]->getResult()->getRelationship());
        $this->assertNull($readResponse[0]->getError());
    }

    public function testExpandPermission(): void
    {
        $this->client->writeSchema(new SchemaRequest($this->getSchema()));

        $subject = new SubjectReference(new ObjectReference('blog/user', 'john'));
        $writeRequest = new RelationshipWriteRequest([
            new RelationshipUpdate(
                RelationshipUpdate::OPERATION_CREATE,
                new Relationship(
                    new ObjectReference('blog/post', 'mypost-to-expand'),
                    'writer',
                    $subject
                )
            )
        ]);
        $writeResponse = $this->client->writeRelationship($writeRequest);
        $this->assertNotNull($writeResponse->getWrittenAt());

        $expandRequest = new PermissionExpandRequest(
            new Consistency(null, $writeResponse->getWrittenAt(), null),
            new ObjectReference('blog/post', 'mypost-to-expand'),
            'writer'
        );
        $expandResponse = $this->client->expandPermission($expandRequest);
        $this->assertTrue(count($expandResponse->getTreeRoot()->getLeaf()->getSubjects()) === 1);
        $this->assertEquals(
            $subject,
            $expandResponse->getTreeRoot()->getLeaf()->getSubjects()[0]
        );

        $deleteRequest = new RelationshipDeletionRequest(
            new RelationshipFilter('blog/post')
        );
        $this->client->deleteRelationship($deleteRequest);
    }

    public function testShowResources(): void
    {
        $this->client->writeSchema(new SchemaRequest($this->getSchema()));

        $writeRequest = new RelationshipWriteRequest([
            new RelationshipUpdate(
                RelationshipUpdate::OPERATION_CREATE,
                new Relationship(
                    new ObjectReference('blog/post', 'mypost-to-show'),
                    'writer',
                    new SubjectReference(new ObjectReference('blog/user', 'john'))
                )
            )
        ]);
        $writeResponse = $this->client->writeRelationship($writeRequest);
        $this->assertNotNull($writeResponse->getWrittenAt());

        $showRequest = new LookupResourceRequest(
            new Consistency(null, $writeResponse->getWrittenAt(), null),
            'blog/post',
            'writer',
            new SubjectReference(new ObjectReference('blog/user', 'john'))
        );

        $showResponse = $this->client->showResourcesPermission($showRequest)[0];
        $this->assertEquals('mypost-to-show', $showResponse->getResult()->getResourceObjectId());
        $this->assertNull($showResponse->getError());

        $deleteRequest = new RelationshipDeletionRequest(
            new RelationshipFilter('blog/post')
        );
        $this->client->deleteRelationship($deleteRequest);
    }
    public function testShowSubjects(): void
    {
        $this->client->writeSchema(new SchemaRequest($this->getSchema()));

        $writeRequest = new RelationshipWriteRequest([
            new RelationshipUpdate(
                RelationshipUpdate::OPERATION_TOUCH,
                new Relationship(
                    new ObjectReference('blog/post', 'mypost-to-show-subject'),
                    'writer',
                    new SubjectReference(new ObjectReference('blog/user', 'john'))
                )
            )
        ]);
        $writeResponse = $this->client->writeRelationship($writeRequest);
        $this->assertNotNull($writeResponse->getWrittenAt());

        $showRequest = new LookupSubjectRequest(
            new Consistency(null, $writeResponse->getWrittenAt(), null),
            'blog/user',
            'write',
            new ObjectReference('blog/post', 'mypost-to-show-subject')
        );

        $showResponse = $this->client->showSubjectsPermission($showRequest)[0];

        $this->assertEquals('john', $showResponse->getResult()->getSubjectObjectId());
        $this->assertNull($showResponse->getError());

        $deleteRequest = new RelationshipDeletionRequest(
            new RelationshipFilter('blog/post')
        );
        $this->client->deleteRelationship($deleteRequest);
    }
}
