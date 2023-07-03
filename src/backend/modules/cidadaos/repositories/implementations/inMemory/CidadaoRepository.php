<?php

namespace CadastroNis\backend\modules\cidadaos\repositories\implementations\inMemory;

use CadastroNis\backend\modules\cidadaos\models\Cidadao;
use CadastroNis\backend\modules\cidadaos\repositories\CidadaoRepositoryInterface;

class CidadaoRepository implements CidadaoRepositoryInterface
{
    public array $listaDeCidadaos;

    public function __construct()
    {
        $this->listaDeCidadaos = [];

        $cidadaosIniciais = [
            [
                'nomeCompleto' => 'João da Silva',
                'codigoNis' => '98765432101'
            ],
            [
                'nomeCompleto' => 'Maria Santos',
                'codigoNis' => '12345678902'
            ],
            [
                'nomeCompleto' => 'Pedro Oliveira',
                'codigoNis' => '87654321003'
            ],
        ];

        foreach ($cidadaosIniciais as $cidadao) {
            $novoCidadao = new Cidadao();
            $novoCidadao->nome_completo = $cidadao['nomeCompleto'];
            $novoCidadao->codigo_nis = $cidadao['codigoNis'];

            array_push($this->listaDeCidadaos, $novoCidadao);
        }
    }

    public function criarCidadao(string $nomeCompleto, string $codigoNis): Cidadao
    {
        $cidadao = new Cidadao();
        $cidadao->nome_completo = $nomeCompleto;
        $cidadao->codigo_nis = $codigoNis;

        array_push($this->listaDeCidadaos, $cidadao);

        return $cidadao;
    }

    public function buscarPorNis(string $codigoNis): Cidadao | null
    {
        $cidadaoEncontrado = array_filter($this->listaDeCidadaos, function ($cidadao) use ($codigoNis) {
            return $cidadao->codigo_nis === $codigoNis;
        });

        if (!$cidadaoEncontrado) {
            return null;
        }

        return $cidadaoEncontrado[0];
    }
}
