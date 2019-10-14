<?php
/**
 *
 */
require_once '../conexion/conexion.php';
class Cursos
{

public function insertarCurso($datos,$contador){
    $c        = new conex();
    $conexion = $c->conexion();

    $return = 0;
    $icurso=0;
    $asigna=0;

    for($i=0;$i<$contador;$i++)
    {
        $cur = $datos[$i]['curso']; $desc=$datos[$i]['descr'];
        $sql = "INSERT INTO curso(CURSO,descripcion)VALUES('$cur','$desc')";
        $return= mysqli_query($conexion,$sql);
        
        if($return>0):
        $curso=self::IdCurso();
        $asigna=self::GradoCurso($datos[$i]['nivel'],$curso,$datos[$i]['car'],$datos[$i]['area']);
        endif;

        if($return<=0):
        $asigna=0;
        $icurso=1;
        endif;
    }
    echo ($return+$asigna+$icurso);
}

public function IdCurso(){
    $c        = new conex();
    $conexion = $c->conexion();
    $sql = "SELECT id_curso FROM curso ORDER by id_curso DESC";
    $result=mysqli_query($conexion,$sql);
    $dato=mysqli_fetch_array($result)[0];
    // echo $dato;
    return $dato;
}

public function GradoCurso($grado,$curso,$carrera,$area){
    $c        = new conex();
    $conexion = $c->conexion();
    $consulta="SELECT id_grado FROM grado WHERE grado='$grado' AND id_area='$area' AND id_carrera='$carrera'";
    $r = mysqli_query($conexion,$consulta);
    $obt= mysqli_fetch_array($r);

    $sql = "INSERT INTO obtener(id_grado,id_curso)VALUES('$obt[0]','$curso')";
    $return= mysqli_query($conexion,$sql); 
    return $return;
}


public function guardarAsignacion(){
        $c        = new conex();
        $conexion = $c->conexion();

        $datos = $_SESSION['tablaAsignacionTem'];
        $conta = count($datos);
        $return = 0;

        for ($i = 0; $i < $conta ; $i++) {
            $c = explode("||",$datos[$i]);

            $sql = "INSERT INTO asignacion(id_obtener,id_empleado)VALUES('$c[6]','$c[5]')";
            $return=  mysqli_query($conexion,$sql);
            
        }
        return $return;
    }
}
