<?php

$connectionDB = new ConnectionDB();

$sql = $_SESSION['correo'];
$result = $connectionDB->conexion($connectionDB->consulta($sql));


?>

<?php

class ConnectionDB
{


    public function consulta($sql)
    {
        $sql = "SELECT cu.ID_remitente, cu.ID_destinatario, cu.mensaje, cu.fecha_envio, cu.ID_oferta,
        u2.ID_usuario, concat(u2.Nombre,' ', u2.A_paterno,' ', u2.A_materno) as NombreCompleto, u2.Nacimiento, u2.Telefono
    FROM contrato_usuario cu
INNER JOIN usuario u on cu.ID_destinatario = u.ID_usuario
INNER JOIN usuario u2 on cu.ID_remitente = u2.ID_usuario
INNER JOIN cuenta c on u.ID_usuario = c.ID_usuario
WHERE c.correo = '" . $sql . "';";

        return $sql;
    }

    function conexion($sql)
    {
        require('CONEXION/conexion.php');
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Error en la consulta: " . mysqli_error($conn));
        }
        return $result;
    }

    function getDatos($result)
    {
        $IDOferta = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $ID_oferta = $row["ID_oferta"];
            array_push($IDOferta, $ID_oferta);
        }

        return $IDOferta;
    }
}
?>

