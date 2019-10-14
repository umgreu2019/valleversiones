<?php
require_once "../conexion/conexion.php";
require_once "../usuario/Claseprofesor.php";
require_once "../login/ClaseIngreso.php";
$obj = new Profesor();


$a= new SED();
$contra = $a->encryption($_POST['Uppass']);

$datos = array(
    $_POST['UpIdUsuario'],
    $_POST['UpDPI'],
    $_POST['UpNombre'],
    $_POST['UpApellido'],
    $_POST['Updepton'],
    $_POST['Upmunin'],
    $_POST['Uppuesto'],
    $_POST['Updireccion'],
    $_POST['Uptelefono'],
    $_POST['Upusuario'],
    $contra);
print_r($datos);
   /* echo $datos[0]."--";
    echo $datos[1]."--";
    echo $datos[2]."--";
    echo $datos[4]."--";
    echo $datos[5]."--";
    echo $datos[6]."--";
    echo $datos[7]."--";
    echo $datos[8]."--";*/
echo $obj->actualizaUsuario($datos);