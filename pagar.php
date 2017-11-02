<?php

$valor_a_pagar = rand(1, 100);

$token = date("YmdHis").rand(0,1000000);
$sal = "kasjdkjashdkjhasdkjhasjkdhjkashd";
$enc = md5($sal.$valor_a_pagar.$token);

echo("<h1>hola, debes pagar: 
<a href='paso2.php?valor=$valor_a_pagar&token=$token&enc=$enc'> pagar aqui $valor_a_pagar </a></h1>");


