<footer class="foot">
<ul>     
<li> ©2022 CY Cergy Paris Université</li>
 <li> ROUAS Lila et MALEK Feriel  </li>
<li> Date d'aujourd'hui:
<?php
			 require "./include/util.inc.php"; 
			  echo date_heure(); 
			?>	
			</li>
			<li> Votre navigateur actuel :
			<?php
			 echo get_browser_name($_SERVER['HTTP_USER_AGENT']);
?> 

</li>
<li>
           <?php
           echo hitscount('file.txt');
?>
</li>
</ul>

<nav class="contact" >
<ul>
 <li><a href="contact.php" >Contactez-nous</a></li>
  <li><a href="plan.php" >Plan du site</a></li>	
</ul>
</nav>

<span><a href="#"><img src="./images/icone_fleche_b.png" alt="icon" width="50" height="50"/></a></span>
  </footer> 
