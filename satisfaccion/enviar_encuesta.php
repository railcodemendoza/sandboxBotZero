<?php include('../db.php');

if (isset($_POST['calificar'])){

    $calificacion_carga = $_POST['calificacion_carga'];
    $calification_transport = $_POST['calification_transport'];
    $feedback_customer = $_POST['feedback_customer'];
    $calification_driver = $_POST['calification_driver'];

    $booking = $_POST['booking'];
    $cntr_number = $_POST['cntr_number'];
    $user = $_SESSION['user'];

  $query_driver = "INSERT INTO `calification_driver`(`calification_driver`, `cntr_number`, `booking`, `user`)VALUES ('$calification_driver', '$cntr_number', '$booking','$user')";
  $result_driver = mysqli_query($conn, $query_driver);

  $query_transport = "INSERT INTO `calification_transport`(`calification_transport`, `cntr_number`, `booking`, `user`)VALUES ('$calification_transport', '$cntr_number', '$booking','$user')";
  $result_driver = mysqli_query($conn, $query_transport);

  $query_update = "UPDATE `cntr` SET `calification_customer` = '$calificacion_carga' WHERE `cntr_number` = '$cntr_number'";
  $result_update = mysqli_query($conn, $query_update);

  $query_notification = "UPDATE `notification` SET `status` = 'leido' WHERE `cntr_number` = '$cntr_number' AND `sta_carga` = 'TERMINADA' ";
  $result_notification = mysqli_query($conn, $query_notification);


  if(!$result_notification){

    $_SESSION['message'] = 'no se envió respuesta';
    $_SESSION['message_type'] = 'danger';
   header('location:..//satisfaccion/satisfaccion_carga.php?cntr_number=$cntr_number&booking=$booking'); 
  }else{

    $_SESSION['message'] = 'Muchas Gracias por su Opinión';
    $_SESSION['message_type'] = 'success';
    header('location:../views/view_customer.php');
  }
  

    
}