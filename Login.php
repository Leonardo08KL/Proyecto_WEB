<?php 

if (!empty($_POST['correo']) && !empty($_POST['password'])){

  require ('CONEXION/conexion.php');
  
  $sql = "SELECT correo from cuenta where correo = '".$_POST['correo']."' and contrasena = '".$_POST['password']."';";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      mysqli_close($conn);

      session_start();
      $sessionID = session_id();

      $_SESSION['correo'] = $_POST['correo'];
      setcookie("correo", $correo, time() + (86400 * 30), "/");



      setcookie("sessionID", $sessionID, time() + (86400 * 30), "/");

      header("Location: index.php");
      exit();
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
    <link rel='stylesheet' type='text/css' media='screen' href='Style.css'>
    <script src='main.js'></script>
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
            <input type="password" class="form-control" id="pass" name="password" aria-describedby="emailHelp" placeholder="Contraseña">
          </div>
          <div class="text-center mt-5">
          <input type="submit" value="Iniciar Sesion" class="btn btn-lg btn-outline-danger btn-block">
			</a>
          </div>
        </fieldset>
      </form>
    
</body>
</html>