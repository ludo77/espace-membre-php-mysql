<?
include "commun/fonctions.inc.php";
include"/commun/stats.inc.php";
if ($email){
$sql="insert into emails_perimes (email) VALUES('$email')";
mysql_query($sql,$id_link);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
 <title>Entr�e des adresses emails p�rim�es</title>
</head>
<body>
<?
echo "<form action=\"$PHP_SELF\" method=\"post\">";
?>
email p�rim� :<input type="text" name="mail">
<input type="submit" value="Entrer">
</form>
</body>
</html>
<?
/////////ENL�VE LES EMAILS RECTIFI�S DE LA LISTE DES EMAILS P�RIM�S////
$sql="select emails_perimes.* from emails_perimes LEFT JOIN membres ON emails_perimes.mail=membres.mail where membres.clef IS NULL";
$resultat=@mysql_query($sql,$id_link);
while($rang=@mysql_fetch_array($resultat)){
$email=$rang['mail'];
$sql_efface="delete from emails_perimes WHERE mail='$mail'";
@mysql_query($sql_efface,$id_link);
}
$hier= date ("Ymd", mktime (0,0,0,date("m")-1,date("d"),date("Y")));
 //il y a un mois
$sql ="select email from emails_perimes WHERE moment<$hier";
$resultat=@mysql_query($sql,$id_link);
 while($rang=@mysql_fetch_array($result)){
 $mail=$rang['mail'];
 $sql_efface="delete from emails_perimes where mail='$mail'";
 @mysql_query($sql_efface,$id_link);
 $sql_efface="delete from membres where mail='$mail'";
 @mysql_query($sql_efface,$id_link);
 }
?>