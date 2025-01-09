<?php

// begin the session
session_start();

// set the value of the session variable 'foo'
$_SESSION['foo'] = 'bar';

// echo a little message to say it is done
echo 'Setting value of foo';
?>