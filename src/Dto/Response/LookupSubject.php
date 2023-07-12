<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Response;

use LinkORB\Authzed\Dto\LookupSubject as LookupSubjectDto;

class LookupSubject
{
    private ?LookupSubjectDto $result;
    private ?Error $error;

    public function __construct(LookupSubjectDto $result = null, Error $error = null)
    {
        $this->result = $result;
        $this->error  = $error;
    }

    public function getResult(): ?LookupSubjectDto
    {
        return $this->result;
    }

    public function getError(): ?Error
    {
        return $this->error;
    }

    public function setResult(?LookupSubjectDto $result): self
    {
        $this->result = $result;
        return $this;
    }

    public function setError(?Error $error): self
    {
        $this->error = $error;
        return $this;
    }
}
