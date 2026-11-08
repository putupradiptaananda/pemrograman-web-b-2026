<?php
session_start();
// Destroy the session to log the user out
session_destroy();
// Redirect back to the homepage
header("Location: index.php");
exit();
?>