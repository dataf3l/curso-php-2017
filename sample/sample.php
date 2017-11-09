<?php

include("lib.php");
$r  = new Producto(100,"Celular iPhone 5");
$r2 = new Producto(200,"Celular iPhone 6");
$r3 = new Producto(300,"Celular Samsung Galaxy");
$r4 = new Producto(400,"Celular Nokia 1100");

$productos= array($r,$r1,$r2,$r3);
$rm = new ReporteMensual();
$rm->imprimir_reporte($productos);
