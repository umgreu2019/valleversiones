<?php 
require_once "../conexion/conexion.php";
require_once "Clasenotas.php";

$c=new conex();
$conexion=$c->conexion();

$obj=new Nota();
$carne=$_POST['alumno'];
$aux=explode("-",$carne);
echo $not=json_encode($obj->Datos($aux[0],$aux[1],$aux[2],$aux[3]));

