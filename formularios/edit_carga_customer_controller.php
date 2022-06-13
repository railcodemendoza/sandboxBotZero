<?php

$id = $_GET['id'];


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM carga WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $shipper = $row['shipper'];
    $booking = $row['booking'];
    $commodity = $row['commodity'];
    $load_place = $row['load_place'];
    $load_date = $row['load_date'];
    $unload_place = $row['unload_place'];
    $cut_off_fis = $row['cut_off_fis'];
    $oceans_line = $row['oceans_line'];
    $vessel = $row['vessel'];
    $voyage = $row['voyage'];
    $final_point = $row['final_point'];
    $ETA = $row['ETA'];
    $ETD = $row['ETD'];
    $consignee = $row['consignee'];
    $notify = $row['notify'];
    $custom_place = $row['custom_place'];
    $custom_agent = $row['custom_agent'];
    $observation_customer = $row['observation_customer'];
    $ref_customer = $row['ref_customer'];
        }
    }

if(isset($_POST['edit_form'])) { // agrega el boto update
 
foreach ($_POST['commodity'] as  $commodity);
foreach ($_POST['load_place'] as  $load_place );
foreach ($_POST['unload_place'] as  $unload_place );
foreach ($_POST['final_point'] as  $final_point );
foreach ($_POST['consignee'] as  $consignee );
foreach ($_POST['notify'] as  $notify );
foreach ($_POST['custom_place'] as  $custom_place );
foreach ($_POST['custom_agent'] as  $custom_agent);
       
        $load_date = $_POST['load_date'];
        $cut_off_fis = $_POST['cut_off_fis'];
        $vessel = $_POST['vessel'];
        $voyage = $_POST['voyage'];
        $ETA = $_POST['ETA'];
        $ETD = $_POST['ETD'];
        $observation_customer =$_POST['observation_customer'];
        $ref_customer = $_POST['ref_customer'];
      

  $query = "UPDATE carga set commodity = '$commodity', load_place = '$load_place' ,load_date = '$load_date' ,unload_place = '$unload_place' ,cut_off_fis = '$cut_off_fis' ,vessel = '$vessel' ,voyage = '$voyage' ,ETA = '$ETA' ,ETD = '$ETD' ,consignee = '$consignee' ,notify = '$notify' ,custom_place = '$custom_place' ,custom_agent = '$custom_agent' ,observation_customer = '$observation_customer' ,ref_customer = '$ref_customer' ,oceans_line = '$oceans_line', final_point = '$final_point' WHERE id=$id";
  mysqli_query($conn, $query);


  $_SESSION['message'] = 'Carga modificada correctamente';
  $_SESSION['message_type'] = 'success';
  
  
  echo "<script>
                
                location.href='../views/view_customer.php'; 
    </script>";
}
?>
        