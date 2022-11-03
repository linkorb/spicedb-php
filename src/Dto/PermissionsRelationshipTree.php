<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class PermissionsRelationshipTree
{
    private ?AlgebraicSubjectSet $intermediate;
    private ?DirectSubjectSet $leaf;
    private ?ObjectReference $expandedObject;
    private ?string $expandedRelation;

    public function __construct(
        AlgebraicSubjectSet $intermediate = null,
        DirectSubjectSet $leaf = null,
        ObjectReference $expandedObject = null,
        string $expandedRelation = null
    ) {
        $this->intermediate     = $intermediate;
        $this->leaf             = $leaf;
        $this->expandedObject   = $expandedObject;
        $this->expandedRelation = $expandedRelation;
    }

    public function getIntermediate(): ?AlgebraicSubjectSet
    {
        return $this->intermediate;
    }

    public function getLeaf(): ?DirectSubjectSet
    {
        return $this->leaf;
    }

    public function getExpandedObject(): ?ObjectReference
    {
        return $this->expandedObject;
    }

    public function getExpandedRelation(): ?string
    {
        return $this->expandedRelation;
    }

    public function setIntermediate(?AlgebraicSubjectSet $intermediate): self
    {
        $this->intermediate = $intermediate;
        return $this;
    }

    public function setLeaf(?DirectSubjectSet $leaf): self
    {
        $this->leaf = $leaf;
        return $this;
    }

    public function setExpandedObject(?ObjectReference $expandedObject): self
    {
        $this->expandedObject = $expandedObject;
        return $this;
    }

    public function setExpandedRelation(?string $expandedRelation): self
    {
        $this->expandedRelation = $expandedRelation;
        return $this;
    }
}
