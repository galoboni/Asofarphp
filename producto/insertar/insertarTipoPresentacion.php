
<?php  
//$_POST["presentacion"]="PRUEBA2";
if( !empty($_POST["presentacion"]) ){
    $presentacion = $_POST["presentacion"];
    include_once '../../conexion.php';
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO pr_tipo_presentacion (`nombre`, `estado`, `usuario_creacion`, `fecha_creacion`) 
    VALUES ('$presentacion', 'A', 'admin', '$fecha')";
    $res = $Conexion->query($sql);
    mysqli_close($Conexion);
    }else{
            $arr = array('mensaje'=>'FALTA DATOS');
            header('Content-Type: application/json; charset=utf8');
            echo json_encode($arr, JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);
    
    }
    
?>