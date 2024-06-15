<?php
$config = require 'config.php';

$dsn = $config['database']['dsn'];
$username = $config['database']['username'];
$password = $config['database']['password'];

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>