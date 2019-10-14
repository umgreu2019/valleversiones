<?php

class conex{
    public function conexion(){
        $pasword='';
        $user='root';
        $server='localhost';
        $conex=mysqli_connect($server,$user,$pasword,'u606323985_valle') or die ('No se pudo conectar a la base de datos'.mysqli_error($conex));;
        $acento=mysqli_query($conex,"SET NAMES 'utf8'");

        return $conex;
    }
}
?>