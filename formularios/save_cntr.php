<?php include("../db.php");



foreach ($_POST['cntr_type'] as $cntr_type);
foreach ($_POST['retiro_place'] as $retiro_place);
foreach ($_POST['modo_pago_in'] as $modo_pago_in);
foreach ($_POST['plazo_de_pago_in'] as $plazo_de_pago_in);

  if (isset($_POST['subir_cntr'])){

      $booking = $_COOKIE["booking"]; 
      $cntr_number= $_POST['cntr_number'];
      $cntr_seal =  $_POST['cntr_seal'];
      $net_weight =  $_POST['net_weight'];
      $in_usd =  $_POST['in_usd'];
      // $document_invoice = $_FILES ['document_invoice']['name']; Sacamos esto porque hay posibilidad que exista un cntr VACIO.
      // $document_packing = $_FILES ['document_packing']['name']; para ingresarlos debe ser por medio de la edicion.
      $user_cntr = $_SESSION["user"];
      $company = $_SESSION["company"];

      // $nombre_invoice = $_FILES['document_invoice']['name'];
      //  $guardar_invoice = $_FILES['document_invoice']['tmp_name']; 
      //$nombre_packing = $_FILES['document_packing']['name'];
      //$guardar_packing = $_FILES['document_packing']['tmp_name'];
      
    
      // si el contenedor no es vacio

      if($cntr_number != ''){
      
      // revisamos si no existe
      $exist_cntr = "SELECT * FROM cntr WHERE cntr_number = '$cntr_number' ";
      $result_cntr = mysqli_query($conn, $exist_cntr);
      
      // si existe nos va dar 1 o más. 

        if (mysqli_num_rows($result_cntr) < 1) {

          $query = "INSERT INTO `cntr`(`booking`, `cntr_number`, `cntr_seal`, `cntr_type`, `net_weight`, `retiro_place`,  `user_cntr`, `in_usd`, `modo_pago_in`, `plazo_de_pago_in`) VALUES ('$booking','$cntr_number', '$cntr_seal', '$cntr_type', '$net_weight', '$retiro_place', '$user_cntr', '$in_usd', '$modo_pago_in', '$plazo_de_pago_in')";
          $result = mysqli_query($conn, $query);

          $query_profit = "INSERT INTO `profit`(`cntr_number`, `in_usd`, `in_detalle`, `user`) VALUES('$cntr_number','$in_usd','Flete Terrestre','$user_cntr')";
          $result_profit = mysqli_query($conn, $query_profit);
            
          if(!$result) {

            $query_id= "SELECT id FROM carga WHERE booking = '$booking'";
            $result_id = mysqli_query($conn, $query_id);
              if (mysqli_num_rows($result_id) == 1) {
              $row = mysqli_fetch_array($result_id);
              $id = $row['id'];}

                $_SESSION['message'] = 'Algo Salió mal. Vualva a intentarlo';
                $_SESSION['message_type'] = 'danger';
                echo "<script>
                    location.href='../includes/view_carga.php?id=$id'; 
                    </script>"; 
          }else{
              $query_id= "SELECT id FROM carga WHERE booking = '$booking'";
              $result_id = mysqli_query($conn, $query_id);
              if (mysqli_num_rows($result_id) == 1) {
                $row = mysqli_fetch_array($result_id);
                $id = $row['id'];
              } 

              $_SESSION['message'] = 'El contenedor fue Cargado Correctamente';
              $_SESSION['message_type'] = 'success';
  
              echo "<script>
              location.href='../includes/view_carga.php?id=$id'; 
              </script>";   
          
            }

          }else{
              $query_id= "SELECT id FROM carga WHERE booking = '$booking'";
              $result_id = mysqli_query($conn, $query_id);
                if (mysqli_num_rows($result_id) == 1) {
                $row = mysqli_fetch_array($result_id);
                $id = $row['id'];}
  
                  $_SESSION['message'] = 'el Contenedor ya pertence a otra carga';
                  $_SESSION['message_type'] = 'danger';
                  echo "<script>
                      location.href='../includes/view_carga.php?id=$id'; 
                      </script>"; 
                    }

    }else{

      $query = "INSERT INTO `cntr`(`booking`, `cntr_number`, `cntr_seal`, `cntr_type`, `net_weight`, `retiro_place`,  `user_cntr`, `in_usd`, `modo_pago_in`, `plazo_de_pago_in`) VALUES ('$booking','$cntr_number', '$cntr_seal', '$cntr_type', '$net_weight', '$retiro_place', '$user_cntr', '$in_usd', '$modo_pago_in', '$plazo_de_pago_in')";
      $result = mysqli_query($conn, $query);

      $query_profit = "INSERT INTO `profit`(`cntr_number`, `in_usd`, `in_detalle`, `user`) VALUES('$cntr_number','$in_usd','Flete Terrestre','$user_cntr')";
      $result_profit = mysqli_query($conn, $query_profit);
        
      if(!$result) {
          die("Query Failed.");
      } 

      $query_id= "SELECT id FROM carga WHERE booking = '$booking'";
      $result_id = mysqli_query($conn, $query_id);
      if (mysqli_num_rows($result_id) == 1) {
        $row = mysqli_fetch_array($result_id);
        $id = $row['id'];}

        $_SESSION['message'] = 'El contenedor fue Cargado Correctamente';
        $_SESSION['message_type'] = 'info';

      echo "<script>
          location.href='../includes/view_carga.php?id=$id'; 
          </script>"; 
    }
  
}
?>