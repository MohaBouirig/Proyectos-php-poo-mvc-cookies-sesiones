<?php
class Entrenador
{
    // Definimos 3 atributos
    // Son públicos para que podamos acceder a ellos directamente con $entrenador->nombre
    public $id;
    public $nombre;
    public $apellido;

    // Constructor que inicializa los atributos de la clase
    public function __construct($id, $nombre, $apellido)
    {
        $this->id      = $id;
        $this->nombre  = $nombre;
        $this->apellido = $apellido;
    }

    // Método estático para obtener todos los entrenadores de la base de datos
    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM entrenadores');

        // Creamos una lista de objetos Entrenador a partir de los resultados de la base de datos
        foreach ($req->fetchAll() as $entrenador) {
            $list[] = new Entrenador($entrenador['id'], $entrenador['nombre'], $entrenador['apellido']);
        }

        return $list;
    }

    // Método estático para encontrar un entrenador por su ID
    public static function find($id)
    {
        $db = Db::getInstance();

        // Aseguramos que $id sea un entero
        $id = intval($id);

        $req = $db->prepare('SELECT * FROM entrenadores WHERE id = :id');

        // La consulta está preparada, ahora reemplazamos :id con el valor real de $id
        $req->execute(array('id' => $id));

        $entrenador = $req->fetch();

        // Devolvemos un objeto Entrenador creado a partir de los resultados
        return new Entrenador($entrenador['id'], $entrenador['nombre'], $entrenador['apellido']);
    }

    // Método estático para guardar un nuevo entrenador
    public static function guardarNuevoEntrenador($nombre, $apellido)
    {
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO entrenadores (nombre, apellido) VALUES (:nombre, :apellido)');
        $req->execute(array('nombre' => $nombre, 'apellido' => $apellido));
    }

    // Método estático para actualizar los datos de un entrenador
    public static function guardarDatosActualizados($id, $nombre, $apellido)
    {
        $db = Db::getInstance();
        $req = $db->prepare('UPDATE entrenadores SET nombre = :nombre, apellido = :apellido WHERE id = :id');
        $req->execute(array('id' => $id, 'nombre' => $nombre, 'apellido' => $apellido));
    }

    // Método estático para eliminar un entrenador
    public static function eliminarConfirmado($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM entrenadores WHERE id = :id');
        $req->execute(array('id' => $id));
    }
}
