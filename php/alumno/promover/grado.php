<?php
require_once "../../conexion/conexion.php";
$c        = new conex();
$conexion = $c->conexion();

$id_area = $_POST['idarea'];

$sql      = "SELECT DISTINCT g.grado,n.nombre,ar.DESCRIPCION_AREA FROM grado g INNER JOIN areaescolar ar 
			 ON ar.id_area=g.id_area INNER JOIN niveles n ON n.id_nivel=g.grado WHERE g.id_area='$id_area' 
			 ORDER BY id_grado ASC";

$consulta = mysqli_query($conexion, $sql);

$html     = "<option  value=''>SELECCIONE GRADO</option>";
echo $html;

while ($mostrar= mysqli_fetch_array($consulta)){
	if($id_area!='1'):
    $html = "<option class='text-danger'  value='" . $mostrar[0] . "' > " . $mostrar[1]."-".$mostrar[2] . " </option> ";
	endif;
	if($id_area=='1'):
	$html = "<option class='text-danger'  value='" . $mostrar[0] . "' > " . $mostrar[1]. " </option> ";
	endif;
	    echo $html;
}
