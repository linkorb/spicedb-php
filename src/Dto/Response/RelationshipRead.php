<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Response;

class RelationshipRead
{
    private ?RelationshipReadResponse $result;
    private ?Error $error;

    public function __construct(RelationshipReadResponse $result = null, Error $error = null)
    {
        $this->result = $result;
        $this->error  = $error;
    }

    public function getResult(): ?RelationshipReadResponse
    {
        return $this->result;
    }

    public function getError(): ?Error
    {
        return $this->error;
    }

    public function setResult(?RelationshipReadResponse $result): self
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
