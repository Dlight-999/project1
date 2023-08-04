<?php
include ('config/constants.php');
include ('extend/check.php');


if (isset($_GET['mail'])) {
    $mail = $_GET['mail'];

    $sql = "SELECT * FROM users WHERE email='$mail'";
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
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
                            <input type="text" name="fname" id="fname" value="<?php echo $username ?>">
                        </div>
                        <div class="bf-col-6">
                            <p>email:</p>
                            <input type="email" name="email" id="email" value="<?php echo $email ?>">
                        </div>
                    </div>

                    <div class="bf-row">
                        <div class="bf-col-6">
                            <p>Select date</p>
                            <!-- Set the minimum date for the input field -->
                            <?php
                            // Minimum date for the date input field (tomorrow's date)
                            $minimumDate = date('Y-m-d', strtotime('+1 day'));
                            ?>
                            <input type="date" name="date" id="date" min="<?php echo $minimumDate; ?>">
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
        $price = $row['price'];

        // Check if the current activity_id matches the one from $_GET['activity_id']
        $selected = '';
        if (isset($_GET['activity_id']) && $activity_id == $_GET['activity_id']) {
            $selected = 'selected';
        }

        echo "<option value='$activity_id' $selected>$activity_name - Price: $price</option>";
    }
    ?>
</select>

                        </div>
                    </div>
                    <div class="bf-row">
                        <div class="bf-col-12">
                            <p>Enter Phone Number</p>
                            <input type="number" name="phone" id="phone" value= "<?php echo $phone?>"size="10">
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
                    <div class="bf-col-12">
                        <input type="submit" value="Submit" name="submit">
                    </div>
                </div>
                <div class="bf-row">
                    <div class="bf-col-12">
                        <a href="./index.php" class="cancel">
                            <input type="button" value="Cancel" name="cancel">
                        </a>
                    </div>
                </div>
            </form>

            <div class="bf-footer">
                <p></p>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $phone = $_POST['phone'];
    $activity = $_POST['s-select'];
    $message = $_POST['Message'];

    // Validate the date before processing the form submission
    $selectedDate = $_POST['date'];
    $currentDate = date('Y-m-d');

    if (strtotime($selectedDate) < strtotime($currentDate)) {
        $_SESSION['book'] = "Invalid date. Please select a date from tomorrow onwards.";
    } else {
        // Fetch activity details from the activities table
        $sql_activity = "SELECT activity_name, price FROM activities WHERE activity_id = $activity_id";
        $result_activity = mysqli_query($conn, $sql_activity);
        if ($result_activity && mysqli_num_rows($result_activity) == 1) {
            $row_activity = mysqli_fetch_assoc($result_activity);
            $activity_name = $row_activity['activity_name'];
            $price = $row_activity['price'];

            // Insert data into the booking table
            $sql_booking = "INSERT INTO booking (u_name, booking_date, u_email, u_phone, u_activity, u_price, Message,status)
               VALUES ('$fname', '$date', '$email', '$phone', '$activity_name','$price', '$message','Active')";

            // Execute the insert query
            $res_booking = mysqli_query($conn, $sql_booking);

            if ($res_booking) {
                $_SESSION['book'] = "booked";
            } else {
                $_SESSION['book'] = "Failed to book";
            }
        } else {
            $_SESSION['book'] = "Activity not found";
        }
    }
}
?>
