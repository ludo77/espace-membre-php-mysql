<?
$biscuit=$_GET['biscuit'];
if ($biscuit='oui'){
  SetCookie('alias',$alias,time()+ (60*60*24*365*20));
////Il va en prendre pour 20 ans!
  SetCookie('sauf_conduit',$sauf_conduit, time()+(60*60*24*365*20));
}
  session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>La Fabrique de biscuits</title>
</head>

<body>
<?
if (!$biscuit){
echo "Vous n'aimez pas entrer votre login et mot de passe � chaque acc�s au site, pourquoi ne pas utiliser un cookie ? Un cookie est un petit fichier qui garde les param�tres de votre identit� sur votre disque dur. 
Comment faire ? <LI> <b>Internet Explorer</b> : allez dans le menu outils et cliquez sur option internet. Ensuite vous cliquez sur l'onglet \"s�curit�\". Dans la fen�tre, activez l'image du globe (internet) et cliquez sur \"personnaliser le niveau\". Ensuite vous cochez les cases dans la cat�gorie \"cookies\" puis sur \"autoriser les cookies par session (non stock�s)\" et \"autoriser les cookies stock�s sur votre ordinateur\".<LI> <b>Netscape</b> : dans le menu \"�dition\", vous cliquez sur \"pr�f�rences\". Ensuite vous s�lectionnez \"avanc�es\" et vous cochez \"Accepter tous les cookies\".<p>";
echo " <a href=\"$PHP_SELF?biscuit=oui\">Pour enregister le cookie</A>.";
}
else {
echo "Le cookie est cr��, d�sormais vous n'aurez plus besoin de vous identifier sur le site. Cependant, si vous voulez nettoyer de temps en temps votre bo�te � biscuits, il vous suffira de revenir sur cette page. N'oubliez pas de <A HREF=\"#\" onClick=\"window.close()\">fermer la porte</A> en partant.";
}
?>
</body>
</html>
