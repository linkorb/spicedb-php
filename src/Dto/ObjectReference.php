<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class ObjectReference
{
    private ?string $objectType;
    private ?string $objectId;

    public function __construct(string $objectType = null, string $objectId = null)
    {
        $this->objectType = $objectType;
        $this->objectId   = $objectId;
    }

    public function getObjectType(): ?string
    {
        return $this->objectType;
    }

    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    public function setObjectType(?string $objectType): self
    {
        $this->objectType = $objectType;
        return $this;
    }

    public function setObjectId(?string $objectId): self
    {
        $this->objectId = $objectId;
        return $this;
    }
}
