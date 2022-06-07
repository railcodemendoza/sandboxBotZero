<?php include('../db.php');

$hola = 'hola';    

if($hola == 'hola'){

    $query = "SELECT * FROM cntr where 'booking' = 'SUDUAR040420'";
    array($result = mysqli_query($conn, $query));
    
      $booking = array [0];

        echo 'hola' . $booking ;
}



?>