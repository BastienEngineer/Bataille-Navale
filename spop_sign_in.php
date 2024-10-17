<!-- Ecran servant à se connecter quand on est déjà inscrit -->

<?php
session_start();
    
require_once ("spop_util.php");
require_once ("spop_db.php");

// Nom et mot de passe
$name = $password = "";
// Erreurs associées au nom et mot de passe
$nameErr = $passwordErr = "";
// Classe de style pour le nom et le mot de passe
$nameClass = $passwordClass = SPOP_VALID_LOGIN_INPUT_CLASS;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider la forme du nom
    if (empty($_POST["name"])) {
        $nameErr = SPOP_REQUIRED_NAME;
    } else {
        $name = spop_test_input($_POST["name"]);
        // On autorise seulement les lettres et les chiffres
        // Le nom doit contenir au moins un caractère
        if (! spop_is_well_formed_name($name)) {
            $nameErr = SPOP_MALFORMED_NAME;
        } else {
            // Vérifier que le nom existe dans la base
            if (! spop_db_is_valid_name($name)) {
                $nameErr = SPOP_UNKNOWN_NAME;
            }
        }
    }

    $nameClass = spop_login_input_class($nameErr);

    // Valider la forme du mot de passe
    if (empty($_POST["password"])) {
        $passwordErr = SPOP_REQUIRED_PASSWORD;
    } else {
        $password = spop_test_input($_POST["password"]);
        // On autorise seulement les lettres et les chiffres
        if (! spop_is_well_formed_password($password)) {
            $passwordErr = SPOP_MALFORMED_PASSWORD;
        } elseif ($nameErr == "") {
            if (spop_db_is_valid_password($name, $password)) {
                // On se connecte et on mémorise l'ID de l'utilisateur.
                $id = spop_db_connect($name);
                if ($id < 0) {
                    // TODO Afficher un message d'erreur
                } else {
                    // Aller à la page de lancement de partie
                    $_SESSION['id'] = $id;
                    $_SESSION['name'] = $name;
                    header('Location: spop_partner.php');
                    exit();
                }
            } else {
                $passwordErr = SPOP_INVALID_PASSWORD;
            }
        }
    }

    $passwordClass = spop_login_input_class($passwordErr);
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SPOP</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<?php include("spop_header.php"); ?>
   <div class="login-page">
      <form action="spop_sign_in.php" method="post" class="login-form">
         <input type="text" name="name" placeholder="nom" title="<?php echo $nameErr; ?>" value="<?php echo $name; ?>" class="<?php echo $nameClass; ?>">
         <br>
         <input type="password" name="password" placeholder="mot de passe" title="<?php echo $passwordErr; ?>" value="<?php echo $password; ?>" class="<?php echo $passwordClass; ?>">
         <br>
         <input type="submit" value="Se connecter" class="login-button">
         <p class="login-message">
            Pas encore inscrit ? <a href="spop_register.php">S'inscrire</a>
         </p>
         <p class="login-message">
            <a href="index.php">Retour à l'accueil</a>
         </p>
      </form>
   </div>
<?php include("spop_footer.php"); ?>
</body>
</html>