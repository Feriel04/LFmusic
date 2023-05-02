

		
		<?php
//default theme
$theme_class = "light";

//load theme from cookie
if (isset($_COOKIE["theme"])) {
	if ($_COOKIE["theme"] === "dark") {
		$theme_class = "dark";
	} else if ($_COOKIE["theme"] === "light") {
		$theme_class = "light";
	}
}
//handle theme form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// collect value of theme
	$theme = $_POST['theme'];
	setcookie('theme', $theme, time() + 3600, '/');
	//update theme
	$theme_class = $theme;
}	
				if(isset ($_GET['style'])){
					if( $_GET['style']=='alternatives'){
						$css="alternatives.css";
					}
				}
				else {
					$css="styles.css";
				}			
				$link = $_SERVER['REQUEST_URI'];
				
				$link2 = explode("/",$link);
				$link3 = end($link2);
				$link4 = explode("?",$link3);
				$link5 = $link4[0];
?>
<body class="<?= $theme_class ?>">
<header style="background-color:transparent; margin-top: -2%;   margin-left: -1%;">

<h1>"On ne vend pas de la musique, on la partage"</h1>


 <nav class="navigate" >
		<ul>
		 <li><a href="index.php"><img src="./images/logooo.PNG" alt="icon" width="70" height="70" style="border-radius: 50%;" /> </a></li>  
		  <li><a href="artist.php"> Artistes </a></li>
		 	    <li><a href="Music.php" >Musiques</a></li>	
		  <li><a href="statistique.php"> Statistiques </a></li>
		 <li><a href="nasa.php"> Partie 1 </a></li>
		</ul>
					<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" style="margin-left: 80%; margin-top: -7%;">
			<label for="dark"> <img src="./images/night-mode.png" alt="icon" width="30" height="30" style="border-radius: 50%;" /> </label>
			<input type="radio" id="dark" value="dark" name="theme" <?= $theme_class === "dark" ? "checked" : ""  ?>>
			<label for="light"> <img src="./images/sun.webp" alt="icon" width="30" height="30" style="border-radius: 50%;" /> </label>
			<input type="radio" id="light" value="light" name="theme" <?= $theme_class === "light" ? "checked" : ""  ?>>
			<input type="submit" value="envoyer">
		</form>
 </nav>
</header>