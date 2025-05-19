CREATE TABLE Usuarios (
    idUsuario SERIAL PRIMARY KEY,
    nombreUsuario VARCHAR(100) NOT NULL,
    contraseña VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    nombreCompleto VARCHAR(100),
    fechaRegistro DATE
);

CREATE TABLE Vendedor (
    idVendedor SERIAL PRIMARY KEY,
    nombreNegocio VARCHAR(100) NOT NULL,
    ventasTotales NUMERIC(10, 2),
    estrellas NUMERIC(2, 1),
    fechaCuenta DATE,
    idUsuario INT,
    FOREIGN KEY (idUsuario) REFERENCES Usuarios(idUsuario)
);


CREATE TABLE Producto (
    idProducto SERIAL PRIMARY KEY,
    nombreProducto VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio NUMERIC(10, 2) NOT NULL,
    fechaPublicacion DATE,
    idUsuario INT,
    FOREIGN KEY (idUsuario) REFERENCES Usuarios(idUsuario)
);


CREATE TABLE MetodoPago (
    idMetodoPago SERIAL PRIMARY KEY,
    nombreMetodo VARCHAR(100) NOT NULL
);


CREATE TABLE Producto_MetodoPago (
    idProducto INT,
    idMetodoPago INT,
    PRIMARY KEY (idProducto, idMetodoPago),
    FOREIGN KEY (idProducto) REFERENCES Producto(idProducto),
    FOREIGN KEY (idMetodoPago) REFERENCES MetodoPago(idMetodoPago)
);

CREATE TABLE Comprador (
    idComprador SERIAL PRIMARY KEY,
    historial TEXT,
    listaDeseos TEXT
);


CREATE TABLE VistaProducto (
    idCompra SERIAL PRIMARY KEY,
    fechaCompra DATE NOT NULL,
    totalCompra NUMERIC(10, 2)
);

CREATE TABLE Factura (
    idFactura SERIAL PRIMARY KEY,
    fechaFactura DATE NOT NULL,
    fechaCompra DATE
);



CREATE TABLE Comprador_Compra (
    idProducto INT,
    idMetodoPago INT,
    idUsuario INT,
    idCompra INT,
    idComprador INT,
    idVendedor INT,
    idFactura INT,
    PRIMARY KEY (idProducto, idCompra, idComprador, idVendedor, idFactura),
    FOREIGN KEY (idProducto) REFERENCES Producto(idProducto),
    FOREIGN KEY (idMetodoPago) REFERENCES MetodoPago(idMetodoPago),
    FOREIGN KEY (idUsuario) REFERENCES Usuarios(idUsuario),
    FOREIGN KEY (idCompra) REFERENCES VistaProducto(idCompra),
    FOREIGN KEY (idComprador) REFERENCES Comprador(idComprador),
    FOREIGN KEY (idVendedor) REFERENCES Vendedor(idVendedor),
    FOREIGN KEY (idFactura) REFERENCES Factura(idFactura)
);

INSERT INTO Usuarios (nombreUsuario, contraseña, email, nombreCompleto, fechaRegistro) VALUES
('juan_perez', 'password123', 'juan@example.com', 'Juan Perez', '2024-01-01'),
('maria_gomez', 'password456', 'maria@example.com', 'Maria Gomez', '2024-02-01'),
('carlos_ruiz', 'password789', 'carlos@example.com', 'Carlos Ruiz', '2024-03-01');

INSERT INTO Vendedor (nombreNegocio, ventasTotales, estrellas, fechaCuenta, idUsuario) VALUES
('Tienda Juan', 1000.50, 4.5, '2024-01-15', 1),
('Super Maria', 500.00, 4.0, '2024-02-15', 2),
('Productos Carlos', 1500.75, 4.8, '2024-03-15', 3);

INSERT INTO Producto (nombreProducto, descripcion, precio, fechaPublicacion, idUsuario) VALUES
('Laptop', 'Laptop de alta gama', 1200.99, '2024-04-01', 1),
('Smartphone', 'Teléfono inteligente de última generación', 800.49, '2024-04-05', 2),
('Televisor', 'Televisor 4K de 55 pulgadas', 600.00, '2024-04-10', 3);

INSERT INTO MetodoPago (nombreMetodo) VALUES
('Tarjeta de Crédito'),
('PayPal'),
('Transferencia Bancaria');

INSERT INTO VistaProducto (fechaCompra, totalCompra) VALUES
('2024-05-01', 1800.99),
('2024-05-05', 800.49),
('2024-05-10', 600.00);

INSERT INTO Factura (fechaFactura, fechaCompra) VALUES
('2024-05-02', '2024-05-01'),
('2024-05-06', '2024-05-05'),
('2024-05-11', '2024-05-10');

INSERT INTO Comprador (historial, listaDeseos) VALUES
('VistaProducto 1, VistaProducto 2', 'Laptop, Televisor'),
('VistaProducto 3', 'Smartphone, Laptop'),
('VistaProducto 4', 'Televisor');

INSERT INTO Producto_MetodoPago (idProducto, idMetodoPago) VALUES
(1, 1),  -- Laptop se puede pagar con Tarjeta de Crédito
(2, 2),  -- Smartphone se puede pagar con PayPal
(3, 3);  -- Televisor se puede pagar con Transferencia Bancaria


INSERT INTO Comprador_Compra (idProducto, idMetodoPago, idUsuario, idCompra, idComprador, idVendedor, idFactura) VALUES
(1, 1, 1, 1, 1, 1, 1),  -- VistaProducto de Juan, Laptop pagada con Tarjeta de Crédito
(2, 2, 2, 2, 2, 2, 2),  -- VistaProducto de Maria, Smartphone pagado con PayPal
(3, 3, 3, 3, 3, 3, 3);  -- VistaProducto de Carlos, Televisor pagado con Transferencia Bancaria




