<?php
	require ('../CONEXION/conexion.php');
	
	$id_municipio = $_POST['id_municipio'];
	
	$query = "SELECT id_localidad, localidad FROM localidad WHERE id_municipio = '$id_municipio' ORDER BY localidad";
	$resultado=$conn->query($query);
	
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['id_localidad']."'>".$row['localidad']."</option>";
	}
	echo $html;
?>