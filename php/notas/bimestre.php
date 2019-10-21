<?php
session_start();

require_once "../conexion/conexion.php";
$c        = new conex();
$conexion = $c->conexion();

$idarea = $_POST['id_area'];

//$sql = "SELECT * FROM nivel WHERE id_division=$id_area ORDER BY idNivel ASC";

$sql = "SELECT g.No_Unidades FROM grado g WHERE g.id_grado='$idarea'";

$consulta = mysqli_query($conexion, $sql);
$most=mysqli_fetch_array($consulta);
$contador=(int)$most[0];
$html     = "<option  value='0'>Seleccione el Bimestre</option>";
echo $html;

for($i=0; $i<$contador; $i++) {
	$o=($i+1);
	$roma=a_romano($o);
    
    $html = "<option value='" . ($i+1) . "' > Bimestre ".$roma. " </option> ";
    echo $html;
}


  function a_romano($integer, $upcase = true) 
    {
        $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 
                       'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9,   
                       'V'=>5, 'IV'=>4, 'I'=>1);
        $return = '';
        while($integer > 0) 
        {
            foreach($table as $rom=>$arb) 
            {
                if($integer >= $arb)
                {
                    $integer -= $arb;
                    $return .= $rom;
                    break;
                }
            }
        }
        return $return;
    }
?>