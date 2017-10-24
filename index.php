<?php
$im = 1.01; // 10%
$inicial = 1000000;
$salida = $inicial;
for($i=0;$i<10;$i++){
	$salida = $salida * $im;
}
echo($salida);



