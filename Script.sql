create database servicio;

use servicio;

create table revisar(
	id_revisar int primary key auto_increment,
    descripcion varchar(20)
);

insert into revisar(descripcion) 
value
("Resivsar1"),
("Resivsar2"),
("Resivsar3"),
("Resivsar4"),
("Resivsar5");

create table datos(
	id_datos int auto_increment,
    nombre varchar(20), 
    celular int(15),
    direccion varchar(50),
    maquina varchar(20),
    modelo varchar(20),
    revisar varchar(20),
    fotos varchar(100),
    primary key(id_datos)
);