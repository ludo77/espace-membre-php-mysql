<?
$table='compteurs';
//////remplacez le chemin////////////
$chemin=ereg_replace('le chemin jusqu'au r�pertoire wwww','',$SCRIPT_FILENAME);
$repertoire=dirname($chemin);
$page=basename($chemin);
$sql= "select * from $table where page='$page' AND repertoire='$repertoire' ORDER BY clef DESC LIMIT 1";
//v�rifions la derni�re date entr�e dans la table pour cette page
$resultat=@mysql_query($sql,$id_link);
$rang=@mysql_fetch_array($resultat); 
$jour=$rang['jour']; 
$mois=$rang['mois'];
$an=$rang['an'];
if ($jour!=date("d")){
//si la date est diff�rente, la nouvelle ligne est cr��e
$an=date("y");
$mois=date("m");
$jour=date("d");
$sql= "insert into $table (fois, an, mois, jour, repertoire, page) VALUES('1', '$an', '$mois', '$jour', '$repertoire','$page')";
}
else {
//sinon elle est juste mise � jour
$sql= "update $table set fois=fois+1 where jour='$jour' AND mois='$mois' AND an='$an' AND page='$page' AND repertoire='$repertoire'";
}
@mysql_query($sql,$id_link);
?>