<?php
session_start();
require_once '../conexion/conexion.php';

$c = new conex();
$conexion=$c->conexion();
$cont =1;
$idarea     =$_POST['idarea'];
$idnivel    =$_POST['idnivel'];
$idcarrera  =$_POST['idcarrera'];

$html="";

$grado="SELECT id_grado FROM grado WHERE grado='$idnivel' AND id_area='$idarea' AND id_carrera='$idcarrera'";
$r = mysqli_query($conexion,$grado);
$obt=mysqli_fetch_row($r);


$cursos="SELECT c.CURSO, c.DESCRIPCION FROM obtener o, curso c WHERE o.id_curso=c.id_curso AND id_grado='$obt[0]'";
$result = mysqli_query($conexion, $cursos);

echo $html;

while ($mostrar = mysqli_fetch_row($result)):
      $html="<tr>
                <td>". $cont."</td>
                <td>".$mostrar[0]."</td>
                <td>".$mostrar[1]."</td> 
            </tr>";
        $cont++;
echo $html;
endwhile;