
USE `CI` ;

INSERT INTO linea (nombre,descripcion) VALUES
('linea1','linea numero 1'),
('linea2','linea numero 2'),
('linea3','linea numero 3'),
('linea4','linea numero 4'),
('linea5','linea numero 5');

INSERT INTO Pais (nombre) VALUES
('El Salvador'),
('Guatemala'),
('Honduras'),
('Nicaragua'),
('Costa Rica');

INSERT INTO Proveedor (nombre,registroFiscal,telefono,nomContacto,nota,diasCredito,correo,direccion,nit,idPais) VALUES
('NIKE','123456-1','22205662','Leticia','riesgo uno',30,'nike@gmail.com','calle 13 de octubre #12','1234-123456-123-1',1),
('CAT','321456-2','22307845','Roxana','dificultad dos',30,'cat@gmail.com','','',1),
('PUMA','875412-1','23820215','Pedro','ayuda tres',30,'puma@gmail','avenica jerusarel casa 5','2546-022589-574-0',1),
('HEATHERLAND','784521-1','22207896','Amilcar','llegada cuatro',30,'heatherland@gmail','colonia san patricio casa 27','1234-458967-741-3',1),
('FILA','321456-1','22707412','Leonardo','Retirada cinco',30,'fila@gmail','colonia san ramon pasaje 3 casa 7','8977-356545-123-2',1);

INSERT INTO Marca (nombre,descripcion) VALUES
('NIKE','Marca 1'),
('CAT','Marca 2'),
('PUMA','Marca 3'),
('HEATHERLAND','Marca 4'),
('FILA','Marca 5');

INSERT INTO catalogo (nombre,descripcion,fechaInicio,fechaCierre,imagen) VALUES
('catalogo1','es el primer catalogo', '03-05-21', '03-08-21','image1'),
('catalogo2', 'es el segundo catalogo', '04-05-21', '04-08-21','image2'),
('catalogo3', 'es el tercer catalogo', '05-05-21', '05-08-21','image3'),
('catalogo4', 'es el cuarto catalogo', '06-05-21', '06-08-21','image4'),
('catalogo5', 'es el quinto catalogo', '06-05-21', '06-08-21','image5');

INSERT INTO `color` (nombre, codigo) VALUES
('Azul', '#000888'),
('Blanco', '#FFFFFF'),
('Celeste', '#01DFD7'),
('Morado', '#8904B1'),
('Rojo', '#FF0000');

INSERT INTO talla (talla,genero,idcolor,precio) VALUES
('30',1,1,25),
('35',1,2,25),
('40',1,3,22),
('38',1,4,21),
('38',1,1,25);

INSERT INTO producto (nombre,idProveedor,codigoOrigen,linea,descripcion,idcatalogo,npag,idmarca,propiedad,garantia,observacion,estado) VALUES
('nombrea',1,'25',1,'produto de Fila', 1,'2',2,'cuero',12,'calidad 1/2', 1),
('nombreb',2,'25',1,'produto de Fila', 1,'2',2,'cuero',12,'calidad 1/2', 1),
('nombrec',3,'25',1,'produto de Fila', 1,'2',2,'cuero',12,'calidad 1/2', 0),
('nombred',4,'25',1,'produto de Fila', 1,'2',2,'cuero',12,'calidad 1/2', 1),
('nombree',5,'25',1,'produto de Fila', 1,'2',2,'cuero',12,'calidad 1/2', 0);


INSERT INTO Departamento (idPais,Nombre) VALUES
(1,'San Salvador'),
(1,'Sonsonate'),
(1,'San Miguel'),
(1,'Morazan'),
(1,'La Union'),
(1,'Santa Ana'),
(1,'La Paz'),
(1,'Cabañas'),
(1,'Libertad'),
(1,'Chalatenango'),
(1,'Usulutan'),
(1,'Cuscatlan'),
(1,'San vicente'),
(1,'Ahuchapan');

INSERT INTO Municipio (idDepartamento,Nombre) VALUES
(1,'San Salvador'),
(6, 'Metapan'),
(9, 'Teotepeque'),
(14,'Ataco' ),
(2,'Armenia' ),
(12,'Sushitoto' ),
(1,'Apopa' ),
(14,'San Lorenzo' ),
(1,'Cojutepeque' ),
(13,'Apastepeuqe' ),
(8,'Ilobasco' );

INSERT INTO Persona (Primer_Nombre,Segundo_Nombre,Primer_Apellido,Segundo_Apellido,Direccion,DUI,NIT,genero,estadoCivil,FechaNacimiento,idMunicipio,estado) VALUES
('Roberto', 'Antonio', 'Flores', 'Ayala', 'Canton El cojutillo, calle el amate #123', '02487847-2','0215-55671-3524-1', 1, 1, '1992-02-01',1,1),
('Cesar', 'Ernesto', 'Iglesias', 'Cuellar', 'Canton El juancho, calle el amate #124', '02487848-2','0215-55671-3255-1', 1, 1, '1993-02-01',1,1),
('Morfeo', 'Orfeo', 'Trinity', 'War', 'Canton El juancho, calle el amate #124', '02487848-2','0215-55671-3552-1', 1, 1, '1993-02-02',1,1),
('Herson', 'Ernesto', 'Serrano', 'Asencio', 'Canton El juancho, calle el amate #124', '02487848-2','0215-55671-3535-1', 1, 1, '1994-02-01',1,0),
('Juan', 'Pedro', 'San', 'Java', 'Canton El manguito, calle el amate #123', '12487847-2','0216-55671-3354-1', 1, 1, '1989-02-01',1,0);

INSERT INTO Empleado (idPersona,usuario,cargo,salario,clave,estado) VALUES
(1, 'Administrador1','adm1', 1000, 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Administrador2','adm2', 1200, 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 'Administrador3','adm3', 1000, 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'Administrador4','adm4', 1200, 'e10adc3949ba59abbe56e057f20f883e', 1),
(5, 'Administrador5','adm5', 1000, 'e10adc3949ba59abbe56e057f20f883e', 0);

INSERT INTO bitacora (descripcion,idProducto,idEmpleado) VALUES
('bitacora numero 1', 1, 1),
('bitacora numero 2', 2, 1),
('bitacora numero 3', 3, 1),
('bitacora numero 4', 4, 1),
('bitacora numero 5', 5, 1);


INSERT INTO Sucursal (nombre,idMunicipio) VALUES
('uno',1),
('dos',6),
('tres',8),
('cuatro',11),
('cinco',2),
('seis',10),
('siete',3),
('ocho',4),
('nueve',5),
('diez',7),
('once',9);

INSERT INTO Bodega (idSucursal,nombre) VALUES
(1, 'uno'),
(4, 'dos'),
(3, 'tres'),
(5, 'cuatro'),
(2, 'cinco');


INSERT INTO TipoContacto (Nombre) VALUES
('Telefono'),
('Celular'),
('Fax');

INSERT INTO Contacto (idTipoContacto,Contacto) VALUES
(2,'77222020'),
(1,'22222020'),
(3,'24222020'),
(2,'77222021'),
(1,'22222020');

INSERT INTO Zona (idMunicipio,idEmpleado) VALUES
(2,1),
(1,5),
(3,4),
(2,2),
(1,1);

INSERT INTO Cliente (idPersona,CreditoFiscal,FechaAlta,FechaBaja,empleado,estado) VALUES
(1,'123456-1','12-10-21','14-02-13',1,0),
(2,'136588-2','11-04-04','12-07-01',1,1),
(3,'114745-0','10-02-22','11-05-25',1,0),
(4,'171854-2','11-11-11','12-11-18',1,1),
(5,'145588-3','09-08-17','10-12-20',1,1);

INSERT INTO OrdenDeCompra (fechaCreacion,fechaEntrega,idProveedor,enTransito) VALUES
('12-10-21','14-02-13',1,1),
('11-02-25','12-08-21',1,1),
('10-10-13','11-01-14',1,1),
('09-06-20','10-09-11',1,1),
('12-01-17','13-12-01',1,1);

INSERT INTO OrdenDeVenta (fechaCreacion,fechaEntrega,idCliente,estado) VALUES
('12-10-21','14-02-13',1,1),
('11-02-28','12-09-12',1,1),
('10-05-25','11-04-04',2,1),
('09-09-09','10-12-13',1,1),
('11-08-19','12-12-12',1,1);


INSERT INTO producto_talla (idproducto,idtalla) VALUES
(1,2),
(2,4),
(3,1),
(4,3),
(1,2);


INSERT INTO Persona_Contacto (idPersona,idContacto) VALUES
(2,1),
(1,5),
(3,4),
(2,2),
(1,1);


INSERT INTO DetalleOrdenDeVenta (idproducto_talla,idOrdenDeVenta,cantidad) VALUES
(1,2,15),
(2,3,18),
(1,3,12),
(4,3,11),
(2,2,21);


INSERT INTO Talla_Bodega (idBodega,idProducto_Talla,stock) VALUES
(1, 5, 15),
(2, 4, 18),
(3, 2, 11),
(4, 3, 13),
(5, 1, 10);


