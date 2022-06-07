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

$query = "SELECT asign.cntr_number, asign.booking, asign.file_instruction, asign.id, transporte.contacto_logistica_celular, transporte.contacto_logistica_mail, transporte.contacto_logistica_nombre, carga.shipper, carga.commodity, cntr.cntr_type, carga.load_date, carga.load_place FROM asign INNER JOIN transporte  INNER JOIN carga INNER JOIN cntr ON transporte.razon_social = asign.transport AND carga.booking = asign.booking AND cntr.cntr_number = asign.cntr_number WHERE asign.cntr_number = '$cntr_number'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
          $booking = $row['booking'];
          $commodity = $row['commodity'];
          $shipper= $row['shipper'];
          $load_date =$row['load_date'];
          $load_place =$row['load_place'];
          $cntr_type = $row['cntr_type'];
          $cntr_number = $row['cntr_number'];
          $file = $row['file_instruction'];
          $id_asgin = $row['id'];
          $contacto_celular = $row['contacto_logistica_celular'];
          $contacto_mail = $row['contacto_logistica_mail'];
          $contacto_nombre= $row['contacto_logistica_nombre'];


}else{

    echo 'no hay instrucción para enviar';
}
// sino está generado el Instrtructivo lo creamos. 

if($file == null){

    $query_file ="SELECT DISTINCT asign.id, asign.transport, asign.transport_agent, asign.observation_load, asign.agent_port, carga.custom_place, carga.load_date, carga.booking, carga.shipper, carga.commodity, carga.load_place, carga.unload_place, carga.cut_off_fis, carga.oceans_line, carga.vessel, carga.voyage, carga.final_point, carga.custom_agent, carga.ref_customer, cntr.cntr_number, cntr.cntr_seal, cntr.cntr_type, cntr.net_weight, cntr.retiro_place, cntr.out_usd, cntr.modo_pago_out, cntr.plazo_de_pago_out, customer_load_place.link_maps, customer_load_place.address, customer_load_place.city FROM carga INNER JOIN cntr INNER JOIN asign INNER JOIN customer_load_place ON carga.booking = cntr.booking AND cntr.cntr_number = asign.cntr_number AND customer_load_place.description = carga.load_place WHERE cntr.cntr_number = '$cntr_number'";
    $result_file = mysqli_query($conn, $query_file);

    if (mysqli_num_rows($result_file) == 1) {
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

            // Sino se Creo debera comenzar de nuevo el proceso. 
                if(!$result_upload_file){
                    
                    $_SESSION['message'] = 'Problemas al Actualizar Base de Datos.: '. $file_name;
                    $_SESSION['message_type'] = 'danger';

                    header('location:../formularios/save_instructivo.php?cntr_number='.$cntr_number);
                }else{
                            
            $to = $contacto_mail;

            //remitente del correo
            $from = $contacto_mail;
            $fromName = 'Instrucciones :: '.$company;

            //Asunto del email
            $subject = 'Instructivo de Carga Booking: '.$booking.' - Contenedor: '.$cntr_number; 

            //Ruta del archivo adjunto
            $file_ad = '../formularios/instructivos/'. $booking .'/' . $cntr_number .'/'. $file;

            //Contenido del Email
            $htmlContent = 
            '<head>

            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
            <style>
                body{
                    font-family: "Baloo 2", cursive";
                }
            </style>
            </head>
            <body>
            <h4 style="color:#2E303E;"> Estimado '.$contacto_nombre.':</h4>
            <br>
            <p>  En adjunto encontrará el Instructivo corresponiende a la carga de '. $shipper. '</p>
            <p><strong>Instructivo de Carga n°:  '.$id_asgin.'</strong></p>
            <p><strong>Conenedor Tipo: <strong>' . $cntr_type . '</p>
            <p><strong>Commodity: <strong>'. $commodity.'</p>
            <p><strong>Fecha de Carga: <strong>'. $load_date.'</p>
            <p><strong>Lugar de Carga: <strong>'. $load_place.'</p>
            <br>
            <br>
            <br>
            <p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="https://bit.ly/botzero" >BOT.zero</a> utilizada por'.$company.'.</p>
            </body>
            </html>';

            //Encabezado para información del remitente
            $headers = "De: $fromName"." <".$from.">";

            //Limite Email
            $semi_rand = md5(time()); 
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

            //Encabezados para archivo adjunto 
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

            //límite multiparte
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

            //preparación de archivo
            if(!empty($file_ad)){
                if(is_file($file_ad)){
                    $message .= "--{$mime_boundary}\n";
                    $fp =    @fopen($file_ad,"rb");
                    $data =  @fread($fp,filesize($file_ad));

                    @fclose($fp);
                    $data = chunk_split(base64_encode($data));
                    $message .= "Content-Type: application/octet-stream; name=\"".basename($file_ad)."\"\n" . 
                    "Content-Description: ".basename($files[$i])."\n" .
                    "Content-Disposition: attachment;\n" . " filename=\"".basename($file_ad)."\"; size=".filesize($file_ad).";\n" . 
                    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                }
            }
            $message .= "--{$mime_boundary}--";
            $returnpath = "-f" . $from;

            //Enviar EMail
                $mail = @mail($to, $subject, $message, $headers, $returnpath); 

                if($mail == true){
                $_SESSION['message'] = 'Instructivo enviado correctemnte a: '. $contacto_nombre;
                $_SESSION['message_type'] = 'success';
                header('location:../formularios/save_instructivo.php?cntr_number='.$cntr_number);
                }else{
                    $_SESSION['message'] = 'Algo Salio Mal!! Instructivo NO enviado correctemnte a: '. $contacto_nombre;
                    $_SESSION['message_type'] = 'danger';
                    header('location:../formularios/save_instructivo.php?cntr_number='.$cntr_number);
                }
            /*Estado de envío de correo electrónico
            echo $mail?"<h1>Correo enviado.</h1>":"<h1>El envío de correo falló.</h1>";*/
                
            }
        }
}else{
   

$to = $contacto_mail;

//remitente del correo
$from = $contacto_mail;
$fromName = 'Instrucciones :: '.$company;

//Asunto del email
$subject = 'Instructivo de Carga Booking: '.$booking.' - Contenedor: '.$cntr_number; 

//Ruta del archivo adjunto
$file_ad = 'http://botzero.ar/public/instructivos'. $booking .'/' . $cntr_number .'/'. $file;

//Contenido del Email
$htmlContent = 
'<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
<style>
    body{
        font-family: "Baloo 2", cursive";
    }
</style>
</head>
<body>
<h4 style="color:#2E303E;"> Estimado '.$contacto_nombre.':</h4>
<br>
<p>  En adjunto encontrará el Instructivo corresponiende a la carga de '. $shipper. '</p>
<p><strong>Instructivo de Carga n°:  '.$id_asgin.'</strong></p>
<p><strong>Conenedor Tipo: <strong>' . $cntr_type . '</p>
<p><strong>Commodity: <strong>'. $commodity.'</p>
<p><strong>Fecha de Carga: <strong>'. $load_date.'</p>
<p><strong>Lugar de Carga: <strong>'. $load_place.'</p>
<br>
<br>
<br>
<p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="https://bit.ly/botzero" >BOT.zero</a> utilizada por'.$company.'.</p>
</body>
</html>';

//Encabezado para información del remitente
$headers = "De: $fromName"." <".$from.">";

//Limite Email
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//Encabezados para archivo adjunto 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//límite multiparte
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

//preparación de archivo
if(!empty($file_ad)){
    if(is_file($file_ad)){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($file_ad,"rb");
        $data =  @fread($fp,filesize($file_ad));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file_ad)."\"\n" . 
        "Content-Description: ".basename($files[$i])."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file_ad)."\"; size=".filesize($file_ad).";\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//Enviar EMail
    $mail = @mail($to, $subject, $message, $headers, $returnpath); 

    if($mail == true){
    $_SESSION['message'] = 'Instructivo enviado correctemnte a: '. $contacto_nombre;
    $_SESSION['message_type'] = 'success';
    header('location:../formularios/save_instructivo.php?cntr_number='.$cntr_number);
    }else{
        $_SESSION['message'] = 'Algo Salio Mal!! Instructivo NO enviado correctemnte a: '. $contacto_nombre;
        $_SESSION['message_type'] = 'danger';
        header('location:../formularios/save_instructivo.php?cntr_number='.$cntr_number);
    }
/*Estado de envío de correo electrónico
echo $mail?"<h1>Correo enviado.</h1>":"<h1>El envío de correo falló.</h1>";*/

    }
?>




