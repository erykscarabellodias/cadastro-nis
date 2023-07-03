<?php

namespace CadastroNis\backend\modules\cidadaos\useCases\buscarCidadao;

use CadastroNis\backend\modules\cidadaos\repositories\CidadaoRepositoryInterface;
use CadastroNis\backend\modules\cidadaos\useCases\buscarCidadao\BuscarCidadaoDto;
use CadastroNis\backend\shared\exceptions\BadRequestException;

class BuscarCidadaoService
{
    public CidadaoRepositoryInterface $repository;

    public function __construct(
        CidadaoRepositoryInterface $repository,
    ) {
        $this->repository = $repository;
    }

    public function executar(BuscarCidadaoDto $dto)
    {
        if (
            is_null($dto->codigoNis) ||
            empty($dto->codigoNis)
        ) {
            throw new BadRequestException('O campo codigoNis é obrigatório');
        }

        if (strlen($dto->codigoNis) !== 11) {
            throw new BadRequestException('O código nis deve conter exatamente 11 dígitos');
        }

        $cidadaoEncontrado = $this->repository->buscarPorNis($dto->codigoNis);

        if (!$cidadaoEncontrado) {
            throw new BadRequestException('Cidadão não encontrado');
        }

        return $cidadaoEncontrado;
    }
}
