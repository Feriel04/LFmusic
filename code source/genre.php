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

       <main id="centre"  class="<?= $theme_class ?>">
      
       <div class="main">
       <?php
      echo genre();
      ?>
    </div>
     
	
	<?php
	
        require "./include/footer.inc.php";

    ?>
    </main>
    </html>