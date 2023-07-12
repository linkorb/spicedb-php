<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Request;

use LinkORB\Authzed\Dto\Consistency;
use LinkORB\Authzed\Dto\ObjectReference;

class LookupSubject
{
    private ?Consistency $consistency;
    private ?string $subjectObjectType;
    private ?string $permission;
    private ?ObjectReference $resource;
    private ?string $optionalSubjectRelation;

    public function __construct(
        Consistency $consistency = null,
        string $subjectObjectType = null,
        string $permission = null,
        ObjectReference $resource = null,
        ?string $optionalSubjectRelation = null
    ) {
        $this->consistency                = $consistency;
        $this->subjectObjectType          = $subjectObjectType;
        $this->permission                 = $permission;
        $this->resource                   = $resource;
        $this->optionalSubjectRelation    = $optionalSubjectRelation;
    }

    public function getConsistency(): ?Consistency
    {
        return $this->consistency;
    }

    public function getSubjectObjectType(): ?string
    {
        return $this->subjectObjectType;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function getResource(): ?ObjectReference
    {
        return $this->resource;
    }

    public function getOptionalSubjectRelation(): ?string
    {
        return $this->optionalSubjectRelation;
    }

    public function setConsistency(?Consistency $consistency): self
    {
        $this->consistency = $consistency;
        return $this;
    }

    public function setSubjectObjectType(?string $subjectObjectType): self
    {
        $this->subjectObjectType = $subjectObjectType;
        return $this;
    }

    public function setPermission(?string $permission): self
    {
        $this->permission = $permission;
        return $this;
    }

    public function setResource(?ObjectReference $resource): self
    {
        $this->resource = $resource;
        return $this;
    }

    public function setOptionalSubjectRelation(?string $optionalSubjectRelation): self
    {
        $this->optionalSubjectRelation = $optionalSubjectRelation;
        return $this;
    }
}
