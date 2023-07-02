<?php

namespace CadastroNis\backend;

use CadastroNis\backend\modules\cidadaos\useCases\criarCidadao\CriarCidadaoController;

return [
    '/cadastrar-cidadao' => CriarCidadaoController::class,
];
