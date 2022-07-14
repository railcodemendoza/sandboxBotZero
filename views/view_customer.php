<?php

include('../db.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];

if ($permiso =='Customer') { 

    include("../fijos/header.php");
    include("../includes/customer/pannel_left_customer.php") ;
    include("../fijos/Pannel_right_header.php");
    include("../includes/customer/head_view_customer.php");
    include("../includes/customer/head_view_customer_widget.php");
    include("../views/view_customer_miscargas.php");
    include("../includes/customer/modal.widget.php"); /* ok */
    include("../includes/customer/news_customer.php");
    include("view_customer_footer.php");

}else{

  include('noPermitido_view_super_user.php'); 

}
?>




