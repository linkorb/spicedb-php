<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class Consistency
{
    private bool $minimizeLatency;
    private ZedToken $atLeastAsFresh;
    private ZedToken $atExactSnapshot;
    private bool $fullyConsistent;

    public function __construct(
        bool $minimizeLatency,
        ZedToken $atLeastAsFresh,
        ZedToken $atExactSnapshot,
        bool $fullyConsistent
    ) {
        $this->minimizeLatency = $minimizeLatency;
        $this->atLeastAsFresh  = $atLeastAsFresh;
        $this->atExactSnapshot = $atExactSnapshot;
        $this->fullyConsistent = $fullyConsistent;
    }

    public function isMinimizeLatency(): bool
    {
        return $this->minimizeLatency;
    }

    public function getAtLeastAsFresh(): ZedToken
    {
        return $this->atLeastAsFresh;
    }

    public function getAtExactSnapshot(): ZedToken
    {
        return $this->atExactSnapshot;
    }

    public function isFullyConsistent(): bool
    {
        return $this->fullyConsistent;
    }
}
