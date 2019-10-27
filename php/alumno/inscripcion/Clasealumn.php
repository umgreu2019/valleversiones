<?php

class Alumno{
    public function generarCarnet()
    {
        /* funcion para generar carnet automatico */
        $c        = new conex();
        $conexion = $c->conexion();

        $sql    = "SELECT carnet FROM alumno order by carnet desc";
        $result = mysqli_query($conexion, $sql);
        $carnet = mysqli_fetch_row($result)[0];

        if ($carnet == "" or $carnet == null or $carnet == 0) {
            $datos = array(
                "carnet" => $carnet + 2918,
            );
            return $datos;
     } else {
            $datos = array(
                "carnet" => $carnet + 1,
            );
            return $datos;
        }
    }

    public function obtenerID($resultado)
    {
        $c        = new conex();
        $conexion = $c->conexion();
        if($resultado[1]<=0){
         $sql="SELECT id_representante FROM representante WHERE pnombre LIKE '$resultado[2]' AND snombre LIKE '$resultado[3]' AND papellido LIKE '$resultado[4]' AND sapellido LIKE '$resultado[5]'";
        $result  = mysqli_query($conexion, $sql);
        $idRepre = mysqli_fetch_array($result)[0];
        return $idRepre;
        }else{
         return $resultado[0];
        }
    }

    public function InscribirAlumno($datos)
    {
        $c        = new conex();
        $conexion = $c->conexion();
        $resultado = self::RegistrarRepresentante($datos);
        $idRepres  = self::obtenerID($resultado);
        $idGrado = self::obtenerGrado($datos[11],$datos[24],$datos[25]);
        $anio=date('Y');

        $sql2 = "INSERT INTO alumno(carnet,pnombre,snombre,papellido,sapellido,id_deptoresidencia,municipio_residencia,direccion,
        edad_alumno,genero,cpersonal,id_grado,id_representante,fecha_registro,ciclo) VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]','$idGrado','$idRepres','$datos[23]','$anio')";
        return mysqli_query($conexion, $sql2);
    }

    public function obtenerGrado($dato1,$dato2,$dato3){
        $c        = new conex();
        $conexion = $c->conexion();
        $sql     = "SELECT id_grado FROM grado WHERE id_area='$dato3' AND id_carrera='$dato2' AND grado='$dato1'";
        $result  = mysqli_query($conexion, $sql);
        $grado = mysqli_fetch_row($result)[0];

        return $grado;
    }

    public function RegistrarRepresentante($datos)
    {
        $c        = new conex();
        $conexion = $c->conexion();
        $arreglo=array($datos[13],$datos[14],$datos[15],$datos[16]);
        $dato=self::VerificarRepresentante($arreglo);

        if($dato[1]<=0){
        $sql = "INSERT INTO representante(pnombre,snombre,papellido,sapellido,
        id_deptoresidencia,municipio_residencia,direccion_reside,dpi,email,numer,fecha_registro, nombreet, numeroet, casaet)
        VALUES('$datos[13]','$datos[14]','$datos[15]','$datos[16]','$datos[17]','$datos[18]','$datos[19]','$datos[20]','$datos[21]','$datos[22]','$datos[23]','$datos[26]','$datos[27]','$datos[28]')";
         $datoarra=array($dato[0],$dato[1],$datos[13],$datos[14],$datos[15],$datos[16]);
          $result  = mysqli_query($conexion, $sql);
         return $datoarra;
        }else{
         return $dato;
        }
    }

    public function VerificarRepresentante($datos){
        $c        = new conex();
        $conexion = $c->conexion();
        $sql="SELECT id_representante FROM representante WHERE pnombre LIKE '$datos[0]' AND snombre LIKE '$datos[1]' AND papellido LIKE '$datos[2]' AND sapellido LIKE '$datos[3]'";
        $respuesta=mysqli_query($conexion, $sql);
        $conteo=mysqli_num_rows($respuesta);
        $dato=mysqli_fetch_array($respuesta)[0];
        
        $array=array($dato,$conteo);
        return $array;
    }   



public function representante($id){
        $c        = new conex();
        $conexion = $c->conexion();
        
        $sql = "SELECT id_representante  FROM alumno   WHERE carnet='$id' or cpersonal='$id'";
        $resultA  = mysqli_query($conexion, $sql);
        $obtenerA = mysqli_fetch_array($resultA);

        return $obtenerA[0];

}

public function area($id){
        $c = new conex();
        $conexion = $c->conexion();

        $sql = "SELECT id_area  FROM grado  WHERE id_grado='$id'";
        $resultA  = mysqli_query($conexion, $sql);
        $obtenerA = mysqli_fetch_array($resultA);

        return $obtenerA[0];  
    }

public function muni($id,$depto){
 $c = new conex();
        $conexion = $c->conexion();

        $sql = "SELECT id_muni FROM municipio  WHERE municipio='$id' and id_depto='$depto'";
        $resultA  = mysqli_query($conexion, $sql);
        $obtenerA = mysqli_fetch_array($resultA);

        return $obtenerA[0];  
}

    public function obtenerDatosEstudiante($idCarnett)
    {
        $c        = new conex();
        $conexion = $c->conexion();

        $idrepres=self::representante($idCarnett);

        $sql = "SELECT *  FROM alumno   WHERE carnet='$idCarnett' OR cpersonal='$idCarnett'";
        $resultA  = mysqli_query($conexion, $sql);
        $obtenerA = mysqli_fetch_array($resultA);

        $area=self::area($obtenerA[12]);

        $muni=self::muni($obtenerA[6],$obtenerA[5]);

        $sql2 = "SELECT *  FROM representante r  WHERE r.id_representante='$idrepres'";

        $resultR  = mysqli_query($conexion, $sql2);
        $obtenerR = mysqli_fetch_array($resultR);
        $munir=self::muni($obtenerR[6],$obtenerR[5]);

        $datos = array(
            "carnet"            => $obtenerA[0],
            "pnombre"           => $obtenerA[1],
            "snombre"           => $obtenerA[2],
            "papellido"         => $obtenerA[3],
            "sapellido"          => $obtenerA[4],
            "deptar"   => $obtenerA[5],
            "muni" => $muni,
            "direccion"            => $obtenerA[7],
            "edad_alumno"     => $obtenerA[8],
            "genero"        => $obtenerA[10],
            "cpersonal"        => $obtenerA[11],
            "grado"       => $obtenerA[12],
            "area"          => $area,
            "rpnombre"           => $obtenerR[1],
            "rsnombre"           => $obtenerR[2],
            "rpapellido"         => $obtenerR[3],
            "rsapellido"         => $obtenerR[4],
            "rdeptar"  => $obtenerR[5],
            "rmuni"  => $munir,
            "rdireccion"  => $obtenerR[7],
            "rdpi"  => $obtenerR[9],
            "remail"  => $obtenerR[10],
            "rnumer"  => $obtenerR[11],
            "nombreet"  => $obtenerR[13],
            "numeroet"  => $obtenerR[14],
            "casaet"  => $obtenerR[15]
        );

        return $datos;
    }

    public function obtenerCantInscripcion($nivel)
    {
        $c        = new conex();
        $conexion = $c->conexion();

        $sql = "SELECT cantidadInscrip
        FROM nivel
        WHERE idNivel='$nivel'";

        $resultA  = mysqli_query($conexion, $sql);
        $obtenerA = mysqli_fetch_row($resultA);

        $datos = array(
            "cantidadInscrip" => $obtenerA[0],
        );

        return $datos;
    }
    /* +++++++++++++++++++ METODOS PARA RE INSCRIPCION +++++++++++++++++++++++ */

    public function ReInscribir($datos)
    {
         $c        = new conex();
        $conexion = $c->conexion();

        $r = self::UpdateDateRepre($datos);
        $mun = self::Updatemuni($datos[6]);
        
        $sql = "UPDATE alumno 
        SET pnombre='$datos[1]',snombre='$datos[2]',
        papellido='$datos[3]',sapellido='$datos[4]',
        id_deptoresidencia='$datos[5]',municipio_residencia='$mun'
        ,direccion='$datos[7]',cpersonal='$datos[8]',edad_alumno='$datos[9]',
        genero='$datos[12]',id_grado='$datos[11]' WHERE carnet='$datos[0]'";

        $r2=mysqli_query($conexion, $sql);
        
        return ($r2+$r);
        /* $sql = "UPDATE usuario SET dpi='$datos[1]', nombre='$datos[2]', apellido='$datos[3]', usuario='$datos[4]', passwrodd='$datos[5]', id_tipousuario='$datos[6]', direccion='$datos[7]', telefono='$datos[8]'
    WHERE id_usuario='$datos[0]'"; */
    }

   public function Updatemuni($idmuni){
         $c        = new conex();
        $conexion = $c->conexion();

    $sql = "SELECT municipio FROM municipio WHERE id_muni='$idmuni'";  
     $res=mysqli_query($conexion, $sql);      
     $respuesta=mysqli_fetch_array($res);
    return $respuesta[0];
   } 

    public function UpdateDateRepre($datos)
    {
         $c        = new conex();
        $conexion = $c->conexion();

        $mun=self::Updatemuni($datos[18]);
        $id=self::representante($datos[0]);

        $sql = "UPDATE representante SET pnombre='$datos[13]',
        snombre='$datos[14]',papellido='$datos[15]',sapellido='$datos[16]',
        id_deptoresidencia='$datos[17]',municipio_residencia='$mun',
        direccion_reside='$datos[19]',dpi='$datos[20]',email='$datos[21]',
        numer='$datos[22]', nombreet='$datos[23]', numeroet='$datos[24]', casaet='$datos[25]' WHERE id_representante='$id'";

        return mysqli_query($conexion, $sql);
    }

}
?>