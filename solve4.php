<?php
$input = "dd485e41f1758def296e1bc7377f8ea7";

echo(ord('z'));
$a = 97;
$z = 122;
$cantidad = 0;
//crear string
$max = 1000;
for($i=0;$i<26;$i++){
	$s1 = chr($a + $i);

for($j=0;$j<26;$j++){
	$s2 = chr($a + $j);
		
for($k=0;$k<26;$k++){
	$s3 = chr($a + $k);
		
for($l=0;$l<26;$l++){
	$s4 = chr($a + $l);
		
for($m=0;$m<26;$m++){
	$s5 = chr($a + $m);
	$c = $s1.$s2.$s3.$s4.$s5;
	#echo($c."\n");
	$hash = md5($c);
	$cantidad++;
	if($hash == $input){
		echo($c."\n");
		echo("FOUND after: $cantidad attempts");
		die();
	}


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
					
