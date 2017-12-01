<?php
require_once("dict.php");
$filter_fields = dict("filter");
?>
<html>
    <head>
        <style>
            .formulario{
                font-family: helvetica, sans-serif;
                margin: 100px;
                border: 2px  dotted black;
                background-color: #eeeeee;
                padding: 20px;
                
            }
            .formulario input, .formulario select, .formulario textarea{
                width: 100%;
            }
            input[type=checkbox]{
                width: auto;
                
            }
            label {
                display:block;
                
            }
            small{
                color: #aaaaaa;
            }
        </style>
        <meta http-equiv="Content Type" content="text/html; charset-utf-8"/>
    </head>
    <body>
    
    <div class="formulario"> 
        <left><h1> Crear Alerta</h1></left>
        <form action="crearAlerta.php" method="POST">
	    <div>   
<?php

foreach($filter_fields as $field_name => $field){
	$label = $field["label"];
	$options = array();
	echo("<h2>$label</h2>");
	$options = runSQL("select id,name from $field_name");

	foreach($options as $row){
		$value = $row["name"];
		echo('<label><input type="checkbox" name="'.$field_name.'[]" value="'.$value.'" />'.$value.'</label>');
	}
}
?>



                <p>E-mail <small>(Obligatorio):</small><br>
                        <input type="email" name="email" required /></p>
               
                        <p> </p>
                            
                <p><input type="submit" value="Enviar Alertas"/></p>
            </div> 
        </form>
    </div> 
</body>
</html>

