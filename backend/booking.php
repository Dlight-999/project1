<?php include "nav.php" ?>
<main class="main-container">
<div class="table-container">
<?php 
      if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
      if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
      }
      if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
      }
      if(isset($_SESSION['user-not-found'])){
        echo $_SESSION['user-not-found'];
        unset($_SESSION['user-not-found']);
      }
      if(isset($_SESSION['change'])){
        echo $_SESSION['change'];
        unset($_SESSION['change']);
      }
      ?>
            
<div class="table-container">
<input type="text" id="searchInput" placeholder="Search...">
            <table id="dataTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>UserName</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Activity</th>
                  <th>Date</th>
                  <th>Price</th>
                  <th>Message</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              <?php 
$sql = "SELECT * FROM booking ";


  $res = mysqli_query($conn, $sql);
  //execute the query
  if($res == TRUE){
    $count = mysqli_num_rows($res);
    $sn =1;

    if($count>0){
      while($rows=mysqli_fetch_assoc($res)){
        $id = $rows['booking_id'];
        $activity = $rows ['u_activity'];
        $price = $rows ['u_price'];
        $uname = $rows['u_name'];
        $email=$rows['u_email'];
        $phone=$rows['u_phone'];
        $msg = $rows['Message'];
        $date = $rows['booking_date'];
        $status = $rows['status'];

        ?>
        <tr>
            <td><?php echo $sn++ ;?></td>
            <td><?php echo $uname;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $phone;?></td>
            <td><?php echo $activity;?></td>
            <td><?php echo $date;?></td>
            <td><?php echo $price;?></td>
            <td><?php echo $msg;?></td>
            <td><?php echo $status;?></td>
        
        <td><a href="<?php echo siteurl;?>backend/cancelbook.php?id=<?php echo $id;?>" class="btn-secondary">Cancel</a>
        <a href="<?php echo siteurl;?>backend/pending.php?id=<?php echo $id;?>" class="btn-secondary">Pending</a>
        <a href="<?php echo siteurl;?>backend/deletebook.php?id=<?php echo $id;?>" class="btn-secondary">Delete</a>
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
