<?php
	require ('./CONEXION/conexion.php');
	
	$query = "SELECT id_estado, estado FROM estado ORDER BY estado";
	$resultado=$conn->query($query);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>SING UP</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel='stylesheet' type='text/css' media='screen' href='Style.css'>
  <script language="javascript" src="js/jquery-3.1.1.min.js"></script>

  <script language="javascript">
			$(document).ready(function(){
				$("#cbx_estado").change(function () {

					$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_estado option:selected").each(function () {
						id_estado = $(this).val();
						$.post("VALIDAR_ESTADOS/getMunicipio.php", { id_estado: id_estado }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
					$("#cbx_municipio option:selected").each(function () {
						id_municipio = $(this).val();
						$.post("VALIDAR_ESTADOS/getLocalidad.php", { id_municipio: id_municipio }, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});
		</script>
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
  <form class="FormularioRegistrarse" action="INSERTAR_DATOS_USUARIO/DatosSingUp.php" method="POST">
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
        <label class="form-label mt-4">ESTADO</label>
        <select name="cbx_estado" id="cbx_estado" class="form-control">
          <option value="0">Seleccionar Estado</option>

          <?php while ($row = $resultado->fetch_assoc()) { ?>
            <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
          <?php } ?>

        </select>
      </div>

      <div class="form-group">
        <label class="form-label mt-4">MUNICIPIO</label>
        <select name="cbx_municipio" id="cbx_municipio" class="form-control">          
        </select>
      </div>

      <div class="form-group">
        <label class="form-label mt-4">LOCALIDAD</label>
        <select name="cbx_localidad" id="cbx_localidad" class="form-control">          
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

</body>

</html>