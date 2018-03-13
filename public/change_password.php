<?php

include_once __DIR__.'/../src/service/init.php';
require_once __DIR__.'/../src/service/DBConnector.php';

session_start();
$newPassword = $_POST['password_1'];
$username = $_SESSION['username'];

if ($_POST['password_1'] != $_POST['password_2']) {
    echo 'The two passwords are not identical';
    return;
}

try {
    $connection = Service\DBConnector::getConnection();
} catch (RuntimeException $e) {
    http_response_code(500);
    echo 'An error occured, please contact support';
    exit(1);
}

$sqlUpdatePassword = "UPDATE user SET password=\"$newPassword\" WHERE username=\"$username\"";

$connection->exec($sqlUpdatePassword);

session_abort();
session_destroy();

header('Location: index.php');