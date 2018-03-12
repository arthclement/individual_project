<?php
include_once __DIR__.'/../src/service/init.php';
require_once __DIR__.'/../src/service/DBConnector.php';

$username = $_POST['username'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];
$passwordCheck = false;
$usernameCheck = false;

if ($password_1 === $password_2 ?? strlen($password_2) > 8) {
    $passwordCheck = true;
}

if (strlen($username) >= 8 && is_string($username)) {
    $usernameCheck = true;
}

if ($usernameCheck && $passwordCheck) {
    try {
        $connection = Service\DBConnector::getConnection();
    } catch (RuntimeException $e) {
        http_response_code(500);
        echo 'An error occured, please contact support';
        exit(1);
    }

    $sql = "INSERT INTO user(username, password) VALUES (\"$username\", \"$password_1\")";
    $affected = $connection->exec($sql);

    if (!$affected) {
        echo implode(',', $connection->errorInfo());
        exit(1);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>You're successfully registered!</h1>
    <p>Your username is: <?php echo $username ?></p>
    <p>Your password is: <?php echo $password_1 ?></p>
    <a href="index.php">Go back to login page</a>
</body>
</html>