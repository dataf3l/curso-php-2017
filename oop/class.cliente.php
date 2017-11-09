<?php

class Cliente {
	private $cedula;
	private $edad;
	private $nombre;
	private $telefono;
	private $correo_electronico;
	private $genero;

	function set_cedula($cedula){ 
		$this->cedula = $cedula; 
	}
	function get_cedula(){ 
		return $this->cedula;
	}

	function set_edad($edad){ 
		$this->edad = $edad; 
	}
	function get_edad(){ 
		return $this->edad;
	}

	function set_nombre($nombre){ 
		$this->nombre = $nombre; 
	}
	function get_nombre(){ 
		return $this->nombre;
	}

	function set_telefono($telefono){ 
		$this->telefono = $telefono; 
	}
	function get_telefono(){ 
		return $this->telefono;
	}

	function set_correo_electronico($correo_electronico){ 
		$this->correo_electronico = $correo_electronico; 
	}
	function get_correo_electronico(){ 
		return $this->correo_electronico;
	}

	function set_genero($genero){ 
		$this->genero = $genero; 
	}
	function get_genero(){ 
		return $this->genero;
	}

	function imprimir(){
		echo($this->get_nombre()." tiene ".$this->get_edad(). " annos\n");
	}
}


