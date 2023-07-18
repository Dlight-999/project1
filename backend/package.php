<?php include "nav.php" ?>
<main class="main-container">
<div class="table-container">
<?php 
            if(isset($_SESSION['add-package'])){
                echo $_SESSION['add-package'];
                unset($_SESSION['add-package']);
            }
            if(isset($_SESSION['remove'])){
              echo $_SESSION['remove'];
              unset($_SESSION['remove']);
          }
          if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['no-category-found'])){
          echo $_SESSION['no-category-found'];
          unset($_SESSION['no-category-found']);
      }
      if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    if(isset($_SESSION['upload'])){
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
  }
  if(isset($_SESSION['failed-remove'])){
    echo $_SESSION['failed-remove'];
    unset($_SESSION['failed-remove']);
}
        ?>
 <input type="text" id="searchInput" placeholder="Search...">
            <table id="dataTable">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Details</th>
                  <th>Price</th>
                  <th>Featured</th>
                  <th>Active</th>
                </tr>
              </thead>
              <tbody>
              <?php 
  //query to get all admin
  $sql = "SELECT * FROM activities";


  $res = mysqli_query($conn, $sql);  
  //execute the query
  if($res == TRUE){
    $count = mysqli_num_rows($res);
    $sn =1;

    if($count>0){
      while($rows=mysqli_fetch_assoc($res)){
        $activity_id = $rows['activity_id'];
        $activity_name = $rows['activity_name'];
        $activity_detail = $rows ['activity_detail'];
        $image_name = $rows['image'];
        $price = $rows['price'];
        $activity_featured = $rows['activity_top'];
        $activity_active = $rows['activity_active'];


        ?>
        <tr>
        <td><?php echo $sn++ ?></td>
        <td><?php echo $activity_name ?></td>
        <td>
          <?php
          if($image_name !=""){
            ?>
            <img src="<?php echo siteurl; ?>image/category/<?php echo $image_name?>" width="100px" height="75px" alt="">
            <?php
          }
          else{
            echo"Image Not added";
          }
          ?>
        </td>
        <td><?php echo $activity_detail?></td>
        <td><?php echo $price?></td>
        <td><?php echo $activity_featured?></td>
        <td><?php echo $activity_active?></td>
        <td><a href="<?php echo siteurl;?>backend/delete-package.php?activity_id=<?php echo $activity_id;?>&image_name=<?php echo $image_name; ?>" class="btn-secondary"> Delete</a>
        <a href="<?php echo siteurl;?>backend/edit-package.php?activity_id=<?php echo $activity_id;?>" class="btn-secondary"> Edit</a></td>
        
      </tr>
        <?php
      }
    }
  }
?>
              </tbody>
            </table>
          </div>
</main>


<?php include "footer.php" ?>
