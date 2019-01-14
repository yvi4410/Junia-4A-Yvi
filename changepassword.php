<?php
include_once "user.php";
session_start();
//Si l'utilisateur est déjà connecté on l'amène sur son espace membre
$isconnected = 0;
if (!empty($_SESSION['login'])){
	$isconnected = 1;
}

if ($isconnected == 0){
	// retrieve token
	if (isset($_GET["token"]) && preg_match('/^[0-9A-F]{40}$/i', $_GET["token"])) {
	    $token = $_GET["token"];
	    $userid = $_GET["userid"];
	}else {
	    header('Location: nowhere.php');
	}

	// verify token
	$islegit = User::verifyToken($userid, $token);
		//Si l'utilisateur n'existe pas
	if($islegit==true){

		if (isset($_POST['submit']) && $_POST['submit'] == 'Submit'){
			if( (isset($_POST['password']) && !empty($_POST['password']))
			&& (isset($_POST['password_c']) && !empty($_POST['password_c']))){

				//Les mots de passe
				if($_POST['password'] != $_POST['password_c']){
					$log = '<both words are not equivalent.<br>';
				}else{
					$password = $_POST['password'];
					$newpassword = User::changePassword($userid, $password);
					if($newpassword!=false){
						$user = User::findById($userid);
						$login = $user->getAttr("login");
						$log = 'Your password has been changed. <br>';
						$log .= 'Connecting... <br>';
						//On le redirige vers l'espace membre

						$_SESSION['login'] = $login;
						header("Refresh: 3; url=member.php");
					}else{
						$log = 'Password update failed.<br>';
					}
				}
			}

		}else{
			$log = 'At least one space is empty.<br>';
		}

	}else {
	    header('Location: nowhere.php');
	}
}else{
		if (isset($_POST['submit']) && $_POST['submit'] == 'Submit'){
			if( (isset($_POST['password']) && !empty($_POST['password']))
			&& (isset($_POST['password_c']) && !empty($_POST['password_c']))){

				//Les mots de passe
				if($_POST['password'] != $_POST['password_c']){
					$log = '<both words are not equivalent.<br>';
				}else{
					User::changePassword($userid, $password); // voir userid   (session vaut login etc)

					$log = 'Your password has been changed. <br>';
					$log .= 'Redirecting... <br>';
					//On le redirige vers l'accueil

					header("Refresh: 3; url=member.php");
				}
			}

		}else{
			$log = 'At least one space is empty.<br>';
		}	


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
    <!-- title -->v
    <h1 class="big-title centered"><?php echo $name ?></h1>

		<div class="formulaire">
			<div class="jumbotron row centered shadow rounded">
				<form action="changepassword.php" method="post">
					<span class="label">Password </span>
					<input class="champ" type="password" name="password" maxlength="20" value="<?php if (isset($_POST['password'])) echo htmlentities(trim($_POST['password']))?>"/><br>
					<br>
					<span class="label">Confirm   </span>
					<input class="champ" type="password" name="password_c" maxlength="20" value="<?php if (isset($_POST['password_c'])) echo htmlentities(trim($_POST['password_c']))?>"/><br><br>
					<br><br>
					<?php
					if (isset($log))
						echo '<div class="message">' . $log . '</div><br><br>';
					?>
					<input class="bouton" type="submit" name="submit" value="Submit" />
				</form>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery.min.js"></script>
	</body>
</html>
