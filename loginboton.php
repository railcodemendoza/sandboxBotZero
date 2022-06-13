<?php 
include("db.php");

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

$username = '';
$email = '' ;
$error = '';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $pass =md5($_POST['pass']);
        
    $query = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_row($result);
        echo $row[10]; 
        
        if($row[10] == 'Traffic'){
            $_SESSION['id'] = $row['0'];
            $_SESSION['user'] = $username;
            $_SESSION['company'] = $row[9];
            $_SESSION['permiso'] = $row[10];
            $_SESSION['message'] = 'Bienvenido '. $username ;
            $_SESSION['message_type'] = 'primary';
            header('location:views/view_traffic.php');

        }elseif($row[10] == 'Customer'){
            $_SESSION['id'] = $row['0'];
            $_SESSION['user'] = $username;
            $_SESSION['company'] = $row[9];
            $_SESSION['permiso'] = $row[10];
            $_SESSION['message'] = 'Bienvenido '. $username ;
            $_SESSION['message_type'] = 'primary';
            header('location:views/view_customer.php');
        }elseif($row[10] == 'Master'){
            $_SESSION['id'] = $row['0'];
            $_SESSION['user'] = $username;
            $_SESSION['company'] = $row[9];
            $_SESSION['permiso'] = $row[10];
            $_SESSION['message'] = 'Bienvenido '. $username ;
            $_SESSION['message_type'] = 'primary';
            header('location:views/view_super_user.php');
        }elseif($row[10] == 'Provider'){
            $_SESSION['id'] = $row['0'];
            $_SESSION['user'] = $username;
            $_SESSION['company'] = $row[9];
            $_SESSION['permiso'] = $row[10];
            $_SESSION['message'] = 'Bienvenido '. $username ;
            $_SESSION['message_type'] = 'primary';
            header('location:views/view_provider.php');
        }
        else{
            $_SESSION['id'] = $row['0'];
            $_SESSION['user'] = $username;
            $_SESSION['company'] = $row[9];
            $_SESSION['permiso'] = $row[10];
            $_SESSION['message'] = 'Bienvenido '. $username ;
            $_SESSION['message_type'] = 'primary';
            header('location:views/view_no_registrados.php');
        }
    }else{
        $_SESSION['message'] = 'Algo anduvo mal. Revise sus credenciales.';
        $_SESSION['message_type'] = 'danger';
        header('location:index.php');
        }
    
        if(!$result) {
        die("Query Failed.");}
    }

   
?>