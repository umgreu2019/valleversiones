<?php
session_start();

require_once '../conexion/conexion.php';
$c        = new conex();
$conexion = $c->conexion();

$idnivel = $_POST['idnivel'];

//$sql = "SELECT * FROM nivel WHERE id_division=$id_area ORDER BY idNivel ASC";

$sql = "SELECT c.id_curso,c.CURSO from curso c INNER JOIN obtener a ON a.id_curso=c.id_curso INNER JOIN grado n ON a.id_grado=n.id_grado WHERE n.id_grado='$idnivel'";

$consulta = mysqli_query($conexion, $sql);
$html     = "<option  value=''>Seleccione Curso</option>";
echo $html;
while ($mostrar = mysqli_fetch_row($consulta)) {
    $html = "<option value='" . $mostrar[0] . "' > " . $mostrar[1] . " </option> ";
    echo $html;
}
?>