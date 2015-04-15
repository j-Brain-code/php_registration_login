<?php require_once 'register_validate.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        <h1>Register</h1>
        <div id="errors">
            <?php if (!empty($nameError)): ?>
                <span class="help-inline"><?php echo $nameError;?></span><br>
            <?php endif; ?>

            <?php if (!empty($emailError)): ?>
                <span class="help-inline"><?php echo $emailError;?></span><br>
            <?php endif; ?>

            <?php if (!empty($emailError2)): ?>
                <span class="help-inline"><?php echo $emailError2;?></span><br>
            <?php endif; ?>

            <?php if (!empty($passwordError)): ?>
                <span class="help-inline"><?php echo $passwordError;?></span><br>
            <?php endif; ?>
        </div><br>
        <form action="register.php" method="post" novalidate="novalidate">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo !empty($name) ? $name : ''; ?>"><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo !empty($email) ? $email : ''; ?>"><br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password"><br>

            <input type="submit" name="register" value="Register">
        </form>
    </body>
</html>