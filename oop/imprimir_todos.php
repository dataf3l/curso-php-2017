<?php
require("./class.tarjetahabiente.php");

$c = new Cliente();
$c->set_edad(33);
$c->set_nombre("felipe");

$t = new TarejaHabiente();
$t->set_saldo(100);
$t->set_nombre("felipe");


$personas = array($c, $t);

foreach($personas as $persona){
	$persona->imprimir();
}
