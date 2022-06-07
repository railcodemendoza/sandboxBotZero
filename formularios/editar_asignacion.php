<?php


  include("../db.php"); // aca me traigo la base de datos. 

  foreach ($_POST['transport'] as $transport);
  foreach ($_POST['transport_agent'] as $transport_agent);
  foreach ($_POST['driver'] as $driver);  
  
  if (isset($_POST['editar'])) {
      
  
    $truck = $_POST['truck'];
    $truck_semi = $_POST['truck_semi'];
    $id = $_POST['id']; 
    $cntr_number = $_POST['cntr_number']; 
    $booking = $_POST['booking']; 
    $chofer = $_GET['chofer'];

    }

    $query = "UPDATE asign set driver = '$driver' , truck = '$truck' , truck_semi = '$truck_semi' ,transport = '$transport' ,transport_agent = '$transport_agent' WHERE cntr_number = '$cntr_number'";
    $result_update = mysqli_query($conn, $query);

    $query_port = "SELECT unload_place FROM carga WHERE booking = '$booking'";
    $result_port = mysqli_query($conn, $query_port);
    if (mysqli_num_rows($result_port) == 1) {
      $row = mysqli_fetch_array($result_port);
      $port = $row['unload_place'];
    }
    
    $query_ocupado="UPDATE choferes SET `status_chofer` = 'ocupado', place = '$port'  WHERE nombre = '$driver'";
    $result_ocupado = mysqli_query($conn, $query_ocupado);

    $query_libre="UPDATE choferes SET `status_chofer` = 'libre', place = 'INDEFINIDO'  WHERE nombre = '$chofer'";
    $result_libre = mysqli_query($conn, $query_libre); 

    if(!$result_update){

      $_SESSION['message'] = 'No se modificó la asignación a ' . $cntr_number;
      $_SESSION['message_type'] = 'danger';
     header('location:../includes/view_carga_user.php?id='.$id.'#detallecntr'); 
    }else{
  
      $_SESSION['message'] = 'Se modificó correctamente la asignacion a '. $cntr_number;
      $_SESSION['message_type'] = 'success';
      header('location:../includes/view_carga_user.php?id='.$id.'#detallecntr');
    }
  
?>