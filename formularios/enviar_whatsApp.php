<?php include('../db.php'); ?>

<?php
require_once ('../database/dompdf/autoload.inc.php');
use Dompdf\dompdf;
$user = $_SESSION['user'];
$company = $_SESSION['company'];

if(isset($_GET['cntr_number'])) {   // me traigo la informacion segun ID seleccionada. 
    $cntr_number = $_GET['cntr_number'];

}

// revisar si no está generado el Instructivo.

$query = "SELECT asign.cntr_number, asign.booking, asign.file_instruction, transporte.contacto_logistica_celular FROM asign INNER JOIN transporte ON transporte.razon_social = asign.transport WHERE asign.cntr_number = '$cntr_number'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
          $booking = $row['booking'];
          $cntr_number = $row['cntr_number'];
          $file = $row['file_instruction'];
          $contacto = $row['contacto_logistica_celular'];
}else{
    echo 'no hay instrucción para enviar';
}
// sino está generado el Instrtructivo lo creamos. 

if($file == null){

    $query_file ="SELECT 
    asign.id, 
    asign.transport, 
    asign.transport_agent, 
    asign.observation_load, 
    asign.agent_port,
    carga.custom_place, 
    carga.load_date, 
    carga.booking, 
    carga.shipper, 
    carga.commodity, 
    carga.load_place, 
    carga.unload_place, 
    carga.cut_off_fis, 
    carga.oceans_line, 
    carga.vessel, 
    carga.voyage, 
    carga.final_point, 
    carga.custom_agent, 
    carga.ref_customer, 
    cntr.cntr_number, 
    cntr.cntr_seal, 
    cntr.cntr_type, 
    cntr.net_weight, 
    cntr.retiro_place, 
    cntr.out_usd, 
    cntr.modo_pago_out, 
    cntr.plazo_de_pago_out,
    customer_load_place.link_maps,
    customer_load_place.address,
    customer_load_place.city
    FROM carga 
    INNER JOIN cntr 
    INNER JOIN asign 
    INNER JOIN customer_load_place
    ON carga.booking = cntr.booking 
    AND cntr.cntr_number = asign.cntr_number 
    AND customer_load_place.description = carga.load_place
    WHERE cntr.cntr_number = '$cntr_number'";
    $result_file = mysqli_query($conn, $query_file);

  $row = mysqli_fetch_array($result_file);

    $id_asgin = $row['id'];
    $booking = $row['booking'];
    $shipper = $row['shipper'];
    $commodity = $row['commodity'];
    $load_place = $row['load_place'];
    $unload_place = $row['unload_place'];
    $cut_off_fis = $row['cut_off_fis'];
    $oceans_line = $row['oceans_line'];
    $vessel = $row['vessel'];
    $voyage = $row['voyage'];
    $final_point = $row['final_point'];
    $custom_agent = $row['custom_agent'];
    $custom_place = $row['custom_place'];
    $ref_customer = $row['ref_customer'];
    $cntr_number = $row['cntr_number'];
    $cntr_seal = $row['cntr_seal'];
    $cntr_type = $row['cntr_type'];
    $net_weight = $row['net_weight'];
    $retiro_place = $row['retiro_place'];
    $transport = $row['transport'];
    $transport_agent = $row['transport_agent'];
    $observation_load = $row['observation_load'];
    $agent_port = $row['agent_port'];
    $out_usd = $row['out_usd'];
    $modo_pago_out = $row['modo_pago_out'];
    $plazo_de_pago_out = $row['plazo_de_pago_out'];
    $load_date = $row['load_date'];
    $link_maps = $row['link_maps'];
    $address = $row['address'];
    $city = $row['city'];

    // armamos el Contenido del Instructivo.

    $content = '<html>';
    $content .='<head>';
    $content .='</head>';
    $content .='<body>';
    $content .='<div style=" text-align:center;background: #17A589;color: white; margin-left: 5%; margin-top:0%; margin-bottom: 6px; font-family: sans-serif; display:block">';
    $content .='<img style="height: 5.2rem; width: auto; float: left; padding-left: 1rem;" src="../images/logo Con fondo azul.png" alt="">';
    $content .='<h1 style="font-family: sans-serif; margin-left: 2%;">Instuctivo de Carga</h1>';
    $content .='<p style="font-size: 14px; font-family: sans-serif; color: white; margin-left: 5%; ">' . $company . ' | Generado por '.$user.'</p>';
    $content .='</div>';
    $content .='<div style="padding: 0.5 rem; color: white; margin-left: 10%;margin-right: 10% ; border-style:groove; border-color:gray; height:35px; width:70%;">';
    $content .='<h5  style="float:left; font-size: unset; font-family: sans-serif; text-align: center; width: 30%;margin: 0.5rem 0 0.5rem 0rem; color: #2E303E ;">Booking: <small style="font-family: sans-serif; color: gray ;">'.$booking.'</small></h5>';
    $content .='<h5  style="float:left; font-size: unset; font-family: sans-serif; text-align: center; width: 30%;margin: 0.5rem 0 0.5rem 0rem; color: #2E303E ;">Commodity: <small style="font-family: sans-serif; color: gray ;">'.$commodity.'</small></h5>';
    $content .='<h5  style="float:left; font-size: unset; font-family: sans-serif; text-align: center; width: 30%;margin: 0.5rem 0 0.5rem 0rem; color: #2E303E ;">Shipper:<small style="font-family: sans-serif; color: gray ;">'.$shipper.'</small></h5>';
    $content .='</div>';
    $content .='<div style="margin: 0% 11%;">';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Numero de Contenedor: <small style="font-family: sans-serif; color: gray ; font-size: medium;">'.$cntr_number.'</small></p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Precinto: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$cntr_seal.'</small></p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Tipo: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$cntr_type.'</small></p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Peso Neto: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$net_weight.'</small></p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Lugar de Rertiro: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$retiro_place.'</small></p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Lugar de Carga: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$load_place.' | </small> Fecha de Carga:<small style="font-family: sans-serif; color: gray ;margin: 0.5rem 0 0.5rem 1rem;font-size: medium;"> '.$load_date.'</small> </p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Direccion: <small style="font-family: sans-serif; color: gray ;margin: 0.5rem 0 0.5rem 1rem;font-size: medium;"><a href="'.$link_maps.'"> '.$address.' - '. $city . '</small></a> </p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Lugar de Aduana: <small style="font-family: sans-serif; color: gray ;font-size: medium;"> '.$custom_place.' |</small> Despachante:<small style="font-family: sans-serif; color: gray ;font-size: medium;"> '.$custom_agent.'</small> </p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Puerto de Carga: <small style="font-family: sans-serif; color: gray ;font-size: medium;"> '.$unload_place.' | </small> Cut Off Fisico:<small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$cut_off_fis.'</small> </p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Vesel: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$vessel.' - '.$voyage.' | </small>Armador:<small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$oceans_line.'</small> </p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Destino Dinal: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$final_point.'</small></p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Transporte: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$transport.' | </small>ATA:<small style="font-family: sans-serif; color: gray ;font-size: medium;"> '.$transport_agent.'</small> </p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Agencia de Ingreso: <small style="font-family: sans-serif; color: gray ;font-size: medium;"> '.$agent_port.' | </small>Contacto:<small style="font-family: sans-serif; color: gray ;font-size: medium;"></small> </p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem;">'. $observation_load.' </p>';
    $content .='</div>';
    $content .='<hr style="margin: 0% 11%; width:50%;">';
    $content .='<div style="margin: 0% 0% 0% 11%;">';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Tarifa: <small style="font-family: sans-serif; color: gray ; font-size: medium;">'.$out_usd.'</small></p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Modo de Pago:<small style="font-family: sans-serif; color: gray ; font-size: medium;">'.$modo_pago_out.'</small></p>';
    $content .='<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Plazo de Pago: <small style="font-family: sans-serif; color: gray ; font-size: medium;">'.$plazo_de_pago_out.'</small></p>    ';
    $content .='</div>';
    $content .='<hr style="color:gray; with:50%; margin-left:30%; margin-right:30%;">';
    $content .='<p style="font-family: sans-serif; text-align:center;"> Adjuntar este instructivo a la factura. </p>';
    $content .='</body>';
    $content .='</html>';

    // indicamos como se va llamar el Instructivo. 

    $file_name = 'instructivo_'.$booking.'_'.$cntr_number.'.pdf' ;

    // Logica de Creado de Carpera: 

        // sino esta creada la Carpeta Madre Creamos todas las carpetas necesaria. 
        if(!file_exists('instructivos')){

        mkdir('instructivos',0777, true);
        mkdir('instructivos/'. $booking, 0777, true);

        }else{  

            if(!file_exists('instructivos/'.$booking)){
                
                mkdir('instructivos/'. $booking, 0777, true);


            }
        } 
        if (file_exists('instructivos/'. $booking. '/' . $cntr_number)){
            
            unlink('instructivos/'. $booking. '/' . $cntr_number);
        }

        mkdir('instructivos/'. $booking. '/' . $cntr_number, 0777, true);

        // Ya sabemos que esta creada (o la creamos) entonces creamos variables para usar durante todo el proceso.

    $folder = 'instructivos/' . $booking .'/' . $cntr_number .'/';
    $save_folder = $folder . $file_name;

     // Generamos el Archivo PDF

    $dompdf = new Dompdf();
    $dompdf -> loadHtml($content);
    $dompdf -> setPaper('A4','landscape');
    $dompdf->render();
    $pdf = $dompdf->output();
    file_put_contents($save_folder, $pdf);
        
     // Le indicamos a la Base Datos como se llama el Archivo. 

    $query_upload_file = "UPDATE `asign` SET `file_instruction` = '$file_name' WHERE cntr_number = '$cntr_number'";
    $result_upload_file = mysqli_query($conn, $query_upload_file);

    // enviamos el Mensaje al Usuario. 


    if(!$result_upload_file){
        
        $_SESSION['message'] = 'Problemas al Actualizar Base de Datos.: '. $file_name;
        $_SESSION['message_type'] = 'danger';
        header('location:formularios/save_instructivo.php?cntr_number='.$cntr_number);


    }else{
        $_SESSION['message'] = 'Instructivo guardado correctemnte en: '. $save_folder;
        $_SESSION['message_type'] = 'success';
        header('location:formularios/save_instructivo.php?cntr_number='.$cntr_number);
    }
  
       
        header('Location: https://api.whatsapp.com/send?phone='.$contacto.'&text=Instruccion%20de%20carga%20'.$booking.'%20-%20Shipper:%20'.$shipper.'%20:%20http://botzero.ar/public/instructivos/'.$booking.'/'.$cntr_number.'/'.'instructivo_'.$booking.'_'.$cntr_number.'.pdf');
    
}else{

        header('Location: https://api.whatsapp.com/send?phone='.$contacto.'&text=Instruccion%20de%20carga%20'.$booking.'%20-%20Shipper:%20'.$shipper.'%20:%20http://botzero.ar/public/instructivos/'.$booking.'/'.$cntr_number.'/'.'instructivo_'.$booking.'_'.$cntr_number.'.pdf');

}




