<?php

class Metodos
{

	public function obtenerFila($sql)
	{
		$c = new Conectar();
		$conexion = $c->conexion();

		$stmt = $conexion->query($sql);

		return $stmt->fetch(PDO::FETCH_NUM); // Devuelve un array normal con una sola fila
	}

	public function mostrarDatos($sql)
	{
		$c = new Conectar();
		$conexion = $c->conexion();

		$stmt = $conexion->query($sql);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// INSERTAR MODIFICAR ELIMINAR PARA TABLA INFORMACION FORMULARIO
	public function insertarDatosInfo($datos)
	{
		$c = new Conectar();
		$conexion = $c->conexion();

		$sql = "INSERT into info_Formulario (usuario, nombre, apellido, telefono, correo, genero, satisfaccion, color) values (?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conexion->prepare($sql);

		return $stmt->execute($datos);
	}

	public function actualizaDatosInfo($datos)
	{
		$c = new Conectar();
		$conexion = $c->conexion();

		$sql = "UPDATE info_Formulario set telefono = ?, correo = ?, genero = ?, satisfaccion = ?, color = ? where usuario = ?";
		$stmt = $conexion->prepare($sql);

		return $stmt->execute($datos);
	}

	public function eliminarDatosInfo($usuario)
	{
		$c = new Conectar();
		$conexion = $c->conexion();

		$sql = "DELETE from info_Formulario where usuario = ?";
		$stmt = $conexion->prepare($sql);

		return $stmt->execute([$usuario]);
	}


	// INSERTAR MODIFICAR ELIMINAR PARA TABLA USUARIOS
	public function insertarDatosUsuario($datos)
	{
		$c = new Conectar();
		$conexion = $c->conexion();

		$sql = "INSERT into usuarios (usuario, contrasenya, nombre, apellido) values (?, ?, ?, ?)";
		$stmt = $conexion->prepare($sql);

		return $stmt->execute($datos);
	}


	public function actualizaDatosUsuario($datos)
	{
		$c = new Conectar();
		$conexion = $c->conexion();

		$sql = "UPDATE usuarios SET contrasenya = ?, nombre = ?, apellido = ? WHERE usuario = ?";
		$stmt = $conexion->prepare($sql);

		return $stmt->execute($datos);
	}

	public function eliminarDatosUsuario($usuario)
	{
		$c = new Conectar();
		$conexion = $c->conexion();

		$sql = "DELETE from usuarios where usuario = ?";
		$stmt = $conexion->prepare($sql);

		return $stmt->execute([$usuario]);
	}
}
