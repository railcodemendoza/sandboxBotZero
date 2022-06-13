
       <?php 
       
        require_once ('../database/dompdf/autoload.inc.php');
        use Dompdf\dompdf;

        $content = '<html>';
        $content .= '<head>';
        $content .= '</head>';
        $content .= '<body>';
        $content .= '<div style=" text-align:center; margin-left: 5%; margin-right: 5%; margin-top:2%; margin-bottom: 6px; font-family: sans-serif; display:block">';
        $content .= '<img style="height: 4.6rem; width: auto; float: left; padding-left: 1rem;" src="../images/rz/'.$img.'" alt="">';
        $content .= '<h1 style="font-family: sans-serif; margin-left: 2%; margin-bottom: -1rem;">Instuctivo de Carga ' . $type . '</h1>';
        $content .= '<p style="font-size: 14px; font-family: sans-serif; color: white; margin-left: 5%;    margin-bottom: 0.4rem; ">' . $company_invoice . ' | Generado por '.$user.'</p>';
        $content .= '<br>';
        $content .= '</div>';
        $content .= '<div style="margin: 0% 11%;">';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;"> <strong>FILE:</strong> <small style="font-family: sans-serif; color: gray ; font-size: medium;">'.$ref_customer.'</small></p>';
        $content .= '<hr style="margin-left: 0%; width: 20%;">';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.2rem 0 0.2rem 1rem; font-size: medium;">Booking: <small style="font-family: sans-serif; color: gray ; font-size: medium;">'.$booking.'</small></p>';
        $content .= 'Commodity: <small style="font-family: sans-serif; color: gray ; font-size: medium;">'.$commodity.'</small></p>';
        $content .= 'Shipper: <small style="font-family: sans-serif; color: gray ; font-size: medium;">'.$shipper.'</small></p>';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.2rem 0 0.2rem 1rem; font-size: medium;">Contenedor: <small style="font-family: sans-serif; color: gray ; font-size: medium;">'.$cntr_number.' ('.$cntr_type.') - '.$net_weight.' TONS</small></p>';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.2rem 0 0.2rem 1rem; font-size: medium;">Precinto: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$cntr_seal.' </small></p>';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.2rem 0 0.2rem 1rem; font-size: medium;">Lugar de Rertiro: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$retiro_place.'</small></p>';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.2rem 0 0.2rem 1rem; font-size: medium;">Lugar de Carga: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$load_place.' (<a href="'. $link_maps .'"> ' . $address . ' - ' . $city . '</small></a> )</small></p>';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.2rem 0 0.2rem 1rem; font-size: medium;"> Fecha de Carga:<small style="font-family: sans-serif; color: gray ;margin: 0.5rem 0 0.5rem 1rem;font-size: medium;">'. $load_date . '</small></p>';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.2rem 0 0.2rem 1rem; font-size: medium;">Lugar de Aduana: <small style="font-family: sans-serif; color: gray ;font-size: medium;"> '.$custom_place.'</small></p>';
        $content .= 'Despachante:<small style="font-family: sans-serif; color: gray ;font-size: medium;"> '.$custom_agent.'</small> </p>';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.2rem 0 0.2rem 1rem; font-size: medium;">Puerto de Carga: <small style="font-family: sans-serif; color: gray ;font-size: medium;"> '.$unload_place.'</small></p>'; 
        $content .= 'Cut Off Fisico:<small style="font-family: sans-serif; color: gray ;font-size: medium;"> '.$cut_off_fis.'</small></p>';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.2rem 0 0.2rem 1rem; font-size: medium;">Vesel: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$vessel.' - '.$voyage.' | </small>Armador:<small style="font-family: sans-serif; color: gray ;font-size: medium;"> '.$oceans_line.'</small></p>';
        $content .= 'Destino final: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$final_point.'</small></p>';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.2rem 0 0.2rem 1rem; font-size: medium;">Transporte: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'.$transport.'</small></p>';
        $content .= 'ATA:<small style="font-family: sans-serif; color: gray ;font-size: medium;"> '.$transport_agent.'</small></p>';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.2rem 0 0.2rem 1rem;">Observaciones: <small style="font-family: sans-serif; color: gray ;font-size: medium;">'. $observation_load.'</small></p>';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Tarifa: <small style="font-family: sans-serif; color: gray ; font-size: medium;">'.$out_usd.'( facturar a: '.$company_invoice.')</small></p>';
        $content .= '<p style="font-family: sans-serif; text-align: left; margin: 0.5rem 0 0.5rem 1rem; font-size: medium;">Modo de Pago:<small style="font-family: sans-serif; color: gray ; font-size: medium;">'.$modo_pago_out.' - '. $plazo_de_pago_out .'</small></p>';$content .= '<hr style="margin-left: 0%; width: 60%;">';
        $content .= '<p style="font-family: sans-serif; font-size: small;text-align:left; margin: 0%;"><strong style="color: green">ENVIAR USUARIO SETELITAL DE LA UNIDAD PARA CARGAR</strong></p>';
        $content .= '<p style="font-family: sans-serif; font-size: small;text-align:left; margin: 0%; color: green">Es obligatorio contar con elementos de seguridad: CASCO - ZAPATOS DE SEGURIDAD Y CHALECO REFRACTARIO</p>';
        $content .='<br>';
        $content .= '<p style="font-family: sans-serif; font-size: small;text-align:left; margin: 0%;"><strong>SAN ANTONIO</strong> - Carlos Valdes Exportaciones cvaldes@marval.cl - Celular:<a href="https://api.whatsapp.com/send?phone=56990111816&text=Hola,%20me%20comunico%20por%20la%20carga:%20'.$ref_customer.'"> + 56 9 90111816</a></p>';
        $content .= '<p style="font-family: sans-serif; font-size: small;text-align:left; margin: 0%;"><strong>VALPARAISO</strong> - Marjorie Perez (ZEAL) Cargas Exportaciones  mperez@marval.cl - Celular: <a href="https://api.whatsapp.com/send?phone=5698990725&text=Hola,%20me%20comunico%20por%20la%20carga:%20'.$ref_customer.'">+56 9 8990725</a> </p>';
        $content .= '<br>';
        $content .= '<p style="font-family: sans-serif; font-size: small;text-align:left; margin: 0%; font-style: italic;">NOTA: LA FACTURA NO SE CANCELARA SI NO SE ADJUNTA ESTA INSTRUCCIÓN Y DOC. A PRESENTAR: MIC VACÍO - MIC EXPO - PESADA BODEGA</p>';
        $content .= '<p style="font-family: sans-serif; font-size: small;text-align:left; margin: 0%; color: grey; font-style: italic;" >ENTREGA EN AV SAN MARTIN SUR KM 54 - CHACRAS PARK - LUJAN DE CUYO . MENDOZA</p>';
        $content .= '</div>';
        $content .= '</body>';
        $content .= '</html>';

        // indicamos como se va llamar el Instructivo. 

        $file_name = 'ORDEN DE TRABAJO ' . $company_invoice . '- BKG ' . $booking .' - CNTR '.$cntr_number .'.pdf';

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
        $dompdf -> setPaper('A4','portrait');
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

            // Si se creo continua el proceso. 
                }else{
                    $_SESSION['message'] = 'Instructivo guardado correctemnte en: '. $save_folder;
                    $_SESSION['message_type'] = 'success';
                    header('location:../views/view_instructivos.php');
                }
                ?>