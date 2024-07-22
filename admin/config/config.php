<?php

function loadEnv($path) {
    if (!file_exists($path)) {
        throw new Exception("El archivo .env no existe en la ruta especificada.");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        putenv(sprintf('%s=%s', $name, $value));
        $_ENV[$name] = $value;
    }
}

// Cargar las variables de entorno
loadEnv(__DIR__ . "/../../.env");

$appUrl = getenv('APP_URL');

define('URL', $appUrl . '/admin/');
define('HOST', 'localhost');
define('DB', 'ceunem');
define('USER', 'root');
define('PASSWORD', '');
define('CHARSET', 'utf8');
define('PUBLIC_URL', $appUrl . '/public/');
?>