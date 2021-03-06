<?php include("db.php");

if (isset($_POST['actualizarStatus'])){

  $cntr= $_POST['cntr'];
  $description=  $_POST['description'];
  $user = $_SESSION['user'];
  $empresa = $_SESSION['company'];
  $booking = $_POST['booking'];

  /* ACCION PARA CARGAS TERMINADAS */
  if($statusGral == "TERMINADA"){
      
    // ACTUALIZA STATUS

    $query = "INSERT INTO `status`(`status`, `main_status`, `cntr_number`, `user_status`) VALUES ('$description','$statusGral', '$cntr', '$user')";
    $result = mysqli_query($conn, $query);

    // SI HAY ERROR LE AVISAMOS AL FRONT

    if(!$result) {

      $query_id= "SELECT id FROM carga WHERE booking = '$booking'";
      $result_id = mysqli_query($conn, $query_id);

      if (mysqli_num_rows($result_id) == 1) {
        $row = mysqli_fetch_array($result_id);
        $id = $row['id'];
      }
        $_SESSION['message'] = 'Algo salió mal';
        $_SESSION['message_type'] = 'danger';
        header('location:formularios/actualizar_status.php?id_cntr='.$id);
    } 

    // SI ESTA TODO OK --> LOGICA DE STATUS GENERAL
      
    // ACTULIZAMOS EL STATUS EN EL CNTR

    $query_update = "UPDATE `cntr` SET `main_status` = '$statusGral', `status_cntr` = '$description' WHERE `cntr_number` = '$cntr'";
    mysqli_query($conn, $query_update);

    // REVISAMOS COMO ESTAN LOS DEMAS CNTR

    $query_validate_status = "SELECT * FROM cntr WHERE booking = '$booking'";
    $resut_validate_status = mysqli_query($conn, $query_validate_status);
    
    $cntr_status = array();
    // BANDERA DE ARRAY 

    $equal = true;
    // COMPARA CADA UNO DE LOS RESULTADOS, SI ALGUNO NO TIENE UN STATUS IGUAL NO LO CAMBIA EN EL GENERAL
    while( $row = mysqli_fetch_array ($resut_validate_status)){
      array_push($cntr_status, ($row['main_status']));
      if($cntr_status[0] != $row['main_status']){
        // SI TODOS SON IGUALES CAMBIA LA BANDERA
        $equal = false;
        break;
      }
    }
    
    // SI TODOS LOS CNTR SON IGUALES CAMBIA EL STATUS GENERAL DE LA CARGA

    if($equal){
        $query_update = "UPDATE carga SET `status` = '$cntr_status[0]' WHERE `booking` = '$booking'";
        mysqli_query($conn, $query_update);
    }   
    
    // ARMAMOS LA NOTIFICACION 
        
    $title = 'Carga '. $cntr . ' Terminada';
    $query_user = "SELECT user_cntr FROM cntr WHERE cntr_number = '$cntr'";
    $result_user = mysqli_query($conn, $query_user);

    if (mysqli_num_rows($result_user) == 1) {
      $row = mysqli_fetch_array($result_user);
      $user_to = $row['user_cntr'];
    }

    $query_notification ="INSERT INTO notification (`title`, `description`, `user_to`,`status`,`sta_carga`, `user_create`, `company_create`, `cntr_number`, `booking`) VALUES ('$title','$description','$user_to','No Leido','TERMINADA','$user','$empresa','$cntr','$booking')";
    $result_user = mysqli_query($conn, $query_notification); 

    if(!$result_user) {
      $query_id= "SELECT id FROM carga WHERE booking = '$booking'";
      $result_id = mysqli_query($conn, $query_id);
      if (mysqli_num_rows($result_id) == 1) {
        $row = mysqli_fetch_array($result_id);
        $id = $row['id'];
      }

      $_SESSION['message'] = 'No se envió notificación';
      $_SESSION['message_type'] = 'danger';
      header('location:formularios/actualizar_status.php?id_cntr='.$id);
    }else{
      $_SESSION['message'] = 'Se modificó el satus a: '. $statusGral;
      $_SESSION['message_type'] = 'success';
      header('location:includes/view_carga_user.php?id='.$id);
    }

  }elseif($statusGral == "CON PROBLEMA"){

      // SI TIENE PROBLEMAS.
      // ACTUALIZA STATUS

      $query = "INSERT INTO `status`(`status`, `main_status`, `cntr_number`, `user_status`) VALUES ('$description','$statusGral', '$cntr', '$user')";
      $result = mysqli_query($conn, $query);
      $tipo = 'problema';
      // ENVIAMOS MAIL POR API
      // Crea un nuevo recurso CURL
      $ch = curl_init();
      // Establece la URL y otras opciones apropiadas
      $url = "https://botzero.ar/api/mailStatus/".$cntr.'/'.$empresa.'/'.$booking.'/'.$description.'/'.$user.'/'.$tipo;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      // Captura la URL y la envía al navegador
      $output = curl_exec($ch);
      
      if($output == 'ok'){

        // si todo esta ok, Acualizamos el estado del CNTR

        $query_update = "UPDATE `cntr` SET `main_status` = '$statusGral', `status_cntr` = '$description' WHERE `cntr_number` = '$cntr'";
        mysqli_query($conn, $query_update);

        // Luego revisamos el status de los demás contenedores de la Carga. 

        $query_validate_status = "SELECT * FROM cntr WHERE booking = '$booking'";
        $resut_validate_status = mysqli_query($conn, $query_validate_status);
        $cntr_status = array();
        $equal = true;

      while( $row = mysqli_fetch_array ($resut_validate_status)){
        array_push($cntr_status, ($row['main_status']));
        if($cntr_status[0] != $row['main_status']){
          $equal = false;
          break;
        }
      }
        // si los status de cada contenedor de la Carga son inguales, actulizamos el Status de la Carga. 
      if($equal){
        $query_update = "UPDATE carga SET `status` = '$cntr_status[0]' WHERE `booking` = '$booking'";
        mysqli_query($conn, $query_update);
      }      
      
      // ARMAMOS NOTIFICACION 
      
      $title = 'Carga '. $cntr . ' con Problemas';
      $query_user = "SELECT user_cntr FROM cntr WHERE cntr_number = '$cntr'";
      $result_user = mysqli_query($conn, $query_user);

      if (mysqli_num_rows($result_user) == 1) {
        $row = mysqli_fetch_array($result_user);
        $user_to = $row['user_cntr'];
      }

      $query_notification ="INSERT INTO notification (`title`, `description`, `user_to`,`status`,`sta_carga`, `user_create`, `company_create`, `cntr_number`, `booking`) VALUES ('$title','$description','$user_to','No Leido', 'CON PROBLEMA','$user','$empresa','$cntr','$booking')";
      $result_notif = mysqli_query($conn, $query_notification); 

      $_SESSION['message'] = 'Status Actualizado y avisado por Correo al Cliente';
      $_SESSION['message_type'] = 'info';

      header('location:formularios/actualizar_status.php?id_cntr='.$id);


      }else{

      $_SESSION['message'] = 'Algo salió mal, por favor vuelta a intentar la acción.';
      $_SESSION['message_type'] = 'danger';

      header('location:formularios/actualizar_status.php?id_cntr='.$id);

      }
        // Cierrar el recurso CURL y libera recursos del sistema
      curl_close($ch); 
  }elseif($statusGral == "STACKING"){

    // si la carga está en Staking, Acualizamos el Status en la tabla Status

    $query = "INSERT INTO `status`(`status`, `main_status`, `cntr_number`, `user_status`) VALUES ('$description','$statusGral', '$cntr', '$user')";
    $result = mysqli_query($conn, $query);
    $tipo = 'stacking';
    
    // ENVIAMOS MAIL POR API
     
    // Crea un nuevo recurso CURL

    $ch = curl_init();

    // Establece la URL y otras opciones apropiadas
    $url = "https://botzero.ar/api/mailStatus/".$cntr.'/'.$empresa.'/'.$booking.'/'.$description.'/'.$user.'/'.$tipo;
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    
    // Captura la URL y la envía al navegador
    $output = curl_exec($ch);

    if($output == 'ok'){
   
      // si todo esta ok, Acualizamos el estado del CNTR

      $query_update = "UPDATE `cntr` SET `main_status` = '$statusGral', `status_cntr` = '$description' WHERE `cntr_number` = '$cntr'";
      mysqli_query($conn, $query_update);

      // Luego revisamos el status de los demás contenedores de la Carga. 

      $query_validate_status = "SELECT * FROM cntr WHERE booking = '$booking'";
      $resut_validate_status = mysqli_query($conn, $query_validate_status);
      $cntr_status = array();
      $equal = true;

      while( $row = mysqli_fetch_array ($resut_validate_status)){
        array_push($cntr_status, ($row['main_status']));
        if($cntr_status[0] != $row['main_status']){
          $equal = false;
          break;
        }
      }
      // si los status de cada contenedor de la Carga son inguales, actulizamos el Status de la Carga. 
      if($equal){
        $query_update = "UPDATE carga SET `status` = '$cntr_status[0]' WHERE `booking` = '$booking'";
        mysqli_query($conn, $query_update);
      }      
      
      // cambiamos el estado del Chofer 

      $query_port = "SELECT unload_place FROM carga WHERE booking = '$booking'";
      $result_port = mysqli_query($conn, $query_port);
      if (mysqli_num_rows($result_port) == 1) {
        $row = mysqli_fetch_array($result_port);
        $port = $row['unload_place'];
      }
    
      $query_chofer = "SELECT driver FROM asign WHERE `booking` = '$booking' AND `cntr_number` = '$cntr' ";
      $result_chofer = mysqli_query($conn, $query_chofer);
      if (mysqli_num_rows($result_chofer) == 1) {
        $rowch = mysqli_fetch_array($result_chofer);
        $chofer = $rowch['driver'];
      }

      $query_libre="UPDATE choferes SET `status_chofer` = 'libre', place = '$port'  WHERE nombre = '$chofer'";
      $result_libre = mysqli_query($conn, $query_libre); 

      $query_id= "SELECT id FROM carga WHERE booking = '$booking'";
      $result_id = mysqli_query($conn, $query_id);

      if (mysqli_num_rows($result_id) == 1) {
        $row = mysqli_fetch_array($result_id);
        $id = $row['id'];
      }
    }else{

        $_SESSION['message'] = 'Algo salió mal, por favor vuelta a intentar la acción.';
        $_SESSION['message_type'] = 'danger';
        header('location:includes/view_carga_user.php?id='.$id);
    }
  curl_close($ch); 

  }else{
         
    // Insertamos Status en la tabla de Status

    $query = "INSERT INTO `status`(`status`, `main_status`, `cntr_number`, `user_status`) VALUES ('$description','$statusGral', '$cntr', '$user')";
    $result = mysqli_query($conn, $query);
    $tipo = 'cambio';
     
    // Crea un nuevo recurso CURL

    $ch = curl_init();

    // Establece la URL y otras opciones apropiadas
    $url = "https://botzero.ar/api/mailStatus/".$cntr.'/'.$empresa.'/'.$booking.'/'.$description.'/'.$user.'/'.$tipo;
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    
    // Captura la URL y la envía al navegador
    $output = curl_exec($ch);
    
    if($output == 'ok'){
      // Si salio todo bien, actulizamos la tabla de CNTR. 

      $query_update = "UPDATE `cntr` SET `main_status` = '$statusGral', `status_cntr` = '$description' WHERE `cntr_number` = '$cntr'";
      mysqli_query($conn, $query_update);

      // Luego revisamos el status de los demás contenedores de la Carga. 

      $query_validate_status = "SELECT * FROM cntr WHERE booking = '$booking'";
      $resut_validate_status = mysqli_query($conn, $query_validate_status);
      $cntr_status = array();
      $equal = true;

      while( $row = mysqli_fetch_array ($resut_validate_status)){
        
        array_push($cntr_status, ($row['main_status']));
          
          if($cntr_status[0] != $row['main_status']){
            $equal = false;
            break;
          }
      }
      // si los status de cada contenedor de la Carga son inguales, actulizamos el Status de la Carga. 

      if($equal){
        $query_update = "UPDATE carga SET `status` = '$cntr_status[0]' WHERE `booking` = '$booking'";
        mysqli_query($conn, $query_update);  
      }
        

      $query_id= "SELECT id FROM carga WHERE booking = '$booking'";
      $result_id = mysqli_query($conn, $query_id);

      if (mysqli_num_rows($result_id) == 1) {
        $row = mysqli_fetch_array($result_id);
        $id = $row['id'];
      }
      
      $_SESSION['message'] = 'Se modificó el satus a: '. $statusGral;
      $_SESSION['message_type'] = 'success';
      header('location:includes/view_carga_user.php?id='.$id);
   
    }else{

      $_SESSION['message'] = 'Algo salió mal, por favor vuelta a intentar la acción.';
      $_SESSION['message_type'] = 'danger';
      header('location:includes/view_carga_user.php?id='.$id);

    }  
  }
  curl_close($ch); 

}
