
<?php include('../db.php'); ?>

<?php include('../fijos/headerdirect.php'); ?>

<?php include("../includes/user_basic/pannel_left_user_basic.php") ?>

<?php include('../fijos/Pannel_right_header.php'); ?>

<?php

    $user = $_SESSION['user'];

    $query = "SELECT * FROM users WHERE username = '$user'";
    $result =  mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

            $user = $row['username'];
            $name = $row['name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $celular = $row['celular'];

    }
?>

<br>
<div class="row" style="margin-top: 10%; margin-bottom: 10%">
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
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
                                            <p style="margin:0;"><?php echo $user; ?></p>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="container">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                       
                                        <p>E-mail: <?php echo $email; ?></p>
                                        <p>Mobile: <?php echo $celular; ?></p>
                                    </li>
                                </ul>
                                <br>
                                <div class="row" style="text-align: center;">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3">
                                    <button class="btn btn-outline-primary">
                                        Editar Datos
                                    </button>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-outline-primary">
                                        Ed. Empresa
                                    </button>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-outline-primary">
                                        Cambiar pass
                                    </button>
                                </div>
                                <div class="col-sm-2"></div>
                                </div>
                                <br>
                            </section>
                        </aside>
                    </div>
                    <div class="col-md-2"></div>
                </div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include('../fijos/footerdirect.php');?>

            