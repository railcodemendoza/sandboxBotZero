<?php

include('../db.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];

if ($permiso =='Master') { 
    
  include('permitido_view_super_user.php'); 

}else{

  include('noPermitido_view_super_user.php'); 

}
?>