<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Request;

class Schema
{
    private ?string $schema;

    public function __construct(string $schema = null)
    {
        $this->schema = $schema;
    }

    public function getSchema(): ?string
    {
        return $this->schema;
    }

    public function setSchema(?string $schema): self
    {
        $this->schema = $schema;
        return $this;
    }
}
