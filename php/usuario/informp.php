<?php
require_once "../conexion/conexion.php";
require_once "Claseprofesor.php";
require_once "../login/ClaseIngreso.php";
$repor = new Profesor();


$estadox;

$c            = new conex();
$conexion     = $c->conexion();

$fecha_actual=date("d/m/Y");

$perfil = $_POST['idemple'];

$a= new SED();
$contra = $a->encryption($_POST['pass']);

$i       = 0;
$consult = "SELECT id_permiso FROM permiso";
$result  = mysqli_query($conexion, $consult);

while ($permisos = mysqli_fetch_array($result)) {

    $content[$i] = $permisos[0];
    $i++;
}

// print_r($content);

$consult2 = "SELECT permisos FROM tipoemple WHERE id_tipoem='$perfil'";
$result2  = mysqli_query($conexion, $consult2);
$perm     = mysqli_fetch_row($result2)[0];

$c = explode(",", $perm);
for ($i = 0; $i < count($c); $i++) {
    $aux[$i] = $c[$i];
}

// print_r($aux);

for ($i = 0; $i < count($content); $i++) {
    for ($j = 0; $j < count($aux); $j++) {
        if ($aux[$j] == $content[$i]) {
            $estados[$i] = 1;
            break;
        } 
        else {
            $estados[$i] = 0;
        }
    }
}

if (!empty($_POST["estado"]) && is_array($_POST["estado"])) {
    foreach ($_POST["estado"] as $estado) {
        $estadox = $estado;
    }
}


$datos=array(
  $_POST['dpi'],  
  $_POST['tel'],
  $_POST['email'],
  $_POST['nombre'],
  $_POST['apellido'],
  $_POST['cedula'],
  $_POST['profesion'],
  $_POST['idemple'],
  $_POST['residencia'],
  $_POST['ideptor'],
  $_POST['idmunir'],
  $_POST['genero'],
  $_POST['fecha'],
  $_POST['idepto'],
  $_POST['idmuni'],
  $fecha_actual,
  $_POST['acerca'],
  $_POST['usuario'],
  $contra,
  $estadox);


echo $repor->permisos_usuarios($datos,$estados,$content);
?>