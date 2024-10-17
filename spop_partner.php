<!-- Ecran servant � choisir un partenaire et � lancer une partie -->

<?php
session_start();
require_once ("spop_util.php");
require_once ("spop_db.php");
require_once ("spop_game_type.php");

$choice = null;
$partner_id = null;

if (isset($_GET["choice"])) {
    $choice = $_GET["choice"];
    $_SESSION["choice"] = $choice;
    // TODO envoyer choix au serveur
}
if (isset($_GET["partner_id"])) {
    $partner_id = $_GET["partner_id"];
    $partner_name = $_GET["partner_name"];
    $game_type_name = $_GET["game_type_name"];
    $_SESSION["partner_id"] = $partner_id;
    $_SESSION["partner_name"] = $partner_name;
    $_SESSION["game_type_name"] = $game_type_name;
    // TODO envoyer proposition au serveur
    spop_db_start_game($partner_id, $game_type_name);
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SPOP</title>
</head>
<body>
<?php include("spop_header.php"); ?>    <!--  ajout de l'entête  -->
<br>
<div class="partner-page">
      <h1>Votre proposition</h1>
   </div>

   <div class="game-choices">
      <?php
    foreach ($GLOBALS[SpopGameType::VALUES] as $game_type) {
        echo "<div class='game-choice'><a href='spop_partner.php?choice=";
        echo $game_type->getName();
        echo "'>";
        echo $game_type->getName();
        echo "</a></div>";
    }
    echo "<div class='game-choice'><a href='spop_partner.php?choice=";
    echo "'>";
    echo "Aucun";
    echo "</a></div>";
    ?>
    Choix: '<?php echo isset($_SESSION["choice"]) ? $_SESSION["choice"] : "?"; ?>'
    
   </div>

   <div class="partner-page">
      <h1>Joueurs disponibles</h1>
   </div>
   <!-- tableau des joueurs par type de partie -->

   <div class="players">
      <table class="players">
         <tr>
            <th>Joueur</th>
            <th>Choix</th>
            <th>Invitation</th>
         </tr>
   <?php
foreach (spop_db_list_free_players() as $player) {
    echo "<tr>";
    echo "<td>";
    echo $player->getName();
    echo "</td>";
    echo "<td>";
    echo $player->getGameTypeChoice();
    echo "</td>";
    echo "<td><a href='spop_partner.php?partner_id=";
    echo $player->getId();
    echo "&amp;partner_name=";
    echo $player->getName();
    echo "&amp;game_type_name=";
    echo $player->getGameTypeChoice();
    echo "'><img src= 'img/spop_play_button.png'></td>";
    echo "</tr>";
}
?>
   </table>
    Proposition: '<?php echo isset($_SESSION["partner_id"]) ? $_SESSION["partner_id"] : "?"; ?>'
   </div>  
<br>
<br>
</div>

<?php include("spop_footer.php"); ?>	<!--  ajout du pied de page  -->
</body>
</html>