<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Perfil de Usuario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!--CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <?php
    include "menu.php";
    ?>

    <?php

    require('CONSULTAR_DATOS_PERFIL/datos_perfil.php');
    ?>
    <div class="container mt-5">
        <div class="main-body">

            <!-- /Breadcrumb -->

            <div class="row gutters-sm">

                <div class="col-md-4 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?= $foto ?>" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <button class="btn btn-primary">Cambiar Foto</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mt-3">
                                    <h4> Nivel de Estudios </h4>
                                    <p class="text-secondary mb-1">----</p>
                                    <p class="text-muted font-size-sm">---</p>
                                    <a class="btn btn-primary" href="NIVEL_ESTUDIOS/insertar_nivel_estudios.php">EDITAR</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nombre Completo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $nombre_completo; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Genero</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $genero; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Correo Electronico</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $correo; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Telefono</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $telefono; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Estado donde reside</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo "Localida: " . $localidad . "<br/> Municipio: " . $municipio . "<br/> Estado: " . $estado; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank" href="">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">EXPERIENCIA LABORAL</h6>

                                </div>

                                <div class="card-body">
                                    <div class="col-sm-12">
                                        <a class="btn btn-info " target="__blank" href="">Editar</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>


</body>

</html>