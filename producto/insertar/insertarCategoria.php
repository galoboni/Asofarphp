<?php  
//$_POST["nombrecategoria"]="PRUEBA3";
if(!empty($_POST["nombrecategoria"])){
$nombrecategoria = $_POST["nombrecategoria"];
include_once '../../conexion.php';
date_default_timezone_set("America/Guayaquil");
$fecha = date('Y-m-d H:i:s');

$sql = "INSERT INTO pr_grupos(`id_empresa`, `nombre`, `estado`, `usuario_creacion`, `fecha_creacion`) VALUES ('1', '$nombrecategoria', 'A', 'admin', '$fecha')";
$res = $Conexion->query($sql);
mysqli_close($Conexion);
}else{
	    $arr = array('mensaje'=>'No hay categoria');
        header('Content-Type: application/json; charset=utf8');
		echo json_encode($arr, JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);

}

?>

