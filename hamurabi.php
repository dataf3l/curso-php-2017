<!doctype html>
<html>
<head>
<meta charset="utf8" />

<style>
.total {
	font-weight:bold;
}
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
$recurrentes = array(
	array('dia'=>'1','valor'=>-15,"concepto"=>"Agua"),
	array('dia'=>'5','valor'=>-50,"concepto"=>"Arriendo"),
	array('dia'=>'15','valor'=>-40,"concepto"=>"Tarjeta de Crédito"),
);

function zero_pad($p,$pl){
	if(strlen("".$p)<$pl){
		return "0".$p;
	}else{
		return $p;
	}
}
//genera transacciones:
for($mes=1;$mes<=6;$mes++){
	foreach($recurrentes as $r){
		$valor = $r["valor"];
		$concepto = $r["concepto"];
		$fdia = zero_pad($r["dia"],2);
		$fmes = zero_pad($mes,2);
		$fecha = "2018-$fmes-$fdia";
		$programadas[]=array(
			"fecha"=>$fecha,
			"valor"=>$valor,
			"concepto"=>$concepto,
		);
	}
}
function cmp($a, $b)
{
    if ($a["fecha"] == $b["fecha"]) {
        return 0;
    }
    return ($a["fecha"] < $b["fecha"]) ? -1 : 1;
}

usort($programadas, "cmp");


//sumar
$br = "<br/>";
$saldo = $saldo_inicial;
echo("<table border=1 cellspacing=0 cellpadding=3 class=output>");
echo("<tr>
		<th>Consecutivo</th>
		<th>Fecha</th>
		<th>Concepto</th>
		<th>Debe</th>
		<th>Haber</th>
		<th>Saldo</th>
		
		");

$consecutivo = 1;
$suma_debe = 0;
$suma_haber = 0;
foreach($programadas as $tx){
	$valor = $tx["valor"];
	$saldo += $valor;
	$fvalor = format_as_money($valor);
	$fsaldo = format_as_money($saldo);

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
