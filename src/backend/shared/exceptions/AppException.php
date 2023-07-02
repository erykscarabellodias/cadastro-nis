<?php

namespace CadastroNis\backend\shared\exceptions;

use Exception;

class AppException extends Exception
{
    private $statusHttp;

    public function __construct($message, $code = 0, int $statusHttp)
    {
        parent::__construct($message, $code);
        $this->statusHttp = $statusHttp;
    }

    public function getStatusHttp(): int
    {
        return $this->statusHttp;
    }
}
