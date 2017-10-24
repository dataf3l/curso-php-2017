<?php

# /2.php?edad=100

$edad = (int)$_GET["edad"];

if($edad >= 65) {
	echo("elegible");
}else{
	echo("no elegible :(");
}


