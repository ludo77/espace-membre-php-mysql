<?
session_start();
$mail=$_POST['mail'];
$password=$_POST['password'];
$login=$_POST['login'];
include "../commun/variables.inc.php";
include "./commun/fonctions.inc.php";
//include "./commun/stats.inc.php";
include "./commun/connexion.inc.php";
$sql="SELECT prenom, password FROM membres WHERE login='$login'";
$resultat=@mysql_query($sql,$id_link);
$nombre=@mysql_num_rows ($resultat);
if ($nombre >0){
$auth=2;
include "inscription_p2.php";
exit;
}
else {
$rang=mysql_fetch_array($resultat);
$prenom=$rang['prenom'];
$password=$rang['password'];
$contenu="Bienvenue $prenom,\nVous faites désormais partie des membres du site. Votre login sur le site est $login et votre mot de passe $password. Conservez-le afin d'avoir accès au site.\nCordialement\nle Webmestre\n";
Format texte
$entete="From: \"site perso\" <aaa@aaa>\n";
mail ("$mail","BIENVENUE sur le site perso","$contenu",$entete);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Fin de l'inscription</title>
</head>

<body>
<?
/*/////////////////////////DATE SOUS LA FORME AAAAMMJJ/////////////////////////////////*/
$moment=date ("Ymd", mktime (0,0,0,date("m"),date("d"),date("Y")));
$mail= strtolower($mail);
$sql="UPDATE membres SET login='$login', password='$password', inscription='$moment' WHERE mail='$mail'";
@mysql_query($sql,$id_link);
echo "Merci de votre inscription et bienvenue sur le site. Nous venons de vous envoyer un courriel de confirmation avec votre login et votre mot de passe.<p>\n<CENTER><i>Le webmestre</i></CENTER>";
$hier=date ("Ymd", mktime (0,0,0,date("m"),date("d")-1,date("Y")));
$sql="DELETE FROM membres WHERE login='' AND misajour<$hier";
@mysql_query($sql,$id_link);
?>
</body>
</html>

