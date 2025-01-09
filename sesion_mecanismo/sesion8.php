<?php

// include the class file
include('myclass.php');

// begin the session
session_start();

echo $_SESSION['foo']->bar();
?>
