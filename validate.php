<?php
// session_start();

if(!$_SESSION['username']){
    session_destroy();
    header("location:login.php");
    exit();
}
?>