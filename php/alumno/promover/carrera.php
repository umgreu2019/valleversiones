<?php
require_once '../../conexion/conexion.php';
$c = new conex();
$conexion = $c->conexion();

$idgrado = $_POST['idnivel'];

$sql = "SELECT  c.id_carrera,c.carrera,n.nombre 
        FROM carrera c INNER JOIN grado g 
        ON c.id_carrera=g.id_carrera 
        INNER JOIN niveles n ON n.id_nivel=g.grado  WHERE n.id_nivel='$idgrado' ORDER BY id_carrera ASC";

$consulta = mysqli_query($conexion, $sql);


$html = "<option  value='0'>Seleccione carrera</option>";
echo $html;

while ($mostrar= mysqli_fetch_array($consulta))
{
	if($mostrar[0]!=0){
    $html = "<option class='text-danger'  value='" . $mostrar[0] . "' > " . $mostrar[2]."-".$mostrar[1] . " </option> ";
	echo $html;
	}
    
}
