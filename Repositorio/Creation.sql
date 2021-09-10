
CREATE TABLE IF NOT EXISTS Escuelas (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    CONSTRAINT nombre_unique UNIQUE (nombre)
);


CREATE TABLE IF NOT EXISTS temp_Usuarios (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombres VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    clave VARCHAR(100) NOT NULL,
    escuela_id INTEGER NOT NULL,
    codigo_verificacion VARCHAR(6) NOT NULL,
    CONSTRAINT email_unique UNIQUE (email),
    CONSTRAINT username_unique UNIQUE (username)
);

CREATE TABLE IF NOT EXISTS Usuarios (
    id INTEGER NOT NULL PRIMARY KEY,
    nombres VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    clave VARCHAR(100) NOT NULL,
    escuela_id INTEGER NOT NULL,
    permisos INTEGER NOT NULL, -- 0: usuario, 1: admin escuela, 2: admin global
    CONSTRAINT email_unique UNIQUE (email),
    CONSTRAINT username_unique UNIQUE (username)
);

CREATE TABLE IF NOT EXISTS Links (
    id INTEGER NOT NULL  PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(150) NOT NULL,
    descripcion VARCHAR(500) NOT NULL,
    url_content VARCHAR(1500) NOT NULL,
    escuela_id INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS Teachers (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombres VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS Comments (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comentario VARCHAR(500) NOT NULL,
    teacher_id INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS Cursos (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS Resources (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR(150) NOT NULL,
    url_content VARCHAR(1500) NOT NULL,
    curso_id INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS  Auditorias (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuario_id INTEGER NOT NULL,
    tabla VARCHAR(20) NOT NULL,
    item_id INTEGER NOT NULL,
    fecha_hora DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS  Curso_Escuela (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    curso_id INTEGER NOT NULL,
    escuela_id INTEGER NOT NULL,
    CONSTRAINT curso_escuela_unique UNIQUE (curso_id, escuela_id)
);


CREATE TABLE IF NOT EXISTS Links (
    id INTEGER NOT NULL  PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(150) NOT NULL,
    descripcion VARCHAR(500) NOT NULL,
    url_content VARCHAR(1500) NOT NULL,
    escuela_id INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS newbies_info (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    escuela_id INTEGER NOT NULL,
    email_contacto VARCHAR(100) NOT NULL,
    whatsapp_group_url VARCHAR(150) NOT NULL,
    mensaje_bienvenida VARCHAR(300) NOT NULL,
    mensaje_ayuda VARCHAR(600) NOT NULL,
    CONSTRAINT escuela_id_unique UNIQUE (escuela_id)
);


insert into newbies_info (escuela_id, email_contacto, whatsapp_group_url, mensaje_bienvenida, mensaje_ayuda) 
values (1, 'jhuaihuah@unsa.edu.pe', 'chat.whatsapp.com/DZJ6RcYgj50Brhd4hGxDSJ', 
'Bienvenido a la plataforma de Ciencias de la Computación de la UNSA',
'El proceso de matriculas ya ha culminado, pero la re-matricula y la matricula por excepciones siguen vigentes.')