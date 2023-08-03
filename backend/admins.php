<?php include "nav.php" ?>
<main class="main-container">
<div class="table-container">
  <a href="add-admins.php">Add Admins</a>
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
            <input type="text" id="searchInput" placeholder="Search...">
            <table id="dataTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>FullName</th>
                  <th>Username</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php 
  //query to get all admin
  $sql = "SELECT * FROM admins";


  $res = mysqli_query($conn, $sql);
  //execute the query
  if($res == TRUE){
    $count = mysqli_num_rows($res);
    $sn =1;

    if($count>0){
      while($rows=mysqli_fetch_assoc($res)){
        $admin_id = $rows['admin_id'];
        $admin_uname = $rows ['admin_name'];
        $fullname = $rows['fullname'];

        ?>
        <tr>
        <td><?php echo $sn++ ?></td>
        <td><?php echo $fullname ?></td>
        <td><?php echo $admin_uname ?></td>
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
