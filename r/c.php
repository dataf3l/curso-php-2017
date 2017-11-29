<?php
$host = '127.0.0.1';
$db   = 'tienda';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
	];
$pdo = new PDO($dsn, $user, $pass, $opt);

function runSQL($SQL){
	global $pdo;
	$getData = $pdo->prepare($SQL);
	$getData->execute();

	return $getData->fetchAll();

}
