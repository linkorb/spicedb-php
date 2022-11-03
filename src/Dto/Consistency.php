<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class Consistency
{
    private ?bool $minimizeLatency;
    private ?ZedToken $atLeastAsFresh;
    private ?ZedToken $atExactSnapshot;
    private ?bool $fullyConsistent;

    public function __construct(
        bool $minimizeLatency = null,
        ZedToken $atLeastAsFresh = null,
        ZedToken $atExactSnapshot = null,
        bool $fullyConsistent = null
    ) {
        $this->minimizeLatency = $minimizeLatency;
        $this->atLeastAsFresh  = $atLeastAsFresh;
        $this->atExactSnapshot = $atExactSnapshot;
        $this->fullyConsistent = $fullyConsistent;
    }

    public function isMinimizeLatency(): ?bool
    {
        return $this->minimizeLatency;
    }

    public function getAtLeastAsFresh(): ?ZedToken
    {
        return $this->atLeastAsFresh;
    }

    public function getAtExactSnapshot(): ?ZedToken
    {
        return $this->atExactSnapshot;
    }

    public function isFullyConsistent(): ?bool
    {
        return $this->fullyConsistent;
    }

    public function setMinimizeLatency(?bool $minimizeLatency): self
    {
        $this->minimizeLatency = $minimizeLatency;
        return $this;
    }

    public function setAtLeastAsFresh(?ZedToken $atLeastAsFresh): self
    {
        $this->atLeastAsFresh = $atLeastAsFresh;
        return $this;
    }

    public function setAtExactSnapshot(?ZedToken $atExactSnapshot): self
    {
        $this->atExactSnapshot = $atExactSnapshot;
        return $this;
    }

    public function setFullyConsistent(?bool $fullyConsistent): self
    {
        $this->fullyConsistent = $fullyConsistent;
        return $this;
    }
}
