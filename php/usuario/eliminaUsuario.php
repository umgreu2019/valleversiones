<?php
require_once "../conexion/conexion.php";
require_once "../usuario/Claseprofesor.php";

$obj = new Profesor();

$idUser=$_POST['iduser'];

echo $obj->eiminaUsuario($idUser);
 ?>