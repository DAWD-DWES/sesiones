<?php

// begin the session
session_start();

// set the value of the session variable 'foo'
$_SESSION['foo'] = 'bar';

// set the value of the session variable 'bar'
$_SESSION['bar'] = 'foo';

// set the value of the session variable 'foobar'
$_SESSION['foobar'] = 'fubar';

// echo a little message to say it is done
echo 'Setting session values';
?>
