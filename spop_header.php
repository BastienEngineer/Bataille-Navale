<?php
if (session_id() == "") {
    session_start();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <!--<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

</head>

<header class="header">

<!-- début barre de navigation -->
<br>
<br>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">Menu</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

<!-- fin barre de navigation -->

   <div class="header-title">Opération Espace</div>
   <!-- affichage du pseudo du joueur connecté -->
<div class="header-logout">
<a href="spop_logout.php">
<img src="img/spop_disconnect_button.png"></a>
</div>
   <div class="header-name">
   <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ""; ?>
   <?php echo isset($_SESSION['partner_name']) ? " vs. " . $_SESSION['partner_name'] : ""; ?>
   </div>
</header>
<body>

                        <!-- Javascript Bootstrap -->
                        
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/creative.min.js"></script>

                        <!-- Plugins JavaScript -->
                        
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
</body>
</html>
