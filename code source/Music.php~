<!DOCTYPE html>
<html lang="fr">
<head>
<title> Musique </title>
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
   
    				<div >
					<form class="rech" method="GET" action="Music.php" >
			
					<input placeholder="musique" type="text" name="global" /> 
					<input type="submit" value="Rechercher " />
				</form>
				</div>
				
				 	<div class="wrap2">
				<?php
				echo recherche_global();
	?>

</div>	
        <article>				
				<h2>Les top musiques du moment</h2>
				<div class="wrap">
				
<?php
echo top_music();
?>				
				</div>
			
					
</article>
     

<main>
	<article>
					<h2>Les genres musicaux</h2>
						<div class="wrap">
					
				<?php 
				echo genre();
				?>
			
				</div>

	</article>
			
	
		</main>
		<?php
        require "./include/footer.inc.php";

    ?>
 
