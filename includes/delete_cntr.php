<?php

include("../db.php");

if(isset($_GET['id_cntr'])) {

  $id_cntr = $_GET['id_cntr'];
  $query_id="SELECT carga.id FROM `carga` INNER JOIN cntr on carga.booking = cntr.booking WHERE cntr.id_cntr = '$id_cntr'";
  $result_id = mysqli_query($conn, $query_id);
  
  if (mysqli_num_fields($result_id) == 1) {
      $row = mysqli_fetch_array($result_id);
        $id = $row['id'];
      }

  $id_cntr = $_GET['id_cntr'];
  $query = "DELETE FROM cntr WHERE id_cntr = $id_cntr";
  $result = mysqli_query($conn, $query);
  
  if(!$result) {
    die("Query Failed.");
  }



    
  }
  
  $query_id  = "SELECT carga.id FROM carga INNER JOIN cntr ON cntr.booking = carga.booking WHERE id_cntr = '$id_cntr'";
  $result_id = mysqli_query($conn, $query_id);
    
    if (mysqli_num_rows($result_id) == 1) {
      $row = mysqli_fetch_array($result_id);
        $id = $row['id'];
    }


  $_SESSION['message'] = 'Contenedor elimiando Correctamente';
  $_SESSION['message_type'] = 'danger';

  echo "<script>
    location.href='../includes/view_carga.php?id=$id'; 
    
    
  </script>";

?>
