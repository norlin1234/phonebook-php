<?php
session_start();
unset($_SESSION["username"]);
session_destroy();
echo "LOGGED OUT<br/><br/>";

echo "<a href='index.php'>LOG IN</a>";
?>