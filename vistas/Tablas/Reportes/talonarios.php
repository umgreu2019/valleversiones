<?php 
if(empty($_SESSION['valor']) && empty($_POST['envio'])){
header("location:../index.php");
}
$c = new conex();
$conexion=$c->conexion();
$nombre=$_SESSION['nombre'];
$apellido=$_SESSION['apellido'];
$puesto=$_SESSION['puesto'];
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="icon" href="../assets/img/2ICAT.png">
    <title>
      SISTEMA@ICAT
    </title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <?php require_once "../dependencia/dependencia.php" ?>
 </head>
 <body>
 	<div class="wrapper">
    
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    
            <?php require_once "../dependencia/sidebar.php"; ?>
        
       <div class="main-panel">
            <!-- Navbar -->
            <?php require_once "../dependencia/navbar.php"; ?>
            
		<div class="content">
		<div class="container-fluid mt-2">
			<div class="card mt-5">
			<div class="card-header bg-indigo">
				<p class="card-title h3 text-white">Reportes de Boletas de Pago
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
             	<a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="material-icons text-white">notes</i></a>
             	</button>
				</p>
			</div>
			<div class="collapse show" id="collapseExample">
			<div class="card-body">
			<div id="tablaT">
				
			</div>	
			</div>	
			</div>	
		</div> <!-- collapse -->	
		</div>
		</div> <!-- content -->
       </div> <!-- main-panel -->
	</div><!-- wrapper -->
 </body>
 <script>
 	$(document).ready(function(){
			const toast = Swal.mixin({
			toast: true,
			position: 'top',
			showConfirmButton: true,
			confirmButtonColor: 'rgba(250,110,10,0.98)',
			confirmButtonText: 'Ok',
			timer: 2500
			});
			
			toast({
			type: 'success',
			title: 'Entrada Exitosa'
			})
		$('#tablaT').load("Tablas/Reportes/Tablas/TablaBoletas.php")

 	})
 </script>
 <script src="../js/llenado.js"></script>
 </html>