<!DOCTYPE html>
<html lang="fr">
<head>
<title> APInasa </title>
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
<section >
       <h2> Partie 1 </h2>
     <article>
 <h2> Archive de l'image du jour de l'astronomie </h2>
         <?php
            echo  api();

			?>
 </article>
  <article>
       <h2>Géolocalisation </h2>

		<?php
	
			echo geo();
	
		?>
						
				</article>
				
</section>
    
      <?php
        require "./include/footer.inc.php";

    ?>
    </html>