<?php 
require_once '../../conexion/conexion.php';
$cone=new conex();
$conexion=$cone->conexion();

$var=$_POST['envio'];

if($var==='puesto'){
$consulta="SELECT * FROM tipoemple WHERE id_tipoem!='6'";
$ejecu=mysqli_query($conexion,$consulta);
$html='<option value="0" disabled selected>REMITENTES POR (<p id="op">Puesto</p>)</option>';
while($row=mysqli_fetch_array($ejecu)){
$html.='<option value="'.$row['Nom_Rol'].'">'.$row['Nom_Rol'].'</option>';
}
echo $html;
}else if($var==='nombre'){
	$consulta="SELECT * FROM empleado";
	$ejecu=mysqli_query($conexion,$consulta);
	$html='<option value="0" disabled selected>REMITENTES POR (<p id="op">NOMBRE DEL USUARIO</p>)</option>';
	while($row=mysqli_fetch_array($ejecu)){
	$html.='<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
	}
echo $html;
}