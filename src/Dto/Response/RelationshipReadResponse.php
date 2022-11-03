<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Response;

use LinkORB\Authzed\Dto\Relationship;
use LinkORB\Authzed\Dto\ZedToken;

class RelationshipReadResponse
{
    private ?ZedToken $readAt;
    private ?Relationship $relationship;

    public function __construct(ZedToken $readAt = null, Relationship $relationship = null)
    {
        $this->readAt       = $readAt;
        $this->relationship = $relationship;
    }

    public function getReadAt(): ?ZedToken
    {
        return $this->readAt;
    }

    public function getRelationship(): ?Relationship
    {
        return $this->relationship;
    }

    public function setReadAt(?ZedToken $readAt): self
    {
        $this->readAt = $readAt;
        return $this;
    }

    public function setRelationship(?Relationship $relationship): self
    {
        $this->relationship = $relationship;
        return $this;
    }
}
