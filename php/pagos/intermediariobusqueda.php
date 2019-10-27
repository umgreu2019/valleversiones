<?php 
require_once "../conexion/conexion.php";
require_once 'ClasePago.php';
$obj=new Pago();

$datos=array($_POST['codigo'],"carnet","cpersonal");
$dat=$obj->Busqueda($datos);
$grado=$dat['grado'];
$datos=$grado;
$dat2=$obj->BusquedaGrado($datos);
$area=$obj->BusquedaArea($dat2['area']);
$carrera=$obj->BusquedaCarrera($dat2['carrera']);
$arrayHtml=array("estudiante"=>$dat['html'],"grado"=>$dat2['html'],"area"=>$area,"carrera"=>$carrera);
echo json_encode($arrayHtml);