DROP DATABASE php_mvc_mb;
create database php_mvc_mb;
use php_mvc_mb;


CREATE TABLE `posts` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `author` varchar(100),
  `content` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO posts (author, content) VALUES ("Moha", "Este es mi primer post");
INSERT INTO posts (author, content) VALUES ("Sergio", "Este es mi segundo post");
UPDATE posts SET author = "Sergi", content ="Este es mi segundo post" WHERE id = 2;
SELECT * FROM posts;

CREATE TABLE `entrenadores` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombre` varchar(100),
  `apellido` varchar(100)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
select * from entrenadores;

INSERT INTO entrenadores (nombre, apellido) VALUES ("Moha", "Bouirig");
INSERT INTO entrenadores (nombre, apellido) VALUES ("JOSE", "Alba");
delete from entrenadores where id = 3;
CREATE TABLE `pokemons` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `idEntrenador` int(11),
  `nombrePokemon` varchar(100),
  `tipo` varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE pokemons
ADD CONSTRAINT fk_pokemon_entrenador
FOREIGN KEY (idEntrenador)
REFERENCES entrenadores(id)
ON DELETE CASCADE;

INSERT INTO pokemons (idEntrenador, nombrePokemon, tipo) VALUES (1, "Bulbasur", "Planta");
INSERT INTO pokemons (idEntrenador, nombrePokemon, tipo) VALUES (1, "Pikachu", "Electrico");
INSERT INTO pokemons (idEntrenador, nombrePokemon, tipo) VALUES (4, "Raichu", "Electrico");
INSERT INTO pokemons (idEntrenador, nombrePokemon, tipo) VALUES (4, "Charizard", "Fuego");
select * from pokemons;

DELETE FROM pokemons WHERE idEntrenador = 2;

DROP DATABASE MohamedBouirig_Proyecto;
create database MohamedBouirig_Proyecto;
use MohamedBouirig_Proyecto;


CREATE TABLE `usuarios` (
  `usuario` varchar(16) PRIMARY KEY NOT NULL,
  `contrasenya` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `info_Formulario` (
  `usuario` varchar(16) PRIMARY KEY NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `satisfaccion` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO usuarios (usuario,contrasenya,nombre,apellido) VALUES ('k',sha2('k',384),'Jose','Alba');
UPDATE usuarios set contrasenya = sha2('l',384), nombre = "Carl", apellido = "Johnson" where usuario = "k";
UPDATE usuarios SET contrasenya = sha2('k',384) WHERE usuario = 'k';

SELECT * FROM usuarios ;
SELECT * FROM info_formulario;

DELETE FROM info_formulario WHERE usuario='j';