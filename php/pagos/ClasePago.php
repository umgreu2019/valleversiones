<?php

/**
 *
 */

class Pago
{
    public function activar(){
     $c        = new conex();
     $conexion = $c->conexion();   

     $consulta = "SELECT DISTINCT t.comienzo_talonario,t.fin_talonario FROM talonarios t INNER JOIN establecimiento es ON es.id_talonario = t.id_talonario INNER JOIN asigna_jornada a ON a.id_establecimiento=es.id_establecimiento INNER JOIN empleado e ON a.id_usuario=e.id_empleado WHERE t.estado!='0' and t.estado!='2'";
     $result=mysqli_query($conexion,$consulta);
     $mos=mysqli_fetch_array($result);
     $resultado=$mos[0]." - ".$mos[1];
     $boleta=self::generarOrdenBoleta($mos[0]);
     $dato=array("resultado"=> $resultado,
                 "boleta"=>$boleta);
     return $dato;
    }

    public function cierre($fecha,$anio){
     $c        = new conex();
     $conexion = $c->conexion();       
     $consulta = " SELECT p.* FROM pago p WHERE p.ciclo='$anio' AND p.fecha='$fecha'"; 
     $result=mysqli_query($conexion,$consulta);
     $i=0;
     $dato=array();
     while($mos=mysqli_fetch_array($result)){
        $dato[$i]=array("boleta"=> $mos[0],"formato"=>$mos[1],"concepto"=>$mos[2],"total"=>$mos[3],"fecha"=>$mos[5]."-".$mos[4]);
        $i++;
     }
     return $dato;
    }
    public function Busqueda($datos_a){
        $c = new conex();
        $conexion=$c->conexion();
        $consulta="SELECT a.carnet,a.cpersonal,a.pnombre,a.snombre,a.papellido,a.sapellido,a.id_grado FROM alumno a WHERE a.carnet='$datos_a[0]' OR a.cpersonal LIKE '%$datos_a[0]%'";
        $html  = "<option  value=''>Seleccione el Estudiante</option>";
        $ej=mysqli_query($conexion,$consulta);
        $mostrar = mysqli_fetch_array($ej);

        if($mostrar[1]=="" || $mostrar[1]=="0" || $mostrar[1]==null){
        $html .= "<option class='text-danger' selected value='" . $mostrar[0] . "' > " . $mostrar[0]."-".$mostrar[5]." ".$mostrar[4]." ".$mostrar[3]." ".$mostrar[2]. " </option> ";
        }
        else{
        $html .= "<option class='text-danger' selected value='" . $mostrar[1] . "' > " . $mostrar[1]."-".$mostrar[4]." ".$mostrar[5]." ".$mostrar[2]." ".$mostrar[3]. " </option> ";
        }    
        $enviar=array("html"=>$html,"grado"=>$mostrar[6]);
     return $enviar;
   }

   public function BusquedaGrado($datos_a){
    $c = new conex();
    $conexion=$c->conexion();
    $sql="SELECT  g.grado,n.nombre,ar.DESCRIPCION_AREA,g.id_area,g.id_carrera FROM grado g INNER JOIN areaescolar ar ON ar.id_area=g.id_area INNER JOIN niveles n ON n.id_nivel=g.grado WHERE g.id_grado='$datos_a'";
    $html  = "<option  value=''>Seleccione el Estudiante</option>";
    $ej=mysqli_query($conexion,$sql);
    $mostrar = mysqli_fetch_array($ej);
    if($mostrar[3]!='1'):
    $html .= "<option class='text-danger' selected  value='" . $mostrar[0] . "' > " . $mostrar[1]."-".$mostrar[2] . " </option> ";
    endif;
    if($mostrar[3]=='1'):
    $html .= "<option class='text-danger' selected value='" . $mostrar[0] . "' > " . $mostrar[1]. " </option> ";
    endif;
    $enviar=array("html"=>$html,"area"=>$mostrar[3],"carrera"=>$mostrar[4]);
    return $enviar;
   }

   public function BusquedaArea($datos){
    $c = new conex();
    $conexion=$c->conexion();
    $sql="SELECT DISTINCT a.id_area,a.DESCRIPCION_AREA FROM areaescolar a WHERE a.id_area='$datos'";
    $ej=mysqli_query($conexion,$sql);
    $mostrar = mysqli_fetch_array($ej);
    $html  = "<option  value=''>Seleccione el Estudiante</option>";
    $html .= "<option class='text-danger' selected  value='" . $mostrar[0] . "' > " . $mostrar[1] . " </option> ";
    return $html;
   }
   public function BusquedaCarrera($datos){
    $c = new conex();
    $conexion=$c->conexion();
    $sql="SELECT DISTINCT c.id_carrera,c.carrera FROM carrera c WHERE c.id_carrera='$datos'";
    $ej=mysqli_query($conexion,$sql);
    $mostrar = mysqli_fetch_array($ej);
    $html  = "<option  value=''>Seleccione la Carrera</option>";
    $html .= "<option class='text-danger' selected  value='" . $mostrar[0] . "' > " . $mostrar[1] . " </option> ";
    return $html;
   }

    public function PrecioTipo($datos_array){
        $c= new conex();
        $conexion=$c->conexion();
        $anno="SELECT YEAR(NOW())";
        $anio=date('Y');
        $mes=date('m');
        $dia=date('d');
        $ej=mysqli_query($conexion,$anno);
        $ano=mysqli_fetch_array($ej)[0];
        $carne=self::carnetEst($datos_array[2]);
        $revisar=self::revisar($anno,$datos_array[0],$carne);
        $pago=0;

        if($revisar!="1"){
        if($datos_array[0]=="1" && (($mes<="2") || ($mes=="10" && $dia>="15" || $mes>"10")) && ($ano==$anio)){
        $sql="SELECT g.costo_inscripcion FROM grado g WHERE g.id_grado='$datos_array[1]'";
        $consult=mysqli_query($conexion,$sql);
        $pago=mysqli_fetch_array($consult)[0];
        $pago= array("pagos"=>$pago);
        }
        else if($datos_array[0]=="2" && (($mes<"2") || ($mes=="10" && $dia>="15" || $mes>"10")) && ($ano==$anio)){
        $sql="SELECT g.CantidadMensual FROM grado g WHERE g.id_grado='$datos_array[1]'";
        $consult=mysqli_query($conexion,$sql);
        $pago=mysqli_fetch_array($consult)[0];
        $pago= array("pagos"=>($pago*9)-(180));
        
        }

        else if($datos_array[0]=="1" && $mes>"2" && $mes<"10" && ($ano==$anio)){
        $pago=1;
        }

        else if($datos_array[0]=="2" && $mes>"1" && $mes<"10" && ($ano==$anio) && $dia<=31 ){
        $pago=2;
        }

        else if($datos_array[0]!="1" || $datos_array[0]!="2"){
        //$consulta="SELECT DISTINCT ";   
        }
        return $pago;
        }

        else if($revisar!="0"){
        $pago2=3;
        return $pago2;
        }
        
        
    }
    public function revisar($ano,$id_pago,$carne){
        $c= new conex();
        $conexion=$c->conexion();
        $sql="SELECT dp.id_detalle,dp.no_boleta,dp.cpersonal,dp.carnet,dp.id_mes,p.ciclo FROM detalle_pago dp INNER JOIN pago p ON dp.no_boleta=p.id_boleta INNER JOIN alumno a ON a.carnet =dp.carnet INNER JOIN tipopago tp ON dp.id_tipopago=tp.id_tipo WHERE p.ciclo='$ano' AND dp.id_tipopago='$id_pago' AND dp.carnet='$carne'";

        $consul=mysqli_query($conexion,$sql);
        $revisar=mysqli_fetch_array($consul)[0];
        if($revisar!=null || $revisar!=""){
        return 1;    
        }else{

        return 0;   
        }
        
        
    }
    public function carnetEst($datos){
        $c= new conex();
        $conexion=$c->conexion();
        $sql="SELECT carnet FROM alumno WHERE carnet='$datos' OR cpersonal like '%".$datos."%'";
        $consul=mysqli_query($conexion,$sql);
        $carnet=mysqli_fetch_array($consul)[0];
        return $carnet;
    }

public function verPagos($mesess,$id_grado){
         $c        = new conex();
        $conexion = $c->conexion();
        $mes      = 0;

        
        

    $resultad=0;
    $consulta = "SELECT MONTH(NOW()),DAY(NOW())";
            $resultt  = mysqli_query($conexion, $consulta);
            $cont     = mysqli_fetch_array($resultt);
            $verif      = $cont[0];
            $d=$cont[1];
            $mes    = (int) $verif;
            $dia    =(int)$d;


    $con="SELECT CantidadMensual FROM grado WHERE  id_grado='$id_grado'";
    $conv  = mysqli_query($conexion, $con);
    $result  = mysqli_fetch_array($conv);
    $pago = (float) $result[0];

    if (!empty($mesess) && is_array($mesess)) :
    foreach ($mesess as $estado) {
        if(($mes==$estado && $dia<=5) || ($estado>$mes)):
        $resultad=$resultad+($pago-20);
        endif;
        if(($estado<$mes)):
        $resultad=$resultad+($pago+($pago*0.0567));
        endif;
        if(($estado==$mes && $dia>5)):
        $resultad=$resultad+$pago;
        endif;
        if($estado==0):
            $resultad=0;
        endif;
    }
    endif;
        return $resultad;
    }

public function generarOrdenBoleta($inicio)
    {
        /* funcion para generar carnet automatico */
        $c        = new conex();
        $conexion = $c->conexion();

        $sql    = "SELECT id_boleta FROM pago order by id_boleta desc";
        $result = mysqli_query($conexion, $sql);
        $carnet = mysqli_fetch_array($result)[0];

        if ($carnet == "" or $carnet == null or $carnet == 0) {
            $datos =  (string) $inicio;
            
            return $datos;
     } else {
             $datos= $carnet + 1;
            return $datos;
        }
    }

 



    public function Estado($dato){
     $c        = new conex();
     $conexion = $c->conexion();

     $sql="UPDATE alumno SET becado='0' WHERE carnet='$dato'";
     $resultt = mysqli_query($conexion, $sql);
     return $resultt;
    }


      public function guardarAsignacion()
    {
        $c        = new conex();
        $conexion = $c->conexion();

        $datos = $_SESSION['tablaAsignacionTem'];
        $conta = count($datos);
        $return = 0;

        for ($i = 0; $i < $conta ; $i++) {
            $c = explode("||",$datos[$i]);

            $sql = "INSERT INTO asignacion(id_obtener,id_empleado)VALUES('$c[6]','$c[5]')";
            $return=  mysqli_query($conexion,$sql);
            
        }
        return $return;
    }


    public function RealizarPago($pago,$person,$tipopago,$cheque,$fecha)
    {
        $inscripcion=0;
        $mensual=0;
        $otro=0;

        $c        = new conex();
        $conexion = $c->conexion();
        //$cambio = 1;
        $boletas=0;
        $datos = $_SESSION['tablaPa'];
        $conta = count($datos);
        $return = 0;
        $anio="SELECT YEAR(NOW())";
        $con=mysqli_query($conexion,$anio);
        $anno=mysqli_fetch_array($con)[0];

        
        for ($i = 0; $i < $conta ; $i++) {
            $c = explode("||",$datos[$i]);
            if($i==0){
            $formp=self::FormatoPago($c[1]);
            $boletas=self::EncabezadoBoleta($c[0],$formp,$pago,$anno,$fecha,$person,$tipopago,$cheque);

            }
            $mes=self::Meses($c[8]);
            $tipoo=self::TipoPago($c[4]);

            $carne=self::carnetEst($c[6]);
            $sql = "INSERT INTO detalle_pago(no_boleta,id_tipopago,monto,cpersonal,carnet,id_mes)VALUES('$boletas','$tipoo','$c[5]','$c[6]','$carne','$mes')";
            $return= $return + mysqli_query($conexion,$sql);
         }
      return $return;

    }

    public function RealizarT($boleta){
    $c        = new conex();
    $conexion = $c->conexion();
    $return2=0;
    $sql="SELECT * FROM pago WHERE id_boleta='$boleta'";
    $return= mysqli_query($conexion,$sql);
    $return2=mysqli_num_rows($return);
    $obt=mysqli_fetch_array($return);
    $des=explode('-', $obt['concepto_pago']);
    $fech=explode('-',$obt['fecha']);
// $des[2]."||".$des[3]."||"
    if($return2>0){
    $_SESSION['descripcion']=$des[0]."||".$des[1]."||".$fech[0]."||".$fech[1]."||".$obt['ciclo']."||".$obt['total']."||".$obt['id_boleta']."||".$des[2]."||".$des[3]."||".$des[4]."||".$des[5];

    $sql1="SELECT DISTINCT carnet FROM detalle_pago WHERE no_boleta='$boleta'";
    $return1= mysqli_query($conexion,$sql1);
    $array1=0;
    $grados=0;
    $nombres=0;
    $pagos=0;
    $precios=0;
     $i=0;
        $pagpr=self::obtenerPagos($boleta);    
        $cpa=count($pagpr);
        $prec=self::obtenerPrecios($boleta);    
        $cp=count($prec);

        for($i=0;$i<$cpa;$i++){
        $pagos=$pagos."||".$pagpr[$i];
        }

        for($i=0;$i<$cp;$i++){
        $precios=$precios."||".$prec[$i];    
        }

    while($dato=mysqli_fetch_array($return1)){
        $arry=self::obtenerGrado($dato[0]);    
        $array1= $array1."||".$arry;
        $grado=self::obtenerGrados($dato[0]);    
        $grados=$grados."||".$grado;
        $nombre=self::obtenerNombre($dato[0]);    
        $nombres=$nombres."||".$nombre[0]." , ".$nombre[1];
        
        
    }
    $arreglo=array("grados"=>$array1,"areas"=>$grados,"nombres"=>$nombres,"pagos"=>$pagos,"precios"=>$precios);

    $_SESSION['carnet']=$arreglo;

    }
    return $return2;
    
    }

public function obtenerPrecios($boleta){
        $c= new conex();
        $conexion=$c->conexion();
        $sql="SELECT SUM(dp.monto) AS total FROM detalle_pago dp WHERE dp.no_boleta='$boleta' group by dp.id_tipopago";
        $consul=mysqli_query($conexion,$sql);
        $carnet=array();
        $i=0;
        while($most=mysqli_fetch_array($consul)){
        $carnet[$i]=$most[0];
        $i++;
        }
        return $carnet;
    }

    public function obtenerPagos($boleta){
        $c= new conex();
        $conexion=$c->conexion();
        $sql="SELECT dp.id_tipopago  FROM detalle_pago dp WHERE dp.no_boleta='$boleta' group by dp.id_tipopago";
        $consul=mysqli_query($conexion,$sql);
        $carnet=array();
        $i=0;
        while($most=mysqli_fetch_array($consul)){
        $carnet[$i]=$most[0];
        $i++;
        }
        return $carnet;
    }
    

    public function obtenerGrado($datos){
        $c= new conex();
        $conexion=$c->conexion();
        $sql="SELECT ar.id_area FROM areaescolar ar INNER JOIN grado g ON g.id_area=ar.id_area INNER JOIN alumno al ON al.id_grado=g.id_grado WHERE al.carnet='$datos'";
        $consul=mysqli_query($conexion,$sql);
        $carnet=mysqli_fetch_array($consul)[0];
        return $carnet;
    }

    public function obtenerGrados($datos){
        $c= new conex();
        $conexion=$c->conexion();
        $sql="SELECT c.nombre FROM grado g INNER JOIN niveles c ON c.id_nivel=g.grado INNER JOIN alumno a ON a.id_grado=g.id_grado WHERE a.carnet='$datos'";
        $consul=mysqli_query($conexion,$sql);
        $carnet=mysqli_fetch_array($consul)[0];
        return $carnet;
    }

    public function obtenerNombre($datos){
        $c= new conex();
        $conexion=$c->conexion();
        $sql="SELECT pnombre,papellido FROM alumno WHERE carnet='$datos' OR cpersonal like '%".$datos."%'";
        $consul=mysqli_query($conexion,$sql);
        $carnet=mysqli_fetch_array($consul);
        return $carnet;
    }
   
 public function Meses($formp){
    $c        = new conex();
    $conexion = $c->conexion();
    $sql = "SELECT id_mes FROM mes WHERE Mes like '%".$formp."%'";
    $return=mysqli_query($conexion,$sql);
    $pag=mysqli_fetch_array($return)[0];
    return $pag;        
    }


 public function Mesesito($formp){
    $c        = new conex();
    $conexion = $c->conexion();
    $sql = "SELECT Mes FROM mes WHERE id_mes='$formp'";
    $return=mysqli_query($conexion,$sql);
    $pag=mysqli_fetch_array($return)[0];
    return $pag;        
    }


public function MesMoroso($estado,$id_grado){
         $c        = new conex();
        $conexion = $c->conexion();
        $mes      = 0;
            
    $resultado=array();
    $resultad=0;
    $estado=0;
    $consulta = "SELECT MONTH(NOW()),DAY(NOW())";
            $resultt  = mysqli_query($conexion, $consulta);
            $cont     = mysqli_fetch_array($resultt);
            $verif      = $cont[0];
            $d=$cont[1];
            $mes    = (int) $verif;
            $dia    =(int)$d;


    $con="SELECT CantidadMensual FROM grado WHERE  id_grado='$id_grado'";
    $conv  = mysqli_query($conexion, $con);
    $result  = mysqli_fetch_array($conv);
    $pago = (float) $result[0];

    
        
        if(($estado<$mes)):
        $resultad=($pago+($pago*0.0567));
        $estado=1;
        endif;
        $resultado=array($resultad,$estado);

        return $resultado;
    }


    public function CantidadMensual($estado,$id_grado){
         $c        = new conex();
        $conexion = $c->conexion();
        $mes      = 0;
            
    $resultad=0;
    $consulta = "SELECT MONTH(NOW()),DAY(NOW())";
            $resultt  = mysqli_query($conexion, $consulta);
            $cont     = mysqli_fetch_array($resultt);
            $verif      = $cont[0];
            $d=$cont[1];
            $mes    = (int) $verif;
            $dia    =(int)$d;


    $con="SELECT CantidadMensual FROM grado WHERE  id_grado='$id_grado'";
    $conv  = mysqli_query($conexion, $con);
    $result  = mysqli_fetch_array($conv);
    $pago = (float) $result[0];

    
        if(($mes==$estado && $dia<=5) || ($estado>$mes)):
        $resultad=$resultad+($pago-20);
        endif;
        if(($estado<$mes)):
        $resultad=($pago+($pago*0.0567));
        endif;
        if(($estado==$mes && $dia>5)):
        $resultad=$resultad+$pago;
        endif;
        if($estado==0):
            $resultad=0;
        endif;
    
        return $resultad;
    }

    public function TipoPago($formp){
    $c        = new conex();
    $conexion = $c->conexion();
    $sql = "SELECT id_tipo FROM tipopago WHERE tipo like '%".$formp."%'";
    $return=mysqli_query($conexion,$sql);
    $pag=mysqli_fetch_array($return)[0];
    return $pag;        
    }

    public function FormatoPago($formp){
    $c        = new conex();
    $conexion = $c->conexion();
    $sql = "SELECT id_formato FROM formato_pago WHERE concepto like '%".$formp."%'";
    $return=mysqli_query($conexion,$sql);
    $pag=mysqli_fetch_array($return)[0];
    return $pag;    
    }

    public function EncabezadoBoleta($bolet,$formpago,$pago,$anno,$fecha,$persona,$tipopago,$cheque){
    $c        = new conex();
    $conexion = $c->conexion();
    $boleta=0;
    $valorLet=self::valorEnLetras($pago);
    // $che=$cheque[0].",".$cheque[1].",".$cheque[2];
    $concepto=$valorLet."-".mb_strtoupper($persona,'UTF-8')."-".$tipopago."-".$cheque[0]."-".$cheque[1]."-".$cheque[2];
    $sql = "INSERT INTO pago(id_boleta,id_formpago,concepto_pago,total,ciclo,fecha)VALUES('$bolet','$formpago','$concepto','$pago','$anno','$fecha')";
    $return=mysqli_query($conexion,$sql);

    if($return>0):
    $sql1 = "SELECT id_boleta FROM pago ORDER BY id_boleta DESC ";
    $return1=mysqli_query($conexion,$sql1);
    $boleta=mysqli_fetch_array($return1)[0];
    endif;
    
    if($return<=0):
    $boleta=100;
    endif;

    return $boleta;
    }

public function guardaBoleta($datos)
{
    $c        = new conex();
    $conexion = $c->conexion();
    $opcion=0;
    $dia    =date("d");
    $mes    =date("n");
    $anio   =date("Y");

    $rs=self::verificapagoempleado($datos);
    if($rs==0)
    {
        $fecha=$dia."/".$mes."/".$anio;

        if($datos[4]=='option1')
        {
            $opcion=1;
        }else{
            $opcion=2;
        }

        $sql = "INSERT INTO pago_empleado(idempleado,concepto,cantidad,mes,opcion,fecha,anio)
                                    VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$opcion','$fecha','$anio')";
        $return=mysqli_query($conexion,$sql);

        if($return>0)
        {
            echo 1;
        } 
    }else{
        echo 0;
    }
}

public function verificapagoempleado($datos){
    $anio     =date("Y");
    $c        = new conex();
    $conexion = $c->conexion();

    if(strcmp($datos[1],'Sueldo mes de')==0)
    {
        $consulta="SELECT idempleado,concepto,mes FROM pago_empleado WHERE idempleado='$datos[0]' AND mes='$datos[3]' AND anio='$anio'";
        $return=mysqli_query($conexion,$consulta);
        $obt=mysqli_fetch_array($return);
    
        if($obt>0)
        {
            return 1;
        }else{
            return 0;
        }
    }else if(strcmp($datos[1],'1ra. parte Aguinaldo')==0){
        $consulta="SELECT idempleado,concepto,mes FROM pago_empleado WHERE idempleado='$datos[0]' AND mes='$datos[3]' AND concepto='$datos[1]' AND anio='$anio'";
        $return=mysqli_query($conexion,$consulta);
        $obt=mysqli_fetch_array($return);
    
        if($obt>0)
        {
            return 1;
        }else{
            return 0;
        }
    }else if(strcmp($datos[1],'2da. parte Aguinaldo')==0){
        $consulta="SELECT idempleado,concepto,mes FROM pago_empleado WHERE idempleado='$datos[0]' AND mes='$datos[3]' AND concepto='$datos[1]' AND anio='$anio'";
        $return=mysqli_query($conexion,$consulta);
        $obt=mysqli_fetch_array($return);
    
        if($obt>0)
        {
            return 1;
        }else{
            return 0;
        }
    }else if(strcmp($datos[1],'Bono 14')==0){
        $consulta="SELECT idempleado,concepto,mes FROM pago_empleado WHERE idempleado='$datos[0]' AND mes='$datos[3]' AND concepto='$datos[1]' AND anio='$anio'";
        $return=mysqli_query($conexion,$consulta);
        $obt=mysqli_fetch_array($return);
    
        if($obt>0)
        {
            return 1;
        }else{
            return 0;
        }
    }
}

public function valorEnLetras($x) 
{ 
if ($x<0) { $signo = "menos ";} 
else      { $signo = "";} 
$x = abs ($x); 
$C1 = $x; 

$G6 = floor($x/(1000000));  // 7 y mas 

$E7 = floor($x/(100000)); 
$G7 = $E7-$G6*10;   // 6 

$E8 = floor($x/1000); 
$G8 = $E8-$E7*100;   // 5 y 4 

$E9 = floor($x/100); 
$G9 = $E9-$E8*10;  //  3 

$E10 = floor($x); 
$G10 = $E10-$E9*100;  // 2 y 1 


$G11 = round(($x-$E10)*100,0);  // Decimales 
////////////////////// 

$H6 = self::unidades($G6); 

if($G7==1 AND $G8==0) { $H7 = "Cien "; } 
else {    $H7 = self::decenas($G7); } 

$H8 = self::unidades($G8); 

if($G9==1 AND $G10==0) { $H9 = "Cien "; } 
else {    $H9 = self::decenas($G9); } 

$H10 = self::unidades($G10); 

if($G11 < 10) { $H11 = "0".$G11; } 
else { $H11 = $G11; } 

///////////////////////////// 
    if($G6==0) { $I6=" "; } 
elseif($G6==1) { $I6="Millón "; } 
         else { $I6="Millones "; } 
          
if ($G8==0 AND $G7==0) { $I8=" "; } 
         else { $I8="Mil "; } 
          
$I10 = " Quetzales con "; 
$I11 = " /100 centavos Q."; 

$C3 = $signo.$H6.$I6.$H7.$H8.$I8.$H9.$H10.$I10.$H11.$I11; 

return $C3; //Retornar el resultado 

} 

public function unidades($u) 
{ 
    if ($u==0)  {$ru = " ";} 
elseif ($u==1)  {$ru = "Un ";} 
elseif ($u==2)  {$ru = "Dos ";} 
elseif ($u==3)  {$ru = "Tres ";} 
elseif ($u==4)  {$ru = "Cuatro ";} 
elseif ($u==5)  {$ru = "Cinco ";} 
elseif ($u==6)  {$ru = "Seis ";} 
elseif ($u==7)  {$ru = "Siete ";} 
elseif ($u==8)  {$ru = "Ocho ";} 
elseif ($u==9)  {$ru = "Nueve ";} 
elseif ($u==10) {$ru = "Diez ";} 

elseif ($u==11) {$ru = "Once ";} 
elseif ($u==12) {$ru = "Doce ";} 
elseif ($u==13) {$ru = "Trece ";} 
elseif ($u==14) {$ru = "Catorce ";} 
elseif ($u==15) {$ru = "Quince ";} 
elseif ($u==16) {$ru = "Dieciseis ";} 
elseif ($u==17) {$ru = "Decisiete ";} 
elseif ($u==18) {$ru = "Dieciocho ";} 
elseif ($u==19) {$ru = "Diecinueve ";} 
elseif ($u==20) {$ru = "Veinte ";} 

elseif ($u==21) {$ru = "Veintiun ";} 
elseif ($u==22) {$ru = "Veintidos ";} 
elseif ($u==23) {$ru = "Veintitres ";} 
elseif ($u==24) {$ru = "Veinticuatro ";} 
elseif ($u==25) {$ru = "Veinticinco ";} 
elseif ($u==26) {$ru = "Veintiseis ";} 
elseif ($u==27) {$ru = "Veintisiente ";} 
elseif ($u==28) {$ru = "Veintiocho ";} 
elseif ($u==29) {$ru = "Veintinueve ";} 
elseif ($u==30) {$ru = "Treinta ";} 

elseif ($u==31) {$ru = "Treinta y un ";} 
elseif ($u==32) {$ru = "Treinta y dos ";} 
elseif ($u==33) {$ru = "Treinta y tres ";} 
elseif ($u==34) {$ru = "Treinta y cuatro ";} 
elseif ($u==35) {$ru = "Treinta y cinco ";} 
elseif ($u==36) {$ru = "Treinta y seis ";} 
elseif ($u==37) {$ru = "Treinta y siete ";} 
elseif ($u==38) {$ru = "Treinta y ocho ";} 
elseif ($u==39) {$ru = "Treinta y nueve ";} 
elseif ($u==40) {$ru = "Cuarenta ";} 

elseif ($u==41) {$ru = "Cuarenta y un ";} 
elseif ($u==42) {$ru = "Cuarenta y dos ";} 
elseif ($u==43) {$ru = "Cuarenta y tres ";} 
elseif ($u==44) {$ru = "Cuarenta y cuatro ";} 
elseif ($u==45) {$ru = "Cuarenta y cinco ";} 
elseif ($u==46) {$ru = "Cuarenta y seis ";} 
elseif ($u==47) {$ru = "Cuarenta y siete ";} 
elseif ($u==48) {$ru = "Cuarenta y ocho ";} 
elseif ($u==49) {$ru = "Cuarenta y nueve ";} 
elseif ($u==50) {$ru = "Cincuenta ";} 

elseif ($u==51) {$ru = "Cincuenta y un ";} 
elseif ($u==52) {$ru = "Cincuenta y dos ";} 
elseif ($u==53) {$ru = "Cincuenta y tres ";} 
elseif ($u==54) {$ru = "Cincuenta y cuatro ";} 
elseif ($u==55) {$ru = "Cincuenta y cinco ";} 
elseif ($u==56) {$ru = "Cincuenta y seis ";} 
elseif ($u==57) {$ru = "Cincuenta y siete ";} 
elseif ($u==58) {$ru = "Cincuenta y ocho ";} 
elseif ($u==59) {$ru = "Cincuenta y nueve ";} 
elseif ($u==60) {$ru = "Sesenta ";} 

elseif ($u==61) {$ru = "Sesenta y un ";} 
elseif ($u==62) {$ru = "Sesenta y dos ";} 
elseif ($u==63) {$ru = "Sesenta y tres ";} 
elseif ($u==64) {$ru = "Sesenta y cuatro ";} 
elseif ($u==65) {$ru = "Sesenta y cinco ";} 
elseif ($u==66) {$ru = "Sesenta y seis ";} 
elseif ($u==67) {$ru = "Sesenta y siete ";} 
elseif ($u==68) {$ru = "Sesenta y ocho ";} 
elseif ($u==69) {$ru = "Sesenta y nueve ";} 
elseif ($u==70) {$ru = "Setenta ";} 

elseif ($u==71) {$ru = "Setenta y un ";} 
elseif ($u==72) {$ru = "Setenta y dos ";} 
elseif ($u==73) {$ru = "Setenta y tres ";} 
elseif ($u==74) {$ru = "Setenta y cuatro ";} 
elseif ($u==75) {$ru = "Setenta y cinco ";} 
elseif ($u==76) {$ru = "Setenta y seis ";} 
elseif ($u==77) {$ru = "Setenta y siete ";} 
elseif ($u==78) {$ru = "Setenta y ocho ";} 
elseif ($u==79) {$ru = "Setenta y nueve ";} 
elseif ($u==80) {$ru = "Ochenta ";} 

elseif ($u==81) {$ru = "Ochenta y un ";} 
elseif ($u==82) {$ru = "Ochenta y dos ";} 
elseif ($u==83) {$ru = "Ochenta y tres ";} 
elseif ($u==84) {$ru = "Ochenta y cuatro ";} 
elseif ($u==85) {$ru = "Ochenta y cinco ";} 
elseif ($u==86) {$ru = "Ochenta y seis ";} 
elseif ($u==87) {$ru = "Ochenta y siete ";} 
elseif ($u==88) {$ru = "Ochenta y ocho ";} 
elseif ($u==89) {$ru = "Ochenta y nueve ";} 
elseif ($u==90) {$ru = "Noventa ";} 

elseif ($u==91) {$ru = "Noventa y un ";} 
elseif ($u==92) {$ru = "Noventa y dos ";} 
elseif ($u==93) {$ru = "Noventa y tres ";} 
elseif ($u==94) {$ru = "Noventa y cuatro ";} 
elseif ($u==95) {$ru = "Noventa y cinco ";} 
elseif ($u==96) {$ru = "Noventa y seis ";} 
elseif ($u==97) {$ru = "Noventa y siete ";} 
elseif ($u==98) {$ru = "Noventa y ocho ";} 
else            {$ru = "Noventa y nueve ";} 
return $ru; //Retornar el resultado 
} 

public function decenas($d) 
{ 
    if ($d==0)  {$rd = "";} 
elseif ($d==1)  {$rd = "Ciento ";} 
elseif ($d==2)  {$rd = "Doscientos ";} 
elseif ($d==3)  {$rd = "Trescientos ";} 
elseif ($d==4)  {$rd = "Cuatrocientos ";} 
elseif ($d==5)  {$rd = "Quinientos ";} 
elseif ($d==6)  {$rd = "Seiscientos ";} 
elseif ($d==7)  {$rd = "Setecientos ";} 
elseif ($d==8)  {$rd = "Ochocientos ";} 
else            {$rd = "Novecientos ";} 
return $rd; //Retornar el resultado 
}

}
