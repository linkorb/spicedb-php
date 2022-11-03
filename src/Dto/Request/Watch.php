<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Request;

use LinkORB\Authzed\Dto\ZedToken;

class Watch
{
    /** @var string[] */
    private ?array $optionalObjectTypes;
    private ?ZedToken $optionalStartCursor;

    public function __construct(array $optionalObjectTypes = null, ZedToken $optionalStartCursor = null)
    {
        $this->optionalObjectTypes = $optionalObjectTypes;
        $this->optionalStartCursor = $optionalStartCursor;
    }

    public function getOptionalObjectTypes(): ?array
    {
        return $this->optionalObjectTypes;
    }

    public function getOptionalStartCursor(): ?ZedToken
    {
        return $this->optionalStartCursor;
    }

    public function setOptionalObjectTypes(?array $optionalObjectTypes): self
    {
        $this->optionalObjectTypes = $optionalObjectTypes;
        return $this;
    }

    public function setOptionalStartCursor(?ZedToken $optionalStartCursor): self
    {
        $this->optionalStartCursor = $optionalStartCursor;
        return $this;
    }
}
