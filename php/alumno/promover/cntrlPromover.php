<?php 
require_once '../../conexion/conexion.php';
require_once 'clase/clsPromover.php';

$anio       =date("Y");//año actual
$check      =$_POST['chekk'];
$idarea     =$_POST['idarea2'];
$idnivel    =$_POST['idnivel2'];
$idcarrera  =$_POST['idcarrera2'];
$anio2      =$_POST['anio'];//año del select 1 

$obj = new promocion();

echo json_encode($obj->updatePromocion($check,$idarea,$idnivel,$idcarrera,$anio,$anio2));
