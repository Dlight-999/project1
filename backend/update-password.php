<?php include "nav.php" ?>
<main class="main-container">
<div class="container">
        <h2>Change Admin Password</h2>
        <?php
        if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
      }  ?>
      <?php 
echo $admin_id = $_GET['admin_id'];
$sql = "SELECT * FROM admins WHERE admin_id = $admin_id";

$res = mysqli_query($conn, $sql);

if($res == true){
    $count = mysqli_num_rows($res);

    if($count==1){
        $rows = mysqli_fetch_assoc($res);
        echo $opass = $rows['admin_pass'];
    }
    else{
      header('location:'.siteurl.'admin/admin.php');  
    }
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
                <input type="submit" value="Change" name="submit" id="Change"  class="btn-primary">
        </form>
        
              
        <?php
if (isset($_POST['submit'])) {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $cpass2 = $_POST['cpass2'];

    // Check if the confirmation parameter is set
    if (isset($_POST['confirm']) && $_POST['confirm'] == 'true') {

        $sql = "SELECT * FROM admins WHERE admin_id='$admin_id' AND admin_pass='$opass'";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                if ($pass2 == $cpass2) {
                    $sql2 = "UPDATE admins SET admin_pass ='$pass2' where admin_id='$admin_id'";
                    $res2 = mysqli_query($conn, $sql2);

                    if ($res2 == true) {
                        $_SESSION['change'] = "Password Changed Successfully";
                        header('location:' . siteurl . 'backend/admins.php');
                    } else {
                        $_SESSION['change'] = "Failed to change password";
                        header('location:' . siteurl . 'backend/update-password.php');
                    }
                } else {
                    $_SESSION['pwd-not-match'] = "Password doesn't match";
                    header('location:' . siteurl . 'backend/update-password.php');
                }
            }
        }
    } else {
        // Display the confirmation box
        echo "
        <script>
            var confirmed = confirm('Are you sure you want to change the password?');
            if (confirmed) {
                // Set the 'confirm' parameter and submit the form
                var form = document.querySelector('form');
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'confirm';
                input.value = 'true';
                form.appendChild(input);
                form.submit();
            } else {
                // Redirect back to the update password page
                window.location.href = 'update-password.php?admin_id=$admin_id';
            }
        </script>
        ";
    }
}
?>

    </div>
</main>


<?php include "footer.php" ?>
