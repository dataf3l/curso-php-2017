<?php
$host = '127.0.0.1';
$db   = 'curso';
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


$f = file("./input2.csv");
foreach($f as $line){
	$row = str_getcsv($line,";");

	$id = $row[0];
	$fecha_inicial = $row[1];
	$fecha_final = $row[2];
	$valor_asegurado = $row[3];
	$cliente_id = $row[4];
	$estado = $row[5];
	$valor_prima = $row[6];

	$sql = "INSERT INTO poliza VALUES('$id', '$fecha_inicial', '$fecha_final', '$valor_asegurado', '$cliente_id', '$estado', '$valor_prima')";
	echo($sql);
	echo("\n");

	$stmt = $pdo->prepare($sql);
	$stmt->execute();


}

