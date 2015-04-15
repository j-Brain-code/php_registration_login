<?php

session_start();

require_once 'database.php';

    if (!empty($_GET['logout'])) {
        if ($_GET['logout'] == 1) {
            session_destroy();
        }
    }

    if (isset($_POST['login'])) {
        $name     = !empty($_POST['name']) ? trim($_POST['name']) : null;
        $email    = !empty($_POST['email']) ? trim($_POST['email']) : null;
        $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

        $sql = 'SELECT id, name, email, password FROM users WHERE email = :email';
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':email', $email);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user === false) {
            echo 'Incorrect login credentials';
        } else {
            $validPassword = password_verify($password, $user['password']);

            if ($validPassword) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['logged_in'] = 1;

                header('Location: homepage.php');
                exit;
            } else {
                echo 'Incorrect login credentials';
            }
        }
    }