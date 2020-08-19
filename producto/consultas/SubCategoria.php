
<?php
//$_POST["idcategoria"]=3;
if(!empty($_POST["idcategoria"])){
	$idcategoria = $_POST["idcategoria"];
    include_once '../conexion.php';
	$sql = "SELECT id_subgrupo,nombre FROM pr_subgrupos where id_grupo=$idcategoria";
	$res = $Conexion->query($sql);
	mysqli_close($Conexion);
	$rows = array();
	while($r = mysqli_fetch_assoc($res)){
	 $rows[] = $r;
	}
header('Content-Type: application/json; charset=utf8');

echo json_encode($rows, JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);
}else{
	    $arr = array('mensaje'=>'No hay categoria');
        header('Content-Type: application/json; charset=utf8');
		echo json_encode($arr, JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);

}

?>
