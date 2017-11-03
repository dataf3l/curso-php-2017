<style>

.plot {
	width:100px;
	border:1px solid black;
	height:100px;
}
.label {
	display:inline-block;
	float:left;
	height: 14px;
	font-size:12pt;
}
.line {
	display:inline-block;
	float:left;

	background-color:rgb(100,100,255);
	height: 14px;
	border:1px solid black;
	margin-top:2px;
}
</style>
<?php
function equis_mas_uno($x){
	return $x+1;
}
function table($ini,$fin,$paso,$func){
	for($i=$ini;$i<$fin;$i += $paso){
		echo($i."\t".$func($i)."\n");
	}
}

function plot($ini,$fin,$paso,$func){
	$html = "";
	$html .= "<div class=chart>\n";
	$ancho_maximo = 100;

	$max = 0;
	for($i=$ini;$i<$fin;$i += $paso){
		$valor = $func($i);
		if($valor > $max){
			$max = $valor;
		}
	}
	$i_width = 60;
	$fx_width = 80;
	$html .= "<div class=label style='width:${i_width}px'><b>x</b></div>\n";
	$html .= "<div class=label style='width:${fx_width}px'><b>f(x)</b></div>\n";
	$html .= "<div style='clear:both'></div>\n";
	
	for($i=$ini;$i<$fin;$i += $paso){
		$valor = $func($i);
		$i_redondeado = round($i,4);
		$valor_redondeado = round($valor,4);
		$ancho = ($valor / $max) * $ancho_maximo;
		$html .= "<div class=label style='width:${i_width}px'>$i_redondeado</div>\n";
		$html .= "<div class=label style='width:${fx_width}px'>$valor_redondeado</div>\n";
		$html .= "<div class=line style='width:".$ancho."px'></div>\n";
		$html .= "<div style='clear:both'></div>\n";
	}
	$html .= "</div>\n";
	return $html;
}

function sin_plus_one($x){
	return sin($x)+1;
}
function sin_plus_cosine($x){
	return sin($x)+cos($x)+3;
}

function ventas_del_mes($i){
	$ventas = array(0,100,200,300,200,100,0,100,200,300,1000,1500);
	return $ventas[$i];
	
}
#plot(0, 3.14159279 , 0.01,"sin");
# table(0,10 , 1,"equis_mas_uno");
define('PI','3.1415926979');
echo plot(0,PI*2 * 10 , PI/8,"sin_plus_cosine");

echo plot(0,12, 1,"ventas_del_mes");

#echo plot(0,10 , 1,"sin");



/*

function equis2($x){
	return $x*$x;
}

function table($ini,$fin,$func){
	///....
}
 */

/*
table(0,10,"equis_mas_uno");
=>
x:f(x)
0:1
1:2
2:3
3:4
...
10:11

table(0,10,"equi2");
=>
x:f(x)
0:0
1:1
2:4
3:9
...
10:100





// nombre(start,end) => 10

// plot(ini,fin,f2):
// manolo_table(0,10,"sin")
//

function f1($x){
	return $x;
}

$resultado = f1(0);

echo($resultado);
 */
