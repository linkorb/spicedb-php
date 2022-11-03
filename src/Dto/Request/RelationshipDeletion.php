<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Request;

use LinkORB\Authzed\Dto\Precondition;
use LinkORB\Authzed\Dto\RelationshipFilter;

class RelationshipDeletion
{
    private ?RelationshipFilter $relationshipFilter;
    /** @var Precondition[] */
    private ?array $optionalPreconditions;

    public function __construct(RelationshipFilter $relationshipFilter = null, array $optionalPreconditions = null)
    {
        $this->relationshipFilter    = $relationshipFilter;
        $this->optionalPreconditions = $optionalPreconditions;
    }

    public function getRelationshipFilter(): ?RelationshipFilter
    {
        return $this->relationshipFilter;
    }

    public function getOptionalPreconditions(): ?array
    {
        return $this->optionalPreconditions;
    }

    public function setRelationshipFilter(?RelationshipFilter $relationshipFilter): self
    {
        $this->relationshipFilter = $relationshipFilter;
        return $this;
    }

    public function setOptionalPreconditions(?array $optionalPreconditions): self
    {
        $this->optionalPreconditions = $optionalPreconditions;
        return $this;
    }
}
