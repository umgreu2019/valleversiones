<?php
require_once '../../conexion/conexion.php';
$c = new conex();
$conexion=$c->conexion();

$id=$_POST['id'];

$sql    =   "SELECT a.carnet,a.pnombre,a.snombre,a.papellido,a.sapellido,ar.DESCRIPCION_AREA,n.nombre, a.ciclo
             FROM alumno a INNER JOIN grado g ON a.id_grado=g.id_grado 
             INNER JOIN niveles n ON g.grado=n.id_nivel 
             INNER JOIN areaescolar ar ON g.id_area=ar.id_area WHERE a.carnet='$id'";

$rslt=      mysqli_query($conexion,$sql);
$obj=       mysqli_fetch_array($rslt);

$html="<div class='card'>
            <div class='card-header'>
                <p id='idcarnet' name='idcarnet'>".$obj[0]."</p>
                <p>Estudiante: ".$obj[1]." ".$obj[2]." ".$obj[3]."</p>
            </div>
            <div class='card-body'>
            <h5 class='card-title'>Grado: ".$obj[6]." ".$obj[5]."</h5>
            <p class='card-text' id='idciclo' name='idciclo'>".$obj[7]."</p>
            </div>
        </div>";

echo $html;