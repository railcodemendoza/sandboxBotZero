<?php

include("../db.php"); // aca me traigo la base de datos. 


if (isset($_GET['id_cntr'])) {   // me traigo la informacion segun ID seleccionada. 
  $id_cntr = $_GET['id_cntr'];
  $query = "SELECT * FROM cntr  WHERE id_cntr = $id_cntr";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $id_cntr = $row['id_cntr'];
    $booking = $row['booking'];
    $cntr_number = $row['cntr_number'];
    $cntr_seal = $row['cntr_seal'];
    $cntr_type = $row['cntr_type'];
    $net_weigth = $row['net_weight'];
    $retiro_place = $row['retiro_place'];
    $in_usd = $row['in_usd'];
    $modo_pago_in = $row['modo_pago_in'];
    $plazo_de_pago_in = $row['plazo_de_pago_in'];
    
    setcookie("id_cntr","$id_cntr");

    } 
  }  
   foreach ($_POST['cntr_type'] as $cntr_type);
   foreach ($_POST['retiro_place'] as $retiro_place);   
   foreach ($_POST['modo_pago_in'] as $modo_pago_in);
   foreach ($_POST['plazo_de_pago_in'] as $plazo_de_pago_in);



   if (isset($_POST['edit_cntr'])) {

    $cntr_number = $_POST['cntr_number'];
    
    if(!$cntr_number){
      $cntr_number = null;
    }

    $cntr_seal = $_POST['cntr_seal'];
    $net_weight = $_POST['net_weight'];
    $in_usd = $_POST['in_usd'];
    $guardar_invoice = $_FILES['document_invoice']['tmp_name'];
    $guardar_packing = $_FILES['document_packing']['tmp_name'];
    $user = $_SESSION['user'];
    
    $document_invoice = $_FILES ['document_invoice']['name'];

    if($document_invoice != "" ){

      $query_invoice ="UPDATE cntr set document_invoice = '$document_invoice' WHERE id_cntr = '$id_cntr'";
      $result_invoice = mysqli_query($conn, $query_invoice);

      if(!file_exists('archivos_invoice')){

        mkdir('archivos_invoice',0777, true);
        mkdir('archivos_invoice/'. $booking,0777, true);
  
      }else{
        // si no exite creamos carpeta del Booking
        if(!file_exists('archivos_invoice/'.$booking)){
                  
                  mkdir('archivos_invoice/'. $booking, 0777, true);
              }
      } 
      if(!file_exists('archivos_invoice/'.$booking. '/' . $id_cntr)){
        
        // si no exite creamos carpeta del CNTR
  
        mkdir('archivos_invoice/'. $booking. '/' . $id_cntr, 0777, true);
  
      }
      // aca ya tenemo si o si creada esta carpeta. 
  
      if(file_exists('archivos_invoice/'. $booking. '/' . $id_cntr)){
  
        if(move_uploaded_file($guardar_invoice,'archivos_invoice/' . $booking .'/' . $id_cntr .'/' . $document_invoice)){
  
             
          $_SESSION['message'] = 'archivo guardado en ' . 'archivos_invoice/' . $booking .'/'.$id_cntr .'/' . $document_invoice;
          $_SESSION['message_type'] = 'sucess';
         
  
        }else{
  
          $_SESSION['message'] = 'archivo '. 'archivos_invoice/' . $booking .'/'.$id_cntr .'/' . $document_invoice . 'no guardado';
          $_SESSION['message_type'] = 'danger';
    
        }
      }
    }

    $document_packing = $_FILES ['document_packing']['name'];
    
    if($document_packing !=""){

      $query_packing ="UPDATE cntr set document_packing = '$document_packing' WHERE id_cntr = '$id_cntr'";
      $result_packing = mysqli_query($conn, $query_packing);
      
      if(!file_exists('archivos_packing')){

        mkdir('archivos_packing',0777, true);
        mkdir('archivos_packing/'. $booking,0777, true);
      }else{
  
      if(!file_exists('archivos_packing/'.$booking)){
                  
                  mkdir('archivos_packing/'. $booking, 0777, true);
              }
            } 
      if(!file_exists('archivos_packing/'.$booking. '/' . $id_cntr)){
                  
        mkdir('archivos_packing/'. $booking. '/' . $id_cntr, 0777, true);
          }       
        
      if(file_exists('archivos_packing/'. $booking. '/' . $id_cntr)){
  
        if(move_uploaded_file($guardar_packing,'archivos_packing/' . $booking .'/' . $id_cntr .'/' . $document_packing)){
  
             
          $_SESSION['message'] = 'archivo guardado en ' . 'archivos_packing/' . $booking .'/'.$id_cntr .'/' . $document_packing;
          $_SESSION['message_type'] = 'sucess';
         
  
        }else{
  
          $_SESSION['message'] = 'archivo '. 'archivos_packing/' . $booking .'/'.$id_cntr .'/' . $document_packing . 'no guardado';
          $_SESSION['message_type'] = 'danger';
    
        }
      }

    }
    
    // si no tenemos numero de cntr no podemos guardar archivos. 
  
    $query = "UPDATE cntr set cntr_number = '$cntr_number' ,cntr_seal = '$cntr_seal' , cntr_type = '$cntr_type' ,net_weight = '$net_weight' ,retiro_place = '$retiro_place' ,in_usd = '$in_usd' ,modo_pago_in = '$modo_pago_in' ,plazo_de_pago_in = '$plazo_de_pago_in' ,user_cntr = '$user' WHERE id_cntr = '$id_cntr'";
    $resultado = mysqli_query($conn, $query);

    $query_profit = "UPDATE `profit` SET `cntr_number` = '$cntr_number', `in_usd` = $in_usd, `user` = '$user_cntr' WHERE cntr_number = '$cntr_number'";
    $result_profit = mysqli_query($conn, $query_profit);

    
    

    // si no exite creamos carpeta de Invoice 
     
    

    

    $query_id  = "SELECT id FROM carga WHERE booking = '$booking'";
    $result_id = mysqli_query($conn, $query_id);
      
      if (mysqli_num_rows($result_id) == 1) {
        $row = mysqli_fetch_array($result_id);
          $id = $row['id'];
      }

  
    $_SESSION['message'] = 'Contenedor editado correctamente!';
    $_SESSION['message_type'] = 'sucess';
    
    echo "<script>
               
                location.href='../includes/view_carga.php?id=$id'; 
    </script>"; 

}


?>

