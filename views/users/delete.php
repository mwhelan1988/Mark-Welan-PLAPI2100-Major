<?php

require_once("../../controllers/includes.php");

session_start();

$user = new User;
$user->delete($_SESSION["user_logged_in"]);

session_destroy();
unset($_COOKIE);

header("Location: /");