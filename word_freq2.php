<?php
$input = file_get_contents("./shakespeare.txt");
$input = str_replace("\n","",$input);
$words = explode(" ",strtolower($input));
$s = array();
foreach($words as $word){
	if(!isset($s[$word])){
		$s[$word] = 0;
	}
	$s[$word] += 1;

}
asort($s);
$s = array_reverse($s);
#print_r($s);
#die();

$a =file_get_contents("en.txt");
$lines = explode("\n",$a);
#$c = 0;
$fr = array();
foreach($lines as $line){
	$parts = explode(" ",$line);
	$word = $parts[0];
	$freq = $parts[1];
	if($freq == 0){
		continue;
	}
	$fr[$word] = 1 / $freq;
	#if($c == 10){
	#	break;
	#}
	#$c += 1;
}
$freqs = array();
$missing = 0;
foreach($s as $word=>$c){
	if(isset($fr[$word])){
		$freqs[$word]= $fr[$word] * $c; 
	}else{
		$missing += 1;
	}
}
$score = array_sum($freqs) / count($words);
print($score);
print("\n");
print("Missing: $missing");
print("\n");

# print_r($freqs);
// http://bit.ly/2iQrYRO
 
