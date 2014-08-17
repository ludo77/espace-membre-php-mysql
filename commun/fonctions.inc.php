<?
//////////////NOMBRE VERS DATE////////////////////////////////////////////////
function nombre_date($cettedate){
$ladate=$cettedate;
$longueur=strlen($ladate);
$an=substr($ladate,0,4);
$mois=(int)substr($ladate,4,2);
$jour=(int)substr($ladate,6,2);
$ladate=$jour.'/'.$mois.'/'.$an;
if ($longueur>8){
$heure= (int)substr($ladate,8,2);
$minutes= substr($ladate,10,2);
$ladate.=" ${heure}h ${minutes}mn";
if ($longueur>12){
$secondes= substr($ladate,12,2);
$ladate.=" $secondes";
}
}
return $ladate;
}

//////////DATE VERS NOMBRE/////////////////////////////////////////////////
function date_nombre($cettedate){
$ladate=$cettedate;
$ladate=explode('/',$ladate);
$jour=$ladate[0];
$mois=$ladate[1];
$an=$ladate[2];
$longueur=strlen($an);
if ($longueur==2){
if ($an<date("y")){ 
$an='19'.$an;
}
else {
$an='20'.$an;
}
}
$longueur=strlen($mois);
if ($longueur==1){
$mois='0'.$mois;
}
$ladate=$an.$mois.$jour;
return $ladate;
}


/////////////////METTRE EN MAJUSCULES/////////////////////////////////////////////////
function majuscules($majuscule){
$majuscule=trim($majuscule);
$majuscule=strtolower($majuscule);
$majuscule=str_replace("d'", "d' ",$majuscule);
$passage=1;
$motif[]=" ";
$motif[]="-";
$nombre=count($motif);
 for ($i=0;$i<$nombre;$i++){
  $particule=$motif[$i];
   if (ereg($particule,$majuscule)) {
    if ($passage==2){
     $majuscule=$nom_complet;
     unset($nom_complet);
    }
    $passage=2;
    $majuscules=split($particule,$majuscule);
    $combien=count($majuscules);
    for ($j=0;$j<$combien;$j++){
     $maj=$majuscules[$j];
      if ($maj!='de' && $maj!='d\'' && $maj!='et' && $maj!='&'){

      $maj=ucfirst($maj);
     }
     $nom_complet.=$maj;
     if ($j<$combien-1){
      $nom_complet.=$particule;
     }

    }
/////FIN DU PLUS PETIT FOR//'////////
  }
////FIN DES MOTS QUI POSSèdent un séparateur " " ou -//////////////
 }
///////FIN DU PLUS GRAND FOR/////////
if($passage==1){
$majuscule=ucfirst($majuscule);
} 
elseif ($passage==2){
 $majuscule=$nom_complet;
}
//RESTITUTION DE LA VALEUR///
unset ($nom_complet);
///DESTRUCTION DU VÉHICULE AVEC UNSET////
$majuscule=str_replace("d' ", "d'",$majuscule);
////élision de l'espace supplémentaire pour d'///
return $majuscule;
}


///////AFFICHE JOUR////////////////////////////
function affiche_jour($moment){
if (!$moment){
$moment=time();
}
$jour=date("w", $moment);
$les_jours=array('dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi');
$jour=$les_jours[$jour];
return $jour;
}

/*ici il est pratique de mettre votre nombre d'heures de décalage avec l'heure GMT*/
$decalage_hiver=1;
//le paramètre envoyé est un timestamp que nous calculons avant l'appel
/*cette fonction affiche le mois en français (attention pas de capitales en français!)*/

///////AFFICHE MOIS////////////////////////////
function affiche_mois ($moment){
if (!$moment){
$moment=time();
}
$mois=date("n", $moment);
$mois_franc=array('', 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
return $mois_franc["$mois"];
}

/////////AFFICHE DATE LOCALE AVEC HEURE D'HIVER OU D'ETE/////////////////////////////////
function affiche_date_locale($moment){
$decalage_hiver=1;
if (!$moment){
$temps=time();
}
else {
$temps=$moment;
}
/*l'heure d'hiver commence le dernier dimanche de mars à 1h GMT et finit le dernier dimanche d'hiver à 1h GMT*/
$jourdesemaine=gmdate("w", mktime(1,0,0, 3,31,gmdate("Y")));
//variable pour connaître le jour de semaine du 31 mars
$limite_inf=mktime(1,0,0, 3,31-$jourdesemaine,gmdate("Y"));
//variable pour trouver le dernier dimanche de mars pour l'année courante
$jourdesemaine=gmdate("w", mktime(1,0,0, 10,31,gmdate("Y")));
//variable pour connaître le jour de semaine du 31 octobre
$limite_sup=mktime(1,0,0, 10,31-$jourdesemaine,gmdate("Y"));
//variable pour trouver le dernier dimanche d'octobre pour l'année courante
/*maintenant nous testons la date pour savoir si elle est comprise entre les deux limites et dans ce cas elle est en heure d'été*/
if ($temps>$limite_inf && $temps<$limite_sup){
$decalage=$decalage_hiver+1;
}
else {
$decalage=$decalage_hiver;
}
$moment=mktime(gmdate("G")+$decalage,gmdate("i"),0, gmdate("n"),gmdate("j"),gmdate("Y"));
//ici nous fabriquons le timestamp avec mktime() en incluant le décalage
$ladate=affiche_jour($moment) ." ".date("j", $moment)." ". affiche_mois($moment) ." ".  date("Y", $moment);
/*la date inclut le mois en français grâce à l'appel de la fonction. Vous pouvez dans certains cas faire précéder la fonction du @ pour éviter le message d'erreur si vous n'envoyez pas de paramètre par exemple alors que la fonction en utilise un.*/
$heure = date("G",$moment);
$minute = date("i", $moment);
$ladate.="<BR>"; 
$ladate.="$heure"; 
$ladate.="h"; 
$ladate.="$minute";
return $ladate;
   }
   
   //////////CRYPTAGE ET DECRYPTAGE////////////////////////////////
   global $serrure;
   $serrure=85465465454;
function crypte_chiffre($secret){
$secret*=$serrure;
$secret=base64_encode($secret);
$secret=urlencode($secret);
return $secret;
}
function decrypte_chiffre($revelation){
$revelation =base64_decode($revelation); 
$revelation /=$serrure;
return $revelation;
}

 /////////////TRI FRANCAIS D'UN TABLEAU  AVEC ACCENTS//////////////////////////
 function cmp ($a, $b) {
$un_tableau=array('à','â','ä');
$i=0;
$lalettre='b';
foreach($un_tableau as $valeur){
$a=str_replace($valeur,$lalettre.$i,$a);
$b=str_replace($valeur,$lalettre.$i,$b);
$i++;
}
$un_tableau=array('é','è','ê','ë');
$lalettre='f';
$i=0;
foreach($un_tableau as $valeur){
$a=str_replace($valeur,$lalettre.$i,$a);
$b=str_replace($valeur,$lalettre.$i,$b);
$i++;
}
$un_tableau==array('ô','ö');
$lalettre='p';
$i=0;
foreach($un_tableau as $valeur){
$a=str_replace($valeur,$lalettre.$i,$a);
$b=str_replace($valeur,$lalettre.$i,$b);
$i++;
}
$un_tableau=array('î','ï');
$i=0;
$lalettre='j';
foreach($un_tableau as $valeur){
$a=str_replace($valeur,$lalettre.$i,$a);
$b=str_replace($valeur,$lalettre.$i,$b);
$i++;
}
$un_tableau=array('ç');
$i=0;
$lalettre='d';
foreach($un_tableau as $valeur){
$a=str_replace($valeur,$lalettre.$i,$a);
$b=str_replace($valeur,$lalettre.$i,$b);
$i++;
}
$un_tableau=array('ù','û');
$i=0;
$lalettre='v';
foreach($un_tableau as $valeur){
$a=str_replace($valeur,$lalettre.$i,$a);
$b=str_replace($valeur,$lalettre.$i,$b);
$i++;
}

if ($a == $b) return 0;
return ($a < $b) ? -1 : 1;
}

?>