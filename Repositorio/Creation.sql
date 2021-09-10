
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

/*
INSERT INTO Escuelas (nombre) VALUES ('Ciencias de la Computacion');
INSERT INTO Escuelas (nombre) VALUES ('Educacion');
INSERT INTO Usuarios (nombres, apellidos, email, username, clave, escuela_id) VALUES ('Jack Christopher', 'Huaihua Huayhua', 'jhuaihuah@unsa.edu.pe',"Jack", "JC", 1);
INSERT INTO Usuarios (nombres, apellidos, email, username, clave, escuela_id) VALUES ('Rodrigo Jesus', 'Santisteban Pachari', 'rsantisteban@unsa.edu.pe', "Rodrigo", "RJ", 1);
INSERT INTO Usuarios (nombres, apellidos, email, username, clave, escuela_id) VALUES ('Rommel Mario', 'Ccorahua Lozano', 'rccorahual@unsa.edu.pe', "Rommel", "RM", 2);
INSERT INTO Links (nombre, descripcion, url_content, id_user, escuela_id) VALUES ('Earley Parser', 'Implementacion del Earley Parser en C++', 'https://www.youtube.com/watch?v=KFVrnC6eTqA', 1, 1);
INSERT INTO Links (nombre, descripcion, url_content, id_user, escuela_id) VALUES ('Base De Datos Distribuida', 'Tienda Online con BD distribuida', 'https://www.youtube.com/watch?v=LePRM5XAILE', 2, 1);
INSERT INTO Links (nombre, descripcion, url_content, id_user, escuela_id) VALUES ('Cuidados para COVID', 'Responsabilidad Social sobre el COVID', 'https://youtu.be/gGxrvF45-WA', 3, 2);
INSERT INTO Teachers (nombres, apellidos) VALUES ('Carlos Eduardo', 'Atencio Torres');
INSERT INTO Teachers (nombres, apellidos) VALUES ('Franci', 'Suni Lopez');
INSERT INTO Comments (comentario, teacher_id) VALUES ('Muy buen curso', 1);
INSERT INTO Comments (comentario, teacher_id) VALUES ('Explica bien las clases', 1);
INSERT INTO Comments (comentario, teacher_id) VALUES ('Clases mayormente teoricas', 2);
INSERT INTO Cursos (id, nombre) VALUES (1703134, 'Analisis Exploratorio de Datos Espaciales');
INSERT INTO Resources (descripcion, url_content, id_user, curso_id) VALUES ('Curso de Analisis Exploratorio de Datos Espaciales', 'https://drive.google.com/drive/folders/19PVgeifvCG4r3xXCiwkmqQ3_fu9CqSMY?usp=sharing', 1, 1);

SELECT L.id, L.nombre, L.descripcion, L.url_content, L.id_user, U.nombres "user_nombres" FROM Links L, Usuarios U WHERE L.escuela_id=1 AND L.id_user=U.id;

select * from Usuarios;
*/

CREATE TABLE IF NOT EXISTS Links (
    id INTEGER NOT NULL  PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(150) NOT NULL,
    descripcion VARCHAR(500) NOT NULL,
    url_content VARCHAR(1500) NOT NULL,
    escuela_id INTEGER NOT NULL
);

select * from links;
select * from auditorias;
delete from auditorias where id = 6;
delete from links where id = 1;

INSERT INTO ESCUELAS (nombre) Values('Ingenieria Electronica');
INSERT INTO Cursos (id, nombre) VALUES (1703134, 'Analisis Exploratorio de Datos Espaciales');