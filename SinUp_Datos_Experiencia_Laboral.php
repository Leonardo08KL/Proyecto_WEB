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
    <form class="FormularioRegistrarse" action="./INSERTAR_DATOS_USUARIO/ingresar_datos.php?WORK=Datos_Experiencia_Laboral" method="POST">
        <fieldset>
            <legend>Ingresar Experiencia Laboral</legend>
            <div>
                <label class="form-label mt-4">Nombre</label>
                <input type="text" class="form-control" name="nombreExp">
            </div>

            <div>
                <label class="form-label mt-4">Fecha Ingreso</label>
                <input type="text" class="form-control" name="fecha_ingreso_Exp">
            </div>

            <div>
                <label class="form-label mt-4">Fecha de Egreso</label>
                <input type="text" class="form-control" name="fecha_egreso_Exp">
            </div>

            <div>
                <label class="form-label mt-4">Descripci&oacute;n</label>
                <textarea class="form-control" rows="6" cols="35" name="descripcionExp"></textarea>
            </div>


            <div class="text-center mt-5">
                <input type="hidden" name="boton1" value="1">
                <input type="submit" value="Registrarse" class="btn btn-lg btn-outline-danger btn-block">
            </div>

            <div class="text-center mt-5">
                <input type="hidden" name="boton2" value="2">
                <input type="submit" value="Registrar otra Experiencia Laboral" class="btn btn-lg btn-outline-danger btn-block">
            </div>


            <hr>
        </fieldset>
    </form>
</body>

</html>