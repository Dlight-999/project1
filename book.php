<?php
include ('config/constants.php');
include ('extend/check.php');
?>
<?php 
$mail = $_GET['mail'];
           if(isset($_GET['mail'])){
            $mail = $_GET['mail'];

            $sql = "SELECT * FROM users WHERE email='$mail'";
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count==1){
                $rows = mysqli_fetch_assoc($res);                
                $email = $rows['email'];
                $username = $rows['username'];
                $phone = $rows['phone'];
            }
        }
        ?>
<html>
    <head>
        <link rel="stylesheet" href="style/book.css">
</head>
<body>

<div class="bf-container">
        <div class="bf-body">
            <div class="bf-head">
                <h1>Book Now</h1>
                <p></p>
            </div>

            <form action="" class="bf-body-box" method="post">
            <div class="bf-body-box">
                <div class="bf-row">
                    <div class="bf-col-6">
                        <p>Name:</p>
                        <input type="text" name="fname" id="fname" value="<?php echo $username?>">
                    </div>
                    <div class="bf-col-6">
                        <p>email:</p>
                        <input type="email" name="email" id="email" value="<?php echo $email?>">
                    </div>
                </div>

                <div class="bf-row">
                    <div class="bf-col-6">
                        <p>Select date</p>
                        <input type="date" name="date" id="date">
                    </div>
                    
                    <div class="bf-col-6">
                        <p>Select Package</p>
                        <select name="s-select">
                        <?php
                        $sql = "SELECT * FROM activities";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        $activity_id = $row['activity_id'];
                        $activity_name = $row['activity_name'];
                        $selected = ($_GET['activity_id'] == $activity_id) ? 'selected' : '';
                        echo "<option value='$activity_id' $selected>$activity_name</option>";
    }
    ?>
                        </select>
                    </div>
                </div>
                <div class="bf-row">
                <div class="bf-col-12">
                        <p>Enter Phone Number</p>
                        <input type="number" name="phone" id="phone" size="10">
                    </div>
                </div>
            </div>
                <div class="bf-row">
                    <div class="bf-col-12">
                    <p>Message</p>
                    <textarea name="Message" id="Message" cols="3" rows="10"></textarea>
                </div>
            </div>

            <div class="bf-row">
                <div class="bf-col-3">
                    <input type="submit" value="Submit" name="submit">
                </div>
            </div>

            </div>
        </form>
        

        <div class="bf-footer">
            <p></p>
            
        </div>
        </div>
    </div></boody>
</html>
<?php

    if(isset($_POST['submit'])){
    echo    $fname = $_POST['fname'];
    echo $email = $_POST['email'];
    echo $phone = $_POST['phone'];
    echo $activity= $_POST['s-select'];
    echo $message = $_POST['Message'];

    $sql = "SELECT * FROM activities WHERE activity_id = $activity";

$res = mysqli_query($conn, $sql);

if($res == true){
    $count = mysqli_num_rows($res);

    if($count==1){
        $rows = mysqli_fetch_assoc($res);
        echo $activity_name = $rows['activity_name'];
        echo $price= $rows['price'];
    }
}


    
    // INSERT IN SQL
    /* $sql = "INSERT INTO booking SET 
    u_name = '$fname',
    admin_name = '$uname',
    admin_pass = '$pass'
    ";

    // db conn
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($res == TRUE){
        $_SESSION['add'] = "Admin Added";
        header("location:".siteurl.'backend/admins.php');
    }
    else{
        $_SESSION['add'] = "Failed to add";
        header("location:".siteurl.'backend/add-admins.php');
    }

    */
    }
?>