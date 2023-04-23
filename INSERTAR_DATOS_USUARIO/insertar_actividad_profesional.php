<?php

    $institucion = $_POST['institucion'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $fecha_egreso = $_POST['fecha_egreso'];
    $descripcion = $_POST['descripcion'];

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>EDITAR NIVEL DE ESTUDIOS</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel='stylesheet' type='text/css' media='screen' href='../Style.css'>

</head>

<body>
  <form class="FormularioRegistrarse" action="./insertar_nivel_estudios.php" method="POST">

    <fieldset>
      <legend>Actividad Profesional</legend>
      <div class="form-group">
        <label class="form-label mt-4">INSTITUCION</label>
        <input type="text" class="form-control" placeholder="INSTITUCION" name="institucion" required>
      </div>

      <div class="form-group">
        <label class="form-label mt-4">FECHA DE INGRESO</label>
        <input type="date" class="form-control" placeholder="Fecha de Ingreso" name="fecha_ingreso" required>
      </div>

      <div class="form-group">
        <label class="form-label mt-4">FECHA DE EGRESO</label>
        <input type="date" class="form-control" placeholder="Fecha de Egreso" name="fecha_egreso" required>
      </div>
    
      <div class="form-group">
        <label class="form-label mt-4 fs-5">DESCRIPCION</label>
        <br>
        <label class="form-label fs-6"><mark> Agregue una descripci&oacute;n acerca de su Nivel de estudios </mark></label>
        <input type="text" class="form-control" placeholder="Ingrese una descripcion" name="descripcion" required>
      </div>

      <div class="text-center mt-5">
        <input type="submit" value="INSERTAR DATOS" class="btn btn-lg btn-outline-danger btn-block">
      </div>

    </fieldset>
  </form>

</body>

</html>