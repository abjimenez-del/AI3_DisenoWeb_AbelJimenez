<?php
// Configuración y conexión PDO. Las credenciales nunca se muestran al usuario.
$config = [
    'host'    => 'localhost',
    'db'      => 'db_sistema_web',
    'user'    => 'root',
    'pass'    => '',
    'charset' => 'utf8mb4',
];

$dsn = "mysql:host={$config['host']};dbname={$config['db']};charset={$config['charset']}";

try {
    $pdo = new PDO($dsn, $config['user'], $config['pass'], [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false, // prepared statements reales
    ]);
} catch (PDOException $e) {
    // El detalle técnico va al log, el usuario ve un mensaje genérico.
    error_log('[' . date('Y-m-d H:i:s') . '] Error de conexión: ' . $e->getMessage() . PHP_EOL, 3, __DIR__ . '/logs/error.log');
    http_response_code(500);
    exit('No se pudo conectar con el sistema. Intente más tarde.');
}
