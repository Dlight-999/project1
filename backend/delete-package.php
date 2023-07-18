<?php
    include('../config/constants.php');


    if(isset($_GET['activity_id']) AND isset($_GET['image_name'])){
        $activity_id = $_GET['activity_id'];
        $image_name = $_GET['image_name'];

        if($image_name != ""){
            $path = "../image/category/".$image_name;
            $remove = unlink($path);
            if($remove==false){
                $_SESSION['remove'] = "Failed to Remove Package Image";
                header('location:'.siteurl.'backend/package.php');
                die();
            }
        }

        $sql = "DELETE FROM activities WHERE activity_id=$activity_id";
        $res = mysqli_query($conn, $sql);
        if($res==true){
            $_SESSION['delete']="Package deleted sucessfully";
            header('location:'.siteurl.'backend/package.php');
        }
        else{
            $_SESSION['delete']="Failed to delete";
            header('location:'.siteurl.'backend/package.php');
        }
        
    }

    else{
        header('location:'.siteurl.'backend/package.php');
    }


?>