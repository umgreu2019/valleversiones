<?php 
require_once "../conexion/conexion.php";
class Nota{

public function Alumno($carne){
$con = new conex();
$conexionb = $con->conexion();

$consulta="SELECT a.pnombre,a.snombre,a.papellido,a.sapellido  FROM alumno a WHERE a.carnet='$carne' OR a.cpersonal='$carne'";
$execute=mysqli_query($conexionb,$consulta);

$obtener = mysqli_fetch_array($execute);

        $datos = array(
            "pnombre"  => $obtener[0],
        	"snombre"  => $obtener[1],
        	"papellido"  => $obtener[2],
        	"sapellido"  => $obtener[3]);
return $datos;
}

public function Datos($nombre,$nombre2,$apellido,$apellido2){
$con = new conex();
$conexionb = $con->conexion();

$consulta="SELECT a.cpersonal FROM alumno a WHERE a.pnombre='$nombre' and a.snombre='$nombre2' and a.papellido='$apellido' and a.sapellido='$apellido2'";
$execute=mysqli_query($conexionb,$consulta);

$obtener = mysqli_fetch_array($execute);

        $datos = array(
            "cpersonal"  => $obtener[0]);
return $datos;
}

public function Promediado($obtener,$alumno,$bimestre,$anno){
$con = new conex();
$conexionb = $con->conexion();
$to=0;

for($i=0; $i<$bimestre; $i++){
 $o=($i+1);
$consulta="SELECT notafinal FROM nota WHERE id_obtener='$obtener' AND id_alumno='$alumno' AND bimestre='$o' AND ciclo_escolar='$anno'";
$execute=mysqli_query($conexionb,$consulta);
$resul=mysqli_fetch_array($execute);
$num=mysqli_num_rows($execute);


$to=($to+ (int)($resul[0]));

}
return ($to/$bimestre);
}


public function IngresoCuadro($datos){
	$con = new conex();
	$conexionb = $con->conexion();
	$anno=self::Anno();
	$obtener=self::ObtenerIdob($datos[1],$datos[4],$datos[5],$datos[6],$datos[7]);
	$resultado=self::Compara($obtener,$datos[0],$datos[5],$anno);

$total=round($datos[2]+$datos[3]);
$execute2=0;
echo $resultado;

echo "obtener: ".$obtener;

if($resultado >0){
	$consulta="UPDATE nota SET nota='$datos[2]',zona='$datos[3]',notafinal='$total' WHERE id_obtener='$obtener' AND id_alumno='$datos[0]' AND bimestre='$datos[5]' AND ciclo_escolar='$anno'";
	$execute=mysqli_query($conexionb,$consulta);
	$promedio=self::Promediado($obtener,$datos[0],$datos[5],$anno);
	$consulta2="UPDATE nota SET promedio='$promedio' WHERE id_obtener='$obtener' AND id_alumno='$datos[0]' AND bimestre='$datos[5]' AND ciclo_escolar='$anno'";
	$execute2=mysqli_query($conexionb,$consulta2);
}else{
	$consulta="INSERT INTO nota(id_obtener,id_alumno,bimestre,nota,zona,ciclo_escolar,notafinal) VALUE('$obtener','$datos[0]','$datos[5]','$datos[2]','$datos[3]','$anno','$total')";
	$execute=mysqli_query($conexionb,$consulta);
}
return ($execute+$execute2);
}

	/*
$datosn=array(
	$aux[1],
	$aux[0],
	$nota,
	$zona,
	$grado,
	$bimestre,
	$carrera,
	$area
);
 */

function ObtenerIdob($curso,$grado,$bimestre,$carrera,$area){
	$con = new conex();
	$conexionb = $con->conexion();

	$grado="SELECT id_grado FROM grado WHERE grado='$grado' AND id_area='$area' AND id_carrera='$carrera'";
	$r = mysqli_query($conexionb,$grado);
	$obt=mysqli_fetch_array($r);


	$conslt="SELECT id_obtener FROM obtener WHERE id_grado='$obt[0]' AND id_curso='$curso'";
	$exc=mysqli_query($conexionb,$conslt);
	$obtener = mysqli_fetch_array($exc);

	return $obtener[0];
}

function Anno(){
	$con = new conex();
	$conexionb = $con->conexion();
	$conslt="select YEAR(NOW())";
	$exc=mysqli_query($conexionb,$conslt);
	$anno = mysqli_fetch_array($exc);

	return $anno[0];
}

function Compara($obtener,$alumno,$bimestre,$anno){
	$con = new conex();
	$conexionb = $con->conexion();
	$conslt="SELECT nota,zona,notafinal FROM nota WHERE id_obtener='$obtener' AND id_alumno='$alumno' AND bimestre='$bimestre' AND ciclo_escolar='$anno'";

	$exc=mysqli_query($conexionb,$conslt);
	$obtener = mysqli_num_rows($exc);
	return $obtener;	
}

}