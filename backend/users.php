<?php include "nav.php" ?>
<main class="main-container">
<div class="table-container">
            <input type="text" id="searchInput" placeholder="Search...">
            <table id="dataTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>UserName</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
              <?php 
  //query to get all admin
  $sql = "SELECT * FROM users";


  $res = mysqli_query($conn, $sql);
  //execute the query
  if($res == TRUE){
    $count = mysqli_num_rows($res);
    $sn =1;

    if($count>0){
      while($rows=mysqli_fetch_assoc($res)){
        $username= $rows['username'];
        $email = $rows ['email'];
        $user_id = $rows['user_id'];

        ?>
        <tr>
        <td><?php echo $sn++ ?></td>
        <td><?php echo $username ?></td>
        <td><?php echo $email ?></td>
        <td><a href="<?php echo siteurl;?>backend/delete-user.php?user=<?php echo $$user_id;?>" class="btn-secondary"> Delete User</a>
        <a href="<?php echo siteurl;?>backend/update-user.php?user=<?php echo $$user_id;?>" class="btn-primary">Upadte User</a>
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
