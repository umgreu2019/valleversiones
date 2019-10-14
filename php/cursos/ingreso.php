<?php 
require_once '../conexion/conexion.php';
require_once "ClaseAsignacion.php";
$obj= new Cursos();


// $datos=array(
// $_POST['curso'],
// $_POST['descr'],
// $_POST['nivel'],
// $_POST['car'],
// $_POST['area']
// );
$contador =$_POST['contador'];
$arreglo = $_POST['arreglo'];

print_r($arreglo);

//{"curso":"d","descr":"d","area":"2","nivel":"5","car":"0"}

// print_r('curso: '.$arreglo[0]['curso']);
echo $obj->insertarCurso($arreglo,$contador);