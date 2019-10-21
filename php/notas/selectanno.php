<?php 
require_once "../conexion/conexion.php";

$c= new conex();
$conexion=$c->conexion();

$sql="SELECT YEAR(NOW())";
$cons=mysqli_query($conexion,$sql);
$result=mysqli_fetch_array($cons);

$html     = "<option  value='0'>Seleccione el ciclo Escolar</option>";
echo $html;
for($i=($result[0]+10); $i>=($result[0]-10);$i--):
  $html = "<option value='" . $i . "' > " . $i . " </option> ";
    echo $html;
endfor;