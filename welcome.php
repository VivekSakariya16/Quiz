<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
    exit();
}
include('./validate.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>
<body>
    <center><br/>
    <h1>Welcome to our portal</h1>
    <form name = "form" action="" method="post">
        <input type="button" value="Logout" onclick="window.location.href='logout.php'">
        <input type="submit" value="ADD Subject & Batch" name="sb">
    </form>

</center>
</body>
</html>

<?php
    if(isset($_POST['sb'])){
        $_SESSION['adminid'] = $_SESSION['aid'];
        header("location:addDetail.php");
        exit();
    }
?>