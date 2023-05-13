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

    require('CONSULTAR_DATOS_PERFIL/datos_ofertas.php');
    ?>


    <?php while ($row = mysqli_fetch_assoc($result)) : ?>

        <div class="card mt-5 mb-5 ms-5 me-5">
            <div class="card-header">
            <?php echo $Nombre_oferta = $row['Nombre_oferta']; ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $Nombre_categoria  = $row['Nombre_categoria']; ?></h5>
                <p class="card-text"><?php echo $descripcion = $row['descripcion']; ?></p>

                <?php $ID_oferta = $row['ID_oferta']; ?>
                <a href="./Oferta_usuarios.php?datos=Oferta&ID=<?php echo $ID_oferta; ?>&tu=original" class="btn btn-primary">Ir a oferta</a>
            </div>
        </div>

        
    <?php endwhile; ?>


</body>

</html>