<?php

// include the class file
include('myclass.php');



// begin the session
session_start();

session_destroy();
session_unset();
$params = session_get_cookie_params();
setcookie(
        session_name(), // Nombre de la cookie de sesión
        '', // Valor vacío
        time() - 42000, // Fecha de expiración pasada
        $params["path"], // Mismo path que la cookie original
        $params["domain"], // Mismo dominio que la cookie original
        $params["secure"], // Mismo flag secure
        $params["httponly"] // Mismo flag httponly
);
?>
