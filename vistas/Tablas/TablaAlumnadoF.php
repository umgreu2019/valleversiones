<?php
session_start();
require_once "../../php/conexion.php";
$c        = new conex();
$conexion = $c->conexion();

$idarea = 0;
$idcate = 0;
$idnivel = 0;
$idcurso = 0;

$sql = "SELECT a.carnet,a.pnombre,a.snombre,a.papellido,a.sapellido,a.genero FROM curso c INNER JOIN obtener o ON o.id_curso=c.id_curso INNER JOIN grado g ON o.id_grado=g.id_grado INNER JOIN areaescolar l ON g.id_area=l.id_area INNER JOIN alumno a ON a.id_grado=g.id_grado WHERE c.id_curso='$idcurso' AND l.id_area='$idarea' AND g.id_grado='$idnivel'";
$cont=0;
$result = mysqli_query($conexion, $sql);
$cont= mysqli_num_rows($result);
?>
<div class="table-responsive">
  <table id="IdNOTAS" class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <thead style="background-color: #0e5430; color:white; font-weight: bold;">
      <tr>
        <td>Carnet</td>
        <td>Nombre Completo</td>
        <td>Apellido Completo</td>
        <td>Genero</td>
        <td>Estado Alumno</td>
      </tr>
    </thead>
    <tfoot style="background-color: #7a757d;color: white; font-weight: bold;">
      <tr>
      <td>Carnet</td>
        <td>Nombre Completo</td>
        <td>Apellido Completo</td>
        <td>Genero</td>
        <td>Estado Alumno</td>
      </tr>
    </tfoot>
    <tbody style="background-color:white">
  <?php 
  if($cont>0){
  while ($mostrar = mysqli_fetch_row($result)): ?>
  <tr>
  <td><?php echo $mostrar[0] ?></td>
  <td><?php echo $mostrar[1]." ".$mostrar[2]?></td>
  <td><?php echo $mostrar[3]." ".$mostrar[4]?></td>
  <td><?php echo $mostrar[5] ?></td>
  <td>ACTIVO</td>
</tr>
<?php endwhile;?>
  <?php }?>
</tbody>
</table>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#IdNOTAS').DataTable();
  } );
</script>
