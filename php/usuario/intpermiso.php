<?php 
require_once "../conexion/conexion.php";
require_once "Claseprofesor.php";
// require_once "../login/ClaseIngreso.php";

$repor = new Profesor();

$id=$_POST['id_up'];
echo $repor->habilitar_desabilitar($id);