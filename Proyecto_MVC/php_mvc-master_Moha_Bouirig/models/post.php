<?php
class Post {
    // Definimos 3 atributos
    // Son públicos para que podamos acceder a ellos directamente con $post->author
    public $id;
    public $author;
    public $content;

    // Constructor que inicializa los atributos de la clase
    public function __construct($id, $author, $content) {
        $this->id      = $id;
        $this->author  = $author;
        $this->content = $content;
    }

    // Método estático para obtener todos los posts de la base de datos
    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM posts');

        // Creamos una lista de objetos Post a partir de los resultados de la base de datos
        foreach($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['author'], $post['content']);
        }

        return $list;
    }

    // Método estático para encontrar un post por su ID
    public static function find($id) {
        $db = Db::getInstance();
        
        // Aseguramos que $id sea un entero
        $id = intval($id);
        
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
        
        // La consulta está preparada, ahora reemplazamos :id con el valor real de $id
        $req->execute(array('id' => $id));
        
        $post = $req->fetch();

        // Devolvemos un objeto Post creado a partir de los resultados
        return new Post($post['id'], $post['author'], $post['content']);
    }


    public static function guardarNuevoPost($author, $content) {
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO posts (author, content) VALUES (:author, :content)');
        $req->execute(array('author' => $author, 'content' => $content));
    }

    public static function guardarDatosUpdate($id, $author, $content) {
        $db = Db::getInstance();
        //UPDATE posts SET author = "Sergi", content ="Este es mi segundo post" WHERE id = 2;
        $req = $db->prepare('UPDATE posts SET author = :author, content = :content WHERE id = :id');
        $req->execute(array('id' => $id, 'author' => $author, 'content' => $content));
    }

    public static function eliminarConfirmado($id) {
        $db = Db::getInstance();
        //DELETE FROM table_name WHERE condition;
        $req = $db->prepare('DELETE FROM posts WHERE id = :id');
        $req->execute(array('id' => $id));
    }
}
?>