<?php 
session_start();
if(isset($_SESSION['usuario']))
{

$nombre=$_SESSION['nombre'];
$apellido=$_SESSION['apellido'];
$puesto=$_SESSION['puesto'];
$fondo="black";

$var;
if(!empty($_SESSION['reporte']) && (!empty($_POST['envio']))){
$_SESSION['reporte']=$_POST['envio'];
$var=$_SESSION['reporte'];
}
else if(empty($_SESSION['reporte']) && (!empty($_POST['envio']))){
$_SESSION['reporte']=$_POST['envio'];
$var=$_SESSION['reporte'];
}
else{
	$var=$_SESSION['reporte'];
}
 ?>

<!DOCTYPE html>
<html lang="en">
 
<?php require_once 'header/header.php'; ?>

    <!-- sidebar -->
    <?php require_once 'footer/sidebar.php'; ?>
    <!-- End Sidebar -->

    <div class="main-panel ">
      <!-- Navbar -->
    <?php require_once 'header/navbar.php'; ?>
      <!-- End Navbar -->

      <div class="content wow slideInRight delay-1s">
       <div class="container-fluid">

		<?php if($var==1): ?>
		<div class="row">
		<div class="col-md-12">
		  <div class="card">
			<div class="card-header backgr-teal" style="background-color: rgba(100,80,160,0.7) !important;">
			 <p class="card-title h3 col-white font-weight-bold">INGRESO DE RECORDATORIOS <i class="fas fa-bell fa-lg ml-4"></i></p>
			</div>
			<div class="card-body">
			 <form method="post" id="comment_form">
			  <div class="row">
			 	<div class="col-md-8">

			 	<div class="row">
				  <div class="col-md-12">
					<div class="form-group">
				 	 <label class="col-purple">Asunto</label>
				 	 <input type="text" name="subject" id="subject" class="form-control">
					</div>	
				  </div>

				  <div class="col-md-12 mt-3">
					<div class="form-group">
					<label class="col-purple">Detalle</label>
					<textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
					</div>	
				  </div>

			 	</div>
			 		
			 	</div>

			 	<div class="col-md-4">
			 	 <div class="row">
			 	 <div class="col-md-12">
			 	 	<div class="form-group">
			 	 	<label for="" class="form-control form-control-label col-purple">BUSCAR POR:</label>
			 	 		<div class="form-check">
  						<input class="form-check-input" type="radio" name="rai[]" value="puesto" id="defaultCheck1">
  						 <label class="form-check-label  ml-3" for="defaultCheck1">
    					 	PUESTO
  						 </label>
  						 <input class="form-check-input" type="radio" name="rai[]" value="nombre" id="defaultCheck2">
  						 <label class="form-check-label  ml-3" for="defaultCheck2">
    					 	NOMBRE DEL USUARIO
  						 </label>
			 	 		</div>
			 	 	</div>
			 	 </div>
			 	  <div class="col-md-12">
			 	  	<div class="form-group">
					<label class="col-purple">Remitentes:</label>
					  <select name="opsimple" id="opsimple"  class="select2 form-control">
					  	<option value="0" disabled selected>REMITENTES POR (<p id="op"></p>)</option>
					  </select>
					</div>	
			 	  </div>
			 	  <div class="col-md-12 mt-3">
			 	  	<div class="form-group">
					<label class="col-purple">Listado de Remitentes:</label>
					  <select name="opmultiple[]" id="opmultiple" multiple class="select2 form-control">
					  	<option value="0" disabled>LISTADO DE REMITENTES (VACIO)</option>
					  </select>
					</div>	
			 	  </div>
			 	 </div>	
			 	</div>
			  </div>
				
				
				<div class="form-group">
				<button type="button" name="post" id="post" class="btn col-black backgr-light-blue font-weight-bold float-right">Enviar</button>
				</div>
   			 </form>	
			</div>
		  </div>
		</div>
		
   		</div>
		<?php endif;?>

		<?php if($var==2): ?>
		
		<?php endif;?>

		<?php if($var==3): ?>
		
		<?php endif;?>
		</div>
      </div>
    </div>
 

  <?php require_once 'footer/scripts.php'; ?>
  <script src="<?php echo SERVERURL; ?>/js/tablero/notificaciones/notificaciones.js"></script>


</html>
<?php 
}else{
  header("location:index");
}
 ?>
