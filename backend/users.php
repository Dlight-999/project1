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
                  <th>Phone</th>
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
        $phone = $rows['phone'];


        ?>
        <tr>
        <td><?php echo $sn++ ?></td>
        <td><?php echo $username ?></td>
        <td><?php echo $email ?></td>
        <td><?php echo $phone ?></td>
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
