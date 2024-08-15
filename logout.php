<?php
session_start();
session_unset();
session_destroy();
setcookie("last_active", "", time() - 3600); // Expire the cookie
header('Location: index-user.php');
exit;
?>
