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
    <title>Perfil de Usuario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!--CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='./styles/indexStyle.css'>

    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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

    <style>
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active,
        .accordion:hover {
            background-color: #ccc;
        }

        .panel {
            padding: 0 18px;
            display: none;
            background-color: white;
            overflow: hidden;
        }
    </style>

</head>

<body>
    <?php
    include "menu.php";
    ?>

    <?php
    require('CONSULTAR_DATOS_PERFIL/datos_perfil.php');
    ?>
    <div class="container mt-5 mb-5 card">
        <div class="card-header text-center fs-2 mb-3">
            <b>EDITAR DATOS</b>
        </div>

        <button class="accordion">Editar Foto</button>
        <div class="panel">

            <form action="EditarDatos/EditarDatos.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <div>
                        <input name="imagen" class="form-control mt-3" type="file" accept="image/*">
                    </div>
                    <div class="text-center mt-5 mb-3">
                        <input type="hidden" name="boton" value="1">
                        <input type="submit" id="editarfoto" value="Registrar" class="btn btn-lg btn-outline-danger btn-block">
                    </div>
                </fieldset>
            </form>
        </div>

        <button class="accordion">Editar Datos</button>
        <div class="panel">
            <form action="EditarDatos/EditarDatos.php" method="POST">
                <fieldset>
                    <div>
                        <label class="form-label mt-4">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                    </div>

                    <div>
                        <label class="form-label mt-4">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apellido_paterno" value="<?php echo $a_paterno; ?>">
                    </div>

                    <div>
                        <label class="form-label mt-4">Apellido Materno</label>
                        <input type="text" class="form-control" name="apellido_materno" value="<?php echo $a_materno; ?>">
                    </div>

                    <div>
                        <label class="form-label mt-4">Telefono</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $telefono; ?>">
                    </div>

                    <div>
                        <label class="form-label mt-4">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="nacimiento" value="<?php echo $nacimiento; ?>">
                    </div>

                    <div>
                        <label class="form-label mt-4">Genero</label>
                        <input type="text" class="form-control" name="genero" value="<?php echo $genero; ?>">
                    </div>

                    <div class="text-center mt-5 mb-3">
                        <input type="hidden" name="boton" value="2">
                        <input type="submit" id="editardatos" value="Registrar" class="btn btn-lg btn-outline-danger btn-block">
                    </div>
                </fieldset>
            </form>
        </div>

        <button class="accordion">Editar Estado de Residencia</button>
        <div class="panel">
            <form action="EditarDatos/EditarDatos.php" method="POST">
                <fieldset>
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

                    <div class="text-center mt-5 mb-3">
                        <input type="hidden" name="boton" value="3">
                        <input type="submit" id="editarLocalidad" value="Registrar" class="btn btn-lg btn-outline-danger btn-block">
                    </div>

                </fieldset>
            </form>
        </div>

        <button class="accordion">Editar Contraseña</button>
        <div class="panel">
            <form action="EditarDatos/EditarDatos.php" method="POST">
                <fieldset>
                    <div>
                        <label class="form-label mt-4">Contraseña Anterior</label>
                        <input type="text" class="form-control" name="contrasenaAnterior">
                    </div>

                    <div>
                        <label class="form-label mt-4">Contraseña Nueva</label>
                        <input type="text" class="form-control" name="contrasenaNueva">
                    </div>

                    <div class="text-center mt-5 mb-3">
                        <input type="hidden" name="boton" value="4">
                        <input type="submit" value="Registrar" class="btn btn-lg btn-outline-danger btn-block">
                    </div>
                </fieldset>
            </form>
        </div>

        <button class="accordion">Editar Nivel De Estudios</button>
        <div class="panel">
            <form action="EditarDatos/EditarDatos.php" method="POST">
                <fieldset>
                    <div>
                        <label class="form-label mt-4">Nombre De la Instituci&oacute;n</label>
                        <input type="text" class="form-control" name="institucion" value="<?php echo $institucion; ?>">
                    </div>

                    <div>
                        <label class="form-label mt-4">Fecha Ingreso</label>
                        <input type="text" class="form-control" name="fecha_ingreso_institucion" value="<?php echo $fecha_ingreso; ?>">
                    </div>

                    <div>
                        <label class="form-label mt-4">Fecha de Egreso</label>
                        <input type="text" class="form-control" name="fecha_egreso_institucion" value="<?php echo $fecha_egreso; ?>">
                    </div>

                    <div>
                        <label class="form-label mt-4">Descripci&oacute;n</label>
                        <textarea rows="5" class="form-control" name="descripcion"><?php echo $descripcion; ?></textarea>
                    </div>

                    <div class="text-center mt-5 mb-3">
                        <input type="hidden" name="boton" value="5">
                        <input type="submit" value="Registrar" class="btn btn-lg btn-outline-danger btn-block">
                    </div>
                </fieldset>
            </form>
        </div>

        <button class="accordion">Editar Experiencia Laboral</button>



        <div class="panel">
            <div class="d-grid gap-2 mt-5 mb-5">
                <form action="./Nueva_Experiencia_Laboral.php" method="POST">
                    <input class="btn btn-lg btn-primary" type="submit" value="Ingresa Nueva Experiencia Laboral" />
                </form>
            </div>
            <hr>

            <?php while ($row = mysqli_fetch_assoc($resultExperiencia)) : ?>
                <form action="EditarDatos/EditarDatos.php" method="POST">
                    <fieldset>

                        <input type="hidden" name="ID_Experiencia" value=" <?php echo $ID_Experiencia = $row['ID_experiencia']; ?>">

                        <div>
                            <label class="form-label mt-4">Nombre</label>
                            <input type="text" class="form-control" name="nombreExp" value="<?php echo $row['Nombre_experiencia']; ?>">
                        </div>

                        <div>
                            <label class="form-label mt-4">Fecha Ingreso</label>
                            <input type="text" class="form-control" name="fecha_ingreso_Exp" value="<?php echo $row['Fecha_ingreso']; ?>">
                        </div>

                        <div>
                            <label class="form-label mt-4">Fecha de Egreso</label>
                            <input type="text" class="form-control" name="fecha_egreso_Exp" value="<?php echo $row['Fecha_egreso']; ?>">
                        </div>

                        <div>
                            <label class="form-label mt-4">Descripci&oacute;n</label>
                            <textarea class="form-control" rows="6" cols="35" name="descripcionExp"><?php echo $row['Descripcion']; ?></textarea>
                        </div>

                        <div class="text-center mt-5 mb-3">
                            <input type="hidden" name="boton" value="6">
                            <input type="submit" value="Registrar" class="btn btn-lg btn-outline-danger btn-block">
                        </div>
                    </fieldset>
                </form>

                <form action="EditarDatos/EditarDatos.php" method="POST">
                    <input type="hidden" name="ID_Experiencia" value=" <?php echo $ID_Experiencia = $row['ID_experiencia']; ?>">

                    <div class="text-center mt-5 mb-3">
                        <input type="hidden" name="boton" value="7">
                        <input type="submit" value="Borrar" class="btn btn-lg btn-outline-danger btn-block">
                    </div>
                </form>
                <hr>
            <?php endwhile; ?>
        </div>


        <div class="card-footer">

        </div>

    </div>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>

    <script>
        // mostrar la notificación después de enviar el formulario
        <?php if ($_GET['enviado'] == 'true') { ?>
            swal("Datos enviados", "¡Gracias por enviar tus datos!", "success");
        <?php } elseif ($_GET['enviado'] == 'false') { ?>
            swal("Contraseña Incorrecta", "Vuela a introducir su contraseña", "success");
        <?php } ?>
    </script>
</body>

</html>