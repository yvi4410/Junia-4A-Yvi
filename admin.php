<?php
session_start();
/*
 * Gestion de la partie admin
 */
include_once 'Controller.php';

	/* Permet de supprimer son compte */
	public function supprimerCompte(){
		//Si un utilisateur veut supprimer son compte
		//on le déconnecte puis on supprime son compte
		if(isset($_SESSION['login'])){
			$current = Utilisateur::findByLogin($_SESSION['login']);
			session_unset();
			session_destroy();
			$n = $current->delete();
			header("Location: blog.php");
		//Sinon c'est qu'il a atteint cette url sans en avoir l'autorisation
		}else{
			echo "Vous n'avez rien à faire ici";
		}
	}



}
?>
