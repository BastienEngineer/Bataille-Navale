<?php
session_start();
require_once ('spop_game_type.php');
require_once ('spop_db.php');
require_once ('spop_player.php');
require_once ('spop_util.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SPOP</title>
</head>
<body>
<?php include("spop_header.php"); ?>    <!--  ajout de l'entête  -->


<article class="txt-issue">
 <h1 class="win">Victoire</h1>
 <h1 class="win">Défaite</h1>
<br><br><br>
<a href="spop_round_init.php" class="restart-button">Revanche</a>
<a href="spop_partner.php" class="restart-button">Nouvelle partie</a>
<br><br><br>
</article>


<?php include("spop_footer.php"); ?>	<!--  ajout du pied de page  -->
</body>
</html>