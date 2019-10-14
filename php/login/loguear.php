<?php
require_once "../conexion/conexion.php";
require_once "ClaseIngreso.php";
require_once "../usuario/ClaseUsuario.php";
require_once "../conexion/conexion2.php";
session_start();

$encrip = new SED();
$us = new Usuario();

if(!isset($_SESSION['intento']))
{
$_SESSION['intento'][]="0";
}

$c = new conex();
$conexion=$c->conexion();

// $c1=new conectar2();
// $conexionb=$c1->conexionb();

$usuario=$_POST['usuario'];
$contra=$_POST['contra'];

$fechhoy=date('d-m-Y');


$pass= $encrip->encryption($contra);

$contador = count($_SESSION['intento']);


$consulta="SELECT * FROM empleado WHERE Usuario='$usuario' and Contra='$pass'";
$resultad=mysqli_query($conexion,$consulta);
$fila=mysqli_num_rows($resultad);
$obtener=mysqli_fetch_array($resultad);



if(isset($obtener['Usuario'])){
$tipo=$obtener['id_tipoem'];

$consulta2="SELECT T.Nom_Rol FROM empleado,tipoemple T WHERE T.id_tipoem=empleado.id_tipoem and empleado.id_tipoem=$tipo";
$resultad2=mysqli_query($conexion,$consulta2);
$obtener2=mysqli_fetch_array($resultad2);

$fecha1=(strtotime ('+'.$obtener[21] , strtotime ($obtener[20])));
$fecha1 = date ('d-m-Y' , $fecha1);

// $f1=(strtotime ('-1 days' , strtotime ($fechhoy)));
// $f1 = date ( 'd-m-Y' , $f1);

$dias=$us->dias_transcurridos($obtener[20],$fecha1);
}

if($contador<6){

if(!$obtener['Usuario']){
  
  $contador=$contador+1;
  $_SESSION['intento'][]=$contador;
  $dato=array("accion"=>0,"contador"=>$contador);
  // echo  0;
  echo  json_encode($dato);

$tabla="empleado";
$estado="fallido";
$accion="Intento de Logueo";

// $conexionba = $conexionb->prepare("CALL REG_BITACORA(?,?,?,?);");
// $conexionba->bind_param("ssss",$tabla,$accion,$usuario,$estado);
// $conexionba->execute();
// $conexionba->close();
// $conexionb->close();
}

else if($usuario==$obtener['Usuario'] && $pass==$obtener['Contra'] && $obtener['Estado']=="Activado"){

    $idusu=$obtener['id_empleado'];    
    unset($_SESSION['intento']);

    $dregreso =$us->Diasparacambio($fechhoy,$idusu);
    if($dregreso<=$dias){
      $_SESSION['usuario']=$obtener['Usuario'];
    $_SESSION['nombre']=$obtener['nombre'];
    $_SESSION['apellido']=$obtener['apellido'];
    $_SESSION['puesto']=$obtener2['Nom_Rol'];
    $_SESSION['Idusuario']=$obtener['id_empleado'];
    
      $tabla="empleado";
      $estado="exitoso";
      $accion="Intento de Logueo";

      // $conexionba = $conexionb->prepare("CALL REG_BITACORA(?,?,?,?);");
      // $conexionba->bind_param("ssss",$tabla,$accion,$usuario,$estado);
      // $conexionba->execute();
      // $conexionba->close();
      // $conexionb->close();

    $us->Obtener_Permiso($idusu);
      // echo 1;
    $dato=array("accion"=>1);
    echo  json_encode($dato);
      
    }
    else if($dregreso>$dias){
    $_SESSION['Idusuario']=$obtener['id_empleado'];
     $_SESSION['Correo']=$obtener['EMAIL'];

      $tabla="empleado";
      $estado="?";
      $accion="Cambio de Contraseña";

      // $conexionba = $conexionb->prepare("CALL REG_BITACORA(?,?,?,?);");
      // $conexionba->bind_param("ssss",$tabla,$accion,$usuario,$estado);
      // $conexionba->execute();
      // $conexionba->close();
      // $conexionb->close();
      // echo 2;

      $dato=array("accion"=>2);
      echo  json_encode($dato);
    }
}

}
else if($contador==6){
  $result=$us->Bloqueo($usuario);
  if($result==3)
  {
    $tabla="empleado";
      $estado="exitoso";
      $accion="Bloqueo del Usuario";

      // $conexionba = $conexionb->prepare("CALL REG_BITACORA(?,?,?,?);");
      // $conexionba->bind_param("ssss",$tabla,$accion,$usuario,$estado);
      // $conexionba->execute();
      // $conexionba->close();
      // $conexionb->close();

    $contador=$contador+1;
  $_SESSION['intento'][]=$contador;
  // echo $result;
  $dato=array("accion"=>$result);
  echo  json_encode($dato);
}
else{
  // echo $result;
  $dato=array("accion"=>$result);
echo  json_encode($dato);
}
}
else if($contador>6){
// echo 5;
$dato=array("accion"=>5);
echo  json_encode($dato);
}
?>

 