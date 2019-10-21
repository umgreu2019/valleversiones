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
		
		<?php endif;?>

		<?php if($var==2): ?>
		
		<?php endif;?>

		<?php if($var==3): ?>
		
		<?php endif;?>
		</div>
      </div>
    </div>
 

  <?php require_once 'footer/scripts.php'; ?>


</html>
<?php 
}else{
  header("location:index");
}
 ?>
