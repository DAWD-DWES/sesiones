<?php

// include the class file
include('myclass.php');

// begin the session
session_start();

// instantiate a new instance of the class mySessionClass
$_SESSION['foo'] = new mySessionClass();

// echo a little message to say it is done
echo 'Setting value of foo to an object';
?>