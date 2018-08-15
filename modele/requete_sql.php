<?php
function afficher_liste_post()
{
	global $bdd;
	$news= array();
	$req= $bdd ->query('SELECT id, author, title, chapo, content, image, date_display FROM blog_post');
	while ($data = $req->fetchall()) 
	{
		
		$news = $data;
		return $news;
	}
	$req->closeCursor();
};

function afficher_liste_post_recent()
{
	global $bdd;
	$news= array();
	$req= $bdd ->query('SELECT id, author, title, chapo, content, image, date_display FROM blog_post ORDER BY date_display DESC LIMIT 0,15');
	while ($data = $req->fetchall()) 
	{
		
		$news = $data;
		return $news;
	}
	$req->closeCursor();
};

function afficher_le_post()
{
	global $bdd;
	$req = $bdd->prepare('SELECT id, author, title, chapo, content, image, date_display FROM blog_post WHERE id= :id ');
	$req->execute(array('id' => $_GET['id']));
	$show= $req->fetchall();
	return $show;
	$req->closeCursor();
};

function afficher_le_commentaire()
{
	global $bdd;
	$req = $bdd->prepare('SELECT id, user_id, blog_post_id, message, auteur, date_display FROM comment WHERE blog_post_id= :id');
	$req->execute(array('id' =>$_GET['id']));
	$dat = $req->fetchall(); 
	return $dat;
	$req->closeCursor();
};

function inserer_le_commentaire()
{
	global $bdd;
	
	$req = $bdd->prepare('INSERT INTO comment_to_validate (blog_post_id, message, auteur) VALUES(?,?,?)');
	$req->execute(array($_GET['blog_post_id'], $_POST['message'], $_POST['auteur']));
	
	$req->closeCursor();
};

function afficher_le_commentaire_partie_admin()
{
	global $bdd;
	$news= array();
	$req = $bdd->query('SELECT id, user_id, blog_post_id, message, auteur, date_display FROM comment_to_validate');
	while ($data = $req->fetchall()) 
	{
		
		$news = $data;
		return $news;
	}
	
	$req->closeCursor();
};

function inserer_le_blog_post()
{
	global $bdd;
	
	$req = $bdd->prepare('INSERT INTO blog_post ( author, title, chapo, content) VALUES(?,?,?,?)');
	$req->execute(array($_POST['author'], $_POST['title'], $_POST['chapo'], $_POST['content']));
	
	$req->closeCursor();
};

function afficher_le_post_form()
{
	global $bdd;
	$req = $bdd->prepare('SELECT id, author, title, chapo, content, image, date_display FROM blog_post WHERE id= :id LIMIT 1');
	$req->execute(array('id' => $_GET['id']));
	$show= $req->fetch();
	return $show;
	$req->closeCursor();
};


function modifier_le_blog_post()
{
	global $bdd;
	
	$req = $bdd->prepare('UPDATE blog_post SET author = :author, title = :title, chapo = :chapo, content = :content WHERE id = :id LIMIT 1');
	
	$req->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
	$req->bindValue(':author', $_POST['author'], PDO::PARAM_STR);
	$req->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
	$req->bindValue(':chapo', $_POST['chapo'], PDO::PARAM_STR);
	$req->bindValue(':content', $_POST['content'], PDO::PARAM_STR);

	$req->execute();

	$req->closeCursor();
};

function supprimer_le_blog_post()
{
	global $bdd;
	
	$req = $bdd->prepare('DELETE FROM blog_post WHERE id = :id LIMIT 1');

	$req-> bindValue(':id', $_GET['id'], PDO:: PARAM_INT);
	


	$req->execute();
	
	$req->closeCursor();
};

function inserer_le_commentaire_valider()
{
	global $bdd;
	
	$req = $bdd->prepare('INSERT INTO comment (id, blog_post_id, message, auteur) VALUES(?,?,?,?)');
	$req->execute(array($_GET['id'], $_GET['blog_post_id'], $_GET['message'], $_GET['auteur']));
	
	$req->closeCursor();
};

function supprimer_le_commentaire()
{
	global $bdd;
	
	$req = $bdd->prepare('DELETE FROM comment_to_validate WHERE id = :id LIMIT 1');

	$req-> bindValue(':id', $_GET['id'], PDO:: PARAM_INT);
	


	$req->execute();
	
	$req->closeCursor();
};



function inserer_user_site()
{
	global $bdd;
	
	$req = $bdd->prepare('INSERT INTO user (password, pseudo, email) VALUES(?,?,?)');
	$req->execute(array($_POST['password'], $_POST['prenom'], $_POST['email']));
	
	$req->closeCursor();
};
