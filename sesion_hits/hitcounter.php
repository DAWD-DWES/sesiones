<?php
$sesion_status = session_status();
session_start();
$sesion_status = session_status();

$hit = filter_has_var(INPUT_POST, 'hit');
$close = filter_has_var(INPUT_POST, 'close');

if ($hit) {
    if (isset($_SESSION['counter'])) {
        $_SESSION['counter'] += 1;
    } else {
        $_SESSION['counter'] = 1;
    }
}
if ($close) {
    session_unset();
    session_destroy();
    setcookie(session_name(), '', 0, '/');
}
?>
<html>

    <head>
        <title>Setting up a PHP session</title>
    </head>

    <body>
        <?php if ($close): ?>
            <h1> <?= "Has cerrado la sesión" ?></h1>
        <?php elseif ($hit): ?>
            <h1> <?= "Has visitado esta página " . $_SESSION['counter'] . (($_SESSION['counter'] === 1) ? " vez" : " veces") . " en esta sesión." ?></h1>
        <?php endif ?>
        <form action="hitcounter.php" method ="POST">
            <h1>Selecciona un botón</h1>
            <input type="submit" name="hit" value="hit"/>
            <input type="submit" name="close" value="close"/>         
        </form> 
    </body>
</html>
