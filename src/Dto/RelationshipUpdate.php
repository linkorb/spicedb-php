<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class RelationshipUpdate
{
    public const OPERATION_UNSPECIFIED = 'OPERATION_UNSPECIFIED';
    public const OPERATION_CREATE = 'OPERATION_CREATE';
    public const OPERATION_TOUCH = 'OPERATION_TOUCH';
    public const OPERATION_DELETE = 'OPERATION_DELETE';

    private ?string $operation;
    private ?Relationship $relationship;

    public function __construct(string $operation = null, Relationship $relationship = null)
    {
        $this->operation    = $operation;
        $this->relationship = $relationship;
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function getRelationship(): ?Relationship
    {
        return $this->relationship;
    }

    public function setOperation(?string $operation): self
    {
        $this->operation = $operation;
        return $this;
    }

    public function setRelationship(?Relationship $relationship): self
    {
        $this->relationship = $relationship;
        return $this;
    }
}
