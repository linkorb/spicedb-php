<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Response;

class Watch
{
    private ?WatchResponse $result;
    private ?Error $error;

    public function __construct(WatchResponse $result = null, Error $error = null)
    {
        $this->result = $result;
        $this->error  = $error;
    }

    public function getResult(): ?WatchResponse
    {
        return $this->result;
    }

    public function getError(): ?Error
    {
        return $this->error;
    }

    public function setResult(?WatchResponse $result): self
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
