<?php
require_once "functions.php";

if(!isset($navbarItem)) $navbarItem = 'home';
?>

<!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="vendor/images/logos/logo2.png" alt="logo" width=90>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <!--<div class="container h-100">-->
          <div class="d-flex justify-content-center h-100">
            <div class="searchbar">
              <input class="search_input" type="text" name="" placeholder="Search...">
              <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
            </div>
          </div>
        </div>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link<?php if($navbarItem === 'home') echo ' active'?>" href="index.php">Accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
          <?php if (isConnected()){?>
                  <li class="nav-item">
                    <a class="nav-link<?php if($navbarItem === 'profile') echo ' active'?>" href="profile.php">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link<?php if($navbarItem === 'booking') echo ' active'?>" href="booking.php">Réserver</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="logout.php">Déconnexion</a>
                  </li>
          <?php } else{?>
                  <li class="nav-item">
                      <a class="nav-link<?php if($navbarItem === 'login') echo ' active'?>" href="login.php">Connexion</a>
                  </li>
              <?php } ?>

        </ul>
      <!--</div>-->
    </div>
  </nav>
