<?php

include('../db.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];

if ($permiso =='Traffic') { 
  
    include("header_traffic.php");
    include("../fijos/Pannel_right_header.php");
    include("../includes/user_basic/pannel_left_user_basic.php");
    include("../includes/user_basic/head_view_traffic.php");
    include("../includes/user_basic/head_view_user_basic_widget.php");
    include("../includes/user_basic/view_user_basic_cargas.php");
    include("../includes/user_basic/modal.widget_user_ttl.php");
    include("../includes/user_basic/tablero_de_comando.php");
    include("../includes/user_basic/modal.widget_user_basic.php");
    include("footer_traffic.php");

}else{

  include('noPermitido_view_super_user.php'); 

}

?>

