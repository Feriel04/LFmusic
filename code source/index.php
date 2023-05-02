<!DOCTYPE html>
<html lang="fr">
<head>
<title> LFmusic </title>
        <meta charset="utf-8"/>
        <link href="styles.css" rel= "stylesheet"  />
        <link rel="shortcut icon" href="./images/logooo.PNG"/>
    
        </head>
<?php

        $titre = "Projet";

        require_once"./include/header.inc.php";

    

    ?>



      <?php

                require "./include/functions.inc.php";

                

    ?>
       <main id="centre"  class="<?= $theme_class ?>">
   
<?php
$nbimages=4;

$nomimages[1]="./image1.jpg";
$nomimages[2]="./image2.jpg";
$nomimages[3]="./image5.jpg";
$nomimages[4]="./image4.webp";

srand((double)microtime()*1000000);
$affimage=rand(1,$nbimages);
?>

<img  src="./images/<?echo $nomimages[$affimage];?>" width="200" height="200" alt="Image aléatoire" style="margin-left: 45%; border-radius: 50%; margin-top: 0%;">	       
    
    <article>
   <h2>Les artistes les plus écoutés du moment</h2>
				<div class="wrap">
					
				<?php 
				echo top_artist();
				?>
			
				</div>
				
				<h2>Les top musiques du moment</h2>
				<div class="wrap">
				
<?php
echo top_music();
?>				
				</div>
				<div>
				
					<form class="rech" action="Music.php" method="post">
			
					<input placeholder="musique,artiste,..." type="text" name="global" /> 
					<input type="submit" value="Rechercher " />
				</form>
				</div>
				<div class="wrap2">
				<?php
				echo recherche_global();
	?>		
	</div>
					
</article>

</main>
	<?php

        require "./include/footer.inc.php";



    ?>
  
    </html>