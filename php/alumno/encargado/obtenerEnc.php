<?php
require_once "../../conexion/conexion.php";
require_once "claseEncargado.php";

$encarg = $_POST['idmosenc'];

$obj = new datos();

echo json_encode($obj->obtenerDatos($encarg));
?>