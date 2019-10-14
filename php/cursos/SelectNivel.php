<?php
session_start();

require_once '../conexion/conexion.php';
$c        = new conex();
$conexion = $c->conexion();

$id_area = $_POST['id_area'];

$sql      = "SELECT * FROM grado WHERE id_area=$id_area ORDER BY id_grado ASC";
$consulta = mysqli_query($conexion, $sql);
$html     = "<option  value=''>Seleccione Nivel</option>";
echo $html;
while ($mostrar = mysqli_fetch_array($consulta)) {
    $html = "<option class='text-danger'  value='" . $mostrar['id_grado'] . "' > " . $mostrar['grado'] . " </option> ";
    echo $html;
}
