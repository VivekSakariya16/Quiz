<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page for Student</title> 
</head>

<?php
require('db.php');  
session_start();

if (isset($_REQUEST['register_s'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $roll_no = $_REQUEST['rollno'];
    $batch = $_REQUEST['batch'];
    $s_name = $_REQUEST['name'];

        $query = "INSERT INTO student (s_uname, s_pass, roll_no, batch ,s_name) VALUES ('$username', '$password', '$roll_no', '$batch','$s_name')";
        $query_check_username = "SELECT * FROM student WHERE s_uname='$username'";
        $result_check_username = mysqli_query($con, $query_check_username) or die(mysqli_error($con));
        $rows_check_username = mysqli_num_rows($result_check_username);

        if ($rows_check_username > 0) {
        echo '<center>
                <p> username already exists
                    <br />
                    <br />
                    <a href="./register.php">
                        register again
                    </a>
                </p>
            <center>';
        echo '<script>alert("user already exists")</script>';
        } 
        else {
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            if ($result) {
                $_SESSION['s_uname']=$username;
                $_SESSION['batch']=$batch;
                header("location:welcome_s.php");
                exit();  
            } else {
                echo '<center>
                        <p> registration failed
                            <br />
                            <br />
                            <a href="./register.php">
                                register again
                            </a>
                        </p>
                    <center>';
                echo '<script>alert("registration failed")</script>';
            }
        }
}
?>

<body>
    <center>
        <br />
        <form action="" method="post" name="register_s">
            <input type="text" id="name" name="name" placeholder="Name" required/>
            <br/>
            <br/>
            <input type="text" id="rollno" name="rollno" placeholder="Roll No." required/>
            <br />
            <br />
            <input type="text" id="batch" name="batch" placeholder="Batch" required/>
            <br />
            <br />
            <input type="text" id="username" name="username" placeholder="Username" required/>
            <br />
            <br />
            <input type="password" id="password" name="password" placeholder="Password" required/>
            <br />
            <br />
            <input type="submit" id="register_s" name="register_s" value="Sign Up" />
            <br />
            <br />
            <p>Already have an account? <a href="./login.php">Log in</a></p>
            <p>Want to register as a admin? <a href="./register.php">Register</a></p>
        </form>
    </center>
</body>
</html>
