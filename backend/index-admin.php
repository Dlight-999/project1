<?php include"nav.php" ?>

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
            <span class="text-primary font-weight-bold">249</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Packages</p>
              <span class="material-icons-outlined text-orange">add_shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold">83</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Booking</p>
              <span class="material-icons-outlined text-green">shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold">79</span>
          </div>

          

        </div>

        
      </main>
      <!-- End Main -->

    </div>

	<?php include "footer.php" ?>

