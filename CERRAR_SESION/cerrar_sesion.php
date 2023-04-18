<?php

session_start();
session_destroy();
setcookie("sessionID", "", time() - 3600, "/"); // Caduca inmediatamente (hace una hora atrás)

header("Location: ../index.php");
exit();


?>