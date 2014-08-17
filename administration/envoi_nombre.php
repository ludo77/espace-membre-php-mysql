<?
include "commun/fonctions.inc.php";
include "/commun/stats.inc.php";
if ($message){
$sql="select * from membres";
	   $resultat=mysql_query($sql,$id_link);
while($rang=mysql_fetch_array($resultat)){
	   $login=$rang['login'];
		$nom=majuscules($nom);
	   $password=$rang['password'];
	   $destinataire=$rang['mail'];
	$message.="\n\n"."/membres/index.php?login=$login&password=$password";
mail ("$destinataire","Webmaster","$message");
	  }
	  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>envoi en nombre</title>
	<SCRIPT LANGUAGE="JavaScript">
<!--
function ouvrir_message() { 
var hauteur=screen.height;
hauteur*=80/100;
var largeur=screen.width;
largeur*=80/100;
FenetreAfficher= window.open('','lecture','menubar=yes,scrollbars=yes,statusbar=no, width=' + largeur + ', height=' + hauteur +',top=0,left=0');
message= document.forms[0].message.value;
message_secret=message;
message = message.replace(/\n/,"<BR>\n");
message +="<P><A HREF=\"Je ferme la fenêtre\" onClick=\"window.close()\">Je ferme la fenêtre</a>\n";
FenetreAfficher.document.write(message);

}
-->
</script>
</head>

<body>
<?
if (!$message){
echo "<form action=\"$PHP_SELF\" method=\"post\">";
echo "<textarea cols=80 rows=80 name=\"message\"></textarea>";
echo "<input type=\"submit\" value=\"Envoyer\">";
echo "</form>";
echo "<A HREF=\"#\" onClick=\"ouvrir_message()\">Visualiser le message</a>";
}
else {
echo "Le message a été envoyé aux membres du site";
}

?>

</body>
</html>
