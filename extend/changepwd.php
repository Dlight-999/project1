<?php include '../config/constants.php' ?>
<?php include "../extend/navbar.php" ?>

<link rel="stylesheet" href="../style/style.css">
<link rel="stylesheet" href="../style/admin.css">
<link rel="stylesheet" href="../style/add.css">
<style>

.main-container{
    height: 60%;
}
</style>

<main class="main-container">
<div class="container">
        <h2>Change Password</h2>
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
    if(isset($_GET['mail'])){
        $mail = $_GET['mail'];
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
            <input type="hidden" name="mail" value="<?php echo $mail; ?>">
                <input type="submit" value="Change" name="submit" id="Change"  class="btn-primary">
        </form>
        
              
        <?php
if (isset($_POST['submit'])) {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $cpass2 = $_POST['cpass2'];
    $mail = $_POST['mail'];

    // Check if the confirmation parameter is set
    if (isset($_POST['confirm']) && $_POST['confirm'] == 'true') {

        $sql = "SELECT * FROM users WHERE email='$mail' AND password='$pass1'";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                if ($pass2 == $cpass2) {
                    $sql2 = "UPDATE users SET password ='$pass2' where email='$mail'";
                    $res2 = mysqli_query($conn, $sql2);

                    if ($res2 == true) {
                        $_SESSION['change'] = "Password Changed Successfully";
                        header('location:' . siteurl . 'extend/login.php');
                    } else {
                        $_SESSION['change'] = "Failed to change password";
                        header('location:' . siteurl . 'extend/update-password.php');
                    }
                } else {
                    $_SESSION['pwd-not-match'] = "Password doesn't match";
                    header('location:' . siteurl . 'extend/changepwd.php');
                }
            }
        }
    } else {
        // Display the confirmation box
        echo "
        <script>
            var confirmed = confirm('Are you sure you want to change your password?');
            if (confirmed) {
                // Set the 'confirm' parameter and submit the form
                document.getElementById('confirm').value = 'true';
                document.querySelector('form').submit();
            } else {
                // Redirect back to the change password page
                window.location.href = 'changepwd.php?mail=$mail';
            }
        </script>
        ";
    }
}
?>

    </div>
</main>

<?php include "footer.php" ?>
