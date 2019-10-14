 <?php
session_start();
//select c.idCurso,c.curso from curso c, asignacion a, nivel n WHERE a.idCurso = c.idCurso AND a.idNivel = n.idNivel AND n.idNivel='$idnivel'
?>


 <div class="table-responsive">
  <table id="IdTablePagos" class="table impreso table-hover table-condensed table-bordered " style="text-align: center;">
    <thead class="impre " style="background-color: rgba(20,200,40,0.98); color:white; font-weight: bold;">
          <tr>
            <td>No. Boleta</td>
            <td>Formato de Pago</td>
            <td>Nivel Escolar</td>
            <td>Estudiante</td>
            <td>Grado</td>
            <td>Tipo de Pago</td>
            <td>Subtotal</td>
            <td>Carrera</td>
            <td>Mes</td>
            <td>Accion</td>
          </tr>
        </thead>
        <tfoot class="impre" style="background-color: #ccc;color: #3333; font-weight: bold;">
          <tr>
             <td>No. Boleta</td>
            <td>Formato de Pago</td>
            <td>Nivel Escolar</td>
            <td>Estudiante</td>
            <td>Grado</td>
            <td>Tipo de Pago</td>
            <td>Subtotal</td>
            <td>Carrera</td>
            <td>Mes</td>
            <td>Accion</td>
          </tr>
        </tfoot>
        <tbody style="background-color:white; color:#0e5430;">
          <?php
if (isset($_SESSION['tablaPa'])):
    $i=0;
    foreach (@$_SESSION['tablaPa'] as $key) {
        $mostrar = explode("||", @$key);

        ?>
                          <tr>
                            <td><?php echo $mostrar[0] ?></td>
                            <td><?php echo $mostrar[1] ?></td>
                            <td><?php echo $mostrar[2] ?></td>
                            <td><?php echo $mostrar[6] ?></td>
                            <td><?php echo $mostrar[3] ?></td>
                            <td><?php echo $mostrar[4] ?></td>
                            <td><?php echo $mostrar[5] ?></td>
                            <td><?php echo $mostrar[7] ?></td>
                            <td><?php echo $mostrar[8] ?></td>

                            <td>
                              <button type="button" rel="tooltip" title="Delete Task" class="impre btn btn-outline-danger btn-sm" onclick="QuitarP('<?php echo $i ?>')">
                              <i class="material-icons">delete_sweep</i>
                              </button>
                            </td>
                          </tr>
                          <?php
    
      }
      $i++;
endif;
?>
            </tbody>
          </table>
        </div>
      
    <script type="text/javascript">
      
      $(document).ready(function() {
        
        $('#IdTablePagos').DataTable({
          "language": {
            "url": "http://localhost/ICAT/js/plugins/lenguaje.json"
        }
        });
      } );
    </script>