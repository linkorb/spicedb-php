<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class Precondition
{
    public const OPERATION_UNSPECIFIED = 'OPERATION_UNSPECIFIED';
    public const OPERATION_MUST_NOT_MATCH = 'OPERATION_MUST_NOT_MATCH';
    public const OPERATION_MUST_MATCH = 'OPERATION_MUST_MATCH';

    private ?string $operation;
    private ?RelationshipFilter $filter;

    public function __construct(string $operation = null, RelationshipFilter $filter = null)
    {
        $this->operation = $operation;
        $this->filter    = $filter;
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function getFilter(): ?RelationshipFilter
    {
        return $this->filter;
    }

    public function setOperation(?string $operation): self
    {
        $this->operation = $operation;
        return $this;
    }

    public function setFilter(?RelationshipFilter $filter): self
    {
        $this->filter = $filter;
        return $this;
    }
}
