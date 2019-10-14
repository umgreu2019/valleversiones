<?php
require_once "../conexion/conexion.php";
require_once "../usuario/Claseprofesor.php";

$obj = new Profesor();

$iduserr=$_POST['iduser'];
$posi=$obj->obtenerDatosUsuario($iduserr);
echo json_encode($posi);
 ?>
