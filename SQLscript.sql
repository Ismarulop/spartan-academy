CREATE TABLE usuario(
    userName varchar(20) not null UNIQUE,
    nombre varchar(20) not null,
    apellidos varchar(20) not null,
    email varchar(20) not null UNIQUE,
    pass varchar(20) not null,
    fecha_alta DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    imagen_perfil varchar(300),
    edad int(50) not null,
    dni varchar(20) not null,
    primary Key (userName)
);
CREATE TABLE profesor(
    userName varchar(20) not null UNIQUE,
    nombre varchar(20) not null,
    apellidos varchar(20) not null,
    email varchar(20) not null UNIQUE,
    pass varchar(20) not null,
    dni varchar(20) not null,
    edad int(50) not null,
    fecha_alta DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    imagen_perfil varchar(300),
    primary Key (userName)
);
CREATE TABLE actividad(
    codClase varchar(20) not null UNIQUE,
    nombre varchar(20) not null,
    descripcion varchar(300) not null,
    id_profesor varchar(20) not null,
    sala varchar(20) not null,
    plazas int(20) not null,
    hora_comienzo date not null,
    hora_fin date not null,
    primary Key (codClase),
    foreign Key (id_profesor) references profesor(userName)
);
CREATE TABLE reserva(
    codUser varchar(20) not null,
    codClase varchar(20) not null,
    fecha date not null,
    foreign Key (codUser) references usuario(userName),
    foreign Key (codClase) references actividad(codClase),
    primary Key (codClase, codUser)
);
CREATE TABLE comentario(
    id varchar(20) not null UNIQUE,
    contenido varchar(1000) not null,
    userName varchar(20) not null,
    codClase varchar(20) not null,
    fecha date not null,
    foreign Key (userName) references usuario(userName),
    foreign Key (codClase) references actividad(codClase),
    primary Key (codClase, userName)
);