<?php 
require_once "../conexion/conexion.php";
require_once "ClasePago.php";

$obj= new Pago();
echo json_encode($obj->activar());
