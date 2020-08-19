
<?php
//$_POST["idsubgrupo"]=12;
if(!empty($_POST["idsubgrupo"])){
	$idsubgrupo = $_POST["idsubgrupo"];
	include_once '../../conexion.php';
$sql = "SELECT id_articulo,nombre_articulo FROM pr_articulo where id_subgrupo=$idsubgrupo";
$res = $Conexion->query($sql);
mysqli_close($Conexion);
$rows = array();
	while($r = mysqli_fetch_assoc($res)){
	 $rows[] = $r;
	}
// Set del contenido de la respuesta
header('Content-Type: application/json; charset=utf8');

echo json_encode($rows, JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);
	
}else{
	    $arr = array('mensaje'=>'No hay idsubgrupo');
        header('Content-Type: application/json; charset=utf8');
		echo json_encode($arr, JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);

}

?>