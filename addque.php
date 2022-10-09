<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD Question Page</title>
</head>
<body>
    <form name="f1" action="" method="post">
        <?php
        require('db.php');
        session_start();
        $n = $_SESSION['totalQ'];
        $flag= 1;
        $i = 1;
        while($i <= $n && $flag == 1){
            $flag = 0;
            ?>
        <input type="text" placeholder="Enter Question <?php echo $i;?>" name='q' require>
        <br>
        <input type="text" placeholder="Enter First Option" name='a1' require>
        <br>
        <input type="text" placeholder="Enter Second Option" name='a2' require>
        <br>
        <input type="text" placeholder="Enter Third Option" name='a3' require>
        <br>
        <input type="text" placeholder="Enter Fourth Option" name='a4' require>
        <br>
        <input type="text" placeholder="Enter Truth Option" name='ans' require>
        <br>
        <input type="submit" value="ADD" name='addque'>
        <br><br>
        <?php 
        if(isset($_POST['addque'])&&$flag==0){
            $que = $_REQUEST['q'];
            $a1 = $_REQUEST['a1'];
            $a2 = $_REQUEST['a2'];
            $a3 = $_REQUEST['a3'];
            $a4 = $_REQUEST['a4'];
            $ans = $_REQUEST['ans'];
            $bsid = $_SESSION['bs_id1'];
            $query = "INSERT INTO questions(que, op_a,op_b,op_c,op_d,ans,bs_id) VALUES ('$que','$a1','$a2','$a3','$a4','$ans','$bsid')";
            $result = mysqli_query($con,$query) or die(mysqli_error());
            $flag = 1;
            $i++;
        }
        }
        ?>
</body>
</html>
<?php
    require('db.php');
    if(isset($_POST['addque'])){
        $que = $_REQUEST['q'];
        $a1 = $_REQUEST['a1'];
        $a2 = $_REQUEST['a2'];
        $a3 = $_REQUEST['a3'];
        $a4 = $_REQUEST['a4'];
        $ans = $_REQUEST['ans'];
        $bsid = $_SESSION['bs_id1'];
        $query = "INSERT INTO questions(que, op_a,op_b,op_c,op_d,ans,bs_id) VALUES ('$que','$a1','$a2','$a3','$a4','$ans','$bsid')";
        $result = mysqli_query($con,$query) or die(mysqli_error());
        if($result){
            echo "Question Added";
            // header("location:welcome.php");
            exit();
        }else{
            echo "Question Not Added";
        }
    }
?>
