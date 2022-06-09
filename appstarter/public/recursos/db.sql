create database 8a_db;
use 8a_db;

create table usuarios(
    id_usuario int not null auto_increment,
    nombre varchar(200) not null,
    paterno varchar(200) not null,
    materno varchar(200) not null,
    email varchar(200) not null,
    contrasena varchar(65) not null,
    tipoUsuario int not null
);

insert into usuarios values(1,'Ulises','Serrano','Pérez','hola@alan.com',sha256('12345'),0);

insert into usuarios values(2,'Alan','Nava','Santacruz','hola@alan.com',sha256('12345'),1);

create table recetas(
    id_receta int not null primary key auto_increment,
    nombre varchar(200) not null,
    descripcion varchar(200) not null,
    ingredientes text not null,
    id_usuario int not null,
    foreign key (id_usuario) references usuarios(id_usuario)
);

