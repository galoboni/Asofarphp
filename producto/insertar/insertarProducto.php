
<?php
/*

//PARA PROBAR
$_POST["codigodebarra"]="000001";
$_POST["idarticulo"]=2145;
$_POST["idgrupo"]=15;
$_POST["idsubgrupo"]=510;
$_POST["idpresentacion"]=1273;
$_POST["idmedida"]=501;
$_POST["nombreproducto"]="PRUEBA3 PRUEBA3 EN PRUEBA3 DE PRUEBA3 ";
$_POST["unidadempaque"]=1;
$_POST["medidaempaque"]=1;
$_POST["cantidadporempaque"]=10;
$_POST["medidaporempaque"]=3;
$_POST["idproveedor"]=1;
*/

//VALIDA SI LLEGARON TODOS LOS DATOS
if(
!empty($_POST["codigodebarra"]) && 
!empty($_POST["idarticulo"]) && 
!empty($_POST["idgrupo"]) && 
!empty($_POST["idsubgrupo"]) && 
!empty($_POST["idpresentacion"]) && 
!empty($_POST["idmedida"]) && 
!empty($_POST["nombreproducto"]) && 
!empty($_POST["unidadempaque"]) && 
!empty($_POST["medidaempaque"]) && 
!empty($_POST["cantidadporempaque"]) && 
!empty($_POST["medidaporempaque"]) && 
!empty($_POST["idproveedor"]) 
){

//LOS DATOS RECIBIDOS LOS GUARDAMOS EN UNA VARIABLE

$codigoDeBarra=$_POST["codigodebarra"];
$id_articulo=$_POST["idarticulo"];
$id_grupo=$_POST["idgrupo"];
$id_subgrupo=$_POST["idsubgrupo"];
$id_tipo_presentacion=$_POST["idpresentacion"];
$id_tipo_medidas=$_POST["idmedida"];
$nombre_producto=$_POST["nombreproducto"];
$unidad_empaque_compra=$_POST["unidadempaque"];
$medida_empaque_compra=$_POST["medidaempaque"];
$cantidad_por_empaque_compra=$_POST["cantidadporempaque"];
$medida_por_empaque_compra=$_POST["medidaporempaque"];
$id_proveedor=$_POST["idproveedor"];

$id_producto="";  // SERVIRA DESPUES DE CREARSE


//TRAEMOS LA CONEXION Y FECHA/HORA ACTUAL
include_once '../../conexion.php';
date_default_timezone_set("America/Guayaquil");
$fecha = date('Y-m-d H:i:s');

try {
    //INSERTAMOS EN PRESENTACION 
     $sql = "INSERT INTO pr_medidas (
         `id_articulo`, 
         `id_grupo`, 
         `id_subgrupo`, 
         `id_tipo_presentacion`, 
         `id_tipo_medidas`, 
         `estado`, 
         `usuario_creacion`, 
         `fecha_creacion`) VALUES (
         '$id_articulo', 
         '$id_grupo', 
         '$id_subgrupo', 
         '$id_tipo_presentacion', 
         '$id_tipo_medidas', 
         'A', 
         'admin', 
         '$fecha') ";
         
         $res = $Conexion->query($sql);
     
     } catch (Exception $e) {
         echo 'Excepción capturada: ',  $e->getMessage(), "\n";
     }

try {
    
    //INSERTAMOS EN PRODUCTOS
$sql = "INSERT INTO pr_productos (
    `codigo_barra`,
    `id_empresa`,
    `id_articulo`,
    `id_grupo`,
    `id_subgrupo`,
    `id_tipo_presentacion`,
    `id_tipo_medidas`,
    `descontinuado`,
    `nombre_producto`,
    `receta`,
    `estado`,
    `usuario_creacion`,
    `fecha_creacion`,
    `unidad_empaque_compra`,
    `medida_empaque_compra`,
    `cantidad_por_empaque_compra`,
    `medida_por_empaque_compra`,
    `id_proveedor`) VALUES (
    '$codigoDeBarra',
    '1',
    '$id_articulo',
    '$id_grupo', 
    '$id_subgrupo', 
    '$id_tipo_presentacion', 
    '$id_tipo_medidas', 
    'NO', 
    '$nombre_producto', 
    'NO', 
    'A', 
    'admin', 
    '$fecha', 
    '$unidad_empaque_compra', 
    '$medida_empaque_compra', 
    '$cantidad_por_empaque_compra', 
    '$medida_por_empaque_compra', 
    '$id_proveedor') ";
    
    $res = $Conexion->query($sql);

} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}


try {

    //VALIDADOS Q EXISTA EL PRODUCTO

    $sql="SELECT id_producto FROM pr_productos where id_tipo_presentacion=$id_tipo_presentacion and id_tipo_medidas=$id_tipo_medidas";

    $q = mysqli_query($Conexion,$sql);
        if (mysqli_num_rows($q) > 0) {
            //GUARDARLO EN UN ARRAY
            $array = mysqli_fetch_array($q);
            $id_producto=$array["id_producto"];
            echo $id_producto;
        } else {
            echo "NO EXISTE";
        }
    
    //INSERTAMOS EN LA TABLA PRODUCTO VODEGA

    $bodega=1;
    
    $sql = "INSERT INTO pr_producto_bodega (
    `id_producto`, 
    `id_bodega`, 
    `id_tipo_bodega`, 
    `id_empresa`, 
    `id_sucursal`, 
    `stock_minimo`, 
    `stock_maximo`, 
    `estado`, 
    `usuario_creacion`, 
    `fecha_creacion`) VALUES (
    '$id_producto', 
    '$bodega', 
    '$bodega', 
    '1', 
    '1', 
    '1', 
    '1000', 
    'A', 
    'admin', 
    '$fecha') ";
        
    $res = $Conexion->query($sql);
    mysqli_close($Conexion);
    
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }





}else{
    $arr = array('mensaje'=>'FALTA DATOS');
    header('Content-Type: application/json; charset=utf8');
    echo json_encode($arr, JSON_PRETTY_PRINT,JSON_UNESCAPED_UNICODE);

}

?>






