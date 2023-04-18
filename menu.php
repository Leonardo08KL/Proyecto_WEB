<?php

$user = null;
// Verificar si la cookie de sesión existe
if (isset($_COOKIE["sessionID"])) {
    // Iniciar la sesión con el identificador de sesión almacenado en la cookie

    session_id($_COOKIE["sessionID"]);
    session_start();

    $user = 1;
    
} else {
    // La cookie de sesión no existe, el usuario no ha iniciado sesión o ha caducado la sesión
    // ...
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">PONTE A CHAMBIAR</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">INICIO
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>

            <?php if($user === 1): ?>
                
            
            <?php else: ?>
                <li class="nav-item">
                <a class="nav-link" href="SingUp.php">Registrarse</a>
                </li>

            <?php endif; ?>



                <li class="nav-item">
                    <a class="nav-link" href="#">Acerca de Nosotros</a>
                </li>
            </ul>
            <form class="d-flex">

            <?php if($user === 1): ?>
                <a class="btn btn-outline-light me-3" href="Mensajes.php">
                    MENSAJES
                </a>

                <a class="btn btn-outline-light me-3" href="CERRAR_SESION/cerrar_sesion.php">CERRAR SESION</a>

                <a class="btn btn-outline-light" href="perfil.php">
                    PERFIL
                </a>

            <?php else: ?>
                <a class="btn btn-outline-light" href="Login.php">
                    INICIAR SESI&Oacute;N
                </a>
            <?php endif;?>
            </form>
        </div>
    </div>
</nav>