-- Active: 1736415102513@@127.0.0.1@3306@cassey_express

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
    id_producto INT NOT NULL,
    cantidad INT NOT NULL
    
);


-- Tabla de Calificaciones
CREATE TABLE calificaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    puntuacion INT CHECK (puntuacion BETWEEN 1 AND 5),
    comentario TEXT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);
 