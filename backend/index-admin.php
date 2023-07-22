<?php include "/config/constants.php" ?>
<?php include "nav.php" ?>

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
          <?php include('check-login.php'); ?>

        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Users</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold">
            <?php
              $sql_user = "SELECT * FROM users";
              $res = mysqli_query($conn, $sql_user);
              if($res == TRUE){
                echo $count = mysqli_num_rows($res);
              }            
            ?>
            </span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Packages</p>
              <span class="material-icons-outlined text-orange">add_shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold">
            <?php
              $sql_package = "SELECT * FROM activities";
              $res = mysqli_query($conn, $sql_package);
              if($res == TRUE){
                echo $count = mysqli_num_rows($res);
              }            
            ?>
            </span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Booking</p>
              <span class="material-icons-outlined text-green">shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold">
            <?php
              $sql_booking = "SELECT * FROM booking";
              $res = mysqli_query($conn, $sql_booking);
              if($res == TRUE){
                echo $count = mysqli_num_rows($res);
              }
            ?>
            </span>
          </div>

          

        </div>

        
      </main>
      <!-- End Main -->

    </div>

	<?php include "footer.php" ?>

