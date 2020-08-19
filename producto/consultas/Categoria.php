<?php 
include_once '../../conexion.php';
$sql = "SELECT id_grupo,nombre FROM pr_grupos";
$res = $Conexion->query($sql);

$json=array();
		while($registro=mysqli_fetch_assoc($res)){
			$result["id_grupo"]=$registro['id_grupo'];
			$result["nombre"]=$registro['nombre'];
			$json[]=$result;
		}
		mysqli_close($Conexion);
		// Set del contenido de la respuesta
header('Content-Type: application/json; charset=utf8');
		echo json_encode($json,JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);


?>