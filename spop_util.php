<?php

// Fonctions utilitaires

/**
 * Retourne VRAI si une chaine de caractères a une forme valide.
 *
 * @param string $name
 * @return number
 */
function spop_is_well_formed_name($name)
{
    return preg_match("/^[a-zA-Z0-9]{3,32}$/", $name);
}

define('SPOP_MALFORMED_NAME', "Seuls les lettres et les chiffres sont autorisés pour le nom (3-32)");
define('SPOP_REQUIRED_NAME', "Le nom est requis");
define('SPOP_UNKNOWN_NAME', "Nom inconnu");
define('SPOP_DUPLICATE_NAME', "Nom déjà utilisé");

function spop_is_well_formed_fullname($fullname)
{
    return preg_match("/^[a-zA-Z0-9 ]{0,64}$/", $fullname);
}

define('SPOP_MALFORMED_FULLNAME', "Seuls les lettres et les chiffres et les espaces sont autorisés pour le nom complet (0-64).");

function spop_is_well_formed_password($password)
{
    return preg_match("/^[a-zA-Z0-9]+$/", $password);
}

define('SPOP_MALFORMED_PASSWORD', "Seuls les lettres et les chiffres sont autorisés pour le mot de passe");
define('SPOP_REQUIRED_PASSWORD', "Le mot de passe est requis");
define('SPOP_INVALID_PASSWORD', "Mot de passe invalide");

function spop_is_well_formed_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) <= 64;
}

define('SPOP_MALFORMED_EMAIL', "Format de mail incorrect.");
define('SPOP_REQUIRED_EMAIL', "Le mail est requis.");

/**
 * Retourne la classe à utiliser pour un input de login.
 *
 * @param string $err
 *            Le message d'erreur.
 * @return string La classe à utiliser pour un input de login.
 */
function spop_login_input_class($err)
{
    if ($err == "") {
        return SPOP_VALID_LOGIN_INPUT_CLASS;
    } else {
        return "login-input-error";
    }
}

define('SPOP_VALID_LOGIN_INPUT_CLASS', "login-input");

/**
 * Transforme une chaine d'entrée pour éviter certains problèmes.
 *
 * @param string $data
 *            La valeur à valider.
 * @return string La valeur validée.
 */
function spop_test_input($data)
{
    // Suppression des espaces aux extrémités
    $data = trim($data);
    // Remplacement des caractères protégés poar '\'
    $data = stripslashes($data);
    // Conversion de certains caractères par des entités html
    $data = htmlspecialchars($data);
    return $data;
}
?>