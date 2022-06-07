<?php include("../db.php"); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../includes/customer/pannel_left_customer.php'); ?>

<?php include('../fijos/Pannel_right_header.php'); ?>

<?php include('../includes/customer/head_view_customer.php'); ?>



<div class="content">
    <ul class="nav nav-pills mx-auto" id="myTab" role="tablist">
        <li class="navbar-item">
            <a class="nav-link active " id="expoMar" data-toggle="pill" href="#expoMar" arial-controls="expoMarTer"
                arial-selected="true">Expo Maritimo</a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" id="expoTer-tab" data-toggle="pill" href="#expoTer" arial-controls="expoTer"
                arial-selected="true">Expo Terrestre</a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" id="impoMar-tab" data-toggle="pill" href="#impoMar" arial-controls="impoMar"
                arial-selected="true">Impo Maritimo</a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" id="impoTer-tab" data-toggle="pill" href="#impoTer" arial-controls="impoTer"
                arial-selected="true">Impo Terrestre</a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" id="nacional-tab" data-toggle="pill" href="#nacional" arial-controls="nacional"
                arial-selected="true">Nacional</a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" id="FOB-tab" data-toggle="pill" href="#FOB" arial-controls="FOB"
                arial-selected="true">Puesta FOB</a>
        </li>
    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="expoMar" role="tabpanel" aria-labelledby="expoMar-tab">
            <!-- Empieza ExpoMar-->
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Datos de la Carga</strong> General
                            </div>
                            <form action="../formularios/save_form_customer.php" method="POST" id="form_insert"
                                enctype="multipart/form-data">
                                <div style="padding-bottom: 0.25rem; " class="card-body card-block">
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">File</label>
                                        <input type="text" name="ref_customer" placeholder="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Shipper</label>
                                        <select name="shipper[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Shipper.-</option>
                                            <?php
                                                        $empresa = $_SESSION['company'];

                                                $query_shipper = $conn -> query ("SELECT * FROM `customer.shipper`WHERE company = '$empresa'");
                                                    while ($shipper= mysqli_fetch_array($query_shipper)) {                                           
                                                        echo '<option value="'.$shipper['razon_social'].'">'.$shipper['razon_social'].'</option>';
                                                    }  
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Booking</label>
                                        <input type="text" name="booking" placeholder="DE1234567890"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="street" class=" form-control-label">Commodity</label>
                                        <select name="commodity[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Commodity.-</option>
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
                                                <select name="load_place[]" id="selectSm"
                                                    class="form-control-sm form-control">
                                                    <option value="0">.-Seleccionar Lugar de Carga.-</option>
                                                    <?php
                                                            $empresa = $_SESSION['company'];
                                                            

                                                            $query_load_place = $conn -> query ("SELECT * FROM `customer_load_place` WHERE company = '$empresa'");
                                                                    while ($load_place= mysqli_fetch_array($query_load_place)) {                                           
                                                                        echo '<option value="'.$load_place['description'].'">'.$load_place['description'].'</option>';
                                                                    }  
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="postal-code" class=" form-control-label">Fecha de
                                                    Carga</label>
                                                <input type="date" name="load_date" placeholder="Postal Code"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-7">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Lugar de Entrega</label>
                                                <select name="unload_place[]" id="selectSm"
                                                    class="form-control-sm form-control">
                                                    <option value="0">.-Seleccionar Lugar de Desarga.-</option>
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
                                                <label for="postal-code" class=" form-control-label">Cut Off
                                                    Físico</label>
                                                <input type="date" name="cut_off_fis" placeholder="Postal Code"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country" class=" form-control-label">Armador</label>
                                        <select name="oceans_line[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Armador.-</option>
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

                    <div class="col-lg-6">
                        <div class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Detalles de la Carga</strong> Elements
                            </div>
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Vessel</label>
                                            <input type="text" name="vessel" placeholder="Buque" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Voyage</label>
                                            <input type="text" name="voyage" placeholder="Viaje" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Destino Final</label>
                                    <select name="final_point[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Destino.-</option>
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
                                            <input type="date" name="ETA" placeholder="Puerto de Carga"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">ETD</label>
                                            <input type="date" name="ETD" placeholder="Puerto de Carga"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Consignee</label>
                                    <select name="consignee[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Consignee.-</option>
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
                                        <option value="0">.-Seleccionar Notify.-</option>
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
                                        <option value="0">.-Seleccionar Lugar de Aduana.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_place = $conn -> query ("SELECT * FROM `aduanas`");
                                                        while ($custom_place= mysqli_fetch_array($query_custom_place)) {                                           
                                                            echo '<option value="'.$custom_place['description'].'">'.$custom_place['description'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div style="margin-bottom: 5%;" class="form-group">
                                    <label for="company" class=" form-control-label">Despachante </label>
                                    <select name="custom_agent[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Despachante.-</option>
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
                    </div>

                    <div class="col-lg-12">
                        <div style=" background: #EFF2F3;" class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Otros</strong> Elementos
                            </div>
                            <div class="card-body card-block">

                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label>Booking Conf. </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" id="file-input" name="document_bookingConf"
                                            class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="textarea-input" class=" form-control-label">Observaciones</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <textarea name="observation_customer" rows="9" placeholder="Comentarios"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div style=" background: #EFF2F3; margin:20px;" class="row">
                                <button style="text-align:center; margin-left: 45%; margin-right: 45%;" type="submit"
                                    name="save_form_expoMar" class="btn btn-lg btn-info">
                                    Enviar
                                </button>
                                </form>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- termina ExpoMar-->
        </div>
        <div class="tab-pane fade show" id="expoTer" role="tabpanel" aria-labelledby="expoTer-tab">
            <!-- Empieza expoTer-->
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Datos de la Carga</strong> General
                            </div>
                            <form action="../formularios/save_form_customer.php" method="POST" id="form_insert"
                                enctype="multipart/form-data">
                                <div style="padding-bottom: 0.25rem; " class="card-body card-block">
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">File</label>
                                        <input type="text" name="ref_customer" placeholder="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Shipper / Exportador</label>
                                        <select name="shipper[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Shipper.-</option>
                                            <?php
                                                        $empresa = $_SESSION['company'];
                                                

                                                $query_shipper = $conn -> query ("SELECT * FROM `customer.shipper`WHERE company = '$empresa'");
                                                    while ($shipper= mysqli_fetch_array($query_shipper)) {                                           
                                                        echo '<option value="'.$shipper['razon_social'].'">'.$shipper['razon_social'].'</option>';
                                                    }  
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Booking</label>
                                        <input type="text" name="booking" requiered placeholder="DE1234567890"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="street" class=" form-control-label">Commodity</label>
                                        <select name="commodity[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Commodity.-</option>
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
                                                <select name="load_place[]" id="selectSm"
                                                    class="form-control-sm form-control">
                                                    <option value="0">.-Seleccionar Lugar de Carga.-</option>
                                                    <?php
                                                            $empresa = $_SESSION['company'];
                                                            $query_load_place = $conn -> query ("SELECT * FROM `customer_load_place` WHERE company = '$empresa'");
                                                                    while ($load_place= mysqli_fetch_array($query_load_place)) {                                           
                                                                        echo '<option value="'.$load_place['description'].'">'.$load_place['description'].'</option>';
                                                                    }  
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="postal-code" class=" form-control-label">Fecha de
                                                    Carga</label>
                                                <input type="date" name="load_date" placeholder="Postal Code"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-7">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Lugar de Entrega</label>
                                                <select name="unload_place[]" id="selectSm"
                                                    class="form-control-sm form-control">
                                                    <option value="0">.-Seleccionar Lugar de Desarga.-</option>
                                                    <?php
                                                            
                                                            

                                                            $query_unload_place = $conn -> query ("SELECT * FROM `customer_unload_place`");
                                                                    while ($unload_place= mysqli_fetch_array($query_unload_place)) {                                           
                                                                        echo '<option value="'.$unload_place['description'].'">'.$unload_place['description'].'</option>';
                                                                    }  
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="postal-code" class="form-control-label">Cut Off
                                                    Físico</label>
                                                <input type="date" name="cut_off_fis" placeholder="Postal Code"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country" class=" form-control-label">Armador</label>
                                        <select name="oceans_line[]" disabled id="selectSm"
                                            class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Armador.-</option>
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
                                <strong>Detalles de la Carga</strong> Elements
                            </div>
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Vessel</label>
                                            <input type="text" name="vessel" disabled placeholder="Buque"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Voyage</label>
                                            <input type="text" name="voyage" disabled placeholder="Viaje"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Destino Final</label>
                                    <select name="final_point[]" disabled id="selectSm"
                                        class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Destino.-</option>
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
                                            <input type="date" name="ETA" disabled placeholder="Puerto de Carga"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">ETD</label>
                                            <input type="date" name="ETD" disabled placeholder="Puerto de Carga"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Lugar de Aduana Expo</label>
                                    <select name="custom_place[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Aduana.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_place = $conn -> query ("SELECT * FROM `aduanas`");
                                                        while ($custom_place= mysqli_fetch_array($query_custom_place)) {                                           
                                                            echo '<option value="'.$custom_place['description'].'">'.$custom_place['description'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div style="margin-bottom: 5%;" class="form-group">
                                    <label for="company" class=" form-control-label">Despachante Expo </label>
                                    <select name="custom_agent[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Despachante.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_agent = $conn -> query ("SELECT * FROM `custom_agent`");
                                                        while ($custom_agent= mysqli_fetch_array($query_custom_agent)) {                                           
                                                            echo '<option value="'.$custom_agent['razon_social'].'">'.$custom_agent['razon_social'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Lugar de Aduana Impo</label>
                                    <select name="custom_place_impo[]" id="selectSm"
                                        class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Aduana.-</option>
                                        <?php
                                                $query_custom_place = $conn -> query ("SELECT * FROM `aduanas`");
                                                        while ($custom_place= mysqli_fetch_array($query_custom_place)) {                                           
                                                            echo '<option value="'.$custom_place['description'].'">'.$custom_place['description'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div style="margin-bottom: 5%;" class="form-group">
                                    <label for="company" class=" form-control-label">Despachante Impo</label>
                                    <select name="custom_agent_impo[]" id="selectSm"
                                        class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Despachante.-</option>
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
                    </div>
                    <!-- Aca termina el Segundo cuadro-->
                    <div class="col-lg-12">
                        <div style=" background: #EFF2F3;" class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Otros</strong> Elementos
                            </div>
                            <div class="card-body card-block">

                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label>Referencia de carga </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" id="file-input" name="referencia_carga" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="textarea-input" class=" form-control-label">Observaciones</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <textarea name="observation_customer" rows="9" placeholder="Comentarios"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div style=" background: #EFF2F3; margin:20px;" class="row">
                                <button style="text-align:center; margin-left: 45%; margin-right: 45%;" type="submit"
                                    name="save_form_expoTer" class="btn btn-lg btn-info">
                                    Enviar
                                </button>
                                </form>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- termina expoTer-->
        </div>
        <div class="tab-pane fade show" id="impoMar" role="tabpanel" aria-labelledby="impoMar-tab">
            <!-- Empieza impoMar-->
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Datos de la Carga</strong> General
                            </div>
                            <form action="../formularios/save_form_customer.php" method="POST" id="form_insert"
                                enctype="multipart/form-data">
                                <div style="padding-bottom: 0.25rem; " class="card-body card-block">
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">File</label>
                                        <input type="text" name="ref_customer" placeholder="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Shipper / Exportador</label>
                                        <select name="shipper[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Shipper.-</option>
                                            <?php
                                                        $empresa = $_SESSION['company'];
                                                

                                                $query_shipper = $conn -> query ("SELECT * FROM `customer.shipper`WHERE company = '$empresa'");
                                                    while ($shipper= mysqli_fetch_array($query_shipper)) {                                           
                                                        echo '<option value="'.$shipper['razon_social'].'">'.$shipper['razon_social'].'</option>';
                                                    }  
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Booking</label>
                                        <input type="text" name="booking" requiredplaceholder="DE1234567890"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="street" class=" form-control-label">Commodity</label>
                                        <select name="commodity[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Commodity.-</option>
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
                                                <select name="load_place[]" id="selectSm"
                                                    class="form-control-sm form-control">
                                                    <option value="0">.-Seleccionar Lugar de Carga.-</option>
                                                    <?php
                                                            $empresa = $_SESSION['company'];
                                                            

                                                            $query_load_place = $conn -> query ("SELECT * FROM `customer_load_place` WHERE company = '$empresa'");
                                                                    while ($load_place= mysqli_fetch_array($query_load_place)) {                                           
                                                                        echo '<option value="'.$load_place['description'].'">'.$load_place['description'].'</option>';
                                                                    }  
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="postal-code" class=" form-control-label">Fecha de
                                                    Carga</label>
                                                <input type="date" name="load_date" placeholder="Postal Code"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-7">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Lugar de Entrega</label>
                                                <select name="unload_place[]" id="selectSm"
                                                    class="form-control-sm form-control">
                                                    <option value="0">.-Seleccionar Lugar de Desarga.-</option>
                                                    <?php

                                                            $query_unload_place = $conn -> query ("SELECT * FROM `customer_unload_place`");
                                                                    while ($unload_place= mysqli_fetch_array($query_unload_place)) {                                           
                                                                        echo '<option value="'.$unload_place['description'].'">'.$unload_place['description'].'</option>';
                                                                    }  
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="postal-code" class=" form-control-label">Fecha de
                                                    Carga</label>
                                                <input type="date" name="cut_off_fis" placeholder="Postal Code"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="country" class=" form-control-label">Armador</label>
                                        <select name="oceans_line[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Armador.-</option>
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
                    <div class="col-lg-6">
                        <div class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Detalles de la Carga</strong> Elements
                            </div>
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Vessel</label>
                                            <input type="text" name="vessel" placeholder="Buque" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Voyage</label>
                                            <input type="text" name="voyage" placeholder="Viaje" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class="form-control-label">Destino Final</label>
                                    <select name="final_point[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Destino.-</option>
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
                                            <input type="date" name="ETA" placeholder="Puerto de Carga"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">ETD</label>
                                            <input type="date" name="ETD" placeholder="Puerto de Carga"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Lugar de Aduana Expo</label>
                                    <select name="custom_place[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Aduana.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_place = $conn -> query ("SELECT * FROM `aduanas`");
                                                        while ($custom_place= mysqli_fetch_array($query_custom_place)) {                                           
                                                            echo '<option value="'.$custom_place['description'].'">'.$custom_place['description'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div style="margin-bottom: 5%;" class="form-group">
                                    <label for="company" class=" form-control-label">Despachante Expo </label>
                                    <select name="custom_agent[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Despachante.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_agent = $conn -> query ("SELECT * FROM `custom_agent`");
                                                        while ($custom_agent= mysqli_fetch_array($query_custom_agent)) {                                           
                                                            echo '<option value="'.$custom_agent['razon_social'].'">'.$custom_agent['razon_social'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Lugar de Aduana Impo</label>
                                    <select name="custom_place_impo[]" id="selectSm"
                                        class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Aduana.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_place = $conn -> query ("SELECT * FROM `aduanas`");
                                                        while ($custom_place= mysqli_fetch_array($query_custom_place)) {                                           
                                                            echo '<option value="'.$custom_place['description'].'">'.$custom_place['description'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div style="margin-bottom: 5%;" class="form-group">
                                    <label for="company" class=" form-control-label">Despachante Impo</label>
                                    <select name="custom_agent_impo[]" id="selectSm"
                                        class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Despachante.-</option>
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
                    </div>
                    <div class="col-lg-12">
                        <div style=" background: #EFF2F3;" class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Otros</strong> Elementos
                            </div>
                            <div class="card-body card-block">

                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label>BL </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" id="file-input" name="document_bl" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="textarea-input" class=" form-control-label">Observaciones</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <textarea name="observation_customer" rows="9" placeholder="Comentarios"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div style=" background: #EFF2F3; margin:20px;" class="row">
                                <button style="text-align:center; margin-left: 45%; margin-right: 45%;" type="submit"
                                    name="save_form_impoMar" class="btn btn-lg btn-info">
                                    Enviar
                                </button>
                                </form>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- termina impoMar-->
        </div>
        <div class="tab-pane fade show" id="impoTer" role="tabpanel" aria-labelledby="impoTer-tab">
            <!-- Empieza impoTer-->
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Datos de la Carga</strong> General
                            </div>
                            <form action="../formularios/save_form_customer.php" method="POST" id="form_insert"
                                enctype="multipart/form-data">
                                <div style="padding-bottom: 0.25rem; " class="card-body card-block">
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">File</label>
                                        <input type="text" name="ref_customer" placeholder="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Shipper / Exportador</label>
                                        <select name="shipper[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Shipper.-</option>
                                            <?php
                                                        $empresa = $_SESSION['company'];
                                                

                                                $query_shipper = $conn -> query ("SELECT * FROM `customer.shipper`WHERE company = '$empresa'");
                                                    while ($shipper= mysqli_fetch_array($query_shipper)) {                                           
                                                        echo '<option value="'.$shipper['razon_social'].'">'.$shipper['razon_social'].'</option>';
                                                    }  
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Booking</label>
                                        <input type="text" name="booking" required placeholder="DE1234567890"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="street" class=" form-control-label">Commodity</label>
                                        <select name="commodity[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Commodity.-</option>
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
                                                <select name="load_place[]" id="selectSm"
                                                    class="form-control-sm form-control">
                                                    <option value="0">.-Seleccionar Lugar de Carga.-</option>
                                                    <?php
                                                            $empresa = $_SESSION['company'];
                                                            

                                                            $query_load_place = $conn -> query ("SELECT * FROM `customer_load_place` WHERE company = '$empresa'");
                                                                    while ($load_place= mysqli_fetch_array($query_load_place)) {                                           
                                                                        echo '<option value="'.$load_place['description'].'">'.$load_place['description'].'</option>';
                                                                    }  
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="postal-code" class=" form-control-label">Fecha de
                                                    Carga</label>
                                                <input type="date" name="load_date" placeholder="Postal Code"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-7">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Lugar de Entrega</label>
                                                <select name="unload_place[]" id="selectSm"
                                                    class="form-control-sm form-control">
                                                    <option value="0">.-Seleccionar Lugar de Desarga.-</option>
                                                    <?php
                                                            
                                                            

                                                            $query_unload_place = $conn -> query ("SELECT * FROM `customer_unload_place`");
                                                                    while ($unload_place= mysqli_fetch_array($query_unload_place)) {                                           
                                                                        echo '<option value="'.$unload_place['description'].'">'.$unload_place['description'].'</option>';
                                                                    }  
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="postal-code" class=" form-control-label">Fecha de
                                                    Entrega</label>
                                                <input type="date" name="cut_off_fis" placeholder="Postal Code"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="country" class=" form-control-label">Armador</label>
                                        <select name="oceans_line[]" disabled id="selectSm"
                                            class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Armador.-</option>
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
                                <strong>Detalles de la Carga</strong> Elements
                            </div>
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Vessel</label>
                                            <input type="text" name="vessel" disabled placeholder="Buque"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Voyage</label>
                                            <input type="text" name="voyage" disabled placeholder="Viaje"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class="form-control-label">Destino Final</label>
                                    <select name="final_point[]" disabled id="selectSm"
                                        class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Destino.-</option>
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
                                            <input type="date" name="ETA" disabled placeholder="Puerto de Carga"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">ETD</label>
                                            <input type="date" name="ETD" disabled placeholder="Puerto de Carga"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Lugar de Aduana Expo</label>
                                    <select name="custom_place[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Aduana.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_place = $conn -> query ("SELECT * FROM `aduanas`");
                                                        while ($custom_place= mysqli_fetch_array($query_custom_place)) {                                           
                                                            echo '<option value="'.$custom_place['description'].'">'.$custom_place['description'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div style="margin-bottom: 5%;" class="form-group">
                                    <label for="company" class=" form-control-label">Despachante Expo </label>
                                    <select name="custom_agent[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Despachante.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_agent = $conn -> query ("SELECT * FROM `custom_agent`");
                                                        while ($custom_agent= mysqli_fetch_array($query_custom_agent)) {                                           
                                                            echo '<option value="'.$custom_agent['razon_social'].'">'.$custom_agent['razon_social'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Lugar de Aduana Impo</label>
                                    <select name="custom_place[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Aduana.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_place = $conn -> query ("SELECT * FROM `aduanas`");
                                                        while ($custom_place= mysqli_fetch_array($query_custom_place)) {                                           
                                                            echo '<option value="'.$custom_place['description'].'">'.$custom_place['description'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div style="margin-bottom: 5%;" class="form-group">
                                    <label for="company" class=" form-control-label">Despachante Impo</label>
                                    <select name="custom_agent[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Despachante.-</option>
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
                    </div>
                    <!-- Aca termina el Segundo cuadro-->
                    <div class="col-lg-12">
                        <div style=" background: #EFF2F3;" class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Otros</strong> Elementos
                            </div>
                            <div class="card-body card-block">

                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label>Referencia de carga </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" id="file-input" name="referencia_carga" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="textarea-input" class=" form-control-label">Observaciones</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <textarea name="observation_customer" rows="9" placeholder="Comentarios"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div style=" background: #EFF2F3; margin:20px;" class="row">
                                <button style="text-align:center; margin-left: 45%; margin-right: 45%;" type="submit"
                                    name="save_form_impoTer" class="btn btn-lg btn-info">
                                    Enviar
                                </button>
                                </form>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <!-- termina impoTer-->
        </div>
        <div class="tab-pane fade show" id="nacional" role="tabpanel" aria-labelledby="nacional-tab">
            <!-- Empieza Nacional-->
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Datos de la Carga</strong> General
                            </div>
                            <form action="../formularios/save_form_customer.php" method="POST" id="form_insert"
                                enctype="multipart/form-data">
                                <div style="padding-bottom: 0.25rem; " class="card-body card-block">
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">File</label>
                                        <input type="text" name="ref_customer" placeholder="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Shipper / Exportador</label>
                                        <select name="shipper[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Shipper.-</option>
                                            <?php
                                                        $empresa = $_SESSION['company'];
                                                

                                                $query_shipper = $conn -> query ("SELECT * FROM `customer.shipper`WHERE company = '$empresa'");
                                                    while ($shipper= mysqli_fetch_array($query_shipper)) {                                           
                                                        echo '<option value="'.$shipper['razon_social'].'">'.$shipper['razon_social'].'</option>';
                                                    }  
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">Booking:</label>
                                        <input type="text" name="booking" required placeholder="DE1234567890"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="street" class=" form-control-label">Commodity</label>
                                        <select name="commodity[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Commodity.-</option>
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
                                                <select name="load_place[]" id="selectSm"
                                                    class="form-control-sm form-control">
                                                    <option value="0">.-Seleccionar Lugar de Carga.-</option>
                                                    <?php
                                                            $empresa = $_SESSION['company'];
                                                            

                                                            $query_load_place = $conn -> query ("SELECT * FROM `customer_load_place` WHERE company = '$empresa'");
                                                                    while ($load_place= mysqli_fetch_array($query_load_place)) {                                           
                                                                        echo '<option value="'.$load_place['description'].'">'.$load_place['description'].'</option>';
                                                                    }  
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="postal-code" class=" form-control-label">Fecha de
                                                    Carga</label>
                                                <input type="date" name="load_date" placeholder="Postal Code"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-7">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Lugar de Entrega</label>
                                                <select name="unload_place[]" id="selectSm"
                                                    class="form-control-sm form-control">
                                                    <option value="0">.-Seleccionar Lugar de Desarga.-</option>
                                                    <?php
                                                            
                                                            

                                                            $query_unload_place = $conn -> query ("SELECT * FROM `customer_unload_place`");
                                                                    while ($unload_place= mysqli_fetch_array($query_unload_place)) {                                           
                                                                        echo '<option value="'.$unload_place['description'].'">'.$unload_place['description'].'</option>';
                                                                    }  
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="postal-code" class="form-control-label">Cut Off
                                                    Físico</label>
                                                <input type="date" name="cut_off_fis" placeholder="Postal Code"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country" dissabled class=" form-control-label">Armador</label>
                                        <select name="oceans_line[]" disabled id="selectSm"
                                            class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Armador.-</option>
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
                                <strong>Detalles de la Carga</strong> Elements
                            </div>
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="company" disabled class=" form-control-label">Vessel</label>
                                            <input type="text" name="vessel" disabled placeholder="Buque"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="company" disabled class=" form-control-label">Voyage</label>
                                            <input type="text" name="voyage" disabled placeholder="Viaje"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Destino Final</label>
                                    <select name="final_point[]" disabled id="selectSm"
                                        class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Destino.-</option>
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
                                            <input type="date" disable name="ETA" disabled placeholder="Puerto de Carga"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">ETD</label>
                                            <input type="date" disabled name="ETD" disabled
                                                placeholder="Puerto de Carga" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Lugar de Aduana Expo</label>
                                    <select name="custom_place[]" disabled id="selectSm"
                                        class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Aduana.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_place = $conn -> query ("SELECT * FROM `aduanas`");
                                                        while ($custom_place= mysqli_fetch_array($query_custom_place)) {                                           
                                                            echo '<option value="'.$custom_place['description'].'">'.$custom_place['description'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div style="margin-bottom: 5%;" class="form-group">
                                    <label for="company" class=" form-control-label">Despachante Expo </label>
                                    <select name="custom_agent[]" disabled id="selectSm"
                                        class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Despachante.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_agent = $conn -> query ("SELECT * FROM `custom_agent`");
                                                        while ($custom_agent= mysqli_fetch_array($query_custom_agent)) {                                           
                                                            echo '<option value="'.$custom_agent['razon_social'].'">'.$custom_agent['razon_social'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Lugar de Aduana Impo</label>
                                    <select name="custom_place[]" disabled id="selectSm"
                                        class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Aduana.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_place = $conn -> query ("SELECT * FROM `aduanas`");
                                                        while ($custom_place= mysqli_fetch_array($query_custom_place)) {                                           
                                                            echo '<option value="'.$custom_place['description'].'">'.$custom_place['description'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div style="margin-bottom: 5%;" class="form-group">
                                    <label for="company" class="form-control-label">Despachante Impo</label>
                                    <select name="custom_agent[]" disabled id="selectSm"
                                        class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Despachante.-</option>
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
                    </div>
                    <!-- Aca termina el Segundo cuadro-->
                    <div class="col-lg-12">
                        <div style=" background: #EFF2F3;" class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Otros</strong> Elementos
                            </div>
                            <div class="card-body card-block">


                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="textarea-input" class=" form-control-label">Observaciones</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <textarea name="observation_customer" rows="9" placeholder="Comentarios"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div style=" background: #EFF2F3; margin:20px;" class="row">
                                <button style="text-align:center; margin-left: 45%; margin-right: 45%;" type="submit"
                                    name="save_form_nacional" class="btn btn-lg btn-info">
                                    Enviar
                                </button>
                                </form>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- termina Nacional-->
        </div>
        <div class="tab-pane fade show" id="FOB" role="tabpanel" aria-labelledby="FOB-tab">
            <!-- Empieza FOB-->
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Datos de la Carga</strong> General
                            </div>
                            <form action="../formularios/save_form_customer.php" method="POST" id="form_insert"
                                enctype="multipart/form-data">
                                <div style="padding-bottom: 0.25rem; " class="card-body card-block">
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">File</label>
                                        <input type="text" name="ref_customer" placeholder="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Shipper</label>
                                        <select name="shipper[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Shipper.-</option>
                                            <?php
                                                        $empresa = $_SESSION['company'];
                                                

                                                $query_shipper = $conn -> query ("SELECT * FROM `customer.shipper`WHERE company = '$empresa'");
                                                    while ($shipper= mysqli_fetch_array($query_shipper)) {                                           
                                                        echo '<option value="'.$shipper['razon_social'].'">'.$shipper['razon_social'].'</option>';
                                                    }  
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Booking</label>
                                        <input type="text" name="booking" required placeholder="DE1234567890"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="street" class=" form-control-label">Commodity</label>
                                        <select name="commodity[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Commodity.-</option>
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
                                                <select name="load_place[]" id="selectSm"
                                                    class="form-control-sm form-control">
                                                    <option value="0">.-Seleccionar Lugar de Carga.-</option>
                                                    <?php
                                                            $empresa = $_SESSION['company'];
                                                            

                                                            $query_load_place = $conn -> query ("SELECT * FROM `customer_load_place` WHERE company = '$empresa'");
                                                                    while ($load_place= mysqli_fetch_array($query_load_place)) {                                           
                                                                        echo '<option value="'.$load_place['description'].'">'.$load_place['description'].'</option>';
                                                                    }  
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="postal-code" class=" form-control-label">Fecha de
                                                    Carga</label>
                                                <input type="date" name="load_date" placeholder="Postal Code"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-7">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Lugar de Entrega</label>
                                                <select name="unload_place[]" id="selectSm"
                                                    class="form-control-sm form-control">
                                                    <option value="0">.-Seleccionar Lugar de Desarga.-</option>
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
                                                <label for="postal-code" class=" form-control-label">Cut Off
                                                    Físico</label>
                                                <input type="date" name="cut_off_fis" placeholder="Postal Code"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country" class=" form-control-label">Armador</label>
                                        <select name="oceans_line[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="0">.-Seleccionar Armador.-</option>
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
                                <strong>Detalles de la Carga</strong> Elements
                            </div>
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Vessel</label>
                                            <input type="text" name="vessel" placeholder="Buque" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Voyage</label>
                                            <input type="text" name="voyage" placeholder="Viaje" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Destino Final</label>
                                    <select name="final_point[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Lugar de Destino.-</option>
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
                                            <input type="date" name="ETA" placeholder="Puerto de Carga"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">ETD</label>
                                            <input type="date" name="ETD" placeholder="Puerto de Carga"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Consignee</label>
                                    <select name="consignee[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Consignee.-</option>
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
                                        <option value="0">.-Seleccionar Notify.-</option>
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
                                        <option value="0">.-Seleccionar Lugar de Aduana.-</option>
                                        <?php
                                                
                                                

                                                $query_custom_place = $conn -> query ("SELECT * FROM `aduanas`");
                                                        while ($custom_place= mysqli_fetch_array($query_custom_place)) {                                           
                                                            echo '<option value="'.$custom_place['description'].'">'.$custom_place['description'].'</option>';
                                                        }  
                                            ?>
                                    </select>
                                </div>
                                <div style="margin-bottom: 5%;" class="form-group">
                                    <label for="company" class=" form-control-label">Despachante </label>
                                    <select name="custom_agent[]" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">.-Seleccionar Despachante.-</option>
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
                    </div>
                    <!-- Aca termina el Segundo cuadro-->
                    <div class="col-lg-12">
                        <div style=" background: #EFF2F3;" class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong>Otros</strong> Elementos
                            </div>
                            <div class="card-body card-block">

                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label>Booking Conf. </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" id="file-input" name="document_bookingConf"
                                            class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="textarea-input" class=" form-control-label">Observaciones</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <textarea name="observation_customer" rows="9" placeholder="Comentarios"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div style=" background: #EFF2F3; margin:20px;" class="row">
                                <button style="text-align:center; margin-left: 45%; margin-right: 45%;" type="submit"
                                    name="save_form_FOB" class="btn btn-lg btn-info">
                                    Enviar
                                </button>
                                </form>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- termina FOB-->
        </div>
    </div>
    <?php include('../fijos/footer.php')?>