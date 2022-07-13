<?php 

    $ch = curl_init();
    // Establece la URL y otras opciones apropiadas
    $url = "https://botzero.ar/api/mailStatus/".$booking;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      // Captura la URL y la envía al navegador
      $output = curl_exec($ch);
      
      if($output == 'ok'){
        $_SESSION['message'] = 'Algo salió mal, por favor vuelta a intentar la acción.';
        $_SESSION['message_type'] = 'danger';
  
        header('location:formularios/actualizar_status.php?id_cntr='.$id);
      }else{

        $_SESSION['message'] = 'Algo salió mal, por favor vuelta a intentar la acción.';
        $_SESSION['message_type'] = 'danger';
  
        header('location:formularios/actualizar_status.php?id_cntr='.$id);
      }
?>