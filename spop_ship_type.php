<?php

/**
 * Type de bateau.
 *
 */
class SpopShipType
{

    private $name;

    private $size;

    public function __construct($name, $size)
    {
        $this->name = $name;
        $this->size = $size;
    }
    
    /**
     * @return string Le nom de ce type de beteau.
     */
    public function getName() : string {
        return $this->name;
    }

    /**
     * @return int La taille de ce type de bateau.
     */
    public function getSize() : int {
        return $this->size;
    }
    
    public function __toString() {
        return "[" . $this->name . " " . $this-> size . "]"; 
    }
        
    
    const CARRIER = "Porte-Avions";
    const CRUISER = "Croiseur";
    const BATTLE_SHIP = "Cuirassé";
    const SUBMARINE = "Sous-Marin";
    const DESTROYER = "Destroyer"; // Contre-Torpilleur
    const TORPEDO_BOAT = "Torpilleur"; 
}
?>