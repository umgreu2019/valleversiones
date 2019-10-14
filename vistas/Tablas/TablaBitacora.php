<?php
session_start();
require_once "../../php/conexion.php";
$c        = new conex();
$conexion = $c->conexion();

$sql = "SELECT * FROM bitacora";

$result = mysqli_query($conexion, $sql);

?>
  <div class="table-responsive">
  <table id="IdTableBita" class="table table-hover " style="text-align: center;">
    <thead style="background-color: #0e5430; color:white; font-weight: bold;">
      <tr>
        <td>#</td>
        <td>TABLA AFECTADA</td>
        <td>USUARIO</td>
        <td>OPERACION</td>
        <td>ESTADO</td>
        <td>FECHA HORA</td>
      </tr>
    </thead>
    <tfoot style="background-color: #ccc;color: #3333; font-weight: bold;">
      <tr>
        <td>#</td>
        <td>TABLA AFECTADA</td>
        <td>USUARIO</td>
        <td>OPERACION</td>
        <td>ESTADO</td>
        <td>FECHA HORA</td>
      </tr>
    </tfoot>
    <tbody style="background-color:white; color:#0e5430;">
      <?php while ($mostrar = mysqli_fetch_row($result)): ?>
      <tr>
        <td><?php echo $mostrar[0] ?></td>
        <td><?php echo $mostrar[1] ?></td>
        <td><?php echo $mostrar[2] ?></td>
        <td><?php echo $mostrar[3] ?></td>
        <td><?php echo $mostrar[4] ?></td>
        <td><?php echo $mostrar[5] ?></td>
      </tr>
    <?php endwhile;?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#IdTableBita').DataTable();
} );
</script>
