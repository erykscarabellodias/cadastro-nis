<?php

namespace CadastroNis\backend\modules\cidadaos\useCases\criarCidadao;

class CriarCidadaoDto
{
    public string $nomeCompleto;

    public function __construct(string $nomeCompleto)
    {
        $this->nomeCompleto = $nomeCompleto;
    }
}
