<?php 
  session_start(); 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web\fontawesome-free-5.15.3-web\css\all.css">
    <script src="fontawesome-free-5.15.3-web\fontawesome-free-5.15.3-web\js\all.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="frontpage.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <style>
      .x{
        font-size: 20px;
        font-weight: 600;
      }
    </style>
    <title></title>
  </head>
  <body>

    <nav class="navbar navbar-expand-md  navbar-light  fixed-top bg-dark">
      <div class="container">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="collapse_target">
      <a class="nav-link text-success x" href="home.php">Donor Seeker</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          About Us
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item " href="#">Mission & Vission</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Statistics</a>
          
        </div>
      </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="contact_us.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="">Services</a>
          </li>
          <?php
            if(!isset($_SESSION['user']))
            { ?>
            <li class="nav-item">
            <a class="nav-link text-light" href="login.php">Search Donor</a>
           </li>
           <?php }
              else{ 
           ?>
           <li class="nav-item">
            <a class="nav-link text-light" href="donor_seeker_post.php">Search Donor</a>
           </li> <?php } ?>
           <?php
                if(!isset($_SESSION['user'])) { ?>
                  <li class="nav-item">
                      <a class="nav-link text-light" href="login.php">Log In</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-light" href="registation.php">Sign Up</a>
                  </li>
              <?php
                  }
               ?>
              <?php 
              if(isset($_SESSION['user']) && $_SESSION['role'] == "admin") {?>
                 <li class="nav-item">
                    <a class="nav-link text-light" href="search_post.php">Search Post</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link text-light" href="admin_taskbar.php">Administration</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link text-light" href="seeking_post_of_user.php"><?php  
                        //session_start();
                        echo $_SESSION['user']; 
                      ?>'s Post</a>
                 </li>
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php  
                        //session_start();
                        echo $_SESSION['user']; 
                      ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item t" href="logout.php">Log Out</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="view_own_profile.php">View Profile</a>
                    </div>
                </li>
               <?php
                  }
                ?>
               <?php 
              if(isset($_SESSION['user']) && $_SESSION['role'] == "user") {?>
                 <li class="nav-item">
                    <a class="nav-link text-light" href="search_post.php">Search Post</a>
                 </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="seeking_post_of_user.php"><?php  
                        //session_start();
                        echo $_SESSION['user']; 
                      ?>'s Post</a>
                 </li>
                 <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php  
                        //session_start();
                        echo $_SESSION['user']; 
                      ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item " href="logout.php">Log Out</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item " href="view_own_profile.php">View Profile</a>
                    </div>
                </li>
            <?php
                  }
              ?>
        </ul>
      </div>
      </div>
    </nav>
     
</body>
</html>