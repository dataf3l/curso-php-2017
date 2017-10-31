<?php

function zero_pad($p,$pl){
	if(strlen("".$p)<$pl){
		return "0".$p;
	}else{
		return $p;
	}
}
function color($c){
	return zero_pad(dechex(floor(255*$c)),2);
}

function interp_value($x, $y){
	return ($x / 8) * ($y / 8);
}


$a = []; //genv2
foreach(range(0,8) as $k=>$v){
	$a[$k] = array();
	foreach(range(0,8) as $k1=>$v1){
		$a[$k][$k1] = interp_value($k,$k1);
			
	}
}

echo("<table border=1 cellspacing=0 cellpadding=2>");
foreach($a as $k=>$v){
	echo("<tr>");
	foreach($a[$k] as $k1=>$v1){
		echo("<td>");
		$color = "FF00".color($a[$k][$k1]);
		echo($color);
		echo("</td>");
	
	}
	echo("</tr>");
	
}
echo("</table>");

