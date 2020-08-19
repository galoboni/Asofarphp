<?php  
$Host='localhost';
$Usuario='root';
$Contraseña='';
$Basedatos='bd_farmacia_desa';
$Conexion=mysqli_connect($Host,$Usuario,$Contraseña,$Basedatos);
//mysqli_close($Conexion);
if (!$Conexion) {
    echo "Error de Conexion a la Base de Datos";
}
?>