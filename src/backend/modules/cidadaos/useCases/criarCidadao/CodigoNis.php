<?php

namespace CadastroNis\backend\modules\cidadaos\useCases\criarCidadao;

use CadastroNis\backend\modules\cidadaos\repositories\CidadaoRepositoryInterface;

class CodigoNis
{
    public CidadaoRepositoryInterface $repository;
    public string $codigoNis = "";

    public function __construct(CidadaoRepositoryInterface $cidadaoRepository)
    {
        $this->repository = $cidadaoRepository;
    }

    public function gerarCodigoNis(): string
    {
        for ($i = 0; $i < 11; $i++) {
            $this->codigoNis .= rand(0, 9);
        }

        if ($this->verificarSeCodigoNisJaExiste()) {
            $this->codigoNis = '';
            $this->gerarCodigoNis();
        }

        return $this->codigoNis;
    }

    private function verificarSeCodigoNisJaExiste(): bool
    {
        $codigoNisJaExiste = $this->repository->buscarPorNis($this->codigoNis);

        if ($codigoNisJaExiste) {
            return true;
        }

        return false;
    }
}
