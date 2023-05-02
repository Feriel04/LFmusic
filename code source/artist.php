<!DOCTYPE html>
<html lang="fr">
<head>
<title> Artiste </title>
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
       <article>
					<h2>Information sur un artiste</h2>
					<form class="reche" method="GET" action="artist.php" >
					<label>Artiste :</label> 
					<input placeholder="infos sur l'artiste " type="text" name="artist" /> 
					<input type="submit" value="Rechercher Artiste" />
				</form>
				
				<?php
				echo artist();
	?>

				

	</article>
<article >
   <h2>Les artistes les plus écoutés du moment</h2>
				<div class="wrap">
				
					
				<?php 
				echo top_artist();
				?>
			
				</div>
</article>

	<?php
        require "./include/footer.inc.php";

    ?>
    </main>
    </html>