<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class AlgebraicSubjectSet
{
    public const OPERATION_UNSPECIFIED = 'OPERATION_UNSPECIFIED';
    public const OPERATION_UNION = 'OPERATION_UNION';
    public const OPERATION_INTERSECTION = 'OPERATION_INTERSECTION';
    public const OPERATION_EXCLUSION = 'OPERATION_EXCLUSION';

    private ?string $operation;
    private ?array $children;

    public function __construct(string $operation = null, array $children = null)
    {
        $this->operation = $operation;
        $this->children  = $children;
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function getChildren(): ?array
    {
        return $this->children;
    }

    public function setOperation(?string $operation): self
    {
        $this->operation = $operation;
        return $this;
    }

    public function setChildren(?array $children): self
    {
        $this->children = $children;
        return $this;
    }
}
