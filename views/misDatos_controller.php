
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