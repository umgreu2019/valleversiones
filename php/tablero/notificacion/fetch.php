<?php
session_start();
require_once '../../conexion/conexion.php';
$nombre=$_SESSION['nombre'];
$apellido=$_SESSION['apellido'];
$puesto=$_SESSION['puesto'];

if (isset($_POST['view'])) {
    $conexa = new conex();
    $con = $conexa->conexion();

    if ($_POST["view"] != '') {
        $update_query = "UPDATE comments SET comment_status = 1 WHERE comment_status=0 AND comment_cc LIKE '%".$puesto."%' OR comment_cc LIKE '%".$nombre."%'";
        mysqli_query($con, $update_query);
    }
    
    $query  = "SELECT * FROM comments WHERE comment_cc LIKE '%".$puesto."%' OR comment_cc LIKE '%".$nombre."%' ORDER BY comment_id DESC  LIMIT 5";
    $result = mysqli_query($con, $query);
    $output = '';
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
        $arr=explode(",",$row['comment_cc']);
        if((in_array($puesto,$arr)) || (in_array($nombre,$arr))){

           $output .= '
          <a class="dropdown-item" href="#?" id=' . $row["comment_id"] . '">
          <div class="row">
          <div class="col-md-12"><strong>' . $row["comment_subject"] . '</strong></div>
          <div class="col-md-12"><small><em>' . $row["comment_text"] . '</em></small></div>
          <div class="col-md-12 text-center mt-1"><small class="font-weight-bold">' . $row["comment_adf"] . '</small></div>
          </div>
          </a>
          <div class="dropdown-divider"></div>
          ';
        }
      }
      if($output=="" || empty($output)){
        $output .= '<a href="#" class="dropdown-item font-weight-bold col-red">No hay notificaciones</a>';
      }
    }
    
    else {
        $output .= '<a href="#" class="dropdown-item font-weight-bold col-red">No hay notificaciones</a>';
    }
    
    $status_query = "SELECT * FROM comments WHERE comment_status=0 AND comment_cc LIKE '%".$puesto."%' OR comment_cc LIKE '%".$nombre."%'";
    $result_query = mysqli_query($con, $status_query);
    $count        = mysqli_num_rows($result_query);
    
    $data = array(
        'notification' => $output,
        'unseen_notification' => $count
    );
    
    echo json_encode($data);
}
?>