<?php 
require_once "../conexion/conexion.php";
require_once "Claseprofesor.php";
require_once "../login/ClaseIngreso.php";

$repor = new Profesor();
$c        = new conex();
$conexion = $c->conexion();

$estados;

$i   = 0;
$perfil=$_POST['d'];

$consult = "SELECT id_permiso FROM permiso";
$result  = mysqli_query($conexion, $consult);
while ($permisos = mysqli_fetch_row($result)) {

    $content[$i] = $permisos[0];
    $i++;
}
// print_r($content);

$consult2 = "SELECT permisos FROM tipoemple WHERE id_tipoem='$perfil'";
$result2  = mysqli_query($conexion, $consult2);
$perm  = mysqli_fetch_row($result2)[0];

$c = explode(",", $perm);
for ($i = 0; $i < count($c); $i++) {
    $aux[$i] = $c[$i];
}

// print_r($aux);

for ($i = 0; $i < count($content); $i++) {
    for ($j = 0; $j < count($aux); $j++) {
        if ($aux[$j] == $content[$i]) {
            $estados[$i] = $content[$i];
            echo $estados[$i];
            break;
        } else {

        }
    }
}
