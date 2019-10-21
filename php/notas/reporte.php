<?php
session_start();

if(isset($_POST['condicion'])&& $_POST['condicion']=="1"):
$_SESSION['grado']=$_POST['grado'];
$_SESSION['carnet']=$_POST['carnet'];
$_SESSION['ciclo']=$_POST['ciclo']; 
endif;

if(isset($_POST['condicion_e'])&& $_POST['condicion_e']=="2"):
$_SESSION['grado']=$_POST['grado_e'];
$_SESSION['ciclo']=$_POST['ciclo_e1']; 
endif;