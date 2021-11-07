DROP DATABASE IF EXISTS db_proyectoponslabor;
CREATE DATABASE db_proyectoponslabor character set utf8mb4 collate utf8mb4_spanish_ci;
USE db_proyectoponslabor;

DROP TABLE IF EXISTS CIUDAD;
CREATE TABLE CIUDAD
(
idCiudad int primary key auto_increment not null,
nombreCiudad varchar(20) not null
);

DROP TABLE IF EXISTS BARRIO;
CREATE TABLE BARRIO
(
idBarrio int primary key auto_increment not null,
nombreBarrio varchar(20) not null,
idCiudadFK int
);

DROP TABLE IF EXISTS USUARIO;
CREATE TABLE USUARIO
(
idUsuario int primary key auto_increment not null,
nombreUsuario varchar(70) not null,
correoUsuario varchar(70) not null unique,
passUsuario varchar(100) not null,
idTipoDocumentoFK int,
numDocUsuario varchar(10) not null unique,
numTelUsuario char(10) not null unique,
numTelFijo varchar(7) not null,
estadoUsuario bool NOT NULL,
idRolFK int not null,
idBarrioFK int not null,
direccionUsuario varchar(30) not null,
token varchar(100),
imagenUsuario varchar(100),
created_at datetime,
updated_at datetime
);

DROP TABLE IF EXISTS SECTOR_USUARIO;
CREATE TABLE SECTOR_USUARIO
(
idSectorUsuario int primary key auto_increment not null,
idUsuarioFK int not null,
idSectorFK int not null
);

DROP TABLE IF EXISTS TIPODOCUMENTO;
CREATE TABLE TIPODOCUMENTO
(
idTipoDocumento int primary key auto_increment not null,
nombreTipoDocumento char(2) not null
);

DROP TABLE IF EXISTS ROL;
CREATE TABLE ROL
(
idRol int primary key auto_increment not null,
nombreRol varchar(15) not null
);

DROP TABLE IF EXISTS CONTRATANTE;
CREATE TABLE CONTRATANTE
(
idContratante int primary key auto_increment not null,
descripcionContratante varchar(2500) not null,
idUsuarioFK int
);

DROP TABLE IF EXISTS VACANTE;
CREATE TABLE VACANTE
(
idVacante int primary key auto_increment not null,
nombreVacante varchar(70) not null,
cantidadVacante tinyint not null,
descripcionVacante varchar(2500) not null,
perfilAspirante varchar(1000) not null,
tipoContratoVacante varchar(80) not null,
sueldoVacante decimal(10, 3) not null,
fechaHoraPublicacion datetime not null,
fechaHoraCierre datetime not null,
direccionVacante varchar(50) not null,
estadoVacante bool not null,
idContratanteFK int not null,
idSectorFK int not null,
created_at datetime,
updated_at datetime
);

DROP TABLE IF EXISTS REQUISITOS;
CREATE TABLE REQUISITOS
(
idRequisitos int primary key auto_increment not null,
nombreRequisitos varchar(200) not null
);

DROP TABLE IF EXISTS REQUISITOS_VACANTE;
CREATE TABLE REQUISITOS_VACANTE
(
idRequisitosVacante int primary key auto_increment,
idVacanteFK int,
idRequisitosFK int,
especficacionRequisitos varchar(1000) not null
);

DROP TABLE IF EXISTS ASPIRANTE;
CREATE TABLE ASPIRANTE
(
idAspirante int primary key auto_increment not null,
descripcionPersonalAspirante varchar(2500) not null,
idUsuarioFK int unique,
idEstadoLaboralAspiranteFK int,
created_at datetime,
updated_at datetime                         
);

DROP TABLE IF EXISTS PUESTOINTERES;
CREATE TABLE PUESTOINTERES
(
idPuestoInteres int primary key auto_increment not null,
nombrePuesto varchar(100) not null
);

DROP TABLE IF EXISTS ASPIRANTE_PUESTOINTERES;
CREATE TABLE ASPIRANTE_PUESTOINTERES
(
idAspirantePuestoInteres int primary key auto_increment,
idAspiranteFK int,
idPuestoInteresFK int
);

DROP TABLE IF EXISTS ESTUDIO;
CREATE TABLE ESTUDIO
(
idEstudio int primary key auto_increment not null,
nombreInstitucion varchar(100) not null,
tituloObtenido varchar(50) not null,
idCiudadEstudio int,
idSectorFK int,
añoInicio year not null,
mesInicio varchar(2) not null,
añoFin year,
mesFin varchar(2),
idAspiranteFK int,
idGradoFK int
);

DROP TABLE IF EXISTS GRADOESTUDIO;
CREATE TABLE GRADOESTUDIO
(
idGrado int primary key auto_increment not null,
nombreGrado varchar(30) not null
);

DROP TABLE IF EXISTS SECTOR;
CREATE TABLE SECTOR
(
idSector int primary key auto_increment not null,
nombreSector varchar(100) not null
);

DROP TABLE IF EXISTS INFOLABORAL;
CREATE TABLE INFOLABORAL
(
idInfoLaboral int primary key auto_increment not null,
empresaLaboro varchar(100) not null,
idSectorFK int,
idCiudadLaboroFK int,
idTipoExperienciaFK int,
nombrePuestoDesempeño varchar(100) not null,
añoInicio year not null,
mesInicio varchar(2) not null,
añoFin year,
mesFin varchar(2),
funcionDesempeño varchar(2500) not null,
idAspiranteFK int
);

DROP TABLE IF EXISTS TIPOEXPERIENCIA;
CREATE TABLE TIPOEXPERIENCIA
(
idTipoExperiencia int primary key auto_increment not null,
nombreTipoExperiencia varchar(100) not null
);

DROP TABLE IF EXISTS IDIOMA;
CREATE TABLE IDIOMA
(
idIdioma int primary key auto_increment not null,
nombreIdioma varchar(30) not null
);

DROP TABLE IF EXISTS IDIOMA_ASPIRANTE;
CREATE TABLE IDIOMA_ASPIRANTE
(
idIdiomaAspirante int primary key auto_increment not null,
idAspiranteFK int,
idIdiomaFK int,
nivelIdioma char(1) not null
);

DROP TABLE IF EXISTS HABILIDAD;
CREATE TABLE HABILIDAD
(
idHabilidad int primary key auto_increment not null,
nombreHabilidad varchar(70) not null
);

DROP TABLE IF EXISTS HABILIDAD_ASPIRANTE;
CREATE TABLE HABILIDAD_ASPIRANTE
(
idHabilidadAspirante int primary key auto_increment not null,
idAspiranteFK int not null,
idHabilidadFK int not null,
nivelHabilidad char(1) not null
);

DROP TABLE IF EXISTS ESTADOLABORALASPIRANTE;
CREATE TABLE ESTADOLABORALASPIRANTE
(
idEstadoLaboral int primary key auto_increment not null,
nombreEstado varchar(20) not null
);

DROP TABLE IF EXISTS APLICACION_VACANTE;
CREATE TABLE APLICACION_VACANTE
(
idAplicacionVacante int primary key auto_increment,
idAspiranteFK int,
idVacanteFK int,
estadoAplicacionVacante char(1)
);

/*=================================== ALTERAR LAS TABLAS ====================================*/

ALTER TABLE BARRIO ADD FOREIGN KEY (idCiudadFK) REFERENCES CIUDAD (idCiudad);
ALTER TABLE USUARIO ADD FOREIGN KEY (idBarrioFK) REFERENCES BARRIO (idBarrio);
ALTER TABLE USUARIO ADD FOREIGN KEY (idTipoDocumentoFK) REFERENCES TIPODOCUMENTO (idTipoDocumento);
ALTER TABLE USUARIO ADD FOREIGN KEY (idRolFK) REFERENCES ROL (idRol);
ALTER TABLE SECTOR_USUARIO ADD FOREIGN KEY (idUsuarioFK) REFERENCES USUARIO (idUsuario);
ALTER TABLE SECTOR_USUARIO ADD FOREIGN KEY (idSectorFK) REFERENCES SECTOR (idSector);
ALTER TABLE CONTRATANTE ADD FOREIGN KEY (idUsuarioFK) REFERENCES USUARIO (idUsuario);
ALTER TABLE ASPIRANTE ADD FOREIGN KEY (idUsuarioFK) REFERENCES USUARIO (idUsuario);
ALTER TABLE VACANTE ADD FOREIGN KEY (idContratanteFK) REFERENCES CONTRATANTE (idContratante);
ALTER TABLE VACANTE ADD FOREIGN KEY (idSectorFK) REFERENCES SECTOR (idSector);
ALTER TABLE REQUISITOS_VACANTE ADD FOREIGN KEY (idVacanteFK) REFERENCES VACANTE (idVacante);
ALTER TABLE REQUISITOS_VACANTE ADD FOREIGN KEY (idRequisitosFK) REFERENCES REQUISITOS (idRequisitos);
ALTER TABLE ASPIRANTE_PUESTOINTERES ADD FOREIGN KEY (idAspiranteFK) REFERENCES ASPIRANTE (idAspirante);
ALTER TABLE ASPIRANTE_PUESTOINTERES ADD FOREIGN KEY (idPuestoInteresFK) REFERENCES PUESTOINTERES (idPuestoInteres);
ALTER TABLE ESTUDIO ADD FOREIGN KEY (idGradoFK) REFERENCES GRADOESTUDIO (idGrado);
ALTER TABLE ESTUDIO ADD FOREIGN KEY (idAspiranteFK) REFERENCES ASPIRANTE (idAspirante);
ALTER TABLE ESTUDIO ADD FOREIGN KEY (idSectorFK) REFERENCES SECTOR (idSector);
ALTER TABLE INFOLABORAL ADD FOREIGN KEY (idAspiranteFK) REFERENCES ASPIRANTE (idAspirante);
ALTER TABLE INFOLABORAL ADD FOREIGN KEY (idTipoExperienciaFK) REFERENCES TIPOEXPERIENCIA (idTipoExperiencia);
ALTER TABLE INFOLABORAL ADD FOREIGN KEY (idSectorFK) REFERENCES SECTOR (idSector);
ALTER TABLE IDIOMA_ASPIRANTE ADD FOREIGN KEY (idAspiranteFK) REFERENCES ASPIRANTE (idAspirante);
ALTER TABLE IDIOMA_ASPIRANTE ADD FOREIGN KEY (idIdiomaFK) REFERENCES IDIOMA (idIdioma);
ALTER TABLE HABILIDAD_ASPIRANTE ADD FOREIGN KEY (idAspiranteFK) REFERENCES ASPIRANTE (idAspirante);
ALTER TABLE HABILIDAD_ASPIRANTE ADD FOREIGN KEY (idHabilidadFK) REFERENCES HABILIDAD (idHabilidad);
ALTER TABLE ASPIRANTE ADD FOREIGN KEY (idEstadoLaboralAspiranteFK) REFERENCES ESTADOLABORALASPIRANTE (idEstadoLaboral);
ALTER TABLE APLICACION_VACANTE ADD FOREIGN KEY (idAspiranteFK) REFERENCES ASPIRANTE (idAspirante);
ALTER TABLE APLICACION_VACANTE ADD FOREIGN KEY (idVacanteFK) REFERENCES VACANTE (idVacante);

/*=================================== INSERTAR ====================================*/

/* ========================== TABLA CIUIDAD ========================*/
INSERT INTO CIUDAD(idCiudad, nombreCiudad)VALUES(NULL, 'Bogotá D.C');
INSERT INTO CIUDAD(idCiudad, nombreCiudad)VALUES(NULL, 'Medellín');
INSERT INTO CIUDAD(idCiudad, nombreCiudad)VALUES(NULL, 'Cali');
INSERT INTO CIUDAD(idCiudad, nombreCiudad)VALUES(NULL, 'Barranquilla');
INSERT INTO CIUDAD(idCiudad, nombreCiudad)VALUES(NULL, 'Cartagena de Indias');
INSERT INTO CIUDAD(idCiudad, nombreCiudad)VALUES(NULL, 'Soacha');
INSERT INTO CIUDAD(idCiudad, nombreCiudad)VALUES(NULL, 'Cúcuta');
INSERT INTO CIUDAD(idCiudad, nombreCiudad)VALUES(NULL, 'Medellín');
SELECT * FROM CIUDAD;

/* ========================== TABLA BARRIO ========================*/
INSERT INTO BARRIO(idBarrio, nombreBarrio, idCiudadFK)
VALUES(NULL, 'San Diego-Bosa', 1),
(NULL, 'Villa Javier', 1),
(NULL, ' El Jardín', 1),
(NULL, 'San Bernardino I', 1),
(NULL, 'Los Laureles', 1),
(NULL, 'Villa Anny', 1),
(NULL, 'Charles De Gaulle', 1),
(NULL, 'Gran Colombiano', 1),
(NULL, 'Islandia', 1),
(NULL, 'José María Carbonel', 1),
(NULL, 'El Retazo', 1),
(NULL, 'Paso Ancho', 1),
(NULL, 'Nueva Granada Bosa', 1),
(NULL, 'San Pablo Bosa', 1),
(NULL, 'Canaima', 1),
(NULL, 'Verbenal', 1),
(NULL, 'La Uribe', 1),
(NULL, 'San Cristóbal Norte', 1),
(NULL, 'La Floresta', 1),
(NULL, 'Altos de Serrezuela', 1),
(NULL, 'Balcones de Vista Hermosa', 1),
(NULL, 'Balmoral', 1),
(NULL, 'Norte', 1),
(NULL, 'Buenavista', 1),
(NULL, 'Chaparral', 1),
(NULL, 'El Codito', 1),
(NULL, 'El Refugio de San Antonio', 1),
(NULL, 'El Verbenal', 1),
(NULL, 'La Estrellita', 1),
(NULL, 'Horizontes', 1),
(NULL, ' La Frontera', 1),
(NULL, 'La Llanurita', 1),
(NULL, 'Los Consuelos', 1),
(NULL, 'Marantá', 1),
(NULL, 'Maturín', 1),
(NULL, 'Medellín', 1),
(NULL, 'Mirador del Norte', 1),
(NULL, 'Nuevo Horizonte', 1),
(NULL, 'an Antonio Norte', 1),
(NULL, 'Santandersito', 1),
(NULL, 'Tibabita', 1),
(NULL, 'Viña del Mar', 1),
(NULL, 'Bosque de San Antonio', 1),
(NULL, 'Conjunto Camino del Palmar', 1),
(NULL, 'El Pite', 1),
(NULL, 'El Redil', 1),
(NULL, 'La Cita', 1),
(NULL, 'La Granja Norte', 1),
(NULL, 'La Uribe', 1),
(NULL, 'Los Naranjos', 1),
(NULL, 'San Juan Bosco', 1),
(NULL, 'Urbanización Los Laureles', 1),
(NULL, 'Altablanca', 1),
(NULL, 'Barrancas', 1),
(NULL, 'California', 1),
(NULL, 'Cerro Norte', 1),
(NULL, 'Danubio', 1),
(NULL, 'Jiménez De Quesada', 1);
SELECT * FROM BARRIO;

/* ========================== TABLA TIPODOCUMENTO ========================*/
INSERT INTO TIPODOCUMENTO(idTipoDocumento, nombreTipoDocumento)
VALUES(NULL, 'CC'),
(NULL, 'TI'),
(NULL, 'RC'),
(NULL, 'CE'),
(NULL, 'PE');
SELECT * FROM TIPODOCUMENTO;

/* ========================== TABLA ROL ========================*/
INSERT INTO ROL(idRol, nombreRol)
VALUES(NULL, 'Contratante'),
(NULL, 'Aspirante');
SELECT * FROM ROL;

/* ========================== TABLA ESTADO LABORAL ========================*/
Insert into ESTADOLABORALASPIRANTE (idEstadoLaboral, nombreEstado) 
values (NULL, 'Primer empleo');  
Insert into ESTADOLABORALASPIRANTE (idEstadoLaboral, nombreEstado) 
values (NULL , 'Desempleado');
Insert into ESTADOLABORALASPIRANTE (idEstadoLaboral, nombreEstado) 
values (NULL, 'Empleado');  
Insert into ESTADOLABORALASPIRANTE (idEstadoLaboral, nombreEstado) 
values (NULL , 'Independiente');
select * from ESTADOLABORALASPIRANTE;
-- DESCRIBE ESTADOLABORALASPIRANTE;

/* ========================== TABLA PUESTO_INTERES ========================*/
Insert into PUESTOINTERES (idPuestoInteres, nombrePuesto) values (NULL, 'Ingeniera Industrial');  
Insert into PUESTOINTERES (idPuestoInteres, nombrePuesto) values (NULL, 'Abogada Penalista');
select * from PUESTOINTERES;

/* ========================== TABLA GRADO_ESTUDIO ========================*/
Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'Preescolar');  
Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'Básica Primaria (1-5)');
Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'Básica secundaria (6-9)');  
Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'Media (10-11)');
Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'Técnico');  
Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'Tecnólogo');
Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'Pregrado');
Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'Especialización');  
Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'Maestria');
Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'Doctorado');  
Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'PosDoctorado');
Select * from GRADOESTUDIO;

/* ========================== TABLA SECTOR ========================*/
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Ingeniería');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Desarrollo empresarial');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Finanzas');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Asistente administrativo');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Empleado de tienda');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Servicio de atención al cliente');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Operaciones');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Tecnologías de la información');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Marketing');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Recursos humanos');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Servicios sanitarios');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Ventas');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Gestión de programas y proyectos');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Contabilidad');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Arte y diseño');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Servicios sociales y comunitarios');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Consultoría');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Educación');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Liderazgo');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Jurídico');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Medios de comunicación');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Servicios militares y de protección');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Gestión de productos');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Compras');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Control de calidad');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Bienes raíces');
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Investigación');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Administración');	
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Ayuda');	
Select * from SECTOR;

/* ========================== TABLA TIPOEXPERIENCIA ========================*/
Insert into TIPOEXPERIENCIA (idTipoExperiencia, nombreTipoExperiencia) 
values (NULL, 'Asalariado');  
Insert into TIPOEXPERIENCIA (idTipoExperiencia, nombreTipoExperiencia) 
values (NULL, 'Idependiente');
Insert into TIPOEXPERIENCIA (idTipoExperiencia, nombreTipoExperiencia) 
values (NULL, 'Pasantías');  
Insert into TIPOEXPERIENCIA (idTipoExperiencia, nombreTipoExperiencia) 
values (NULL, 'Práctica laboral');
Insert into TIPOEXPERIENCIA (idTipoExperiencia, nombreTipoExperiencia) 
values (NULL, 'Aprendiz'); 

/* ========================== TABLA USUARIO ========================*/
Insert into USUARIO (idUsuario, nombreUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, numDocUsuario, numTelUsuario,
numTelFijo, estadoUsuario, idRolFK, idBarrioFK, direccionUsuario, token, imagenUsuario, created_at, updated_at)
values (NULL, 'Samanta', 'samanta85@misena.edu.co', 'camila85', 1, '1087345189', '3214458790', '4536781',1, 2, 3, 
'Carrera 29 # 8 - 19', '7WK5T79u5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyQ', NULL, NOW(), NOW());
Insert into USUARIO (idUsuario,  nombreUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, numDocUsuario, numTelUsuario,
numTelFijo, estadoUsuario, idRolFK, idBarrioFK, direccionUsuario, token, imagenUsuario, created_at, updated_at)
values (NULL, 'Sara', 'edier.hernandez@samtel.co', 'sara85', 2, '1025346789', '3213348800', '4565481',1, 1, 10, 
'Carrera 30 #20 - 19', '7WK5T79u5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyz', NULL, NOW(), NOW());

/* ========================== TABLA SECTOR_USUARIO ========================*/
INSERT INTO SECTOR_USUARIO(idSectorUsuario, idUsuarioFK, idSectorFK)
VALUES(NULL, 1,2);
INSERT INTO SECTOR_USUARIO(idSectorUsuario, idUsuarioFK, idSectorFK)
VALUES(NULL, 2,1);
INSERT INTO SECTOR_USUARIO(idSectorUsuario, idUsuarioFK, idSectorFK)
VALUES(NULL, 1,5);

/* ========================== TABLA CONTRATANTE ========================*/
Insert into CONTRATANTE (idContratante, descripcionContratante, idUsuarioFK) 
values (NULL ,'Soy ingeniero industrial con mi propia empresa, tengo 28 años y busco dar una oportunidad de trabajo a las personas', 1); 
Insert into  CONTRATANTE (idContratante, descripcionContratante, idUsuarioFK) 
values (NULL, 'Soy abogada penalista y busco empesar a crear mi propio bufete de abogados', 2);
Select * from CONTRATANTE;

/* ========================== TABLA VACANTE ========================*/
Insert into VACANTE (idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, 
tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, direccionVacante, estadoVacante, 
idContratanteFK, idSectorFK, created_at, updated_at)
values (NULL, 'Ingeniero Industrial Direccion Adminiistrativa', 5, 'Importante empresa busca ingeniero industrial o civil con especializacion e gerencia de proyectos, con minimo 2 años de experiencia en direccion administrativa', 'Ingeniero Industrial o Civil con especializacion en Gerencia de Proyectos', 'Contrato a Termino Indefinido', '6.500.000', '2021-04-25 12:30:38', '2021-05-12 12:00:00', 'Calle 85 #35-28', 1, 1, 1, NOW(), NOW());  
Insert into VACANTE (idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, 
tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, direccionVacante, estadoVacante, 
idContratanteFK, idSectorFK, created_at, updated_at)
 values (NULL,'Abogado/a Especialista', 3, 'Axa Colpatria requiere abogado especialista Objetivo del cargo: Soportar el canal de alianzas y masivos de la compañia en la estructura legal de los negocios con aliados', 'Profesional en derechos especialista en seguros', 'Contrato a termino fijo', '4.350.000', '2021-07-02 10:15:00', '2021-07-30 20:30:00', 'Diagonal 8b #10-03', 1, 2, 3, NOW(), NOW());
Insert into VACANTE (idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, 
tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, direccionVacante, estadoVacante, 
idContratanteFK, idSectorFK, created_at, updated_at)
 values (NULL,'Desarrollador de software web', 10, 'Sohe Innovation Software requiere un desarrollador web con experiencia en react, java', 'Profesional en derechos especialista en seguros', 'Contrato a termino fijo', '4.350.000', '2021-07-02 10:15:00', '2021-07-30 20:30:00', 'Calle 8c sur #8c-27', 1, 2, 10, NOW(), NOW());

Insert into VACANTE (idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, 
tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, direccionVacante, estadoVacante, 
idContratanteFK, idSectorFK, created_at, updated_at)
values (NULL,'Desarrollador Frontend Javascript', 3, 'Buscamos un ingeniero de software frontend apasionado por el diseño y desarrollo de soluciones de software en Javascript Idealmente, el candidato debería poder construir software de alta calidad, innovador y de pleno rendimiento de conformidad con los estándares de codificación y el diseño técnico.', 
'Profesional en derechos especialista en seguros', 'Contrato por obra', '4.350.000', '2021-07-02 10:15:00', '2021-07-30 20:30:00', 'Calle 8c sur #8c-27', 1, 2, 10, NOW(), NOW());
Insert into VACANTE (idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, 
tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, direccionVacante, estadoVacante, 
idContratanteFK, idSectorFK, created_at, updated_at)
values (NULL,'React Native Developer', 1, 'Toptal developers work with speed and efficiency to deliver the highest quality of work. We are looking for someone who is passionate about their client’s business, and ready to work on exciting projects with Fortune 500 companies and Silicon Valley startups, with great rates and zero hassles. If you are looking for a place to advance your career, enhance your skill set, and build connections around the globe, Toptal is right for you.', 
'We are looking for a React Native developer interested in building performant mobile apps on both the iOS and Android platforms. Your primary responsibilities might vary from: (1) build smooth UIs across both mobile platforms, (2) leverage native APIs for deep integrations with both platforms, (3) diagnose and fix bugs and performance bottlenecks for performance that feels native', 
'Contrato por obra', '6000000', '2021-11-02 10:15:00', '2021-12-03 20:30:00', 'Calle 8c sur #8c-27', 1, 2, 10, NOW(), NOW());
Insert into VACANTE (idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, 
tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, direccionVacante, estadoVacante, 
idContratanteFK, idSectorFK, created_at, updated_at)
values (NULL,'React Developer', 5, 'Toptal developers work with speed and efficiency to deliver the highest quality of work. We are looking for someone who is passionate about their client’s business, and ready to work on exciting projects with Fortune 500 companies and Silicon Valley startups, with great rates and zero hassles. If you are looking for a place to advance your career, enhance your skill set, and build connections around the globe, Toptal is right for you.', 
'We are looking for a great developer who is proficient with React.js. Your primary focus might vary from: (1) developing new user-facing features using React.js, (2) translating designs and wireframes into high-quality code, (3) building reusable components and front-end libraries for future use.', 
'Contrato por obra', '5000000', '2021-07-02 10:15:00', '2021-07-30 20:30:00', 'Calle 8c sur #8c-27', 1, 1, 10, NOW(), NOW());
Insert into VACANTE (idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, 
tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, direccionVacante, estadoVacante, 
idContratanteFK, idSectorFK, created_at, updated_at)
values (NULL,'Node.js Developer', 2, 'Toptal developers work with speed and efficiency to deliver the highest quality of work. We are looking for someone who is passionate about their client’s business, and ready to work on exciting projects with Fortune 500 companies and Silicon Valley startups.', 
'We are looking for a Node.js Developer responsible for managing the interchange of data between the server and the users. Your primary responsibilities might vary from: (1) integration of user-facing elements developed by front-end developers with server side logic, (2) writing reusable, testable, and efficient code', 
'Contrato por obra', '6000000', '2021-07-02 10:15:00', '2021-07-30 20:30:00', 'Calle 8c sur #8c-27', 1, 1, 10, NOW(), NOW());

/* ========================== TABLA REQUISITOS ========================*/
Insert into REQUISITOS (idRequisitos, nombreRequisitos) values (NULL, 'Requisitos para Ingeniero Industrial');  
Insert into REQUISITOS (idRequisitos, nombreRequisitos) values (NULL, 'Requisitos para Axa Colpatria'); 
Select * from REQUISITOS; 

/* ========================== TABLA DEBIL REQUISITOS_VACANTE ========================*/
Insert into REQUISITOS_VACANTE (idRequisitosVacante, idVacanteFK, idRequisitosFK, especficacionRequisitos)
 values (NULL, 1, 1, 'Para esta vacante es necesario ser mayor de 24 años, tener minimo 2 años de experiencia y tener una especializacion en gerencia de proyectos');  
Insert into  REQUISITOS_VACANTE (idRequisitosVacante, idVacanteFK, idRequisitosFK, especficacionRequisitos) 
values (NULL, 2, 2, 'Es necesario ser mayor de edad, tener un minimo de 5 años de experiencia y ser profesional en derecho especialistas en seguros');
select * from REQUISITOS_VACANTE;

/* ========================== TABLA ASPIRANTE ========================*/
Insert into ASPIRANTE (idAspirante, descripcionPersonalAspirante, idUsuarioFK, idEstadoLaboralAspiranteFK, created_at, updated_at) 
values (NULL, 'Tengo 23 con un titulo profesional en Ingenieria Industrial, con experiencia de 3 años', 2, 1, NOW(), NOW());  
Insert into ASPIRANTE (idAspirante, descripcionPersonalAspirante, idUsuarioFK, idEstadoLaboralAspiranteFK, created_at, updated_at) 
values (NULL,  'Tengo 20 años con un titulo profesional de Abogada especializada en derecho penal, sin experiencia', 1, 2, NOW(), NOW()); 
select * from ASPIRANTE; 

/* ========================== TABLA DEBIL ASPIRANTE_PUESTOINTERES ========================*/
Insert into ASPIRANTE_PUESTOINTERES (idAspirantePuestoInteres, idAspiranteFK, idPuestoInteresFK) 
values (NULL, 1, 1);  
Insert into ASPIRANTE_PUESTOINTERES (idAspirantePuestoInteres, idAspiranteFK, idPuestoInteresFK) 
values (NULL, 2, 2);
select * from ASPIRANTE_PUESTOINTERES;

/* ========================== TABLA ESTUDIO ========================*/
Insert into ESTUDIO (idEstudio, nombreInstitucion, tituloObtenido, idCiudadEstudio, idSectorFK, añoInicio, mesInicio, añoFin, mesFin, idAspiranteFK, idGradoFK) 
values (NULL, 'Sergio Arboleda', 'Ingeniera Industrial', 1, 1, 2012, 2, 2017, 12, 1, 1);  
Insert into ESTUDIO (idEstudio, nombreInstitucion, tituloObtenido, idCiudadEstudio, idSectorFK, añoInicio, mesInicio, añoFin, mesFin, idAspiranteFK, idGradoFK) 
values (NULL, 'Jorge Tadeo Lozano', 'Abogada', 1, 2, 2015, 1, 2020, 11, 2, 2);
Insert into ESTUDIO (idEstudio, nombreInstitucion, tituloObtenido, idCiudadEstudio, idSectorFK, añoInicio, mesInicio, añoFin, mesFin, idAspiranteFK, idGradoFK) 
values (NULL, '4545454', 'Abogada', 1, 2, 2015, 1, 2020, 11, 1, 2);
select * from ESTUDIO;

/* ========================== TABLA INFOLABORAL ========================*/
Insert into INFOLABORAL (idInfoLaboral, empresaLaboro, idSectorFK, idCiudadLaboroFK, idTipoExperienciaFK, nombrePuestoDesempeño, añoInicio, mesInicio, añoFin, mesFin, funcionDesempeño, idAspiranteFK) 
values (NULL, 'Constructora Onix', 1, 1, 1,'Gerencia de proyectos', 2017, 04, 2019, 12, 'planificar, captar, dinamizar y organizar talentos y administrar recursos', 1);  
Insert into INFOLABORAL (idInfoLaboral, empresaLaboro, idSectorFK, idCiudadLaboroFK, idTipoExperienciaFK, nombrePuestoDesempeño, añoInicio, mesInicio, añoFin, mesFin, funcionDesempeño, idAspiranteFK) 
values (NULL, 'C Legal Abogados', 2, 2, 2, 'Revisor Fiscal', 2015, 05, 2018, 05, 'Inspeccionar bienes de la sociedad y procurar su conservacion y seguridad', 2);
select * from INFOLABORAL;

/* ========================== TABLA IDIOMA ========================*/
Insert into IDIOMA (idIdioma, nombreIdioma) values (NULL, 'Inglés');  
Insert into IDIOMA (idIdioma, nombreIdioma) values (NULL, 'Chino mandarín');
Insert into IDIOMA (idIdioma, nombreIdioma) values (NULL, 'Hindi');  
Insert into IDIOMA (idIdioma, nombreIdioma) values (NULL, 'Español');
Insert into IDIOMA (idIdioma, nombreIdioma) values (NULL, 'Francés');  
Insert into IDIOMA (idIdioma, nombreIdioma) values (NULL, 'Árabe');
Insert into IDIOMA (idIdioma, nombreIdioma) values (NULL, 'Bengalí');  
Insert into IDIOMA (idIdioma, nombreIdioma) values (NULL, 'Ruso');
Insert into IDIOMA (idIdioma, nombreIdioma) values (NULL, 'Portugués');  
Insert into IDIOMA (idIdioma, nombreIdioma) values (NULL, 'Indonesio');
select * from IDIOMA;

/* ========================== TABLA DEBIL IDIOMA_ASPIRANTE ========================*/
Insert into IDIOMA_ASPIRANTE (idIdiomaAspirante, idAspiranteFK, idIdiomaFK, nivelIdioma) values (NULL, 1, 1, 3);  
Insert into IDIOMA_ASPIRANTE (idIdiomaAspirante, idAspiranteFK, idIdiomaFK, nivelIdioma) values (NULL, 2, 2, 4);
select * from IDIOMA_ASPIRANTE;

/* ========================== TABLA HABILIDAD ========================*/
Insert into HABILIDAD (idHabilidad, nombreHabilidad) values (NULL, 'Innovacion y Trabajar en equipo');  
Insert into HABILIDAD (idHabilidad, nombreHabilidad) values (NULL, 'Hablar mas de un idioma y Habilidades informaticas');
select * from HABILIDAD;

/* ========================== TABLA DEBIL HABILIDAD_ASPIRANTE ========================*/
INSERT INTO HABILIDAD_ASPIRANTE(idHabilidadAspirante, idAspiranteFK, idHabilidadFK, nivelHabilidad)
VALUES(NULL, 1, 2, 4);
INSERT INTO HABILIDAD_ASPIRANTE(idHabilidadAspirante, idAspiranteFK, idHabilidadFK, nivelHabilidad)
VALUES(NULL, 2, 1, 3);

/* ========================== TABLA DEBIL APLICACION_VACANTE ========================*/
Insert into APLICACION_VACANTE (idAplicacionVacante, idAspiranteFK, idVacanteFK, estadoAplicacionVacante) 
values (NULL, 1, 1, 1);  
Insert into APLICACION_VACANTE (idAplicacionVacante, idAspiranteFK, idVacanteFK, estadoAplicacionVacante) 
values (NULL, 2, 2 , 1);
select * from APLICACION_VACANTE;

/*========================= VISTAS ==============================*/
CREATE VIEW idiomasSeleccionadosView
AS
SELECT i.idIdioma, i.nombreIdioma, ia.idIdiomaAspirante, ia.nivelIdioma, ia.idAspiranteFK
FROM IDIOMA i INNER JOIN IDIOMA_ASPIRANTE ia
ON i.idIdioma = ia.idIdiomaFK;

CREATE VIEW habilidadesSeleccionadasView
AS
SELECT h.idHabilidad, h.nombrehabilidad, ha.idhabilidadAspirante, ha.idAspiranteFK, ha.nivelHabilidad
FROM HABILIDAD h INNER JOIN HABILIDAD_ASPIRANTE ha
ON h.idHabilidad = ha.idHabilidadFK;

CREATE VIEW estudiosAspiranteView
AS
SELECT idEstudio, nombreInstitucion, tituloObtenido, idCiudadEstudio, añoInicio, mesInicio, añoFin,
mesFin, idAspiranteFK, s.idSector, s.nombreSector, gs.idGrado, gs.nombreGrado
FROM ESTUDIO e INNER JOIN SECTOR s
ON s.idSector = e.idSectorFK INNER JOIN GRADOESTUDIO gs
ON gs.idGrado = e.idGradoFK;


CREATE VIEW experienciaAspiranteView
AS
SELECT il.idInfoLaboral, il.empresaLaboro, il.idCiudadLaboroFK, il.nombrePuestoDesempeño, il.añoInicio, il.mesInicio,
il.añoFin, il.mesFin, il.funcionDesempeño, idAspiranteFK, s.idSector, s.nombreSector, te.idTipoExperiencia, 
te.nombreTipoExperiencia
FROM INFOLABORAL il INNER JOIN SECTOR s
ON s.idSector = il.idSectorFK INNER JOIN TIPOEXPERIENCIA te
ON te.idTipoExperiencia = il.idTipoExperienciaFK;

SELECT * 
FROM experienciaAspiranteView 
WHERE idAspiranteFK = 1;
/*
La vista sirve para conocer el nombre de los  tipos de documentos de los usuarios registrados, el nombre del rol 
con el cual estan registrados,  y el barrio
*/
CREATE VIEW selectUser AS 
SELECT idUsuario, nombreUsuario, correoUsuario, passUsuario, nombreTipoDocumento, numDocUsuario, 
numTelUsuario, numTelFijo, estadoUsuario, nombreRol, nombreBarrio, direccionUsuario, token 
imagenUsuario 
FROM USUARIO AS u INNER JOIN TIPODOCUMENTO AS td
ON td.idTipoDocumento = u.idTipoDocumentoFK INNER JOIN ROL AS r
ON r.idRol = u.idRolFK INNER JOIN BARRIO AS b
ON b.idBarrio = u.idBarrioFK;

CREATE VIEW selectAspirante AS
SELECT idAspirante, descripcionPersonalAspirante, idUsuarioFK, idEstadoLaboralAspiranteFK, nombreEstado,
nombreUsuario, token, imagenUsuario
FROM ASPIRANTE AS a INNER JOIN USUARIO AS u 
ON u.idUsuario = a.idUsuarioFK INNER JOIN ESTADOLABORALASPIRANTE AS el
ON el.idEstadoLaboral = a.idEstadoLaboralAspiranteFK;

/*
Vista que sirve para conocer el nombre y los datos del puesto de interés que tiene asociado cada aspirante, 
además de conocer el nombre del mismo a través de una consulta a la tabla usuario.
*/
DROP VIEW IF EXISTS aspirantePuestoInteresView;
CREATE VIEW aspirantePuestoInteresView AS
SELECT idAspirantePuestoInteres, idAspiranteFK, idPuestoInteresFK, nombrePuesto, token, nombreUsuario
FROM PUESTOINTERES AS pi INNER JOIN ASPIRANTE_PUESTOINTERES api 
ON pi.idPuestoInteres = api.idPuestoInteresFK INNER JOIN ASPIRANTE AS a
ON a.idAspirante = api.idAspiranteFK INNER JOIN USUARIO  AS u
ON u.idusuario = a.idUsuarioFK;

DROP VIEW IF EXISTS vacanteView;
CREATE VIEW  vacanteView AS
SELECT v.idVacante, v.nombreVacante, v.cantidadVacante, v.direccionVacante, v.estadoVacante, v.idContratanteFK,
u.nombreUsuario, u.imagenUsuario 
FROM VACANTE AS v INNER JOIN CONTRATANTE AS c 
ON c.idContratante = v.idContratanteFK INNER JOIN USUARIO AS u
ON u.idUsuario = c.idUsuarioFK
ORDER BY v.idVacante DESC;

DROP VIEW IF EXISTS detailVacanteView;
CREATE VIEW  detailVacanteView AS
SELECT v.idVacante, v.nombreVacante, v.cantidadVacante, v.descripcionVacante, v.perfilAspirante, v.tipoContratoVacante, 
v.sueldoVacante, v.fechaHoraPublicacion, v.fechaHoraCierre, v.direccionVacante, v.estadoVacante, v.idContratanteFK, 
u.nombreUsuario, u.imagenUsuario, r.idRequisitos,  r.nombreRequisitos, rv.especficacionRequisitos,  s.nombreSector,
s.idSector, c.descripcionContratante, c.idContratante
FROM VACANTE AS v INNER JOIN CONTRATANTE AS c 
ON c.idContratante = v.idContratanteFK INNER JOIN USUARIO AS u
ON u.idUsuario = c.idUsuarioFK INNER JOIN REQUISITOS_VACANTE AS rv
ON v.idVacante = rv.idVacanteFK INNER JOIN REQUISITOS AS r
ON r.idRequisitos = rv.idRequisitosFK INNER JOIN SECTOR AS s
ON s.idSector = v.idSectorFK;


DROP VIEW IF EXISTS recomendacionVacanteSectorusuarioView;
CREATE VIEW  recomendacionVacanteSectorusuarioView AS
SELECT idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, tipoContratoVacante, 
sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, direccionVacante, estadoVacante, 
idSectorFK
FROM VACANTE 
WHERE idSectorFK = 10 ; 

DROP VIEW IF EXISTS sectorUsuarioView;
CREATE VIEW sectorUsuarioView AS
SELECT idSectorUsuario, idSectorFK, idUsuarioFK, nombreSector, nombreUsuario
FROM SECTOR AS s INNER JOIN SECTOR_USUARIO AS su
ON s.idSector = su.idSectorFK INNER JOIN USUARIO AS u 
ON u.idUsuario = su.idUsuarioFK;

SELECT * FROM sectorUsuarioView;


DROP VIEW IF EXISTS dataAspiranteApplicationVacancyView;
CREATE VIEW dataAspiranteApplicationVacancyView
AS
SELECT av.idAplicacionVacante, u.nombreUsuario, u.correoUsuario, u.numDocUsuario, u.numTelUsuario, 
u.imagenUsuario, a.descripcionPersonalAspirante, ela.nombreEstado
FROM USUARIO u INNER JOIN ASPIRANTE a
ON u.idUsuario = a.idUsuarioFK INNER JOIN ESTADOLABORALASPIRANTE ela
ON ela.idEstadoLaboral = a.idEstadoLaboralAspiranteFK INNER JOIN APLICACION_VACANTE av
ON a.idAspirante = av.idAspiranteFK;

-- SELECT * FROM dataAspiranteApplicationVacancyView WHERE idAplicacionVacante = 1;

DROP VIEW IF EXISTS dataVacanteApplicationVacancyView;
CREATE VIEW dataVacanteApplicationVacancyView
AS
SELECT av.idAplicacionVacante, av.idVacanteFK, av.idAspiranteFK, v.nombreVacante, v.descripcionVacante, 
v.perfilAspirante, v.tipoContratoVacante, v.sueldoVacante, v.fechaHoraPublicacion, v.direccionVacante, 
c.descripcionContratante, us.nombreUsuario, us.correoUsuario, us.numDocUsuario, us.numTelUsuario, 
us.imagenUsuario
FROM APLICACION_VACANTE av INNER JOIN VACANTE v
ON v.idVacante = av.idVacanteFK INNER JOIN CONTRATANTE c
ON c.idContratante = v.idContratanteFK INNER JOIN USUARIO us
ON us.idUsuario = c.idUsuarioFK;

-- SELECT * FROM dataVacanteApplicationVacancyView WHERE idAplicacionVacante = 1;

/*======================= PROCEDIMIENTOS ALMACENADOS LUISA		 ==============================*/
/*
En la plataforma de empleo PonteLab se quiere implementar la funcionalidad de registrar usuarios,
por ello que se necesita un procedimiento de almacenado que lleve a cabo dicha funcionalidad; es con el fin
de proveer una mayor seguridad al usuario.
*/

DELIMITER $$
CREATE PROCEDURE insertUser(
UidUsuario int,
UnombreUsuario varchar(100),
UcorreoUsuario varchar(30),
UpassUsuario varchar(16),
UidTipoDocumentoFK int,
UnumDocUsuario varchar(10),
UnumTelUsuario char(10),
UnumTelFijo varchar(7),
UestadoUsuario bool,
UidRolFK int,
UidBarrioFK int,
UdireccionUsuario varchar(30),
Utoken varchar(100),
UimagenUsuario varchar(70)
)
BEGIN
INSERT INTO USUARIO(idUsuario, nombreUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, numDocUsuario, numTelUsuario,
numTelFijo, estadoUsuario, idRolFK, idBarrioFK, direccionUsuario, token, imagenUsuario)
VALUES (UidUsuario, UnombreUsuario, UcorreoUsuario, UpassUsuario, UidTipoDocumentoFK, UnumDocUsuario,
UnumTelUsuario, UnumTelFijo, UestadoUsuario, UidRolFK, UidBarrioFK, UdireccionUsuario, Utoken,
UimagenUsuario);
END $$

CALL insertUser(NULL, 'Edier Heraldo', 'edierhernandezmo@gmail.c', '1234', 01, '1002623988', '3132069129', '1234567', 1, 01,07,
'Calle 6B', '7WK5Tu5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyQ', NULL);
SELECT * FROM USUARIO;

/*======================= PROCEDIMIENTOS ALMACENADOS  EDIER==============================*/

/*
Se desea implementar un busacador en la plataforma de PonteLab con el fin de poder mostrar al usuario todos
aquellas vacantes que cumplan o que concuerden con la palabra clave ingresada. Se va a implementar un 
procedimiento de almacenado el cual debe de recibir como parametro la palabra clave ingresada por el usuario
y de acuerdo a eso compararla con el nombre de la vacante, la descripcion, perfil del aspirante, tipo de contrato
para dicha vacante y la direccion; se debe de retornar todas las coincidencias.
*/

DROP PROCEDURE IF EXISTS SP_buscarVacantes;
DELIMITER $$
CREATE PROCEDURE SP_buscarVacantes
(
VBusqueda varchar(70)
)
BEGIN 
SELECT idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, 
tipoContratoVacante, sueldoVacante, direccionVacante, estadoVacante, 
fechaHoraPublicacion, fechaHoraCierre, v.idContratanteFK,
u.nombreUsuario, u.imagenUsuario 
FROM VACANTE AS v INNER JOIN CONTRATANTE AS c 
ON c.idContratante = v.idContratanteFK INNER JOIN USUARIO AS u
ON u.idUsuario = c.idUsuarioFK
WHERE nombreVacante LIKE CONCAT('%', VBusqueda, '%') OR descripcionVacante LIKE CONCAT('%', VBusqueda, '%')
OR perfilAspirante LIKE CONCAT('%', VBusqueda, '%') OR tipoContratoVacante LIKE CONCAT('%', VBusqueda, '%')
OR direccionVacante LIKE CONCAT('%', VBusqueda, '%');
END $$

CALL SP_buscarVacantes('Axa');

/*======================= FUNCIÓN BASE DE DATOS==============================*/
/*
Función que permita obtener el número de coincidencias de usuarios, de acuerdo a un parametro enviado pasado.
Se debe de pasar como argumento un nombre o letra(s) del nombre de un usuario y de acuerdo a ello
retornar el número de concidencias.
DROP FUNCTION IF EXISTS F_numeroUsuario;
DELIMITER //
CREATE FUNCTION F_numeroUsuario
(
letraNombre varchar(20)
)
RETURNS tinyint
BEGIN
	DECLARE numeroCoincidencias int;
    SELECT COUNT(*) INTO numeroCoincidencias
    FROM usuario
    WHERE nombreUsuario LIKE CONCAT('%', letraNombre, '%') ;
    RETURN numeroCoincidencias;
END //
-- usar la vista
SELECT  F_numeroUsuario('Edier') AS 'Número de coincidencias de nombres de usuarios encontradas para la palabra introducida';
/*======================= TRIGGER BASE DE DATOS==============================*/
/*
Se quiere implementar la funcionalidad del cambio de contraseña dentro del sistema de información de PonteLab; se
debe de tener en cuenta que se debe de crear una nueva tabla (log) con la información, dicha tabla debe contener la 
información de: nombre del usuario, código, tipo y número de documento, contraseña antigua y nueva. Dicha información
de esa nueva tabla va a servir para comprobar que las nuevas contraseñas del usuario no concuerden con ninguna de las
anteriores.
-- Creando la tabla de log
DROP TABLE IF EXISTS log;
CREATE TABLE log
(
idLogo int primary key auto_increment,
idUsuario int not null,
nombreUsuario varchar(70) not null,
tipoDocumentoUsuario int not null,
numeroDocumentoUsuario varchar(10) not null,
newPassword varchar(100) not null,
oldPassword varchar(100) not null,
created_at timestamp DEFAULT CURRENT_TIMESTAMP
)
-- Trigger
DROP TRIGGER IF EXISTS TR_changePasswordUser;
DELIMITER $$
CREATE TRIGGER TR_changePasswordUser
AFTER
UPDATE
ON USUARIO
FOR EACH ROW
BEGIN
	IF NEW.passUsuario IS NOT NULL 
		THEN	BEGIN
			INSERT INTO log(idUsuario, nombreUsuario, tipoDocumentoUsuario, numeroDocumentoUsuario, 
            newPassword, oldPassword)
           VALUES(NEW.idUsuario, NEW.nombreUsuario, NEW.idTipoDocumentoFK, NEW.numDocUsuario, 
           NEW.passUsuario, OLD.passUsuario);
		END;
	END IF;
END $$        
DELIMITER ;
 
-- Ejecutat el trigger
UPDATE USUARIO
SET passUsuario = '1055550018'
WHERE idUsuario = 4;

SELECT *
FROM USUARIO;

SELECT * 
FROM LOG;
 */
-- DESCRIBE VACANTE
/*
SELECT idUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, numDocUsuario, numTelUsuario,
numTelFijo, estadoUsuario, idRolFK, idBarrioFK, direccionUsuario, imagenUsuario
FROM USUARIO
WHERE  idUsuario LIKE'%id%' OR correoUsuario LIKE '%correo%' OR numDocUsuario'%numDocumento%'
OR numTelUsuario LIKE'%id%' , numTelFijo LIKE'%id%' ;
/*--------------------------CONSULTAR LAS VISTAS-----------------------------*/