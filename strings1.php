<?php

$input = "hola como estas";

$word_list = explode(" ", $input);

$word_list[1] = "cómo";

$cadena_output = implode(" ", $word_list);
print($cadena_output);

# print_r($word_list);

#foreach($word_list as $k => $v){
#	echo("$k => $v \n");
#}

echo("\n");
