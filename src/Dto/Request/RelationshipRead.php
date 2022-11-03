<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Request;

use LinkORB\Authzed\Dto\Consistency;
use LinkORB\Authzed\Dto\RelationshipFilter;

class RelationshipRead
{
    private ?Consistency $consistency;
    private ?RelationshipFilter $relationshipFilter;

    public function __construct(Consistency $consistency = null, RelationshipFilter $relationshipFilter = null)
    {
        $this->consistency        = $consistency;
        $this->relationshipFilter = $relationshipFilter;
    }

    public function getConsistency(): ?Consistency
    {
        return $this->consistency;
    }

    public function getRelationshipFilter(): ?RelationshipFilter
    {
        return $this->relationshipFilter;
    }

    public function setConsistency(?Consistency $consistency): self
    {
        $this->consistency = $consistency;
        return $this;
    }

    public function setRelationshipFilter(?RelationshipFilter $relationshipFilter): self
    {
        $this->relationshipFilter = $relationshipFilter;
        return $this;
    }
}
