<?php include("db.php");?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href='assets/css/component-chosen.css'>
    <link type="text/css" rel="stylesheet" href='assets/css/component-chosen.min.css'>
    <link type="text/css" rel="stylesheet" href='assets/css/bootstrap.min.css'>
    <title>Listas Dependientes</title>
</head>
<body>
    <script type = "text/javascript" src = 'assets/js/colonias.js' ></script> 
    <script src="assets/js/jquery-3.4.1.min.js" ></script>
    <script src="assets/js/chosen.jquery.js" type="text/javascript"></script>
    
    <div class="form-group">
        <label for="Alcaldia">Transporte</label>                                                 
            <select name="transporte[]" id="transporte"  data-placeholder="- Seleccione Alcaldía -"
             class="form-control chosentransporte" onchange="change(this.id, 'chofer')"
             value="<%= typeof transporte != 'undefined' ? transporte : '' %>">
              <option value=""></option>
              <script type="text/javascript">
                    function CheckCntr(str){
                        if (str == "") {
                            document.getElementById("txtHint").innerHTML = "";
                            return;
                        } else {
                            if (window.XMLHttpRequest) {
                                    // code for IE7+, Firefox, Chrome, Opera, Safari
                                xmlhttp = new XMLHttpRequest();
                        } else {
                                // code for IE6, IE5
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                            }
                        };
                    xmlhttp.open("GET","getuser.php?q="+str,true);
                    xmlhttp.send();                                        
                    }
                }
            </script>
            <?php

                $query_empresa = "SELECT empresa FROM users WHERE username = 'pachiman'";
                $datos_empresa = mysqli_query($conn, $query_empresa);
                if (mysqli_num_rows($datos_empresa) == 1) {
                $row = mysqli_fetch_array($datos_empresa);
                $empresa = $row['empresa'];}
                
                
                $query_transporte = $conn -> query ("SELECT * FROM transporte where empresa = 'forwarder'");
                    while ($transporte = mysqli_fetch_array($query_transporte)) {
        
                        echo '<option value="'.$transporte['Razon_Social'].'">'.$transporte['Razon_Social'].'</option>';

                    }     
                    
                    $query_chofer = $conn -> query ("SELECT choferes.nombre, choferes.apellido, transporte.Razon_Social FROM choferes INNER JOIN transporte ON choferes.transporte =  transporte.Razon_Social"); 
                    while ($choferes = mysqli_fetch_array($query_choferes)){
                        
                        $nombre_chofer = $choferes['nombre'];
                        
                        }

            ?>
              
            </select>
      </div>
      <div class="form-group">
        <label for="Colonia">Chofer </label>
          <select id="chofer" name="chofer[]" data-placeholder="- Seleccione Colonia -"
          class="form-control chosenchofer" value="<%= typeof chofer != 'undefined' ? chofer : '' %>" >
            <option value=""></option>
          </select>
      </div>
      
      <script>
        //chosen institución
        $('.chosentransporte, .chosenchofer').chosen({no_results_text: "No hay resultados...",allow_single_deselect: true});
        $(".chosentransporte").chosen().on("change", function(event) { 
                            document.getElementById('chofer').value = "" ;
                            $(".chosenchofer").trigger('chosen:updated');                                                                                                       
                            });
        $(".chosenchofer").chosen().on("chosen:showing_dropdown", function(event) {  
                            $(".chosenchofer").trigger('chosen:updated');                                                                           
                            });
        </script>
    
</body>
</html>