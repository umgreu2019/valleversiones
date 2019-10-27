<?php 
require_once "../conexion/conexion.php";
require_once "ClasePago.php";

$obj = new Pago();

$mes=$obj->verPagos($_POST["meses"],$_POST["grado"]);
print_r($mes);

