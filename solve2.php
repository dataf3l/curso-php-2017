<?php
$input = "dd485e41f1758def296e1bc7377f8ea7";

echo(ord('z'));
$a = 97;
$z = 122;
//crear string
$max = 1000;
for($i=0;$i<26;$i++){
for($j=0;$j<26;$j++){
for($k=0;$k<26;$k++){
for($l=0;$l<26;$l++){
for($m=0;$m<26;$m++){
	$s1 = chr($a + $i);
	$s2 = chr($a + $j);
	$s3 = chr($a + $k);
	$s4 = chr($a + $l);
	$s5 = chr($a + $m);
	$c = $s1.$s2.$s3.$s4.$s5;
	#echo($c."\n");
	$hash = md5($c);
	if($hash == $input){
		echo($c."\n");
		echo("FOUND");
		die();
	}
	#$max--;
	#if($max < 0){
	#	die();
	#}

}		
}
}
}
}

//for 97 - 122
	//for 97 - 122
		//for 97 - 122
			//for 97 - 122
				//for 97 - 122
					
