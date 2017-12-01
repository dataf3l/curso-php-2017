<?php
$u=$_POST;
$c=array();
$v=array();

require_once ('conf.php');
require_once ('conexion.php');
require_once("run_sql.php");
require_once("dict.php");

foreach (dict() as $field_name=>$field){
	if($field["data_type"] == "S"){
		continue;
	}
	$c[]=$field_name;
	$v[]=$_POST[$field_name];
}
$c[]="fecha_creacion";
$v[]=date('Y-m-d H:i:s');
$sql="INSERT into $tabla(".implode(",",$c).") values('".implode("','",$v)."')";


executeSQL($sql);
echo "<h2>Has registrado ".get_indefinite_article()." ".get_pretty_table_name()."</h2>
<a href='./listaOfertas.php'>Volver a la lista de ".get_pretty_table_name_plural()."</a>
";
