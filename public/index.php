<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login/Register</title>
</head>
<body>
    <h1>Welcome to the best homepage ever</h1>

    <form action="register.php" method="post">
        <h2>Register</h2>
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username...">
        <br>
        <label for="password_1">Type your password</label>
        <input type="password" name="password_1" placeholder="Password...">
        <br>
        <label for="password_2">Confirm your password</label>
        <input type="password" name="password_2" placeholder="Confirm...">
        <br>
        <button type="submit">Register</button>
    </form>

    <form action="login.php" method="post">
        <h2>Login</h2>
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username...">
        <br>
        <label for="password">Type your password</label>
        <input type="password" name="password" placeholder="Password...">
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>