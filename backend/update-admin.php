<?php include "nav.php" ?>
<?php 
           if(isset($_GET['admin_id'])){
            $admin_id = $_GET['admin_id'];

            $sql = "SELECT * FROM admins WHERE admin_id=$admin_id";
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count==1){
                $rows = mysqli_fetch_assoc($res);                
                $admin_name = $rows['admin_name'];
                $fullname = $rows['fullname'];

            }
        }
        ?>
<main class="main-container">
<div class="container">
        <h2>Update Admin</h2>
        <?php
        if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
      }  ?>
      <?php 
$admin_id = $_GET['admin_id'];
$sql = "SELECT * FROM admins WHERE admin_id = $admin_id";

$res = mysqli_query($conn, $sql);

if($res == true){
    $count = mysqli_num_rows($res);

    if($count==1){
        $rows = mysqli_fetch_assoc($res);
        $fname = $rows['fullname'];
        $uname = $rows['admin_name'];
    }
    else{
      header('location:'.siteurl.'admin/admin.php');  
    }
}
?>
     
        <form method="post" action="">
            <div class="form-group">
                <label for="uname">Usermame:
                <input type="text" name="uname" id="uname" value="<?php echo $admin_name?>">
            </div>
            <div class="form-group">
                <label for="fname">Fullname:
                <input type="text" name="fname" id="fname" value="<?php echo $fname?>" >
            </div>
            <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                <input type="submit" value="Update" name="submit" id="update" class="btn-primary">
        </form>
        
              
        <?php
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $admin_id = $_POST['admin_id'];

    // JavaScript confirmation box
    echo '
    <script>
        var confirmUpdate = confirm("Are you sure you want to update the admin?");

        if (confirmUpdate) {
            // User confirmed, proceed with the update
            window.location.href = "update-admin.php?confirm=yes&admin_id='.$admin_id.'&fname='.$fname.'&uname='.$uname.'";
        } else {
            // User canceled, redirect back to the previous page
            window.location.href = "update-admin.php";
        }
    </script>';

    exit(); // Stop executing the rest of the code
}

// Check if the confirmation parameter is set
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // Retrieve the values from the query string
    $admin_id = $_GET['admin_id'];
    $fname = $_GET['fname'];
    $uname = $_GET['uname'];

    // Perform the update
    $sql = "UPDATE admins SET 
        fullname = '$fname',
        admin_name = '$uname'
        WHERE admin_id = '$admin_id'";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($res == TRUE) {
        $_SESSION['update'] = "Admin Updated";
        header("location:" . siteurl . 'backend/admins.php');
    } else {
        $_SESSION['update'] = "Failed to update";
        header("location:" . siteurl . 'backend/update-admin.php');
    }
}
?>

    </div>
</main>



<?php include "footer.php" ?>