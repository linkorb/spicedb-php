<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class Lookup
{
    private ?ZedToken $lookedUpAt;
    private ?string $resourceObjectId;

    public function __construct(ZedToken $lookedUpAt = null, string $resourceObjectId = null)
    {
        $this->lookedUpAt       = $lookedUpAt;
        $this->resourceObjectId = $resourceObjectId;
    }

    public function getLookedUpAt(): ?ZedToken
    {
        return $this->lookedUpAt;
    }

    public function getResourceObjectId(): ?string
    {
        return $this->resourceObjectId;
    }

    public function setLookedUpAt(?ZedToken $lookedUpAt): self
    {
        $this->lookedUpAt = $lookedUpAt;
        return $this;
    }

    public function setResourceObjectId(?string $resourceObjectId): self
    {
        $this->resourceObjectId = $resourceObjectId;
        return $this;
    }
}
