<?php include('../db.php');

foreach ($_POST['transport'] as $transport);
foreach ($_POST['transport_agent'] as $transport_agent);
foreach ($_POST['driver'] as $driver);
$user = $_SESSION['user'];
$empresa = $_SESSION['company'];

if (isset($_POST['asignar'])){

    $truck = $_POST['truck'];
    $truck_semi = $_POST['truck_semi'];
    $cntr_number = $_POST['cntr_number'];
    $id = $_POST['id'];
    $booking = $_POST['booking'];
    $title = 'CNTR '. $cntr_number. ' tiene su unidad asignada';
    $description = 'Transporte: '. $transport .' - ATA: ' .$transport_agent;

    $query_user = "SELECT user_cntr FROM cntr WHERE cntr_number = '$cntr_number'";
    $result_user = mysqli_query($conn, $query_user);

    if (mysqli_num_rows($result_user) == 1) {
      $row = mysqli_fetch_array($result_user);
      $user_to = $row['user_cntr'];
    }

  $query = "INSERT INTO `asign`(`driver`, `cntr_number`, `booking`, `truck`, `truck_semi`, `transport`, `transport_agent`) VALUES ('$driver', '$cntr_number', '$booking','$truck', '$truck_semi', '$transport', '$transport_agent')";
  $result = mysqli_query($conn, $query);

  $to = 'pablorio@botzero.tech';
  $date = date('Y-m-d H:i');

  //remitente del correo
  $from = 'info@botzero.tech';
  $fromName = 'Trafir :: Total Trade Group';

  $subject = '['.$date.'] Unidad Asignada al CNTR: '.$cntr_number.' - Booking: '.$booking.'.'; 
  //Asunto del email

  //Contenido del Email
  $htmlContent = 
'<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<h4 style="color:#2E303E;">Estimado:</h4>
<br>
<p> Informamos que se ha asignado al CNTR <strong>' .$cntr_number. '</strong> la siguiente unidad: </p>
<p>Tranposrte: '.$transport. '<br> ATA: '.$transport_agent.'<br> Chofer: '.$driver.'<br> Tractor: '.$truck.'<br> Semi: '.$truck_semi.'</p>

<br>
<p>  Atte, Equipo de Total Trade Group</p>

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
  
  $query_port = "SELECT unload_place FROM carga WHERE booking = '$booking'";
  $result_port = mysqli_query($conn, $query_port);
  if (mysqli_num_rows($result_port) == 1) {
    $row = mysqli_fetch_array($result_port);
    $port = $row['unload_place'];
  }
  
  $query_chofer = "SELECT driver FROM asign WHERE `booking` = '$booking' AND `cntr_number` = '$cntr_number' ";
  $result_chofer = mysqli_query($conn, $query_chofer);
  if (mysqli_num_rows($result_chofer) == 1) {
    $rowch = mysqli_fetch_array($result_chofer);
    $chofer = $rowch['driver'];
  }

  $query_ocupado="UPDATE choferes SET `status_chofer` = 'ocupado', place = '$port'  WHERE nombre = '$chofer'";
  $result_ocupado = mysqli_query($conn, $query_ocupado); 

  $query_update = "UPDATE `cntr` SET `main_status` = 'ASIGNADA', `status_cntr` = 'Unidad Asignada' WHERE `cntr_number` = '$cntr_number'";
  mysqli_query($conn, $query_update);

  $query_notification = "INSERT INTO notification (`title`, `description`, `user_to`,`status`,`sta_carga`, `user_create`, `company_create`, `cntr_number`, `booking`) VALUES ('$title','$description','$user_to','No Leido','ASIGNADA','$user','$empresa','$cntr_number','$booking')";
  $result_user = mysqli_query($conn, $query_notification);

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
  if($equal){
    $query_update = "UPDATE carga SET `status` = '$cntr_status[0]' WHERE `booking` = '$booking'";
    mysqli_query($conn, $query_update);

    
  }

  if(!$result){

    $_SESSION['message'] = 'el ' . $cntr_number . ' ya tiene unidad asignada';
    $_SESSION['message_type'] = 'danger';
   header('location:../includes/view_carga_user.php?id='.$id.'#detallecntr'); 
  }else{

    $_SESSION['message'] = 'Se asignó correctamente'. $transport;
    $_SESSION['message_type'] = 'success';
    header('location:../includes/view_carga_user.php?id='.$id.'#detallecntr');
  }
  

    
}