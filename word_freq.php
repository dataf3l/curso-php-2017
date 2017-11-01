<?php
$a =file_get_contents("es.txt");
$lines = explode("\n",$a);
$c = 0;
$s = array();
foreach($lines as $line){
	$parts = explode(" ",$line);
	$word = $parts[0];
	$freq = $parts[1];

	$s[$word] = 1 / $freq;
	if($c == 10){
		break;
	}
	$c += 1;
}
print_r($s);
// http://bit.ly/2iQrYRO
 
