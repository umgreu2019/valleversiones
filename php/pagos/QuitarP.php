<?php
session_start();
$index = $_POST['index'];
unset($_SESSION['tablaPa'][$index]);
$datos = array_values($_SESSION['tablaPa']);
unset($_SESSION['tablaPa']);
$_SESSION['tablaPa'] = $datos;