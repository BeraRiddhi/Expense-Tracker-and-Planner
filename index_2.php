<?php

session_start();
include('dbconn.php');

if(isset($_POST['login']))
{
    $uid = $_POST['username'];
    $password = $_POST['password'];

    if($uid=="" || $password=="")
    {
        echo "<script>alert('Please fill all the credentials');</script>";
    }
    else
    {
    $query = mysqli_query($conn,"SELECT username from users where username='$uid' and password='$password' ;");

    $result=mysqli_fetch_array($query);
    if($result>0)
    {
        $_SESSION['uid']=$result['username'];
        header('location:dashboard.php');
    }
    else
    {
        echo "<script>alert('Wrong Username or Password');</script>";
    }
    }

}


?>
<html>
    <head>
    <link rel="stylesheet" href="style_pro2.css">
        
    </head>
    <body style="background-image: url('images/work.jpg');
                background-size: 1560px 1000px;
                background-repeat: no-repeat;">
        <center>
            <h2>Expense Tracker And Planner</h2>
            <div class="form1">
        <form action="" method="POST" >
            <h1>Username</h1>
            <input type="text" name="username"><br>
            <h1>Password</h1>
            <input type="password" name="password"><br><br>
            <button class="button1" type="submit" name="login">Login</button><br><br>




        </form>
        <a href="register_2.php"><button class="button1">Register</button></a>
            </div>
        </center>
    </body>
</html>
