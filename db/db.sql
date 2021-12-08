create database gps;

use gps;

create table usuarios(
    identificacion int unsigned unique not null primary key auto_increment,
    nombre varchar(50) not null,
    apellido varchar(50) not null,
    
);