-- Active: 1736415102513@@127.0.0.1@3306@cassey_express
DROP DATABASE cassey_express;
CREATE DATABASE cassey_express;
USE cassey_express;



-- Tabla de Usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefono VARCHAR(15),
    direccion TEXT NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


create table clientes(

    id int auto_increment primary key,
    nombre varchar(100) not null,
    email varchar(100) unique not null,
    telefono varchar(15),
    direccion text not null,
    contraseña varchar(255) not null,
    fecha_registro timestamp default current_timestamp

);

-- Tabla de Categorías (Categorías de productos)
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    imagen VARCHAR(255)
);

-- Tabla de Productos (Menú del restaurante)
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio FLOAT,
    imagen VARCHAR(255),
    id_categoria INT NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id) ON DELETE CASCADE
);

-- Tabla de Pedidos
CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    estado ENUM('Pendiente', 'En camino', 'Entregado', 'Cancelado') DEFAULT 'Pendiente',
    total DECIMAL(10,2) NOT NULL,
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    dirreccion varchar(100) not null,
    telefono varchar(15) not null,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id) ON DELETE CASCADE
   
);






-- Tabla de Detalle de Pedidos
CREATE TABLE detalle_pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id) ON DELETE CASCADE,
    FOREIGN KEY (id_producto) REFERENCES productos(id) ON DELETE CASCADE
);
-- Tabla de carrito

CREATE TABLE carrito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_producto INT NOT NULL
    
);
select * from carrito;

-- Tabla de Calificaciones
CREATE TABLE calificaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    puntuacion INT CHECK (puntuacion BETWEEN 1 AND 5),
    comentario TEXT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);
show tables;
select * from pedidos;

select * from detalle_pedidos;
select * from productos;
select * from carrito;
select * from productos where  id=1;
USE cassey_express;

SELECT p.imagen, p.nombre, p.precio, p.id 
FROM carrito c
JOIN productos p
on c.id_producto = p.id
WHERE c.id_cliente = 14;
alter table carrito add column cantidad int not null;
update carrito set cantidad = 1 ;



SELECT * FROM clientes;

SELECT * FROM pedidos WHERE id_cliente = 12;;

--- 
SELECT p.nombre, p.precio, dp.cantidad, pe.total
FROM detalle_pedidos dp 
INNER JOIN pedidos pe ON pe.id = dp.id_pedido
INNER JOIN productos p ON dp.id_producto = p.id
WHERE pe.id=;


SELECT c.nombre AS cliente, p.nombre AS producto, p.precio, dp.cantidad, pe.total
FROM detalle_pedidos dp 
INNER JOIN pedidos pe ON pe.id = dp.id_pedido
INNER JOIN productos p ON dp.id_producto = p.id
INNER JOIN clientes c ON pe.id_cliente = c.id
ORDER BY c.nombre;

SELECT *FROM pedidos;

SELECT c.nombre, c.direccion, p.fecha_pedido, p.total FROM pedidos p
INNER JOIN clientes c on c.id = p.id_cliente;


