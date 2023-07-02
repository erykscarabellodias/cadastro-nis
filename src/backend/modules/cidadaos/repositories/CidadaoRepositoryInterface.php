<?php

namespace CadastroNis\backend\modules\cidadaos\repositories;

use CadastroNis\backend\modules\cidadaos\models\Cidadao;

interface CidadaoRepositoryInterface
{
    public function criarCidadao(string $nomeCompleto, string $codigoNis): Cidadao;
    public function buscarPorNis(string $codigoNis): Cidadao | null;
}
