<?
if (!isset($_SERVER['PHP_AUTH_USER'])) {
header('WWW-Authenticate: Basic realm="site perso"');
header('HTTP/1.0 401 Unauthorized');
$auth=3;
include "inscription_p1.php";
exit;
}
elseif (isset($_SERVER['PHP_AUTH_USER'])) {
$sql = "SELECT * FROM membres WHERE login='$PHP_AUTH_USER' and password='$PHP_AUTH_PW'";
$resultat=mysql_query($sql,$id_link);
$nombre = @mysql_num_rows($resultat);
if (!$nombre || $nombre<1) {
header('WWW-Authenticate: Basic realm="site perso"');
header('HTTP/1.0 401 Unauthorized');
$auth=3;
include "https://192.168.1.4/inscription_p1.php";
exit;
}
}
if(isset($alias)){
  $sql = "SELECT * FROM membres WHERE login='$alias' and password='$sauf_conduit'";
 $resultat=mysql_query($sql,$id_link);
$nombre = @mysql_num_rows($resultat);
if ($nombre==1) {
  $PHP_AUTH_USER=$alias;
   $PHP_AUTH_PW=$sauf_conduit;
  }
else {
SetCookie(sauf_conduit,$sauf_conduit,time()-30);
SetCookie(alias,$alias,time()-30);
header('WWW-Authenticate: Basic realm="site perso"');
header('HTTP/1.0 401 Unauthorized');
$auth=3;
include "inscription_p1.php";
exit;
}
}
$rang=mysql_fetch_array($resultat);
$nom_usage=$PHP_AUTH_USER;
session_register("login ");
if (!$clef){
$clef=$rang['clef'];
session_register("clef");
}
if (!$mail){
$mail=$rang['mail'];
session_register("mail");
}

?>
