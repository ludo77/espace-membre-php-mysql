<?
$table='compteurs';
//////remplacez le chemin////////////
$chemin=ereg_replace('le chemin jusqu'au répertoire wwww','',$SCRIPT_FILENAME);
$repertoire=dirname($chemin);
$page=basename($chemin);
$sql= "select * from $table where page='$page' AND repertoire='$repertoire' ORDER BY clef DESC LIMIT 1";
//vérifions la dernière date entrée dans la table pour cette page
$resultat=@mysql_query($sql,$id_link);
$rang=@mysql_fetch_array($resultat); 
$jour=$rang['jour']; 
$mois=$rang['mois'];
$an=$rang['an'];
if ($jour!=date("d")){
//si la date est différente, la nouvelle ligne est créée
$an=date("y");
$mois=date("m");
$jour=date("d");
$sql= "insert into $table (fois, an, mois, jour, repertoire, page) VALUES('1', '$an', '$mois', '$jour', '$repertoire','$page')";
}
else {
//sinon elle est juste mise à jour
$sql= "update $table set fois=fois+1 where jour='$jour' AND mois='$mois' AND an='$an' AND page='$page' AND repertoire='$repertoire'";
}
@mysql_query($sql,$id_link);
?>