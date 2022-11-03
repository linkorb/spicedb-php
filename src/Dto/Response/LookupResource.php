<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Response;

use LinkORB\Authzed\Dto\Lookup;

class LookupResource
{
    private ?Lookup $result;
    private ?Error $error;

    public function __construct(Lookup $result = null, Error $error = null)
    {
        $this->result = $result;
        $this->error  = $error;
    }

    public function getResult(): ?Lookup
    {
        return $this->result;
    }

    public function getError(): ?Error
    {
        return $this->error;
    }

    public function setResult(?Lookup $result): self
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
