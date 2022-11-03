<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Request;

use LinkORB\Authzed\Dto\Consistency;
use LinkORB\Authzed\Dto\SubjectReference;

class LookupResource
{
    private ?Consistency $consistency;
    private ?string $resourceObjectType;
    private ?string $permission;
    private ?SubjectReference $subject;

    public function __construct(
        Consistency $consistency = null,
        string $resourceObjectType = null,
        string $permission = null,
        SubjectReference $subject = null
    ) {
        $this->consistency        = $consistency;
        $this->resourceObjectType = $resourceObjectType;
        $this->permission         = $permission;
        $this->subject            = $subject;
    }

    public function getConsistency(): ?Consistency
    {
        return $this->consistency;
    }

    public function getResourceObjectType(): ?string
    {
        return $this->resourceObjectType;
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

    public function setSubject(?SubjectReference $subject): self
    {
        $this->subject = $subject;
        return $this;
    }
}
