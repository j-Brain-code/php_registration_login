<?php
session_start();

    if (!$_SESSION['logged_in']) {
        header("Location:login.php?logout=1");
    } else {
        echo "<h1>Homepage</h1>";
        echo "<p>You've logged in successfully!</p><br>";

        echo "<p><a href=\"login.php?logout=1\">Logout</a></p>";
    }