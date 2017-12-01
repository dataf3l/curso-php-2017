<?php
require_once("dict.php");
$filter_fields = dict("filter");

$host = '127.0.0.1';
$db   = 'marketplace';
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
$email = $_POST['email'];

$conditions = array();
foreach($filter_fields as $field_name => $field){
	if(!isset( $_POST[$field_name])){
		continue;
	}
	$values =  $_POST[$field_name];
	$conditions[]="$field_name in (\'".implode("\',\'",$values)."\')";
}

$query= implode(" AND ", $conditions);

$sql = "INSERT INTO alert VALUES('0', '$email', '$query')";
echo($sql);
echo("\n");
$stmt = $pdo->prepare($sql);
$stmt->execute();
echo("Alerta creada");
