<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Page</title>
</head>
<body>
    <center>
    <form name="f1" action="" method="post">
        <select id="subject" name="subject"> 
            <?php
                require('db.php');
                session_start(); 
                $batch=$_SESSION['batch_x'];
                $q = "SELECT bs_id, subject FROM `quiz` WHERE batch='$batch' ";
                $result = mysqli_query($con,$q) or die(mysqli_error());
                $rows = mysqli_num_rows($result);
                while($row = mysqli_fetch_array($result)){
                    $subject = $row['subject'];
                    $bs_id = $row['bs_id'];?>
                    <option value='<?php echo $bs_id ?>'><?php echo $subject, " - " ,$bs_id ?></option>
                    <?php
                }
            ?>
        </select>
        <br>
        <br>
        <input type="submit" value="GO" name='go'>
        </form>
    </center>
</body>
</html>
<?php
    if(isset($_POST['go'])){
        $quiz=$_POST['subject'];
        $_SESSION['bs_id']= $quiz;
        $_SESSION['batch']= $batch;
        header("location:quizpage.php");
        exit();
    }
?>  
