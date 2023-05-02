<?php
function api(){
$url = "https://api.nasa.gov/planetary/apod?api_key=EA0gnF2nfi7sTuPDcYnTVW73ftF70Fyfctu3YlKa";
$t = array();
$json=file_get_contents($url);
$tt = json_decode($json,true);
echo "<img class='nasa' src=".$tt["url"]." alt='apod' width='450' height='400' />";  
echo "<p> Titre : ".$tt['title']."</p>";
echo "<p> Date : ".$tt['date']."</p>";
echo "<p> @Copyright : ".$tt['copyright']."</p>";


}

function geo(){


	$user_ip = getenv('REMOTE_ADDR');/*obtenir l'adresse ip*/
	$geo= simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$user_ip");
	echo '<p> ville: '.$geo->geoplugin_city.'</p>';
	echo '<p> Departement: '.$geo->geoplugin_regionName.'</p>';
	echo '<p> Adress IP: '.$geo->geoplugin_request.'</p>';
	echo '<p>Continent: '.$geo->geoplugin_continentName.'</p>';
	echo '<p> Region: '.$geo->geoplugin_region.'</p>';
	echo '<p> ZIP code: '.$geo->geoplugin_regionCode.'</p>';
	echo '<p> Latitude: '.$geo->geoplugin_latitude.'</p>';
	echo '<p> Longitude: '.$geo->geoplugin_longitude.'</p>';

	
}
/*Fonction recherche global (musique / album / artiste) en fonction d'un mot clé */
function recherche_global(){

    if (isset($_GET['global']) && !empty($_GET['global'])) {
    	  setcookie('last',$_GET['global'],time()+3600);
        $globalRecherche = urlencode($_GET['global']);
        $url = "https://api.deezer.com/search?q=$globalRecherche";
        $raw = file_get_contents($url);
        $json = json_decode($raw, true);
        $globalRecherche=str_replace(' ','', $globalRecherche);
        $fichier = 'static.csv';
        $contente =$_GET['global'];
		  $new = fopen($fichier,'r+');
			
		  $line=fgets($new);  
		  $output .= ",".$contente;
	
		  
		  
		  fwrite($new, $output);
        fclose($new);
         
        
        

        if (!empty($json['data'])) {
        for ($i=0; $i<10; $i++) {
            echo "<p>Titre: ".$json['data'][$i]['title']."</p>";
            echo "<p>Artist: ".$json['data'][$i]['artist']['name']."</p>";
            echo "<p>Durée: ".$json['data'][$i]['duration']."secondes </p>";
            echo "<p>Rang Mondiale: ".$json['data'][$i]['rank']."</p>";
            echo "<img class='imag' src=".$json['data'][$i]['artist']['picture_medium']." width='150' height='150' alt='artist'/>";
           echo"<p>Description:".$json['data'][$i]['description']."</p>";
            echo "<audio controls>";
            echo "<source src=".$json['data'][$i]['preview']." type='audio/mpeg'/>";
            echo "</audio controls>";
        }
        if (empty($json2['data'])) {
            echo "<p> Aucune musique trouvé </p>";
        }
        
        }
    }
}

/*Fonction recherche artiste en fonction d'un mot clé */
function artist(){
    if (isset($_GET['artist']) && !empty($_GET['artist'])){
        $artistRecherche = urlencode(($_GET['artist']));
        $url ="https://www.theaudiodb.com/api/v1/json/2/search.php?s=$artistRecherche";
        $url2 ="https://theaudiodb.com/api/v1/json/2/discography.php?s=$artistRecherche";
        $raw = file_get_contents($url);
        $raw2 = file_get_contents($url2);
        $json = json_decode($raw, true);
        $json2 = json_decode($raw2, true);
        $artistRecherche=str_replace(' ','', $artistRecherche);

        
        /* Biographie artiste*/
        if (!empty($json['artists'])) {
            $i = 0;
            echo "<p>Nom: ".$json['artists'][$i]['strArtist']."</p>";
            echo "<p>Biographie: ".$json['artists'][$i]['strBiographyFR']."</p>";
            echo "<p>Genre: ".$json['artists'][$i]['strGenders']."</p>";
            echo "<img class='imag' src='".$json['artists'][$i]['strArtistThumb']." 'width='150' height='150' alt='artist'/>";
            echo "<img class='imag' src='".$json['artists'][$i]['strArtistLogo']."' width='150' height='150' alt='artist'/>";
            /* Bibliographie artiste*/
        }
        if (empty($json['artists'])) {
            echo "<p> Artiste pas reconnue </p>";
        }
        if (!empty($json2['album'])) {
            echo "<h2> Bibliographie: </h2>";
            for ($j=0; $j<3; $j++) {
                echo "<p>Album n°$j: ".$json2['album'][$j]['strAlbum']."</p>";
                echo "<p>Année: ".$json2['album'][$j]['intYearReleased']."</p>";
            }
        }
        if (empty($json2['album'])) {
            echo "<p> Aucune Bibliograpie trouvé </p>";
        }
    }
}

/*Fonction recherche musique en fonction d'un mot clé */
function music(){
    if (isset($_POST['track']) && !empty($_POST['track'])) {
        $trackRecherche = urlencode($_POST['track']);
        $url = "https://api.deezer.com/search?q=track:'$trackRecherche'";
        $raw = file_get_contents($url);
        $json = json_decode($raw, true);
       $trackRecherche=str_replace(' ','', $trackRecherche);
        $trackRecherche=str_replace('&','', $trackRecherche);

        for ($i=0; $i<10; $i++) {
            if (!empty($json['data'])) {
            	
                echo "<p>Titre: ".$json['data'][$i]['title']."</p>";
                echo "<p>Artist: ".$json['data'][$i]['artist']['name']."</p>";
                echo "<p>Durée: ".$json['data'][$i]['duration']."secondes </p>";
                echo "<p>Rang Mondiale: ".$json['data'][$i]['rank']."</p>";
                echo "<p>Album: ".$json['data'][$i]['album']['title']."</p>";
                echo "<img class='imag' src='".$json['data'][$i]['artist']['picture_medium']."' width='150' height='150' alt='artist'/>";
               
                echo "<audio controls>";
                echo "<source src=".$json['data'][$i]['preview']." type='audio/mpeg'/>";
                echo "</audio>";

            }
        }
        if(empty($json['data'])){
            echo "<p> Aucune musique trouvé </p>";
        }
    }
}


/*retourne quelque recommandation top music*/
function top_music(){
        $url = "https://api.deezer.com/chart/";
        $raw = file_get_contents($url);
        $json = json_decode($raw, true);

        for ($i=0; $i<10; $i++) {
        	$i=str_replace(' ','', $i);
        			 echo "<div  class='element'>";
                echo "<p>Titre: ".$json['tracks']['data'][$i]['title']."</p>";
                echo "<p>Durée: ".$json['tracks']['data'][$i]['duration']."secondes </p>";
                echo "<p>Position: ".$json['tracks']['data'][$i]['position']."</p>";
                echo "<img class='imag' src='".$json['tracks']['data'][$i]['album']['cover_big']." ' width='150' height='150' alt='photo'/>";
                echo "  <audio controls> <source src='".$json['tracks']['data'][$i]['preview']."' type='audio/mpeg'/>";
                echo "</audio >";
                echo "</div>";
            
        }
    
}
/*retourne quelque recommandation top artiste*/
function top_artist(){
        $url = "https://api.deezer.com/chart/";
        $raw = file_get_contents($url);
        $json = json_decode($raw, true);
		
        for ($i=0; $i<10; $i++) {
        		$val=$json['artists']['data'][$i]['name'];
		   	$val=str_replace(' ','',$val);
		   	 $val=str_replace('&','', $val);
            if (!empty([$i])){
            		$i=str_replace(' ','', $i);
            	 echo "<div  class='element'>";
                echo "<p>Titre: ".$json['artists']['data'][$i]['name']."</p>";
                echo "<p>Position: ".$json['artists']['data'][$i]['position']."</p>";
                echo "<a href= 'artist.php?artist=".$val."'> <img class='imag' src=".$json['artists']['data'][$i]['picture_medium']."  width='150' height='150' alt='photo' /></a>";
          		 echo "</div>";
              
            }
        }
    
}

function hitscount($filename){
    $fic = 'file.txt'; //--- Nom du fichier
    // ---- Permet d'eviter des erreurs sur la création du fichier ---- //
    $test = fopen($fic, 'a+');
    fclose($test);
    // ---- FIN DU TEST POUR LA CREATION DU FICHIER ---- //
    $nombre = file($fic);
    $compteur = $nombre[0] + 1;
    $new = fopen($fic,'w+');
    fwrite($new, "$compteur \n");
    fclose($new);
    if($compteur == 1)
    {
    print 'Vous êtes le 1er visiteur';
    }
    else
    {
    print 'Vous êtes le visiteur numéro: '.$compteur . ' !';
    }
}

	
        function genre (){
        $url="https://api.deezer.com/genre/";
        $json=file_get_contents($url);
        $tt = json_decode($json,true);

for ($i=1;$i<20;$i++){

$identifiant=$tt['data'][$i]['id'];
$identifiant=str_replace(' ','',$identifiant);
echo "<div>";
echo "<p>".$tt['data'][$i]['name']."</p>";
echo "<a href='rech_genre.php?key=$identifiant'> <img src=".$tt['data'][$i]['picture_big']." width='150' height='150' alt='artist'/></a>";
echo "</div>";
}
}

        function genre_artist($identifiant){
        	  $identifiant=str_replace(' ','',$identifiant);
        $url="https://api.deezer.com/genre/$identifiant/artists";
        $json=file_get_contents($url);
        $tt = json_decode($json,true);

for ($i=0;$i<10;$i++){
$id=$tt['data'][$i]['name'];
echo "<div>";
echo "<p>".$tt['data'][$i]['name']."</p>";
echo "<a href='rech2_genre.php?key=$identifiant'> <img src=".$tt['data'][$i]['picture_big']." width='150' height='150' alt='artist'/></a>";
echo "</div>";


}





}
          function album ($key){
         $key=str_replace(' ','',$key);
        $url="https://api.deezer.com/search?q='$key'&limit=20";
        $json=file_get_contents($url);
        $test = json_decode($json,true);
        echo "<div>";
        echo "<img src='".$test['data']['0']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='album'/>";
        echo "<p style='text-align:center;'> ".$test['data']['0']['album']['title']."</p>";
        echo "</div>";
        echo "<div>";
        echo "<img src='".$test['data']['2']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='album'/>";
        echo "<p style='text-align:center;'> ".$test['data']['1']['album']['title']."</p>";
        echo "</div>";
        echo "<div>";
        echo "<img src='".$test['data']['4']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='album'/>";
        echo "<p style='text-align:center;'> ".$test['data']['2']['album']['title']."</p>";
echo "</div>";
echo "<div>";
        echo "<img src='".$test['data']['6']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='album'/>";
        echo "<p style='text-align:center;'> ".$test['data']['3']['album']['title']."</p>";
echo "</div>";

echo "<div>";
        echo "<img src='".$test['data']['8']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='album'/>";
        echo "<p style='text-align:center;'> ".$test['data']['4']['album']['title']."</p>";
echo "</div>";
echo "<div>";
        echo "<img src='".$test['data']['10']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='album'/>";
        echo "<p style='text-align:center;'> ".$test['data']['5']['album']['title']."</p>";
       echo "</div>";

echo "<div>";
        echo "<img src='".$test['data']['12']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='album'/>";
        echo "<p style='text-align:center;'> ".$test['data']['6']['album']['title']."</p>";
       echo "</div>";

}


function musique2 ($key){

        $key=str_replace(' ','',$key);
        $url ="https://api.deezer.com/search?q='$key'&limit=10";
        $url2 ="https://api.deezer.com/search?q='$key'&limit=10";
        $json=file_get_contents($url);
        $json2=file_get_contents($url2);
        $tt = json_decode($json,true);
        $ttt = json_decode($json2,true);
echo "<div>";
        echo "<img src='".$ttt['data']['0']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='musique2'/>";
        echo "<p style='text-align:center;'> ".$ttt['data']['0']['album']['title']."</p>";
         echo " <audio controls> <source src='".$ttt['data']['0']['preview']."' style='margin-left:35%;'> </audio >";
       echo "</div>";
       echo "<div>";
        echo "<img src='".$ttt['data']['1']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='musique2'/>";
        echo "<p style='text-align:center;'> ".$ttt['data']['1']['album']['title']."</p>";
         echo " <audio controls> <source src='".$ttt['data']['1']['preview']."' style='margin-left:35%;'> </audio >";
       echo "</div>";
       echo "<div>";
        echo "<img src='".$ttt['data']['2']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='musique2'/>";
        echo "<p style='text-align:center;'> ".$ttt['data']['2']['album']['title']."</p>";
         echo " <audio controls> <source src='".$ttt['data']['2']['preview']."' style='margin-left:35%;'> </audio >";
       echo "</div>";
       echo "<div>";
        echo "<img src='".$ttt['data']['3']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='musique2'/>";
        echo "<p style='text-align:center;'> ".$ttt['data']['3']['album']['title']."</p>";
         echo " <audio controls> <source src='".$ttt['data']['3']['preview']."' style='margin-left:35%;'> </audio >";
       echo "</div>";
       echo "<div>";
        echo "<img src='".$ttt['data']['4']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='musique2'/>";
        echo "<p style='text-align:center;'> ".$ttt['data']['4']['album']['title']."</p>";
         echo " <audio controls> <source src='".$ttt['data']['4']['preview']."' style='margin-left:35%;'> </audio >";
       echo "</div>";
       echo "<div>";
        echo "<img src='".$ttt['data']['5']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='musique2'/>";
        echo "<p style='text-align:center;'> ".$ttt['data']['5']['album']['title']."</p>";
         echo " <audio controls> <source src='".$ttt['data']['5']['preview']."' style='margin-left:35%;'> </audio >";
       echo "</div>";
       echo "<div>";
        echo "<img src='".$ttt['data']['6']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='musique2'/>";
        echo "<p style='text-align:center;'> ".$ttt['data']['6']['album']['title']."</p>";
         echo " <audio controls> <source src='".$ttt['data']['6']['preview']."' style='margin-left:35%;'> </audio >";
       echo "</div>";
echo "<div>";
        echo "<img src='".$ttt['data']['7']['album']['cover_big']."' style='width:50%; margin-left:30%;' alt='musique2'/>";
        echo "<p style='text-align:center;'> ".$ttt['data']['7']['album']['title']."</p>";
         echo " <audio controls> <source src='".$ttt['data']['7']['preview']."' style='margin-left:35%;'> </audio >";
       echo "</div>";

       

}
?>
