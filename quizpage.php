<!DOCTYPE html>

<html lang="en">
<head>
	<title>Quiz</title>
	<meta charset="utf-8">
</head>

<body>

<br>
<form method="post" action="">
	
    <?php
        require('db.php');
        session_start();
        $q = $_SESSION['bs_id'];
        $query = mysqli_query($con,"SELECT * from `questions` WHERE bs_id = '$q'") or die(mysqli_error());
        global $i;
        $i = 1;
        global $ans;
        $ans = array();
        while($row = mysqli_fetch_array($query)){
            array_push($ans,$row['ans']);
    ?>
        <lable for="que<?php echo $i;?>"><?php echo (string)$i ,". ",  $row['que'];?></lable><br>
        <input type="radio" name="que<?php echo $i;?>" value="a"><?php echo $row['op_a'];?><br>
        <input type="radio" name="que<?php echo $i;?>" value="b"><?php echo $row['op_b'];?><br>
        <input type="radio" name="que<?php echo $i;?>" value="c"><?php echo $row['op_c'];?><br>
        <input type="radio" name="que<?php echo $i;?>" value="d"><?php echo $row['op_d'];?><br>
       
        <br>
    <?php
        $i++;
        }
    ?>
	<br><br>
	<input name="Submit" type="submit" value="submit">
</form>

</body>

</html>

<?php
    if(isset($_POST['Submit'])){
        $x = 1;
        $score = 0;
        while($x < $i){
            $an = $_POST['que'.$x];
            if($an == $ans[$x-1]){
                $score++;
            }
            $x++;
        }
         $_SESSION['score'] = $score;
        header("Location: welcome_s.php");
    }
?>