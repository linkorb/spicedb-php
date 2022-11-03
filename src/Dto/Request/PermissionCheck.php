<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Request;

use LinkORB\Authzed\Dto\Consistency;
use LinkORB\Authzed\Dto\ObjectReference;
use LinkORB\Authzed\Dto\SubjectReference;

class PermissionCheck
{
    private ?Consistency $consistency;
    private ?ObjectReference $resource;
    private ?string $permission;
    private ?SubjectReference $subject;

    public function __construct(
        Consistency $consistency = null,
        ObjectReference $resource = null,
        string $permission = null,
        SubjectReference $subject = null
    ) {
        $this->consistency = $consistency;
        $this->resource    = $resource;
        $this->permission  = $permission;
        $this->subject     = $subject;
    }

    public function getConsistency(): ?Consistency
    {
        return $this->consistency;
    }

    public function getResource(): ?ObjectReference
    {
        return $this->resource;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function getSubject(): ?SubjectReference
    {
        return $this->subject;
    }

    public function setConsistency(?Consistency $consistency): self
    {
        $this->consistency = $consistency;
        return $this;
    }

    public function setResource(?ObjectReference $resource): self
    {
        $this->resource = $resource;
        return $this;
    }

    public function setPermission(?string $permission): self
    {
        $this->permission = $permission;
        return $this;
    }

    public function setSubject(?SubjectReference $subject): self
    {
        $this->subject = $subject;
        return $this;
    }
}
