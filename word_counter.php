<?php
$input = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum";
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
print_r($s);
