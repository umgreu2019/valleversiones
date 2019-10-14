<?php
session_start();
$index = $_POST['index'];
unset($_SESSION['tablaAsignacionTem'][$index]);
$datos = array_values($_SESSION['tablaAsignacionTem']);
unset($_SESSION['tablaAsignacionTem']);
$_SESSION['tablaAsignacionTem'] = $datos;
