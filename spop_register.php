<!-- Ecran servant à s'inscrire -->
<?php
session_start();

require_once("spop_util.php");
require_once("spop_db.php");


// Nom et mot de passe
$name = $fullname = $email = $password = "";
// Erreurs associées au nom et mot de passe
$nameErr = $fullnameErr = $emailErr = $passwordErr = "";
// Classe de style pour le nom et le mot de passe
$nameClass = $fullnameClass = $emailClass = $passwordClass = SPOP_VALID_LOGIN_INPUT_CLASS;

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
            // Vérifier que le nom n'existe pas déjà dans la base
            if (spop_db_is_valid_name($name)) {
                $nameErr = SPOP_DUPLICATE_NAME;
            } else {
                // Ce nom est valide et nouveau
            }
        }
    }

    $nameClass = spop_login_input_class($nameErr);

    // Valider la forme du nom complet
    $fullname = spop_test_input($_POST["fullname"]);
    // On autorise seulement les lettres, les chiffres et les espaces
    if (! spop_is_well_formed_fullname($fullname)) {
        $fullnameErr = SPOP_MALFORMED_FULLNAME;
    }

    $fullnameClass = spop_login_input_class($fullnameErr);

    // Valider la forme du mail
    if (empty($_POST["email"])) {
        $emailErr = SPOP_REQUIRED_EMAIL;
    } else {
        $email = spop_test_input($_POST["email"]);
        // On autorise seulement les lettres et les chiffres
        // Le nom doit contenir au moins un caractère
        if (! spop_is_well_formed_email($email)) {
            // if (! preg_match("/^[a-zA-Z0-9\-\.]+[@][a-zA-Z0-9\-\.]+$/", $name)) {
            $emailErr = SPOP_MALFORMED_EMAIL;
        }
    }

    $emailClass = spop_login_input_class($emailErr);

    // Valider la forme du mot de passe
    if (empty($_POST["password"])) {
        $passwordErr = SPOP_REQUIRED_PASSWORD;
    } else {
        $password = spop_test_input($_POST["password"]);
        // On autorise seulement les lettres et les chiffres
        if (! spop_is_well_formed_password($password)) {
            $passwordErr = SPOP_MALFORMED_PASSWORD;
        }
    }

    $passwordClass = spop_login_input_class($passwordErr);

    if ($nameErr == "" && $fullnameErr == "" && $emailErr == "" && $passwordErr == "") { //Si tout est bon
        // Créer le compte avec les informations
        $id = spop_db_create_account($name, $fullname, $email, $password);
        if ($id == SPOP_DB_ACCOUNT_CREATION_FAILED) {
            // TODO Afficher un message d'erreur
        } else {
            $id = spop_db_connect($name);
            if ($id < 0) { //si négatif --> erreur
                // TODO Afficher un message d'erreur
            } else {
                // On est connecté : aller à la page de lancement de partie
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
                header('Location: spop_partner.php'); //Redirection vers la page de choix de partenaire
                exit();
            }
        }
    }
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
      <form action="spop_register.php" method="post" class="login-form">
         <input type="text" name="name" placeholder="nom" title="<?php echo $nameErr; ?>" value="<?php echo $name; ?>" class="<?php echo $nameClass; ?>">
         <br>
         <input type="text" name="fullname" placeholder="nom complet" title="<?php echo $fullnameErr; ?>" value="<?php echo $fullname; ?>" class="<?php echo $fullnameClass; ?>">
         <br>
         <input type="text" name="email" placeholder="email" title="<?php echo $emailErr; ?>" value="<?php echo $email; ?>" class="<?php echo $emailClass; ?>">
         <br>
         <input type="password" name="password" placeholder="mot de passe" title="<?php echo $passwordErr; ?>" value="<?php echo $password; ?>" class="<?php echo $passwordClass; ?>">
         <br>
         <input type="submit" value="S'inscrire" class="login-button">
         <p class="login-message">
            Déjà inscrit ? <a href="spop_sign_in.php">Se connecter</a>
         </p>
         <p class="login-message">
            <a href="index.php">Retour à l'accueil</a>
         </p>
      </form>
   </div>
<?php include("spop_footer.php"); ?>
</body>
</html>