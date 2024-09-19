<?php
  class Db {
    // Se declara una variable estática privada para almacenar la única instancia de la clase
    private static $instance = NULL;

    // Constructor privado para evitar la creación de instancias desde fuera de la clase
    private function __construct() {}

    // Método de clonación privado para evitar la clonación de la instancia
    private function __clone() {}

    // Método estático para obtener la instancia única de la clase (implementación del patrón Singleton)
    public static function getInstance() {
      // Verifica si la instancia aún no está creada
      if (!isset(self::$instance)) {
        // Configuración de opciones para el objeto PDO (manejo de errores)
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

        // Creación de la instancia PDO y asignación a la variable estática
        self::$instance = new PDO('mysql:host=localhost;dbname=php_mvc_mb;port=3366', 'root', '', $pdo_options);
      }
      // Devuelve la instancia existente o recién creada
      return self::$instance;
    }
  }
?>