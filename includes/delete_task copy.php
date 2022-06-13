<?php

include("../db.php");

if(isset($_GET['id_cntr'])) {
  $id = $_GET['id_cntr'];
  $query = "DELETE FROM cntr WHERE id_cntr = $id_cntr";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  echo "<script>
    location.href='../views/view_customer.php'; 
    alert('Se eliminó contenedor correctamente');
    
  </script>";

 // $_SESSION['message'] = 'Task Removed Successfully';
  //$_SESSION['message_type'] = 'danger';
  // header('Location: index.php');
}

?>
