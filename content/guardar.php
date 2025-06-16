<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}
$password = trim(file_get_contents(__DIR__ . '/.dbpass'));
$conexion = new \mysqli("mysql_db", "alimentos", $password, "proyecto");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$alimento = $_POST['alimento'];
$distribuidor = $_POST['distribuidor'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

$stmt = $conexion->prepare("INSERT INTO alimentos (alimento, distribuidor, cantidad, precio) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssid", $alimento, $distribuidor, $cantidad, $precio);  // s = string, s = string, i = int, d = double

if ($stmt->execute()) {
    echo "<h3>Alimento registrado correctamente.</h3>";
} else {
    echo "<h3>Error: " . $stmt->error . "</h3>";
}

$stmt->close();
$conexion->close();
?>

<div>
        <a href="index.php"><button>Registrar otro alimento</button></a>
        <a href="food.php"><button>Ver alimentos</button></a>
</div>
