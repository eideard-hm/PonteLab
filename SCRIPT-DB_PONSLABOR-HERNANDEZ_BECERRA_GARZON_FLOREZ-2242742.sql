/*
DROP DATABASE IF EXISTS id17916925_db_pontelab;
CREATE DATABASE id17916925_db_pontelab character set utf8mb4 collate utf8mb4_spanish_ci;
USE id17916925_db_pontelab;
*/
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

/* ========================== TABLA TIPODOCUMENTO ========================*/
INSERT INTO TIPODOCUMENTO(idTipoDocumento, nombreTipoDocumento)
VALUES(NULL, 'CC'),
(NULL, 'TI'),
(NULL, 'RC'),
(NULL, 'CE'),
(NULL, 'PE');

/* ========================== TABLA ROL ========================*/
INSERT INTO ROL(idRol, nombreRol)
VALUES(NULL, 'Contratante'),
(NULL, 'Aspirante');

/* ========================== TABLA ESTADO LABORAL ========================*/
Insert into ESTADOLABORALASPIRANTE (idEstadoLaboral, nombreEstado) 
values (NULL, 'Primer empleo');  
Insert into ESTADOLABORALASPIRANTE (idEstadoLaboral, nombreEstado) 
values (NULL , 'Desempleado');
Insert into ESTADOLABORALASPIRANTE (idEstadoLaboral, nombreEstado) 
values (NULL, 'Empleado');  
Insert into ESTADOLABORALASPIRANTE (idEstadoLaboral, nombreEstado) 
values (NULL , 'Independiente');

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

/* ========================== TABLA HABILIDAD ========================*/
Insert into HABILIDAD (idHabilidad, nombreHabilidad) values (NULL, 'Innovacion y Trabajar en equipo');  
Insert into HABILIDAD (idHabilidad, nombreHabilidad) values (NULL, 'Hablar mas de un idioma y Habilidades informaticas');

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
nombreUsuario, token, imagenUsuario, u.created_at
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

DROP VIEW IF EXISTS detailAspiranteView;
CREATE VIEW detailAspiranteView 
AS 
SELECT a.idAspirante, a.descripcionPersonalAspirante, a.created_at, ela.idEstadoLaboral, 
ela.nombreEstado, u.idUsuario, u.nombreUsuario, u.correoUsuario, u.numDocUsuario, 
u.numTelUsuario, u.numTelFijo, u.estadoUsuario, u.direccionUsuario, u.imagenUsuario, 
td.idTipoDocumento, td.nombreTipoDocumento, r.idRol, r.nombreRol, b.idBarrio,
b.nombreBarrio, pi.nombrePuesto, c.nombreCiudad
FROM ASPIRANTE a INNER JOIN ESTADOLABORALASPIRANTE ela ON
ela.idEstadoLaboral = a.idEstadoLaboralAspiranteFK
INNER JOIN USUARIO u ON
u.idUsuario = a.idUsuarioFK INNER JOIN TIPODOCUMENTO td
ON td.idTipoDocumento = u.idTipoDocumentoFK INNER JOIN ROL r
ON r.idRol = u.idRolFK INNER JOIN BARRIO b
ON b.idBarrio = u.idBarrioFK INNER JOIN ASPIRANTE_PUESTOINTERES api
ON a.idAspirante = api.idAspiranteFK INNER JOIN PUESTOINTERES pi
ON pi.idPuestoInteres = api.idPuestoInteresFK INNER JOIN CIUDAD c
ON c.idCiudad = b.idCiudadFK;

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
SELECT av.idAplicacionVacante, av.estadoAplicacionVacante, av.idVacanteFK, av.idAspiranteFK, v.nombreVacante, v.descripcionVacante, 
v.perfilAspirante, v.tipoContratoVacante, v.sueldoVacante, v.fechaHoraPublicacion, v.direccionVacante, 
c.descripcionContratante, us.nombreUsuario, us.correoUsuario, us.numDocUsuario, us.numTelUsuario, 
us.imagenUsuario
FROM APLICACION_VACANTE av INNER JOIN VACANTE v
ON v.idVacante = av.idVacanteFK INNER JOIN CONTRATANTE c
ON c.idContratante = v.idContratanteFK INNER JOIN USUARIO us
ON us.idUsuario = c.idUsuarioFK;