<?php include "../config/constants.php"?>
<html>
<head>
    <title>Admin Dashboard - Login/Signup</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #21232d;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 10%;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <div class="container">
    <div class="container">
        <h2>Admin Dashboard</h2>
        <?php
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-log'])){
            echo $_SESSION['no-log'];
            unset($_SESSION['no-log']);
        }
        
        ?>

        <form id="login-form" action="" method="post">
            <div class="form-group">
                <label for="login-uname">Username:</label>
                <input type="text" id="login-uname" name="login-uname" required>
            </div>
            <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="login-password" required>
            </div>
            <input type="submit" name="submit" value="Login" class="btn-primary">
        </form>

        <?php 
    if(isset($_POST['submit'])){
        $uname = $_POST['login-uname'];
        $password = $_POST['login-password'];

        $sql = "SELECT * FROM admins WHERE admin_name='$uname'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1){
            $row = mysqli_fetch_assoc($res);
            $hashed_password = $row['admin_pass'];
            if (password_verify($password, $hashed_password)) {
                $_SESSION['login']="Logged in Successfully";
                $_SESSION['user']= $uname;
                header('location:'.siteurl.'backend/index-admin.php');
            } else {
                $_SESSION['login']="Username or Password did not match";
                header('location:'.siteurl.'backend/log.php');
            }
        }
        else{
            $_SESSION['login']="Username or Password did not match";
            header('location:'.siteurl.'backend/log.php');
        }
    }
?>


</body>
</html>

