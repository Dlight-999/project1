<?php include '../config/constants.php'?>
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
        <h2>Update Admin</h2>
        <?php
        if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
      }  
       if(isset($_GET['mail'])){
        $mail = $_GET['mail'];
    
$sql = "SELECT * FROM users WHERE email = '$mail'";

$res = mysqli_query($conn, $sql);

if($res == true){
    $count = mysqli_num_rows($res);

    if($count==1){
        $rows = mysqli_fetch_assoc($res);
        $uname = $rows['username'];
        $phone = $rows['phone'];
        $email = $rows['email'];
        $user_id = $rows['user_id'];
    }
  
}
}
?>
     
        <form method="post" action="" onsubmit="return confirmUpdate()">
            <div class="form-group">
                <label for="uname">Usermame:
                <input type="text" name="uname" id="uname" value="<?php echo $uname?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone no:
                <input type="number" name="phone" id="phone" value="<?php echo $phone?>" >
            </div>
            <div class="form-group">
                <label for="email">Email:
                <input type="email" name="email" id="email" value="<?php echo $email?>" >
            </div>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="submit" value="Update" name="submit" id="update" class="btn-primary">
        </form>
        
        <script>
            function confirmUpdate() {
                return confirm('Are you sure you want to update this user?');
            }
        </script>
              
        <?php
if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $user_id = $_POST['user_id'];

    // Check if the confirmation parameter is set
    // Retrieve the values from the query string

    // Perform the update
    $sql = "UPDATE users SET 
        username = '$uname',
        phone = '$phone',
        email = '$email'
        WHERE user_id = '$user_id'";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($res == TRUE) {
        $_SESSION['uupdate'] = "User Updated";
        header("location:" . siteurl . 'index.php');
    } else {
        $_SESSION['uupdate'] = "Failed to update";
        header("location:" . siteurl . 'extend/profile.php');
    }
}
?>


    </div>
</main>



<?php include "footer.php" ?>
