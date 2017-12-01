<?php
$tabla = "mascota";


function get_table_name(){
	global $tabla;
	return $tabla;
}

function get_pretty_table_name(){
	global $tabla;
	return "Mascota";
}
function get_pretty_table_name_plural(){
	global $tabla;
	return "Mascotas";
}


function get_indefinite_article(){
	return "una";
}

