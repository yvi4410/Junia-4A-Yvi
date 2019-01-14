<?php
include_once "user.php";
session_start();

if (!empty($_SESSION['login'])){
	$log = 'You are already connected.<br>';
	header("Refresh: 2, url=index.php");
}
if (isset($_POST['submit']) && $_POST['submit'] == 'Submit'){
	if (isset($_POST['mail']) && !empty($_POST['mail'])){
		$mail = htmlentities($_POST['mail']);
		$user = user::findByMail($mail);
		//Si l'utilisateur n'existe pas
		if($user==false){
			$log = "This user does not exist.<br>";
		}
		else{
			//Tout va bien
			try{$user->sendmail();}
			catch (Exception $e){
			die('Error : ' . $e->getMessage());}
			$log = 'E-mail sent ! <br>';
			$log .= 'redirecting... <br>';
			//On le redirige vers l'accueil

			$_SESSION['login'] = $_POST['login'];
			header("Refresh: 3; url=connect.php");
		}
	}else{
		$log = 'Empty mail.<br>';
	}
}else if(isset($_POST['home']) && $_POST['home'] == 'Home') {
	header("Location: index.php");
}

?>


<!-- Code html du formulaire-->
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
		<form action="password.php" method="post">
		<div class="center">
			<span class="label">Mail</span>
			<input class="champ" type="text" name="mail" maxlength="50" value="<?php if (isset($_POST['mail'])) echo htmlentities(trim($_POST['mail']))?>"/><br>
			<br><br>
			<?php
			if (isset($log))
				echo '<div class="message">' . $log . '</div><br><br>';
			?>
			<input class="bouton" type="submit" name="submit" value="Submit" />
			<br><br>
			<input class="bouton" type="submit" name="home" value="Home" />
		</div>
		</form>
		<script type="text/javascript" src="js/jquery.min.js"></script>
	</body>
</html>