<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class ZedToken
{
    private ?string $token;

    public function __construct(string $token = null)
    {
        $this->token = $token;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;
        return $this;
    }
}
