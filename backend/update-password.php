<?php include "nav.php" ?>
<?php include '../config/constants.php'?>
<main class="main-container">
<div class="container">
        <h2>Update Password</h2>
        <?php
        if(isset($_SESSION['pwd-not-match'])){
        echo $_SESSION['pwd-not-match'];
        unset($_SESSION['pwd-not-match']);
      }
      if(isset($_SESSION['user-not-found'])){
        echo $_SESSION['user-not-found'];
        unset($_SESSION['user-not-found']);
      }
      ?>
      <?php 
    if(isset($_GET['admin_id'])){
        $admin_id = $_GET['admin_id'];
    }
?>
     
        <form method="post" action="">
            <div class="form-group">
                <label for="pass1">Current Password:
                <input type="password" name="pass1" id="pass1" >
            </div>
            <div class="form-group">
                <label for="pass2">New Password:
                <input type="password" name="pass2" id="pass2" >
            </div>
            
            <div class="form-group">
                <label for="cpass2">Confirm Password:
                <input type="password" name="cpass2" id="cpass2" >
            </div>
            <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                <input type="submit" value="Change" name="submit" id="Change"  class="btn-primary">
        </form>
        
              
        <?php
if (isset($_POST['submit'])) {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $cpass2 = $_POST['cpass2'];
    $admin_id = $_POST['admin_id'];



    $sql = "SELECT * FROM admins WHERE admin_id=$admin_id AND admin_pass='$pass1'";
    $res = mysqli_query($conn,$sql);
    if($res==true){
        $count = mysqli_num_rows($res);

        if($count==1){
            if($pass2==$cpass2){
                $sql2 = "UPDATE admins SET admin_pass='$pass2' where admin_id=$admin_id";
                $res2 = mysqli_query($conn,$sql2);

                if($res2==true){
                    $_SESSION['change']="Password Changed Sucessfully";
                header('location:'.siteurl.'backend/admins.php');
                }
                else{
                    $_SESSION['change']="Failed to change password";
                header('location:'.siteurl.'backend/update-password.php');
                }

            }
            else{
                $_SESSION['pwd-not-match']="Password doesnt match";
                header('location:'.siteurl.'backend/update-password.php');
            }

        }
        else{
            $_SESSION['user-not-found']="User not Found";
            header('location:'.siteurl.'backend/update-password.php');
        }
    }

   }
?>

    </div>
</main>



<?php include "footer.php" ?>
