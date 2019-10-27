<?php
require_once "../../conexion/conexion.php";
require_once "Clasealumn.php";
$a = new Alumno();
$da=0;
$fecha_actual=date("d/m/Y");
        $datos=array(
          $_POST['carne'],//0          0   
          $_POST['pnoma'],  //1   Si   1 
          $_POST['snoma'],  //2   Si   2
          $_POST['papa'],  //3    Si   3 
          $_POST['sapa'], //4     Si   4
          $_POST['ideptora'],//5  Si   5 
          $_POST['idmunira'],//6  Si   6 
          $_POST['dira'],//7      Si   7 
          $_POST['fechana'],//8   Si   8
          
          $_POST['generoa'],//12 ->9
          
          $_POST['latera'],//14/->11 // Codi Personal 10
          $_POST['grado'],//15 ->12  11
           //16  //Hasta aqui termina la parte del alumno empieza la del representante
          $da, //->13  12
          $_POST['pnombree'], //16 pnomr->14 13
          $_POST['snomr'], //17 ->15 14
          $_POST['paper'], //18 ->16 15
          $_POST['saper'], //19 ->17 16
          $_POST['ideptorr'],//20 ->18 17
          $_POST['idmunirr'],//21 ->19 18
          $_POST['dirr'],//22 ->20 19 
          
          $_POST['dpi'],//26 ->22 20
          $_POST['email'],//27 ->23 21
          $_POST['numer'],//28 ->24 22
          $fecha_actual,//29, ->25 23
          $_POST['carrera'], //adicional 24
          $_POST['arean'],//adicional 25

          // Inicia parte del encargado titular

          $_POST['nombreet'], // 28 26
          $_POST['numeroet'], // 29 27
          $_POST['casaet'] //30 28

        );
        // echo $datos[16];
        echo $a ->InscribirAlumno($datos);


?>