<?php
session_start();
require_once "../../conexion/conexion.php";
require_once "Clasealumn.php";

$obj = new Alumno();

$datos = array(
    $_POST['recarnet'], //->0
    $_POST['rpnoma'], //->1
    $_POST['rsnoma'], //->2
    $_POST['rpapa'], //->3
    $_POST['rsapa'], //->4
    $_POST['rideptor'], //->5
    $_POST['ridmunir'], //->6
    $_POST['rdira'], //->7
    $_POST['rcodigo'], //->8
    $_POST['rfechana'], //->9
    $_POST['rarea'], //->10
    $_POST['rgrado'], //->11
    $_POST['rgenero'], //->12
    $_POST['rpnombree'],// 13
    $_POST['rsnomr'], //->14
    $_POST['rpaper'], //->15
    $_POST['rsaper'], //->16
    $_POST['rideptorr'], //->17
    $_POST['ridmunirr'], //->18
    $_POST['rdirr'], //->19
    $_POST['rdpi'], //->20
    $_POST['remail'], //->21
    $_POST['numer'], //->22
    $_POST['nombreet'],//->23
    $_POST['numeroet'],//->24
    $_POST['casaet'] //->25
);
echo $obj->ReInscribir($datos);
