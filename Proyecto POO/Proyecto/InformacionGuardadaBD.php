<?php

require_once "conexion.php";
require_once "metodosDB.php";

class InformacionEnDB
{

    private $usuario;
    private $password;
    private $nombre;
    private $apellido;
    private $telefono;
    private $correo;
    private $genero;
    private $satisfaccion;
    private $color;

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

    // obtener el telefono o setearlo
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    // obtener el correo o setearlo
    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    // obtener el genero o setearlo
    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    // obtener el nivel de satisfaccion o setearlo
    public function getSatisfaccion()
    {
        return $this->satisfaccion;
    }

    public function setSatisfaccion($satisfaccion)
    {
        $this->satisfaccion = $satisfaccion;
    }


    // obtener el color o setearlo
    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }


    // Método para obtener información específica de un usuario
    public function obtenerDatosUsuario($usu)
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

    // Método para obtener información adicional de un usuario desde otra tabla
    public function obtenerInformacion()
    {
        $obj = new Metodos();
        $sqlInfo = "SELECT * FROM info_Formulario WHERE usuario = '$this->usuario'";
        $datos = $obj->mostrarDatos($sqlInfo);
        foreach ($datos as $key) {
            $this->telefono = $key["telefono"];
            $this->correo = $key["correo"];
            $this->genero = $key["genero"];
            $this->satisfaccion = $key["satisfaccion"];
            $this->color = $key["color"];
        }
    }

    // Método para insertar información en la base de datos
    public function insertarEnBD($usuario, $nombre, $apellido, $telefono, $correo, $genero, $satisfaccion, $color)
    {
        $obj = new Metodos();
        $datos = array($usuario, $nombre, $apellido, $telefono, $correo, $genero, $satisfaccion, $color);

        // Insertar datos en la tabla info_Formulario
        if ($obj->insertarDatosInfo($datos) == 1) {
            header("Location: _5Aplicacio.php");
        } else {
            echo "Fallo al agregar";
        }
    }

    // Método para actualizar información en la base de datos
    public function actualizarEnBD($telefono, $correo, $genero, $satisfaccion, $color, $usuario)
    {
        $obj = new Metodos();
        $datos = array($telefono, $correo, $genero, $satisfaccion, $color, $usuario);

        // Actualizar datos en la tabla info_Formulario
        if ($obj->actualizaDatosInfo($datos) == 1) {
            header("Location: _5Aplicacio.php");
        } else {
            echo "Fallo al agregar";
        }
    }

    // Método para eliminar información de un usuario en la base de datos
    public function eliminarEnBD($usuario)
    {
        $obj = new Metodos();
        // Eliminar datos de la tabla info_Formulario asociados al usuario
        if ($obj->eliminarDatosInfo($usuario) == 1) {
            header("Location: _5Aplicacio.php");
        } else {
            echo "Fallo al agregar";
        }
    }
}

