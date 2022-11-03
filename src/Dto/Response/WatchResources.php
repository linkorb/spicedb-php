<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Response;

class WatchResources
{
    private ?WatchResourcesResponse $result;
    private ?Error $error;

    public function __construct(WatchResourcesResponse $result = null, Error $error = null)
    {
        $this->result = $result;
        $this->error  = $error;
    }

    public function getResult(): ?WatchResourcesResponse
    {
        return $this->result;
    }

    public function getError(): ?Error
    {
        return $this->error;
    }

    public function setResult(?WatchResourcesResponse $result): self
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
