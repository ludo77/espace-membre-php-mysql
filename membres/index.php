<?
session_start();
include "../commun/variables.inc.php";
include "./commun/fonctions.inc.php";
//include "./commun/stats.inc.php";
include "./commun/connexion.inc.php";
include "./commun/authentification.inc.php";
$sql="select * from emails_perimes where mail='$mail'";
$resultat=@mysql_query($sql,$id_link);
$nbre_rangs=@mysql_num_rows($resultat);
if ($nbre_rangs==1){
$fenetre=1;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Mon tableau de bord</title>
	<script LANGUAGE="JavaScript">
<!--
function confirmDem()
{
var accord=confirm("Vous voulez vraiment supprimer votre profil?");
if (accord)
	return true ;
else
	return false ;
}
<?
if ($fenetre){
echo 'function ouvrir_vasistas(adresse, nom_fenêtre,caracteristiques) {
	window.open(adresse, nom_fenêtre,caracteristiques);
	}';
}
?>

function ouvrir_lucarne(adresse, nom_fenêtre,caracteristiques) {
window.open(adresse, nom_fenêtre,caracteristiques);
}
// -->
</script>

</head>



<?
if ($fenetre){
echo "<body onLoad=\"ouvrir_vasistas('votre_email.php','vasistas','menubar=no,scrollbars=no,statusbar=no, width=300,height=200')\">\n";
}
else {
echo "<body>";
}
?>

<font size="3">Votre profil</font>
<ul>
	<li><a href="inscription_p1.php?action=modifier">modifier mon profil</a>
	<li><a href="demission.php" onCLick="return confirmDem()">supprimer votre compte</a>
 <li><a href="#" onClick="ouvrir_lucarne('fabrique_biscuits.php?biscuit=oui','biscuit','menubar=no,scrollbars=no,statusbar=no, width=300,height=200')">Pour insérer un cookie</A>.
</ul>

</body>
</html>
