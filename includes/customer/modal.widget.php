 <!-- Modal YENDO A CARGAR -->
 <div class="modal fade" id="gotoload" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <div class="row">
                     <div class="col-sm-11">
                         <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de cargas <strong>YENDO A CARGAR</strong></h5>
                     </div>
                     <div class="col-sm-1">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                 </div>
             </div>
             <div class="modal-body">
                 <table class="table table-striped table-bordered">
                     <thead style="text-align: center;">
                         <tr>
                             <th>Numero</th>
                             <th>Tipo</th>
                             <th>Depósito de retiro</th>
                             <th>Shipper</th>
                         </tr>
                     </thead>
                     <tbody style="text-align: center;">
                         <?php while ($row = mysqli_fetch_assoc($result_detalles_go_to_load)) { ?>
                             <tr>

                                 <td><?php echo $row['cntr_number']; ?></td>
                                 <td><?php echo $row['cntr_type']; ?></td>
                                 <td><?php echo $row['retiro_place']; ?></td>
                                 <td><?php echo $row['shipper'];
                                    } ?></td>
                             </tr>
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-sm-5"></div>
                 <div class="col-sm-2">
                     <form action="../Report_Customer/go_to_load.php" method="post">
                         <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Reporte</button>
                     </form>
                 </div>
                 <div class="col-sm-5">

                 </div>
             </div>
             <br>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal Loading -->
 <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <div class="row">
                     <div class="col-sm-11">
                         <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de cargas <strong>CARGANDO</strong></h5>
                     </div>
                     <div class="col-sm-1">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                 </div>
             </div>
             <div class="modal-body">
                 <table class="table table-striped table-bordered">
                     <thead style="text-align: center;">
                         <tr>
                             <th>Numero</th>
                             <th>tipo</th>
                             <th>Lugar de Carga</th>
                             <th>Shipper</th>
                         </tr>
                     </thead>
                     <tbody style="text-align: center;">
                         <?php while ($row = mysqli_fetch_assoc($result_detalles_loading)) { ?>
                             <tr>

                                 <td><?php echo $row['cntr_number']; ?></td>
                                 <td><?php echo $row['cntr_type']; ?></td>
                                 <td><?php echo $row['load_place']; ?></td>
                                 <td><?php echo $row['shipper'];
                                    } ?></td>
                             </tr>
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-sm-5"></div>
                 <div class="col-sm-2">
                     <form action="../Report_Customer/loading.php" method="post">
                         <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Reporte</button>
                     </form>
                 </div>
                 <div class="col-sm-5">

                 </div>
             </div>
             <br>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal Custom Place -->
 <div class="modal fade" id="customPlace" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <div class="row">
                     <div class="col-sm-11">
                         <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de cargas <strong>EN ADUANA</strong></h5>
                     </div>
                     <div class="col-sm-1">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                 </div>
             </div>
             <div class="modal-body">
                 <table class="table table-striped table-bordered">
                     <thead style="text-align: center;">
                         <tr>
                             <th>Numero</th>
                             <th>tipo</th>
                             <th>Lugar de Aduana</th>
                             <th>Shipper</th>
                         </tr>
                     </thead>
                     <tbody style="text-align: center;">
                         <?php while ($row = mysqli_fetch_assoc($result_detalles_custom_place)) { ?>
                             <tr>

                                 <td><?php echo $row['cntr_number']; ?></td>
                                 <td><?php echo $row['cntr_type']; ?></td>
                                 <td><?php echo $row['custom_place']; ?></td>
                                 <td><?php echo $row['shipper'];
                                    } ?></td>
                             </tr>
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-sm-5"></div>
                 <div class="col-sm-2">
                     <form action="../Report_Customer/custom_place.php" method="post">
                         <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Reporte</button>
                     </form>
                 </div>
                 <div class="col-sm-5">

                 </div>
             </div>
             <br>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal YENDO A DESCARGAR -->
 <div class="modal fade" id="goToUnload" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <div class="row">
                     <div class="col-sm-11">
                         <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de cargas <strong>CAMINO A DESCARGAR</strong></h5>
                     </div>
                     <div class="col-sm-1">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                 </div>
             </div>
             <div class="modal-body">
                 <table class="table table-striped table-bordered">
                     <thead style="text-align: center;">
                         <tr>
                             <th>Número</th>
                             <th>Tipo</th>
                             <th>Puerto de Carga</th>
                             <th>Shipper</th>
                         </tr>
                     </thead>
                     <tbody style="text-align: center;">
                         <?php while ($row = mysqli_fetch_assoc($result_detalles_go_to_unload)) { ?>
                             <tr>

                                 <td><?php echo $row['cntr_number']; ?></td>
                                 <td><?php echo $row['cntr_type']; ?></td>
                                 <td><?php echo $row['unload_place']; ?></td>
                                 <td><?php echo $row['shipper'];
                                    } ?></td>
                             </tr>
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-sm-5"></div>
                 <div class="col-sm-2">
                     <form action="../Report_Customer/go_to_unload.php" method="post">
                         <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Reporte</button>
                     </form>
                 </div>
                 <div class="col-sm-5">

                 </div>
             </div>
             <br>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal Go to Staking -->
 <div class="modal fade" id="Staking" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <div class="row">
                     <div class="col-sm-11">
                         <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de cargas <strong>EN STACKING</strong></h5>
                     </div>
                     <div class="col-sm-1">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                 </div>
             </div>
             <div class="modal-body">
                 <table class="table table-striped table-bordered">
                     <thead style="text-align: center;">
                         <tr>
                             <th>Numero</th>
                             <th>Tipo</th>
                             <th>Buque</th>
                             <th>Shipper</th>
                         </tr>
                     </thead>
                     <tbody style="text-align: center;">
                         <?php while ($row = mysqli_fetch_assoc($result_detalles_staking)) { ?>
                             <tr>
                                 <td><?php echo $row['cntr_number']; ?></td>
                                 <td><?php echo $row['cntr_type']; ?></td>
                                 <td><?php echo $row['vessel'] . " - " . $row['voyage']; ?></td>
                                 <<td><?php echo $row['shipper'];
                                    } ?></td>
                             </tr>
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-sm-5"></div>
                 <div class="col-sm-2">
                     <form action="../Report_Customer/stacking.php" method="post">
                         <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Reporte</button>
                     </form>
                 </div>
                 <div class="col-sm-5">

                 </div>
             </div>
             <br>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal Go to On Boar -->
 <div class="modal fade" id="onBoard" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <div class="row">
                     <div class="col-sm-11">
                         <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de cargas <strong>EMBARCADAS</strong></h5>
                     </div>
                     <div class="col-sm-1">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                 </div>
             </div>
             <div class="modal-body">
                 <table class="table table-striped table-bordered">
                     <thead style="text-align: center;">
                         <tr>
                             <th>Numero</th>
                             <th>Tipo</th>
                             <th>Destino final</th>
                             <th>Shipper</th>
                         </tr>
                     </thead>
                     <tbody style="text-align: center;">
                         <?php while ($row = mysqli_fetch_assoc($result_detalles_on_board)) { ?>
                             <tr>
                                 <td><?php echo $row['cntr_number']; ?></td>
                                 <td><?php echo $row['cntr_type']; ?></td>
                                 <td><?php echo $row['final_point']; ?></td>
                                 <td><?php echo $row['shipper'];
                                    } ?></td>
                             </tr>
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-sm-5"></div>
                 <div class="col-sm-2">
                     <form action="../Report_Customer/on_board.php" method="post">
                         <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Reporte</button>
                     </form>
                 </div>
                 <div class="col-sm-5">

                 </div>
             </div>
             <br>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal all-->
 <div class="modal fade" id="all" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <div class="row">
                     <div class="col-sm-11">
                         <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de <strong>MIS CARGAS</strong></h5>
                     </div>
                     <div class="col-sm-1">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                 </div>
             </div>
             <div class="modal-body">
                 <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
                 <table id="bootstrap-data-table" class="table table-striped table-bordered">

                     <thead style="text-align: center;">
                         <tr>
                             <th>Numero</th>
                             <th>Tipo</th>
                             <th>Shipper</th>
                             <th>Status</th>
                         </tr>
                     </thead>
                     <tbody style="text-align: center;">
                         <?php while ($row = mysqli_fetch_assoc($result_detalles_all)) { ?>
                             <tr>

                                 <td><?php echo $row['cntr_number']; ?></td>
                                 <td><?php echo $row['cntr_type']; ?></td>
                                 <td><?php echo $row['shipper']; ?></td>
                                 <td><?php echo $row['main_status'];
                                    } ?></td>
                             </tr>
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-sm-5"></div>
                 <div class="col-sm-2">
                     <form action="../Report_Customer/all.php" method="post">
                         <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Reporte</button>
                     </form>
                 </div>
                 <div class="col-sm-5">

                 </div>
             </div>
             <br>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal Assigned -->
 <div class="modal fade" id="ASIGNADA" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <div class="row">
                     <div class="col-sm-11">
                         <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle unidades <strong>ASIGNADAS</strong></h5>
                     </div>
                     <div class="col-sm-1">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                 </div>
             </div>
             <div class="modal-body">
                 <table class="table table-striped table-bordered">
                     <thead style="text-align: center;">
                         <tr>
                             <th>Numero</th>
                             <th>Tipo</th>
                             <th>Deposito de retiro</th>
                             <th>Shipper</th>
                         </tr>
                     </thead>
                     <tbody style="text-align: center;">
                         <?php while ($row = mysqli_fetch_assoc($result_detalles_asigned)) { ?>
                             <tr>
                                 <td><?php echo $row['cntr_number']; ?></td>
                                 <td><?php echo $row['cntr_type']; ?></td>
                                 <td><?php echo $row['retiro_place']; ?></td>
                                 <td><?php echo $row['shipper'];
                                    } ?></td>
                             </tr>
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-sm-5"></div>
                 <div class="col-sm-2">
                     <form action="../Report_Customer/assigned.php" method="post">
                         <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Reporte</button>
                     </form>
                 </div>
                 <div class="col-sm-5">

                 </div>
             </div>
             <br>
         </div>
     </div>
 </div>
 <!-- fin modal -->