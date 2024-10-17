<?php
require_once 'spop_player_status.php';

/**
 * Joueur.
 */
class SpopPlayer
{

    private $id;

    private $name;

    private $status;

    /**
     *
     * @var string Choix (préférence) du type de jeu.
     */
    private $choice;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = SpopPlayerStatus ::OFFLINE;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function setGameTypeChoice(string $game_type)
    {
        $this->choice = $game_type;
        return $this;
    }

    public function getGameTypeChoice(): string
    {
        return $this->choice;
    }

    public function __toString()
    {
        return "[id: " . $this->getId() . " name: " . $this->getName() . " choice: " . $this->getGameTypeChoice() . "]";
    }
}

?>
