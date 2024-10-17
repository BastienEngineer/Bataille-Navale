<?php
require_once 'spop_game_type.php';
require_once 'spop_player.php';

// Fonctions permettant d'accéder à la BdD SPOP.

/**
 * Retourne VRAI si un nom d'utilisateur est connu.
 *
 * @param string $name
 *            Le nom de l'utilisateur à vérifier.
 * @return boolean
 */
function spop_db_is_valid_name($name)
{
    // TODO
    return $name == "dc14" || $name == "tc14" || $name == "bt14";
}

/**
 * Retourne VRAI si le mot de passe est bien celui d'un utilisateur.
 *
 * @param string $name
 *            Le nom de l'utilisateur
 * @param string $password
 *            Le mode de passe à verifier
 */
function spop_db_is_valid_password($name, $password)
{
    // TODO
    return ($name == "dc14" && $password == "123") || ($name == "tc14" && $password == "456" || ($name == "bt14" && $password == "789"));
}

function spop_db_is_connected($name)
{
    // TODO
    return FALSE;
}

/**
 * Connecte un utilisateur à la base et retourne son ID.
 *
 * @param string $name
 *            Le nom de l'uitilisateur.
 */
function spop_db_connect($name)
{
    // TODO
    if (spop_db_is_connected($name)) {
        return SPOP_DB_ALREADY_CONNECTED;
    } else {
        if ($name == "dc14") {
            return 1;
        } elseif ($name == "tc14") {
            return 2;
        } elseif ($name == "bt14") {
            return 3;
        } else {
            return SPOP_DB_CONNECTION_FAILED;
        }
    }
}

define('SPOP_DB_ALREADY_CONNECTED', - 1);
define('SPOP_DB_CONNECTION_FAILED', - 2);

function spop_db_disconnect($id)
{
    // TODO
}

/**
 * Créer un compte et retourne l'ID correspondant.
 * En cas d'echec, retourne SPOP_ACCOUNT_CREATION_FAILED.
 * En cas de succès, retourne l'ID associé à ce nouveau compte.
 *
 * @param string $name
 *            Nom de l'utilisateur.
 * @param string $fullname
 *            Nom complet de l'utilisateur.
 * @param string $email
 *            Mail de l'utilisateur.
 * @param string $password
 *            Mot de passe de l'utilisateur.
 */
function spop_db_create_account($name, $fullname, $email, $password)
{
    // TODO
    return SPOP_DB_ACCOUNT_CREATION_FAILED;
}

define('SPOP_DB_ACCOUNT_CREATION_FAILED', - 1);

/**
 * Retourne la liste des joueurs connectés en attente de paretenaire poru un jeu d'uen taille donnée.
 *
 * @param string $size
 *            Taille du jeu
 * @return string[]|array Tableau des noms des joueurs.
 */
function spop_db_list_partners($size)
{
    // TODO
    if ($size == SPOP_DB_SIZE_SMALL) {
        return array(
            "j0",
            "j1"
        );
    } elseif ($size == SPOP_DB_SIZE_MEDIUM) {
        return array(
            "j2"
        );
    } else {
        return array(
            "j3",
            "j4"
        );
    }
}

define('SPOP_DB_SIZE_SMALL', "S");
define('SPOP_DB_SIZE_MEDIUM', "M");
define('SPOP_DB_SIZE_LARGE', "L");

function spop_db_list_free_players()
{
    // TODO
    $p1 = new SpopPlayer(1, "dc14");
    $p1->setGameTypeChoice($GLOBALS["NORMAL_FR"]->getName());
    $p2 = new SpopPlayer(2, "tc14");
    $p2->setGameTypeChoice($GLOBALS["NORMAL_BE"]->getName());
    
    return array(
        $p1,
        $p2
    );
}


function spop_db_start_game($player_id, $game_type) {
    // TODO
    header('Location: spop_round_init.php');
}

?>