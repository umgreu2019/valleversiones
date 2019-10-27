<?php
require_once '../../conexion/conexion.php';
$ipAddress = $_SERVER['REMOTE_ADDR'];
if (isset($_POST["subject"])) {
	$conexa = new conex();
    $con = $conexa->conexion();

    $subject = mysqli_real_escape_string($con, $_POST["subject"]);
    $comment = mysqli_real_escape_string($con, $_POST["comment"]);
    $cocc= $_POST["opmultiple"];
    $fecha=$_POST["fecha"];
    $ca=implode(",", $cocc);
 
    $query = "
 	INSERT INTO comments(comment_subject, comment_text,comment_cc,comment_adf, comment_ip)
 	VALUES ('$subject', '$comment','$ca','$fecha','$ipAddress')";
 	mysqli_query($con, $query);
 
}
?>