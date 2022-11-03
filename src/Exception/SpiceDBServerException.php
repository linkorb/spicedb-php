<?php declare(strict_types=1);

namespace LinkORB\Authzed\Exception;

use Exception;
use LinkORB\Authzed\Dto\Response\Error;

class SpiceDBServerException extends Exception
{
    private Error $error;

    public function __construct(Error $error)
    {
        $this->error = $error;

        parent::__construct($error->getMessage(), $error->getCode());
    }

    public function getError(): Error
    {
        return $this->error;
    }
}
