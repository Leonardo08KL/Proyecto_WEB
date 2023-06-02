<?php
require('./CONEXION/conexion.php');

$query = "SELECT id_estado, estado FROM estado ORDER BY estado";
$resultado = $conn->query($query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>SING UP</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='./styles/indexStyle.css'>

</head>

<body>
    <form action="./INSERTAR_DATOS_USUARIO/ingresar_datos.php?WORK=Datos_Perfil_Profesional" method="POST">
        <fieldset>
            <div>
                <label class="form-label mt-4">Nombre De la Instituci&oacute;n</label>
                <input type="text" class="form-control" name="institucion">
            </div>

            <div>
                <label class="form-label mt-4">Fecha Ingreso</label>
                <input type="text" class="form-control" name="fecha_ingreso_institucion" placeholder="Ejemplo: 2019-08">
            </div>

            <div>
                <label class="form-label mt-4">Fecha de Egreso</label>
                <input type="text" class="form-control" name="fecha_egreso_institucion" placeholder="Ejemplo: 2023-06">
            </div>

            <div>
                <label class="form-label mt-4">Descripci&oacute;n</label>
                <textarea rows="5" class="form-control" name="descripcion"></textarea>
            </div>

            <div class="text-center mt-5 mb-3">
                <input type="hidden" name="boton" value="5">
                <input type="submit" value="Registrar" class="btn btn-lg btn-outline-danger btn-block">
            </div>
        </fieldset>
    </form>
</body>

</html>