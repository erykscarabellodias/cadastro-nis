<?php

require __DIR__ . '/../vendor/autoload.php';

$endereco = $_SERVER['PATH_INFO'];

$rotas = require __DIR__ . '/../src/backend/rotas.php';

if (!array_key_exists($endereco, $rotas)) {
    http_response_code(404);

    exit();
}

$controladorSelecionado = $rotas[$endereco];
$controller = new $controladorSelecionado;
$controller->executar();
