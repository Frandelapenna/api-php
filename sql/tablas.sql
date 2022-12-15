/**
 * Trabajo en clases tema APIs
 * Este trabajo consiste en un organizador de actividades por materia.
*/
CREATE DATABASE IF NOT EXISTS isft130_orgianizador;
USE isft130_orgianizador;

CREATE TABLE materias (
	id_materia int not null unique auto_increment,
    nombre varchar(60) not null,
    PRIMARY KEY (id_materia));
    
CREATE TABLE estados (
	id_estado int not null unique auto_increment,
    descripcion varchar(30) not null,
    PRIMARY KEY (id_estado));

CREATE TABLE actividades (
	id_actividad int not null unique,
    id_materia int not null,
    id_estado int not null,
    descripcion varchar(60) not null,
    fecha_entrega datetime not null,
    notas text not null,
    PRIMARY KEY (id_actividad),
	FOREIGN KEY (id_materia) REFERENCES materias (id_materia),
    FOREIGN KEY (id_estado) REFERENCES estados (id_estado));
    
-- Datos predefinidos
INSERT INTO estados (descripcion) VALUES ('Pendiente');
INSERT INTO estados (descripcion) VALUES ('En proceso');
INSERT INTO estados (descripcion) VALUES ('Finalizado');