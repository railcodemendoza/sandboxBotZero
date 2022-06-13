<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM carga WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  echo "<script>
    location.href='../views/view_traffic.php'; 
    alert('Se elimino Carga correctamente');
    
  </script>";

}

?>
