<!DOCTYPE html>

<?php
session_start();
include_once 'base.php';
?>


<html>
  <?php $page = basename(__FILE__);
        $name = '';
        include ('head.php');
  ?>
  <body>

    <?php include ('header.php') ?>
    <!-- title -->
    <h1 class="big-title centered"><?php echo $name ?></h1>

    <div class="container">
      <h3>Welcome on this website, have fun and most of all, good luck!</h3>
      <br><br>
      <div class="formulaire">
        <div class="center">
          <a class="bouton" href="blackjack.php">Play Blackjack</a>
          <br><br><br>
          <a class="bouton" href="poker.php">Play Poker</a>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
  </body>
</html>