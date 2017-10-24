<?php

$highschool = (int)$_GET["high"];
$undergraduate = (int)$_GET["undergraduate"];
$has_money = (int)$_GET["has_money"];
$has_time = (int)$_GET["time"];
$passed_quiz = (int)$_GET["passed_quiz"];

if(($highschool && $undergraduate && $has_money == 1 && $has_time == 1) || 
   ($highschool && $undergraduate && $passed_quiz == 1 && $has_time == 1) ){
	echo("welcome");
}else{
	echo("no cumple requisitos");
}


