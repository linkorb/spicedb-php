<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class SubjectReference
{
    private ObjectReference $object;
    private string $optionalRelation;

    public function __construct(ObjectReference $object, string $optionalRelation)
    {
        $this->object           = $object;
        $this->optionalRelation = $optionalRelation;
    }

    public function getObject(): ObjectReference
    {
        return $this->object;
    }

    public function getOptionalRelation(): string
    {
        return $this->optionalRelation;
    }
}
