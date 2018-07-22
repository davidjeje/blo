<?php

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=blo;charset=utf8', 'root', '');



if ((!empty($_GET['page'])) AND is_file('controleur/'.$_GET['page'].'.php') or isset($_GET['id']))
{
	
	if ($_GET['page'] == 'vers_liste_blog') 
    {
    	include('controleur/'.$_GET['page'].'.php');
        afficher_blog_post();
    } 

    elseif ($_GET['page'] == 'vers_le_blog') 
    {
        include('controleur/'.$_GET['page'].'.php');
        afficher_un_post();
        //afficher_les_commentaires();
    }

    elseif ($_GET['page'] == 'vers_la_connexion_admin') 
    {
        include('controleur/'.$_GET['page'].'.php');
        afficher_la_connexion();
    }

    elseif ($_GET['page'] == 'vers_le_menu_admin') 
    {
        include('controleur/'.$_GET['page'].'.php');
        conect();
    }

    elseif ($_GET['page'] == 'vers_la_validation_comment') 
    {
        include('controleur/'.$_GET['page'].'.php');
        afficher_la_validation_comment();
    }

    elseif ($_GET['page'] == 'vers_insert_comment') 
    {
        include('controleur/'.$_GET['page'].'.php');
        inserer_comment();
    }

    elseif ($_GET['page'] == 'vers_menu_admin_sans_passsword') 
    {
        include('controleur/'.$_GET['page'].'.php');
        afficher_menu_admin();
    }

    elseif ($_GET['page'] == 'vers_admin_ajout_blog') 
    {
        include('controleur/'.$_GET['page'].'.php');
        afficher_admin_ajout();
    }

    elseif ($_GET['page'] == 'vers_admin_modif_blog') 
    {
        include('controleur/'.$_GET['page'].'.php');
        afficher_modif_blog();
    }

    elseif ($_GET['page'] == 'vers_admin_sup_blog') 
    {
        include('controleur/'.$_GET['page'].'.php');
        afficher_sup_blog();
    }

    elseif ($_GET['page'] == 'vers_admin_message_ajout_blog') 
    {
        include('controleur/'.$_GET['page'].'.php');
        valide_ajout_blog();
    }

    elseif ($_GET['page'] == 'vers_admin_message_sup_blog') 
    {
        include('controleur/'.$_GET['page'].'.php');
        valide_sup_blog();
    }

    elseif ($_GET['page'] == 'vers_admin_message_modif_blog') 
    {
        include('controleur/'.$_GET['page'].'.php');
        valide_modif_blog();
    }

    elseif ($_GET['page'] == 'form_modif_valide') 
    {
        include('controleur/'.$_GET['page'].'.php');
        valide_modif_blog_form();
    }

    elseif ($_GET['page'] == 'vers_la_validation_comment_table') 
    {
        include('controleur/'.$_GET['page'].'.php');
         inserer_comment_table();
    }

    elseif ($_GET['page'] == 'vers_la_sup_comment_table') 
    {
        include('controleur/'.$_GET['page'].'.php');
         sup_comment_table();
    }

     elseif ($_GET['page'] == 'vers_traitement_email') 
    {
        include('controleur/'.$_GET['page'].'.php');
         envoyer_email();
    }

     elseif ($_GET['page'] == 'vers_connexion_user') 
    {
        include('controleur/'.$_GET['page'].'.php');
         connexion_user();
    }

    elseif ($_GET['page'] == 'vers_inserer_user') 
    {
        include('controleur/'.$_GET['page'].'.php');
         inserer_user();
    }

}

else
{
	include('controleur/index.php');
    afficher_page_accueil();
}
?>
