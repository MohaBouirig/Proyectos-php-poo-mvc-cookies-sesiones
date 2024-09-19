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