<?php

$highschool = (int)$_GET["high"];
$undergraduate = (int)$_GET["undergraduate"];
$has_money = (int)$_GET["has_money"];
$has_time = (int)$_GET["time"];
$passed_quiz = (int)$_GET["passed_quiz"];

if($highschool == 1){
	if($undergraduate == 1){
		if($has_money == 1){
			if($has_time == 1){
				echo("welcome");
			}else{
				echo("fallas");
			}
		}else{
			if($passed_quiz == 1){
				echo("becado");
			}else{
				echo("bruto!");
			}
		}
	}else{
		echo("no cumple requisitos:pregrado");
	}
}else{
	echo("no cumple requisitos:highschool");
}

