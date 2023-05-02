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
       <main  class="<?= $theme_class ?>">
    <article>  
    <h2> Les artistes de ce genre</h2>
       <div class="wrap">
    <?php
if (!empty($_GET['key'])){
    $identifiant=$_GET['key'];
    echo genre_artist($identifiant);
}

        ?>
    </div>
     
	</article>
	<?php
        require "./include/footer.inc.php";

    ?>
    </main>
    </html>