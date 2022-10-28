<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto;

class Schema
{
    private string $response;

    public function __construct(string $response)
    {
        $this->response = $response;
    }

    public function getResponse(): string
    {
        return $this->response;
    }
}
