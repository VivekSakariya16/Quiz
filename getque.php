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
        <h1>Please choose the number of textboxes.</h1>
        <select id="subject" name="subject"> 
            <?php
                session_start(); 
                echo $_SESSION['batch_x'];
                $batch=$_SESSION['batch_x'];
                echo $batch;
                $q = "SELECT subject FROM quiz WHERE batch='$batch' ";
                $result = mysqli_query($con,$q) or die(mysqli_error());
                $rows = mysqli_num_rows($result);
                while($row = mysqli_fetch_array($result)){
                    $subject = $row['subject'];?>
                    <option value='$subject'>$subject</option>
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
        $subject=$_POST['subject'];
        $_SESSION['subject']=$subject;
        $_SESSION['batch']=$batch;
        header("location:quizpage.php");
        exit();
    }
?>  
