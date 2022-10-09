<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <center>
    <br />
    <form name="f1" action="" method="post">
        <lable for="rolex">Select Role</lable><br>
        <select id="role" name="role" require>         
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select>
        <br/>
        <br/>
      
        <input type="text" placeholder="Enter Username or Roll No." name='x1' require>
        <br />
        <br />
        <input type="password" placeholder="Enter Password" name='y1' require>
        <br />
        <br />
        <input type="submit" value="Log in" name='login'>
        <br />
        <br />
        <p>Don't have an account? <a href="./register.php">Sign Up</a></p>
    </form>
    </center>
</body>
</html>
<?php
    require('db.php');
    session_start();
    if(isset($_POST['login'])){
        $role=$_POST['role'];
        $username = $_REQUEST['x1'];
        $password = $_REQUEST['y1'];

        if($role == 'admin'){
            $query = "SELECT * FROM `admin` WHERE username='$username' and password='$password'";
            $result = mysqli_query($con,$query) or die(mysqli_error());
            $rows = mysqli_num_rows($result);
            
            $q = "SELECT admin_id FROM `admin` WHERE username='$username' and password='$password'";
            $r = mysqli_query($con,$q) or die(mysqli_error());
            $row = mysqli_fetch_array($r);
            $admin_id = $row['admin_id'];

            if($rows==1||$row==1){
                $_SESSION['username'] = $username;
                $_SESSION['aid'] = $admin_id;
                header("Location: welcome.php");
            }
            else{
                echo "username or password is incorrect";
            }
        }
        else{
            $query = "SELECT * FROM `student` WHERE s_uname='$username' and s_pass='$password'";
            $result = mysqli_query($con,$query) or die(mysqli_error());
            $rows = mysqli_num_rows($result);
            
            $q = "SELECT batch FROM `student` WHERE s_uname='$username' and s_pass='$password'";
            $r = mysqli_query($con,$q) or die(mysqli_error());
            $row = mysqli_fetch_array($r);
            $batch = $row['batch'];

            echo $batch;

            if($rows==1){
                $_SESSION['username'] = $username;
                $_SESSION['batch'] = $batch;
                header("Location: welcome_s.php");
            }
            else{
                echo "username or password is incorrect";
            }
        }    
    }
?>  
