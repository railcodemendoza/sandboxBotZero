


<?php include('db.php'); ?>

<?php

$user = $_SESSION['user'];

$query = "SELECT carga.booking, cntr.cntr_number, carga.unload_place, carga.final_point, carga.ETD, carga.shipper, carga.Empresa from cntr INNER JOIN carga ON carga.booking = cntr.booking where cntr.main_status = 'ON BOARD' and carga.user = '$user'";
$resultado = mysqli_query ($conn, $query);

$on_board= array();
while( $row = mysqli_fetch_assoc($resultado) ) {
$on_board[] = $row;
}



if(isset($_POST["export_data_on_board"])) { 
    $date = date('Y-m-d');
    $filename = "CargasOnBoard_$date.xls";
    header("Content-Type: application/xls");    
    header("Content-Disposition: signal; filename=$filename");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    $separator = "\t";
    if(!empty($on_board)) { 
  
        echo implode($separator, array_keys($on_board[0])) . "\n";
    
        //Loop through the rows
        foreach($on_board as $row_on_board){
            
            //Clean the data and remove any special characters that might conflict
            foreach($row_on_board as $k => $v){
                $row_on_board[$k] = str_replace($separator . "$", "",$row_on_board[$k]);
                $row_on_board[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row_on_board[$k]);
                $row_on_board[$k] = trim($row_on_board[$k]);
            }
            
            //Implode and print the columns out using the 
            //$separator as the glue parameter
            echo implode($separator, $row_on_board) . "\n";
        }





    }else{
        echo 'No hay datos a exportar';
    }

    exit;
   }


?>
