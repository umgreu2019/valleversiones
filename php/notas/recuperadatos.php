<?php 
require_once "../conexion/conexion.php";
require_once "Clasenotas.php";

$c=new conex();
$conexion=$c->conexion();

$obj=new Nota();
$carne=$_POST['carne'];
echo $not=json_encode($obj->Alumno($carne));

