CREATE TABLE roles
(
	num_rol SMALLINT PRIMARY KEY NOT NULL,
	rol VARCHAR (15) NOT NULL
);

INSERT INTO roles(num_rol, rol) VALUES('1', 'administrador'),
('2', 'usuario');



CREATE TABLE usuario
(
	id_user INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre TEXT NOT NULL,
	apellidos TEXT NOT NULL,
	sexo TEXT NOT NULL,
	fecha_nac DATE NOT NULL,
	celular TEXT NOT NULL,
	localidad TEXT NOT NULL,
	estado TEXT NOT NULL,
	domicilio TEXT NOT NULL,
	cp TEXT NOT NULL,
	correo TEXT NOT NULL,
	contra TEXT NOT NULL,
	status VARCHAR(15) DEFAULT 'desactivado',
	num_rol SMALLINT NOT NULL,
	fecha DATE NOT NULL,
	hora TIME NOT NULL,
	fecha_confirmacion DATE NOT NULL,
	hora_confirmacion TIME NOT NULL,
	fecha_ultima_sesion DATE,
	hora_ultima_sesion TIME,
	fecha_modificacion DATE,
	hora_modificacion TIME,
	FOREIGN KEY (num_rol) REFERENCES roles(num_rol)
);

UPDATE usuario SET status='activo' WHERE id_user=1;
UPDATE usuario SET status='desactivado' WHERE id_user=1;




CREATE TABLE marca
(
	nombre_marca VARCHAR(30) PRIMARY KEY NOT NULL,
	fecha DATE NOT NULL,
	hora TIME NOT NULL,
	fecha_modificacion DATE,
	hora_modificacion TIME
);




CREATE TABLE categoria
(
	nombre_categoria varchar(30) PRIMARY KEY NOT NULL,
	fecha DATE NOT NULL,
	hora TIME NOT NULL,
	fecha_modificacion DATE,
	hora_modificacion TIME
);

INSERT INTO categoria(nombre_categoria) VALUES('Teléfono Celular'),
('Funda'),
('Mica de Cristal'),
('Audífonos');




CREATE TABLE proveedor
(
	id_proveedor INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre_proveedor TEXT NOT NULL,
	apellidos_proveedor TEXT NOT NULL,
	localidad_proveedor TEXT NOT NULL,
	celular_proveedor TEXT NOT NULL,
	fecha_registro DATE NOT NULL,
	hora_registro TIME NOT NULL,
	fecha_modificacion DATE,
	hora_modificacion TIME
);




CREATE TABLE producto
(
	id_producto INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	fk_categoria VARCHAR(30) NOT NULL,
	imei VARCHAR(15),
	fk_marca VARCHAR(30) NOT NULL,
	fk_id_proveedor INT NOT NULL,
	ruta_imagen VARCHAR(60),
	nombre_producto TEXT NOT NULL,
	almacenamiento TEXT,
	descripcion_producto TEXT NOT NULL,
	costo_compra_unitario FLOAT(8,2) NOT NULL,
	costo_venta_unitario FLOAT(8,2) NOT NULL,
	status VARCHAR(30) NOT NULL,
	fecha_creacion DATE NOT NULL,
	hora_creacion TIME NOT NULL,
	fecha_modificacion DATE,
	hora_modificacion TIME,
	FOREIGN KEY (fk_categoria) REFERENCES categoria(nombre_categoria),
	FOREIGN KEY (fk_marca) REFERENCES marca(nombre_marca),
	FOREIGN KEY (fk_id_proveedor) REFERENCES proveedor(id_proveedor)
);




CREATE TABLE venta
(
	id_venta INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	clave_transaccion VARCHAR(250) NOT NULL,
	paypal_datos TEXT NOT NULL,
	total FLOAT(8,2) NOT NULL,
	fecha DATE NOT NULL,
	hora TIME NOT NULL,
	fk_id_usuario INT NOT NULL,
	status VARCHAR(200) NOT NULL,
	FOREIGN KEY (fk_id_usuario) REFERENCES usuario(id_user)
);


CREATE TABLE detalle_venta
(
	id_detalle_venta INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	fk_id_venta INT NOT NULL,
	fk_id_producto INT NOT NULL,
	precio_unitario FLOAT(8,2),
	fk_id_usuario INT NOT NULL,
	FOREIGN KEY (fk_id_venta) REFERENCES venta(id_venta) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (fk_id_producto) REFERENCES producto(id_producto) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (fk_id_usuario) REFERENCES usuario(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);