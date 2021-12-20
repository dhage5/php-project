<?php
  $allow=true;
  include("common/config.php");

?>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

header("Location: register.php?logout=success");
//echo "<h2>logout succesfully<h2>";

?>

