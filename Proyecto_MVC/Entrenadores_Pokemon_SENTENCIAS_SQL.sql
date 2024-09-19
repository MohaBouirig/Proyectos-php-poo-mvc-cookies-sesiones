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
