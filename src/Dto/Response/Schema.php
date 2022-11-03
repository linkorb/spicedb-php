<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Response;

class Schema
{
    private ?string $schemaText;

    public function __construct(string $schemaText = null)
    {
        $this->schemaText = $schemaText;
    }

    public function getSchemaText(): ?string
    {
        return $this->schemaText;
    }

    public function setSchemaText(?string $schemaText): self
    {
        $this->schemaText = $schemaText;
        return $this;
    }
}
