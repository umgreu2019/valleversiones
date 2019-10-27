<?php
require_once "../../conexion/conexion.php";
$id_dept= $_POST['id_dept'];
$c = new conex();
$conexion=$c->conexion();
 $sql="SELECT * FROM municipio WHERE id_depto=$id_dept ORDER BY id_muni ASC";
 $consulta= mysqli_query($conexion,$sql);
 $html ="<option  value=''>SELECCIONE EL MUNICIPIO</option>";
 echo $html;
while ($mostrar = mysqli_fetch_array($consulta)) {
 $html="<option class='text-danger'  value='".$mostrar['municipio']."'>".$mostrar['municipio']."</option>";
 echo $html; 
}
 ?>