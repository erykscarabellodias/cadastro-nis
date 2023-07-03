<?php

require __DIR__ . '/../vendor/autoload.php';

if (!$_GET['r']) {
    http_response_code(404);

    exit();
}

$endereco = $_GET['r'];

$rotas = require __DIR__ . '/../src/web/rotas.php';

if (!array_key_exists($_GET['r'], $rotas)) {
    http_response_code(404);

    exit();
}

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

$controladorSelecionado = $rotas[$endereco];
$controller = new $controladorSelecionado;
$controller->exibirView();
