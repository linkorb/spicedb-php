<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Response;

use LinkORB\Authzed\Dto\ZedToken;

class RelationshipWrite
{
    private ?ZedToken $writtenAt;

    public function __construct(ZedToken $writtenAt = null)
    {
        $this->writtenAt = $writtenAt;
    }

    public function getWrittenAt(): ?ZedToken
    {
        return $this->writtenAt;
    }

    public function setWrittenAt(?ZedToken $writtenAt): self
    {
        $this->writtenAt = $writtenAt;
        return $this;
    }
}
