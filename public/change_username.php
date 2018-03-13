<?php

include_once __DIR__.'/../src/service/init.php';
require_once __DIR__.'/../src/service/DBConnector.php';

$newUsername = $_POST['newUsername'];
$oldUsername = $_SESSION['username'];

try {
    $connection = Service\DBConnector::getConnection();
} catch (RuntimeException $e) {
    http_response_code(500);
    echo 'An error occured, please contact support';
    exit(1);
}

$sqlUpdateUsername = "UPDATE user SET username=\"$newUsername\" WHERE username=\"$oldUsername\"";

$sqlQuery = $connection->prepare($sqlUpdateUsername);
$sqlQuery->execute();

session_abort();
session_destroy();

header('Location: index.php');