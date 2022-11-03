<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class DirectSubjectSet
{
    /** @var SubjectReference[] */
    private ?array $subjects = [];

    public function __construct(array $subjects = null)
    {
        $this->subjects = $subjects;
    }

    public function getSubjects(): ?array
    {
        return $this->subjects;
    }

    public function setSubjects(?array $subjects): self
    {
        $this->subjects = $subjects;
        return $this;
    }
}
