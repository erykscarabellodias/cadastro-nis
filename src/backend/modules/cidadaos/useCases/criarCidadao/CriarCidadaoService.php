<?php

namespace CadastroNis\backend\modules\cidadaos\useCases\criarCidadao;

use CadastroNis\backend\modules\cidadaos\repositories\CidadaoRepositoryInterface;
use CadastroNis\backend\shared\exceptions\BadRequestException;

class CriarCidadaoService
{
    public CidadaoRepositoryInterface $repository;
    public CodigoNis $codigoNis;

    public function __construct(
        CidadaoRepositoryInterface $repository,
        CodigoNis $codigoNis
    ) {
        $this->repository = $repository;
        $this->codigoNis = $codigoNis;
    }

    public function executar(CriarCidadaoDto $dto)
    {
        if (
            is_null($dto->nomeCompleto) ||
            empty($dto->nomeCompleto)
        ) {
            throw new BadRequestException('O campo nomeCompleto é obrigatório');
        }

        $codigoNis = $this->codigoNis->gerarCodigoNis();

        $novoCidadao = $this->repository->criarCidadao($dto->nomeCompleto, $codigoNis);

        return $novoCidadao;
    }
}
