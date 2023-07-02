<?php

namespace CadastroNis\backend\shared\exceptions;

class BadRequestException extends AppException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 0, 400);
    }
}
