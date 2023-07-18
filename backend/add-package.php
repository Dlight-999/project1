<?php include "nav.php" ?>
<main class="main-container">
<div class="container">
        <h2>Add package</h2>
        <?php 
            if(isset($_SESSION['add-package'])){
                echo $_SESSION['add-package'];
                unset($_SESSION['add-package']);
            }
        ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="package_name">Package Name:
                <input type="text" name="package_name" id="package_name" >
            </div>
            <div class="form-group">
                <label for="package_price">Package price:
                <input type="number" name="package_price" id="package_price" >
            </div>
            <div class="form-group">
                <label for="package_description">Package Description:</label>
                <textarea name="package_description" id="package_description" cols="200" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="package_image">Package Image:</label>
                <input type="file" name="package_image" id="package_image" >
            </div>
            <div class="form-group">
                <label for="package_feature">Package Featured:</label>
                <input type="radio" name="featured" value="Yes"> Yes
                <input type="radio" name="featured" value="No"> No
            </div>
            <div class="form-group">
                <label for="package_active">Package Active:</label>
                <input type="radio" name="active" value="Yes"> Yes
                <input type="radio" name="active" value="No"> No
            </div>
            <input type="submit" name="submit" value="Add package">
        </form>
        

       
        <?php
    if(isset($_POST['submit'])){
        $name = $_POST['package_name'];
        $description = $_POST['package_description'];
        $price = $_POST['package_price'];
        $name = $_POST['package_name'];
        if(isset($_POST['featured'])){
            $featured = $_POST['featured'];
        }
        else{
            $featured = "No";
        }
        if(isset($_POST['active'])){
            $active = $_POST['active'];
        }
        else{
            $active = "No";
        }
        if(isset($_FILES['package_image']['name'])){

            $image_name=$_FILES['package_image']['name'];
            if($image_name !=""){
            $extArray = explode('.', $image_name);
            $ext = end($extArray);
            $image_name = "category_".rand(000,999).'.'.$ext;
            $source_path = $_FILES['package_image']['tmp_name'];
            $destination_path = "../image/category/".$image_name;

            $upload = move_uploaded_file($source_path,$destination_path);

            if($upload == false){
                $_SESSION['$upload'] = "Failed to upload Image.";
                header('location:'.siteurl.'backend/add-package.php');

                die();
            }
        }
        }
        else{
            $image_name="";
        }        
        $name = mysqli_real_escape_string($conn, $name);
        $description = mysqli_real_escape_string($conn, $description);


        $sql = "INSERT INTO activities SET
            image = '$image_name',
            activity_name = '$name',
            activity_detail = '$description',
            activity_top = '$featured',
            price = '$price',
            activity_active = '$active'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==true){
            $_SESSION['add-package'] = "Package added sucessfully";
            header('location:'.siteurl.'backend/package.php');
        }
        else{
            $_SESSION['add-package'] = "Failed to add package";
            header('location:'.siteurl.'backend/add-package.php');
        }
    }
?>
    </div>
</main>


<?php include "footer.php" ?>
