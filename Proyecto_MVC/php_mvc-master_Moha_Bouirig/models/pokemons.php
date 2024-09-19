<?php
class Pokemons
{
    // Definimos 4 atributos
    // Son públicos para que podamos acceder a ellos directamente con $pokemon->nombrePokemon
    public $id;
    public $idEntrenador;
    public $nombrePokemon;
    public $tipo;

    // Constructor que inicializa los atributos de la clase
    public function __construct($id, $idEntrenador, $nombrePokemon, $tipo)
    {
        $this->id      = $id;
        $this->idEntrenador  = $idEntrenador;
        $this->nombrePokemon = $nombrePokemon;
        $this->tipo = $tipo;
    }

    // Método estático para obtener todos los pokemons de la base de datos
    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM pokemons');

        // Creamos una lista de objetos Pokemon a partir de los resultados de la base de datos
        foreach ($req->fetchAll() as $pokemon) {
            $list[] = new Pokemons($pokemon['id'], $pokemon['idEntrenador'], $pokemon['nombrePokemon'], $pokemon['tipo']);
        }

        return $list;
    }

    // Método estático para encontrar un pokemon por su ID de entrenador
    public static function find($idEntrenador)
    {
        $db = Db::getInstance();

        // Aseguramos que $idEntrenador sea un entero
        $id = intval($idEntrenador);

        $req = $db->prepare('SELECT * FROM pokemons WHERE idEntrenador = :idEntrenador');

        // La consulta está preparada, ahora reemplazamos :idEntrenador con el valor real de $idEntrenador
        $req->execute(array('idEntrenador' => $idEntrenador));

        $list = array();

        foreach ($req->fetchAll() as $pokemon) {
            $list[] = new Pokemons($pokemon['id'], $pokemon['idEntrenador'], $pokemon['nombrePokemon'], $pokemon['tipo']);
        }

        return $list;
    }

    // Método estático para buscar un pokemon por su ID
    public static function buscarPokemon($id)
    {
        $db = Db::getInstance();

        // Aseguramos que $id sea un entero
        $id = intval($id);

        $req = $db->prepare('SELECT * FROM pokemons WHERE id = :id');

        // La consulta está preparada, ahora reemplazamos :id con el valor real de $id
        $req->execute(array('id' => $id));

        $pokemon = $req->fetch();

        // Devolvemos un objeto Pokemon creado a partir de los resultados
        return new Pokemons($pokemon['id'], $pokemon['idEntrenador'], $pokemon['nombrePokemon'], $pokemon['tipo']);
    }

    // Método estático para guardar un nuevo pokemon
    public static function guardarNuevoPokemon($nombrePokemon, $idEntrenador, $tipo)
    {
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO pokemons (nombrePokemon, idEntrenador, tipo) VALUES (:nombrePokemon, :idEntrenador, :tipo)');
        $req->execute(array('nombrePokemon' => $nombrePokemon, 'idEntrenador' => $idEntrenador, 'tipo' => $tipo));
    }

    // Método estático para actualizar los datos de un pokemon
    public static function guardarDatosUpdate($id, $nombrePokemon, $idEntrenador, $tipo)
    {
        $db = Db::getInstance();
        $req = $db->prepare('UPDATE pokemons SET nombrePokemon = :nombrePokemon, idEntrenador = :idEntrenador, tipo = :tipo WHERE id = :id');
        $req->execute(array('id' => $id, 'nombrePokemon' => $nombrePokemon, 'idEntrenador' => $idEntrenador, 'tipo' => $tipo));
    }

    // Método estático para eliminar un pokemon
    public static function eliminarConfirmado($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM pokemons WHERE id = :id');
        $req->execute(array('id' => $id));
    }
}
