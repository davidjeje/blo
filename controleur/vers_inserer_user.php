<?php
function inserer_user()
{
	include(dirname(__FILE__).'/../modele/requete_sql.php');
	$inserer = inserer_user_site();
	include(dirname(__FILE__).'/../vue/connexion_user.php');
};
