<?php
// Cerramos todas las possibles  sessiones activas que nuestra pagina tenga
session_start();
session_unset();
session_destroy();

header('Location: index.php');
exit();
?>
