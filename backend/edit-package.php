<?php include "nav.php" ?>
<main class="main-container">
<div class="container">
        <h2>Edit package</h2>
        <?php 
           if(isset($_GET['activity_id'])){
            $activity_id = $_GET['activity_id'];

            $sql = "SELECT * FROM activities WHERE activity_id=$activity_id";
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count==1){
                $rows = mysqli_fetch_assoc($res);                $activity_name = $rows['activity_name'];
                $current_image = $rows['image'];
                $activity_detail = $rows['activity_detail'];
                $price= $rows['price'];
                $featured = $rows['activity_top'];
                $active = $rows['activity_active'];

            }
            else{
                $_SESSION['no-category-found']="Package not found.";
                header('locaiton:'.siteurl.'backend/package.php');
            }
           }

           else{
            header('location:'.siteurl.'backend/package.php');
           }
        ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="package_name">Package Name:
                <input type="text" name="package_name" id="package_name" value="<?php echo $activity_name?>" >
            </div>
            <div class="form-group">
                <label for="package_price">Package price:
                <input type="number" name="package_price" id="package_price" value="<?php echo $price?>" >
            </div>
            <div class="form-group">
                <label for="package_description">Package Description:</label>
                <textarea name="package_description" id="package_description" cols="200" rows="10" ><?php echo $activity_detail?></textarea>
            </div>
            <div class="form-group">
                <label for="package_image">Current Package Image:</label>
                    <?php 
                     if($current_image !=""){
                        ?>
                        <img src="<?php echo siteurl;?>image/category/<?php echo $current_image;?>" width="200px" height="150px" alt="">
                        <?php
                     }
                    ?>
                    <input type="hidden" name="current_image" value="<?php echo $current_image ?>">
                    
                    <input type="hidden" name="activity_id" value="<?php echo $activity_id ?>">
            </div>
            <div class="form-group">
                <label for="package_image">Package Image:</label>
                <input type="file" name="package_image" id="package_image" >
            </div>
            <div class="form-group">
                <label for="package_feature">Package Featured:</label>
                <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
<input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No

            </div>
            <div class="form-group">
                <label for="package_active">Package Active:</label>
                <input <?php if($active=="Yes"){echo"checked";} ?> type="radio" name="active" value="Yes"> Yes
                <input type="radio" name="active" value="No"> No
            </div>
            <input <?php if($active=="No"){echo"checked";} ?> type="submit" name="submit" value="Add package">
        </form>
        

       
        <?php 
            if(isset($_POST['submit'])){
                $activity_id = $_POST['activity_id'];
                $name = $_POST['package_name'];
                $description = $_POST['package_description'];
                $price = $_POST['package_price'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];


                if(isset($_FILES['package_image']['name'])){
                  
                    $image_name = $_FILES['package_image']['name'];
                    
                    if($image_name != ""){


                        $extArray = explode('.', $image_name);
            $ext = end($extArray);
            $image_name = "category_".rand(000,999).'.'.$ext;
            $source_path = $_FILES['package_image']['tmp_name'];
            $destination_path = "../image/category/".$image_name;

            $upload = move_uploaded_file($source_path,$destination_path);

            if($upload == false){
                $_SESSION['upload'] = "Failed to upload Image.";
                header('location:'.siteurl.'backend/add-package.php');

                die();
            }

            $remove_path="../image/category/".$current_image;
            $remove = unlink($remove_path);

            if($remove==false){
                $_SESSION['failed-remove']="Failed to remove current Image";
                header('location:'.siteurl.'backend/package.php');
                die();
            }


                    }
                    else{
                        $image_name = $current_image;
                    }

                }
                else{
                    $image_name = $current_image;
                }
                $name = mysqli_real_escape_string($conn, $name);
        $description = mysqli_real_escape_string($conn, $description);
                
                $sql2 = "UPDATE activities SET
                activity_name='$name',
                activity_detail='$description',
                image = '$image_name',
                price= '$price',
                activity_top = '$featured',
                activity_active = '$active'
                WHERE activity_id = $activity_id;
                ";
                $res2 = mysqli_query($conn, $sql2);

                if($res2==true){
                    $_SESSION['update'] = "Package Updated Sucessfully";
                    header('location:'.siteurl.'backend/package.php');
                }
                else{
                    $_SESSION['update'] = "Failed to Update. ";
                    header('location:'.siteurl.'backend/package.php');
                }
            }
        ?>
    </div>
</main>


<?php include "footer.php" ?>