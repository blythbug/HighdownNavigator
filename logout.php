<?php

include 'config.php';

//Terminate session
session_start();
session_unset();
session_destroy();

// Redirect to login form
header('location:login_form.php');

