<?php
require __DIR__ . '/conexion.php';
session_start();
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

$errores = [];
$exito = false;
$datos = ['nombres' => '', 'apellidos' => '', 'correo' => '', 'telefono' => '', 'carrera' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) {
        http_response_code(403);
        exit('Solicitud no válida.');
    }

    // Validación en el servidor
    foreach ($datos as $campo => $_) {
        $datos[$campo] = trim($_POST[$campo] ?? '');
    }
    if (!preg_match('/^[\p{L} ]{2,80}$/u', $datos['nombres']))   $errores[] = 'Nombres: solo letras, entre 2 y 80 caracteres.';
    if (!preg_match('/^[\p{L} ]{2,80}$/u', $datos['apellidos'])) $errores[] = 'Apellidos: solo letras, entre 2 y 80 caracteres.';
    if (!filter_var($datos['correo'], FILTER_VALIDATE_EMAIL) || strlen($datos['correo']) > 120) $errores[] = 'Correo electrónico no válido.';
    if (!preg_match('/^[0-9]{7,15}$/', $datos['telefono']))      $errores[] = 'Teléfono: solo dígitos, entre 7 y 15.';
    if ($datos['carrera'] === '' || mb_strlen($datos['carrera']) > 100) $errores[] = 'Carrera es obligatoria (máx. 100 caracteres).';

    if (!$errores) {
        try {
            // Sentencia preparada con parámetros nombrados
            $sql = 'INSERT INTO estudiantes (nombres, apellidos, correo, telefono, carrera)
                    VALUES (:nombres, :apellidos, :correo, :telefono, :carrera)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute($datos);
            $exito = true;
            $datos = array_map(fn() => '', $datos);
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $errores[] = 'Ese correo ya está registrado.';
            } else {
                error_log('[' . date('Y-m-d H:i:s') . '] ' . $e->getMessage() . PHP_EOL, 3, __DIR__ . '/logs/error.log');
                $errores[] = 'No se pudo guardar el registro. Intente más tarde.';
            }
        }
    }
}
$h = fn($v) => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro de estudiantes</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<main class="contenedor">
  <nav><a href="index.php">Registrar</a> | <a href="registros.php">Ver registros</a></nav>
  <h1>Registro de estudiantes</h1>

  <?php if ($exito): ?><p class="ok">Registro guardado correctamente.</p><?php endif; ?>
  <?php if ($errores): ?>
    <ul class="error"><?php foreach ($errores as $e): ?><li><?= $h($e) ?></li><?php endforeach; ?></ul>
  <?php endif; ?>

  <form method="post" action="index.php">
    <input type="hidden" name="csrf" value="<?= $h($_SESSION['csrf']) ?>">

    <label for="nombres">Nombres</label>
    <input id="nombres" name="nombres" required minlength="2" maxlength="80" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñÜü ]+" value="<?= $h($datos['nombres']) ?>">

    <label for="apellidos">Apellidos</label>
    <input id="apellidos" name="apellidos" required minlength="2" maxlength="80" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñÜü ]+" value="<?= $h($datos['apellidos']) ?>">

    <label for="correo">Correo electrónico</label>
    <input id="correo" type="email" name="correo" required maxlength="120" value="<?= $h($datos['correo']) ?>">

    <label for="telefono">Teléfono</label>
    <input id="telefono" type="tel" name="telefono" required pattern="[0-9]{7,15}" title="Solo dígitos (7 a 15)" value="<?= $h($datos['telefono']) ?>">

    <label for="carrera">Carrera</label>
    <input id="carrera" name="carrera" required maxlength="100" value="<?= $h($datos['carrera']) ?>">

    <button type="submit">Guardar</button>
  </form>
</main>
</body>
</html>
