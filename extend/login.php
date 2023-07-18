<?php include "../config/constants.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/regstyle.css">
</head>
<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form action="" autocomplete="off" method="post" class="sign-in-form">
                        
                     <div class="logo"><h1>Adventure Pokhara</h1></div>
    
                        <div class="heading">
                            <h2>Welcome Back</h2>
                            <h6><?php 
                            if(isset($_SESSION['ulogin'])){
                              echo $_SESSION['ulogin'];
                              unset($_SESSION['ulogin']);
                            }
                            if(isset($_SESSION['no-login'])){
                              echo $_SESSION['no-login'];
                              unset($_SESSION['no-login']);
                            }
                            ?></h6>
                            <h6>Not Registered Yet?</h6>
                            <a href="signup.html" class="toggle">signup</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input 
                                type="email"
                                minlength="4"
                                class="input-field"
                                autocomplete="off"
                                name="mail"
                                id="mail"
                                required
                                />
                                <label>Email</label>
                            </div>

                        <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="pass"
                    id="pass"
                    required
                  />
                  <label>Password</label>
                </div>

                <input type="submit" name="submit" value="Sign In" class="sign-btn" />

                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>
                       
         
            
            
  
                  
            </div>
  
            <div class="carousel">
              <div class="images-wrapper">
                <img src="./image/one.jfif" class="image image-one show" alt="" />
                <img src="./image/two.jfif" class="image image-two" alt="" />
                <img src="./image/three.jfif" class="image image-three" alt="" />
              </div>
  
              <div class="text-slider">
                <div class="text-wrap">
                  <div class="text-group">
                    <h2>Create your own courses</h2>
                    <h2>Customize as you like</h2>
                    <h2>Invite students to your class</h2>
                  </div>
                </div>
  
                <div class="bullets">
                  <span class="active" data-value="1"></span>
                  <span data-value="2"></span>
                  <span data-value="3"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <?php 
    if(isset($_POST['submit'])){
        $mail = $_POST['mail'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM users WHERE email='$mail' AND password='$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1){
            $_SESSION['ulogin']="Logged in Sucessfully";
            $_SESSION['umail']= $mail;
            header('location:'.siteurl.'index.php');

        }
        else{
            $_SESSION['ulogin']="Username or Password didnot match";
            header('location:'.siteurl.'extend/login.php');

        }
        
    }
?>
<?php include "appscript.php"?>
</body>
  </html>
