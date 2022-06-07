<?php

include('../db.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];
if ($permiso = 'Master') { ?>
    <!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js" lang="">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BOT.zero :: Plataforma de Carga</title>
        <meta name="description" content="Plataforma de Carga">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@400;600;800&display=swap" rel="stylesheet">

        <link rel="icon" type="image/png" href="../images/LogocolorAzul.png" sizes="16x16">

        <link rel="apple-touch-icon" href="../images/LogocolorAzul.png" sizes="16x16">
        <link rel="shortcut icon" href="../images/LogocolorAzul.png" sizes="16x16">
        <script src="https://maps.googleapis.com/maps/api/js"></script>

        <link rel="stylesheet" href="../dist/notiflix-2.3.1.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
        <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

        <style>
            #weatherWidget .currentDesc {
                color: #ffffff !important;
            }

            .traffic-chart {
                min-height: 335px;
            }

            #flotPie1 {
                height: 150px;
            }

            #flotPie1 td {
                padding: 3px;
            }

            #flotPie1 table {
                top: 20px !important;
                right: -10px !important;
            }

            .chart-container {
                display: table;
                min-width: 270px;
                text-align: left;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            #flotLine5 {
                height: 105px;
            }

            #flotBarChart {
                height: 150px;
            }

            #cellPaiChart {
                height: 160px;
            }
        </style>
    </head>

    <body class="body" style="padding: 0px !important;">

        <?php include("../includes/super_user/pannel_left_super_user.php") ?>

        <?php include('../fijos/Pannel_right_header.php'); ?>
        <br>
        <div class="container-fluid">
            <div class="contain" style="background: linear-gradient(to left, #17A589, #2E303E );">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div style="text-align:center;" class="card-header">
                                    <strong class="card-title">Usuarios</strong>
                                </div>
                                <div class="card-body">
                                    <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th class="avatar">Photo</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Celular</th>
                                                <th>Empresa</th>
                                                <th>Permiso</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $empresa = $_SESSION['company'];
                                            $query = "SELECT * FROM `users`";
                                            $result_tasks = mysqli_query($conn, $query);

                                            while ($row = mysqli_fetch_assoc($result_tasks)) {

                                                $id = $row['id'];
                                                $username = $row['username'];
                                                $photo = $row['photo'];
                                                $email = $row['email'];
                                                $celular = $row['celular'];
                                                $name = $row['name'];
                                                $last_name = $row['last_name'];
                                                $empresa = $row['empresa'];
                                                $permiso = $row['permiso'];
                                            ?>
                                                <tr>
                                                    <td class="serial"><?php echo $id; ?></td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <a href="#"><img class="rounded-circle" src="<?php echo $photo; ?>" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $username; ?></td>
                                                    <td><span class="name"><?php echo $email; ?></span> </td>
                                                    <td><span class="product"><?php echo $celular; ?></span> </td>
                                                    <td><span class="product"><?php echo $empresa; ?></span> </td>
                                                    <td><?php echo $permiso; ?></td>
                                                    <td style="text-align:center;">
                                                        <a title="Editar" data-toggle="modal" data-target="#editar<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a title="Ver" data-toggle="modal" data-target="#ver<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a title="Eliminar" href="../includes/delete_usuario.php?id=<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="editar<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar Usuario: <strong><?php echo $username; ?></strong></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="../formularios/edit_usuario.php?id=<?php echo $id; ?>" method="post" class="form-horizontal">
                                                                    <div class="row form-group">
                                                                        <div class="col-sm-3"></div>
                                                                        <div class="col col-md-6">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                                <input type="text" id="username" name="username" value="<?php echo $username; ?>" class="form-control" require>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3"></div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-sm-3"></div>
                                                                        <div class="col col-md-6">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon"><i class="fa  fa-envelope"></i></div>
                                                                                <input type="mail" id="email" name="email" value="<?php echo $email; ?>" class="form-control" require>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3"></div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-sm-3"></div>
                                                                        <div class="col col-md-6">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                                                <input type="phone" id="celular" name="celular" value="<?php echo $celular; ?>" class="form-control" require>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3"></div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-sm-3"></div>
                                                                        <div class="col col-md-6">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                                                <select name="empresa[]" id="selectSm" class="form-control-sm form-control">
                                                                                    <option value="<?php echo $empresa; ?>"><?php echo $empresa; ?></option>
                                                                                    <?php


                                                                                    $query_empresa = $conn->query("SELECT * FROM `empresas`");
                                                                                    while ($empresa = mysqli_fetch_array($query_empresa)) {
                                                                                        echo '<option value="' . $empresa['razon_social'] . '">' . $empresa['razon_social'] . '</option>';
                                                                                    }
                                                                                    ?>
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3"></div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-sm-3"></div>
                                                                        <div class="col col-md-6">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                                                <select name="permiso[]" id="selectSm" class="form-control-sm form-control">
                                                                                    <option value="<?php echo $permiso; ?>"><?php echo $permiso; ?></option>
                                                                                    <option value="Master">Master</option>
                                                                                    <option value="Traffic">Traffic</option>
                                                                                    <option value="Provider">Provider</option>
                                                                                    <option value="Customer">Customer</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3"></div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col col-md-5"></div>
                                                                        <div class="col col-md-2">
                                                                            <button type="submit" class="btn btn-info" name="editar_user" id="editar_in">Editar</button>
                                                                        </div>

                                                                        <div class="col col-md-5"></div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="ver<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar Usuario: <strong><?php echo $username; ?></strong></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-1"></div>
                                                                    <div class="col-md-10">
                                                                        <aside class="profile-nav alt">
                                                                            <section class="card">
                                                                                <div class="card-header user-header alt bg-dark p-5">
                                                                                    <div class="media">
                                                                                        <a href="#">
                                                                                            <img class="align-self-center rounded-circle mr-3" style="width:100px; height:100px;" alt="" src="../images/admin.jpg">
                                                                                        </a>
                                                                                        <br>
                                                                                        <div class="media-body">
                                                                                            <h2 class="text-light display-6"><?php echo $name . " " . $last_name ?></h2>
                                                                                            <p style="margin:0;"><?php echo $username; ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <ul style="text-align: center;" class="list-group list-group-flush">
                                                                                    <li class="list-group-item">
                                                                                        <p>Empresa: <?php echo $empresa; ?></p>
                                                                                        <p>E-mail: <?php echo $email; ?></p>
                                                                                        <p>Mobile: <?php echo $celular; ?></p>
                                                                                        <p>Permiso: <?php echo $permiso; ?></p>
                                                                                    </li>
                                                                                </ul>
                                                                            </section>
                                                                        </aside>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </tbody>
                                    <?php }   ?>
                                    </table>
                                </div>
                                <form action="../Reporte_super_user/report_usuarios.php" method="POST">
                                    <div class="row">
                                        <div class="col-sm-5"></div>
                                        <div class="col-sm-2">
                                            <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button>
                                        </div>
                                        <div class="col-sm-5"></div>
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="site-footer">
                <div class="footer-inner" style="background: linear-gradient(to left, #17A589, #2E303E );">
                    <div class="row">
                        <div style="padding-top:5%;" class="col-sm-6">
                            Copyright &copy; 2018 Ela Admin
                        </div>
                        <div style="padding-top:5%;" class="col-sm-6 text-right">
                            Designed by <a href="https://colorlib.com">Colorlib</a>
                        </div>
                    </div>
                </div>
            </footer>

        </div><!-- /#right-panel -->


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="../assets/js/lib/data-table/datatables.min.js"></script>
        <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
        <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
        <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
        <script src="../assets/js/lib/data-table/jszip.min.js"></script>
        <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
        <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
        <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
        <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
        <script src="../assets/js/init/datatables-init.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#bootstrap-data-table-export').DataTable();
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <!--  Chart js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

        <!--Chartist Chart-->
        <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
        <script src="../assets/js/init/weather-init.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
        <script src="../assets/js/init/fullcalendar-init.js"></script>
    <?php } ?>



    </body>

    </html>