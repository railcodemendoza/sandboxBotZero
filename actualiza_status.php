<?php include("db.php");


foreach ($_POST['statusGral'] as $statusGral);

if (isset($_POST['actualizarStatus'])){

  $cntr= $_POST['cntr'];
  $description=  $_POST['description'];
  $user = $_SESSION['user'];
  $empresa = $_SESSION['company'];
  $booking = $_POST['booking'];

  // si no está terminada: 
  if($statusGral == "TERMINADA"){
      // si la carga está terminada. Acualizamos el Status en la tabla Status

      $query = "INSERT INTO `status`(`status`, `main_status`, `cntr_number`, `user_status`) VALUES ('$description','$statusGral', '$cntr', '$user')";
      $result = mysqli_query($conn, $query);

     
     // Revisamos si está ok el Resultado si no es asi avisamos al Usuario. 

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

      // si la carga está terminada. Acualizamos el Status en la tabla Status

      $query = "INSERT INTO `status`(`status`, `main_status`, `cntr_number`, `user_status`) VALUES ('$description','$statusGral', '$cntr', '$user')";
      $result = mysqli_query($conn, $query);


      $to = 'pablorio@botzero.tech';
      $date = date('Y-m-d H:i');
  
      //remitente del correo
      $from = 'info@botzero.tech';
      $fromName = 'Total Trade Group';
  
  //Asunto del email
  $subject = '['.$date.'] Carga CON PROBLEMA - CNTR: ' .$cntr; 
  
  //Ruta del archivo adjunto
  $file_ad = $filename;
  
  //Contenido del Email
  $htmlContent = 
  '<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  </head>
  <body>
  <h4 style="color:#2E303E;">Estimado:</h4>
  <br>
  <p> Informamos que la Carga del CNTR ' .$cntr. ' ha cambiado su status a <strong>' . $statusGral .'</strong></p>
  <br>
  <p><strong>Observaciones: </strong>' .$description. '</p>
  
  <br>
  <p>  Atte, Equipo de Total Trade Group</p>
  <img style="height:50px; width: auto;" src="http://ttlgroup.botzero.tech/images/ttl/TT.png" >
  <br>
  <br>
  <p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="http://botzero.tech" >BotZero</a> utilizada por Total Trade Group</p>
  </body>
  </html>';
  
  //Encabezado para información del remitente
  $headers = "De: $fromName"." <".$from.">";
  
  //Limite Email
  $semi_rand = md5(time()); 
  $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
  
  //Encabezados para archivo adjunto 
  $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
  
  //límite multiparte
  $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
  "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 
  
  //preparación de archivo
  
  $message .= "--{$mime_boundary}--";
  $returnpath = "-f" . $from;
  
  //Enviar EMail
      $mail = @mail($to, $subject, $message, $headers, $returnpath);   
  
     // Revisamos si está ok el Resultado si no es asi avisamos al Usuario. 

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
        
      
      $title = 'Carga '. $cntr . ' con Problemas';
      $query_user = "SELECT user_cntr FROM cntr WHERE cntr_number = '$cntr'";
      $result_user = mysqli_query($conn, $query_user);

      if (mysqli_num_rows($result_user) == 1) {
        $row = mysqli_fetch_array($result_user);
        $user_to = $row['user_cntr'];
      }

      $query_notification ="INSERT INTO notification (`title`, `description`, `user_to`,`status`,`sta_carga`, `user_create`, `company_create`, `cntr_number`, `booking`) VALUES ('$title','$description','$user_to','No Leido', 'CON PROBLEMA','$user','$empresa','$cntr','$booking')";
      $result_notif = mysqli_query($conn, $query_notification); 

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
        $query_id= "SELECT id FROM carga WHERE booking = '$booking'";
        $result_id = mysqli_query($conn, $query_id);
        if (mysqli_num_rows($result_id) == 1) {
          $row = mysqli_fetch_array($result_id);
          $id = $row['id'];
        }
        $_SESSION['message'] = 'Se modificó el satus a: '. $statusGral;
        $_SESSION['message_type'] = 'success';
        header('location:includes/view_carga_user.php?id='.$id);
      } 
  }elseif($statusGral == "STACKING"){

    // si la carga está en Staking, Acualizamos el Status en la tabla Status

    $query = "INSERT INTO `status`(`status`, `main_status`, `cntr_number`, `user_status`) VALUES ('$description','$statusGral', '$cntr', '$user')";
    $result = mysqli_query($conn, $query);

    
    $to = 'pablorio@botzero.tech';
    $date = date('Y-m-d H:i');

    //remitente del correo
    $from = 'info@botzero.tech';
    $fromName = 'Total Trade Group';

//Asunto del email
$subject = '['.$date.'] Carga INGRESADA A STACKING - CNTR: ' .$cntr; 

//Ruta del archivo adjunto
$file_ad = $filename;

//Contenido del Email
$htmlContent = 
'<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<h4 style="color:#2E303E;">Estimado:</h4>
<br>
<p> Informamos que la Carga del CNTR ' .$cntr. ' ha cambiado su status a <strong>' . $statusGral .'</strong></p>
<br>
<p><strong>Observaciones: </strong>' .$description. '</p>

<br>
<p>  Atte, Equipo de Total Trade Group</p>
<img style="height:50px; width: auto;" src="http://ttlgroup.botzero.tech/images/ttl/TTchica.png" >


<br>
<br>
<p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="http://botzero.tech" >BotZero</a> utilizada por Total Trade Group</p>
</body>
</html>';

//Encabezado para información del remitente
$headers = "De: $fromName"." <".$from.">";

//Limite Email
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//Encabezados para archivo adjunto 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//límite multiparte
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

//preparación de archivo

$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//Enviar EMail
    $mail = @mail($to, $subject, $message, $headers, $returnpath);   

   // Revisamos si está ok el Resultado si no es asi avisamos al Usuario. 

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

      $_SESSION['message'] = 'Se modificó el satus a: '. $statusGral;
      $_SESSION['message_type'] = 'success';
      header('location:includes/view_carga_user.php?id='.$id);
    
}else{
         
    // Insertamos Status en la tabla de Status

    $query = "INSERT INTO `status`(`status`, `main_status`, `cntr_number`, `user_status`) VALUES ('$description','$statusGral', '$cntr', '$user')";
    $result = mysqli_query($conn, $query);

    
    $to = 'pablorio@botzero.tech';
    $date = date('Y-m-d H:i');

    //remitente del correo
    $from = 'info@botzero.tech';
    $fromName = 'Total Trade Group';

//Asunto del email
$subject = '['.$date.'] Carga '.$statusGral.' - CNTR: ' .$cntr; 

//Ruta del archivo adjunto
$file_ad = $filename;

//Contenido del Email
$htmlContent = 
'<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<h4 style="color:#2E303E;">Estimado:</h4>
<br>
<p> Informamos que la Carga del CNTR ' .$cntr. ' ha cambiado su status a <strong>' . $statusGral .'</strong></p>
<br>
<p><strong>Observaciones: </strong>' .$description. '</p>

<br>
<p>  Atte, Equipo de Total Trade Group</p>
<img style="height:50px; width: auto;" src="http://ttlgroup.botzero.tech/images/ttl/TTchica.png" >


<br>
<br>
<p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="http://botzero.tech" >BotZero</a> utilizada por Total Trade Group</p>
</body>
</html>';

//Encabezado para información del remitente
$headers = "De: $fromName"." <".$from.">";

//Limite Email
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//Encabezados para archivo adjunto 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//límite multiparte
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

//preparación de archivo

$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//Enviar EMail
    $mail = @mail($to, $subject, $message, $headers, $returnpath);   

    // Revisamos si está ok el Resultado si no es asi avisamos al Usuario. 
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
      $id = $row['id'];}
    
        $_SESSION['message'] = 'Se modificó el satus a: '. $statusGral;
        $_SESSION['message_type'] = 'success';
        header('location:includes/view_carga_user.php?id='.$id);
      }
}
?>