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
        require "./include/functions.inc.php";
?>
<main id="centre"  class="<?= $theme_class ?>">
<article class="art" style="margin-top: 5%;">
	<h2 style="text-align:center;">Albums</h2>
	<div class="genre" style="display: flex; flex-wrap:nowrap; flex-direction:row;">
<?php
		if (!empty($_GET['key'])){
	$key=$_GET['key'];
	echo album($key);
}

		?>
	</div>
	</article>
	<article class="art" style="margin-top: 5%;">
	<h2 style="text-align:center;">Les musiques les plus connus</h2>
<div class="genre" style="display: flex; flex-wrap:nowrap; overflow:scroll;">
		<?php
		if (!empty($_GET['key'])){
	$key=$_GET['key'];
	echo musique2($key);
}

		?>
	</div>
	</article> 
     
	
	<?php
        require "./include/footer.inc.php";

    ?>
    </main>
    </html>
