<?php
$a = [];
foreach(range(0,8) as $k=>$v){
	$a[$k]=array();
	foreach(range(0,8) as $k1=>$v1){
		$a[$k][$k1] = rand(0,10)/10;
			
	}
}

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

