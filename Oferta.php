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
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>

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
    <form class="FormularioRegistrarse" action="INSERTAR_DATOS_USUARIO/datos_oferta.php" method="POST">
        <fieldset>
            <legend>Registrar una Oferta</legend>
            <div class="form-group">
                <label class="form-label mt-4">Nombre de la Oferta</label>
                <input type="text" class="form-control" id="Nombre" placeholder="Nombre de la Oferta" name="nombreOferta" required>
            </div>

            <div class="form-group">
                <label class="form-label mt-4">Descripcion</label>
                <textarea class="form-control" id="txtDescripcion" placeholder="Agregue una descripci&oacute;n para que los usuarios puedan seleccionarlo" name="txtDescripcion" rows="8" required></textarea>
            </div>

            <hr />
            <label rows="6" class="form-label">Rangos de Precios</label>

            <div class="form-group">
                <label class="form-label mt-2">Rango Minimo</label>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" name="Rango_minimo" class="form-control" aria-label="Amount (to the nearest dollar)" spellcheck="false" data-ms-editor="true">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label mt-2">Rango Maximo</label>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" name="Rango_maximo" class="form-control" aria-label="Amount (to the nearest dollar)" spellcheck="false" data-ms-editor="true">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="form-label mt-4">TELEFONO DE CONTACTO</label>
                <input type="tel" class="form-control" id="TELEFONO" placeholder="Ingrese un N&uacute;mero de telefono" name="telefono_contacto" required>
            </div>

            <hr />
            <label class="form-label mt-2">UBICACION</label>
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
<script>
    ClassicEditor
        .create(document.querySelector('#txtDescripcion'))
        .catch(error => {
            console.error(error);
        });
</script>

</html>