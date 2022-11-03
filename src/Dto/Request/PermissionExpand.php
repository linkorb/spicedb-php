<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Request;

use LinkORB\Authzed\Dto\Consistency;
use LinkORB\Authzed\Dto\ObjectReference;

class PermissionExpand
{
    private ?Consistency $consistency;
    private ?ObjectReference $resource;
    private ?string $permission;

    public function __construct(
        Consistency $consistency = null,
        ObjectReference $resource = null,
        string $permission = null
    ) {
        $this->consistency = $consistency;
        $this->resource    = $resource;
        $this->permission  = $permission;
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
}
