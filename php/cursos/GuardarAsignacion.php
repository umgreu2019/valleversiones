<?php
session_start();
require_once '../conexion/conexion.php';
require_once "ClaseAsignacion.php";

$obj = new Cursos();

if (count($_SESSION['tablaAsignacionTem']) == 0) {
    echo 0;
} else {
    $result = $obj->guardarAsignacion();
    unset($_SESSION['tablaAsignacionTem']);
    echo $result;
}
