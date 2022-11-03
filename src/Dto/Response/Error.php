<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Response;

class Error
{
    private ?int $code;
    private ?string $message;
    private ?array $details;

    public function __construct(int $code = null, string $message = null, array $details = null)
    {
        $this->code    = $code;
        $this->message = $message;
        $this->details = $details;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getDetails(): ?array
    {
        return $this->details;
    }

    public function setCode(?int $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function setDetails(?array $details): self
    {
        $this->details = $details;
        return $this;
    }
}
