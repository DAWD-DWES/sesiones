<?php

// include the class file
// begin the session
session_start();

session_unset();
session_destroy();
setcookie(session_name(), '', 0, '/');
//session_regenerate_id(true);

