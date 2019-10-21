<?php
session_start();

require_once "../conexion/conexion.php";
$c        = new conex();
$conexion = $c->conexion();

$idarea = $_POST['id_area'];

//$sql = "SELECT * FROM nivel WHERE id_division=$id_area ORDER BY idNivel ASC";

$sql = "SELECT DISTINCT g.grado, n.nombre FROM grado g INNER JOIN areatrabajo a ON a.id_area=g.id_area INNER JOIN niveles n ON g.grado=n.id_nivel
        WHERE a.id_area='$idarea'";

$consulta = mysqli_query($conexion, $sql);
$html     = "<option  value='0'>Seleccione el Grado</option>";
echo $html;
while ($mostrar = mysqli_fetch_row($consulta)) {
    $html = "<option value='" . $mostrar[0] . "' > " . $mostrar[1] . " </option> ";
    echo $html;
}
?>