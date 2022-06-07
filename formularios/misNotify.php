<?php include("../db.php"); ?>

<?php

$user = $_SESSION['user'];
$company = $_SESSION['company'];

if (isset($_POST['cargar_notify'])){

$razon_social= $_POST['razon_social'];
$tax_id =  $_POST['tax_id'];
$address =  $_POST['address'];
$city =  $_POST['city'];
$country =  $_POST['country'];
$postal_code =  $_POST['postal_code'];
$remarks =  $_POST['remarks'];

$query = "INSERT INTO `customer.ntfy` (`razon_social`, `tax_id`, `address`, `city`, `country`, `postal_code`, `create_user`, `company`, `remarks`) VALUES ('$razon_social','$tax_id','$address','$city','$country','$postal_code','$user','$company','$remarks')";
$result = mysqli_query($conn, $query);


    if(!$result){
    $_SESSION['message'] = 'Algo salió mal. Intente nuevamente Cargar Notify';
    $_SESSION['message_type'] = 'danger';
    header('location:../views/misNotify.php');
    }else{
        $_SESSION['message'] = 'Se cargó correctamente el Notify: '. $razon_social;
        $_SESSION['message_type'] = 'success';
        header('location:../views/misNotify.php');
    }
    

}

?>