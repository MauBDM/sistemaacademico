DROP TABLE IF EXISTS asignatura; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `asignatura` (
  `idasignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idasignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO asignatura VALUES("1","Matemáticas","1");
INSERT INTO asignatura VALUES("2","Lenguaje","1");
INSERT INTO asignatura VALUES("3","Ciencias","1");
INSERT INTO asignatura VALUES("4","Ciencias Sociales","1");
INSERT INTO asignatura VALUES("5","Informática","1");
INSERT INTO asignatura VALUES("6","Educación en la fé","1");
INSERT INTO asignatura VALUES("7","Ingles Basico","2");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS ciclo; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `ciclo` (
  `idciclo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO ciclo VALUES("1","Ciclo I","1");
INSERT INTO ciclo VALUES("2","Ciclo II","2");
INSERT INTO ciclo VALUES("3","Ciclo III","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS docente; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `docente` (
  `iddocente` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(8) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dui` varchar(9) DEFAULT NULL,
  `nit` varchar(14) DEFAULT NULL,
  `idestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddocente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO docente VALUES("1","Karla","Montoya","Zacatecoluca","23345152","karlaM@gmail.com","051755462","08210505200015","1");
INSERT INTO docente VALUES("2","Sara","Reineros","Zacateculuca","23346558","saraR@gmail.com","123456789","08218978521023","2");
INSERT INTO docente VALUES("3","Angel","Hernandez","Zacatecoluca","23341221","angelH@gmail.com","112233445","12365489784512","2");
INSERT INTO docente VALUES("4","Sonia","Rodriguez","Zacatecoluca","23349871","soniaR@gmail.com","123456987","01235698748595","1");
INSERT INTO docente VALUES("5","Mirna Alejandra","Rivas Alvarenga","Zacatecoluca","78787878","mirnaR@gmail.com","051755463","08212506902010","1");
INSERT INTO docente VALUES("6","Henrito","Alvarado","Col Marranitos","23345804","henry@gmail.com","123456123","98765412312314","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS docente_asignatura; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `docente_asignatura` (
  `iddocenteAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `idgradoDocente` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL,
  `idasignatura` int(11) NOT NULL,
  PRIMARY KEY (`iddocenteAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

INSERT INTO docente_asignatura VALUES("1","4","1","1");
INSERT INTO docente_asignatura VALUES("2","4","1","2");
INSERT INTO docente_asignatura VALUES("3","3","2","3");
INSERT INTO docente_asignatura VALUES("4","3","2","4");
INSERT INTO docente_asignatura VALUES("5","1","3","5");
INSERT INTO docente_asignatura VALUES("6","1","3","6");
INSERT INTO docente_asignatura VALUES("7","2","1","1");
INSERT INTO docente_asignatura VALUES("8","2","1","2");
INSERT INTO docente_asignatura VALUES("9","2","2","3");
INSERT INTO docente_asignatura VALUES("10","2","3","4");
INSERT INTO docente_asignatura VALUES("11","2","4","5");
INSERT INTO docente_asignatura VALUES("12","2","5","6");
INSERT INTO docente_asignatura VALUES("13","1","1","1");
INSERT INTO docente_asignatura VALUES("14","1","2","2");
INSERT INTO docente_asignatura VALUES("15","1","4","3");
INSERT INTO docente_asignatura VALUES("16","1","5","4");
INSERT INTO docente_asignatura VALUES("17","3","6","5");
INSERT INTO docente_asignatura VALUES("18","3","1","2");
INSERT INTO docente_asignatura VALUES("19","3","4","6");
INSERT INTO docente_asignatura VALUES("20","3","3","1");
INSERT INTO docente_asignatura VALUES("21","4","4","3");
INSERT INTO docente_asignatura VALUES("22","4","6","4");
INSERT INTO docente_asignatura VALUES("23","4","2","5");
INSERT INTO docente_asignatura VALUES("24","4","5","6");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS docente_grado; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `docente_grado` (
  `iddocente_grado` int(11) NOT NULL AUTO_INCREMENT,
  `año` year(4) DEFAULT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  `guia` int(11) NOT NULL,
  `idgrado` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`iddocente_grado`,`guia`,`idgrado`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO docente_grado VALUES("1","2020","Matutino","Sección 11","5","2","1");
INSERT INTO docente_grado VALUES("2","2020","Matutino","Sección A10","2","3","1");
INSERT INTO docente_grado VALUES("3","2020","Vespertino","Sección Sis22","3","8","1");
INSERT INTO docente_grado VALUES("4","2020","Matutino","Unica","4","9","2");
INSERT INTO docente_grado VALUES("5","2019","Matutino","Sección Eng15","1","12","2");
INSERT INTO docente_grado VALUES("12","2020","Matutino","Integrada","5","6","1");
INSERT INTO docente_grado VALUES("13","2020","Matutino","Unica","6","5","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS estado; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO estado VALUES("1","Activo");
INSERT INTO estado VALUES("2","Inactivo");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS estudiante; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `estudiante` (
  `nie` varchar(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `nacimiento` date DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `telefono` int(8) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `idestado` int(11) DEFAULT NULL,
  `duiResponsable` int(9) NOT NULL,
  PRIMARY KEY (`nie`,`duiResponsable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO estudiante VALUES("111111","Angel Mario","Carbajal Ramirez","2000-05-01","2020-12-25","M","23345151","Colonia asael los vientos","1","121212");
INSERT INTO estudiante VALUES("222222","Rosa Alicia","Rivas Lopez","2000-01-06","2020-12-10","F","23346597","Colonia los claveles","1","212121");
INSERT INTO estudiante VALUES("333333","Oscar Alejandro","Garcia Alvarado","kook.png","2020-12-16","M","23349586","Colonia los marranitos","1","156895685");
INSERT INTO estudiante VALUES("444444","Oscar Alejandro","Garcia Alvarado","tutor.jpg","2020-12-03","M","23349586","Colonia los marranitos","1","343434343");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS grado; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `grado` (
  `idgrado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  `idciclo` int(11) NOT NULL,
  PRIMARY KEY (`idgrado`,`idestado`,`idciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO grado VALUES("2","Primero","1","1");
INSERT INTO grado VALUES("3","Segundo","1","1");
INSERT INTO grado VALUES("8","Tercero","1","1");
INSERT INTO grado VALUES("9","Cuarto","1","2");
INSERT INTO grado VALUES("11","Quinto","1","2");
INSERT INTO grado VALUES("12","Sexto","1","2");
INSERT INTO grado VALUES("13","Septimo","1","1");
INSERT INTO grado VALUES("14","Octavo","1","3");
INSERT INTO grado VALUES("15","Noveno","2","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS matricula; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `matricula` (
  `idmatricula` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idgradoDocente` int(11) NOT NULL,
  `nie` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idmatricula`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO matricula VALUES("1","2020-11-03","7","205896","1");
INSERT INTO matricula VALUES("3","2020-11-08","6","205896","1");
INSERT INTO matricula VALUES("4","2020-11-10","7","564587","1");
INSERT INTO matricula VALUES("38","2020-11-15","5","564587","1");
INSERT INTO matricula VALUES("39","2020-11-15","5","205896","1");
INSERT INTO matricula VALUES("40","2020-11-15","5","655886","1");
INSERT INTO matricula VALUES("41","2020-11-15","6","564587","1");
INSERT INTO matricula VALUES("42","2020-11-22","4","564587","1");
INSERT INTO matricula VALUES("43","2020-11-22","4","655886","1");
INSERT INTO matricula VALUES("44","2020-12-07","4","111111","1");
INSERT INTO matricula VALUES("45","2020-12-07","5","222222","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS notas; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `notas` (
  `idnotas` int(11) NOT NULL AUTO_INCREMENT,
  `primerTrimestre` decimal(10,2) NOT NULL,
  `segundoTrimestre` decimal(10,2) NOT NULL,
  `tercerTrimestre` decimal(10,2) NOT NULL,
  `notaFinal` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idasignatura` int(11) NOT NULL,
  `idmatricula` int(11) NOT NULL,
  PRIMARY KEY (`idnotas`,`idasignatura`,`idmatricula`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO notas VALUES("1","9.00","9.00","9.00","9.00","2020-12-03 17:42:13","4","3");
INSERT INTO notas VALUES("18","9.00","9.00","9.00","9.00","2020-12-06 22:03:23","2","1");
INSERT INTO notas VALUES("19","10.00","10.00","10.00","10.00","2020-12-07 00:00:00","3","0");
INSERT INTO notas VALUES("20","9.00","9.00","9.00","9.00","2020-12-07 00:00:00","3","0");
INSERT INTO notas VALUES("21","8.00","8.00","8.00","8.00","2020-12-07 00:00:00","3","0");
INSERT INTO notas VALUES("22","9.00","9.00","9.00","9.00","2020-12-06 23:08:36","3","44");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS responsable; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `responsable` (
  `dui` varchar(9) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `telefono` int(8) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`dui`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO responsable VALUES("121212","Angela Antonio","Rosales Perez","23345151","Colonia Palo Alto....");
INSERT INTO responsable VALUES("156895685","Sonia Arely","Garcia","23456895","Colonia los marranitos");
INSERT INTO responsable VALUES("212121","Andrea Mariana","Santos Rosales","23345151","Residencial Palo Alto");
INSERT INTO responsable VALUES("343434343","Sonia Soraya","Garcia","23456895","Colonia los marranitos");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS tipousuario; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `tipousuario` (
  `idtipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idtipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO tipousuario VALUES("1","Administrador","1");
INSERT INTO tipousuario VALUES("2","Docente","1");
INSERT INTO tipousuario VALUES("3","Estudiante","1");
INSERT INTO tipousuario VALUES("4","Secretaria","1");
INSERT INTO tipousuario VALUES("5","Directora","1");
INSERT INTO tipousuario VALUES("6","soporte","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS usuario; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `estado` varchar(11) NOT NULL,
  `ultimoIngreso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idtipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`,`estado`,`idtipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO usuario VALUES("1","051755462","202cb962ac59075b964b07152d234b70","Activo","2020-11-01 19:01:48","1");
INSERT INTO usuario VALUES("4","123456789","df6869f23329652ae501c695cf843b14","Activo","2020-11-01 19:01:48","2");
INSERT INTO usuario VALUES("5","123456987","202cb962ac59075b964b07152d234b70","Inactivo","2020-12-01 23:04:13","4");
INSERT INTO usuario VALUES("6","112233445","202cb962ac59075b964b07152d234b70","Activo","2020-11-01 19:01:48","3");
INSERT INTO usuario VALUES("7","051755463","386d932c6398ca3daa5148f2f4e9e5e2","Activo","2020-12-01 22:35:12","3");
INSERT INTO usuario VALUES("8","yazz","3bbd88bdb3bcfb8b4a6ade5e779044bc","Activo","2020-11-01 19:01:48","1");
INSERT INTO usuario VALUES("9","yazz","202cb962ac59075b964b07152d234b70","Activo","2020-11-01 19:01:48","1");
INSERT INTO usuario VALUES("10","andrea","2e97645c1f65187017bb2a107a86d46b","Activo","2020-12-01 23:05:07","1");
SET FOREIGN_KEY_CHECKS=1;

