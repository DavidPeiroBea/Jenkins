<!DOCTYPE html>
<html>
<head>
  <title>Mi web con Docker y Jenkins</title>
  <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <head>

  </head>
  <h1>Pedidos para la tienda</h1>
  <div class="container">
    <h1>Registrar Comida</h1>
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
      <button type="submit">Registrar</button>
    </form>
</body>
</html>
