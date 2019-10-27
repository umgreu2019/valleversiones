<?php 
session_start();
require_once "../conexion/conexion.php";
require_once 'ClasePago.php';
$c = new conex();
$conexion=$c->conexion();

$obj=new Pago();

$boleta    = $_POST['noboleta'];
$formpago   = $_POST['formpago'];
$area   = $_POST['area'];
$grado = $_POST['grado'];
$tipopago= $_POST['tipoPago'];
$subtot=$_POST['subtot'];
$estudiante=$_POST['estudiante'];
$carrera=$_POST['carrera'];
$cont    = 0;
$control = 0;
$tota=0;
$aux=array();

$anno="SELECT YEAR(NOW())";
$ej=mysqli_query($conexion,$anno);
$ano=mysqli_fetch_array($ej)[0];

$mess="SELECT MONTH(NOW())";
$eje=mysqli_query($conexion,$mess);
$mesi=mysqli_fetch_array($eje)[0];

$sql2="SELECT cr.carrera FROM carrera cr WHERE cr.id_carrera='$carrera'";
$cons2=mysqli_query($conexion,$sql2);
$carr=mysqli_fetch_array($cons2)[0];

$sql3="SELECT fr.concepto  FROM formato_pago fr WHERE fr.id_formato='$formpago'";
$cons3=mysqli_query($conexion,$sql3);
$formp=mysqli_fetch_array($cons3)[0];

$sql4="SELECT ar.DESCRIPCION_AREA  FROM areaescolar ar WHERE ar.id_area='$area'";
$cons4=mysqli_query($conexion,$sql4);
$are=mysqli_fetch_array($cons4)[0];

$sql5="SELECT gr.grado  FROM grado gr WHERE gr.id_grado='$grado'";
$cons5=mysqli_query($conexion,$sql5);
$grad=mysqli_fetch_array($cons5)[0];

$sql6="SELECT tp.tipo FROM tipopago tp WHERE tp.id_tipo='$tipopago'";
$cons6=mysqli_query($conexion,$sql6);
$tipop=mysqli_fetch_array($cons6)[0];


$respuestaT=0;
if (!empty($_POST['meses']) && is_array($_POST['meses'])) 
{

//$arrmes=$_POST['meses'];
// $cont=count($arrmes);
// $tota=($subtot/$cont);
//echo $tota;


foreach ($_POST['meses'] as $estado) {
        $estadox = $estado;

$sql7="SELECT Mes FROM mes WHERE id_mes='$estado'";
$cons7=mysqli_query($conexion,$sql7);
$nmes=mysqli_fetch_array($cons7)[0];        

$tota=$obj->CantidadMensual($estado,$grado);
// echo $tota;
// $total=(($_POST['meses'])/$tot);
    $datos = 
    $boleta."||".
    $formp."||".
    $are."||".
    $grad ."||".
    $tipop."||".
    $tota."||".
    $_POST['estudiante']."||".$carr."||".$nmes;

    $datos2=array($boleta,$formp,$are,$grad,$tipop,$tota,$_POST['estudiante'],$carr,$nmes);
    
    if(isset($_SESSION['tablaPa'])){
        $cont    = count($_SESSION['tablaPa']);
        $aux     = $_SESSION['tablaPa'];
        $control = 0;
    }
    else{
        $cont=0;
        $control = 0;
    }
        if ($cont == 0) {
        $_SESSION['tablaPa'][] = $datos;
        $respuestaT= 3;
        }
        
        if ($cont != 0) {
            
            for ($i = 0; $i < $cont; $i++) {

            $C = explode("||", $aux[$i]);
            /*$datos2 = explode("||", $datos);*/
            

            if ($C[0] == $datos2[0] && $C[1] == $datos2[1] && $C[2] == $datos2[2] && $C[3] == $datos2[3] && $C[4] == $datos2[4] && $C[5] == $datos2[5] && $C[6] == $datos2[6] && $C[7] == $datos2[7] && $C[8] == $datos2[8]) {

            
            $control = $control + 1;
            $respuestaT= 0;
            break;
            }
            
            }
            
            if ($control == 0) {
            $_SESSION['tablaPa'][] = $datos;
            $respuestaT= 3;
            }
            }

    }
    echo $respuestaT;
  }
 else{
 	$sql="SELECT  p.id_boleta,dp.monto,p.total,p.ciclo FROM detalle_pago dp INNER JOIN pago p ON dp.no_boleta=p.id_boleta INNER JOIN formato_pago fp ON fp.id_formato=p.id_formpago INNER JOIN alumno a ON a.carnet=dp.carnet INNER JOIN grado g ON g.id_grado=a.id_grado INNER JOIN areaescolar ar ON ar.id_area=g.id_area INNER JOIN carrera cr ON g.id_carrera=cr.id_carrera INNER JOIN tipopago tp ON tp.id_tipo=dp.id_tipopago WHERE p.id_boleta='$boleta' AND p.id_formpago='$formpago' AND a.carnet='$estudiante' AND cr.id_carrera='$carrera' AND tp.id_tipo='$tipopago' AND g.id_grado='$grado' AND ar.id_area='$area' AND p.ciclo='$ano'";
 	$cons=mysqli_query($conexion,$sql);
 	$result=mysqli_num_rows($cons);
 	if($result!=null || $result!=""){
 		$respuestaT= 1;
 	}

 	else if($result==0 || $result==""){


$sql7="SELECT Mes FROM mes WHERE id_mes='$mesi'";
$cons7=mysqli_query($conexion,$sql7);
$nmes=mysqli_fetch_array($cons7)[0]; 	  	


 	$datos = 
    $_POST['noboleta'] ."||".
    $formp."||".
   	$are."||".
    $grad ."||".
    $tipop."||".
    $_POST['subtot']."||".
    $_POST['estudiante']."||".$carr."||".$nmes;

    $datos2=array($_POST['noboleta'],$formp,$are,$grad,$tipop,$_POST['subtot'],$_POST['estudiante'],$carr,$nmes);
    
    if(isset($_SESSION['tablaPa'])){
    	$cont    = count($_SESSION['tablaPa']);
    	$aux     = $_SESSION['tablaPa'];
    	$control = 0;
    }
    else{
    	$cont=0;
    	$control = 0;
    }
 		

    	if ($cont == 0) {
    	$_SESSION['tablaPa'][] = $datos;
    	echo 3;
		}
		
		if ($cont != 0) {
			
			for ($i = 0; $i < $cont; $i++) {

			$C = explode("||", $aux[$i]);
			/*$datos2 = explode("||", $datos);*/
			

			if ($C[0] == $datos2[0] && $C[1] == $datos2[1] && $C[2] == $datos2[2] && $C[3] == $datos2[3] && $C[4] == $datos2[4] && $C[5] == $datos2[5] && $C[6] == $datos2[6] && $C[7] == $datos2[7] && $C[8] == $datos2[8]) {

			
			$control = $control + 1;
			echo 0;
			break;
			}
			
			}
			
			if ($control == 0) {
			$_SESSION['tablaPa'][] = $datos;
			echo 3;
			}
			}

 	  }

 	  

 	  
 	}





