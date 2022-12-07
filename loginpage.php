<?php
require 'connect1.php';
if(isset($_POST["submit"]))
{
    $usernameemail=$_POST["usernameemail"];
    $password=$_POST["password"];
    $result=mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$usernameemail' OR email='$usernameemail'");
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0)
        {
            if($password==$row["password"])
            {
                $_SESSION["login"]=true;
                $_SESSION["id"]=$row["id"];
                header("Location: login.php");
            }
            else
            {
                echo
                "<script> alert('wrong password');</script>";
            }
        }
    else
    {
        echo
        "<script>alert('User not registered');</script>";
    }
}
?>
<!DOCTYPE html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login Form</h1>
    <form action="" method="POST">
    <label for="usernameemail">Username or Email :</label>
    <input type="text" name="usernameemail" id="usernameemail" required><br>
    <label for="password">Password</label>
    <input type="text" name="password" id="password" required><br>
    <button type="submit" name="submit" id="submit">login</button>
<a href="index1.php">Register</a>
</form>
</body>
</html>
