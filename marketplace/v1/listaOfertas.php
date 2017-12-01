<?php
//  insert into mascota values(0, 'tico','terrier','perro','Bogotá','12');

require_once ('conf.php');
require_once ('conexion.php');
require_once("run_sql.php");
require_once("dict.php");

$fields = dict();
$tabla = get_table_name();
$once = 0;


echo "
<style>
th, td, h1{
	font-family: helvetica, arial, sans-serif;
}
</style> ";

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
echo "<h1> ".get_pretty_table_name_plural()." </h1>
<table cellspacing=0 cellpadding=3 border=1>";


foreach ($records as $row) {
    if ($once == 0) {
        $once = 1;
        echo "<tr>";
        foreach ($row as $field => $cell) {
            echo "<th>" . $fields[$field]["label"] . "</th>";
        }
        echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $field => $cell) {
        echo "<td><nobr>" . $cell . "</nobr></td>";
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
echo("<br/><a href='./createoffer.php'>Crear $tabla</a>");
