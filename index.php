<!--  Index / page d'acuueil -->

<?php
session_start();

$_SESSION["choice"] = "???";
$_SESSION["proposal"] = "???";
   
require_once ("spop_util.php");
require_once ("spop_db.php");
?>
<!doctype html>
<html>
<head> 
<meta charset="utf-8">
<title>SPOP</title>
</head>

<body>
<?php require("spop_header_img.php"); ?>

   <div class="login-page">
        <h1 class="title-index">Bienvenue</h1>
      <p class="login-message">
      <br>
      <center> 
      <a href="spop_register.php" class="login-button">Jouer</a>
      </center>
    </div>
<div class="container my-auto">
    <div class="row">
      <div class="txt-tuto">
<br>
<br>
<h3 class= "title-tuto">Règles du jeu :</h3><br>

Ce jeu se joue à deux, l’un contre l’autre sur deux grilles où sont placés 5 vaisseaux mis en place par les joueurs.<br>
Le but étant d’abattre tous les vaisseaux de l’adversaire.<br>
<br>
Chaque joueur aura les vaisseaux suivants à placer sur une grille de 10*10 (Small), 15*15 (Medium) ou bien 20*20 (Large):<br>
<br>
1 EF76 Nebulon-B ou Star Destroyer  (5 cases)<br>
1 Faucon Millenium ou Destroyer Stellaire (4 cases)<br>
1 X-Wing ou TIE 1X (3 cases)<br>
1 U-Wing ou ST321 (3 cases)<br>
1 E-Wing  ou TIE (2 cases)<br>
<br>
Pour une taille de grille plus grande, on doublera les vaisseaux.<br><br>
<br>

<h3 class= "title-tuto">Déroulement du jeu:</h3><br>

Au début du jeu, chaque joueur place comme il le veut tous ses vaisseaux sur sa grille, sachant que le joueur ne voit pas la grille de son adversaire.<br>
Une fois tous les vaisseaux en jeu, la partie peut commencer.<br>
<br>Un à un, les joueurs se tire dessus pour détruire les vaisseaux adverses.<br>
Exemple un joueur clique sur la case H7 correspondant à la case au croisement de la lettre H et du numéro 7 sur les côtés des grilles.<br>
Si un joueur tire sur un vaisseau ennemi, l’adversaire doit le signaler en disant « touché ».<br>
Il peut pas jouer deux fois de suite et doit attendre le tour de l’autre joueur.<br>
Si le joueur ne touche pas de navire, l’adversaire le signale en disant « raté » .<br>
Si le navire est entièrement touché l’adversaire doit dire « touché coulé ».<br>
Les pions blancs et des pions rouges servent à se souvenir des tirs ratés (blancs) et les tirs touchés (rouges).<br>
Il est indispensable de les utiliser pour ne pas tirer deux fois au même endroit et donc ne pas perdre de temps inutilement. Ces pions se placent sur la grille du dessus.<br>
</div>
</div>
</div>
<br>

<?php require("spop_footer.php"); ?>
</body>
</html>