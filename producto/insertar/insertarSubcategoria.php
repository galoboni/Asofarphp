<?php  
//$_POST["idcategoria"]=15;
//$_POST["nombresubcategoria"]="PRUEBA2";
if(!empty($_POST["idcategoria"]) && !empty($_POST["nombresubcategoria"]) ){
    $idcategoria = $_POST["idcategoria"];
    $nombresubcategoria = $_POST["nombresubcategoria"];
    include_once '../conexion.php';
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s');
    
    $sql = " INSERT INTO pr_subgrupos (`id_grupo`, `id_empresa`, `nombre`, `estado`, `usuario_creacion`, `fecha_creacion`) VALUES ('$idcategoria', '1', '$nombresubcategoria', 'A', 'admin', '$fecha')";
    $res = $Conexion->query($sql);
    mysqli_close($Conexion);
    }else{
            $arr = array('mensaje'=>'FALTA DATOS');
            header('Content-Type: application/json; charset=utf8');
            echo json_encode($arr, JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);
    
    }
    
?>