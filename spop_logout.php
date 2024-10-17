<?php
// Initialize the session
session_start();

require ("spop_db.php");

// Deconnexion de la DB
spop_db_disconnect($_SESSION['id']);

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: index.php");
exit();
?>
