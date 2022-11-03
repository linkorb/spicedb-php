<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class SubjectReference
{
    private ?ObjectReference $object;
    private ?string $optionalRelation;

    public function __construct(ObjectReference $object = null, string $optionalRelation = null)
    {
        $this->object           = $object;
        $this->optionalRelation = $optionalRelation;
    }

    public function getObject(): ?ObjectReference
    {
        return $this->object;
    }

    public function getOptionalRelation(): ?string
    {
        return $this->optionalRelation;
    }

    public function setObject(?ObjectReference $object): self
    {
        $this->object = $object;
        return $this;
    }

    public function setOptionalRelation(?string $optionalRelation): self
    {
        $this->optionalRelation = $optionalRelation;
        return $this;
    }
}
