<?php
    include('../config/constants.php');
    $id = $_GET['id'];

    // Check if the delete action was confirmed
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        $sql = "DELETE FROM booking WHERE booking_id=$id";
        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            $_SESSION['delete'] = "Admin deleted successfully";
            header('location: ' . siteurl . 'backend/booking.php');
        } else {
            $_SESSION['delete'] = "Failed to delete";
            header('location: ' . siteurl . 'backend/booking.php');
        }
    } else {
        // Display the confirmation box
        echo "
        <script>
            var confirmed = confirm('Are you sure you want to delete this booking?');
            if (confirmed) {
                window.location.href = 'deletebook.php?id=$id&confirm=true';
            } else {
                window.location.href = 'booking.php';
            }
        </script>
        ";
    }
?>
