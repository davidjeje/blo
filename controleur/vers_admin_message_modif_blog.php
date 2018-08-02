<?php
function valide_modif_blog()
{
	include(dirname(__FILE__).'/../modele/requete_sql.php');
	$ne= afficher_le_post();
	include(dirname(__FILE__).'/../admin/validation_blog_modif.php');
}
?>
