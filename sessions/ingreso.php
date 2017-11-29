<?php
session_start();
print_r($_SESSION);
if(!isset($_SESSION["c"])){
	$_SESSION["c"] = 0;
}
$_SESSION["c"]++;
