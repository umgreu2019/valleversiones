<?php
session_start();

require_once "../../php/conexion/conexion.php";

$c        = new conex();
$conexion = $c->conexion();

$sql = "SELECT u.id_empleado, u.DPI, u.nombre, u.apellido, t.Nom_Rol, u.RESIDENCIA, u.NUMERO_CONTACTO,u.Estado FROM empleado u, tipoemple t
           WHERE u.id_tipoem=t.id_tipoem";

$result = mysqli_query($conexion, $sql);
$result1 = mysqli_query($conexion, $sql);
$parame = mysqli_fetch_row($result1);
?>

  
  <table id="IdTableEmpleados" class="table table-bordered " style="text-align: center;">
    <thead class="bg-teal" style="color:white; font-weight: bold;">
      <tr>
        <td>#</td>
        <td>DPI</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Tipo Empleado</td>
        <td>Direccion</td>
        <td>Telefono</td>
        <?php 
        if($parame[4]=="ADMINISTRADOR" || $parame[4]=="SUPLENTE ADMINISTRADOR")
        {
         ?>
        <td>Estado</td>
      <?php } ?>
        <td>Acciones</td>
        <td>Editar Permisos</td>
        
      </tr>
    </thead>
    <tfoot class="bg-grey">
      <tr>
        <td>#</td>
        <td>DPI</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Tipo Empleado</td>
        <td>Direccion</td>
        <td>Telefono</td>
          <?php 
        if($parame[4]=="ADMINISTRADOR" || $parame[4]=="SUPLENTE ADMINISTRADOR")
        {
         ?>
        <td>Estado</td>
      <?php } ?>
        <td>Acciones</td>
        <td>Editar Permisos</td>
        
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
        <td><?php echo $mostrar[6] ?></td>
       
         <?php 
        if($parame[4]=="ADMINISTRADOR" || $parame[4]=="SUPLENTE ADMINISTRADOR")
        {
         ?>
        <td>                
        <button onclick="actualiza('<?php echo $mostrar[0] ?>')" class="btn badge <?php echo $mostrar[7]=='Activado'?'bg-green':'bg-red';?>"><?php echo $mostrar[7]; ?></button>
        </td>
        <?php } ?>
        <td>
        <button type="button" rel="tooltip" title="Edit Task" data-toggle="modal" data-target="#Mupdate" class="btn btn-outline-warning btn-sm" onclick="agregarDato('<?php echo $mostrar[0] ?>')">
            <i class="material-icons">edit</i>
          </button>

        <button type="button" rel="tooltip" title="Delete Task" class="btn btn-outline-danger btn-sm" onclick="eliminaDato('<?php echo $mostrar[0] ?>')">
          <i class="material-icons">delete_sweep</i>
          </button>
        </td>
        <td>
          <button type="button" rel="tooltip" title="Edit Permiso" data-toggle="modal" data-target="#Control" class="btn btn-outline-primary btn-sm" onclick="CargarPermisos('<?php echo $mostrar[0] ?>')">
            <i class="material-icons">settings_applications</i>
          </button>
        </td>        
        </tr>
    <?php endwhile;?>
    </tbody>
  </table>


<script type="text/javascript">
   
$(document).ready(function() {
  $('#IdTableEmpleados').DataTable();
});
</script>
