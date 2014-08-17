<?
session_start();
include "../commun/variables.inc.php";
include "./commun/fonctions.inc.php";
//include "./commun/stats.inc.php";
include "./commun/connexion.inc.php";
$sql="select clef from membres where mail='$mail'";
$resultat=@mysql_query($sql,$id_link);
$nombre=mysql_num_rows ($resultat);
if ($nombre >0){
$auth=1;
include "inscription_p1.php";
exit;
}

$sql="INSERT INTO membres (prenom, nom, mail) VALUES ('$prenom', '$nom', '$mail')";
mysql_query($sql,$id_link);
?>
<html>
<head>
<font color="#FF0000">  <title>Inscription</title></font>
  <SCRIPT LANGUAGE="JavaScript">
<!--
var unique=0;
function verif_formulaire(){
if (verif_champs()==true && envoi()==true){
return true;
}
return false;
}
function verif_champs(){
if (document.forms[0].login.value.length<1){
	alert("Veuillez ajouter votre login, Merci");
	document.forms[0].login.focus();
	return false;
}
if (document.forms[0].password.value.length<8){
	alert("Veuillez ajouter votre mot de passe de plus de 8 caractères, Merci");
	document.forms[0].password.focus();
	return false;
}
if (document.forms[0].passwordbis.value.length<8){
	alert("Veuillez taper à nouveau votre mot de passe dans le 2e champ, Merci");
	document.forms[0].passwordbis.focus();
	return false;
}
if (document.forms[0].password.value!= document.forms[0].passwordbis.value){
	alert("Vos mots de passe ne coïncident pas, veuillez les taper à nouveau, Merci");
	document.forms[0].password.focus();
	return false;
}

if (document.forms[0].password.value==document.forms[0].login.value){
	alert("Votre login ne peut être identique à votre mot de passe, veuillez le taper à nouveau, Merci");
	document.forms[0].login.focus();
	return false;
}
return true;
}
function envoi(){
if (unique == 0){
unique++;
return true;
}
else {
alert("Envoi en cours...!");
return false;
}
}

-->
</SCRIPT>
</head>
<body>
Veuillez maintenant choisir le login que vous porterez sur le site et le mot de passe pour y accéder. Vous pourrez ainsi rencontrer d'autres membres et modifier votre profil, voire le supprimer éventuellement.
<?
if ($auth==2){
echo "<p><font color=\"#FF0000\">Votre login existe déjà dans la base de données. Soit vous êtes déjà membre et vous avez <a href=\"oubli.php\">oublié votre mot de passe</a>. Soit il s'agit d'une simple coïncidence, dans lequel cas, entrez <a href=\"#\" onClick=\"ouvrir_vasistas('oubli.php','vasistas','menubar=no,scrollbars=no,statusbar=no, width=300,height=200')\">oublié votre mot de passe</A>...</font></p>";
}
echo "<br> <br>";
?>
<form action="traitement_id.php" method="post" onSubmit="return verif_formulaire()">
<table cellspacing="2" cellpadding="2" border="0">
<tr>
 <td>Votre login</td>
 <td><input type="text" name="login"></td>
</tr>
<tr>
 <td>Votre mot de passe</td>
 <td><input type="password" name="password"></td>
</tr>
<tr>
 <td>Retapez votre mot de passe</td>
 <td><input type="password" name="passwordbis"></td>
</tr>
<tr>
 <td>&nbsp;</td>
 <td>
 <?
 echo "<input type=\"hidden\" name=\"mail\" value=\"$mail\" size=\"50\">";
 ?>
 </td>
</tr>

<tr>
 <td>&nbsp;</td>
 <td><input type="submit" name="soumettre" value="Je valide"></td>
</tr>
</table>
</form>
</body>
</html>
