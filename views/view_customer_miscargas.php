

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div style="text-align:center;" class="card-header">
                        <strong class="card-title">Mis Cargas</strong>
                    </div>
                            <div class="card-body">
                                <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead style="text-align:center;">
                                        <tr>
                                        <th>ID</th>
                                        <th>Referencia</th>
                                        <th>Booking</th>
                                        <th>Shipper</th>
                                        <th>Commodity</th>
                                        <th>Status</th>
                                        <th style="width: 17%;">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $usuario = $_SESSION['user'];
                                        $query = "SELECT * FROM carga WHERE user = '$usuario' AND status != 'TERMINADA'";
                                        $result_tasks = mysqli_query($conn, $query);    

                                        while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['ref_customer']; ?></td>
                                                <td><?php echo $row['booking']; ?></td>
                                                <td><?php echo $row['shipper']; ?></td>
                                                <td><?php echo $row['commodity']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td  style="text-align:center;">
                                                
                                                                                               
                                                <a title="Editar carga" href="../formularios/edit_carga_customer.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a title="Eliminar Carga" href="../includes/delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                                <a title="Ver Carga" href="../includes/view_carga.php?id=<?php echo $row['id']?>" class="btn btn-success">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                
                                                </td>
                                            </tr>
                                        <?php
                                            } ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
