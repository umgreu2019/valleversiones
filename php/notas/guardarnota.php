<?php 
session_start();
require_once "../conexion/conexion.php";
require_once "Clasenotas.php";
$c=new conex();
$conexion = $c->conexion();

$not=new Nota();
$grado=$_SESSION['respaldo'];
$bimestre=$_SESSION['resbim'];
$carrera=$_SESSION['carrera'];
$area=$_SESSION['area'];

$dato = $_POST['iden'];
$nota = $_POST['nota'];
$zona = $_POST['zona'];

$aux = explode("-",$dato);

$datosn=array(
	$aux[1],
	$aux[0],
	$nota,
	$zona,
	$grado,
	$bimestre,
	$carrera,
	$area
);

echo ($obj=$not->IngresoCuadro($datosn));
