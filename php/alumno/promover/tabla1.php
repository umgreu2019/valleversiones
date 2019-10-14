<?php
session_start();
require_once "../../conexion/conexion.php";

$c = new conex();
$conexion=$c->conexion();

//$anio=date("Y");
$idnivel=$_POST['idnivel'];
$anio=$_POST['anio'];
$idarea=$_POST['idarea'];
$idcarrera=$_POST['idcarrera'];


$html="";

$grado="SELECT id_grado FROM grado WHERE grado='$idnivel' AND id_area='$idarea' AND id_carrera='$idcarrera'";
$r = mysqli_query($conexion,$grado);
$obt=mysqli_fetch_row($r);

$sql = "SELECT a.carnet,a.pnombre,a.snombre,a.papellido,a.sapellido,ar.DESCRIPCION_AREA,n.nombre 
        FROM alumno a INNER JOIN grado g ON a.id_grado=g.id_grado 
        INNER JOIN niveles n ON g.grado=n.id_nivel 
        INNER JOIN areaescolar ar ON g.id_area=ar.id_area WHERE g.id_grado='$obt[0]' AND ciclo='$anio'";

$result = mysqli_query($conexion, $sql);

echo $html;

while ($mostrar = mysqli_fetch_row($result)):
      $html="<tr>
                <td>". $mostrar[0]."</td>
                <td>".$mostrar[1]." ".$mostrar[2]." ".$mostrar[3]."</td>
                <td>".$mostrar[6]." ".$mostrar[5]."</td>
                <td></td>
                <td>
                <input class='form-check-input' type='checkbox' id='chekk' name='chekk[]' value='".$mostrar[0]."'>
                </td> 
            </tr>";

echo $html;
endwhile;