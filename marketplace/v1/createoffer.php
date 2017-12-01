<?php
require_once ('conf.php');
require_once ('conexion.php');
require_once("run_sql.php");
require_once("dict.php");
$tabla=get_table_name();

$campos=dict();
echo("<style>

input[type=text], input[type=number], select {
	width:200px;
}	
	
	</style>");

echo "<h1> Crear $tabla</h1>";
echo '<form action=create_object.php method=POST>';
foreach ($campos as $name=>$field){
	$datatype = $field["data_type"];
	$label = $field["label"];

	if($datatype != 'S'){
		echo "<label>$label</label><br>";
	}
	if($datatype=='L'){
		echo "<select name=$name>";

		$options = runSQL("select id,name from $name");
		foreach($options as $row){
			$value = $row["name"];
			echo("<option value='$value'>$value</option>");
		}

		echo("</select>");

	}
	if($datatype=='T'){
		echo "<input type='text' name=$name>";

	}
	if($datatype=='N'){
		echo "<input type='number' size=3 name=$name>";

	}
	echo("<br/>");
}
echo "<br><input type='submit' name='Crear'>";

echo '</form>';
