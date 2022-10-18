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
        echo $n;
        $flag= TRUE;
        for($i =1;$i<=$n;$i++){
            $flag = FALSE;
            if($i!=$n){
            ?>
        <input type="text" placeholder="Enter Question <?php echo $i;?>" name='q<?php echo $i;?>' require>
        <br>
        <input type="text" placeholder="Enter First Option" name='a1<?php echo $i;?>' require>
        <br>
        <input type="text" placeholder="Enter Second Option" name='a2<?php echo $i;?>' require>
        <br>
        <input type="text" placeholder="Enter Third Option" name='a3<?php echo $i;?>' require>
        <br>
        <input type="text" placeholder="Enter Fourth Option" name='a4<?php echo $i;?>' require>
        <br>
        <input type="text" placeholder="Enter Truth Option" name='ans<?php echo $i;?>' require>
        <br>
        <input type="submit" value="ADD" name='addque<?php echo $i;?>'>
        <br><br>
        <?php
            }
            else{
                ?>
        <input type="text" placeholder="Enter Question <?php echo $i;?>" name='q<?php echo $i;?>' require>
        <br>
        <input type="text" placeholder="Enter First Option" name='a1<?php echo $i;?>' require>
        <br>
        <input type="text" placeholder="Enter Second Option" name='a2<?php echo $i;?>' require>
        <br>
        <input type="text" placeholder="Enter Third Option" name='a3<?php echo $i;?>' require>
        <br>
        <input type="text" placeholder="Enter Fourth Option" name='a4<?php echo $i;?>' require>
        <br>
        <input type="text" placeholder="Enter Truth Option" name='ans<?php echo $i;?>' require>
        <br>
        <input type="submit" value="Submit" name='addque<?php echo $i;?>' require>
        
        <?php } ?> 
        
        <?php
            if(isset($_POST['addque'.$i])){
                $que = $_REQUEST['q'.$i];
                    $a1 = $_REQUEST['a1'.$i];
                    $a2 = $_REQUEST['a2'.$i];
                    $a3 = $_REQUEST['a3'.$i];
                    $a4 = $_REQUEST['a4'.$i];
                    $ans = $_REQUEST['ans'.$i];
                    $bsid = $_SESSION['bs_id1'];
                    $query = "INSERT INTO questions(que, op_a,op_b,op_c,op_d,ans,bs_id) VALUES ('$que','$a1','$a2','$a3','$a4','$ans','$bsid')";
                    $result = mysqli_query($con,$query) or die(mysqli_error());
                    if($i==$n){
                        header("location:welcome.php");
                        exit();
                    }
                    $flag = TRUE;
            }
        }
        ?> </body>

</html>