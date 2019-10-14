<?php

class conectar2{
public function conexionb(){
  // $conexion=new mysqli('localhost','root','','u689229854_cd');
	$conexion=new mysqli('localhost','root','','bdicat');
  return $conexion;
}
}