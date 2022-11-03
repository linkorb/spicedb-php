<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class RelationshipFilter
{
    private ?string $resourceType;
    private ?string $optionalResourceId;
    private ?string $optionalRelation;
    private ?SubjectFilter $optionalSubjectFilter;

    public function __construct(
        string $resourceType = null,
        string $optionalResourceId = null,
        string $optionalRelation = null,
        SubjectFilter $optionalSubjectFilter = null
    ) {
        $this->resourceType          = $resourceType;
        $this->optionalResourceId    = $optionalResourceId;
        $this->optionalRelation      = $optionalRelation;
        $this->optionalSubjectFilter = $optionalSubjectFilter;
    }

    public function getResourceType(): ?string
    {
        return $this->resourceType;
    }

    public function getOptionalResourceId(): ?string
    {
        return $this->optionalResourceId;
    }

    public function getOptionalRelation(): ?string
    {
        return $this->optionalRelation;
    }

    public function getOptionalSubjectFilter(): ?SubjectFilter
    {
        return $this->optionalSubjectFilter;
    }

    public function setResourceType(?string $resourceType): self
    {
        $this->resourceType = $resourceType;
        return $this;
    }

    public function setOptionalResourceId(?string $optionalResourceId): self
    {
        $this->optionalResourceId = $optionalResourceId;
        return $this;
    }

    public function setOptionalRelation(?string $optionalRelation): self
    {
        $this->optionalRelation = $optionalRelation;
        return $this;
    }

    public function setOptionalSubjectFilter(?SubjectFilter $optionalSubjectFilter): self
    {
        $this->optionalSubjectFilter = $optionalSubjectFilter;
        return $this;
    }
}
