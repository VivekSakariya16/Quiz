<?php
session_start();
// if(!isset($_SESSION['s_uname'])){
//     header('location: login.php');
//     exit();
// }
// include('./validate.php');

    if(isset($_POST['quiz'])){
        $_SESSION['batch_x'] = $_SESSION['batch'];
        header("location:getque.php");
        exit();
    }
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
        <input type="submit" value="Quiz" name="quiz">
    </form>
</center>
</body>
</html>

<?php
    $res = $_SESSION['score'];
    echo '<center><h1>Your Score is: '.$res.'</h1></center>';
?>