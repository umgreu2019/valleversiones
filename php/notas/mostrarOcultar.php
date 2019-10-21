<?php 
session_start();
$_SESSION['mostrar']="1";

$datos=$_POST['dat'];
if($datos=="0"){
$_SESSION['mostrar']="0";
}
else if($datos=="1"){
$_SESSION['mostrar']="1";
}
echo $datos;
