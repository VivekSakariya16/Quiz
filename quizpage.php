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
        $i = 1;
        while($row = mysqli_fetch_array($query)){
    ?>
        <lable for="que<?php echo $i;?>"><?php echo (string)$i ,". ",  $row['que'];?></lable><br>
        <input type="radio" name="que<?php echo $i;?>" value="a"><?php echo $row['op_a'];?><br>
        <input type="radio" name="que<?php echo $i;?>" value="b"><?php echo $row['op_b'];?><br>
        <input type="radio" name="que<?php echo $i;?>" value="c"><?php echo $row['op_c'];?><br>
        <input type="radio" name="que<?php echo $i;?>" value="d"><?php echo $row['op_d'];?><br>
        <?php $i++; ?>
        <br>
    <?php
        }
    ?>
	<br><br>
	<input name="Submit" type="submit" value="submit">
</form>


</body>

</html>