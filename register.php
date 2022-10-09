<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title> 
</head>

<?php
require('db.php');  
session_start();

if (isset($_REQUEST['register'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $name = $_REQUEST['name'];
    
    $query = "INSERT INTO admin (username, password,name) VALUES ('$username', '$password','$name')";
    $query_check_username = "SELECT * FROM admin WHERE username='$username'";
    $result_check_username = mysqli_query($con, $query_check_username) or die(mysqli_error($con));
    $rows_check_username = mysqli_num_rows($result_check_username);

    if ($rows_check_username > 0) {
    echo '<center>
            <p> username already exists
                <br />
                <br />
                <a href="./register.php">
                    register again
                </a>
            </p>
        <center>';
    } 
    else {
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        if ($result) {
            $_SESSION['username']=$username;
            $q = "SELECT admin_id FROM `admin` WHERE username='$username' and password='$password'";
            $r = mysqli_query($con,$q) or die(mysqli_error());
            $row = mysqli_fetch_array($r);
            $_SESSION['aid']=$row['admin_id'];
            header("location:welcome.php");
            exit();
        } 
        else {
            echo '<center>
                    <p> registration failed
                        <br />
                        <br />
                        <a href="./register.php">
                            register again
                        </a>
                    </p>
                <center>';
        }
    }
}
?>

<body>
    <center>
        <br />
        <form action="" method="post" name="register">
            <input type="text" id="name" name="name" placeholder="Name" required/>
            <br />
            <br />
            <input type="text" id="username" name="username" placeholder="Username or Roll No." required/>
            <br />
            <br />
            <input type="password" id="password" name="password" placeholder="Password" required/>
            <br />
            <br />
            <input type="submit" id="register" name="register" value="Sign Up" />
            <br />
            <br />
            <p>Already have an account? <a href="./login.php">Log in</a></p>
            <p>Want to restister as student? <a href="./register_s.php">Resister</a></p>
        </form>
    </center>
</body>
</html> 

<?php

?>