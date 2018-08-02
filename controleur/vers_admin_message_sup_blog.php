<?php
function valide_sup_blog()
{
	include(dirname(__FILE__).'/../modele/requete_sql.php');
	$sup = supprimer_le_blog_post();
	include(dirname(__FILE__).'/../admin/validation_blog_sup.php');
}
?
