<?php

use CadastroNis\backend\modules\cidadaos\repositories\implementations\inMemory\CidadaoRepository;
use CadastroNis\backend\modules\cidadaos\useCases\buscarCidadao\BuscarCidadaoDto;
use CadastroNis\backend\modules\cidadaos\useCases\buscarCidadao\BuscarCidadaoService;
use CadastroNis\backend\modules\cidadaos\useCases\criarCidadao\CodigoNis;
use CadastroNis\backend\modules\cidadaos\useCases\criarCidadao\CriarCidadaoDto;
use PHPUnit\Framework\TestCase;
use CadastroNis\backend\modules\cidadaos\useCases\criarCidadao\CriarCidadaoService;
use CadastroNis\backend\shared\exceptions\BadRequestException;

class CriarCidadaoServiceTest extends TestCase
{
    public static $repository;
    public static $service;

    public static function setUpBeforeClass(): void
    {
        self::$repository = new CidadaoRepository();
        $codigoNis = new CodigoNis(self::$repository);
        self::$service = new CriarCidadaoService(self::$repository, $codigoNis);
    }

    public function testNaoDeveCriarUmCidadaoComNomeEmBranco()
    {
        $this->expectException(BadRequestException::class);
        $this->expectExceptionMessage('O campo nomeCompleto é obrigatório');

        $dto = new CriarCidadaoDto('');
        self::$service->executar($dto);
    }

    public function testDeveSerPossivelCriarUmCidadao()
    {
        $dto = new CriarCidadaoDto('Ana Carolina Santos');
        $cidadaoGerado = self::$service->executar($dto);

        $this->assertEquals($dto->nomeCompleto, $cidadaoGerado->nome_completo);

        $codigoNisGerado = $cidadaoGerado->codigo_nis;

        echo 'NIS GERADO: ' . $codigoNisGerado;

        $this->assertEquals(sizeof(self::$repository->listaDeCidadaos), 4);
    }
}
