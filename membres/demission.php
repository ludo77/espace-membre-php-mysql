<?
session_start();
include "../commun/variables.inc.php";
include "./commun/fonctions.inc.php";
//include "./commun/stats.inc.php";
include "./commun/connexion.inc.php";
include "./commun/authentification.inc.php";
$sql="delete from membres where login='$login'";
$resultat=@mysql_query($sql,$id_link);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Supprimer le profil</title>
</head>

<body>

Votre profil a été supprimé.<br />
<br />
Le webmaster
</body>
</html>
