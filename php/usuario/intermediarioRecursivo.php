<?php 
require_once "Claseprofesor.php";

$repor = new Profesor();

$function=$_POST['function'];

if($function==='GenerarContra'){
$obj=$repor->GenerarContra();
echo $obj;
}
if($function==='GenerarUsuario'){
$datos=$_POST['datos'];
$obj=$repor->GenerarUsuario($datos);
echo $obj;
}