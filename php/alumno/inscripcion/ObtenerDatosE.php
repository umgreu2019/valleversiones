<?php
require_once "../../conexion/conexion.php";
require_once "Clasealumn.php";

$obj = new Alumno();


if(isset($_POST['function']) && $_POST['function']=="1"):
$carnet = $_POST['recarnet'];

echo json_encode($obj->obtenerDatosEstudiante($carnet));
endif;

if(isset($_POST['function']) && $_POST['function']=="2"):
$c=explode("-",$_POST['nombre']);
$carnet = array($c[0],$c[1],$c[2],$c[3]);
echo json_encode($obj->obtenerDatosEstudiante(" ",$carnet));
endif;
