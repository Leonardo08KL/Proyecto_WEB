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
    <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <script src='main.js'></script>
</head>

<body>
    <?php
    include "menu.php";
    ?>

    <?php

    require('CONSULTAR_DATOS_PERFIL/datos_ofertas.php');
    ?>

    <div class="container mt-5 mb-5 card">
        <div class="card-header text-center fs-2">
            <b><?php echo $Nombre_oferta; ?></b>
        </div>

        <div class="main-body mt-5 ">
            <!-- /Breadcrumb -->
            <div class="row gutters-sm">
                <div class="col-md-4 mb-5">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mt-3">
                                    <div class="card-header">
                                        <h6 class="mb-0">CONTACTO</h6>
                                    </div>
                                    <h4> TELEFONO DE CONTACTO </h4>
                                    <p class="text-secondary mb-1">
                                        <?php echo $Telefono_contacto; ?>
                                    </p>
                                    <hr />
                                    <h4> Direccion de Contacto </h4>
                                    <p class="text-secondary mb-1">
                                        <?php echo $Direccion . '<br><b>Localidad: </b>' . $localidad . '<br><b>Municipio: </b>' . $municipio . '<br><b>Estado: </b>' . $estado; ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php if ($_GET['tu'] == "externo") { ?>
                        <div class="card text-center mt-5">
                            <div class="card-body">
                                <a href="./perfil.php?ID=<?php $IDUser = $_GET['ID']; echo $_GET['ID']; ?>" class="btn btn-primary">Ver Perfil</a>
                            </div>
                        </div>

                        <div class="card text-center mt-5">
                            <div class="card-body">
                            </div>
                        </div>

                    <?php } ?>
                </div>

                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="card-header">
                                    <h6 class="mb-0">DESCRIPCI&Oacute;N</h6>
                                </div>
                                <hr />
                                <h4> Categoria de la oferta </h4>
                                <p class="text-secondary mb-1">
                                    <?php echo $Nombre_categoria; ?>
                                </p>

                                <hr />
                                <h4> Rango Maximo de pago </h4>
                                <p class="text-secondary mb-1">
                                    <?php echo $Rango_maximo; ?>
                                </p>


                                <hr />
                                <h4> Rango Minimo de Pago </h4>
                                <p class="text-secondary mb-1">
                                    <?php echo $Rango_minimo; ?>
                                </p>


                                <hr />
                                <h4> Descripcion </h4>
                                <p class="text-secondary mb-1">
                                    <?php echo $Descripcion; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <?php if ($_GET['tu'] == "original") { ?>
            <div class="card-footer text-center">
                <a href="EditarDatos.php" class="btn btn-primary">EDITAR DATOS</a>
            </div>
        <?php } ?>


    </div>

    <div class="container mt-5 mb-5 card">
        <div class="main-body mt-5  text-center fs-2">

            <?php if (session_status() == PHP_SESSION_NONE) {
                $Session = "./SingUp.php";
            } else {
                $Session = "INSERTAR_DATOS_USUARIO/insertar_datos_mensaje.php?ID=".$_GET['ID'];
            } ?>


            <form action="<?php echo $Session; ?>" method="POST">
                <h3 style="text-align: center;">Contact Us</h3>

                <div class="form-group">
                    <div class="input-group">

                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter message" required></textarea>
                </div>
                <input type="submit" value="Enviar Mensaje" class="btn btn-primary  mb-5 mt-5">
            </form>

        </div>
    </div>

    <script>
        // mostrar la notificación después de enviar el formulario
        <?php if ($_GET['enviado'] == 'true') { ?>
            swal("Oferta Publicada", "¡Gracias por enviar su oferta!", "success");
        <?php } elseif ($_GET['enviado'] == 'false') { ?>
            swal("Contraseña Incorrecta", "Vuela a introducir su contraseña", "success");
        <?php } ?>
    </script>

</body>

</html>