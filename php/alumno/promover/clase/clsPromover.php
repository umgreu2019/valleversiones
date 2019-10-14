<?php

class promocion{
    public function updatePromocion($check,$idarea,$idnivel,$idcarrera,$anio,$anio2){
        $c          = new conex();
        $conexion   =$c->conexion();

        //verificar grado
        if($idcarrera==0){
            
            for($i=0; $i<count($check); $i++){
                $verificar  = "SELECT id_grado FROM alumno WHERE carnet='$check[$i]'";
                $resultv    =mysqli_query($conexion,$verificar);
                $objv       =mysqli_fetch_array($resultv);

                $obj=self::verifica_grado($idarea,$idnivel,$idcarrera);
                $verificaN=self::verifica_estado($check[$i],$anio2);

                if($obj >$objv[0] && $verificaN>=60){
                    $cp=self::copiar($check[$i]);
                    if($cp>0){
                        $uptdate="UPDATE alumno SET id_grado='$obj[0]', ciclo='$anio' WHERE carnet='$check[$i]'";
                        mysqli_query($conexion,$uptdate);

                        return 1;
                    }
                }else{
                    return 0;
                }
            }
        }else{
            for($i=0; $i<count($check); $i++){
                $verificar  = "SELECT a.id_grado,g.grado,g.id_area,g.id_carrera FROM alumno a, grado g 
                               WHERE a.id_grado=g.id_grado AND a.carnet='$check[$i]'";
                $resultv    =mysqli_query($conexion,$verificar);
                $objv       =mysqli_fetch_array($resultv);

                $obj=self::verifica_grado($idarea,$idnivel,$idcarrera);
                $verificaN=self::verifica_estado($check[$i],$anio2);

                //echo "idnivel: ".$idnivel." objv[1]: ".$objv[1]."|| idarea: ".$idarea." objv[2]: ".$objv[2]."||  idcarrera: ".$idcarrera." objv[3]: ".$objv[3]." verifican: ".$verificaN;
                if($objv[1]<$idnivel && $objv[2]==$idarea && $objv[3]==$idcarrera && $verificaN>=60){
                    $cp=self::copiar($check[$i]);
                    if($cp>0){
                        $uptdate="UPDATE alumno SET id_grado='$obj', ciclo='$anio' WHERE carnet='$check[$i]'";
                        mysqli_query($conexion,$uptdate);

                        return 1;
                    }
                }else{
                    return 0;       
                }
            }
        }
    }

    public function copiar($id){
        $c          = new conex();
        $conexion   =$c->conexion();

        $sql    ="SELECT carnet,id_deptoresidencia,cpersonal,id_grado,id_representante,becado 
                  FROM alumno WHERE carnet='$id'";
        $result =mysqli_query($conexion,$sql);
        $obt    =mysqli_fetch_array($result);

        if($obt2=mysqli_num_rows($result)>0){
            $sql2       ="INSERT INTO cpalumno(carnet,id_deptoresidencia,cpersonal,id_grado,id_representante,becado)
                          VALUES('$obt[0]','$obt[1]','$obt[2]','$obt[3]','$obt[4]','$obt[5]')";
            $result2    =mysqli_query($conexion,$sql2);

        }

        return $result2;
    }

    public function verifica_grado($idarea,$idnivel,$idcarrera){
        $c          = new conex();
        $conexion   =$c->conexion();

        $consulta   ="SELECT id_grado FROM grado WHERE grado='$idnivel' AND id_area='$idarea' 
                      AND id_carrera='$idcarrera'";
        $result     =mysqli_query($conexion,$consulta);
        $obj        =mysqli_fetch_array($result);

        return $obj[0];
    }

    public function verifica_estado($check,$anioN){
        $c          = new conex();
        $conexion   =$c->conexion();

        $nota   = "SELECT promedio FROM nota WHERE id_alumno='$check' AND bimestre='4' AND ciclo_escolar='$anioN'";
        $rslt   = mysqli_query($conexion,$nota);
        $obj    = mysqli_fetch_array($rslt);

        return $obj[0];
    }
}