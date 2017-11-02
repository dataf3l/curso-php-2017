<?php
$valor =  $_GET["valor"];
$enc =  $_GET["enc"];
$token =  $_GET["token"];
$sal = "kasjdkjashdkjhasdkjhasjkdhjkashd";
if(md5($sal.$valor.$token) == $enc){
	echo("Se ha debitado de su cuenta. ". $_GET["valor"]);	
}else{
	echo("error");
}



