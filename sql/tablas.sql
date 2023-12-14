CREATE TABLE admin(
    id tinyint unsigned primary key auto_increment,
    correo varchar(30) NOT NULL UNIQUE,
    pw varchar(20) NOT NULL,
    nombre varchar(20) NOT NULL UNIQUE,
    perfil char(2) NOT NULL
);