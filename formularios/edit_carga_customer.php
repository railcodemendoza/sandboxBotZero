<?php include("../db.php") ?>

<?php include("../fijos/header.php") ?>



<?php include('../includes/customer/pannel_left_customer.php'); ?>
<?php include("../fijos/Pannel_right_header.php") ?>


<?php include('../includes/customer/head_view_customer.php'); ?>

<?php

 

$id = $_GET['id'];


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM carga WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $shipper = $row['shipper'];
    $booking = $row['booking'];
    $commodity = $row['commodity'];
    $load_place = $row['load_place'];
    $load_date = $row['load_date'];
    $unload_place = $row['unload_place'];
    $cut_off_fis = $row['cut_off_fis'];
    $oceans_line = $row['oceans_line'];
    $vessel = $row['vessel'];
    $voyage = $row['voyage'];
    $final_point = $row['final_point'];
    $ETA = $row['ETA'];
    $ETD = $row['ETD'];
    $consignee = $row['consignee'];
    $notify = $row['notify'];
    $custom_place = $row['custom_place'];
    $custom_agent = $row['custom_agent'];
    $observation_customer = $row['observation_customer'];
    $ref_customer = $row['ref_customer'];
        }
    }





if(isset($_POST['edit_form'])) { // agrega el boto update

    
foreach ($_POST['commodity'] as  $commodity);
foreach ($_POST['load_place'] as  $load_place );
foreach ($_POST['unload_place'] as  $unload_place );
foreach ($_POST['final_point'] as  $final_point );
foreach ($_POST['consignee'] as  $consignee );
foreach ($_POST['notify'] as  $notify );
foreach ($_POST['custom_place'] as  $custom_place );
foreach ($_POST['custom_agent'] as  $custom_agent);
       
        $load_date = $_POST['load_date'];
        $cut_off_fis = $_POST['cut_off_fis'];
        $vessel = $_POST['vessel'];
        $voyage = $_POST['voyage'];
        $ETA = $_POST['ETA'];
        $ETD = $_POST['ETD'];
        $observation_customer =$_POST['observation_customer'];
        $ref_customer = $_POST['ref_customer'];
      

  $query = "UPDATE carga set commodity = '$commodity', load_place = '$load_place' ,load_date = '$load_date' ,unload_place = '$unload_place' ,cut_off_fis = '$cut_off_fis' ,vessel = '$vessel' ,voyage = '$voyage' ,ETA = '$ETA' ,ETD = '$ETD' ,consignee = '$consignee' ,notify = '$notify' ,custom_place = '$custom_place' ,custom_agent = '$custom_agent' ,observation_customer = '$observation_customer' ,ref_customer = '$ref_customer' ,oceans_line = '$oceans_line', final_point = '$final_point' WHERE id=$id";
  mysqli_query($conn, $query);


  $_SESSION['message'] = 'Carga modificada correctamente';
  $_SESSION['message_type'] = 'success';
  
  
  echo "<script>
                
                location.href='../views/view_customer.php'; 
    </script>";
}
?>
        <form action="edit_carga_customer.php?id=<?php echo $id;?>" method="POST">  
            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">              
                        <div class="col-lg-6">
                            <div class="card">
                                <div style="text-align:center;" class="card-header"><strong>Datos de la Carga</strong> General</div>
                            <div style="padding-bottom: 5.6rem; background: #EFF2F3;" class="card-body card-block">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Shipper</label>
                                    <p><?php echo $shipper;?> </p>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Booking</label>
                                    <p><?php  echo $booking;?> </p>
                                </div>
                                <div class="form-group">
                                    <label for="street" class=" form-control-label">Commodity</label>
                                    <select name="commodity[]" id="selectSm" class="form-control-sm form-control">
                                    <option value="<?php echo $commodity;?>"><?php echo $commodity;?></option>     
                                        <?php
                                        
                                            

                                            $query_commodity = $conn -> query ("SELECT * FROM `commodity`");
                                                    while ($commodity= mysqli_fetch_array($query_commodity)) {                                           
                                                        echo '<option value="'.$commodity['commodity'].'">'.$commodity['commodity'].'</option>';
                                                    }  
                                        ?>
                                </select>
                                </div>
                                <div class="row form-group">
                                    <div class="col-7">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Lugar de Carga</label>
                                            <select name="load_place[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="<?php echo $load_place;?>"><?php echo $load_place;?></option>     
                                                <?php
                                                    $empresa = $_SESSION['company'];
                                                    

                                                    $query_load_place = $conn -> query ("SELECT * FROM `customer_load_place` WHERE company = '$empresa' ");
                                                            while ($load_place= mysqli_fetch_array($query_load_place)) {                                           
                                                                echo '<option value="'.$load_place['description'].'">'.$load_place['description'].'</option>';
                                                            }  
                                                ?>
                                        </select>    
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="postal-code" class=" form-control-label">Fecha de Carga</label>
                                            <input type="date" name="load_date" class="form-control" value="<?php echo $load_date;?>"></div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-7">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Lugar de Entrega</label>
                                               
                                                <select name="unload_place[]" id="selectSm" class="form-control-sm form-control">
                                                    <option value="<?php echo $unload_place;?>"><?php echo $unload_place;?></option>     
                                                        <?php
                                                        
                                                            

                                                            $query_unload_place = $conn -> query ("SELECT * FROM `port`");
                                                                    while ($unload_place= mysqli_fetch_array($query_unload_place)) {                                           
                                                                        echo '<option value="'.$unload_place['description'].'">'.$unload_place['description'].'</option>';
                                                                    }  
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="postal-code" class=" form-control-label">Cut Off Físico</label>
                                                <input type="date" name="cut_off_fis" class="form-control" value="<?php echo $cut_off_fis;?>">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country" class=" form-control-label">Armador</label>
                                        <select name="oceans_line[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="<?php echo $oceans_line;?>"><?php echo $oceans_line;?></option>     
                                                <?php
                                                
                                                    

                                                    $query_oceans_line = $conn -> query ("SELECT * FROM `ocean_lines`");
                                                            while ($oceans_line= mysqli_fetch_array($query_oceans_line)) {                                           
                                                                echo '<option value="'.$oceans_line['razon_social'].'">'.$oceans_line['razon_social'].'</option>';
                                                            }  
                                                ?>
                                        </select>     
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                        <!-- Aca termina el primer cuadro-->
                        <div class="col-lg-6">
                            <div class="card">
                                <div style="text-align:center;" class="card-header">
                                    <strong>Detalles de la Carga</strong> 
                                </div>
                                <div style=" background: #EFF2F3;" class="card-body card-block">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Vessel</label>
                                                <input type="text" name="vessel" value="<?php echo $vessel;?> " class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Voyage</label>
                                                <input type="text"name="voyage" value="<?php echo $voyage;?> " class="form-control">
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Destino Final</label>
                                    
                                    <select name="final_point[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="<?php echo $final_point;?>"><?php echo $final_point;?></option>     
                                            <?php
                                            
                                                

                                                $query_final_point = $conn -> query ("SELECT * FROM `port`");
                                                        while ($final_point= mysqli_fetch_array($query_final_point)) {                                           
                                                            echo '<option value="'.$final_point['description'].'">'.$final_point['description'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">ETA</label>
                                            <input type="date" name="ETA"  class="form-control" value="<?php echo $ETA;?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">ETD</label>
                                            <input type="date" name="ETD" class="form-control" value="<?php echo $ETD;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Consignee</label>
                                    
                                    <select name="consignee[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="<?php echo $consignee; ?>"><?php echo $consignee; ?></option>     
                                            <?php
                                                $empresa = $_SESSION['company'];
                                                

                                                $query_consignee = $conn -> query ("SELECT * FROM `customer.cnee` where company = '$empresa' ");
                                                        while ($consignee= mysqli_fetch_array($query_consignee)) {                                           
                                                            echo '<option value="'.$consignee['razon_social'].'">'.$consignee['razon_social'].'</option>';
                                                        }  
                                            ?>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Notify</label>
                                    <select name="notify[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="<?php echo $notify; ?>"><?php echo $notify; ?></option>     
                                        <?php
                                            $empresa = $_SESSION['company'];
                                                

                                                $query_notify = $conn -> query ("SELECT * FROM `customer.ntfy` WHERE company = '$empresa'");
                                                        while ($notify= mysqli_fetch_array($query_notify)) {                                           
                                                            echo '<option value="'.$notify['razon_social'].'">'.$notify['razon_social'].'</option>';
                                                        }  
                                        ?>
                                </select>   
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Lugar de Aduana </label>
                                    
                                    <select name="custom_place[]" id="selectSm" class="form-control-sm form-control">
                                    <option value="<?php echo $custom_place; ?>"><?php echo $custom_place; ?></option>     
                                        <?php
                                            
                                            

                                            $query_custom_place = $conn -> query ("SELECT * FROM `aduanas`");
                                                    while ($custom_place= mysqli_fetch_array($query_custom_place)) {                                           
                                                        echo '<option value="'.$custom_place['description'].'">'.$custom_place['description'].'</option>';
                                                    }  
                                        ?>
                                </select>  
                                </div> 
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Despachante </label>
                                    
                                    <select name="custom_agent[]" id="selectSm" class="form-control-sm form-control">
                                    <option value="<?php echo $custom_agent; ?>"><?php echo $custom_agent; ?></option>     
                                        <?php
                                            
                                            

                                            $query_custom_agent = $conn -> query ("SELECT * FROM `custom_agent`");
                                                    while ($custom_agent= mysqli_fetch_array($query_custom_agent)) {                                           
                                                        echo '<option value="'.$custom_agent['razon_social'].'">'.$custom_agent['razon_social'].'</option>';
                                                    }  
                                        ?>
                                </select>
                                </div>    
                            </div>  
                        </div>  
                         <!-- Aca termina el primer cuadro-->
                    </div>
                    <div class="col-lg-12">
                        <div style=" background: #EFF2F3;" class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Otros</strong> Datos
                            </div>
                            <div style=" background: #EFF2F3;" class="card-body card-block">
                                <div action="#" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Referencia Interna</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <input type="text" name="ref_customer" value="<?php echo $ref_customer; ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-2">
                                            <label for="textarea-input" class=" form-control-label">Observaciones</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea style="white-space: pre-line;" name="observation_customer" rows="9" class="form-control" wrap="virtual"><?php echo $observation_customer;?></textarea>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                       
                        
                        <div style=" background: #EFF2F3; margin:20px;"  class="row">
                            <button style="text-align:center; margin-left: 45%; margin-right: 45%;" type="submit" name="edit_form" class="btn btn-lg btn-info">
                               Guardar
                            </button>
                        </div>        
                        <br>
                    </div>
                 </div>   
            </div><!-- .content -->
        </form>

   <?php include('../fijos/footer.php')?>
