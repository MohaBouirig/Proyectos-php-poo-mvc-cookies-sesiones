<?php

require_once "conexion.php";
require_once "metodosDB.php";

class UsuariosEnDB
{

    private $usuario;
    private $password;
    private $nombre;
    private $apellido;

    // obtener el usuario o setearlo
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    // obtener el passwor o setearlo
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    // obtener el nombre o setearlo
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    // obtener el apellido o setearlo
    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    // Método para obtener información de un usuario específico
    public function obtenerUsuario($usu)
    {
        $obj = new Metodos();
        $sqlInfo = "SELECT * FROM usuarios WHERE usuario = '$usu'";
        $datos = $obj->mostrarDatos($sqlInfo);
        foreach ($datos as $key) {
            if ($usu == $key['usuario']) {
                $this->setUsuario($key["usuario"]);
                $this->setPassword($key["contrasenya"]);
                $this->setNombre($key["nombre"]);
                $this->setApellido($key["apellido"]);
            }
        }
    }

    // Método para insertar un nuevo usuario en la base de datos
    public function insertarEnBD($usuario, $contrasenya, $nombre, $apellido)
    {
        $obj = new Metodos();
        $datos = array($usuario, $contrasenya, $nombre, $apellido);

        // Insertar datos en la tabla usuarios
        if ($obj->insertarDatosUsuario($datos) == 1) {
            header("Location: _5inici.php");
        } else {
            echo "Fallo al agregar";
        }
    }

    // Método para actualizar la información de un usuario en la base de datos
    public function actualizarEnBD($contrasenya, $nombre, $apellido, $usuario)
    {
        $obj = new Metodos();
        $datos = array($contrasenya, $nombre, $apellido, $usuario);

        // Actualizar datos en la tabla usuarios
        if ($obj->actualizaDatosUsuario($datos) == 1) {
            header("Location: _5Aplicacio.php");
        } else {
            echo "Fallo al actualizar";
        }
    }

    // Método para eliminar la información de un usuario de la base de datos
    public function eliminarEnBD($usuario)
    {
        $obj = new Metodos();
        
        // Eliminar datos de la tabla usuarios asociados al usuario
        if ($obj->eliminarDatosUsuario($usuario) == 1) {
            header("Location: _5inici.php");
        } else {
            echo "Fallo al eliminar";
        }
    }
}

