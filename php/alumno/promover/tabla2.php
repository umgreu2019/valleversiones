<?php
require_once "../../conexion/conexion.php";
$c = new conex();
$conexion=$c->conexion();

$anio=$_POST['anio2'];
$idnivel=$_POST['idnivel2'];
$idarea=$_POST['idarea2'];
$idcarrera=$_POST['idcarrera2'];


$grado="SELECT id_grado FROM grado WHERE grado='$idnivel' AND id_area='$idarea' AND id_carrera='$idcarrera'";
$r = mysqli_query($conexion,$grado);
$obt=mysqli_fetch_row($r);

echo $obt[0];

$sql = "SELECT a.carnet,a.pnombre,a.snombre,a.papellido,a.sapellido,ar.DESCRIPCION_AREA,n.nombre
        FROM alumno a INNER JOIN grado g ON a.id_grado=g.id_grado 
        INNER JOIN niveles n ON g.grado=n.id_nivel 
        INNER JOIN areaescolar ar ON g.id_area=ar.id_area WHERE g.id_grado='$obt[0]' AND ciclo='$anio'";

$result = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_row($result)):
      $html="<tr>
                <td>". $mostrar[0]."</td>
                <td>".$mostrar[1]." ".$mostrar[2]." ".$mostrar[3]."</td>
                <td>".$mostrar[6]." ".$mostrar[5]."</td>
                <td></td>
                <td>
                </td> 
            </tr>";

echo $html;
endwhile;