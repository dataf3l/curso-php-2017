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

$getData = $pdo->prepare("SELECT * FROM poliza");
$getData->execute();

$polizas = $getData->fetchAll();

echo "
<style>
th, td, h1{
	font-family: helvetica, arial, sans-serif;
}

</style> 


<h1> POLIZAS </h1>
<table cellspacing=0 cellpadding=3 border=1>";
echo "<tr>

<th>Id</th>
<th>Fecha Inicial</th>
<th>Fecha Final</th>
<th>Valor Asegurado</th>
<th>Cliente Id</th>
<th>Estado</th>
<th>Valor Prima</th>
</tr>";


foreach( $polizas as $row) {
    $f = $row["fecha_inicial"];
    $p= explode(" " , $f);
    $row["fecha_inicial"]=$p[0];

    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['fecha_inicial']."</td>";
    echo "<td>".$row['fecha_final']."</td>";
    echo "<td>".$row['valor_asegurado']."</td>";
    echo "<td>".$row['cliente_id']."</td>";
    echo "<td>".$row['estado']."</td>";
    echo "<td>".$row['valor_prima']."</td>";
    echo "</tr>";
}

echo "</table>";
