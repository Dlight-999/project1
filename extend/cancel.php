<?php include '../config/constants.php' ?>

<?php
if (isset($_GET['mail']) && isset($_GET['id'])) {
    $mail = $_GET['mail'];
    $id = $_GET['id'];

    // Check if the confirmation parameter is set
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        // Perform the cancellation
        $sql = "UPDATE booking SET status ='Cancled' WHERE u_email='$mail' AND booking_id='$id'";
        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            $_SESSION['statuschanged'] = "Cancelled";
            header('location: ' . siteurl . 'extend/history.php?mail=' . $mail);
        } else {
            $_SESSION['statuschanged'] = "Failed to cancel";
            header('location: ' . siteurl . 'extend/history.php?mail=' . $mail);
        }
    } else {
        // Display the confirmation box
        echo "
        <script>
            var confirmed = confirm('Are you sure you want to cancel this booking?');
            if (confirmed) {
                window.location.href = 'cancel.php?mail=$mail&id=$id&confirm=true';
            } else {
                window.location.href = 'history.php?mail=$mail';
            }
        </script>
        ";
    }
}
?>
