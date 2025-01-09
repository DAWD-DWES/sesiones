<?php
session_start();
define('ERROR_MESSAGE', "Credenciales Incorrectas");

if (isset($_SESSION['usuario'])) {
    if (filter_has_var(INPUT_POST, 'botonenviologout')) {
        session_unset();
        session_destroy();
        setcookie(session_name(), '', 0, '/');
        $loggedIn = false;
    } else {
        $loggedIn = true;
    }
} else {
    if (empty($_POST)) {
        $loggedIn = false;
    } elseif (filter_input(INPUT_POST, 'botonenviologin')) {
        $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_UNSAFE_RAW));
        $contrasenia = trim(filter_input(INPUT_POST, 'contrasenia', FILTER_UNSAFE_RAW));
        if ($nombre === 'ivan' && $contrasenia === 'ivan') {
            $_SESSION['usuario'] = $nombre;
            $loggedIn = true;
        } else {
            $invalidAccess = true;
            $loggedIn = false;
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de lOGIN </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <?php if (!$loggedIn): ?>
            <h1>Formulario de Login de Cliente</h1>
            <div class = "capaform">
                <form class = "form-font" name = "Formlogin"
                      action = "index.php" method = "POST">
                    <div class = "form-section">
                        <label for = "nombre">Nombre:</label>
                        <input id = "nombre" type = "text" required = "required" name = "nombre" size = "30" />
                    </div>
                    <div class = "form-section">
                        <label for = "contrasenia">Contraseña:</label>
                        <input id = "contrasenia" type = "password" required = "required" name = "contrasenia" size = "20"/>
                    </div>
                    <input class = "submit" type = "submit"
                           value = "Enviar" name = "botonenviologin" />
                </form>
                <?php if ($invalidAccess ?? false): ?>
                    <h1>Error de Credenciales</h1>
                <?php endif ?> 
            </div>
        <?php else: ?>
            <h1>Pagina de Cliente</h1>
            <form class="form-font" name="FormLogout" 
                  action="index.php" method="POST">
                <input class="submit" type="submit" 
                       value="logout" name="botonenviologout" /> 
            </form>
            <h1>Hola <?= $_SESSION['usuario']; ?> </h1>
        <?php endif; ?>
    </body>
</html>
