<?php include "../extend/navbar.php" ?>
<?php include '../config/constants.php'?>
<link rel="stylesheet" href="../style/style.css">
<link rel="stylesheet" href="../style/admin.css">
<link rel="stylesheet" href="../style/table.css">
<style>

.main-container{
    height: 250px;
}
</style>
<?php
if(isset($_GET['mail'])){
        $mail = $_GET['mail'];
    }

    ?>
<main class="main-container">
<div class="table-container">
<input type="text" id="searchInput" placeholder="Search...">
            <table id="dataTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Activity</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
              <?php 
$sql = "SELECT * FROM booking WHERE u_email='$mail'";


  $res = mysqli_query($conn, $sql);
  //execute the query
  if($res == TRUE){
    $count = mysqli_num_rows($res);
    $sn =1;

    if($count>0){
      while($rows=mysqli_fetch_assoc($res)){
        $id = $rows['booking_id'];
        $activity = $rows ['u_activity'];
        $uname = $rows['u_name'];
        $email=$rows['u_email'];
        $phone=$rows['u_phone'];
        $date = $rows['booking_date'];

        ?>
        <tr>
        <td><?php echo $sn++ ?></td>    
        <td><?php echo $activity ?></td>
        <td><?php echo $uname ?></td>
        <td><?php echo $email ?></td>
        <td><?php echo $phone ?></td>
        <td><?php echo $date ?></td>
        <td><a href="<?php echo siteurl;?>backend/delete-admin.php?admin_id=<?php echo $admin_id;?>" class="btn-secondary"> Delete admin</a>
        <a href="<?php echo siteurl;?>backend/update-admin.php?admin_id=<?php echo $admin_id;?>" class="btn-primary">Upadte Admin</a>
        <a href="<?php echo siteurl;?>backend/update-password.php?admin_id=<?php echo $admin_id;?>" class="btn-primary">Change password</a></td>
        
      </tr>
        <?php
      }
    }
  }
?>
                <!-- Add more table rows as needed -->
              </tbody>
            </table>
          </div>
</main>
  


<?php include "footer.php" ?>