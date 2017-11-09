<?php
require("./class.cliente.php");

class TarejaHabiente extends Cliente {
	private $saldo;
	function set_saldo($saldo){
		if($saldo < 0 ){
			die("saldo invalido: $saldo");
		}
		$this->saldo = $saldo;
	}
	function get_saldo(){
		return $this->saldo;
	}

	function imprimir(){
		echo("el TarejaHabiente ".$this->get_nombre()." tiene saldo: ".$this->get_saldo(). " de saldo\n");

	}	
}




