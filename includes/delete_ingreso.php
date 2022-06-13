<?php

include("../db.php");

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $query_id = "SELECT id_cntr, cntr.cntr_number FROM cntr INNER JOIN profit ON cntr.cntr_number = profit.cntr_number WHERE profit.id = '$id'";
    $result_id = mysqli_query($conn, $query_id);
    
    if (mysqli_num_rows($result_id) == 1) {

      $row = mysqli_fetch_array($result_id);
        $id_cntr = $row['0'];
        $cntr_number = $row['1'];
    }

  $query = "DELETE FROM `profit` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {

    // Actualizar Profit en la tabal CNTR. 
    
    // buscamos todos los IN USD de la Tabla. 

    $query_in_usd = " SELECT SUM(in_usd) FROM `profit` WHERE cntr_number = '$cntr_number'";
    $result_in_usd = mysqli_query($conn, $query_in_usd);

    if (mysqli_num_rows($result_in_usd) == 1) {
        $row = mysqli_fetch_array($result_in_usd);
        $in_usd = $row['0'];
      }else{
        $in_usd = '0';
      }
  // buscamos todos los OUT USD de la Tabla. 

    $query_out_usd = " SELECT SUM(out_usd) FROM `profit` WHERE cntr_number = '$cntr_number'";
    $result_out_usd = mysqli_query($conn, $query_out_usd);
    
      if (mysqli_num_rows($result_out_usd) == 1) {
          $row = mysqli_fetch_array($result_out_usd);
          $out_usd = $row['0'];
        }else{
          $out_usd = '0';
        }

  // actualizamos PROFIT en tabla cntr

      $profit = $in_usd - $out_usd;
      $query_profit = "UPDATE cntr SET `profit`= '$profit' WHERE cntr_number = '$cntr_number'";
      $result_profit = mysqli_query($conn, $query_profit);

    $_SESSION['message'] = 'Se eliminó correctamente la ingreso';
    $_SESSION['message_type'] = 'success';
    header('location:../formularios/profit_carga.php?id_cntr='. $id_cntr);

  }else{
    
    $_SESSION['message'] = 'No se pudo eliminar ingreso. Por favor reintente';
    $_SESSION['message_type'] = 'danger';
    header('location:../formularios/profit_carga.php?id_cntr='. $id_cntr);

  }
    
}

?>
