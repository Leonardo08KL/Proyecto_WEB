<?php

    $institucion = $_POST['institucion'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $fecha_egreso = $_POST['fecha_egreso'];
    $descripcion = $_POST['descripcion'];

 
    if(!empty($institucion) and !empty($fecha_egreso) and !empty($fecha_ingreso) and !empty($descripcion)) {

        $connectionDB = new connectionDB();

        $connectionDB->insertarDatos(
            $institucion, 
            $fecha_ingreso, 
            $fecha_egreso, 
            $descripcion);

        
    }
    else{
        header("Location: ./insertar_nivel_estudios.php");
        exit();
    }
?>


<?php 

class connectionDB{

    function insertarDatos($institucion, $fecha_ingreso, $fecha_egreso, $descripcion){

        require ('../CONEXION/conexion.php');

        $sql = "INSERT INTO nivel_estudios(ID_nivel_estudios,
                                            institucion,
                                            fecha_ingreso,
                                            fecha_egreso,
                                            descripcion,
                                            ID_usuario)
                VALUES ((SELECT u.ID_usuario
                            FROM usuario u
                            INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
                        WHERE c.correo = '".$_SESSION['correo']."'),
                '".$institucion."',
                '".$fecha_ingreso."',
                '".$fecha_egreso."',
                '".$descripcion."',
                (SELECT u.ID_usuario
                    FROM usuario u
                    INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
                WHERE c.correo = '".$_SESSION['correo']."'));";

        $result = mysqli_query($conn, $sql);
    
        if (!$result) {
            die("Error en la consulta: " . mysqli_error($conn));
        }

        mysqli_close($conn);
    }

}

?>