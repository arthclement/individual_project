<?php
include_once __DIR__.'/../src/service/init.php';
require_once __DIR__.'/../src/service/DBConnector.php';

$username = $_POST['username'];
$password = $_POST['password'];
    
try {
    $connection = Service\DBConnector::getConnection();
} catch (RuntimeException $e) {
    http_response_code(500);
    echo 'An error occured, please contact support';
    exit(1);
}

$sqlSearchForUser = "SELECT * FROM register.user WHERE username=\"$username\" AND password=\"$password\"";

$sqlQuery = $connection->prepare($sqlSearchForUser);
$sqlQuery->execute();
$usernameReturnDB = $sqlQuery->fetchAll();

if (!$usernameReturnDB) {
    echo 'Incorrect username or password';
    return;
}

session_start();
$_SESSION['username'] = $username;
$_SESSION['user_id'] = $usernameReturnDB[0]['iduser'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
</head>
<body>
    <h1>You're successfully logged in!</h1>
    <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
    <p>Your userID is <?php echo $_SESSION['user_id']; ?></p>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
    <form action="change_username.php" method="post">
        <label for="newUsername">Your new username</label>
        <input type="text" name="newUsername">
        <br>
        <button type="submit">Change username</button>
    </form>
    <form action="change_password.php" method="post">
        <label for="currentPassword">Your current password</label>
        <input type="password" name="currentPassword">
        <br>
        <label for="password_1">Your new password</label>
        <input type="text" name="password_1">
        <br>
        <label for="password_2">Confirm new password</label>
        <input type="text" name="password_2">
        <br>
        <button type="submit">Change password</button>
    </form>
</body>
</html>