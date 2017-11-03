<?php
$input = "24de933e248cc021cf935844eefee67e";

$lines = file("es.txt");
$cantidad = 0;

foreach($lines as $line){
	$c = explode(" ",$line);
	$p = strtolower($c[0]);
	$cantidad++;
	if(md5($p) == $input){
		echo($c."\n");
		echo("FOUND after: $cantidad attempts");
		die();	
	}
}
