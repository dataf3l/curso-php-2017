<?php
$x = 25;
$y = 90;

function avg($arg1,$arg2){
	return ($arg1+$arg2)/2;
}

function ejemplo($x){
	# global $x;
	$x = 50;
	return $x;
}
function ejemplo2(){
	return date("s");
}

//$x = ejemplo($x);
//$ret = ejemplo($y);
echo ejemplo2();

#echo avg(1,2);
