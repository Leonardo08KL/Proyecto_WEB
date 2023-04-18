<?php
session_start();

$nombre = $_POST['nombre'];
$a_paterno = $_POST['apellido_paterno'];
$a_materno = $_POST['apellido_materno'];
$telefono = $_POST['telefono'];
$nacimiento = $_POST['nacimiento'];

$estado = $_POST['cbx_estado'];
$municipio = $_POST['cbx_municipio'];
$localidad = $_POST['cbx_localidad'];


$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$genero = $_POST['genero'];


$captcha = $_POST['captcha'];

if(empty($captcha)){
    echo "<script>alert('Por favor,".$num1." escriba el captcha');</script>";

    header("Location: ../SingUp.php");
    exit();
} elseif ($captcha == $_SESSION["result"]){



    $connectionDB = new connectionDB();


    if($connectionDB->comprobarCorreoDuplicado($correo)){
        echo "<script>alert('EL CORREO ELECTRONICO YA ESTA REGISTRADO');</script>";
        header("Location: ../SingUp.php");
        exit();

    } else {
        
    echo "<script>alert('SE INCIO SESION EN LA CUENTA');</script>";
        $connectionDB->insertUsuarios(
            $nombre, 
            $a_paterno, 
            $a_materno,
            $nacimiento,
            $telefono,
            $localidad,
            $genero);

    
        $connectionDB->insertarCuenta(
            $nombre, 
            $a_paterno, 
            $a_materno,
            $correo, 
            $contrasena);

            session_start();
            $sessionID = session_id();
            $sessionCorreo = $correo;

            $_SESSION['correo'] = $correo;
      
            setcookie("sessionID", $sessionID, time() + (86400 * 30), "/");
            setcookie("correo", $correo, time() + (86400 * 30), "/");

            header("Location: ../index.php");
            exit();
    }
    
} else{
    echo "<script>alert('El captcha no es correcto ".$_SESSION["result"]." ');</script>";
    header("Location: ../SingUp.php");
    exit();
    
}

session_destroy();

?>

<?php 


class connectionDB{

    function insertUsuarios($nombre, 
                            $a_paterno, 
                            $a_materno,
                            $nacimiento,
                            $telefono,
                            $localidad,
                            $genero){

        require ('../CONEXION/conexion.php');

        $sql = "INSERT INTO usuario(Nombre, A_paterno, A_materno, Nacimiento, Telefono, ID_localidad, ID_genero, Foto)
        VALUES 
        (
        '" .$nombre. "',
        '" .$a_paterno. "',
        '" .$a_materno. "',
        '" .$nacimiento. "',
        '" .$telefono. "',
        " .$localidad. ",
        ".$genero.",
        'https://img.icons8.com/material-rounded/96/null/conference-call.png');";

        $result = mysqli_query($conn, $sql);
    
        if (!$result) {
            die("Error en la consulta: " . mysqli_error($conn));
        }

        mysqli_close($conn);
    }

    function insertarCuenta($nombre, $a_paterno, $a_materno,$correo, $contrasena){ 

        require ('../CONEXION/conexion.php');

        $sql = "INSERT into cuenta(correo, contrasena, ID_usuario) VALUES
        ('" . $correo . "','" . $contrasena . "',
         (select ID_usuario
          from usuario
          where Nombre = '" .$nombre. "' and A_paterno = '" .$a_paterno. "' and
                A_materno = '" .$a_materno. "'));";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
        }
        mysqli_close($conn);

    }

    public static function comprobarCorreoDuplicado($correo){
        require ('../CONEXION/conexion.php');

        $correo = mysqli_real_escape_string($conn, $correo);

        $sql = "SELECT correo
        from cuenta where correo = '$correo';";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Cerrar la conexión a la base de datos
            mysqli_close($conn);
            return true;
        } else {
            // Cerrar la conexión a la base de datos
            mysqli_close($conn);
            return false;
        }
    }
}

?>