<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class LookupSubject
{
    private ?ZedToken $lookedUpAt;
    private ?string $subjectObjectId;

    public function __construct(ZedToken $lookedUpAt = null, string $subjectObjectId = null)
    {
        $this->lookedUpAt      = $lookedUpAt;
        $this->subjectObjectId = $subjectObjectId;
    }

    public function getLookedUpAt(): ?ZedToken
    {
        return $this->lookedUpAt;
    }

    public function getSubjectObjectId(): ?string
    {
        return $this->subjectObjectId;
    }

    public function setLookedUpAt(?ZedToken $lookedUpAt): self
    {
        $this->lookedUpAt = $lookedUpAt;
        return $this;
    }

    public function setSubjectObjectId(?string $subjectObjectId): self
    {
        $this->subjectObjectId = $subjectObjectId;
        return $this;
    }
}
