<?php
include_once __DIR__.'/../src/service/init.php';
require_once __DIR__.'/../src/service/DBConnector.php';

$username = $_POST['username'];
$password = $_POST['password'];
$passwordCheck = false;
$usernameCheck = false;
