<?php

class datos
    {
        public function obtenerDatos($idmosenc)
        {  
           $c = new conex();
           $conexion = $c->conexion();
            
           $consult = "SELECT id_representante, pnombre, snombre, papellido, sapellido, id_deptoresidencia, municipio_residencia, direccion_reside, dpi, email, numer, nombreet, numeroet, casaet  FROM representante WHERE id_representante ='$idmosenc'";
           $result = mysqli_query($conexion, $consult);

           $dato = mysqli_fetch_row($result);

           $mostrar = array(
                "pnombre" =>$dato[1],
                "snombre" =>$dato[2],
                "papellido" =>$dato[3],
                "sapellido" =>$dato[4],
                "id_deptoresidencia" =>$dato[5],
                "municipio_residencia" =>$dato[6],
                "direccion_reside" =>$dato[7],
                "dpi" =>$dato[8],
                "email" =>$dato[9],
                "numer" =>$dato[10],
                "nombreet" =>$dato[11],
                "numeroet" =>$dato[12],
                "casaet" =>$dato[13],
           );
           return $mostrar;
        }
    }
