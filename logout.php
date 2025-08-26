<?php
session_start(); // Start the session

// Destroy all session data
session_unset();
session_destroy();

// Redirect the user back to the login page or any other page
header("Location: index.php");
exit();
?>
