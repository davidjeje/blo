<?php
function valide_ajout_blog()
{
	include(dirname(__FILE__).'/../modele/requete_sql.php');
	$inserer= inserer_le_blog_post();
	include(dirname(__FILE__).'/../admin/validation_blog_ajouter.php');
}
?>
