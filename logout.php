<?php
session_start();

// Destruir la sesión
session_destroy();

// Redirigir al formulario de inicio de sesión
header("Location: log.php");
exit();
?>
