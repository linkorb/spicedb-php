<?php declare(strict_types=1);

namespace Integration;

use LinkORB\Authzed\Dto\ObjectReference;
use LinkORB\Authzed\Dto\Relationship;
use LinkORB\Authzed\Dto\RelationshipFilter;
use LinkORB\Authzed\Dto\RelationshipUpdate;
use LinkORB\Authzed\Dto\Request\RelationshipDeletion as RelationshipDeletionRequest;
use LinkORB\Authzed\Dto\Request\RelationshipWrite as RelationshipWriteRequest;
use LinkORB\Authzed\Dto\Request\Schema as SchemaRequest;
use LinkORB\Authzed\Dto\Request\Watch as WatchRequest;
use LinkORB\Authzed\Dto\SubjectReference;
use LinkORB\Authzed\Exception\SpiceDBServerException;
use LinkORB\Authzed\SpiceDB;
use LinkORB\Authzed\Tests\Integration\SpicedbClientAwareTrait;
use PHPUnit\Framework\TestCase;

class WatchTest extends TestCase
{
    use SpicedbClientAwareTrait;

    private ?SpiceDB $client;

    public function setUp(): void
    {
        $this->client = $this->getClient();
    }

    public function testWatch(): void
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

        $watchRequest = new WatchRequest(['blog/post']);
        foreach($this->client->watch($watchRequest, 0.2) as $watchReply) {
            $this->assertNull($watchReply->getError());

            if (!empty($watchReply->getResult()->getUpdates())) {
                foreach ($watchReply->getResult()->getUpdates() as $update) {
                    $this->assertContains(
                        $update->getOperation(),
                        [
                            RelationshipUpdate::OPERATION_DELETE,
                            RelationshipUpdate::OPERATION_CREATE,
                            RelationshipUpdate::OPERATION_TOUCH
                        ]
                    );
                }

                $this->assertNotNull($watchReply->getResult()->getChangesThrough()->getToken());
            }
        }

        $deleteRequest = new RelationshipDeletionRequest(
            new RelationshipFilter('blog/post')
        );
        $this->client->deleteRelationship($deleteRequest);
    }

    public function testWatchError(): void
    {
        $this->client->writeSchema(new SchemaRequest($this->getSchema()));

        $watchRequest = new WatchRequest(['not-found-error']);

        $this->expectException(SpiceDBServerException::class);

        try {
            iterator_to_array($this->client->watch($watchRequest, 0.1));
        } catch (SpiceDBServerException $e) {
            $this->assertEquals(3, $e->getError()->getCode());
            $this->assertTrue(false !== strpos($e->getError()->getMessage(), 'value does not match regex pattern'));

            throw $e;
        }
    }
}
