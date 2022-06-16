<?php include('../db.php'); ?>

<?php

$user = $_SESSION['user'];
$company = $_SESSION['company'];

if(isset($_GET['cntr_number'])) {   // me traigo la informacion segun ID seleccionada. 
    
    $cntr_number = $_GET['cntr_number'];

    // ARMAMOS EL INSTRUCTIVO CON LA API 

    $ch = curl_init();
    // Establece la URL y otras opciones apropiadas
    $url = "https://botzero.ar/api/imprimirEviarInstrucivo/".$cntr_number;
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // Captura la URL y la envía al navegador
    $output = curl_exec($ch);
  
    
    if($output == 'ok'){

        $_SESSION['message'] = 'Instructivo enviado correctemnte.';
        $_SESSION['message_type'] = 'success';
        header('location:../formularios/save_instructivo.php?cntr_number='.$cntr_number);

    }else{
        $_SESSION['message'] = 'Algo Salio Mal!! Instructivo NO enviado.';
        $_SESSION['message_type'] = 'danger';
        header('location:../formularios/save_instructivo.php?cntr_number='.$cntr_number);
    }
           
}
?>




