

<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/76ac8447a7.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style/style.css">

  <title>Adventure Pokhara</title>
</head>
<body>


      <nav>
        <div class="logo"><h1>Adventure Pokhara</h1></div>
        <div class="openMenu"><i class="fa-sharp fa-solid fa-bars"></i></div>
        <ul class="mainMenu">
            <li><a href="http://localhost/Project1/index.php">Home</a></li>
            <li><a href="http://localhost/Project1/service.php">Our Services</a></li>
            <li><a href="http://localhost/Project1">About Us</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Account</a>
                <div class="dropdown-content">
                
                <?php
                             if(isset($_SESSION['ulogin'])){
                              $mail = $_SESSION['umail'];
                                echo "<a href='http://localhost/Project1/extend/profile.php?mail=$mail'>Edit Profile</a>";
                                echo"<a href='http://localhost/Project1/extend/changepwd.php?mail=$mail'>Change Password</a>";
                                echo "<a href='http://localhost/Project1/extend/history.php?mail=$mail'>Booking History</a> ";
                                echo "<a href='http://localhost/Project1/extend/ulogout.php'>Logout</a> ";
                              }
                              else{
                                echo "<a href='http://localhost/Project1/extend/login.php'>Login</a>";
                              }
                ?>
                
      </div>
    </li>            <div class="closeMenu"><i class="fa fa-times"></i></div>
        </ul>
    </nav>
    <script>
        const mainMenu = document.querySelector('.mainMenu');
const closeMenu = document.querySelector('.closeMenu');
const openMenu = document.querySelector('.openMenu');
const menu_items = document.querySelectorAll('nav .mainMenu li a');




openMenu.addEventListener('click',show);
closeMenu.addEventListener('click',close);

// close menu when you click on a menu item 
menu_items.forEach(item => {
    item.addEventListener('click',function(){
        close();
    })
})

function show(){
    mainMenu.style.display = 'flex';
    mainMenu.style.top = '0';
}
function close(){
    mainMenu.style.top = '-100%';
}
    </script>

