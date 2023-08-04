<?php include '../config/constants.php'?>
<?php include "../extend/navbar.php" ?>
<link rel="stylesheet" href="../style/style.css">
<link rel="stylesheet" href="../style/admin.css">
<link rel="stylesheet" href="../style/table.css">
<style>

.main-container{
    height: 70%;
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
                  <th>Status</th>
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
        $status = $rows['status'];

        ?>
        <tr>
        <td><?php echo $sn++ ?></td>    
        <td><?php echo $activity ?></td>
        <td><?php echo $uname ?></td>
        <td><?php echo $email ?></td>
        <td><?php echo $phone ?></td>
        <td><?php echo $date ?></td>
        <td><?php echo $status ?></td>
        
        <td><a href="<?php echo siteurl;?>extend/cancel.php?mail=<?php echo $mail;?>&id=<?php echo $id?>" class="btn-secondary">Cancel</a>
        </td>
        
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
