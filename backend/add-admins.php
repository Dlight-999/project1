<?php include "nav.php" ?>
<main class="main-container">
    <div class="container">
        <h2>Add Admins</h2>
        <?php 
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <form method="post" action="" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="uname">Username:
                    <input type="text" name="uname" id="uname" required>
                </label>
            </div>
            <div class="form-group">
                <label for="fname">Fullname:
                    <input type="text" name="fname" id="fname" required>
                </label>
            </div>
            <div class="form-group">
                <label for="pass1">Password:
                    <input type="password" name="pass1" id="pass1" required>
                </label>
            </div>
            <div class="form-group">
                <label for="pass2">Confirm Password:
                    <input type="password" name="pass2" id="pass2" required>
                </label>
            </div>

            <input type="submit" name="submit" value="Add package">
        </form>
        <script>
            function validateForm() {
                var uname = document.getElementById('uname').value;
                var fname = document.getElementById('fname').value;
                var pass1 = document.getElementById('pass1').value;
                var pass2 = document.getElementById('pass2').value;

                // Validate username
                if (uname.length < 4) {
                    alert("Username must be at least 4 characters long");
                    return false;
                }

                // Validate fullname
                if (!/^[a-zA-Z]/.test(fname)) {
                    alert("Fullname must start with an alphabet");
                    return false;
                }

                // Validate password
                if (pass1 !== pass2) {
                    alert("Passwords do not match");
                    return false;
                }

                return true;
            }
        </script>

       
        <?php
        if(isset($_POST['submit'])){
            $fname = $_POST['fname'];
            $uname = $_POST['uname'];
            $pass = $_POST['pass1'];
            $cpass = $_POST['pass2'];

            // Check if the passwords match
            if ($pass !== $cpass) {
                $_SESSION['add'] = "Passwords do not match";
                header("location:".siteurl.'backend/add-admins.php');
                exit();
            }

            // Encrypt the password
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            // INSERT IN SQL
            $sql = "INSERT INTO admins (fullname, admin_name, admin_pass) VALUES ('$fname', '$uname', '$hashed_password')";

            // db conn
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if($res == TRUE){
                $_SESSION['add'] = "Admin Added";
                header("location:".siteurl.'backend/admins.php');
                exit();
            }
            else{
                $_SESSION['add'] = "Failed to add";
                header("location:".siteurl.'backend/add-admins.php');
                exit();
            }
        }
        ?>
    </div>
</main>

<?php include "footer.php" ?>
