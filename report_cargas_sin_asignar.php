
<?php include('db.php'); ?>

<?php

$query = "SELECT carga.booking, cntr.cntr_number, cntr.retiro_place, carga.load_place, carga.commodity, carga.shipper, carga.Empresa from cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE cntr.main_status = 'NO ASIGNADA'";
$resultado = mysqli_query ($conn, $query);

$no_asignada = array();
while( $row = mysqli_fetch_assoc($resultado) ) {
$no_asignada[] = $row;
}



if(isset($_POST["export_data_sin_asignar"])) { 
    $date = date('Y-m-d');
    $filename = "CargasSinAsignar_$date.xls";
    header("Content-Type: application/xls");    
    header("Content-Disposition: signal; filename=$filename");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    $separator = "\t";
    if(!empty($no_asignada)) { 
  
        echo implode($separator, array_keys($no_asignada[0])) . "\n";
    
        //Loop through the rows
        foreach($no_asignada as $row_no_asignada){
            
            //Clean the data and remove any special characters that might conflict
            foreach($row_no_asignada as $k => $v){
                $row_no_asignada[$k] = str_replace($separator . "$", "",$row_no_asignada[$k]);
                $row_no_asignada[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row_no_asignada[$k]);
                $row_no_asignada[$k] = trim($row_no_asignada[$k]);
            }
            
            //Implode and print the columns out using the 
            //$separator as the glue parameter
            echo implode($separator, $row_no_asignada) . "\n";
        }





    }else{
        echo 'No hay datos a exportar';
    }

    exit;
   }


?>
