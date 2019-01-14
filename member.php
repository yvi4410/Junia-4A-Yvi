<?php
session_start();
//Si un utilisateur non connecté essaye d'accéder à cette partie
//on le redirige immédiatemment vers la page de connexion
if (!isset($_SESSION['login'])){
	header('Location: connect.php');
}
include_once "user.php";

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

	<div class="formulaire">
		<a>Welcome <?php echo $_SESSION['login']; ?> !</a><br>
		<br><br>
		<a class="bouton" href="index.php">Home</a>
		<br><br>
		<a class="bouton" href="disconnect.php">Disconnect</a>
	<?php
	if (isset($log))
		echo '<div class="message">'.$log.'</div>';
	?>
	

	<div id="panel">
		<?php
			$current_user = User::findByLogin($_SESSION['login']);
			// $admin = $current_user->getAttr("chmod");
			// if($admin==1){
			// }
			// echo '<a href="admin.php?a=supp">Delete his account</a>';
		?>
	</div>
	</body>
</html>
