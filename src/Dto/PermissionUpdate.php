<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class PermissionUpdate
{
    public const PERMISSIONSHIP_UNSPECIFIED = 'PERMISSIONSHIP_UNSPECIFIED';
    public const PERMISSIONSHIP_NO_PERMISSION = 'PERMISSIONSHIP_NO_PERMISSION';
    public const PERMISSIONSHIP_HAS_PERMISSION = 'PERMISSIONSHIP_HAS_PERMISSION';

    private ?SubjectReference $subject;
    private ?ObjectReference $resource;
    private ?string $relation;
    private ?string $updatedPermission;

    public function __construct(
        SubjectReference $subject = null,
        ObjectReference $resource = null,
        string $relation = null,
        string $updatedPermission = null
    ) {
        $this->subject           = $subject;
        $this->resource          = $resource;
        $this->relation          = $relation;
        $this->updatedPermission = $updatedPermission;
    }

    public function getSubject(): ?SubjectReference
    {
        return $this->subject;
    }

    public function getResource(): ?ObjectReference
    {
        return $this->resource;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function getUpdatedPermission(): ?string
    {
        return $this->updatedPermission;
    }

    public function setSubject(?SubjectReference $subject): self
    {
        $this->subject = $subject;
        return $this;
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

    public function setUpdatedPermission(?string $updatedPermission): self
    {
        $this->updatedPermission = $updatedPermission;
        return $this;
    }
}
