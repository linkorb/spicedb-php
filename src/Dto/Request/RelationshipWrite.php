<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Request;

use LinkORB\Authzed\Dto\Precondition;
use LinkORB\Authzed\Dto\RelationshipUpdate;

class RelationshipWrite
{
    /** @var RelationshipUpdate[] */
    private ?array $updates;
    /** @var Precondition[] */
    private ?array $optionalPreconditions;

    public function __construct(array $updates = null, array $optionalPreconditions = null)
    {
        $this->updates               = $updates;
        $this->optionalPreconditions = $optionalPreconditions;
    }

    public function getUpdates(): ?array
    {
        return $this->updates;
    }

    public function getOptionalPreconditions(): ?array
    {
        return $this->optionalPreconditions;
    }

    public function setUpdates(?array $updates): self
    {
        $this->updates = $updates;
        return $this;
    }

    public function setOptionalPreconditions(?array $optionalPreconditions): self
    {
        $this->optionalPreconditions = $optionalPreconditions;
        return $this;
    }
}
