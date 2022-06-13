
<div class="container-fluid">
    <div class="contain">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div style="text-align:center;" class="card-header">
                            <strong class="card-title">Usuarios</strong>
                        </div>
                        <div class="card-body">
                            <div class="dataTables_info" id="bootstrap-data-table_info" role="status"
                                aria-live="polite"></div>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered"
                                style="width: 100%;">
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
                                                <a href="#"><img class="rounded-circle" src="<?php echo $photo; ?>"
                                                        alt=""></a>
                                            </div>
                                        </td>
                                        <td><?php echo $username; ?></td>
                                        <td><span class="name"><?php echo $email; ?></span> </td>
                                        <td><span class="product"><?php echo $celular; ?></span> </td>
                                        <td><span class="product"><?php echo $empresa; ?></span> </td>
                                        <td><?php echo $permiso; ?></td>
                                        <td style="text-align:center;">
                                            <a title="Editar" data-toggle="modal"
                                                data-target="#editar<?php echo $id; ?>"
                                                style="color: #17A589; padding:2%; ">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a title="Ver" data-toggle="modal" data-target="#ver<?php echo $id; ?>"
                                                style="color: #17A589; padding:2%; ">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a title="Eliminar"
                                                href="../includes/delete_usuario.php?id=<?php echo $id; ?>"
                                                style="color: #17A589; padding:2%; ">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editar<?php echo $id; ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 style="text-align:center;" class="modal-title"
                                                        id="scrollmodalLabel">Editar Usuario:
                                                        <strong><?php echo $username; ?></strong>
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../formularios/edit_usuario.php?id=<?php echo $id; ?>"
                                                        method="post" class="form-horizontal">
                                                        <div class="row form-group">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i
                                                                            class="fa fa-user"></i></div>
                                                                    <input type="text" id="username" name="username"
                                                                        value="<?php echo $username; ?>"
                                                                        class="form-control" require>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i
                                                                            class="fa  fa-envelope"></i></div>
                                                                    <input type="mail" id="email" name="email"
                                                                        value="<?php echo $email; ?>"
                                                                        class="form-control" require>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i
                                                                            class="fa fa-phone"></i></div>
                                                                    <input type="phone" id="celular" name="celular"
                                                                        value="<?php echo $celular; ?>"
                                                                        class="form-control" require>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i
                                                                            class="fa fa-users"></i></div>
                                                                    <select name="empresa[]" id="selectSm"
                                                                        class="form-control-sm form-control">
                                                                        <option value="<?php echo $empresa; ?>">
                                                                            <?php echo $empresa; ?></option>
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
                                                                    <div class="input-group-addon"><i
                                                                            class="fa fa-key"></i></div>
                                                                    <select name="permiso[]" id="selectSm"
                                                                        class="form-control-sm form-control">
                                                                        <option value="<?php echo $permiso; ?>">
                                                                            <?php echo $permiso; ?></option>
                                                                        <option value="Master">Master</option>
                                                                        <option value="Traffic">Traffic</option>
                                                                        <option value="Provider">Provider
                                                                        </option>
                                                                        <option value="Customer">Customer
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-5"></div>
                                                            <div class="col col-md-2">
                                                                <button type="submit" class="btn btn-info"
                                                                    name="editar_user" id="editar_in">Editar</button>
                                                            </div>

                                                            <div class="col col-md-5"></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="ver<?php echo $id; ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 style="text-align:center;" class="modal-title"
                                                        id="scrollmodalLabel">Editar Usuario:
                                                        <strong><?php echo $username; ?></strong>
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-10">
                                                            <aside class="profile-nav alt">
                                                                <section class="card">
                                                                    <div
                                                                        class="card-header user-header alt bg-dark p-5">
                                                                        <div class="media">
                                                                            <a href="#">
                                                                                <img class="align-self-center rounded-circle mr-3"
                                                                                    style="width:100px; height:100px;"
                                                                                    alt="" src="../images/admin.jpg">
                                                                            </a>
                                                                            <br>
                                                                            <div class="media-body">
                                                                                <h2 class="text-light display-6">
                                                                                    <?php echo $name . " " . $last_name ?>
                                                                                </h2>
                                                                                <p style="margin:0;">
                                                                                    <?php echo $username; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <ul style="text-align: center;"
                                                                        class="list-group list-group-flush">
                                                                        <li class="list-group-item">
                                                                            <p>Empresa: <?php echo $empresa; ?>
                                                                            </p>
                                                                            <p>E-mail: <?php echo $email; ?></p>
                                                                            <p>Mobile: <?php echo $celular; ?>
                                                                            </p>
                                                                            <p>Permiso: <?php echo $permiso; ?>
                                                                            </p>
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
                                <?php }   ?>
                                </tbody>
                            </table>
                        </div>
                        <form action="../Reporte_super_user/report_usuarios.php" method="POST">
                            <div class="row">
                                <div class="col-sm-5"></div>
                                <div class="col-sm-2">
                                    <button type="submit" id="export_data" name="export_data" value="Export to excel"
                                        class="btn btn-primary">Descargar
                                        Listado</button>
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