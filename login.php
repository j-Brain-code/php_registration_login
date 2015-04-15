<?php require_once 'login_validate.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>

    <form action="login.php" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name"><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email"><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password"><br>

        <input type="submit" name="login" value="Login">
    </form>

</body>
</html>