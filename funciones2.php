<?php

// f (p)
// p (1)  -> 1
// p (6) -> -6

// f(0)= 1
// f(x) f(x-1) * x

// Ejemplo de funcion con parámetro opcional:

function imprimir_nombre($nombre, $hora = 10){
	if($hora == 0){
		echo("hola, $nombre\n");
	}
	if($hora != 0){
		echo("hola $nombre, son las $hora");
	}
}


imprimir_nombre("Julia");
imprimir_nombre("Julia");
imprimir_nombre("Julia");


imprimir_nombre("Julia", 10);
