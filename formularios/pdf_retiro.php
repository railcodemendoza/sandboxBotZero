<?php

include('../db.php');

require_once ('../database/dompdf/autoload.inc.php');

use Dompdf\dompdf;

$user = $_SESSION['user'];
$company = $_SESSION['company'];

if(isset($_GET['id_cntr'])) {   // me traigo la informacion segun ID seleccionada. 
    $id_cntr = $_GET['id_cntr'];
}


    $query_file ="SELECT carga.booking, carga.cliente, carga.vessel, carga.voyage, carga.unload_place, carga.final_point, carga.commodity, cntr.retiro_place, carga.oceans_line, cntr.cntr_type FROM carga INNER JOIN cntr ON carga.booking = cntr.booking WHERE cntr.id_cntr = '$id_cntr'";
    $result_file = mysqli_query($conn, $query_file);
    
    if (mysqli_num_rows($result_file) == 1) {
        $row = mysqli_fetch_array($result_file);

        
        $booking = $row['booking'];
        $commodity = $row['commodity'];
        $unload_place = $row['unload_place'];
        $oceans_line = $row['oceans_line'];
        $vessel = $row['vessel'];
        $voyage = $row['voyage'];
        $final_point = $row['final_point'];
        $cntr_type = $row['cntr_type'];
        $retiro_place = $row['retiro_place'];
        $cliente = $row['cliente'];

        // armamos el Contenido del Instructivo.

        $content = '<html>';
        $content .='<head>';
        $content .='</head>';
        $content .='<body>';
        $content .='<div style=" text-align:center;background: #17A589;color: white; margin-left: 5%; margin-top:0%; margin-bottom: 6px; font-family: sans-serif; display:block">';
        $content .='<img style="height: 5.2rem; width: auto; float: left; padding-left: 1rem;" src="https://botzero.tech/tcargocomex/images/tcargo/tcargo.png" alt="">';
        $content .='<h1 style="font-family: sans-serif; margin-left: 2%;">Instuctivo para Retiro de Unidad</h1>';
        $content .='<p style="font-size: 14px; font-family: sans-serif; color: white; margin-left: 5%; ">' . $company . ' | Generado por '.$user.'</p>';
        $content .='</div>';
        $content .='<div style="margin-left: 25% ; margin-top:11%; margin-rigth: 25% ;">';
        $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Numero de Booking: <small style="font-family: sans-serif; color: gray ; font-size: medium;">'.$booking.'</small></p>';
        $content .='<hr style="margin: 0% 2%; width:80%;">';
        $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Tomador de Reserva: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$cliente.'</small></p>';
        $content .='<hr style="margin: 0% 2%; width:80%;">';
        $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Vesel: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$vessel.' - '.$voyage.' </small> </p>';
        $content .='<hr style="margin: 0% 2%; width:80%;">';
        $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Puerto de Carga: <small style="font-family: sans-serif; color: gray ;font-size: medium;"> '.$unload_place.'</small> </p>';
        $content .='<hr style="margin: 0% 2%; width:80%;">';
        $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Destino Dinal: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$final_point.'</small></p>';
        $content .='<hr style="margin: 0% 2%; width:80%;">';
        $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Tipo de Contenedor: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$cntr_type.'</small></p>';
        $content .='<hr style="margin: 0% 2%; width:80%;">';
        $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Commodity:<small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$commodity.'</small></p>';
        $content .='<hr style="margin: 0% 2%; width:80%;">';
        $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Lugar de Rertiro: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$retiro_place.'</small></p>';
        $content .='<hr style="margin: 0% 2%; width:80%;">';
        $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Armador: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$oceans_line.'</small></p>';
        $content .='</div>';
        $content .='<br>'; 
        $content .='<br>'; 
        $content .='<br>'; 
        $content .='<hr style="color:gray; with:100%; margin-left:20%; margin-right:10%;">';
        $content .='<p style="font-family: sans-serif; text-align:center;"> Enviar foto de Intechange al momento de Retiro.  </p>';
        $content .='</body>';
        $content .='</html>';

       
        $dompdf = new Dompdf();
        $dompdf -> loadHtml($content);
        $dompdf -> setPaper('A4','landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        $dompdf->stream();
        
        
  }
?>