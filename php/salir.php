<?php
// Inicializar sesion 
session_start();
 
$_SESSION = array();
 
//Destruir la sesion 
session_destroy();
 
// Redirigirse a la pagina index 
header("location: ../index.html");
exit;
?>