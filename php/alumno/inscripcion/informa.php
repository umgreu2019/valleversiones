<?php
require_once "../../conexion/conexion.php";
require_once "Clasealumn.php";
$a = new Alumno();


    //En función del parámetro que nos llegue ejecutamos una función u otra
    
        echo json_encode($a -> generarCarnet());
        


?>