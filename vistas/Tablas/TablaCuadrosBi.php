<?php 

require_once "../../php/conexion/conexion.php";
session_start();

$c        = new conex();
$conexion = $c->conexion();

$html=" ";

$area=$_POST['idarea'];
$grado=$_POST['idnivel'];
$carrera=$_POST['idcarrera'];

$_SESSION['area'] = $_POST['idarea'];
$_SESSION['nivel']=$_POST['idnivel'];
$_SESSION['carrera']=$_POST['idcarrera'];

$g="SELECT id_grado, estado, No_Unidades FROM grado WHERE grado='$grado' AND id_area='$area' AND id_carrera='$carrera'";
$gr = mysqli_query($conexion, $g);
$obt = mysqli_fetch_array($gr);


$sql = "SELECT a.pnombre, a.snombre, a.papellido, a.sapellido
FROM alumno a, areaescolar ae, niveles n, grado g, carrera c
WHERE a.id_grado = g.id_grado AND g.grado = n.id_nivel AND g.id_area = ae.id_area AND g.id_carrera = c.id_carrera
AND a.id_grado='$obt[0]' ORDER BY a.papellido, a.pnombre ASC "; 

$result = mysqli_query($conexion, $sql);
echo $html;

$cont =1;

while ($parame = mysqli_fetch_row($result)) {
  $html="<tr>
          <td>".$cont."</td>
          <td>".$parame[2]." ".$parame[3]."</td>
          <td>".$parame[0]." ".$parame[1]." </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>                  
        </tr>";

echo $html;

$cont++;
}

?>