<?php

$tel = [];
$tel[]= 3124796366;
$tel[]= "3164808351";
$tel[]= "3124968693";
$tel[]= "+14157928911";

var_dump($tel);

echo(array_sum(range(0,1000) ));
$a = [10,20,57,100,101];

/*
$cont = 0;
foreach(range(0,1000) as $num){
	echo($num . "\n");
	$cont = $num + $cont;
}
echo($cont);
 */
/*
for($i=1;$i<=10;$i++){
	echo($i . "\n");
}
*/

/*
foreach($tel as $telefono){
	echo($telefono . "\n");
}
*/



#print_r($tel);
#print_r($tel);
/*
for($i = 0; $i < count($tel);$i++){
	echo($i . ":" . $tel[$i] . "\n");
}

$i = 0;

while($i < count($tel)){
	echo($i . ":" . $tel[$i] . "\n");
	$i++;
}

foreach($tel as $llave=>$valor){
	echo($llave." => ". $valor . "\n");
}

echo("Total:".count($tel));
 */
