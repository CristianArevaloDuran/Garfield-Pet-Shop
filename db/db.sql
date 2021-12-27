create database gps;

use gps;

/*Rol*/

create table tblRol(
	idRol int unsigned not null primary key auto_increment,
    nombreRol varchar(20) unique not null
);

/*---*/

/*Privilegios*/

create table tblPrivilegios(
	idPrivilegio int unsigned not null primary key auto_increment,
    privilegio varchar(50) not null
);

/*---*/

/*Rol-Privilegio*/

create table tblRolPrivilegio(
	idRol int unsigned not null,
    constraint FK_rolProvilegioRol foreign key (idRol)
    references tblRol(idRol) 
    on update cascade on delete cascade,
    idPrivilegio int unsigned not null,
    constraint FK_rolPrivilegioPrivilegio foreign key (idPrivilegio)
    references tblPrivilegios(idPrivilegio)
    on update cascade on delete cascade,
    primary key(idRol, idPrivilegio)
);

/*---*/

/*Imagenes empleados*/

create table tblImgEmpleados(
	idImagen int unsigned primary key auto_increment not null,
    imagen blob not null
);

/**/

/*Estado*/

create table tblEstado(
	idEstado int unsigned not null primary key auto_increment,
    nomEstado varchar(40) not null
);

/*---*/

/*Empleados*/

create table tblEmpleados(
    idEmpleado int unsigned unique not null primary key,
    imgEmpleado int unsigned not null,
    constraint FK_imgEmpleadoId foreign key (imgEmpleado)
    references tblImgEmpleados(idImagen)
    on update cascade on delete cascade,
    nomEmpleado varchar(25) not null,
    apeEmpleado varchar(25) not null,
    corEmpleado varchar(50) not null,
    telEmpleado int unsigned not null,
    dirEmpleado varchar(100) not null,
    fecNacimiento date not null,
    fecIngreso datetime not null,
    fecSalida datetime null,
    rolEmpleado int unsigned not null,
    constraint FK_rolEmpleado foreign key (rolEmpleado)
    references tblRol(idRol) 
    on update cascade on delete cascade,
    estEmpleado int unsigned not null,
    constraint FK_estadoEmpleado foreign key (estEmpleado)
    references tblEstado(idEstado)
    on update cascade on delete cascade,
    conEmpleado varchar(255) not null
);

drop table tblEmpleados;
drop table tblImgEmpleados;

/*Inserción de datos*/
select * from tblImgEmpleados;
insert into tblRol(nombreRol) values ("Administrador");
insert into tblEstado(nomEstado) values ("Activo");
insert into tblEmpleados values (1069712878,
	1,
	"Cristian", 
	"Arévalo Duran", 
    "cristianarevaloduran@gmail.com", 
    3123028695,
    "Cra 7 N°14-17",
    "2003-11-30",
    now(),
    null,
    1,
    1,
    "$2a$12$IPNn9vD1FpcyhOh.RMsBJOI4Qn5XvCYUuo0n5qyZVREg/rLInwRxC"
);

select * from tblRol;
select e.nomEmpleado, e.apeEmpleado, r.nombreRol from tblEmpleados as e inner join tblRol as r on e.rolEmpleado = r.idRol;

/*---*/

