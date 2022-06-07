
<?php include('db.php'); ?>

<?php

$query = "SELECT cntr.booking, cntr.cntr_number, carga.unload_place, carga.custom_place, cntr.status_cntr, asign.transport, carga.Empresa from cntr INNER JOIN asign INNER JOIN carga ON cntr.cntr_number = asign.cntr_number AND cntr.booking = carga.booking where cntr.main_status = 'CON PROBLEMA'";
$resultado = mysqli_query ($conn, $query);

$con_problema = array();
while( $row = mysqli_fetch_assoc($resultado) ) {
$con_problema[] = $row;
}



if(isset($_POST["export_data_con_problema"])) { 
    $date = date('Y-m-d');
    $filename = "CargasConProblemas_$date.xls";
    header("Content-Type: application/xls");    
    header("Content-Disposition: signal; filename=$filename");  
    header("Pragma: no-cache"); 
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

    $separator = "\t";

    if(!empty($con_problema)) { 
        
  
        echo implode($separator, array_keys($con_problema[0])) . "\n";
    
        //Loop through the rows
        foreach($con_problema as $row_con_problema){
            
            //Clean the data and remove any special characters that might conflict
            foreach($row_con_problema as $k => $v){
                $row_con_problema[$k] = str_replace($separator . "$", "",$row_con_problema[$k]);
                $row_con_problema[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row_con_problema[$k]);
                $row_con_problema[$k] = trim($row_con_problema[$k]);
            }
            
            //Implode and print the columns out using the 
            //$separator as the glue parameter
            echo implode($separator, $row_con_problema) . "\n";
            
        }





    }else{
        echo 'No hay datos a exportar';
    }

    exit;
   }


?>
