<?php
session_start();

$connectionDB = new ConnectionDB();

$mss = $_POST['message'];
$sql = $_SESSION['correo'];
$ID = intval($_GET['ID']);

    //Insertar contrato usuario
    $op = 2;
    $sqlConsulta = $connectionDB->consulta($sql, $op, $mss, $ID);
    $connectionDB->conexion($sqlConsulta);




// $op = 1;
// $mss = $_POST['message'];
// $sql = $_SESSION['correo'];
// $ID = intval($_GET['ID']);

// $sqlConsulta = $connectionDB->consulta($sql, $op, $mss, $ID);
// $DatoExiste = $connectionDB->DatoExiste($connectionDB->conexion($sqlConsulta));

// echo $DatoExiste;
// if ($DatoExiste == 0) {

//     //Insertar contrato usuario
//     $op = 2;
//     $sqlConsulta = $connectionDB->consulta($sql, $op, $mss, $ID);
//     $connectionDB->conexion($sqlConsulta);

//     //Obtener el ID de usuario de contrato_usuario
//     $op = 1;
//     $sqlConsulta = $connectionDB->consulta($sql, $op, $mss, $ID);
//     $ID = $connectionDB->getDatos($connectionDB->conexion($sqlConsulta));

//     //Insertar contrato
//     $op = 3;
//     $sqlConsulta = $connectionDB->consulta($sql, $op, $mss, $ID);
//     $connectionDB->conexion($sqlConsulta);
// } else {
//     //Obtener el ID de usuario de contrato_usuario
//     $op = 1;
//     $sqlConsulta = $connectionDB->consulta($sql, $op, $mss, $ID);
//     $ID = $connectionDB->getDatos($connectionDB->conexion($sqlConsulta));

//     //Insertar contrato
//     $op = 3;
//     $sqlConsulta = $connectionDB->consulta($sql, $op, $mss, $ID);
//     $connectionDB->conexion($sqlConsulta);
// }

?>

<?php

class ConnectionDB
{
    public function consulta($sql, $op, $mss, $ID)
    {
        switch ($op) {
            case 1:
                $sql = "SELECT cu.ID_contrato_usuarios
                FROM usuario u INNER JOIN actividad_profesional ap on u.ID_usuario = ap.ID_usuario
                INNER JOIN contrato_usuario cu on ap.ID_oferta = cu.ID_oferta
                WHERE cu.ID_oferta = 20 and cu.ID_usuario_contratante = (
                SELECT U.ID_usuario
                FROM usuario u INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
                WHERE c.correo = '" . $sql . "') and cu.ID_usuario_contratista = (SELECT U.ID_usuario
                FROM usuario u INNER JOIN actividad_profesional ap on u.ID_usuario = ap.ID_usuario
                WHERE ID_oferta = " . $ID . ");";
                return $sql;
                break;

            case 2:
                $sql = "INSERT INTO contrato_usuario(ID_remitente, ID_destinatario, mensaje, fecha_envio, ID_oferta)
                VALUES ((SELECT u.ID_usuario
                         FROM usuario u
                                  INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
                         WHERE c.correo = '".$sql."'),
                        (SELECT u.ID_usuario
                         FROM usuario u
                                  INNER JOIN actividad_profesional ap on u.ID_usuario = ap.ID_usuario
                         WHERE ID_oferta = ".$ID."),'".$mss."', now(), ".$ID.");";

                return $sql;
                break;
            case 3:
                $sql = "INSERT INTO contrato(tipo_usuario, mensaje, fecha, ID_contrato_usuarios)
                VALUES ('contratante','" . $mss . "',
                        (now())," . $ID . ");";

                return $sql;
                break;
        }
    }

    function conexion($sql)
    {
        require('../CONEXION/conexion.php');

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Error en la consulta: " . mysqli_error($conn));
        }

        return $result;
    }

    function getDatos($result)
    {
        while ($row = mysqli_fetch_assoc($result)) {
            // Acceder a los valores de cada fila
            $ID_contrato_usuarios = $row["ID_contrato_usuarios"];
        }

        return $ID_contrato_usuarios;
    }

    function DatoExiste($result)
    {
        $DatoExiste = 0;
        if (mysqli_num_rows($result) > 0) {
            $DatoExiste = 1;
            return $DatoExiste;
        } else {
            return $DatoExiste;
        }
    }
}
?>

