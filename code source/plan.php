<!DOCTYPE html>
<html lang="fr">
<head>
<title> Plan-du-site </title>
        <meta charset="utf-8"/>
        <link href="styles.css" rel= "stylesheet"  />
        <link rel="shortcut icon" href="./images/logooo.PNG"/>

        </head>
 <?php

        $titre = "Projet";

        require_once"./include/header.inc.php";



    ?>
    <?php 
    require"./include/functions.inc.php";

   ?>
      <main id="centre"  class="<?= $theme_class ?>">
 <article>     
      <h2>Plan du site </h2>

   <nav  style="text-align:center; text-decoration: none;">
            <ul style="list-style-type: none;">
                   <li><a style="text-decoration: none;" href="index.php">Accueil</a></li> 
                   <li>les artistes les plus écoutés du moment</li> 
                       <li> les top musique du moment </li>
                   <li><a style="text-decoration: none;" href="artist.php">Artistes</a></li>
                   <li>les artistes les plus écoutés du moment</li>
                   <li>des informations sur les artistes</li>
                   <li><a style="text-decoration: none;"  href="Music.php">Musiques</a></li> 
                       <li> les top musique du moment </li>
                           <li> les genres musicaux </li>
                       <li><a style="text-decoration: none;" href="statistique.php">Statistiques</a></li>
                       <li>le dernier artiste consulté</li>
                   <li><a style="text-decoration: none;" href="nasa.php">Partie 1</a></li> 
                            <li>l'archive de l'image du jour de l'astronomie</li>
                            <li>la géolocalisation</li>
              </ul>
           </nav>
           </article>
 <?php

        require "./include/footer.inc.php";



    ?>
 </main>
 </html>