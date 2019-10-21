<?php 
session_start();
require_once "../conexion/conexion.php";

$_SESSION['grado']=$_POST['id_grado'];
$_SESSION['bimestre']=$_POST['id_bimestre'];
$_SESSION['carrera']=$_POST['id_carrera'];
$_SESSION['area']=$_POST['id_area'];