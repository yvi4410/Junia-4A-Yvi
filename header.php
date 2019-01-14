<header class="header-section">
  <div class="header-warp">
    <!-- Site Logo -->
    <a href="index.php" class="site-logo">
      <img class="site-logo" src="img/icon.png" alt="logo">
    </a>
    <!-- responsive -->
    <div class="nav-switch">
      <i class="fa fa-bars"></i>
    </div>
    <!-- Main Menu -->
    <ul class="main-menu">
      <li <?php if($page == "index.php") echo 'class="active"' ?>><a  href="index.php">Home</a></li>
      <li <?php if($page == "blackjack.php") echo 'class="active"' ?>><a href="blackjack.php">BlackJack</a></li>
      <li <?php if($page == "poker.php") echo 'class="active"' ?>><a href="poker.php">Poker</a></li>
      <li <?php if($page == "about.php") echo 'class="active"' ?>><a href="about.php">About</a></li>
      <?php
      //Si le membre est connecté on affiche le menu-connection
      if (!empty($_SESSION['login'])){ ?>
      <li <?php echo htmlentities(trim($_SESSION['login']));
                if($page == "member.php") echo 'class="active"'; ?>><a href="member.php">Member space</a></li>
      <?php }?>
       
      <?php
      //Si le membre n'est pas connecté on affiche le menu-deconnecter
      if(empty($_SESSION['login'])){ ?>
      <li <?php {if($page == "connect.php" || $page == "register.php" || $page == "password.php") echo 'class="active"';} ?>><a href="connect.php">Login</a></li>
      <?php } ?>

      <!-- <li <?php # if($page == "member.php") echo 'class="active"' ?>><a href="membre.php">Member space</a></li> -->
    </ul>
  </div>
</header>
