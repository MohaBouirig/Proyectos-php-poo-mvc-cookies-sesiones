<?php

class Conectar{
	private $servidor = "localhost";
	private $usuario = "root";
	private $password = "";
	private $bd = "MohamedBouirig_Proyecto";
	private $port = 3366;



	public function conexion(){
		try {
			$conexion = new PDO("mysql:host={$this->servidor};dbname={$this->bd}; port={$this->port}", $this->usuario, $this->password);

			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $conexion;
		} catch (PDOException $e) {
			die("Conexión fallida: " . $e->getMessage());
		}
	}
}
