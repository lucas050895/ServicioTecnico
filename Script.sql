CREATE DATABASE servicio;

USE servicio;

CREATE TABLE `clientes` (
  `id` INT AUTO_INCREMENT NOT NULL,
  `nombre` VARCHAR(45) DEFAULT NULL,
  `celular` INT(15) NOT NULL,
  `direccion` VARCHAR(50) NOT NULL,
  `modelo` VARCHAR(50) NOT NULL,
  `tipo` VARCHAR(50) NOT NULL,
  `problema` VARCHAR(20) NOT NULL,
  `fecha` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`)
);

CREATE TABLE `fotos_clientes` (
  `id` INT AUTO_INCREMENT NOT NULL,
  `foto` VARCHAR(45) DEFAULT NULL,
  `nombre_cliente` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE problema(
	id_problema INT PRIMARY KEY AUTO_INCREMENT,
  descripcion VARCHAR(20)
);

INSERT INTO problema(descripcion) 
VALUE
("Resivsar1"),
("Resivsar2"),
("Resivsar3"),
("Resivsar4"),
("Resivsar5");