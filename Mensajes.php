<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Perfil de Usuario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!--CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
    require('CONSULTAR_DATOS_PERFIL/datos_mensajes_usuaurios.php');
    ?>

    <div class="container mt-5 mb-5 card">
        <div class="card-header text-center fs-2 mb-3">
            <b>EDITAR DATOS</b>
        </div>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>


                <form action="EditarDatos/EditarDatos.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <div class="list-group mb-5">
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?php echo $NombreCompleto = $row['NombreCompleto']; ?></h5>
                                    <small><?php echo $fecha_envio = $row['fecha_envio']; ?></small>
                                </div>
                                <p class="mb-1"><?php echo $mensaje = $row['mensaje']; ?></p>
                                <small><?php echo $Telefono = $row['Telefono']; ?></small>
                            </a>
                        </div>
                    </fieldset>
                </form>
        <?php endwhile; ?>

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