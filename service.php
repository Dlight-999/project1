<?php 
include './extend/navbar.php';
include './config/constants.php';
?>
<div class="topc">
    <div class="cardtitle"><h1>Our services</h1>
      <div class="border"></div>
    </div>

    
    <div class="break"></div>
<?php 
if(isset($_SESSION['umail'])){
  $mail = $_SESSION['umail'];

}
?>
<?php 
  //query to get all admin
  $sql = "SELECT * FROM activities WHERE activity_active = 'Yes'";


  $res = mysqli_query($conn, $sql);  
  //execute the query
  if($res == TRUE){
    $count = mysqli_num_rows($res);

    if($count>0){
      while($rows=mysqli_fetch_assoc($res)){
        $activity_id = $rows['activity_id'];
        $activity_name = $rows['activity_name'];
        $activity_detail = $rows ['activity_detail'];
        $image_name = $rows['image'];
        $price = $rows['price'];


        ?>
       
      <div class="card">
        <div class="card-image"> <img src="<?php echo siteurl; ?>image/category/<?php echo $image_name?>"  alt="" style="height: 100%; width: 100%; object-fit: cover;"> </div>
        <h2><?php echo $activity_name." - Rs ".$price?></h2>
        <p>
        <?php echo $activity_detail?>
        </p>
        <a href="<?php echo siteurl;?>book.php?mail=<?php echo $mail;?>&activity_id=<?php echo $activity_id;?>">Book Now</a>
      </div>
        <?php
      }
    }
  }
?>


      <div class="break"></div>
      
   </div>


<?php 
include './extend/footer.php';
?>