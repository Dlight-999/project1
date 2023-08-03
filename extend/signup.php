<?php include "../config/constants.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in and signup form</title>
    <link rel="stylesheet" href="../style/regstyle.css">
</head>
<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
             <form action="" autocomplete="off" onsubmit="validateForm(event)" method="post" class="sign-up-form">
                
  
                <div class="heading">
                  <h2>Get Started</h2>
                  <h6>Already have an account?</h6>
                  <a href="./login.php" class="toggle">Sign in</a><br>
                  <h6>
                    <?php
                      if(isset($_SESSION['created'])){
                        echo $_SESSION['created'];
                        unset($_SESSION['created']);
                      }
                      if(isset($_SESSION['failed'])){
                        echo $_SESSION['failed'];
                        unset($_SESSION['failed']);
                      }
                      
                    ?>
                  </h6>

                </div>
                <div class="actual-form">
                  <div class="input-wrap">
                    <input
                      type="text"
                      minlength="4"
                      class="input-field"
                      autocomplete="off"
                      name="uname"
                      id="uname"
                      required
                    />
                    <label>Name</label>
                  </div>
                  
                  <div class="input-wrap">
                    <input
                      type="email"
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
                      type="number"
                      class="input-field"
                      autocomplete="off"
                      name="phone"
                      id="phone"
                      required
                    />
                    <label>Phone No.</label>
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
                  <div class="input-wrap">
                    <input
                      type="password"
                      minlength="4"
                      class="input-field"
                      autocomplete="off"
                      name="cpass"
                      id="cpass"
                      required
                    />
                    <label>Confirm Password</label>
                  </div>
  
                  <input type="submit" value="Sign Up" name="submit" class="sign-btn" />
            
                  <p class="text">
                    By signing up, I agree to the
                    <a href="#">Terms of Services</a> and
                    <a href="#">Privacy Policy</a>
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
                    <h2>Signup To Adventure Pokhara</h2>
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
    if (isset($_POST['submit'])) {
        $uname = $_POST['uname'];
        $mail = $_POST['mail'];
        $phone = $_POST['phone'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];

        // Check if password and confirm password match
        if ($pass == $cpass) {
            // Hash the password
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

            // INSERT IN SQL
            $sql = "INSERT INTO users SET 
            username = '$uname',
            email = '$mail',
            phone = '$phone',
            password = '$hashedPass'";

            // db conn
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if ($res == TRUE) {
                $_SESSION['created'] = "User Created";
                header("location:" . siteurl . 'extend/login.php');
            } else {
                $_SESSION['created'] = "Try Again";
                header("location:" . siteurl . 'extend/signup.php');
            }
        } else {
            $_SESSION['failed'] = "Password and confirm password do not match";
            header("location:" . siteurl . 'extend/signup.php');
        }
    }
    ?>
  
    <?php include "appscript.php"?>
    <script src="validation.js"></script>
</body>
</html>