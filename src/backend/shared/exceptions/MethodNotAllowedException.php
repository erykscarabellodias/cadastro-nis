<?php

namespace CadastroNis\backend\shared\exceptions;

class MethodNotAllowedException extends AppException
{
    public function __construct()
    {
        parent::__construct(null, 0, 405);
    }
}
