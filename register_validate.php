<?php

session_start();

require_once 'database.php';

if (isset($_POST['register'])) {
    // Set the error variables to null
    $nameError     = null;
    $emailError    = null;
    $emailError2   = null;
    $passwordError = null;

    // Retrieve the field values from our registration form
    $name     = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $email    = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

    // Check for empty fields for name, email and password / if there are assign it to a variable
    if (empty($_POST['name'])) {
        $nameError = 'Please enter a name';
    }

    if (empty($_POST['email'])) {
        $emailError = 'Please enter a email';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailError2 = 'Please enter a valid email';
    }

    if (empty($_POST['password'])) {
        $passwordError = 'Please enter a password';
    }

    // If there are errors do not execute the code
    if (!$nameError && !$emailError && !$passwordError) {

        // Construct the SQL statement and prepare it
        $sql = 'SELECT COUNT(email) AS num FROM users WHERE email = :email';
        $stmt = $pdo->prepare($sql);

        // Bind the provided email to our prepared statement
        $stmt->bindValue(':email', $email);

        $stmt->execute();

        // Fetch the row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // If the provided username already exists - display error / else insert data
        if ($row['num'] > 0) {
            echo 'That email already exists';
        } else {
            // Hash the password as we do NOT want to store our passwords in plain text
            $passwordHash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

            // Prepare our INSERT statement
            $sql = 'INSERT INTO users(name, email, password) VALUES(?, ?, ?)';
            $stmt = $pdo->prepare($sql);

            // Bind our variables
            $result = $stmt->execute(array(
                $name,
                $email,
                $passwordHash
            ));

            // If the signup process is successful
            if ($result) {
                echo 'Thank you for registering';

                // Inserts last user id to session id
                $_SESSION['id'] = $pdo->lastInsertId();

                // Redirect to login page


            }
        }
    }
}
