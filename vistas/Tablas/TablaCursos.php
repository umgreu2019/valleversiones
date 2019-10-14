 <?php
session_start();
//select c.idCurso,c.curso from curso c, asignacion a, nivel n WHERE a.idCurso = c.idCurso AND a.idNivel = n.idNivel AND n.idNivel='$idnivel'
?>
 
 <div class="table-responsive">
  <table id="IdTableCursos" class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <thead style="background-color: #0e5430; color:white; font-weight: bold;">
          <tr>
            <td>Codigo</td>
            <td>Curso</td>
            <td>Nivel</td>
            <td>Division</td>
            <td>Catedratico</td>
            <td>Quitar</td>
          </tr>
        </thead>
        <tfoot style="background-color: #ccc;color: #3333; font-weight: bold;">
          <tr>
            <td>Codigo</td>
            <td>Curso</td>
            <td>Nivel</td>
            <td>Division</td>
            <td>Catedratico</td>
            <td>Quitar</td>
          </tr>
        </tfoot>
        <tbody style="background-color:white; color:#0e5430;">
          <?php
if (isset($_SESSION['tablaAsignacionTem'])):
    $i = 0;
    foreach (@$_SESSION['tablaAsignacionTem'] as $key) {
        $mostrar = explode("||", @$key);

        ?>
                          <tr>
                            <td><?php echo $mostrar[0] ?></td>
                            <td><?php echo $mostrar[2] ?></td>
                            <td><?php echo $mostrar[1] ?></td>
                            <td><?php echo $mostrar[0] ?></td>
                            <td><?php echo $mostrar[3] . " " . $mostrar[4] ?></td>
                            <td>
                              <button type="button" rel="tooltip" title="Delete Task" class="btn btn-outline-danger btn-sm" onclick="QuitarP('<?php echo $i ?>')">
                              <i class="material-icons">delete_sweep</i>
                              </button>
                            </td>
                          </tr>
                          <?php
    $i++;
    }
endif;
?>
            </tbody>
          </table>
        </div>
      
    <script type="text/javascript">
      $(document).ready(function() {
        $('#IdTableCursos').DataTable();
      } );
    </script>