<?php  
session_start();
$nombre = $_POST['nombre'];
$a_paterno = $_POST['apellido_paterno'];
$a_materno = $_POST['apellido_materno'];
$telefono = $_POST['telefono'];
$nacimiento = $_POST['nacimiento'];

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$genero = $_POST['genero'];


$captcha = $_POST['captcha'];



if(empty($captcha)){

    header("Location: ../SingUp.php?enviado=false");
    exit;

} elseif ($captcha == $_SESSION["result"]){

    $connectionDB = new connectionDB();


    if($connectionDB->comprobarCorreoDuplicado($correo)){
        header("Location: ../SingUp.php?enviado=true");
        exit;

    } else {
        
        $connectionDB->insertUsuarios(
            $nombre, 
            $a_paterno, 
            $a_materno,
            $nacimiento,
            $telefono,
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

            header("Location: ../SingUpDatosResidencia.php");
            exit();
    }
    
} else{

    header("Location: ../SingUp.php?enviado=false");
    exit;
    
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
                            $genero){

        require ('../CONEXION/conexion.php');

        $sql = "INSERT INTO usuario(Nombre, A_paterno, A_materno, Nacimiento, Telefono, ID_genero, Foto)
        VALUES 
        (
        '" .$nombre. "',
        '" .$a_paterno. "',
        '" .$a_materno. "',
        '" .$nacimiento. "',
        '" .$telefono. "',
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
        ('" . $correo . "', md5('" . $contrasena . "') ,
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