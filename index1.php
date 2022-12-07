<?php
require 'connect1.php';
if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $confirmpassword=$_POST["confirmpassword"];
    $duplicate=mysqli_query($conn,"SELECT * FROM tb_user WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo
        "<script>alert('username or email is already taken');</script>";
    }
    else
    {
        if($password==$confirmpassword)
        {
            $query=mysqli_query($conn,"INSERT INTO tb_user VALUES('','$name','$username','$email','$password')");
          
            echo
            "<script>alert('Registration successfull');</script>";
        }
        else
        {
            echo
            "<script>alert('password doesnt match');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Registrationform</title>
    </head>
    <body>
        <h1>REGISTRATION FORM</h1>
        <form action='' method='POST'>
            <label for="name">Name :</label>
            <input type='text' name="name" id="name" required><br>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required><br>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" required><br>
            <label for="password">Password</label>
            <input type="text" name="password" id="password" required><br>
            <label for="cofirmpassword">Confirm password :</label>
            <input type="text" name="confirmpassword" id="confirmpassword" required><br>
            <button type="submit" name="submit" id="submit">Register</button>
            <br><a href="loginpage.php">Login</a>
        </form>
        </body>
        </html>