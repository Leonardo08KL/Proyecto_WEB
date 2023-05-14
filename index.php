<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Proyecto WEB</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src='main.js'></script>
</head>

<body>

    <?php
    include "menu.php";
    ?>

    <?php

    
        
        require('CONSULTAR_DATOS_PERFIL/datos_index.php');
    

    ?>


    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Encuentra y solicita un trabajo ideal</h1>
                <p class="lead fw-normal text-white-50 mb-0">¡Atr&eacute;vete a dar el primer paso hacia tu futuro laboral! Est&aacute;s a solo un paso de lograr el trabajo de tus sueños y nosotros estamos aqu&iacute; para ayudarte a conseguirlo.</p>
            </div>
        </div>
    </header>

    <!--Aver Si Se Modifico-->




    <?php while ($row = mysqli_fetch_assoc($result)) : ?>

        <div class="card mt-5 mb-5 ms-5 me-5">
            <div class="card-header">
                <?php echo $Nombre_oferta = $row['Nombre_oferta']; ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $Nombre_categoria  = $row['Nombre_categoria']; ?></h5>
                <p class="card-text"><?php echo $descripcion = $row['descripcion']; ?></p>

                <?php $ID_oferta = $row['ID_oferta']; ?>
                <a href="./Oferta_usuarios.php?datos=Oferta&ID=<?php echo $ID_oferta; ?>&tu=externo" class="btn btn-primary">Ir a oferta</a>
            </div>
        </div>


    <?php endwhile; ?>

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>

    <script>
        // mostrar la notificación después de enviar el formulario
        <?php if ($_GET['enviado'] == 'true') { ?>
            swal("Session Iniciada", "¡Bienvenido de vuelta!", "success");
        <?php } ?>
        <?php if ($_GET['enviado'] == 'usDone') { ?>
            swal("Bienvenido", "¡Bienvenido nuevo usuario!", "success");
        <?php } ?>
    </script>

</body>

</html>