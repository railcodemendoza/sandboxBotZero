<?php include('../db.php');

  foreach ($_POST['transport'] as $transport);
  foreach ($_POST['transport_agent'] as $transport_agent);
  foreach ($_POST['driver'] as $driver);
  $user = $_SESSION['user'];
  $empresa = $_SESSION['company'];
  $truck = $_POST['truck'];
  $truck_semi = $_POST['truck_semi'];
  $cntr_number = $_POST['cntr_number'];
  $idC = $_POST['id'];
  $booking = $_POST['booking'];

  $query_asign = "INSERT INTO `asign`(`driver`, `cntr_number`, `booking`, `truck`, `truck_semi`, `transport`, `transport_agent`, `user`, `company`) VALUE ('$driver','$cntr_number','$booking','$truck','$truck_semi','$transport','$transport_agent','$user','$empresa')";
  $result_asign =  mysqli_query($conn, $query_asign); 
  $id = $conn->insert_id;

  if ($id == 0 ) {

    $_SESSION['message'] = 'el ' . $cntr_number . ' ya tiene unidad asignada';
    $_SESSION['message_type'] = 'danger';
    header('location:../includes/view_carga_user.php?id=' . $idC . '#detallecntr');

  } else {
  
    // ARMAMOS EL INSTRUCTIVO CON LA API 
    $ch = curl_init();

    // Establece la URL y otras opciones apropiadas

    $url = "https://botzero.ar/api/cargaAsignada/".$id;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Captura la URL y la envía al navegador
    $output = curl_exec($ch);
    $error =  curl_error($ch);
 
    if ($output == 'ok') {

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

      $query_ocupado = "UPDATE choferes SET `status_chofer` = 'ocupado', place = '$port'  WHERE nombre = '$chofer'";
      $result_ocupado = mysqli_query($conn, $query_ocupado);

      $query_update = "UPDATE `cntr` SET `main_status` = 'ASIGNADA', `status_cntr` = 'Unidad Asignada' WHERE `cntr_number` = '$cntr_number'";
      mysqli_query($conn, $query_update);

      $query_notification = "INSERT INTO notification (`title`, `description`, `user_to`,`status`,`sta_carga`, `user_create`, `company_create`, `cntr_number`, `booking`) VALUES ('$title','$description','$user_to','No Leido','ASIGNADA','$user','$empresa','$cntr_number','$booking')";
      $result_user = mysqli_query($conn, $query_notification);

      $query_validate_status = "SELECT * FROM cntr WHERE booking = '$booking'";
      $resut_validate_status = mysqli_query($conn, $query_validate_status);
      $cntr_status = array();
      $equal = true;

      while ($row = mysqli_fetch_array($resut_validate_status)) {

        array_push($cntr_status, ($row['main_status']));
        if ($cntr_status[0] != $row['main_status']) {
          $equal = false;
          break;
        }
      }

      if ($equal) {
        $query_update = "UPDATE carga SET `status` = '$cntr_status[0]' WHERE `booking` = '$booking'";
        mysqli_query($conn, $query_update);
      }

      $_SESSION['message'] = 'Se asignó correctamente' . $transport;
      $_SESSION['message_type'] = 'success';
      header('location:../includes/view_carga_user.php?id=' . $idC . '#detallecntr');

    } else {

        echo $error;

    }
  }
?>