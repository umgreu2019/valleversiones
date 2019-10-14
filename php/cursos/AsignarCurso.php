<?php
session_start();
require_once '../conexion/conexion.php';
require_once "ClaseAsignacion.php";

$c        = new conex();
$conexion = $c->conexion();

$obj = new Cursos();

$area    = $_POST['area'];
$nivel   = $_POST['nivel'];
$curso   = $_POST['curso'];
$docente = $_POST['docente'];

$sql1    = "SELECT AREA_ROL FROM areatrabajo WHERE id_area='$area'";
$result  = mysqli_query($conexion, $sql1);
$obtener = mysqli_fetch_array($result);

$sql2     = "SELECT grado FROM grado WHERE id_grado='$nivel'";
$result2  = mysqli_query($conexion, $sql2);
$obtener2 = mysqli_fetch_array($result2);

$sql3     = "SELECT CURSO FROM curso WHERE id_curso='$curso'";
$result3  = mysqli_query($conexion, $sql3);
$obtener3 = mysqli_fetch_array($result3);



$sql4     = "SELECT nombre,apellido FROM empleado WHERE id_empleado='$docente'";
$result4  = mysqli_query($conexion, $sql4);
$obtener4 = mysqli_fetch_array($result4);

$sql5 = "SELECT id_obtener FROM obtener WHERE id_curso='$curso' and id_grado='$nivel'";
$result5  = mysqli_query($conexion, $sql5);
$obtener5 = mysqli_fetch_array($result5);
$datos2 = 
array(
    $obtener['AREA_ROL'],
    $obtener2['grado'],
    $obtener3['CURSO'],
    $obtener4['nombre'],
    $obtener4['apellido']);

$datos = 
    $obtener['AREA_ROL'] ."||".
    $obtener2['grado'] ."||".
    $obtener3['CURSO'] ."||".
    $obtener4['nombre'] ."||".
    $obtener4['apellido'] ."||".
    $docente ."||".
    $obtener5['id_obtener'];

    $cont    = count($_SESSION['tablaAsignacionTem']);
    $aux     = $_SESSION['tablaAsignacionTem'];
    $control = 0;


if ($cont == 0) {
    $_SESSION['tablaAsignacionTem'][] = $datos;
    echo 1;
}

if ($cont != 0) {
    for ($i = 0; $i < $cont; $i++) {
        $C = explode("||", $aux[$i]);
        /*$datos2 = explode("||", $datos);*/

        if ($C[0] == $datos2[0] && $C[1] == $datos2[1] && $C[2] == $datos2[2] && $C[3] == $datos2[3] && $C[4] == $datos2[4]) {
            echo 0;
            $control = $control + 1;
            break;
        }
        if ($C[1] == $datos2[1] && $C[2] == $datos2[2]) {
            echo 0;
            $control = $control + 1;
            break;
        }
    }

    if ($control == 0) {
        $_SESSION['tablaAsignacionTem'][] = $datos;
        echo 1;
    }
}

/*if (isset($_SESSION['tablaAsignacionTem'])) {
foreach (@$_SESSION['tablaAsignacionTem'] as $key) {
$mostrar = explode("||", @$key);
if(){

}else{

}
}

} else {
$_SESSION['tablaAsignacionTem'][] = $datos;
echo 1;
}*/
?>