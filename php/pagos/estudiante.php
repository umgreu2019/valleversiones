<?php

require_once "../conexion/conexion.php";
$c        = new conex();
$conexion = $c->conexion();

$id_area = $_POST['id_area'];
$id_nivel = $_POST['id_nivel'];
$id_grado= $_POST['id_grado'];

if($id_nivel >= 4){
$sql  = "SELECT a.carnet,a.cpersonal,a.pnombre,a.snombre,a.papellido,a.sapellido FROM alumno a INNER JOIN grado g ON g.id_grado=a.id_grado INNER JOIN areaescolar c ON c.id_area=g.id_area INNER JOIN carrera d ON d.id_carrera=g.id_carrera WHERE c.id_area='$id_nivel' AND g.grado='$id_grado' AND d.id_carrera='$id_area' ORDER BY papellido ASC";


$consulta = mysqli_query($conexion, $sql);
$html     = "<option  value=''>Seleccione el Estudiante</option>";
echo $html;
while ($mostrar = mysqli_fetch_array($consulta)) {
if($mostrar[1]=="" || $mostrar[1]=="0" || $mostrar[1]==null){
    $html = "<option class='text-danger'  value='" . $mostrar[0] . "' > " . $mostrar[0]."-".$mostrar[5]." ".$mostrar[4]." ".$mostrar[3]." ".$mostrar[2]. " </option> ";
	}
	else{
	$html = "<option class='text-danger'  value='" . $mostrar[1] . "' > " . $mostrar[1]."-".$mostrar[4]." ".$mostrar[5]." ".$mostrar[2]." ".$mostrar[3]. " </option> ";
	}
echo $html;
}

}else{
$sql ="SELECT a.carnet,a.cpersonal,a.pnombre,a.snombre,a.papellido,a.sapellido FROM alumno a INNER JOIN grado g ON g.id_grado=a.id_grado INNER JOIN areaescolar c ON c.id_area=g.id_area INNER JOIN carrera d ON d.id_carrera=g.id_carrera WHERE c.id_area='$id_nivel' AND g.grado='$id_area' AND d.id_carrera='$id_grado' ORDER BY papellido ASC";


$consulta = mysqli_query($conexion, $sql);
$html     = "<option  value=''>Seleccione el Estudiante</option>";
echo $html;
while ($mostrar = mysqli_fetch_array($consulta)) {
	if($mostrar[1]=="" || $mostrar[1]=="0" || $mostrar[1]==null){
    $html = "<option class='text-danger'  value='" . $mostrar[0] . "' > " . $mostrar[0]."-".$mostrar[5]." ".$mostrar[4]." ".$mostrar[3]." ".$mostrar[2]. " </option> ";
	}
	else{
	$html = "<option class='text-danger'  value='" . $mostrar[1] . "' > " . $mostrar[1]."-".$mostrar[4]." ".$mostrar[5]." ".$mostrar[2]." ".$mostrar[3]. " </option> ";
	}
    echo $html;
}
}