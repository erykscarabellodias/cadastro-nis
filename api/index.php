<?php

require __DIR__ . '/../vendor/autoload.php';

use CadastroNis\backend\config\db\DatabaseConnection;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

if (!$_GET['r']) {
    http_response_code(404);

    exit();
}

$endereco = $_GET['r'];

$rotas = require __DIR__ . '/../src/backend/rotas.php';

if (!array_key_exists($endereco, $rotas)) {
    http_response_code(404);

    exit();
}

new DatabaseConnection();

$controladorSelecionado = $rotas[$endereco];
$controller = new $controladorSelecionado;
$controller->executar();
