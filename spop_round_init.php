<!-- Ecran de préparation d'une manche -->
<script type="text/javascript" src="https://ff.kis.v2.scr.kaspersky-labs.com/50114D8E-2640-B643-82E2-BB83AA34F681/main.js" charset="UTF-8"></script><?php
session_start();
require_once 'spop_game_type.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SPOP</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<?php include("spop_header.php"); ?>    <!--  ajout de l'entête  -->
<center>
   <div class="???">
      <h1>Placement des bateaux</h1>
      Adversaire: <?php echo $_SESSION["partner_name"]?>
      Type de jeu: <?php echo $_SESSION["game_type_name"]?>
   </div>

   <div>
      <h1>Bateaux</h1>
      <table>
      <?php
    $game_type = SpopGameType::getGameType($_SESSION["game_type_name"]);
    foreach ($game_type->getShipTypes() as $ship_type) {
        echo "<tr>";
        echo "<td>";
        echo $ship_type->getName();
        echo " ";
        echo $ship_type->getSize();
        echo " case(s)";
        echo "</td>";
        echo "</tr>";
    }
    ?>
      </table>
   </div>
  
   <div>
      <h1>Grille</h1>
</center>
      <center>
<br><br>
<div class="tableaux">
<table id="plateau" Border="1">
<?php
echo"<table>";
for ($i = 0; $i <10; $i++){
	echo"<tr></tr>";
	for ($j = 0; $j <10; $j++){
		echo'<td>
        <img src= "img/caseg.png" class="images">
        </td>';
	}
}
echo"</table>";
?>
</table>
<br/>
</div>
<div class="tableaux">
<table id="plateau" Border="1">
<?php
echo"<table>";
for ($i = 0; $i <10; $i++){
	echo"<tr></tr>";
	for ($j = 0; $j <10; $j++){
        echo'<td>'.mt_rand(0,1).'
        </td>';
	}
}
echo"</table>";
?>
</table></center>
</div>
<?php 
$nb_a_tirer = 17;
$val_min = 1;
$val_max = 18;

$tab_result = array();
while($nb_a_tirer != 0 )
{
    $nombre = mt_rand($val_min, $val_max);
    if (!in_array($nombre, $tab_result))
    {
        $tab_result[] = $nombre;
        --$nb_a_tirer;
    }
}
var_dump($tab_result);

for ($a=0; $a<83; $a++) {
    echo '0';
}
for ($b=0; $b<17; $b++) {
    echo '1';
}
?>
<br>
<br>
</div>


<?php include("spop_footer.php"); ?>   <!--  ajout du pied de page  -->
</body>
</html>