<?php
require __DIR__ . '/conexion.php';

try {
    $registros = $pdo->query('SELECT id, nombres, apellidos, correo, telefono, carrera, fecha_creacion
                              FROM estudiantes ORDER BY id DESC')->fetchAll();
} catch (PDOException $e) {
    error_log('[' . date('Y-m-d H:i:s') . '] ' . $e->getMessage() . PHP_EOL, 3, __DIR__ . '/logs/error.log');
    $registros = [];
    $aviso = 'No se pudieron cargar los registros.';
}
// Saneamiento de salida contra XSS
$h = fn($v) => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registros</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<main class="contenedor">
  <nav><a href="index.php">Registrar</a> | <a href="registros.php">Ver registros</a></nav>
  <h1>Estudiantes registrados</h1>
  <?php if (!empty($aviso)): ?><p class="error"><?= $h($aviso) ?></p><?php endif; ?>
  <div class="tabla-wrap">
    <table>
      <thead><tr><th>ID</th><th>Nombres</th><th>Apellidos</th><th>Correo</th><th>Teléfono</th><th>Carrera</th><th>Fecha de creación</th></tr></thead>
      <tbody>
      <?php if (!$registros): ?>
        <tr><td colspan="7">No hay registros.</td></tr>
      <?php endif; ?>
      <?php foreach ($registros as $r): ?>
        <tr>
          <td><?= $h($r['id']) ?></td>
          <td><?= $h($r['nombres']) ?></td>
          <td><?= $h($r['apellidos']) ?></td>
          <td><?= $h($r['correo']) ?></td>
          <td><?= $h($r['telefono']) ?></td>
          <td><?= $h($r['carrera']) ?></td>
          <td><?= $h($r['fecha_creacion']) ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>
</body>
</html>
