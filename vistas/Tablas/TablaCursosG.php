<?php
session_start();
require_once "../../php/conexion.php";

$c        = new conex();
$conexion = $c->conexion();


$qli="SELECT c.id_curso, c.CURSO FROM curso c ";

$result = mysqli_query($conexion, $qli);
?>

<table id="TablaCurso" class="table table-sm table-hover " style="text-align: center;">
<thead  style="background-color: rgba(255,70,10,0.7); color:white;">
<tr>
	<th>CODIGO</th>
	<th>CURSO</th>
	<th>NO.</th>
</tr>
</thead>
<tbody>
<?php while($mos=mysqli_fetch_array($result)):?>
<tr>
	<td class="h6 text-left font-weight-bold text-primary"><?php echo $mos[0] ?></td>
	<td class="h6 text-right font-weight-bold text-primary"><?php echo $mos[1] ?></td>
	
	<td>#</td>
</tr>
<?php endwhile; ?>
</tbody>
<tfoot style="border: 1px solid #000; background-color: rgba(0,0,0,0.65); color: white;">
<tr>
	<td>CODIGO</td>
	<td>CURSO</td>
	<td>NO.</td>
	<td>Acciones</td>
</tr>
</tfoot>
</table>

<script type="text/javascript">
$(document).ready(function() {
  
  $('#TablaCurso').SetEditable();

  $('#TablaCurso').DataTable(
  	{"language": {
            "url": "http://localhost/Liceo/js/plugins/lenguaje.json"
        },
      paging: true});
  
} );
</script>