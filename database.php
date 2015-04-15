<?php

/**
 * PDO configuration
 *
 * Set user
 * Set password
 * Set host
 * Set database
 *
 */
define('MYSQL_USER', ''); // Fill in your user
define('MYSQL_PASSWORD', ''); // Fill in your password
define('MYSQL_HOST', ''); // Fill in your host
define('MYSQL_DATABASE', ''); // Fill in your database

/**
 * PDO options / configuration details
 *
 * Set the error mode to "Exceptions"
 * Turn off emulated prepared statements
 */
$pdoOptions = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
];

/**
 * Connect to MySQL and instantiate the PDO object.
 */
$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE,
    MYSQL_USER,
    MYSQL_PASSWORD,
    $pdoOptions
);


