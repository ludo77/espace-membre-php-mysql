<?
session_start();
include "../commun/variables.inc.php";
include "./commun/fonctions.inc.php";
//include "./commun/stats.inc.php";
include "./commun/connexion.inc.php";

if ($action=='modifier'){
$sql="select * from membres where clef='$clef'";
$resultat=mysql_db_query($dbname ,$sql, $id_link);
$rang=mysql_fetch_array($resultat);
$clef=$rang['clef'];
$login=$rang['login'];
$password=$rang['password'];
$nom=$rang['nom'];
$prenom=$rang['prenom'];
$grade=$rang['grade'];
$mail=$rang['mail'];
}

?>
<html>
<head>
  <title>Inscription</title>
  <SCRIPT LANGUAGE="JavaScript">
<!--
var unique=0;
function ouvrir_vasistas(adresse, nom_fen�tre,caracteristiques) { 
  window.open(adresse, nom_fen�tre,caracteristiques);
}
function verif_formulaire(){
if (verif_champs()==true && verif_email()==true && envoi()==true){
return true;
}
return false;
}
function verif_champs(){
if (document.forms[0].prenom.value.length<1){
	alert("Veuillez ajouter votre pr�nom, Merci");
	document.forms[0].prenom.focus();
	return false;
}
if (document.forms[0].nom.value.length<1){
	alert("Veuillez ajouter votre nom, Merci");
	document.forms[0].nom.focus();
	return false;
}
if (document.forms[0].mail.value.length<5){
	alert("Veuillez ajouter votre email, Merci");
	document.forms[0].mail.focus();
	return false;
}
<?
if ($action=='modifier'){
echo '
if (document.forms[0].password.value.length<8){
	alert("Veuillez ajouter votre mot de passe de plus de 8 caract�res, Merci");
	document.forms[0].password.focus();
	return false;
}
if (document.forms[0].passwordbis.value.length<8){
	alert("Veuillez taper � nouveau votre mot de passe dans le 2e champ, Merci");
	document.forms[0].passwordbis.focus();
	return false;
}
if (document.forms[0].password.value!= document.forms[0].passwordbis.value){
	alert("Vos mots de passe ne co�ncident pas, veuillez les taper � nouveau, Merci");
	document.forms[0].password.focus();
	return false;
}

if (document.forms[0].password.value==document.forms[0].login.value){
	alert("Votre login ne peut �tre identique � votre mot de passe, veuillez le taper � nouveau, Merci");
	document.forms[0].login.focus();
	return false;
}
';
}
?>
return true;

}

function verif_email (){
var c=document.forms[0].mail.value;
var test="" + c;
for(var k = 0; k < test.length;k++)
{
	var d = test.substring(k,k+1);
	if(d == "@")
	{
		return true;
	}
}
alert("Votre E-mail n'est pas valide, Merci");
document.forms[0].mail.focus();
return false;
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
<?
if (!$action){
echo "Pour vous inscrire sur le site, nous avons besoin de quelques renseignements.<br>Pr�parez un login pour le site et un mot de passe de plus de 8 caract�res dont vous vous souviendrez facilement.\n";
}
if ($auth==1){
echo "<p><font color=\"#FF0000\">Vous �tes d�j� membre et vous avez peut-�tre <a href=\"#\" onClick=\"ouvrir_vasistas('oubli.php','vasistas','menubar=no,scrollbars=no,statusbar=no, width=300,height=200')\">oubli� votre mot de passe</A>.</font></p>";
}
elseif ($auth==3){
echo "<p><font color=\"#FF0000\">Pour entrer dans ces pages, il vous faut vous inscrire sur le site, Merci. Au cas o� vous auriez <a href=\"#\" onClick=\"ouvrir_vasistas('oubli.php','vasistas','menubar=no,scrollbars=no,statusbar=no, width=300,height=200')\">oubli� votre mot de passe</A>...</font></p>";
}
$hier=date ("Ymd", mktime (0,0,0,date("m"),date("d")-1,date("Y")));
$sql="DELETE FROM membres WHERE login='' AND misajour<$hier";
@mysql_query($sql,$id_link);

?>
<form action="inscription_p2.php" method="post" onSubmit="return verif_formulaire()">
<table cellspacing="2" cellpadding="2" border="0">
<tr>
 <td>Votre pr�nom :</td>
 <td>
 <?
 echo "<input type=\"text\" name=\"prenom\" size=\"30\" value=\"$prenom\">";
 ?>
 </td>
</tr>
<tr>
 <td>Votre nom :</td>
 <td>
  <?
 echo "<input type=\"text\" name=\"nom\" size=\"30\" value=\"$nom\">";
 ?>
 </td>
</tr>
<tr>
 <td>Votre email :</td>
 <td>
 <?
 echo "<input type=\"text\" name=\"email\" size=\"12\" value=\"$email\">";
 ?>
 </td>
</tr>
<?
if ($action=='modifier'){
echo "<tr>";
echo "<td>Votre nouveau mot de passe</td>";
echo "<td><input type=\"password\" name=\"password\" value=\"$password\"></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Retapez votre mot de passe</td>";
echo "<td><input type=\"password\" name=\"passwordbis\" value=\"$password\"></td>";
echo "</tr>";
}
?>
<tr>
 <td></td>
 <td><input type="submit" name="soumission" value="Je m'inscris"></td>
</tr>
</table>
</form>
</body>
</html>

