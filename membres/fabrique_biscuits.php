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
echo "Vous n'aimez pas entrer votre login et mot de passe à chaque accès au site, pourquoi ne pas utiliser un cookie ? Un cookie est un petit fichier qui garde les paramètres de votre identité sur votre disque dur. 
Comment faire ? <LI> <b>Internet Explorer</b> : allez dans le menu outils et cliquez sur option internet. Ensuite vous cliquez sur l'onglet \"sécurité\". Dans la fenêtre, activez l'image du globe (internet) et cliquez sur \"personnaliser le niveau\". Ensuite vous cochez les cases dans la catégorie \"cookies\" puis sur \"autoriser les cookies par session (non stockés)\" et \"autoriser les cookies stockés sur votre ordinateur\".<LI> <b>Netscape</b> : dans le menu \"édition\", vous cliquez sur \"préférences\". Ensuite vous sélectionnez \"avancées\" et vous cochez \"Accepter tous les cookies\".<p>";
echo " <a href=\"$PHP_SELF?biscuit=oui\">Pour enregister le cookie</A>.";
}
else {
echo "Le cookie est créé, désormais vous n'aurez plus besoin de vous identifier sur le site. Cependant, si vous voulez nettoyer de temps en temps votre boîte à biscuits, il vous suffira de revenir sur cette page. N'oubliez pas de <A HREF=\"#\" onClick=\"window.close()\">fermer la porte</A> en partant.";
}
?>
</body>
</html>
