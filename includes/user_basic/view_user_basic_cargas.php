<div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div style="text-align:center;" class="card-header">
                                <strong class="card-title">Cargas de la Semana</strong>
                            </div>
                                                       
                            <div class="card-body">
                                <ul class="nav nav-pills nav-fill" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="compara-tab" data-toggle="pill" href="#compara" arial-controls="compara"arial-selected="true">Anterior</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tarjetas-tab" data-toggle="pill" href="#tarjetas" arial-controls="tarjetas"arial-selected="true">Semana Actual</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="comentarios-tab" data-toggle="pill" href="#comentarios"arial-controls="comentarios" arial-selected="true">Siguientes</a>
                                    </li>
                                </ul>
                           
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tarjetas" role="tabpanel" aria-labelledby="tarjetas-tab">
                                        <div class="table-reponsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead style="text-align:center;">
                                                    <tr>
                                                        <th>Fecha</th>
                                                        <th>Cliente</th>
                                                        <th>File</th>
                                                        <th>Cntr</th>
                                                        <th>Booking</th>
                                                        <th>Shipper</th>
                                                        <th>Commodity</th>
                                                        <th>user</th>
                                                        <th>Status</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $usuario = $_SESSION['user']; 
                                                        $query = "SELECT * FROM cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE WEEKOFYEAR(`carga`.`load_date`)=WEEKOFYEAR(NOW()) AND carga.status != 'TERMINADA' ORDER BY `carga`.`load_date` DESC";
                                                        $result_tasks = mysqli_query($conn, $query);    

                                                        while($row = mysqli_fetch_assoc($result_tasks)) { 
                                                            
                                                        ?>
                                                        <tr>
                                                            <td style=" font-size: 0.7rem;"><?php echo $row['load_date']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['Empresa']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['ref_customer']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['cntr_number'] . ' ('. $row['cntr_type'] .')'; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['booking']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['shipper']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['commodity']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['user']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['status']; ?></td>
                                                            <td style=" width:15%;">
                                                                <div style="margin: 0 10% 0 10%;" class="row">
                                                                    <!-- <a style="margin: 0% 0% 0% 2%;" href="../formularios/formulariodeinstructivos.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>-->
                                                                    <a  style="margin: 0% 0% 0% 5%;" href="../includes/delete_task_user.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </a>
                                                                    <a  style="margin: 0% 0% 0% 5%;" href="../includes/view_carga_user.php?id=<?php echo $row['id']?>" class="btn btn-primary">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php }  ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="compara" role="tabpanel" aria-labelledby="compara-tab">
                                        <br>
                                       
                                        <div class="table-reponsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead style="text-align:center;">
                                                    <tr>
                                                    <th>Fecha</th>
                                                        <th>Cliente</th>
                                                        <th>File</th>
                                                        <th>Cntr</th>
                                                        <th>Booking</th>
                                                        <th>Shipper</th>
                                                        <th>Commodity</th>
                                                        <th>user</th>
                                                        <th>Status</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $usuario = $_SESSION['user']; 
                                                        $query = "SELECT * FROM cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE WEEKOFYEAR(`carga`.`load_date`)<WEEKOFYEAR(NOW()) AND carga.status != 'TERMINADA' ORDER BY `carga`.`load_date` DESC";
                                                        $result_tasks = mysqli_query($conn, $query);    

                                                        while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                                       <tr>
                                                            <td style=" font-size: 0.7rem;"><?php echo $row['load_date']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['Empresa']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['ref_customer']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['cntr_number'] . ' ('. $row['cntr_type'] .')'; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['booking']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['shipper']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['commodity']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['user']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['status']; ?></td>
                                                            <td style=" width:15%;">
                                                                <div style="margin: 0 10% 0 10%;" class="row">
                                                                    <!-- <a style="margin: 0% 0% 0% 2%;" href="../formularios/formulariodeinstructivos.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>-->
                                                                    <a  style="margin: 0% 0% 0% 5%;" href="../includes/delete_task_user.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </a>
                                                                    <a  style="margin: 0% 0% 0% 5%;" href="../includes/view_carga_user.php?id=<?php echo $row['id']?>" class="btn btn-primary">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php }  ?>
                                                </tbody>                                                
                                            </table>
                                        </div>
                                    </div>                            
                                    <div class="tab-pane fade" id="comentarios" role="tabpanel" aria-labelledby="comentarios-tab">
                                        <br>
                                        <div class="table-reponsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
                                        
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead style="text-align:center;">
                                                        <tr>
                                                            <th>Fecha</th>
                                                            <th>Cliente</th>
                                                            <th>File</th>
                                                            <th>Cntr</th>
                                                            <th>Booking</th>
                                                            <th>Shipper</th>
                                                            <th>Commodity</th>
                                                            <th>user</th>
                                                            <th>Status</th>
                                                            <th>Opciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $usuario = $_SESSION['user']; 
                                                            $query = "SELECT * FROM cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE WEEKOFYEAR(`carga`.`load_date`)>WEEKOFYEAR(NOW()) AND carga.status != 'TERMINADA' ORDER BY `carga`.`load_date` DESC";
                                                            $result_tasks = mysqli_query($conn, $query);    
                                                            while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                                            <tr>
                                                            <td style=" font-size: 0.7rem;"><?php echo $row['load_date']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['Empresa']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['ref_customer']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['cntr_number'] . ' ('. $row['cntr_type'] .')'; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['booking']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['shipper']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['commodity']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['user']; ?></td>
                                                            <td style=" font-size: 0.8rem;"><?php echo $row['status']; ?></td>
                                                            <td style=" width:15%;">
                                                                <div style="margin: 0 10% 0 10%;" class="row">
                                                                    <!-- <a style="margin: 0% 0% 0% 2%;" href="../formularios/formulariodeinstructivos.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>-->
                                                                    <a  style="margin: 0% 0% 0% 5%;" href="../includes/delete_task_user.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </a>
                                                                    <a  style="margin: 0% 0% 0% 5%;" href="../includes/view_carga_user.php?id=<?php echo $row['id']?>" class="btn btn-primary">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php }  ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                    </div>
                                </div>
                            </div>
                    </div>