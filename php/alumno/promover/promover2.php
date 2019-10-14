<?php 
require_once "../../conexion/conexion.php";
require_once 'clase/clsPromover.php';

$anio       =date("Y");
$idcarnet   =$_POST['idcarnet'];
$idarea     =$_POST['idarea3'];
$idnivel    =$_POST['idnivel3'];
$idcarrera  =$_POST['idcarrera3'];
$idciclo    =$_POST['idciclo'];

$carnet = array($idcarnet);

$obj = new promocion();

echo json_encode($obj->updatePromocion($carnet,$idarea,$idnivel,$idcarrera,$anio,$idciclo));
