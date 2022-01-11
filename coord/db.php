<?php
$dsn = 'mysql:host=localhost;dbname=dept';
$username = 'root';
$password = '';
$options = [];
try {
$connexion = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
}