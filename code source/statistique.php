<!DOCTYPE html>
<html lang="fr">
<head>
<title> Statistique </title>
        <meta charset="utf-8"/>
        <link href="styles.css" rel= "stylesheet"  />
        <link rel="shortcut icon" href="./images/logooo.PNG"/>
    
        </head>
             <?php
                require "./include/functions.inc.php";
                
    ?>
<?php
        $titre = "Projet";
        require_once"./include/header.inc.php";
    
    ?>
       <main id="centre"  class="<?= $theme_class ?>">
   
    <article>
   <h2>Historique</h2>
				<div class="main">
		
				<?php
					$cookie=$_COOKIE["last"];		
				echo "<p> le dernier artiste consulté est : $cookie </p>";
				?>
			
				</div>
</article>

	<?php
        require "./include/footer.inc.php";

    ?>
    </main>
    </html>