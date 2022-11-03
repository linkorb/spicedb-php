<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Response;

use LinkORB\Authzed\Dto\ZedToken;

class RelationshipDeletion
{
    private ?ZedToken $deletedAt;

    public function __construct(ZedToken $deletedAt = null)
    {
        $this->deletedAt = $deletedAt;
    }

    public function getDeletedAt(): ?ZedToken
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?ZedToken $deletedAt): self
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }
}
