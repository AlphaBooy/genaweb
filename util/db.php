<?php
$host = "localhost";
$username = "root";
$password = "root";
$db = 'genaweb';
$charset = 'utf8mb4';

function getPDO($host = "localhost", $user = "root", $pass = "root", $db = 'genaweb', $charset = 'utf8mb4') {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (PDOException $e) {
        echo $e->getMessage();
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}

function getHost() {
    return "localhost";
}
function getUser() {
    return "root";
}
function getPass() {
    return "root";
}
function getDB() {
    return "genaweb";
}
function getCharset() {
    return "utf8mb4";
}