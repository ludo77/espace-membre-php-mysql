<?
$dbname   = 'identity';
$hostname = 'localhost';
$username = 'root';
$password = 'password';

if (!$id_link = mysql_connect($hostname, $username, $password)) {
    echo 'Connexion impossible � mysql';
    exit;
}

if (!mysql_select_db($dbname, $id_link )) {
    echo 'S�lection de base de donn�es impossible';
    exit;
} 
?>

