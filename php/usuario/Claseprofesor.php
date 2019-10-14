<?php
require_once "../conexion/conexion.php";

class Profesor{

public function InsertarProfe($datos){
    $c        = new conex();
    $conexion = $c->conexion();
    $diascontra="1 years";
    $fecha=date('d-m-Y');
    $sql2 = "INSERT INTO empleado(DPI,NUMERO_CONTACTO,EMAIL,nombre,apellido,CEDULA_DOCENTE,PROFESION,id_tipoem,RESIDENCIA,DEP_RESIDENCIA,
    MUN_RESIDENCIA,GENERO,FECHA_NACIMIENTO,DEP_NACIMIENTO,MUN_NACIMIENTO,FECHA_REGISTRO,Usuario,Contra,Estado,Fecha_actualizacion,DiasContra)VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]','$datos[11]','$datos[12]','$datos[13]','$datos[14]','$datos[15]','$datos[17]','$datos[18]','$datos[19]','$fecha','$diascontra')";
    return mysqli_query($conexion, $sql2);
}
public function GenerarContra(){
    $dato=uniqid();
    return $dato;
}

public function GenerarUsuario($datos){
$usuario=$datos;
return $usuario;
}

static public function mdlCambiarContra($datos){
    $stm=new conex();
    $stmt= $stm->conexion();
    
    $cambio=$datos[0]." ".$datos[1];
    $update="UPDATE empleado SET DiasContra='$cambio'";
    $resultad3=mysqli_query($stmt,$update);
    return $resultad3;
    }

public function Cambios($passa,$valor,$hoy,$pass){
    $c        = new conex();
    $conexion = $c->conexion();

    $insert="INSERT INTO contrasena(password,id_usuario,fecha_registro) VALUES('$passa','$valor',NOW())";
    $re=mysqli_query($conexion,$insert);
    
    // $dias="SELECT DISTINCT(DiasContra) FROM empleado ORDER BY DiasContra DESC";
    // $e=mysqli_query($conexion,$dias);

    // $fetch=mysqli_fetch_array($e)[0];

    $upd="UPDATE empleado SET Contra='$pass',Fecha_actualizacion='$hoy',DiasContra='$fetch[0]' WHERE id_empleado='$valor'";
    $re1=mysqli_query($conexion,$upd);

    return ($re+$re1);
}

    public function permisos_usuarios($datos, $estados, $content)
    {
        $contt    = 0;
        $c        = new conex();
        $conexion = $c->conexion();
        $date=date('d/m/Y');
        $valida    = self::InsertarProfe($datos);
        $idusuario = self::obtenerid();

        if ($valida > 0) {
            for ($i = 0; $i < 10; $i++) {
                $sql   = "INSERT INTO usuario_permiso (id_usuario,id_permiso,estado,fecha_registro)VALUES('$idusuario','$content[$i]','$estados[$i]','$date')";
                $contt = $contt + mysqli_query($conexion, $sql);
            }
        }

        return $contt;

    }

    public function obtenerid()
    {
        $c        = new conex();
        $conexion = $c->conexion();

        $sql    = "SELECT id_empleado FROM empleado order by id_empleado desc";
        $result = mysqli_query($conexion, $sql);
        $id     = mysqli_fetch_row($result)[0];

        return $id;
    }



public function actualizarEstado($idusuario){
        $c        = new conex();
        $conexion = $c->conexion();

        $consu = "SELECT Estado FROM empleado WHERE id_empleado='$idusuario'"; 
        $result  = mysqli_query($conexion, $consu);
        $mostrar = mysqli_fetch_array($result);

        if($mostrar[0]=="Desactivado"){
            $estado="Activado";
        }
        else if($mostrar[0]=="Activado"){
         $estado="Desactivado";   
        }
       $sql = "UPDATE empleado SET Estado='$estado' WHERE id_empleado='$idusuario'";
       $result1  = mysqli_query($conexion, $sql);
       
       
       return $estado;
}

public function obtenerDatosUsuario($idusuario)
    {
        $c        = new conex();
        $conexion = $c->conexion();

        $sql = "SELECT id_empleado, DPI, nombre, apellido,DEP_NACIMIENTO,MUN_NACIMIENTO,id_tipoem,RESIDENCIA,NUMERO_CONTACTO,Usuario
        FROM empleado WHERE id_empleado='$idusuario'";

        $result  = mysqli_query($conexion, $sql);
        $mostrar = mysqli_fetch_array($result);
        $datos   = array(
            "id_usuario"     => $mostrar[0],
            "dpi"            => $mostrar[1],
            "nombre"         => $mostrar[2],
            "apellido"       => $mostrar[3],
            "depto"       =>    $mostrar[4],
            "muni"       =>     $mostrar[5],
            "id_tipousuario" => $mostrar[6],
            "direccion"      => $mostrar[7],
            "telefono"       => $mostrar[8],
            "usuario" =>$mostrar[9]
        );
        return $datos;
    }

    public function actualizaUsuario($datos)
    {
        $c        = new conex();
        $conexion = $c->conexion();

        $sql = "UPDATE empleado SET DPI='$datos[1]', nombre='$datos[2]', apellido='$datos[3]', DEP_NACIMIENTO='$datos[4]',MUN_NACIMIENTO='$datos[5]', id_tipoem='$datos[6]', RESIDENCIA='$datos[7]', NUMERO_CONTACTO='$datos[8]',Usuario='$datos[9]',Contra='$datos[10]'
        WHERE id_empleado='$datos[0]'";

        return mysqli_query($conexion, $sql);
        mysqli_close($conexion);
    }

    public function eiminaUsuario($iduser)
    {
        $c        = new conex();
        $conexion = $c->conexion();

        $sql = "DELETE FROM empleado WHERE id_empleado='$iduser'";
        return mysqli_query($conexion, $sql);
        mysqli_close($conexion);
    }


public function habilitar_desabilitar($datos)
    {
        $c        = new conex();
        $conexion = $c->conexion();

        $con     = "SELECT estado FROM usuario_permiso WHERE id_asigna=$datos";
        $result  = mysqli_query($conexion, $con);
        $mostrar = mysqli_fetch_array($result);

        if ($mostrar[0] == 1) {
            $sql2 = "UPDATE usuario_permiso SET estado='0' WHERE id_asigna=$datos";
            return mysqli_query($conexion, $sql2);
        } else if ($mostrar[0] == 0) {
            $sql3 = "UPDATE usuario_permiso SET estado='1' WHERE id_asigna=$datos";
            return mysqli_query($conexion, $sql3);
        }
    }
    }
?>