<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class SubjectFilterRelationFilter
{
    private ?string $relation;

    public function __construct(string $relation = null)
    {
        $this->relation = $relation;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(?string $relation): self
    {
        $this->relation = $relation;
        return $this;
    }
}
