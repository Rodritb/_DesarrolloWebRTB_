CREATE DATABASE IF NOT EXISTS bd_veterinaria26;
USE bd_veterinaria26;

CREATE TABLE especies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL
);

CREATE TABLE mascotas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fotografia VARCHAR(100),
    nombre VARCHAR(40) NOT NULL,
    raza VARCHAR(50),
    fecha_nacimiento DATE,
    peso DECIMAL(5,2),
    sexo CHAR(1), -- 'M' o 'H'
    propietario VARCHAR(80),
    especie_id INT,
    FOREIGN KEY (especie_id) REFERENCES especies(id)
);

INSERT INTO especies (nombre) VALUES 
('Perro'), ('Gato'), ('Ave'), ('Roedor'), ('Reptil');