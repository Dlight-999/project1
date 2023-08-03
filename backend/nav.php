<!DOCTYPE html>
<?php
  include('../config/constants.php');
  include('check-login.php');
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Pokhara</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/table.css">
    <link rel="stylesheet" href="../style/add.css">
  </head>
  <body>

	
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <span class="material-icons-outlined">search</span>
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span>
          <span class="material-icons-outlined">account_circle</span>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined"></span>Adventure Pokhara
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="index-admin.php">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="admins.php">
            <span class="material-icons-outlined">shield</span>Admins
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="package.php">
              <span class="material-icons-outlined">fact_check</span> Package
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="add-package.php">
              <span class="material-icons-outlined">add_shopping_cart</span>Add Package
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="booking.php">
              <span class="material-icons-outlined">shopping_cart</span> Orders
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="users.php">
              <span class="material-icons-outlined">person</span> Users
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="logout.php">
              <span class="material-icons-outlined">settings</span> Logout
            </a>
          </li>
        </ul>
      </aside>
