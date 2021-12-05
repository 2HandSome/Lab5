<?php
session_start();
require_once "connection.php";
if(isset($_POST['do_login']))
{
    global $mysqli;
    connectDB ();
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password = md5($password);
    $result = $mysqli -> query("SELECT * FROM users WHERE username='$username' AND password='$password'");
    closeDB ();
    if(mysqli_num_rows($result) == 1) {
          $_SESSION['username'] = $username;
          echo "success";
    }
    else
    {
        echo "fail";
    }
    exit();
}
?>