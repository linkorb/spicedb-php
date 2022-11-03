<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Request;

use LinkORB\Authzed\Dto\ZedToken;

class WatchResources
{
    private ?string $resourceObjectType;
    private ?string $permission;
    private ?string $subjectObjectType;
    private ?string $optionalSubjectRelation;
    private ?ZedToken $optionalStartCursor;

    public function __construct(
        string $resourceObjectType = null,
        string $permission = null,
        string $subjectObjectType = null,
        string $optionalSubjectRelation = null,
        ZedToken $optionalStartCursor = null
    ) {
        $this->resourceObjectType      = $resourceObjectType;
        $this->permission              = $permission;
        $this->subjectObjectType       = $subjectObjectType;
        $this->optionalSubjectRelation = $optionalSubjectRelation;
        $this->optionalStartCursor     = $optionalStartCursor;
    }

    public function getResourceObjectType(): ?string
    {
        return $this->resourceObjectType;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function getSubjectObjectType(): ?string
    {
        return $this->subjectObjectType;
    }

    public function getOptionalSubjectRelation(): ?string
    {
        return $this->optionalSubjectRelation;
    }

    public function getOptionalStartCursor(): ?ZedToken
    {
        return $this->optionalStartCursor;
    }

    public function setResourceObjectType(?string $resourceObjectType): self
    {
        $this->resourceObjectType = $resourceObjectType;
        return $this;
    }

    public function setPermission(?string $permission): self
    {
        $this->permission = $permission;
        return $this;
    }

    public function setSubjectObjectType(?string $subjectObjectType): self
    {
        $this->subjectObjectType = $subjectObjectType;
        return $this;
    }

    public function setOptionalSubjectRelation(?string $optionalSubjectRelation): self
    {
        $this->optionalSubjectRelation = $optionalSubjectRelation;
        return $this;
    }

    public function setOptionalStartCursor(?ZedToken $optionalStartCursor): self
    {
        $this->optionalStartCursor = $optionalStartCursor;
        return $this;
    }
}
