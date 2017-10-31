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
function swap($matrix, $p1x,$p1y,$p2x,$p2y){
	$s = $matrix[$p1x][$p1y];
	$matrix[$p1x][$p1y] = $matrix[$p2x][$p2y];
	$matrix[$p2x][$p2y] = $s;
	return $matrix;

}
function swappit($a){
	foreach(range(0,80) as $r){
		$p1x = rand(0,8);
		$p1y = rand(0,8);
		$p2x = rand(0,8);
		$p2y = rand(0,8);
		$a = swap($a, $p1x,$p1y,$p2x,$p2y);
	}
	return $a;
}


$a = []; //genv2
foreach(range(0,8) as $k=>$v){
	$a[$k] = array();
	foreach(range(0,8) as $k1=>$v1){
		$a[$k][$k1] = interp_value($k,$k1);
			
	}
}

$a = swappit($a);

echo("<style> .cc tbody tr td {width:44px;height:44px}; </style>");
echo("<table class=cc border=1 cellspacing=0 cellpadding=2>");
foreach($a as $k=>$v){
	echo("<tr>");
	foreach($a[$k] as $k1=>$v1){
		$value = color($a[$k][$k1]);
		$color = $value."00".$value;
		echo("<td bgcolor=$color>&nbsp;");
		echo("</td>");
	
	}
	echo("</tr>");
	
}
echo("</table>");
/*

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
 */

/*
echo("<table border=1 cellspacing=0 cellpadding=2>");
foreach($a as $k=>$v){
	echo("<tr>");
	foreach($a[$k] as $k1=>$v1){
		echo("<td>");
		echo($a[$k][$k1]);
		echo("</td>");
	
	}
	echo("</tr>");
	
}
echo("</table>");
*/
/*
echo("<table border=1 cellspacing=0 cellpadding=2>");
foreach($a as $k=>$v){
	echo("<tr>");
	foreach($a[$k] as $k1=>$v1){
		echo("<td>");
		echo($a[$k][$k1]);
		echo("</td>");
	
	}
	echo("</tr>");
	
}
echo("</table>");
 */

/*
 *$a = [];
foreach(range(0,8) as $k=>$v){
	$a[$k]=array();
	foreach(range(0,8) as $k1=>$v1){
		$a[$k][$k1] = rand(0,10)/10;
		interp_value($k,$k1);
			
	}
}


 * */
# print_r($a);

