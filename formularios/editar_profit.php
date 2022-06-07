<?php include("../db.php");

// defino la clave para buscar en las tablas

$cntr_number = $_GET['cntr_number'];
$id = $_GET['id'];

// reviso si quiero agregar IN 

if (isset($_POST['editar_in'])){
     
      $in_usd= $_POST['in_usd'];
      $in_razon_social =  $_POST['in_razon_social'];
      $in_detalle = $_POST['in_detalle'];
      $user = $_SESSION['user'];
      
      // Cargar en la Tabla de Profit.

      $query = "UPDATE `profit` SET `in_usd` = '$in_usd' , `in_razon_social` =  '$in_razon_social' , `in_detalle` = '$in_detalle' ,`user` = '$user' WHERE id = '$id'";
      $result = mysqli_query($conn, $query);
      
      // Actualizar Profit en la tabal CNTR. 
        
        // buscamos todos los IN USD de la Tabla. 

        $query_in_usd = " SELECT SUM(in_usd) FROM `profit` WHERE cntr_number = '$cntr_number'";
        $result_in_usd = mysqli_query($conn, $query_in_usd);
        
          if (mysqli_num_rows($result_in_usd) == 1) {
              $row = mysqli_fetch_array($result_in_usd);
              $in_usd = $row['0'];
            }else{
              $in_usd = '0';
            }
        // buscamos todos los OUT USD de la Tabla. 

        $query_out_usd = " SELECT SUM(out_usd) FROM `profit` WHERE cntr_number = '$cntr_number'";
        $result_out_usd = mysqli_query($conn, $query_out_usd);
        
          if (mysqli_num_rows($result_out_usd) == 1) {
              $row = mysqli_fetch_array($result_out_usd);
              $out_usd = $row['0'];
            }else{
              $out_usd = '0';
            }

    // actualizamos PROFIT en tabla cntr

    $profit = $in_usd - $out_usd;
    $query_profit = "UPDATE cntr SET `profit`= '$profit' WHERE cntr_number = '$cntr_number'";
    $result_profit = mysqli_query($conn, $query_profit);

    if( $result = $result_in_usd = $result_out_usd = $result_profit ) {

      $query_id= "SELECT cntr.id_cntr FROM carga INNER JOIN cntr ON cntr.booking = carga.booking WHERE cntr.cntr_number = '$cntr_number'";
      $result_id = mysqli_query($conn, $query_id);

       if (mysqli_num_rows($result_id) == 1) {
         $row = mysqli_fetch_array($result_id);
         $id_cntr = $row['id_cntr'];}


      $_SESSION['message'] = 'Ingreso agregado correctamente';
      $_SESSION['message_type'] = 'success';
      header('location:../formularios/profit_carga.php?id_cntr='.$id_cntr);
    }else{
      $query_id= "SELECT cntr.id_cntr FROM carga INNER JOIN cntr ON cntr.booking = carga.booking WHERE cntr.cntr_number = '$cntr_number'";
      $result_id = mysqli_query($conn, $query_id);
    
      if (mysqli_num_rows($result_id) == 1) {
        $row = mysqli_fetch_array($result_id);
         $id_cntr = $row['id_cntr'];}
 
        $_SESSION['message'] = 'No se pudo agregar Ingreso';
        $_SESSION['message_type'] = 'danger';
        header('location:../formularios/profit_carga.php?id_cntr='.$id_cntr);
    }
  }

// - - - - - - - - - - - - - - - - - - - - -

if (isset($_POST['editar_out'])){
     
  $out_usd= $_POST['out_usd'];
  $out_razon_social =  $_POST['out_razon_social'];
  $out_detalle = $_POST['out_detalle'];
  $user = $_SESSION['user'];
  
  // Cargar en la Tabla de Profit.

  $query = "UPDATE `profit` SET `out_usd` = '$out_usd' , `out_razon_social` =  '$out_razon_social' , `out_detalle` = '$out_detalle' ,`user` = '$user' WHERE id = '$id'";
  $result = mysqli_query($conn, $query);
  
  // Actualizar Profit en la tabal CNTR. 
    
    // buscamos todos los IN USD de la Tabla. 

    $query_in_usd = " SELECT SUM(in_usd) FROM `profit` WHERE cntr_number = '$cntr_number'";
    $result_in_usd = mysqli_query($conn, $query_in_usd);
    
      if (mysqli_num_rows($result_in_usd) == 1) {
          $row = mysqli_fetch_array($result_in_usd);
          $in_usd = $row['0'];
        }else{
          $in_usd = '0';
        }
    // buscamos todos los OUT USD de la Tabla. 

    $query_out_usd = " SELECT SUM(out_usd) FROM `profit` WHERE cntr_number = '$cntr_number'";
    $result_out_usd = mysqli_query($conn, $query_out_usd);
    
      if (mysqli_num_rows($result_out_usd) == 1) {
          $row = mysqli_fetch_array($result_out_usd);
          $out_usd = $row['0'];
        }else{
          $out_usd = '0';
        }

// actualizamos PROFIT en tabla cntr

$profit = $in_usd - $out_usd;
$query_profit = "UPDATE cntr SET `profit`= '$profit' WHERE cntr_number = '$cntr_number'";
$result_profit = mysqli_query($conn, $query_profit);

if( $result = $result_in_usd = $result_out_usd = $result_profit ) {

  $query_id= "SELECT cntr.id_cntr FROM carga INNER JOIN cntr ON cntr.booking = carga.booking WHERE cntr.cntr_number = '$cntr_number'";
  $result_id = mysqli_query($conn, $query_id);

   if (mysqli_num_rows($result_id) == 1) {
     $row = mysqli_fetch_array($result_id);
     $id_cntr = $row['id_cntr'];}


  $_SESSION['message'] = 'Egreso agregado correctamente';
  $_SESSION['message_type'] = 'success';
  header('location:../formularios/profit_carga.php?id_cntr='.$id_cntr);
}else{
  $query_id= "SELECT cntr.id_cntr FROM carga INNER JOIN cntr ON cntr.booking = carga.booking WHERE cntr.cntr_number = '$cntr_number'";
  $result_id = mysqli_query($conn, $query_id);

  if (mysqli_num_rows($result_id) == 1) {
    $row = mysqli_fetch_array($result_id);
     $id_cntr = $row['id_cntr'];}

    $_SESSION['message'] = 'No se pudo agregar Egreso';
    $_SESSION['message_type'] = 'danger';
    header('location:../formularios/profit_carga.php?id_cntr='.$id_cntr);
}
}

?>