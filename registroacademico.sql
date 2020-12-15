-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2020 a las 22:35:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registroacademico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `idasignatura` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idasignatura`, `nombre`, `idestado`) VALUES
(1, 'Matemáticas', 1),
(2, 'Lenguaje', 1),
(3, 'Ciencias', 1),
(4, 'Ciencias Sociales', 1),
(5, 'Informática', 1),
(6, 'Educación en la fé', 1),
(7, 'Ingles Basico', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

CREATE TABLE `ciclo` (
  `idciclo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`idciclo`, `nombre`, `idestado`) VALUES
(1, 'Ciclo I', 1),
(2, 'Ciclo II', 2),
(3, 'Ciclo III', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `iddocente` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(8) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dui` varchar(9) DEFAULT NULL,
  `nit` varchar(14) DEFAULT NULL,
  `idestado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`iddocente`, `nombres`, `apellidos`, `direccion`, `telefono`, `email`, `dui`, `nit`, `idestado`) VALUES
(1, 'Karla', 'Montoya', 'Zacatecoluca', '23345152', 'karlaM@gmail.com', '051755462', '08210505200015', 1),
(2, 'Sara', 'Reineros', 'Zacateculuca', '23346558', 'saraR@gmail.com', '123456789', '08218978521023', 2),
(3, 'Angel', 'Hernandez', 'Zacatecoluca', '23341221', 'angelH@gmail.com', '112233445', '12365489784512', 2),
(4, 'Sonia', 'Rodriguez', 'Zacatecoluca', '23349871', 'soniaR@gmail.com', '123456987', '01235698748595', 1),
(5, 'Mirna Alejandra', 'Rivas Alvarenga', 'Zacatecoluca', '78787878', 'mirnaR@gmail.com', '051755463', '08212506902010', 1),
(6, 'Henrito', 'Alvarado', 'Col Marranitos', '23345804', 'henry@gmail.com', '123456123', '98765412312314', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_asignatura`
--

CREATE TABLE `docente_asignatura` (
  `iddocenteAsignatura` int(11) NOT NULL,
  `idgradoDocente` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL,
  `idasignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente_asignatura`
--

INSERT INTO `docente_asignatura` (`iddocenteAsignatura`, `idgradoDocente`, `iddocente`, `idasignatura`) VALUES
(1, 4, 1, 1),
(2, 4, 1, 2),
(3, 3, 2, 3),
(4, 3, 2, 4),
(5, 1, 3, 5),
(6, 1, 3, 6),
(7, 2, 1, 1),
(8, 2, 1, 2),
(9, 2, 2, 3),
(10, 2, 3, 4),
(11, 2, 4, 5),
(12, 2, 5, 6),
(13, 1, 1, 1),
(14, 1, 2, 2),
(15, 1, 4, 3),
(16, 1, 5, 4),
(17, 3, 6, 5),
(18, 3, 1, 2),
(19, 3, 4, 6),
(20, 3, 3, 1),
(21, 4, 4, 3),
(22, 4, 6, 4),
(23, 4, 2, 5),
(24, 4, 5, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_grado`
--

CREATE TABLE `docente_grado` (
  `iddocente_grado` int(11) NOT NULL,
  `año` year(4) DEFAULT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  `guia` int(11) NOT NULL,
  `idgrado` int(11) NOT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente_grado`
--

INSERT INTO `docente_grado` (`iddocente_grado`, `año`, `turno`, `tipo`, `guia`, `idgrado`, `idestado`) VALUES
(1, 2020, 'Matutino', 'Sección 11', 5, 2, 1),
(2, 2020, 'Matutino', 'Sección A10', 2, 3, 1),
(3, 2020, 'Vespertino', 'Sección Sis22', 3, 8, 1),
(4, 2020, 'Matutino', 'Unica', 4, 9, 2),
(5, 2019, 'Matutino', 'Sección Eng15', 1, 12, 2),
(12, 2020, 'Matutino', 'Integrada', 5, 6, 1),
(13, 2020, 'Matutino', 'Unica', 6, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

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
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`nie`, `nombres`, `apellidos`, `foto`, `nacimiento`, `genero`, `telefono`, `direccion`, `idestado`, `duiResponsable`, `idusuario`) VALUES
('111111', 'Angel Mario', 'Carbajal Ramirez', '2000-05-01', '2020-12-25', 'M', 23345151, 'Colonia asael los vientos', 1, 121212, 6),
('222222', 'Rosa Alicia', 'Rivas Lopez', '2000-01-06', '2020-12-10', 'F', 23346597, 'Colonia los claveles', 1, 212121, 7),
('333333', 'Oscar Alejandro', 'Garcia Alvarado', 'kook.png', '2020-12-16', 'M', 23349586, 'Colonia los marranitos', 1, 156895685, 12),
('444444', 'David Alberto', 'Alfaro Morales', '', '2020-12-14', 'M', 75757575, 'Colonia San Rafael', 1, 78945341, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `idgrado` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  `idciclo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idgrado`, `nombre`, `idestado`, `idciclo`) VALUES
(2, 'Primero', 1, 1),
(3, 'Segundo', 1, 1),
(8, 'Tercero', 1, 1),
(9, 'Cuarto', 1, 2),
(11, 'Quinto', 1, 2),
(12, 'Sexto', 1, 2),
(13, 'Septimo', 1, 1),
(14, 'Octavo', 1, 3),
(15, 'Noveno', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `idmatricula` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idgradoDocente` int(11) NOT NULL,
  `nie` int(11) NOT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`idmatricula`, `fecha`, `idgradoDocente`, `nie`, `idestado`) VALUES
(1, '2020-11-03', 7, 205896, 1),
(3, '2020-11-08', 6, 205896, 1),
(4, '2020-11-10', 7, 564587, 1),
(38, '2020-11-15', 5, 564587, 1),
(39, '2020-11-15', 5, 205896, 1),
(40, '2020-11-15', 5, 655886, 1),
(41, '2020-11-15', 6, 564587, 1),
(42, '2020-11-22', 4, 564587, 1),
(43, '2020-11-22', 4, 655886, 1),
(44, '2020-12-07', 4, 111111, 1),
(45, '2020-12-07', 5, 222222, 1),
(46, '2020-12-14', 7, 555555, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idnotas` int(11) NOT NULL,
  `nie` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `primerTrimestre` decimal(10,2) NOT NULL,
  `segundoTrimestre` decimal(10,2) NOT NULL,
  `tercerTrimestre` decimal(10,2) NOT NULL,
  `notaFinal` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idasignatura` int(11) NOT NULL,
  `idmatricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idnotas`, `nie`, `primerTrimestre`, `segundoTrimestre`, `tercerTrimestre`, `notaFinal`, `fecha`, `idasignatura`, `idmatricula`) VALUES
(1, '555555', '9.00', '9.00', '9.00', '9.00', '2020-12-10 02:04:04', 4, 3),
(18, '666666', '9.00', '9.00', '9.00', '9.00', '2020-12-10 02:04:14', 2, 1),
(19, '222222', '10.00', '10.00', '10.00', '10.00', '2020-12-10 02:05:17', 3, 0),
(20, '111111', '9.00', '9.00', '9.00', '9.00', '2020-12-10 04:51:16', 3, 0),
(21, '333333', '8.00', '8.00', '8.00', '8.00', '2020-12-10 04:51:23', 3, 0),
(22, '444444', '9.00', '9.00', '9.00', '9.00', '2020-12-10 04:51:29', 3, 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `dui` varchar(9) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `telefono` int(8) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`dui`, `nombres`, `apellidos`, `telefono`, `direccion`) VALUES
('121212', 'Angela Antonio', 'Rosales Perez', 23345151, 'Colonia Palo Alto....'),
('156895685', 'Sonia Arely', 'Garcia', 23456895, 'Colonia los marranitos'),
('212121', 'Andrea Mariana', 'Santos Rosales', 23345151, 'Residencial Palo Alto'),
('343434343', 'Sonia Soraya', 'Garcia', 23456895, 'Colonia los marranitos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipoUsuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipoUsuario`, `nombre`, `idestado`) VALUES
(1, 'Administrador', 1),
(2, 'Docente', 1),
(3, 'Estudiante', 1),
(4, 'Secretaria', 1),
(5, 'Directora', 1),
(6, 'soporte', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `estado` varchar(11) NOT NULL,
  `ultimoIngreso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idtipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `estado`, `ultimoIngreso`, `idtipoUsuario`) VALUES
(1, '051755462', '202cb962ac59075b964b07152d234b70', 'Activo', '2020-11-02 01:01:48', 1),
(4, '123456789', 'df6869f23329652ae501c695cf843b14', 'Activo', '2020-11-02 01:01:48', 2),
(5, '123456987', '202cb962ac59075b964b07152d234b70', 'Inactivo', '2020-12-02 05:04:13', 4),
(6, '112233445', '202cb962ac59075b964b07152d234b70', 'Activo', '2020-11-02 01:01:48', 3),
(7, '051755463', '386d932c6398ca3daa5148f2f4e9e5e2', 'Activo', '2020-12-02 04:35:12', 3),
(8, 'yazz', '3bbd88bdb3bcfb8b4a6ade5e779044bc', 'Activo', '2020-11-02 01:01:48', 1),
(9, 'yazz', '202cb962ac59075b964b07152d234b70', 'Activo', '2020-11-02 01:01:48', 1),
(10, 'andrea', '2e97645c1f65187017bb2a107a86d46b', 'Activo', '2020-12-02 05:05:07', 1),
(11, 'docente', 'ff98795bb460a3f21a42672830dd18e7', 'Activo', '2020-12-09 00:28:28', 2),
(12, 'solar', '77fe27d2b097b910023e3113ade82c22', 'Activo', '2020-12-09 00:29:50', 3),
(13, 'srantonia', 'ec9d10d5b5609bc015d77fc5491c293f', 'Activo', '2020-12-09 00:32:36', 5),
(14, 'soporte', '94068c92f4281d4b010d2fdeb95c2381', 'Activo', '2020-12-09 00:33:09', 6),
(15, '111111', '11f2935b7b15c0b49407c1c35c516ea6', 'Activo', '2020-12-10 02:06:52', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`idasignatura`);

--
-- Indices de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  ADD PRIMARY KEY (`idciclo`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`iddocente`);

--
-- Indices de la tabla `docente_asignatura`
--
ALTER TABLE `docente_asignatura`
  ADD PRIMARY KEY (`iddocenteAsignatura`);

--
-- Indices de la tabla `docente_grado`
--
ALTER TABLE `docente_grado`
  ADD PRIMARY KEY (`iddocente_grado`,`guia`,`idgrado`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`nie`,`duiResponsable`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idgrado`,`idestado`,`idciclo`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`idmatricula`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idnotas`,`idasignatura`,`idmatricula`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`dui`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`,`estado`,`idtipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `idasignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  MODIFY `idciclo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `iddocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `docente_asignatura`
--
ALTER TABLE `docente_asignatura`
  MODIFY `iddocenteAsignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `docente_grado`
--
ALTER TABLE `docente_grado`
  MODIFY `iddocente_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idgrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `idmatricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `idnotas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
