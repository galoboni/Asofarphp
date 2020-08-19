<?php  
include_once '../../conexion.php';
$sql = "SELECT id_proveedor,nombre FROM co_proveedores";
$res = $Conexion->query($sql);
mysqli_close($Conexion);
$rows = array();
	while($r = mysqli_fetch_assoc($res)){
	 $rows[] = $r;
	}
// Set del contenido de la respuesta
header('Content-Type: application/json; charset=utf8');

echo json_encode($rows, JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);

?>