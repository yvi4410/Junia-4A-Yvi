<?php
include_once 'controller.php';
include_once 'Base.php';
/* Même modèle que admin.php
 * Construit le contrôleur adéquat
 * puis appelle fonction principale en
 * passant en paramètre l'URL
 */
$c = new Controller();
$c->callAction( $_GET );
?>
