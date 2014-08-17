<?
session_start();
if ($_POST['nouvel_email']){
$nouvel_email=$_POST['nouvel_email'];
}
include "../commun/variables.inc.php";
include "./commun/fonctions.inc.php";
//include "./commun/stats.inc.php";
include "./commun/connexion.inc.php";
include "./commun/authentification.inc.php";
if ($nouvel_email){
$sql="update membres set mail='$nouvel_email' where clef='$clef'";
mysql_query($sql,$id_link);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Votre nouvel email</title>
</head>
<body>
<?
if (!$nouvel_email){
echo "Bonjour, l'adresse email, $mail, que vous nous avez fourni n'est plus valide. Voulez-vous entrer votre nouvel email ?";
echo "<form action=\"$PHP_SELF\" method=\"post\">";
echo 'Votre email&nbsp;:&nbsp;<input type="text" name="nouvel_email">';
echo '<input type="submit" value="Envoyez">';
echo '</form>';
}
else {
echo "Merci de votre contribution votre email a été changé en $nouvel_email";
}
?>
</body>
</html>
