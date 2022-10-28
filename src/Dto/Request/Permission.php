<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Request;

use LinkORB\Authzed\Dto\Consistency;
use LinkORB\Authzed\Dto\ObjectReference;
use LinkORB\Authzed\Dto\SubjectReference;

class Permission
{
    private Consistency $consistency;
    private ObjectReference $resource;
    private string $permission;
    private SubjectReference $subject;

    public function __construct(
        Consistency $consistency,
        ObjectReference $resource,
        string $permission,
        SubjectReference $subject
    ) {
        $this->consistency = $consistency;
        $this->resource    = $resource;
        $this->permission  = $permission;
        $this->subject     = $subject;
    }

    public function getConsistency(): Consistency
    {
        return $this->consistency;
    }

    public function getResource(): ObjectReference
    {
        return $this->resource;
    }

    public function getPermission(): string
    {
        return $this->permission;
    }

    public function getSubject(): SubjectReference
    {
        return $this->subject;
    }
}
