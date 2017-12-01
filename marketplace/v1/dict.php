<?php
require_once "conexion.php";
require_once "run_sql.php";

/**
 * dict() => all fields
 * dict('all') => all fields
 * dict("filter")=> only fields with is_filter
 * */
function dict($type='all') {
	if($type=='all'){
		$fields = runSQL("select * from dict");
	}elseif($type =='filter'){
		$fields = runSQL("select * from dict where is_filter=1");
	}
	$out = array();
	foreach($fields as $field){
		$field_name = $field["name"];
		$field_data_type = $field["data_type"];
		$out[$field_name] = $field; //TODO: mejorar
	}
	return $out;


}

