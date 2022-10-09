<?php
    $servername = "127.0.0.1:3306";
    $username = "root";
    $password="";
    $dbname="my_db";

    $con = mysqli_connect($servername,$username,$password,$dbname);
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    }
?>

