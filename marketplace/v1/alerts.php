<?php
//  insert into mascota values(0, 'tico','terrier','perro','Bogotá','12');
// T=texto
$tabla = "alert";
$once = 0;

function alert_dict() {
    return array(
        'id' => 'T', 'email' => 'T', 'query' => 'T'
    );
}

echo "
<style>
th, td, h1{
	font-family: helvetica, arial, sans-serif;
}
</style> ";
require_once ('conexion.php');
$charset = 'utf8mb4';


function runSQL($SQL) {
    global $pdo;
    $getData = $pdo->prepare($SQL);
    $getData->execute();
    return $getData->fetchAll();
}

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = (int) $_GET['page'];
}
$ps = 10;
$offset = $ps * $page - $ps;
$SQL = "SELECT count(*) as c from $tabla";
$ds = runSQL($SQL);
$records = runSQL("SELECT * FROM $tabla limit 10 offset $offset");
echo "<h1> {$tabla}s </h1>
<table cellspacing=0 cellpadding=3 border=1>";

foreach ($records as $row) {
    if ($once == 0) {
        $once = 1;
        echo "<tr>";
        foreach ($row as $field => $cell) {
            echo "<th>" . $field . "</th>";
        }
        echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $field => $cell) {
        echo "<td>" . $cell . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
// paginación
$register_count = $ds[0]["c"];
$page_count = ceil($register_count / $ps);
$ini = max(1, $page - 5);
$fin = min($page_count, $page * 5);
foreach (range($ini, $fin) as $p) {
    $cl = $p;
    if ($page == $p) {
        $cl = "<b>$p</b>";
    }
    echo("<a href='?page=$p'>$cl</a> ");
}


/*
insert into dict values('0', 'id', 'ID', 'T', 0);
insert into dict values('0', 'nombre', 'Nombre', 'T', 0);
insert into dict values('0', 'raza', 'Raza', 'T', 0);
insert into dict values('0', 'tipo', 'Tipo', 'T', 0);
insert into dict values('0', 'ciudad', 'Ciudad', 'T', 0);
insert into dict values('0', 'edad', 'Edad', 'T', 0);
insert into dict values('0', 'fecha_creacion', 'Fecha Creacion', 'T', 0);
*/
    // alter table mascota add fecha_creacion datetime;

