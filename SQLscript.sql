CREATE TABLE usuario(
    userName varchar(20) not null UNIQUE,
    nombre varchar(20) not null,
    apellidos varchar(20) not null,
    email varchar(20) not null UNIQUE,
    pass varchar(20) not null,
    fecha_alta TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    imagen_perfil varchar(300),
    edad int(50) not null,
    dni varchar(20) not null,
    esProfesor boolean DEFAULT false,
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
    fecha_alta TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    imagen_perfil varchar(300),
    primary Key (userName)
);
CREATE TABLE actividad(
    nombre varchar(20) not null UNIQUE,
    codClase varchar(20) not null UNIQUE,
    descripcion varchar(300) not null,
    id_profesor varchar(20) not null,
    sala varchar(20) not null,
    hora_comienzo TIMESTAMP not null,
    hora_fin TIMESTAMP not null,
    img varchar(300),
    primary Key (nombre),
    foreign Key (id_profesor) references profesor(userName)
);
CREATE TABLE reserva(
    userName varchar(20) not null,
    codHorario varchar(20) not null,
    fecha TIMESTAMP not null,
    -- foreign Key (userName) references usuario(userName),
    -- foreign Key (codHorario) references horarios(codHorario),
    codReserva INT NOT NULL AUTO_INCREMENT,
    primary Key (codReserva)
);
CREATE TABLE comentario(
    id varchar(20) not null UNIQUE,
    contenido varchar(1000) not null,
    userName varchar(20) not null,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    rating varchar(20) DEFAULT '0',
    foreign Key (userName) references usuario(userName),
    primary Key (id)
);
CREATE TABLE horarios(
    codHorario varchar(20) not null UNIQUE,
    nombreActividad varchar(20) not null,
    dia varchar(20) not null,
    hora_comienzo time not null,
    hora_fin time not null,
    plazas int(20) not null,
    -- posicion int not null,
    primary Key (codHorario),
    foreign Key (nombreActividad) references actividad(nombre)
);