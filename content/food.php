<?php
$conexion = new mysqli("localhost", "alimentos", "1234", "proyecto");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT * FROM alimentos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Lista de Alimentos</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>

<div class="food-container">
  <h1 class="food-title">Lista de Alimentos</h1>

  <table>
    <thead>
      <tr>
        <th>Alimento</th>
        <th>Distribuidor</th>
        <th>Cantidad</th>
        <th>Precio (€)</th>
      </tr>
    </thead>
    <tbody>
    <?php while ($row = $resultado->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['alimento']) ?></td>
        <td><?= htmlspecialchars($row['distribuidor']) ?></td>
        <td><?= intval($row['cantidad']) ?></td>
        <td><?= number_format($row['precio'], 2) ?> €</td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>

  <div class="actions">
    <a href="index.php"><button>Registrar nuevo alimento</button></a>
  </div>
</div>

</body>
</html>

<?php
$conexion->close();
?>
