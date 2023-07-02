<?php

namespace CadastroNis\backend\modules\cidadaos\useCases\buscarCidadao;

class BuscarCidadaoDto
{
    public string $codigoNis;

    public function __construct(string $codigoNis)
    {
        $this->codigoNis = $codigoNis;
    }
}
