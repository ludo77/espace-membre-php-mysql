<?
session_start();
if ($_POST['passage']){
$passage=$_POST['passage'];
}
if ($_POST['mail']){
$mail=$_POST['mail'];
}
include "../commun/variables.inc.php";
include	"./commun/fonctions.inc.php";
//include "./commun/stats.inc.php";
include "./commun/authentification.inc.php";
if ($passage==3){
$passage="";
if (!$_SESSION['tentative']){
$tentative=1;
}
else{
$tentative=$_SESSION['tentative'];
$tentative++;
}
session_register("tentative");
}
elseif ($passage==1){
$sql="select mail from membres where login='$login'";
$resultat=@mysql_query($sql,$id_link);
$rang=mysql_fetch_array($resultat);
$mail=$rang['mail'];
}

?>
<html>
<head>
<title>Oubli</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?
echo "<form name=\"form1\" method=\"post\" action=\"$PHP_SELF\">";
if (!$passage){
echo ' Votre surnom : <input type="text" name="login">';
echo '<input type="hidden" name="passage" value="1">';
echo '<BR><input type="submit" name="Submit" value="Soumettre">';
}
elseif ($passage==1){

echo "<BR>\n";
echo ' Votre email : <input type="text" name="mail">';
echo '<input type="hidden" name="passage" value="2">';
echo '<BR><input type="submit" name="Submit" value="Soumettre">';
}
if ($passage==2){
echo "Nous venons de vous envoyer un email avec votre mot de passe";
echo "<BR>\n";
echo "<input type=\"submit\" name=\"Submit\" value=\"D'accord!\" onCLick=\"window.close()\">";
$message="Bonjour";
elseif ($tentative==3){
echo "Vous avez fait 3 tentatives, nous vous suggérons de contacter plutôt le <a href=\"mailto:ludovic.bridoux787@orange.fr?Subject=J'ai oublié mon mot de passe\">webmestre</a>";
}
else {
echo "Votre email est incorrecte!</a>";
echo '<input type="hidden" name="passage" value="3">';
echo "<BR>\n";
echo "<input type=\"submit\" name=\"Submit\" value=\"Tenter une nouvelle fois ?\">";
}
}

?>

</form>
</body>
</html>

