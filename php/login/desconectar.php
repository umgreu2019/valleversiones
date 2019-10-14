<?php
// include "../../vistas/footer/config.php";
session_start();
if($_SESSION['nombre']){
  session_destroy();
  header("location:index");
}
else {
  header("location:loguear");
}
 ?>