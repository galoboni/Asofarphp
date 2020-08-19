
<?php  
//$_POST["medida"]="PRUEBA2";
if( !empty($_POST["medida"]) ){
    $medida = $_POST["medida"];
    include_once '../conexion.php';
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO pr_tipo_medidas (`id_empresa`, `nombre_tipo_medida`, `estado`, `usuario_creacion`, `fecha_creacion`) 
    VALUES ('1', '$medida', 'A', '1', '$fecha') ";
    $res = $Conexion->query($sql);
    mysqli_close($Conexion);
    }else{
            $arr = array('mensaje'=>'FALTA DATOS');
            header('Content-Type: application/json; charset=utf8');
            echo json_encode($arr, JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);
    
    }
    
?>