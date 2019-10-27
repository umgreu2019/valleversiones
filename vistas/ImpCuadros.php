<?php
require_once "../php/conexion/conexion.php";

session_start();
$ga="";
$ni="";
$c = new conex();
$conexion=$c->conexion();
if(isset($_POST['envio1']) && isset($_POST['envio2'])){
$_SESSION['envio1'] = $_POST['envio1'];
$_SESSION['envio2'] = $_POST['envio2'];
}else{
$ga=$_SESSION['envio1'];
$ni=$_SESSION['envio2'];
}

$area=$_SESSION['area'];
$grado=$_SESSION['nivel'];
$carrera=$_SESSION['carrera'];


$g="SELECT id_grado, estado, No_Unidades FROM grado WHERE grado='$grado' AND id_area='$area' AND id_carrera='$carrera'";
$gr = mysqli_query($conexion, $g);
$obt = mysqli_fetch_array($gr);


$sql = "SELECT a.pnombre, a.snombre, a.papellido, a.sapellido
FROM alumno a, areaescolar ae, niveles n, grado g, carrera c
WHERE a.id_grado = g.id_grado AND g.grado = n.id_nivel AND g.id_area = ae.id_area AND g.id_carrera = c.id_carrera
AND a.id_grado='$obt[0]' ORDER BY a.papellido, a.pnombre ASC "; 

$result = mysqli_query($conexion, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<?php require_once 'header/header.php'; ?>

<body class="" onkeydown="uniKeyCode(event)">
  <div class="wrapper" style="overflow:hidden">
    <section class="content">
      <!--MAIN CONTENEDOR-->
      <div class="container-fluid">
        <div class="row mx-auto" >
          <div class="card w-100 h-100 page" id="divpagos">
            <!-- card body  -->
            <div class="card-body">
              <div class="row">
            <div class="col-md-12">
              <h2 class="col-black text-center font-weight-bold">Colegio Cristiano "El Valle del Sur"</h2>  
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="grado" class="form-control-label col-purple ">Grado:</label>
                <input type="text" class="form-control " disabled id="grado" value='<?php echo $ga; ?>'>
              </div>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-4">
              <div class="form-group ">
              <label for="Curso" class="form-control-label col-purple mt-1">Curso:</label>
              <input type="text" class="form-control" disabled id="Curso" disabled>
              </div>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-2">
              <div class="form-group">
              <input type="text" class="form-control form-control-lg anioe"  disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nivel" class="form-control-label col-purple mt-1">Nivel:</label>
                <input type="text" class="form-control" disabled id="nivel" value='<?php echo $ni; ?>'>
              </div>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="cate" class="form-control-label col-purple mt-1">Catedratico(a):</label>
                <input type="text" class="form-control" disabled id="cate">
              </div>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-2">
              <div class="form-group">                
                <input type="text" class="form-control" disabled id="pendiente">
              </div>
            </div>
          </div>
            <table id="IdTableEmpleados" class="table table-sm table-striped table-hover table-bordered   " style="text-align: center; border:2px solid #000;">
                <thead class="bg-white col-black font-weight-bold" style="border: 2px solid #000;">
                  <tr style="border: 2px solid #000;">
                    <td rowspan="2" class="text-center" style="width: 8px; border: 2px solid #000;" >No. </td>
                    <td rowspan="2" colspan="2" class="text-center" style="border: 2px solid #000;">Nombre del Estudiante(a)</td>
                    <td colspan="10" class="text-center" style="border: 2px solid #000;">Actividades de conograma</td>
                    <td rowspan="2" class="text-center" style="width: 65px; border: 2px solid #000;">Zona</td>
                    <td rowspan="2" class="text-center" style="width: 65px; border: 2px solid #000;">Total</td>
                    <td rowspan="2" class="text-center" style="width: 65px; border: 2px solid #000;">Examen</td>
                  </tr>
                  <tr style="border: 2px solid #000;">
                    <td style="border: 2px solid #000;">1</td>
                    <td style="border: 2px solid #000;">2</td>
                    <td style="border: 2px solid #000;">3</td>
                    <td style="border: 2px solid #000;">4</td>
                    <td style="border: 2px solid #000;">5</td>
                    <td style="border: 2px solid #000;">6</td>
                    <td style="border: 2px solid #000;">7</td>
                    <td style="border: 2px solid #000;">8</td>
                    <td style="border: 2px solid #000;">9</td>
                    <td style="border: 2px solid #000;">10</td>
                  </tr>
                </thead>
                
                <tbody  id="" style="background-color:white; color:#0e5430; font-size: 11px !important; border: 2px solid #000;">
                  <?php 
                    $cont = 1;
                    while ($parame = mysqli_fetch_row($result)) { ?>
                   <tr style="line-height: 7px !important; border: 2px solid #000;">
                      <td class="font-weight-bold col-black" style="border: 2px solid #000;"><?php echo $cont ?></td>
                      <td class="font-weight-bold col-black" style="border: 2px solid #000;"><?php echo $parame[2]." ".$parame[3] ?></td>
                      <td class="font-weight-bold col-black" style="border: 2px solid #000;"><?php echo $parame[0]." ".$parame[1] ?> </td>
                      <td style="border: 2px solid #000;"></td>
                      <td style ="border: 2px solid #000;"></td>
                      <td style ="border: 2px solid #000;"></td>
                      <td style ="border: 2px solid #000;"></td>
                      <td style ="border: 2px solid #000;"></td>
                      <td style ="border: 2px solid #000;"></td>
                      <td style ="border: 2px solid #000;"></td>
                      <td style ="border: 2px solid #000;"></td>
                      <td style ="border: 2px solid #000;"></td>
                      <td style ="border: 2px solid #000;"></td>
                      <td style ="border: 2px solid #000;"></td>
                      <td style ="border: 2px solid #000;"></td>
                      <td style ="border: 2px solid #000;"></td>
                        
                   </tr>
                 

                  <?php $cont++; } ?>
                </tbody>
              </table>  
              
            </div>
            <!-- end card body -->
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENEDOR -->
    </section>
  </div>
 <?php require_once 'footer/scripts.php'; ?>
<!-- <script src="../js/jquery.PrintArea.js"></script> -->
<script>
  $(document).ready(function(){
     $('.anioe').val("CICLO ESCOLAR "+moment().format('YYYY'));
     $('.buttonImage').click(function(){
      imprim1("capture");
    //   var scaleBy = 4;
    // var w = 1000;
    // var h = 1000;
    // var div = document.querySelector('#capture');
    // var canvas = document.createElement('canvas');
    // var image =document.createElement('img');
    // canvas.width = w * scaleBy;
    // canvas.height = h * scaleBy;
    // canvas.style.width = w + 'px';
    // canvas.style.height = h + 'px';
    // var context = canvas.getContext('2d');
    // context.scale(scaleBy, scaleBy);

    // html2canvas(div, {canvas:canvas}).then(canvas=>{
    //         image.src=canvas.toDataURL("image/PNG");
    //         document.body.appendChild(image);

            
        // });


    
        



     })
      // $('#tableedades').load("http://localhost/ValleSistema2/vistas/TablaEdades.php");     

      // $('#tablerepresentante').load("http://localhost/ValleSistema2/vistas/TablaRepresentante.php");     
  });

   
</script>
</html>