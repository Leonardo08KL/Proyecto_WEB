<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>SING UP</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel='stylesheet' type='text/css' media='screen' href='./styles/indexStyle.css'>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<?php
session_start();

$num1 = rand(1, 10);
$num2 = rand(1, 10);
$operators = array('+', '-', '*');
$operator = $operators[array_rand($operators)];

$_SESSION["result"] = 0;
if ($operator == '+') {
  $_SESSION["result"] = $num1 + $num2;
} elseif ($operator == '-') {
  $_SESSION["result"] = $num1 - $num2;
} elseif ($operator == '*') {
  $_SESSION["result"] = $num1 * $num2;
}

?>

<body>
  <form class="FormularioRegistrarse" action="INSERTAR_DATOS_USUARIO/ingresar_datos_personales.php" method="POST">
    <fieldset>
      <legend>Registrarse</legend>
      <div class="form-group">
        <label class="form-label mt-4">Nombre</label>
        <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="nombre" required>
      </div>

      <div class="form-group">
        <label class="form-label mt-4">Apellido Paterno</label>
        <input type="text" class="form-control" id="Apellidos" placeholder="Apellido Paterno" name="apellido_paterno" required>
      </div>

      <div class="form-group">
        <label class="form-label mt-4">Apellido Materno</label>
        <input type="text" class="form-control" id="Apellidos" placeholder="Apellido Materno" name="apellido_materno" required>
      </div>

      <div class="form-group">
        <label class="form-label mt-4">TELEFONO</label>
        <input type="tel" class="form-control" id="TELEFONO" placeholder="Ingrese un N&uacute;mero de telefono" name="telefono" required>
      </div>

      <div class="form-group">
        <label class="form-label mt-4">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="NACIMIENTO" name="nacimiento" value="<?php echo date('Y-m-d'); ?>" required>
      </div>

      <div class="form-group">
        <label class="form-label mt-4">Genero</label>
        <select class="form-select" name="genero">
          <option value="1">Masculino</option>
          <option value="2">Femenino</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label mt-4">Email</label>
        <input type="email" class="form-control" id="Email" placeholder="Ingrese un Correo Electronico" name="correo" required>
      </div>

      <div class="form-group">
        <label class="form-label mt-4">Password</label>
        <input type="password" class="form-control" id="pass" placeholder="Ingrese una contraseña" name="contrasena" required>
      </div>

      <div class="form-group">
        <label class="form-label mt-4"">Resuelva la operacion para validar el captacha</label>

            <input type=" text" class="form-control" id="captcha" placeholder="<?php echo $num1 . ' ' . $operator . ' ' . $num2; ?>" name="captcha">
      </div>

      <div class="text-center mt-5">
        <input type="submit" value="Registrarse" class="btn btn-lg btn-outline-danger btn-block">
      </div>
      
    </fieldset>
  </form>

  <script>
        // mostrar la notificación después de enviar el formulario
        <?php if ($_GET['enviado'] == 'false') { ?>
            swal("Captcha Incorrecto", "¡El captcha es incorrecto!", "error");
        <?php } 
        if ($_GET['enviado'] == 'true') { ?>
            swal("Correo Duplicado", "¡El correo electronico ya existe!", "error");
        <?php } ?>
    </script>

</body>

</html>