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
correoUsuario varchar(30) not null unique,
passUsuario varchar(100) not null,
idTipoDocumentoFK int,
numDocUsuario varchar(10) not null unique,
numTelUsuario char(10) not null unique,
numTelFijo varchar(7) not null,
estadoUsuario bool NOT NULL,
idRolFK int,
idBarrioFK int,
direccionUsuario varchar(30) not null,
imagenUsuario varchar(100) 
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
estadoVacante bool,
idContratanteFK int
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
idUsuarioFK int,
idEstadoLaboralAspiranteFK int
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
idSectorEstudioFK int,
añoInicio year not null,
mesInicio varchar(2) not null,
añoFin year,
mesFin varchar(2),
idAspiranteFK int,
idGradoFK int,
idSectorFK int
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
nombreSector varchar(200) not null
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
nombreHabilidad varchar(70) not null,
nivelHabilidad char(1) not null,
idAspiranteFK int
);

DROP TABLE IF EXISTS ESTADOLABORALASPIRANTE;
CREATE TABLE ESTADOLABORALASPIRANTE
(
idEstadoLaboral int primary key auto_increment not null,
nombreEstado char(1) not null
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
ALTER TABLE CONTRATANTE ADD FOREIGN KEY (idUsuarioFK) REFERENCES USUARIO (idUsuario);
ALTER TABLE ASPIRANTE ADD FOREIGN KEY (idUsuarioFK) REFERENCES USUARIO (idUsuario);
ALTER TABLE VACANTE ADD FOREIGN KEY (idContratanteFK) REFERENCES CONTRATANTE (idContratante);
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
ALTER TABLE HABILIDAD ADD FOREIGN KEY (idAspiranteFK) REFERENCES ASPIRANTE (idAspirante);
ALTER TABLE ASPIRANTE ADD FOREIGN KEY (idEstadoLaboralAspiranteFK) REFERENCES ESTADOLABORALASPIRANTE (idEstadoLaboral);
ALTER TABLE APLICACION_VACANTE ADD FOREIGN KEY (idAspiranteFK) REFERENCES ASPIRANTE (idAspirante);
ALTER TABLE APLICACION_VACANTE ADD FOREIGN KEY (idVacanteFK) REFERENCES VACANTE (idVacante);

/*=================================== INSERTAR ====================================*/

INSERT INTO CIUDAD(idCiudad, nombreCiudad)VALUES(01, 'Bogotá D.C');
SELECT * FROM CIUDAD;

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
(NULL, 'Jiménez De Quesada', 1);
SELECT * FROM BARRIO;
-- DESCRIBE BARRIO;

/*======================== TIPOS DE DOCUMENTOS DE IDENTIDAD ========================
idTipoDocumento int primary key auto_increment not null,
nombreTipoDocumento char(2) not null
*/
INSERT INTO TIPODOCUMENTO(idTipoDocumento, nombreTipoDocumento)
VALUES(NULL, 'CC'),
(NULL, 'TI'),
(NULL, 'RC'),
(NULL, 'CE'),
(NULL, 'PE');
SELECT * FROM TIPODOCUMENTO;

INSERT INTO ROL(idRol, nombreRol)
VALUES(NULL, 'Contratante'),
(NULL, 'Aspirante');
SELECT * FROM ROL;

Insert into USUARIO (idUsuario, nombreUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, numDocUsuario, numTelUsuario,
numTelFijo, estadoUsuario, idRolFK, idBarrioFK, direccionUsuario, imagenUsuario)
values (NULL, 'Samanta', 'samanta85@misena.edu.co', 'camila85', 1, '1087345189', '3214458790', '4536781',1, 2, 3, 
'Carrera 29 # 8 - 19', NULL);
Insert into USUARIO (idUsuario,  nombreUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, numDocUsuario, numTelUsuario,
numTelFijo, estadoUsuario, idRolFK, idBarrioFK, direccionUsuario, imagenUsuario)
values (NULL, 'Sara', 'sara85@misena.edu.co', 'sara85', 2, '1025346789', '3213348800', '4565481',1, 1, 10, 
'Carrera 30 #20 - 19', NULL);
INSERT INTO USUARIO(idUsuario, nombreUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, numDocUsuario, numTelUsuario,
numTelFijo, estadoUsuario, idRolFK, idBarrioFK, direccionUsuario, imagenUsuario)
VALUES (NULL, 'Edier Hernández', 'ehernandez81@misena.edu.co', '123', 2, '1055550018', '3134387765', '1234567', 1, 2,2,
'Calle qc sur', NULL);
INSERT INTO USUARIO(idUsuario, nombreUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, numDocUsuario, numTelUsuario,
numTelFijo, estadoUsuario, idRolFK, idBarrioFK, direccionUsuario, imagenUsuario)
VALUES (NULL, 'Ximena',  'ximena85@gmail.com', '987', 2, '1055552025', '3138569871', '1234567', 1, 1,10,
'Calle 82 norte', NULL);

Insert into CONTRATANTE (idContratante, descripcionContratante, idUsuarioFK) 
values (NULL ,'Soy ingeniero industrial con mi propia empresa, tengo 28 años y busco dar una oportunidad de trabajo a las personas', 1); 
Insert into  CONTRATANTE (idContratante, descripcionContratante, idUsuarioFK) 
values (NULL, 'Soy abogada penalista y busco empesar a crear mi propio bufete de abogados', 2);
Select * from CONTRATANTE;

Insert into VACANTE (idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, direccionVacante, estadoVacante, idContratanteFK)
values (NULL, 'Ingeniero Industrial Direccion Adminiistrativa', 5, 'Importante empresa busca ingeniero industrial o civil con especializacion e gerencia de proyectos, con minimo 2 años de experiencia en direccion administrativa', 'Ingeniero Industrial o Civil con especializacion en Gerencia de Proyectos', 'Contrato a Termino Indefinido', '6.500.000', '2021-04-25 12:30:38', '2021-05-12 12:00:00', 'Calle 85 #35-28', 1, 1);  
Insert into VACANTE (idVacante, nombreVacante, cantidadVacante, descripcionVacante, perfilAspirante, tipoContratoVacante, sueldoVacante, fechaHoraPublicacion, fechaHoraCierre, direccionVacante, estadoVacante, idContratanteFK)
 values (NULL,'Abogado/a Especialista', 3, 'Axa Colpatria requiere abogado especialista Objetivo del cargo: Soportar el canal de alianzas y masivos de la compañia en la estructura legal de los negocios con aliados', 'Profesional en derechos especialista en seguros', 'Contrato a termino fijo', '4.350.000', '2021-07-02 10:15:00', '2021-07-30 20:30:00', 'Diagonal 8b #10-03', 1, 2);
 Select * from VACANTE;

Insert into REQUISITOS (idRequisitos, nombreRequisitos) values (NULL, 'Requisitos para Ingeniero Industrial');  
Insert into REQUISITOS (idRequisitos, nombreRequisitos) values (NULL, 'Requisitos para Axa Colpatria'); 
Select * from REQUISITOS; 

Insert into REQUISITOS_VACANTE (idRequisitosVacante, idVacanteFK, idRequisitosFK, especficacionRequisitos)
 values (NULL, 1, 1, 'Para esta vacante es necesario ser mayor de 24 años, tener minimo 2 años de experiencia y tener una especializacion en gerencia de proyectos');  
Insert into  REQUISITOS_VACANTE (idRequisitosVacante, idVacanteFK, idRequisitosFK, especficacionRequisitos) 
values (NULL, 2, 2, 'Es necesario ser mayor de edad, tener un minimo de 5 años de experiencia y ser profesional en derecho especialistas en seguros');
select * from REQUISITOS_VACANTE;

Insert into ESTADOLABORALASPIRANTE (idEstadoLaboral, nombreEstado) values (NULL, 1);  
Insert into ESTADOLABORALASPIRANTE (idEstadoLaboral, nombreEstado) values (NULL , 2);
select * from ESTADOLABORALASPIRANTE;
-- DESCRIBE ESTADOLABORALASPIRANTE;

Insert into ASPIRANTE (idAspirante, descripcionPersonalAspirante, idUsuarioFK, idEstadoLaboralAspiranteFK) 
values (NULL, 'Tengo 23 con un titulo profesional en Ingenieria Industrial, con experiencia de 3 años', 3, 1);  
Insert into ASPIRANTE (idAspirante, descripcionPersonalAspirante, idUsuarioFK, idEstadoLaboralAspiranteFK) 
values (NULL,  'Tengo 20 años con un titulo profesional de Abogada especializada en derecho penal, sin experiencia', 4, 2); 
select * from ASPIRANTE; 
-- SELECT * FROM estadolaboralaspirante;
-- SELECT * FROM USUARIO;

Insert into PUESTOINTERES (idPuestoInteres, nombrePuesto) values (NULL, 'Ingeniera Industrial');  
Insert into PUESTOINTERES (idPuestoInteres, nombrePuesto) values (NULL, 'Abogada Penalista');
select * from PUESTOINTERES;

Insert into ASPIRANTE_PUESTOINTERES (idAspirantePuestoInteres, idAspiranteFK, idPuestoInteresFK) 
values (NULL, 1, 1);  
Insert into ASPIRANTE_PUESTOINTERES (idAspirantePuestoInteres, idAspiranteFK, idPuestoInteresFK) 
values (NULL, 2, 2);
select * from ASPIRANTE_PUESTOINTERES;

Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'Profesional');  
Insert into GRADOESTUDIO (idGrado, nombreGrado) values (NULL, 'Tecnólogo');
Select * from GRADOESTUDIO;

Insert into SECTOR (idSector, nombreSector) values (NULL, 'Construccion');  
Insert into SECTOR (idSector, nombreSector) values (NULL, 'Finanzas, seguros y bienes raices');
Select * from SECTOR;

Insert into ESTUDIO (idEstudio, nombreInstitucion, tituloObtenido, idCiudadEstudio, idSectorEstudioFK, añoInicio, mesInicio, añoFin, mesFin, idAspiranteFK, idGradoFK, idSectorFK) 
values (NULL, 'Sergio Arboleda', 'Ingeniera Industrial', 1, 1, 2012, 2, 2017, 12, 1, 1, 1 );  
Insert into ESTUDIO (idEstudio, nombreInstitucion, tituloObtenido, idCiudadEstudio, idSectorEstudioFK, añoInicio, mesInicio, añoFin, mesFin, idAspiranteFK, idGradoFK, idSectorFK) 
values (NULL, 'Jorge Tadeo Lozano', 'Abogada', 1, 2, 2015, 1, 2020, 11, 2, 2, 2 );
select * from ESTUDIO;

Insert into TIPOEXPERIENCIA (idTipoExperiencia, nombreTipoExperiencia) values (NULL, 'Experiencia en Gerencia de proyectos');  
Insert into TIPOEXPERIENCIA (idTipoExperiencia, nombreTipoExperiencia) values (NULL, 'Experiencia siendo Revisor fiscal');
select * from TIPOEXPERIENCIA;

Insert into INFOLABORAL (idInfoLaboral, empresaLaboro, idSectorFK, idCiudadLaboroFK, idTipoExperienciaFK, nombrePuestoDesempeño, añoInicio, mesInicio, añoFin, mesFin, funcionDesempeño, idAspiranteFK) 
values (NULL, 'Constructora Onix', 1, 1, 1,'Gerencia de proyectos', 2017, 04, 2019, 12, 'planificar, captar, dinamizar y organizar talentos y administrar recursos', 1);  
Insert into INFOLABORAL (idInfoLaboral, empresaLaboro, idSectorFK, idCiudadLaboroFK, idTipoExperienciaFK, nombrePuestoDesempeño, añoInicio, mesInicio, añoFin, mesFin, funcionDesempeño, idAspiranteFK) 
values (NULL, 'C Legal Abogados', 2, 2, 2, 'Revisor Fiscal', 2015, 05, 2018, 05, 'Inspeccionar bienes de la sociedad y procurar su conservacion y seguridad', 2);
select * from INFOLABORAL;

Insert into IDIOMA (idIdioma, nombreIdioma) values (NULL, 'Ingles y Mandarin');  
Insert into IDIOMA (idIdioma, nombreIdioma) values (NULL, 'Ingles, Frances y Mandarin');
select * from IDIOMA;

Insert into IDIOMA_ASPIRANTE (idIdiomaAspirante, idAspiranteFK, idIdiomaFK, nivelIdioma) values (NULL, 1, 1, 3);  
Insert into IDIOMA_ASPIRANTE (idIdiomaAspirante, idAspiranteFK, idIdiomaFK, nivelIdioma) values (NULL, 2, 2, 4);
select * from IDIOMA_ASPIRANTE;

Insert into HABILIDAD (idHabilidad, nombreHabilidad, nivelHabilidad, idAspiranteFK) values (NULL, 'Innovacion y Trabajar en equipo', 4, 1);  
Insert into HABILIDAD (idHabilidad, nombreHabilidad, nivelHabilidad, idAspiranteFK) values (NULL, 'Hablar mas de un idioma y Habilidades informaticas', 3, 2);
select * from HABILIDAD;

Insert into APLICACION_VACANTE (idAplicacionVacante, idAspiranteFK, idVacanteFK, estadoAplicacionVacante) 
values (NULL, 1, 1, 1);  
Insert into APLICACION_VACANTE (idAplicacionVacante, idAspiranteFK, idVacanteFK, estadoAplicacionVacante) 
values (NULL, 2, 2 , 1);
select * from APLICACION_VACANTE;

/*========================= VISTAS ==============================*/

CREATE VIEW selectUser AS 
SELECT idUsuario, nombreUsuario, correoUsuario, passUsuario, nombreTipoDocumento, numDocUsuario, 
numTelUsuario, numTelFijo, estadoUsuario, nombreRol, nombreBarrio, direccionUsuario, 
imagenUsuario 
FROM USUARIO AS u INNER JOIN TIPODOCUMENTO AS td
ON td.idTipoDocumento = u.idTipoDocumentoFK INNER JOIN ROL AS r
ON r.idRol = u.idRolFK INNER JOIN BARRIO AS b
ON b.idBarrio = u.idBarrioFK;

/*======================= PROCEDIMIENTOS ALMACENADOS LUISA		 ==============================*/

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
UimagenUsuario varchar(70)
)
BEGIN
INSERT INTO USUARIO(idUsuario, nombreUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, numDocUsuario, numTelUsuario,
numTelFijo, estadoUsuario, idRolFK, idBarrioFK, direccionUsuario, imagenUsuario)
VALUES (UidUsuario, UnombreUsuario, UcorreoUsuario, UpassUsuario, UidTipoDocumentoFK, UnumDocUsuario,
UnumTelUsuario, UnumTelFijo, UestadoUsuario, UidRolFK, UidBarrioFK, UdireccionUsuario,
UimagenUsuario);
END $$

CALL insertUser(NULL, 'Edier Heraldo', 'edierhernandezmo@gmail.com', '1234', 01, '1002623988', '3132069129', '1234567', 1, 01,07,
'Calle 6B', NULL);
SELECT * FROM USUARIO;

/*======================= PROCEDIMIENTOS ALMACENADOS  EDIER==============================*/
/*
SELECT idUsuario, correoUsuario, passUsuario, idTipoDocumentoFK, numDocUsuario, numTelUsuario,
numTelFijo, estadoUsuario, idRolFK, idBarrioFK, direccionUsuario, imagenUsuario
FROM USUARIO
WHERE  idUsuario LIKE'%id%' OR correoUsuario LIKE '%correo%' OR numDocUsuario'%numDocumento%'
OR idRolFK'%ROL%';

/*--------------------------CONSULTAR LAS VISTAS-----------------------------*/

SELECT * FROM USUARIO;





