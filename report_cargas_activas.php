
<?php include('db.php'); ?>

<?php
// Establecer la conexión connuestra base de datos y que podamos ejecutar las instrucciones para recuperar la información.

$query = "SELECT carga.booking, cntr.cntr_number, asign.transport, carga.commodity, carga.shipper, carga.Empresa, cntr.main_status from cntr INNER JOIN asign INNER JOIN  carga ON cntr.cntr_number = asign.cntr_number AND cntr.booking = carga.booking WHERE main_status != 'NO ASIGNADA' AND main_status != 'ON BOARD' AND main_status != 'TERMINADAS'";
$resultado = mysqli_query ($conn, $query);
// sentencia SQL que se encargará de recuperar la información. En nuestro ejemplo, recuperamos todos los registros almacenados en la tabla “libros”.    

$activas = array();
while( $row = mysqli_fetch_assoc($resultado) ) {
 $activas[] = $row;
}

//  declararnos un array vacío al que hemos llamado “libros” y donde meteremos  todos los registros que hemos recuperado de la base de datos. Esto lo hacemos mediante un bucle “while” y la llamada a la función de PHP “mysqli_fetch_assoc()” en cada iteración. A cada paso, esa función nos devolverá un registro que guardaremos en el array “libros” para su procesamiento posterior.



//  cerramos la conexión para liberar recursos en el servidor

/* 
+++++++++++++ HTML ++++++++++++++++++++++

<form action=" <?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
 
    <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Exportar a Excel</button>
</form>

<table id="" class="table table-striped table-bordered">
 <tr>
 <th>Titulo</th>
 <th>ISBN</th>
 <th>Autor</th>
 <th>Editorial</th>
 </tr>

 <tbody>
 <?php foreach($libros as $libro) { ?>
 <tr>
 <td><?php echo $libro ['titulo']; ?></td>
 <td><?php echo $libro ['isbn']; ?></td>
 <td><?php echo $libro ['autor']; ?></td>
 <td><?php echo $libro ['editorial']; ?></td>
 </tr>
 <?php } ?>
 </tbody>
</table>


++++++++++++++ de nueevo en PHP+++++++++++++++++++++++*/

if(isset($_POST["export_data"])) { //  comprobar que se ha pulsado el botón
    $date = date('Y-m-d');
    $filename = "CargasActivas_$date.xls";
    header("Content-Type: application/xls");    
    header("Content-Disposition: signal; filename=$filename");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    $separator = "\t";
    if(!empty($activas)) { // comprobaremos que el array “activas” no está vacío. Si lo está mostraremos un mensaje indicando que no hay datos a mostrar.
  
        echo implode($separator, array_keys($activas[0])) . "\n";
    
        //Loop through the rows
        foreach($activas as $row_activa){
            
            //Clean the data and remove any special characters that might conflict
            foreach($row_activa as $k => $v){
                $row_activa[$k] = str_replace($separator . "$", "", $row_activa[$k]);
                $row_activa[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row_activa[$k]);
                $row_activa[$k] = trim($row_activa[$k]);
            }
            
            //Implode and print the columns out using the 
            //$separator as the glue parameter
            echo implode($separator, $row_activa) . "\n";
        }







        /*$date = date('Y-m-d');
        $filename = "CargasActivas_$date.xls";  // Si se ha pulsado el botón y hay datos para exportar, indicar el nombre del archivo Excel que tendrá el fichero que vamos a generar.

        header("Content-Type: application/vnd.ms-excel"); // e indicar las cabeceras necesarias para generar el archivo Excel, incluyendo el nombre del fichero generado.
        header("Content-Disposition: attatchment; filename=".$filename);
    
        $mostrar_columnas = false; // Esto nos servirá para saber si ya hemos pintado los nombres de las columnas.
    
        foreach($activas as $row_activa) { //  ejecutarse el bucle “foreach” que recorrería el array de libros.
            if($row_activa == '' || $row_activa == null){
                continue;
            }
            if(!$mostrar_columnas) { 
            /*  si el valor de variable “$mostrar_columna” es “false”. Si es así,
            entonces lo que hacemos es un “implode” del “array_keys($libro)”. La función “implode” de PHP, lo que
            hace es unir los elementos de un array en una cadena mediante un elemento de unión que se le pasa como
            primer parámetro. En nuestro caso, se le pasa el valor del tabulador (\t). A continuación, se cambia el valor
            de la variable “$mostrar_columna” a “true” para que no pinte más los nombres de las columnas*/
/*
            echo implode("\t", array_keys($row_activa)) . "\n";
            
            $mostrar_columnas = true;
            }

            echo implode("\t", array_values($row_activa)) . "\n"; // En cada pasada del bucle, se ejecuta otro “implode” pero esta vez de los valores que devuelve la función “array_values($libro)” de PHP y que corresponden con la información de los libros.
        }
  */ 
    }else{
        echo 'No hay datos a exportar';
    }

    exit;
   }


?>
