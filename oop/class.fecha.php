<?php

class Fecha {
	private $anno;
	private $mes;
	private $dia;

	function imprimir(){
		echo($this->anno. "-".
		     $this->mes."-".$this->dia);
	}
	function __construct($anno, $mes,$dia){
		$this->setAnno($anno);
		$this->setMes($mes);
		$this->setDia($dia);
	}
	function setAnno($anno){
		$this->anno = $anno;
	}
	function setMes($mes){
		if($mes >= 1 && $mes <= 12){
			$this->mes = $mes;
		}else{
			die("Error, mes invalido:$mes");
		}
	}
	function setDia($dia){
		if($dia >= 1 && $dia <= 31){
			if($this->mes == 2){
				if($dia >29){
					die("febrero no tiene $dia dias.");
				}
			}
			$this->dia = $dia;
		}else{
			die("Error, día invalido:$dia");
		}
	}

	function getAnno(){
		return $this->anno;
	}
	function getMes(){
		return $this->mes;
	}
	function getDia(){
		return $this->dia;
	}
}
$cumpleannos = new Fecha(2017, 2, 31);

# $cumpleannos->imprimir();
echo($cumpleannos->getMes()."\n");


