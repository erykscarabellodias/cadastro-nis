<?php

namespace CadastroNis\backend\modules\cidadaos\repositories\implementations\illuminate;

use CadastroNis\backend\modules\cidadaos\models\Cidadao;
use CadastroNis\backend\modules\cidadaos\repositories\CidadaoRepositoryInterface;

class CidadaoRepository implements CidadaoRepositoryInterface
{
    public function criarCidadao(string $nomeCompleto, string $codigoNis): Cidadao
    {
        $cidadao = new Cidadao();
        $cidadao->nome_completo = $nomeCompleto;
        $cidadao->codigo_nis = $codigoNis;
        $cidadao->save();

        return $cidadao;
    }

    public function buscarPorNis(string $codigoNis): Cidadao | null
    {
        return Cidadao::where('codigo_nis', $codigoNis)->first();
    }
}
