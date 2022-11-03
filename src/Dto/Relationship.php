<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class Relationship
{
    private ?ObjectReference $resource;
    private ?string $relation;
    private ?SubjectReference $subject;

    public function __construct(
        ObjectReference $resource = null,
        string $relation = null,
        SubjectReference $subject = null
    ) {
        $this->resource = $resource;
        $this->relation = $relation;
        $this->subject  = $subject;
    }

    public function getResource(): ?ObjectReference
    {
        return $this->resource;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function getSubject(): ?SubjectReference
    {
        return $this->subject;
    }

    public function setResource(?ObjectReference $resource): self
    {
        $this->resource = $resource;
        return $this;
    }

    public function setRelation(?string $relation): self
    {
        $this->relation = $relation;
        return $this;
    }

    public function setSubject(?SubjectReference $subject): self
    {
        $this->subject = $subject;
        return $this;
    }
}
