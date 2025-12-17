<!DOCTYPE html>
<html>
<head>
  <title>Mi web con Docker y Jenkins - Nuevo Contenido</title>
  <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <h1>¡Bienvenido a la Gestión de Stock!</h1>
    <p>Utiliza el formulario para registrar nuevos artículos en el inventario.</p>
  </div>
  <div class="container" style="margin-top: 20px;">
    <h1>Gestión de Stock de Alimentos</h1>
    <form id="registroForm" method="POST" action="guardar.php">
      <div>
        <label for="alimento">Alimento</label>
        <input type="text" id="alimento" name="alimento" required />
      </div>
      <div>
        <label for="distribuidor">Distribuidor</label>
        <input type="text" id="distribuidor" name="distribuidor" required />
      </div>
      <div>
        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" min="0" step="1" required />
      </div>
      <div>
        <label for="precio">Precio (EUR)</label>
        <input type="number" id="precio" name="precio" min="0" step="0.5" required />
      </div>
      <button type="submit">Guardar Registro</button>
    </form>
  </div>
</body>
</html>
