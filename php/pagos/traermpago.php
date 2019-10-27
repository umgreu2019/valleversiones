<?php 

require_once "../conexion/conexion.php";
require_once 'ClasePago.php';
$obj= new Pago();


$datos=array($_POST['id_pago'],
			 $_POST['grado'],
			 $_POST['estudiante']);

$res=$obj->PrecioTipo($datos);
echo json_encode($res);