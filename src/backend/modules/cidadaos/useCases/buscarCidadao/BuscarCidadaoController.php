<?php

namespace CadastroNis\backend\modules\cidadaos\useCases\buscarCidadao;

use CadastroNis\backend\modules\cidadaos\repositories\implementations\illuminate\CidadaoRepository;
use CadastroNis\backend\modules\cidadaos\useCases\buscarCidadao\BuscarCidadaoService;
use CadastroNis\backend\shared\ControllerInterface;
use CadastroNis\backend\shared\exceptions\AppException;
use CadastroNis\backend\shared\exceptions\MethodNotAllowedException;
use Exception;

class BuscarCidadaoController implements ControllerInterface
{
    public function executar()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
                throw new MethodNotAllowedException();
            }

            $cidadaoRepository = new CidadaoRepository();

            $service = new BuscarCidadaoService($cidadaoRepository);

            $codigoNis = $_GET['codigoNis'] ?? '';

            $dto = new BuscarCidadaoDto($codigoNis);

            $cidadao = $service->executar($dto);

            http_response_code(201);

            echo json_encode($cidadao);

            return;
        } catch (AppException $e) {
            if ($e->getMessage()) {
                echo json_encode(['message' => $e->getMessage()]);
            }

            http_response_code($e->getStatusHttp());

            exit();
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['message' => 'Houve um erro inesperado. Se o problema persistir, entre em contato com o adminsitrador.']);
        }
    }
}
