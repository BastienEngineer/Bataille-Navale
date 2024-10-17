<?php
require_once 'spop_ship_type.php';

/**
 * Type de jeu.
 */
final class SpopGameType
{

    private $name;

    private $size;

    private $ships;

    public function __construct(string $name, int $size, array $ships)
    {
        $this->name = $name;
        $this->size = $size;
        $this->ships = $ships;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getShipTypes(): array
    {
        return $this->ships;
    }

    public function __toString()
    {
        return "[name: " . $this->name . " size:" . $this->size . " ships: [" . implode(" ", $this->ships) . "]]";
    }

    const NORMAL_FR = "NORMAL_FR";

    const NORMAL_BE = "NORMAL_BE";

    const MEDIUM = "MEDIUM";

    const LARGE = "LARGE";

    const VALUES = "values";

    public static function getGameType($game_type_name)
    {
        foreach ($GLOBALS[SpopGameType::VALUES] as $value) {
            if ($value->getName() == $game_type_name) {
                return $value;
            }
        }
        return null;
    }
}

/**
 * Partie Française.
 *
 * @var GameType $SPOP_GAME_TYPE_NORMAL_FR
 */
$SPOP_GAME_TYPE_NORMAL_FR = new SpopGameType(SpopGameType::NORMAL_FR, 10, array(
    new SpopShipType(SpopShipType::CARRIER, 5),
    new SpopShipType(SpopShipType::CRUISER, 4),
    new SpopShipType(SpopShipType::DESTROYER, 3),
    new SpopShipType(SpopShipType::DESTROYER, 3),
    new SpopShipType(SpopShipType::TORPEDO_BOAT, 2)
));

$GLOBALS[SpopGameType::NORMAL_FR] = $SPOP_GAME_TYPE_NORMAL_FR;

/**
 * Partie Belge.
 *
 * @var GameType $SPOP_GAME_TYPE_NORMAL_BE
 */
$SPOP_GAME_TYPE_NORMAL_BE = new SpopGameType(SpopGameType::NORMAL_BE, 10, array(
    new SpopShipType(SpopShipType::BATTLE_SHIP, 4),
    new SpopShipType(SpopShipType::CRUISER, 3),
    new SpopShipType(SpopShipType::CRUISER, 3),
    new SpopShipType(SpopShipType::TORPEDO_BOAT, 2),
    new SpopShipType(SpopShipType::TORPEDO_BOAT, 2),
    new SpopShipType(SpopShipType::TORPEDO_BOAT, 2),
    new SpopShipType(SpopShipType::SUBMARINE, 1),
    new SpopShipType(SpopShipType::SUBMARINE, 1),
    new SpopShipType(SpopShipType::SUBMARINE, 1),
    new SpopShipType(SpopShipType::SUBMARINE, 1)
));
$GLOBALS[SpopGameType::NORMAL_BE] = $SPOP_GAME_TYPE_NORMAL_BE;

/**
 * Partie moyen plateau.
 *
 * @var GameType $SPOP_GAME_TYPE_MEDIUM
 */
$SPOP_GAME_TYPE_MEDIUM = new SpopGameType(SpopGameType::MEDIUM, 15, array(
    new SpopShipType(SpopShipType::CARRIER, 5),
    new SpopShipType(SpopShipType::CRUISER, 4)
    // TODO Ajouter d'autres bateaux
));
$GLOBALS[SpopGameType::MEDIUM] = $SPOP_GAME_TYPE_MEDIUM;

/**
 * Partie grand plateau.
 *
 * @var GameType $SPOP_GAME_TYPE_LARGE
 */
$SPOP_GAME_TYPE_LARGE = new SpopGameType(SpopGameType::LARGE, 20, array(
    new SpopShipType(SpopShipType::CARRIER, 5),
    new SpopShipType(SpopShipType::CRUISER, 4)
    // TODO Ajouter d'autres bateaux
));
$GLOBALS[SpopGameType::LARGE] = $SPOP_GAME_TYPE_LARGE;

/**
 * Tableau des types de Parties possibles.
 *
 * @var array $SPOP_GAME_TYPES
 */
$SPOP_GAME_TYPES = array(
    $SPOP_GAME_TYPE_NORMAL_FR,
    $SPOP_GAME_TYPE_NORMAL_BE,
    $SPOP_GAME_TYPE_MEDIUM,
    $SPOP_GAME_TYPE_LARGE
);
$GLOBALS[SpopGameType::VALUES] = $SPOP_GAME_TYPES;

?>