#cd c:\xampp\mysql\bin
#ESTO SOLO LA PRIMERA VEZ, SI NO VAS A BORRAR LA TABLA EXISTENTE, mysql -uroot -p --default_character_set utf8 < c:\xampp\htdocs\pagina\baseDatosPag.sql
#mysql -uroot -p pagina

DROP DATABASE IF EXISTS pagina;
CREATE DATABASE pagina CHARACTER SET utf8mb4;
USE pagina;

CREATE TABLE usuario(
    codigo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    contraseña VARCHAR(250) NOT NULL
);

CREATE TABLE valoraciones(
    codigo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    puntuacion INT UNSIGNED,
    comentario TEXT NOT NULL,
    codigo_usuario INT UNSIGNED NOT NULL,
    FOREIGN KEY (codigo_usuario) REFERENCES usuario(codigo)
);

CREATE TABLE elemento(
    codigo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dato VARCHAR(30) NOT NULL,
    titulo VARCHAR(30) NOT NULL,
    titulo_Original VARCHAR(30) NOT NULL,
    saga VARCHAR(30) DEFAULT "N/A",
    sinopsis TEXT NOT NULL,
    genero VARCHAR(30) NOT NULL,
    subgenero VARCHAR(30) NOT NULL,
    pais VARCHAR(30) NOT NULL,
    imagen VARCHAR(30) NOT NULL,
    codigo_usuario INT UNSIGNED NOT NULL,
    FOREIGN KEY (codigo_usuario) REFERENCES usuario(codigo)
);

CREATE TABLE libro(
    codigo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    autor VARCHAR(15) NOT NULL,
    editorial VARCHAR(15) NOT NULL,
    paginas INT UNSIGNED NOT NULL,
    fecha DATE NOT NULL,
    codigo_elemento INT UNSIGNED NOT NULL,
    FOREIGN KEY (codigo_elemento) REFERENCES elemento(codigo)
);

CREATE TABLE juegos(
    codigo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    desarrollador VARCHAR(15) NOT NULL,
    plataformas VARCHAR(20) NOT NULL,
    modo_juego VARCHAR(15) NOT NULL,
    fecha DATE NOT NULL,
    codigo_elemento INT UNSIGNED NOT NULL,
    FOREIGN KEY (codigo_elemento) REFERENCES elemento(codigo)
);

CREATE TABLE pelicula(
    codigo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    director VARCHAR(30) NOT NULL,
    duracion INT UNSIGNED NOT NULL,
    compositor VARCHAR(30) NOT NULL,
    fecha DATE NOT NULL,
    codigo_elemento INT UNSIGNED NOT NULL,
    FOREIGN KEY (codigo_elemento) REFERENCES elemento(codigo)
);

CREATE TABLE actores(
    codigo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL
);

CREATE TABLE peliculaActores(
    codigo INT UNSIGNED AUTO_INCREMENT ,
    codigo_pelicula INT UNSIGNED NOT NULL,
    codigo_actores INT UNSIGNED NOT NULL,
    PRIMARY KEY (codigo,codigo_pelicula, codigo_actores),
    FOREIGN KEY (codigo_pelicula) REFERENCES pelicula(codigo),
    FOREIGN KEY (codigo_actores) REFERENCES actores(codigo)
);

