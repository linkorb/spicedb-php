<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class SubjectFilter
{
    private ?string $subjectType;
    private ?string $optionalSubjectId;
    private ?SubjectFilterRelationFilter $optionalRelation;

    public function __construct(
        string $subjectType = null,
        string $optionalSubjectId = null,
        SubjectFilterRelationFilter $optionalRelation = null
    ) {
        $this->subjectType       = $subjectType;
        $this->optionalSubjectId = $optionalSubjectId;
        $this->optionalRelation  = $optionalRelation;
    }

    public function getSubjectType(): ?string
    {
        return $this->subjectType;
    }

    public function getOptionalSubjectId(): ?string
    {
        return $this->optionalSubjectId;
    }

    public function getOptionalRelation(): ?SubjectFilterRelationFilter
    {
        return $this->optionalRelation;
    }

    public function setSubjectType(?string $subjectType): self
    {
        $this->subjectType = $subjectType;
        return $this;
    }

    public function setOptionalSubjectId(?string $optionalSubjectId): self
    {
        $this->optionalSubjectId = $optionalSubjectId;
        return $this;
    }

    public function setOptionalRelation(?SubjectFilterRelationFilter $optionalRelation): self
    {
        $this->optionalRelation = $optionalRelation;
        return $this;
    }
}
