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
  <link rel='stylesheet' type='text/css' media='screen' href='Style.css'>
  <script language="javascript" src="js/jquery-3.1.1.min.js"></script>

  <script language="javascript">
    $(document).ready(function() {
      $("#cbx_estado").change(function() {

        $('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

        $("#cbx_estado option:selected").each(function() {
          id_estado = $(this).val();
          $.post("VALIDAR_ESTADOS/getMunicipio.php", {
            id_estado: id_estado
          }, function(data) {
            $("#cbx_municipio").html(data);
          });
        });
      })
    });

    $(document).ready(function() {
      $("#cbx_municipio").change(function() {
        $("#cbx_municipio option:selected").each(function() {
          id_municipio = $(this).val();
          $.post("VALIDAR_ESTADOS/getLocalidad.php", {
            id_municipio: id_municipio
          }, function(data) {
            $("#cbx_localidad").html(data);
          });
        });
      })
    });
  </script>
</head>

<body>
  <form class="FormularioRegistrarse" action="INSERTAR_DATOS_USUARIO/ingresar_datos.php?WORK=Datos_Residencia" method="POST">
    <fieldset>
      <legend>Ingresa los datos de donde te ubicas</legend>

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
      <div class="text-center mt-5">
        <input type="submit" value="Registrarse" class="btn btn-lg btn-outline-danger btn-block">
      </div>

    </fieldset>
  </form>
</body>

</html>