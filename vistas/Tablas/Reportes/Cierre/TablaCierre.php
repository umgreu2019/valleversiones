<?php 
require_once "../../../../php/conexion.php";
$c        = new conex();
$conexion = $c->conexion();
session_start();
date_default_timezone_set('America/Guatemala');
$fecha=$_SESSION['fecha'];
$anio=$_SESSION['anio'];
$mes=0;
$consulta = " SELECT p.* FROM pago p WHERE p.ciclo='$anio' AND p.fecha='$fecha'"; 
$result=mysqli_query($conexion,$consulta);
$conta=0;$contb=0;$contc=0;
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $medim = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
     // while($mos=mysqli_fetch_array($result)){
     //    $dato[$i]=array("boleta"=> $mos[0],"formato"=>$mos[1],"concepto"=>$mos[2],"total"=>$mos[3],"fecha"=>$mos[5]."-".$mos[4]);
     //    $i++;
     // }
?>
 

<div class="table-responsive">
<div class="row col-md-12">
<div class="col-md-4"></div>
<div class="col-md-4">
<img src="../img/2ICAT.png" style="height: 70px !important;  margin-left: 110px;" class="img-fluid " alt="">
</div>
<div class="col-md-4"></div>
</div>
<div class="row col-md-12 mb-2">
<div class="col-md-4 text-left">
<p class="card-title h6 text-dark font-weight-bold"><?php echo "Fecha:"." ".$dias[date('w')].", ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ?></p>	
</div>
<div class="col-md-5"></div>
<div class="col-md-3 text-right">
	<p class="card-title h6 text-dark font-weight-bold"><?php echo "Generado a las :"." ".date('h:i:s A');?></p>
</div>
</div>
 
  <table id="IdCierre" class="table  table-hover table-sm table-bordered table-striped" style="text-align: center;">
    <thead style="background-color: rgba(20,200,40,0.98); color:white; font-weight: bold;">
      <tr>
        <th rowspan="2">No.Boleta</th>
        <th rowspan="2">Alumno(A)</th>
        <th colspan="4">Nivel</th>
        <th colspan="3">Desgloce de los Ingresos</th>
        <th rowspan="2">Total Ingresos</th>
      </tr>
      <tr>
      	<td>Pre-Primaria</td>
      	<td>Primaria</td>
      	<td>Basico</td>
      	<td>Diversificado</td>
      	<td>Inscripcion</td>
      	<td>Cuota</td>
      	<td>Mes</td>
      </tr>
    </thead>
    <!-- <tfoot style="background-color: rgba(10,10,255,0.45);color: white; font-weight: bold;">
      <tr>
      <td>No.Boleta</td>
        <td>Persona que realizo el pago</td>
        <td>Concepto de pago</td>
        <td>Cantidad Monetaria</td>
        <td>Alumnos</td>
        <td>Acciones</td>
      </tr>
    </tfoot> -->
    <tbody style="background-color:white">
    <?php  
	    
	while($mos=mysqli_fetch_array($result)){
	$boleta=$mos[0];
	$alumno=alumnos($boleta);
	

	for($i=0;$i<count($alumno);$i++){
	$nomalumno=nombreal($alumno[$i]);
	$pagos=pagos($alumno[$i],$boleta);
	$total=0;

	$contb=array_search('3',$pagos);
	for($j=0;$j<count($pagos);$j++){
		
		if($pagos[$j]==2 || $pagos[$j]>3){
		$conta=$conta+1;		
		}else if($pagos[$j]==3){
		$contb=$contb+1;
		}else if($pagos[$j]==1){
		$contc=$contc+1;		
		}
	}

if($contc>0){
	$prec0=number_format(precio($alumno[$i],'1',$boleta), 2, '.', '');
	$total=$total+$prec0;

	}else{
	$prec0=0;
	$total=$total+$prec0;
	
	}

	if($conta>0){
	$prec1=number_format(precio($alumno[$i],'2',$boleta), 2, '.', '');
	$total=$total+$prec1;

	}else{
	$prec1=0;
	$total=$total+$prec1;
	}
	if($contb>0){
	$prec2=number_format(precio($alumno[$i],'3',$boleta), 2, '.', '');
	// $mes=meses($alumno[$i],'3',$boleta);
	$total=$total+$prec2;
	
	}
	else{
	$prec2=0;
	$total=$total+$prec2;
	
	}
    ?>
  	<tr>
  	<td><?php echo $boleta ?></td>
  	<td><?php echo $nomalumno[0]?></td>
  	<?php if($nomalumno[1]==1){
	?>
  	<td><?php echo $nomalumno[2]?></td>
  	<?php
  	}else{?>
	<td></td>
  	<?php } ?>
  	<?php if($nomalumno[1]==2){
	?>
  	<td><?php echo $nomalumno[2]?></td>
  	<?php
  	}else{?>
	<td></td>
  	<?php } ?>

  	<?php if($nomalumno[1]==3){
	?>
  	<td><?php echo $nomalumno[2]?></td>
  	<?php
  	}else{?>
	<td></td>
  	<?php } ?>

  	<?php if($nomalumno[1]==4){
	?>
  	<td><?php echo $nomalumno[2]?></td>
  	<?php
  	}else{?>
	<td></td>
  	<?php } ?>
  	<?php if($contc>0){
  		?>
  	<td><?php echo"Q."." ".$prec0 ?></td>
  <?php }else{?>
  	<td><?php echo"Q."." ". "0.00" ?></td>
  	<?php }?>
  	<?php if($prec1>0 && $prec2<=0){?>
  	<td><?php echo"Q."." ". $prec1 ?></td>
  <?php }else if($prec2>0 && $prec1<=0){
	?>
	<td><?php echo "Q."." ". $prec2 ?></td>
	<?php 
  	} else if($prec2==0 && $prec1==0){
  	?>
  	<td><?php echo "Q."."--------"?></td>
  	<?php }
	
	if($contb>0){
	$mes=meses($alumno[$i],'3',$boleta);
	$max=max($mes);
	$min=min($mes);
	$coun=count($mes);
	if($coun>1){
	?>
		<td><?php echo $medim[$min-1]."/".$medim[$max-1]?></td>	
<?php }
	else if($coun==1){
	?>
		<td><?php echo $max?></td>	
<?php }
}else if(($conta>0 && $contc<=0) || ($conta>0 && $contb<=0) || ($conta>0 && $contb<=0 && $contc<=0)){
	$cid=0;
	$mesi=meses($alumno[$i],'2',$boleta);
	$cid=count($mesi);
?>
	<td><?php echo $medim[0]."/".$medim[11]?></td>	
<?php 
}
 else if(($contc>0 && $conta<=0) || ($contc>0 && $contb<=0) || ($contc>0 && $conta<=0 && $contb<=0)){
	$cad=0;
	$mesa=meses($alumno[$i],'1',$boleta);
	$cad=count($mesa);
	if($cad>1){
	$maxa=max($mesa);
	$mina=min($mesa);	
?>
	<td><?php echo $medim[$mina-1]."/".$medim[$maxa-1];?></td>	
<?php  
	}else if($cad==1){
?>
	<td><?php echo $medim[$mesa[0]-1]?></td>	
<?php 
}
}else{
?>
	
<?php } ?>	 

  	
  	<td><?php echo "Q."." ".number_format($total, 2, '.', ''); ?></td>	
  	</tr>
  <?php 
	} 
	
	}
	$totalt=number_format(MontTo($fecha,$anio), 2, '.', '');;
	?>
	<tr>
		<td style="background: white; border:none;"></td>
		<td style="background: white; border:none;"></td>
		<td style="background: white; border:none;" colspan="4">Total general de este dia</td>
		<td></td>
		<td></td>
		<td></td>
		<td><?php echo "Q."." ".$totalt;?></td>
	</tr>
</tbody>
</table>

<div class="row col-md-12 mt-4">
<div class="col-md-2" style="width: 110px">
 <p style="font-size: 13px;" class="ml-2 text-dark font-weight-bold">Hecho por:</p>
</div>
<div class="col-md-4">
<div class="row">
<div class="col-md-12">
<div class="input-group">
<input type="text" disabled class="form-control">
</div>	
</div>
<div class="col-md-12 text-center">
<small class=" font-weight-bold"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido'] ?></small>
</div>
</div>	
</div>

<div class="col-md-4"></div>
</div>

</div>



<?php 
function MontTo($fecha,$anio){
 $c        = new conex();
 $conexion = $c->conexion();
 $sql1="SELECT SUM(dp.total) FROM pago dp WHERE dp.fecha='$fecha' AND dp.ciclo='$anio'";
 $return1= mysqli_query($conexion,$sql1);
 $most=mysqli_fetch_array($return1);
 return $most[0];
}
function alumnos($idboleta){
 $c        = new conex();
 $conexion = $c->conexion();
 $sql1="SELECT DISTINCT carnet FROM detalle_pago WHERE no_boleta='$idboleta'";
  $return1= mysqli_query($conexion,$sql1);
  $dato=array();
  $i=0;
  while($most=mysqli_fetch_array($return1)){
	$dato[$i]=$most[0];
	$i++;
  }
  return $dato;
 }

 function nombreal($alumno){
  $c        = new conex();
 $conexion = $c->conexion();
  $cons="SELECT al.pnombre,al.snombre,al.papellido,al.sapellido,ar.id_area,g.grado FROM alumno al INNER JOIN grado g ON al.id_grado=g.id_grado INNER JOIN areaescolar ar ON ar.id_area=g.id_area WHERE al.carnet='$alumno'";
  $ejec=mysqli_query($conexion,$cons);
  $dato=" ";
  $most=mysqli_fetch_array($ejec);
  $dato=array($most[0]." ".$most[1]." ,".$most[2]." ".$most[3],$most[4],$most[5]);
  return $dato;
 }

 function pagos($alumno,$boleta){
 $c        = new conex();
 $conexion = $c->conexion();
 $cons="SELECT dp.id_tipopago FROM detalle_pago dp WHERE dp.carnet='$alumno' AND dp.no_boleta='$boleta'";
 $ejec=mysqli_query($conexion,$cons);
 $dato=array();
  $i=0;
  while($most=mysqli_fetch_array($ejec)){
	$dato[$i]=$most[0];
	$i++;
  }
  return $dato;
 }

 function precio($alumno,$filtro,$boleta){
 $c        = new conex();
 $conexion = $c->conexion();

 if($filtro==="2"){
 $cons="SELECT SUM(dp.monto) FROM detalle_pago dp WHERE dp.carnet='$alumno' AND  dp.no_boleta='$boleta' AND dp.id_tipopago!='1' AND dp.id_tipopago !='3'";	
}else if($filtro!=="2"){
$cons="SELECT SUM(dp.monto) FROM detalle_pago dp WHERE dp.carnet='$alumno' AND dp.id_tipopago='$filtro' AND dp.no_boleta='$boleta'";	
}
 
 $ejec=mysqli_query($conexion,$cons);
 
  $most=mysqli_fetch_array($ejec);
  $dato=$most[0];
  return $dato;
 }

 function meses($alumno,$filtro,$boleta){
 $c        = new conex();
 $conexion = $c->conexion();
 $cons="SELECT dp.id_mes FROM detalle_pago dp WHERE dp.carnet='$alumno' AND dp.id_tipopago='$filtro' AND dp.no_boleta='$boleta'";
 $ejec=mysqli_query($conexion,$cons);
 $dato=array();
  $i=0;
  while($most=mysqli_fetch_array($ejec)){
	$dato[$i]=$most[0];
	$i++;
  }
  return $dato;
 }
 ?>
