
<?php  
//$_POST["idcategoria"]=15;
//$_POST["idsubcategoria"]=510;
//$_POST["nombrearticulo"]="PRUEBA2";
if(!empty($_POST["idcategoria"]) && !empty($_POST["idsubcategoria"]) && !empty($_POST["nombrearticulo"]) ){
    $idcategoria = $_POST["idcategoria"];
    $idsubcategoria = $_POST["idsubcategoria"];
    $nombrearticulo = $_POST["nombrearticulo"];
    include_once '../conexion.php';
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO pr_articulo (`id_grupo`, `id_subgrupo`, `nombre_articulo`, `estado`, `usuario_creacion`, `fecha_creacion`) 
    VALUES ('$idcategoria', '$idsubcategoria', '$nombrearticulo', 'A', 'admin', '$fecha');";
    $res = $Conexion->query($sql);
    mysqli_close($Conexion);
    }else{
            $arr = array('mensaje'=>'FALTA DATOS');
            header('Content-Type: application/json; charset=utf8');
            echo json_encode($arr, JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);
    
    }
    
?>