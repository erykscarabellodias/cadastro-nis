<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

use Doctrine\DBAL\DriverManager;

return DriverManager::getConnection([
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'port' => $_ENV['DB_PORT'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER_MIGRATION'],
]);
