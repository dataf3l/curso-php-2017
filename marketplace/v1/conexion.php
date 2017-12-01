<?php
$charset = 'utf8mb4';

if($_SERVER["HTTP_HOST"] == "localhost"){
    $host = '127.0.0.1';
    $db = 'marketplace';
    $user = 'root';
    $pass = '';
}else{
    $host = '127.0.0.1';
    $db = "learners_marketplace";
    $user = "learners_market";
    $pass = "yhsCJNZPKf";
}
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);
