<!doctype html>
<html>
<head>
<meta charset="utf8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.total {
	font-weight:bold;
}

/* Sugerencia claudia: todas las cifras alineadas a la derecha
 * para más fácil legibilidad:
 */
.money {

	text-align:right;
}

h1, th, td {
	font-family:helvetica;
}
.output {
	width:100%;
}
.output tbody tr:hover {
	background-color:rgb(235,235,230);
}
</style>
</head>
<body>
<h1>Flujo de Caja Proyectado</h1>
<?php
$saldo_inicial = 3000;
/*
 * formatear como dinero:
 * se utiliza para mostrar las cifras con separadores de mil
 * por ejemplo 12345 se convierte en 12.345
 * adicionalmente entrega html en rojo si el valor es negativo.
 * */
function format_as_money($num){
	$fnum = number_format($num,0,",",",");
	if($num < 0){
		return "<font color=red>".$fnum."</font>";
	}else{
		return $fnum;
	}
}


$fsaldo_inicial = format_as_money($saldo_inicial);
echo("<h2>Saldo Inicial:$fsaldo_inicial</h2>");

// TODO: Traer desde la base de datos
// TODO: permitir al usuario editar la información

// Trasacciones programadas, suceden una sola vez
$programadas = array(
	array('fecha'=>'2018-01-01','valor'=>100,"concepto"=>"Ingresos"),
	array('fecha'=>'2018-01-01','valor'=>1000,"concepto"=>"Ventas producto"),
	array('fecha'=>'2018-02-01','valor'=>200,"concepto"=>"recibir soborno"),
	array('fecha'=>'2018-03-01','valor'=>300,"concepto"=>"venta producto 12"),
	array('fecha'=>'2018-04-01','valor'=>400,"concepto"=>"venta producto 21"),
	array('fecha'=>'2018-05-01','valor'=>500,"concepto"=>"venta producto 121"),
	array('fecha'=>'2018-06-01','valor'=>800,"concepto"=>"venta producto 212"),
	array('fecha'=>'2018-01-06','valor'=>-100,"concepto"=>"Compra de articulos"),
	array('fecha'=>'2018-01-09','valor'=>-100,"concepto"=>"pago nomina"),
	array('fecha'=>'2018-02-10','valor'=>-250,"concepto"=>"pago salario"),
	array('fecha'=>'2018-03-12','valor'=>-30,"concepto"=>"compra marcador"),
	array('fecha'=>'2018-04-16','valor'=>-40,"concepto"=>"reconexion de la luz"),
	array('fecha'=>'2018-05-14','valor'=>-5000,"concepto"=>"compra equipos"),
	array('fecha'=>'2018-06-17','valor'=>-800,"concepto"=>"reparacion equipos"),
);
//Transacciones recurrentes, suceden todos los meses:
$recurrentes = array(
	array('dia'=>'1','valor'=>-15,"concepto"=>"Agua"),
	array('dia'=>'5','valor'=>-50,"concepto"=>"Arriendo"),
	array('dia'=>'15','valor'=>-40,"concepto"=>"Tarjeta de Crédito"),
);
/** 
 * agrega ceros a la izquierda, por ejemplo:
 * el valor 1 se convierte en 01
 * */
function zero_pad($p,$pl){
	if(strlen("".$p)<$pl){
		return "0".$p;
	}else{
		return $p;
	}
}

//genera transacciones:
/*
 * Simula las transacciones de 6 meses
 * basándose en que todos los meses se genera
 * un gasto fijo mensual de ciertas transacciones 
 * en días específicos del mes.
 * */
$fini = date("Y-m-01");
print($fini);
$cfecha = date_create($fini);
$dias = array(0,31,28,31,30,31,30,31,31,30,31,30,31);

for($mes=0;$mes<=24;$mes++){
	$m = $dias[(int)date_format($cfecha,"m")];
	#echo($m."<br/>");
	$cfecha = date_add($cfecha, date_interval_create_from_date_string($m.' days'));
	#echo date_format($cfecha, 'Y-m-d')."<br/>";
	
	foreach($recurrentes as $r){
		$valor = $r["valor"];
		$concepto = $r["concepto"];
		$fdia = zero_pad($r["dia"],2);
		$fmes = zero_pad($mes,2);

		$fecha_obj = date_add($cfecha, date_interval_create_from_date_string($r["dia"].' days'));
		$fecha = date_format($fecha_obj, 'Y-m-d');
		#$fecha = "2018-$fmes-$fdia";
		$programadas[]=array(
			"fecha"=>$fecha,
			"valor"=>$valor,
			"concepto"=>$concepto,
		);
	}
	
	
}
/** función para ordenar transacciones por fecha
 * es un insumo para usort.
 * */
function cmp($a, $b)
{
    if ($a["fecha"] == $b["fecha"]) {
        return 0;
    }
    return ($a["fecha"] < $b["fecha"]) ? -1 : 1;
}

//ordenar cronologicamente las transacciones:
usort($programadas, "cmp");


// Imprimir la tabla de resultados:


$saldo = $saldo_inicial;
echo("<table border=1 cellspacing=0 cellpadding=3 class=output>");
echo("<tr>
		<th>#</th>
		<th>Fecha</th>
		<th>Concepto</th>
		<th>Debe</th>
		<th>Haber</th>
		<th>Saldo</th>
	</tr>
	");

$consecutivo = 1; // Informativo
$suma_debe = 0; // Suma todos los ingresos
$suma_haber = 0; // Suma los egresos

foreach($programadas as $tx){
	$valor = $tx["valor"];
	//Modificación de saldo:
	$saldo += $valor;

	// formatear los datos de salida con separador de mil:
	$fvalor = format_as_money($valor);
	$fsaldo = format_as_money($saldo);

	// En caso de ser transacción con un valor
	// positivo (ingreso)
	// se agrega al Haber, en caso de ser
	// un egreso, se agrega el Debe
	if($valor > 0){
		$suma_debe += $valor;	
		$debe = $fvalor;
		$haber = "";
	}else{
		$suma_haber += $valor;
		$debe = "";
		$haber = $fvalor;
	
	}
	/*
	if($consecutivo%2 == 0){
		$clr = "#f0f0f0";
	}else{
		$clr = "#e0e0e0";
	
	}
	 */
	// style='background-color:$clr'

	//Imprime registro con los resultados formateados
	//class money alínea a la derecha las cifras
	echo("
		<tr >
			<td>$consecutivo</td>
			<td>${tx['fecha']}</td>
			<td>${tx['concepto']}</td>
			<td class=money>$debe</td>
			<td class=money>$haber</td>
			<td class=money>$fsaldo</td>
		</tr>\n");
	$consecutivo += 1;
}
// Imprime registro final con totales (sugerencia manolo)

$fsuma_debe = format_as_money($suma_debe);
$fsuma_haber = format_as_money($suma_haber);
echo("
	<tr>
		<td> </td>
		<td></td>
		<td><b>Total</b></td>
		<td class='total money'>$fsuma_debe</td>
		<td class='total money'>$fsuma_haber</td>
		<td class='total money'>$fsaldo</td>
	</tr>\n");

echo("</table>");

?>
</body></html>
