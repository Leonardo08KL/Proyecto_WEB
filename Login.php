<?php

if (!empty($_POST['correo']) && !empty($_POST['PWD'])) {

  require('CONEXION/conexion.php');

  $sqlCorreo = "SELECT correo from cuenta where correo = '" . $_POST['correo'] . "';";

  $resCorreo = mysqli_query($conn, $sqlCorreo);

  if (mysqli_num_rows($resCorreo) > 0) {

    $sqlPWD = "SELECT contrasena from cuenta where correo = '" . $_POST['correo'] . "';";

    $resPWD = mysqli_query($conn, $sqlPWD);

    while ($row = mysqli_fetch_array($resPWD)) {
      $password_encriptada = $row['contrasena'];
  }

    $PWDEncrypted = md5($_POST['PWD']);

    if ($PWDEncrypted == $password_encriptada) {
      // la contraseña es válida
      // iniciar sesión del usuario aqui

      session_start();
      $sessionID = session_id();
  
      $_SESSION['correo'] = $_POST['correo'];
      setcookie("correo", $correo, time() + (86400 * 30), "/");
  
      setcookie("sessionID", $sessionID, time() + (86400 * 30), "/");

      header('Location: index.php?enviado=true');
      exit;

    } else {
          echo "<script>alert('CORREO O PASSWORD INCORRECTOS');</script>";
    }

    mysqli_close($conn);

    
  } else {
    mysqli_close($conn);
    echo "<script>alert('CORREO O PASSWORD INCORRECTOS');</script>";
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>SING UP</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel='stylesheet' type='text/css' media='screen' href='./styles/indexStyle.css'>

  <link rel='stylesheet' type='text/css' media='screen' href='Style.css'>
  <script src='main.js'></script>
  
  <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <form class="FormularioRegistrarse" action="Login.php" method="POST">
    <fieldset>
      <legend>Inicar Sesi&oacute;n</legend>

      <div class="form-group">
        <label class="form-label mt-4">Email</label>
        <input type="email" class="form-control" id="Email" name="correo" aria-describedby="emailHelp" placeholder="Email">
      </div>
      <div class="form-group">
        <label class="form-label mt-4">Password</label>
        <input type="password" class="form-control" id="pass" name="PWD" aria-describedby="emailHelp" placeholder="Contraseña">
      </div>
      <div class="text-center mt-5">
        <input type="submit" value="Iniciar Sesion" class="btn btn-lg btn-outline-danger btn-block">
        </a>
      </div>
    </fieldset>
  </form>

</body>

</html>