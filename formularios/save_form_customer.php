<?php include("../db.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>


  
</body>
</html>

<?php 

if (isset($_POST['save_form_expoMar'])){

  foreach ($_POST['shipper'] as $shipper);
  foreach ($_POST['commodity'] as $commodity);
  foreach ($_POST['load_place'] as $load_place);
  foreach ($_POST['unload_place'] as $unload_place);
  foreach ($_POST['oceans_line'] as $oceans_line);
  foreach ($_POST['final_point'] as $final_point);
  foreach ($_POST['consignee'] as $consignee);
  foreach ($_POST['notify'] as $notify);
  foreach ($_POST['custom_place'] as $custom_place);
  foreach ($_POST['custom_agent'] as $custom_agent);

    $ref_customer= $_POST['ref_customer'];
    $booking= $_POST['booking'];
    $load_date= $_POST['load_date'];
    $cut_off_fis= $_POST['cut_off_fis'];
    $vessel= $_POST['vessel'];
    $voyage= $_POST['voyage'];
    $ETA= $_POST['ETA'];
    $ETD= $_POST['ETD'];
    $observation_customer= $_POST['observation_customer'];
    $nombre_bookingConf = $_FILES['document_bookingConf']['name'];
    $guardar_bookingConf= $_FILES['document_bookingConf']['tmp_name'];

    $user= $_SESSION['user'];
    $company  = $_SESSION['company'];

    $query = "INSERT INTO `carga`(`shipper`, `type`,`booking`, `commodity`, `load_place`, `load_date`, `unload_place`, `cut_off_fis`, `oceans_line`, `vessel`, `voyage`, `final_point`, `ETA`, `ETD`, `consignee`, `notify`, `custom_place`, `custom_agent`, `ref_customer`, `observation_customer`, `document_bookingConf`, `user`, `Empresa`, `status`) VALUES ('$shipper', 'Expo Maritima','$booking', '$commodity', '$load_place', '$load_date', '$unload_place', '$cut_off_fis', '$oceans_line', '$vessel', '$voyage', '$final_point', '$ETA', '$ETD', '$consignee', '$notify', '$custom_place', '$custom_agent', '$ref_customer', '$observation_customer', '$nombre_bookingConf', '$user','$company', 'NO ASIGNADA')";
    $result = mysqli_query($conn, $query);

    if(!file_exists('archivos_bookingConf/'. $booking)){
          
          mkdir('archivos_bookingConf/'. $booking, 0777, true);
          }

  if(move_uploaded_file( $guardar_bookingConf,'archivos_bookingConf/' . $booking .'/' . $nombre_bookingConf)){
    
      $_SESSION['message'] = 'Se ingresó correctamente la Carga ' . $booking ;
      $_SESSION['message_type'] = 'info';
      header('location:../views/view_customer.php' );
    }

  if(!$result) {
      die("Query Failed.");
  }else{
      $_SESSION['message'] = 'Carga ingresada correctamente Booking: '. $booking ;
      $_SESSION['message_type'] = 'success';
      header('location:../views/view_customer.php' );
  }
}
  
if (isset($_POST['save_form_expoTer'])){

      foreach ($_POST['shipper'] as $shipper); //
      foreach ($_POST['commodity'] as $commodity); //
      foreach ($_POST['load_place'] as $load_place); //
      foreach ($_POST['unload_place'] as $unload_place); //
      foreach ($_POST['final_point'] as $final_point);
      foreach ($_POST['custom_place'] as $custom_place);
      foreach ($_POST['custom_place_impo'] as $custom_place_impo);
      foreach ($_POST['custom_agent'] as $custom_agent);
      foreach ($_POST['custom_agent_impo'] as $custom_agent_impo);
  
      $ref_customer= $_POST['ref_customer'];
      $referencia_carga= $_POST['referencia_carga'];//
      //
      $booking= $_POST['booking']; //
      $load_date= $_POST['load_date']; //
      $cut_off_fis= $_POST['cut_off_fis']; //
      $observation_customer= $_POST['observation_customer'];
  
      $user= $_SESSION['user'];
      $company  = $_SESSION['company'];
  
      $query = "INSERT INTO `carga`(`shipper`, `type`,`booking`, `commodity`, `load_place`, `load_date`, `unload_place`, `cut_off_fis`, `custom_place`, `custom_agent`,`custom_place_impo`, `custom_agent_impo`, `ref_customer`,`referencia_carga`, `observation_customer`, `user`, `Empresa`, `status`) VALUES ('Expo Terrestre','$shipper', '$booking', '$commodity', '$load_place', '$load_date', '$unload_place', '$cut_off_fis','$custom_place', '$custom_agent','$custom_place_impo', '$custom_agent_impo', '$ref_customer','$referencia_carga', '$observation_customer', '$user','$company', 'NO ASIGNADA')";
      $result = mysqli_query($conn, $query);

  if(!$result) {
      die("Query Failed.");
    }else{
        $_SESSION['message'] = 'Carga ingresada correctamente Booking: '. $booking ;
        $_SESSION['message_type'] = 'success';
        header('location:../views/view_customer.php' );
      }
    }
    
    if (isset($_POST['save_form_impoMar'])){
      
      
      $ref_customer= $_POST['ref_customer'];
      foreach ($_POST['shipper'] as $shipper);
      $booking= $_POST['booking'];
      foreach ($_POST['commodity'] as $commodity);
      foreach ($_POST['load_place'] as $load_place);
      $load_date= $_POST['load_date'];
      foreach ($_POST['unload_place'] as $unload_place);
      $cut_off_fis= $_POST['cut_off_fis'];
      foreach ($_POST['oceans_line'] as $oceans_line);
      $vessel= $_POST['vessel'];
      $voyage= $_POST['voyage'];
      $ETA= $_POST['ETA'];
      $ETD= $_POST['ETD'];
      foreach ($_POST['final_point'] as $final_point);
      foreach ($_POST['custom_place'] as $custom_place);
      foreach ($_POST['custom_agent'] as $custom_agent);
      foreach ($_POST['custom_place_impo'] as $custom_place_impo);
      foreach ($_POST['custom_agent_impo'] as $custom_agent_impo);

      $observation_customer= $_POST['observation_customer'];
      $nombre_bl = $_FILES['document_bl']['name'];
      $guardar_bl= $_FILES['document_bl']['tmp_name'];
      
      $user= $_SESSION['user'];
      $company  = $_SESSION['company'];
      
          $query = "INSERT INTO `carga`(`shipper`, `type`,`booking`, `commodity`, `load_place`, `load_date`, `unload_place`, `cut_off_fis`, `oceans_line`, `vessel`, `voyage`, `final_point`, `ETA`, `ETD`,`custom_place`, `custom_agent`,`custom_place_impo`, `custom_agent_impo`, `ref_customer`, `observation_customer`, `document_bookingConf`, `user`, `Empresa`, `status`) VALUES ('$shipper', 'Impo Maritima','$booking', '$commodity', '$load_place', '$load_date', '$unload_place', '$cut_off_fis', '$oceans_line', '$vessel', '$voyage', '$final_point', '$ETA', '$ETD', '$custom_place', '$custom_agent','$custom_place_impo', '$custom_agent_impo', '$ref_customer','$observation_customer', '$nombre_bl', '$user','$company', 'NO ASIGNADA')";
          $result = mysqli_query($conn, $query);
      
          if(!file_exists('archivos_bl/'. $booking)){
                
                mkdir('archivos_bl/'. $booking, 0777, true);
                }
      
          if(move_uploaded_file( $guardar_bl,'archivos_bl/' . $booking .'/' . $nombre_bl)){
             
              $_SESSION['message'] = 'Se ingresó correctamente la Carga ' . $booking ;
              $_SESSION['message_type'] = 'info';
              header('location:../views/view_customer.php' );
            }
      
          if(!$result){

              die("Query Failed.");
              
            }else{
                $_SESSION['message'] = 'Carga ingresada correctamente Booking: '. $booking ;
                $_SESSION['message_type'] = 'success';
                header('location:../views/view_customer.php' );
              }
            }

if (isset($_POST['save_form_impoTer'])){

  $ref_customer= $_POST['ref_customer'];
  $referencia_carga= $_POST['referencia_carga'];
  foreach ($_POST['shipper'] as $shipper);
  $booking= $_POST['booking'];
  foreach ($_POST['commodity'] as $commodity);
  foreach ($_POST['load_place'] as $load_place);
  $load_date= $_POST['load_date'];
  foreach ($_POST['unload_place'] as $unload_place);
  $cut_off_fis= $_POST['cut_off_fis'];
  foreach ($_POST['custom_place'] as $custom_place);
  foreach ($_POST['custom_agent'] as $custom_agent);
  foreach ($_POST['custom_place'] as $custom_place_impo);
  foreach ($_POST['custom_agent'] as $custom_agent_impo);

  $observation_customer= $_POST['observation_customer'];

  
  $user= $_SESSION['user'];
  $company  = $_SESSION['company'];
  
      $query = "INSERT INTO `carga`(`shipper`, `type`, `booking`, `commodity`, `load_place`, `load_date`, `unload_place`, `cut_off_fis`, `custom_place`, `custom_agent`, `custom_place_impo`, `custom_agent_impo`, `ref_customer`,`referencia_carga`, `observation_customer`, `user`, `Empresa`, `status`) VALUES ('$shipper', 'Impo Terrestre','$booking', '$commodity', '$load_place', '$load_date', '$unload_place', '$cut_off_fis', '$custom_place', '$custom_agent','$custom_place_impo', '$custom_agent_impo', '$ref_customer','$referencia_carga','$observation_customer', '$user','$company', 'NO ASIGNADA')";
      $result = mysqli_query($conn, $query);
  
  
      if(!$result) {
          die("Query Failed.");
        }else{
            $_SESSION['message'] = 'Carga ingresada correctamente Booking: '. $booking ;
            $_SESSION['message_type'] = 'success';
            header('location:../views/view_customer.php' );
          }
        }

  if (isset($_POST['save_form_nacional'])){

    $ref_customer= $_POST['ref_customer'];
    foreach ($_POST['shipper'] as $shipper);
    $booking= $_POST['booking'];
    foreach ($_POST['commodity'] as $commodity);
    foreach ($_POST['load_place'] as $load_place);
    $load_date= $_POST['load_date'];
    foreach ($_POST['unload_place'] as $unload_place);
    $cut_off_fis= $_POST['cut_off_fis'];
    $observation_customer= $_POST['observation_customer'];  
    $user= $_SESSION['user'];
    $company  = $_SESSION['company'];
    
    $query = "INSERT INTO `carga`(`shipper`, `type`, `booking`, `commodity`, `load_place`, `load_date`, `unload_place`, `cut_off_fis`, `ref_customer`,`observation_customer`, `user`, `Empresa`, `status`) VALUES ('$shipper', 'Nacional','$booking', '$commodity', '$load_place', '$load_date', '$unload_place', '$cut_off_fis', '$ref_customer', '$observation_customer', '$user','$company', 'NO ASIGNADA')";
    $result = mysqli_query($conn, $query);
    
    
    if(!$result) {
      die("Query Failed.");
      }else{
        $_SESSION['message'] = 'Carga ingresada correctamente Booking: '. $booking ;
        $_SESSION['message_type'] = 'success';
        header('location:../views/view_customer.php' );
      }
      }

      
if (isset($_POST['save_form_FOB'])){
  
  $ref_customer= $_POST['ref_customer'];
  foreach ($_POST['shipper'] as $shipper);
  $booking= $_POST['booking'];
  foreach ($_POST['commodity'] as $commodity);
  foreach ($_POST['load_place'] as $load_place);
  $load_date= $_POST['load_date'];
  foreach ($_POST['unload_place'] as $unload_place);
  $cut_off_fis= $_POST['cut_off_fis'];
  foreach ($_POST['oceans_line'] as $oceans_line);
  foreach ($_POST['final_point'] as $final_point);
  $vessel= $_POST['vessel'];
  $voyage= $_POST['voyage'];
  $ETA= $_POST['ETA'];
  $ETD= $_POST['ETD'];
  foreach ($_POST['consignee'] as $consignee);
  foreach ($_POST['notify'] as $notify);
  foreach ($_POST['custom_place'] as $custom_place);
  foreach ($_POST['custom_agent'] as $custom_agent);

  $observation_customer= $_POST['observation_customer'];
  $nombre_bookingConf = $_FILES['document_bookingConf']['name'];
  $guardar_bookingConf= $_FILES['document_bookingConf']['tmp_name'];

    $user= $_SESSION['user'];
    $company  = $_SESSION['company'];

    $query = "INSERT INTO `carga`(`shipper`, `type`,`booking`, `commodity`, `load_place`, `load_date`, `unload_place`, `cut_off_fis`, `oceans_line`, `vessel`, `voyage`, `final_point`, `ETA`, `ETD`, `consignee`, `notify`, `custom_place`, `custom_agent`, `ref_customer`, `observation_customer`, `document_bookingConf`, `user`, `Empresa`, `status`) VALUES ('$shipper', 'Puesta FOB','$booking', '$commodity', '$load_place', '$load_date', '$unload_place', '$cut_off_fis', '$oceans_line', '$vessel', '$voyage', '$final_point', '$ETA', '$ETD', '$consignee', '$notify', '$custom_place', '$custom_agent', '$ref_customer', '$observation_customer', '$nombre_bookingConf', '$user','$company', 'NO ASIGNADA')";
    $result = mysqli_query($conn, $query);

    if(!file_exists('archivos_bookingConf/'. $booking)){
          
          mkdir('archivos_bookingConf/'. $booking, 0777, true);
          }

  if(move_uploaded_file( $guardar_bookingConf,'archivos_bookingConf/' . $booking .'/' . $nombre_bookingConf)){
    
      $_SESSION['message'] = 'Se ingresó correctamente la Carga ' . $booking ;
      $_SESSION['message_type'] = 'info';
      header('location:../views/view_customer.php' );
    }

  if(!$result) {
      die("Query Failed.");
  }else{
      $_SESSION['message'] = 'Carga ingresada correctamente Booking: '. $booking ;
      $_SESSION['message_type'] = 'success';
      header('location:../views/view_customer.php' );
  }
}
    ?>

