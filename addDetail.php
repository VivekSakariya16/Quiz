<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD Question Page</title>
</head>
<body>
    <center>
    <form name="f1" action="" method="post">
        <input type="text" placeholder="Enter Batch-Subject ID" name='bsid' require>
        <br>
        <br>
        <input type="text" placeholder="Enter Batch" name='b' require>
        <br>
        <br>
        <input type="text" placeholder="Enter Subject" name='s' require>
        <br>
        <br>
        <input type="text" placeholder="Enter Total Questions" name='tq' require>
        <br>
        <br>
        <input type="submit" value="ADD" name='addDetail'>
</center>
</body>
</html>
<?php
    require('db.php');
    session_start();
    if(isset($_POST['addDetail'])){
        $bsid = $_REQUEST['bsid'];
        $batch = $_REQUEST['b'];
        $subject = $_REQUEST['s'];
        $totalQ = $_REQUEST['tq'];
        $adminID = $_SESSION['adminid'];
        $query = "INSERT INTO quiz(bs_id,batch,subject,total_que,admin_id) VALUES ('$bsid','$batch','$subject','$totalQ','$adminID')";
        $result = mysqli_query($con,$query) or die(mysqli_error());
        if($result){
            echo "Quiz Added";
            $_SESSION['totalQ'] = $totalQ;
            $_SESSION['bs_id1'] = $bsid;
            header("location:addque.php");
            exit();
        }else{
            echo "Question Not Added";
        }
    }
?>
