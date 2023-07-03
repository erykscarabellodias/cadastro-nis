<?php

use CadastroNis\backend\modules\cidadaos\repositories\implementations\inMemory\CidadaoRepository;
use CadastroNis\backend\modules\cidadaos\useCases\buscarCidadao\BuscarCidadaoDto;
use PHPUnit\Framework\TestCase;
use CadastroNis\backend\modules\cidadaos\useCases\buscarCidadao\BuscarCidadaoService;
use CadastroNis\backend\shared\exceptions\BadRequestException;

class BuscarCidadaoServiceTest extends TestCase
{
    public static $service;

    // public static function setUpBeforeClass(): void
    // {
    //     $repository = new CidadaoRepository();
    //     self::$service = new BuscarCidadaoService($repository);
    // }

    // public function testDeveRetornarUmCidadaoSeOCodigoNisForValido()
    // {
    //     $dto = new BuscarCidadaoDto('98765432101');
    //     $cidadaoEncontrado = self::$service->executar($dto);

    //     $this->assertEquals('João da Silva', $cidadaoEncontrado->nome_completo);
    //     $this->assertEquals('98765432101', $cidadaoEncontrado->codigo_nis);
    // }

    // public function testNaoDeveAceitarEntradaDeLetras()
    // {
    //     $this->expectException(BadRequestException::class);
    //     $this->expectExceptionMessage('O código NIS é composto apenas por números');

    //     $dto = new BuscarCidadaoDto('3144215669A');
    //     self::$service->executar($dto);
    // }

    // public function testNaoDeveAceitarMaisDe11Caracteres()
    // {
    //     $this->expectException(BadRequestException::class);
    //     $this->expectExceptionMessage('O código NIS deve conter exatamente 11 dígitos');

    //     $dto = new BuscarCidadaoDto('314421566911');
    //     self::$service->executar($dto);
    // }

    // public function testNaoDeveAceitarMenosDe11Caracteres()
    // {
    //     $this->expectException(BadRequestException::class);
    //     $this->expectExceptionMessage('O código NIS deve conter exatamente 11 dígitos');

    //     $dto = new BuscarCidadaoDto('314421566');
    //     self::$service->executar($dto);
    // }

    // public function testNaoDeveEncontrarUmCidadaoQueNaoExiste()
    // {
    //     $this->expectException(BadRequestException::class);
    //     $this->expectExceptionMessage('Cidadão não encontrado');

    //     $dto = new BuscarCidadaoDto('31442156692');
    //     self::$service->executar($dto);
    // }
}
