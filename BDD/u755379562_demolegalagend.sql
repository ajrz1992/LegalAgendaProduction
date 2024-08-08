-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 08, 2024 at 03:30 PM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u755379562_demolegalagend`
--

-- --------------------------------------------------------

--
-- Table structure for table `buscador`
--

CREATE TABLE `buscador` (
  `buscador` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buscador`
--

INSERT INTO `buscador` (`buscador`) VALUES
('110');

-- --------------------------------------------------------

--
-- Table structure for table `camposnuevos_tareas`
--

CREATE TABLE `camposnuevos_tareas` (
  `id` int(11) NOT NULL,
  `campo` varchar(50) DEFAULT NULL,
  `tipo` text DEFAULT NULL,
  `id_tarea` int(11) DEFAULT NULL,
  `campobdd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `camposnuevos_tareas`
--

INSERT INTO `camposnuevos_tareas` (`id`, `campo`, `tipo`, `id_tarea`, `campobdd`) VALUES
(78, 'defensa', 'varchar(100)', 79, 'defensa'),
(81, 'Numero de Telefono', 'int', 81, 'numerodetelefono'),
(82, 'Total de dinero', 'int', 81, 'totaldinero'),
(83, 'jose eduardo', 'varchar(100)', 82, 'joseeduardo'),
(84, 'jose eduardo', 'varchar(100)', 82, 'joseeduardo'),
(85, 'jose eduardo', 'varchar(100)', 82, 'joseduardo'),
(86, 'hola', 'varchar(100)', 81, 'hola'),
(87, 'hola', 'varchar(100)', 81, 'hola1'),
(88, 'hola', 'varchar(100)', 81, 'hola12'),
(89, 'Nombre de XXXX', 'varchar(100)', 96, 'NOMBREDEXXXX'),
(90, 'Cantidad de Demanda', 'int', 96, 'CANTIDAD DE DEMANDA'),
(91, 'Cantidad de Demanda', 'int', 96, 'CANTIDADDEDEMANDA'),
(93, 'Cantidad de Documentos', 'int', 96, 'CANTIDADDOCUMENTOS'),
(94, 'Fecha de Juicio', 'date', 96, 'FECHADEJUICIO'),
(95, 'Fecha de Juicio', 'varchar(100)', 96, 'FECHADEJUICIO'),
(96, 'Fecha de Juicio', 'varchar(100)', 96, 'JUICIOFECHA'),
(97, 'Cantidad de Demanda', 'int', 98, 'CANTIDADDEDEMANDA'),
(98, 'Cantidad de Demanda', 'int', 98, 'CANTIDADDEDEMANDA'),
(100, 'Cantidad de Demanda', 'int', 98, 'CANTIDAD'),
(101, 'Fecha de Juicio', 'date', 98, 'FECHADEJUICIO'),
(102, 'Fecha de Juicio', 'date', 98, 'fecha'),
(103, 'Nombre de Demandado', 'int', 99, 'demandado'),
(104, 'Demandado', 'varchar(100)', 99, 'demandado'),
(105, 'Demandado', 'varchar(100)', 99, 'nombre'),
(106, 'Fecha de Juicio', 'date', 99, 'fecha'),
(107, 'Fecha de Juicio', 'date', 99, 'juicio'),
(111, 'observacion numero 1', 'varchar(100)', 81, 'observacionnumero1'),
(112, 'hola', 'varchar(100)', 81, 'hola_hola'),
(113, 'fernando', 'varchar(100)', 83, 'fernando_verpartidodefutbol'),
(115, 'Proceso', 'varchar(100)', 105, 'proceso_demandalaboral'),
(116, 'Cantidad de Demanda', 'varchar(100)', 112, 'cantidaddedemanda_demandadealimentos'),
(117, 'Cantidad de Demanda', 'varchar(100)', 113, 'cantidaddedemanda_demandacontraaduanas'),
(118, 'Fecha de Juicio', 'date', 112, 'fechadejuicio_demandadealimentos'),
(119, 'Cantidad de Demanda', 'varchar(100)', 114, 'cantidaddedemanda_certificaciondeexplotacion#3'),
(120, 'Cantidad de Demanda', 'varchar(100)', 114, 'cantidaddedemanda_certificaciondeexplotacion#3'),
(121, 'Cantidad de Demandas', 'varchar(100)', 114, 'cantidaddedemandas_certificaciondeexplotacion#3'),
(122, 'Numero de Telefono', 'varchar(100)', 114, 'numerodetelefono_certificaciondeexplotacion#3'),
(123, 'Numero de Telefono', 'varchar(100)', 114, 'numerodetelefono_certificaciondeexplotacion#3'),
(124, 'Nombre de la madre', 'varchar(100)', 114, 'nombredelamadre_certificaciondeexplotacion#3'),
(125, 'Nombre del perro', 'varchar(100)', 114, 'nombredelperro_certificaciondeexplotacion#3'),
(126, 'fecha de cena', 'date', 115, 'fechadecena_cenafamiliar'),
(127, 'fecha de cena', 'date', 116, 'fechadecena_crearwebapp'),
(128, 'fecha de cena', 'date', 117, 'fechadecena_123');

-- --------------------------------------------------------

--
-- Table structure for table `campos_tareas`
--

CREATE TABLE `campos_tareas` (
  `id` int(11) NOT NULL,
  `idtarea` int(11) DEFAULT NULL,
  `hola1` varchar(100) DEFAULT NULL,
  `departamento_prueba1` varchar(100) DEFAULT NULL,
  `fechahola` int(11) DEFAULT NULL,
  `fechahola222` date DEFAULT NULL,
  `legal_tarea1hola` varchar(100) DEFAULT NULL,
  `hola` varchar(100) DEFAULT NULL,
  `hola2` varchar(100) DEFAULT NULL,
  `fechaentrega` date DEFAULT NULL,
  `fechahoy` date DEFAULT NULL,
  `defensa` varchar(100) DEFAULT NULL,
  `numerodetelefono` int(11) DEFAULT NULL,
  `totaldinero` int(11) DEFAULT NULL,
  `joseeduardo` varchar(100) DEFAULT NULL,
  `joseduardo` varchar(100) DEFAULT NULL,
  `hola12` varchar(100) DEFAULT NULL,
  `NOMBREDEXXXX` varchar(100) DEFAULT NULL,
  `CANTIDADDEDEMANDA` int(11) DEFAULT NULL,
  `CANTIDADDOCUMENTOS` int(11) DEFAULT NULL,
  `FECHADEJUICIO` date DEFAULT NULL,
  `JUICIOFECHA` varchar(100) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `demandado` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `juicio` date DEFAULT NULL,
  `observacionnumero1` varchar(100) DEFAULT NULL,
  `hola_hola` varchar(100) DEFAULT NULL,
  `fernando_verpartidodefutbol` varchar(100) DEFAULT NULL,
  `proceso_demandalaboral` varchar(100) DEFAULT NULL,
  `cantidaddedemanda_demandadealimentos` varchar(100) DEFAULT NULL,
  `cantidaddedemanda_demandacontraaduanas` varchar(100) DEFAULT NULL,
  `fechadejuicio_demandadealimentos` date DEFAULT NULL,
  `fechadecena_cenafamiliar` date DEFAULT NULL,
  `fechadecena_crearwebapp` date DEFAULT NULL,
  `fechadecena_123` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campos_tareas`
--

INSERT INTO `campos_tareas` (`id`, `idtarea`, `hola1`, `departamento_prueba1`, `fechahola`, `fechahola222`, `legal_tarea1hola`, `hola`, `hola2`, `fechaentrega`, `fechahoy`, `defensa`, `numerodetelefono`, `totaldinero`, `joseeduardo`, `joseduardo`, `hola12`, `NOMBREDEXXXX`, `CANTIDADDEDEMANDA`, `CANTIDADDOCUMENTOS`, `FECHADEJUICIO`, `JUICIOFECHA`, `CANTIDAD`, `fecha`, `demandado`, `nombre`, `juicio`, `observacionnumero1`, `hola_hola`, `fernando_verpartidodefutbol`, `proceso_demandalaboral`, `cantidaddedemanda_demandadealimentos`, `cantidaddedemanda_demandacontraaduanas`, `fechadejuicio_demandadealimentos`, `fechadecena_cenafamiliar`, `fechadecena_crearwebapp`, `fechadecena_123`) VALUES
(26, 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 113, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 115, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 116, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 117, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carpetas`
--

CREATE TABLE `carpetas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `total_tareas` int(11) DEFAULT 0,
  `seleccionado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carpetas`
--

INSERT INTO `carpetas` (`id`, `nombre`, `empresa`, `id_usuario`, `total_tareas`, `seleccionado`) VALUES
(1, 'Seguro Social', 'Tecnologia Innovacion', 1, 0, 0),
(2, 'IHSS', 'Tecnologia Innovacion', 1, 0, 0),
(6, 'Prueba 200', 'Tecnologia Innovacion', 1, 0, 0),
(12, 'IHSS', 'empresa los globos', 11, 0, 0),
(13, 'IHTT', 'empresa los globos', 11, 0, 0),
(14, 'Secretaria de Trabajo y Seguridad Social', 'empresa los globos', 11, 0, 0),
(15, 'Secretaria de MiAmbiente', 'empresa los globos', 11, 0, 0),
(18, 'Juciciales', 'LA', 13, 0, 0),
(19, 'Civiles', 'LA', 13, 0, 0),
(21, 'hola', 'Tecnologia Innovacion', 1, 0, 0),
(23, 'Secretaria de Desarrollo Economico', 'empresa los globos', 11, 0, 0),
(24, 'Poder Judicial', 'empresa los globos', 11, 0, 0),
(25, 'Gbox cargo', 'empresa los globos', 12, 0, 0),
(26, 'Demanas Laborales', 'empresa los globos', 12, 0, 0),
(27, 'Demanda Incumplimiento de Contrato', 'empresa los globos', 12, 0, 0),
(28, 'Secretaria IHTT', 'empresa los globos', 12, 0, 0),
(29, 'Tareas de Hogar', 'empresa los globos', 12, 0, 1),
(30, '123', 'empresa los globos', 12, 0, 0),
(31, '3', 'empresa los globos', 12, 0, 0),
(32, '5', 'empresa los globos', 12, 0, 0),
(33, '6', 'empresa los globos', 12, 0, 0),
(34, '7', 'empresa los globos', 12, 0, 0),
(35, '8', 'empresa los globos', 12, 0, 0),
(36, '9', 'empresa los globos', 12, 0, 0),
(37, '10', 'empresa los globos', 12, 0, 0),
(38, '8', 'empresa los globos', 12, 0, 0),
(39, '98', 'empresa los globos', 12, 0, 0),
(40, '145', 'empresa los globos', 12, 0, 0),
(41, '48', 'empresa los globos', 12, 0, 0),
(42, 'cvgvjh', 'empresa los globos', 12, 0, 0),
(43, '789', 'empresa los globos', 12, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departamentos_lista`
--

CREATE TABLE `departamentos_lista` (
  `id` int(30) NOT NULL,
  `departamento` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departamentos_lista`
--

INSERT INTO `departamentos_lista` (`id`, `departamento`) VALUES
(4, 'Atlantida'),
(5, 'Choluteca'),
(6, 'Colon'),
(7, 'Comayagua'),
(8, 'Copan'),
(9, 'Cortes'),
(10, 'El Paraiso'),
(11, 'Francisco Morazan'),
(12, 'Gracias a Dios'),
(13, 'Intibuca'),
(14, 'Islas de la Bahia'),
(15, 'La Paz'),
(16, 'Lempira'),
(17, 'Ocotepeque'),
(18, 'Olancho'),
(19, 'Santa Barbara'),
(20, 'Valle'),
(21, 'Yoro');

-- --------------------------------------------------------

--
-- Table structure for table `department_list`
--

CREATE TABLE `department_list` (
  `id` int(30) NOT NULL,
  `department` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `empresa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_list`
--

INSERT INTO `department_list` (`id`, `department`, `description`, `empresa`) VALUES
(4, 'IT', 'Departamento de Tecnologías de Ia Información', 'Tecnologia Innovacion');

-- --------------------------------------------------------

--
-- Table structure for table `designation_list`
--

CREATE TABLE `designation_list` (
  `id` int(30) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `empresa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designation_list`
--

INSERT INTO `designation_list` (`id`, `designation`, `description`, `empresa`) VALUES
(7, 'Ingeniero de Infraestructura', 'Redes', 'Tecnologia Innovacion'),
(8, 'Gerente de Recursos Humanos', 'Entrevistas', 'Tecnologia Innovacion');

-- --------------------------------------------------------

--
-- Table structure for table `employee_list`
--

CREATE TABLE `employee_list` (
  `id` int(30) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `department_id` int(30) NOT NULL,
  `designation_id` int(30) NOT NULL,
  `evaluator_id` int(30) NOT NULL,
  `avatar` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `empresa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_list`
--

INSERT INTO `employee_list` (`id`, `employee_id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `department_id`, `designation_id`, `evaluator_id`, `avatar`, `date_created`, `empresa`) VALUES
(4, '', 'jose', '', 'perdomo', 'joseperdomo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, 8, 4, 'no-image-available.png', '2024-04-04 16:18:57', 'Tecnologia Innovacion'),
(5, '', 'Jose ', 'Carlos', 'Carrasco', 'josecarrasco@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 0, '1714361220_Screenshot 2024-04-21 184343.png', '2024-04-29 03:19:10', 'empresa los globos');

-- --------------------------------------------------------

--
-- Table structure for table `evaluator_list`
--

CREATE TABLE `evaluator_list` (
  `id` int(30) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `empresa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluator_list`
--

INSERT INTO `evaluator_list` (`id`, `employee_id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `avatar`, `date_created`, `empresa`) VALUES
(4, '', 'Pedro', '', 'Lopez', 'pedrolopez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'no-image-available.png', '2024-04-04 16:17:45', 'Tecnologia Innovacion');

-- --------------------------------------------------------

--
-- Table structure for table `municipios_lista`
--

CREATE TABLE `municipios_lista` (
  `id` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `municipio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `municipios_lista`
--

INSERT INTO `municipios_lista` (`id`, `id_departamento`, `municipio`) VALUES
(1, 4, 'La Ceiba'),
(2, 4, 'El Porvenir'),
(3, 4, 'Tela'),
(4, 4, 'Jutiapa'),
(5, 4, 'La Masica'),
(6, 4, 'San Francisco'),
(7, 4, 'Arizona'),
(8, 4, 'Esparta'),
(9, 5, 'Choluteca'),
(10, 5, 'Apacilagua'),
(11, 5, 'Concepcion de Maria'),
(12, 5, 'Duyure'),
(13, 5, 'El Corpos'),
(14, 5, 'El Triunfo'),
(15, 5, 'Marcovia'),
(16, 5, 'Morolica'),
(17, 5, 'Namasigue'),
(18, 5, 'Orocuina'),
(19, 5, 'Pespire'),
(20, 5, 'San Antonio de Flores'),
(21, 5, 'San Isidro'),
(22, 5, 'San Jose'),
(23, 5, 'San Marcos de Colon'),
(24, 5, 'Santa Ana de Yusguare'),
(25, 6, 'Trujillo'),
(26, 6, 'Balfate'),
(27, 6, 'Iriona'),
(28, 6, 'Limon'),
(29, 6, 'Saba'),
(30, 6, 'Santa Fe'),
(31, 6, 'Santa Rosa de Aguan'),
(32, 6, 'Sonaguera'),
(33, 6, 'Tocoa'),
(34, 6, 'Bonito Oriental'),
(35, 7, 'Comayagua'),
(36, 7, 'Ajuterique'),
(37, 7, 'El Rosario'),
(38, 7, 'Esquias'),
(39, 7, 'Humuya'),
(40, 7, 'La Libertad'),
(41, 7, 'Lamani'),
(42, 7, 'La Trinidad'),
(43, 7, 'Lejamani'),
(44, 7, 'Meambar'),
(45, 7, 'Minas de Oro'),
(46, 7, 'Ojos de Agua'),
(47, 7, 'San Jeronimo'),
(48, 7, 'San Jose de Comayagua'),
(49, 7, 'San Jose del Potrero'),
(50, 7, 'San Luis'),
(51, 7, 'San Sebastian'),
(52, 7, 'Siguatepeque'),
(53, 7, 'Villa de San Antonio'),
(54, 7, 'Las Lajas'),
(55, 7, 'Taulabe'),
(56, 8, 'Santa Rosa de Copan'),
(57, 8, 'Cabañas'),
(58, 8, 'Concepcion'),
(59, 8, 'Corquin'),
(60, 8, 'Copan Ruinas'),
(61, 8, 'Cucuyagua'),
(62, 8, 'Dolores'),
(63, 8, 'Dulce Nombre'),
(64, 8, 'El Paraiso'),
(65, 8, 'Florida'),
(66, 8, 'La Jigua'),
(67, 8, 'La Union'),
(68, 8, 'Veracruz'),
(69, 8, 'Nueva Arcadia'),
(70, 8, 'San Aguistin'),
(71, 8, 'San Antonio'),
(72, 8, 'San Jeronimo'),
(73, 8, 'San Jose'),
(74, 8, 'San Juan de Opoa'),
(75, 8, 'San Nicolas'),
(76, 8, 'San Pedro'),
(77, 8, 'Santa Rita'),
(78, 8, 'Trinidad de Copan'),
(79, 9, 'San Pedro Sula'),
(80, 9, 'Choloma'),
(81, 9, 'Omoa'),
(82, 9, 'Pimienta'),
(83, 9, 'Potrerillos'),
(84, 9, 'San Antonio de Cortes'),
(85, 9, 'San Francisco de Yojoa'),
(86, 9, 'San Manuel'),
(88, 9, 'Villanueva'),
(89, 9, 'La Lima'),
(90, 9, 'Puerto Cortes'),
(91, 10, 'Yuscaran'),
(92, 10, 'Alauca'),
(93, 10, 'Danli'),
(94, 10, 'El Paraiso'),
(95, 10, 'Guinope'),
(96, 10, 'Jacaleapa'),
(97, 10, 'Liure'),
(98, 10, 'Moroceli'),
(99, 10, 'Oropoli'),
(100, 10, 'Potrerillos'),
(101, 10, 'San Antonio de Flores'),
(102, 10, 'San Lucas'),
(103, 10, 'San Matias'),
(104, 10, 'Soledad'),
(105, 10, 'Teupasenti'),
(106, 10, 'Texiguat'),
(107, 10, 'Vado Ancho'),
(108, 10, 'Yauyupe'),
(109, 10, 'Trojes'),
(110, 11, 'Distrito Central (Tegucigalpa y Comayaguela)'),
(111, 11, 'Alubaren'),
(112, 11, 'Cedros'),
(113, 11, 'Curaren'),
(114, 11, 'El Porvenir'),
(115, 11, 'Guaimaca'),
(116, 11, 'La Libertad'),
(117, 11, 'La Venta'),
(118, 11, 'Lepaterique'),
(119, 11, 'Maraita'),
(120, 11, 'Marale'),
(121, 11, 'Nueva Armenia'),
(122, 11, 'Ojojona'),
(123, 11, 'Orica'),
(124, 11, 'Reitoca'),
(125, 11, 'Sabanagrande'),
(126, 11, 'San Antonio de Oriente'),
(127, 11, 'San Buenaventura'),
(128, 11, 'San Ignacio'),
(129, 11, 'San Juan de Flores'),
(130, 11, 'San Miguelito'),
(131, 11, 'Santa Ana'),
(132, 11, 'Santa Lucia'),
(133, 11, 'Talanga'),
(134, 11, 'Tatumbla'),
(135, 11, 'Valle de Angeles'),
(136, 11, 'Villa de San Francisco'),
(137, 11, 'Vallecillo'),
(138, 12, 'Puerto Lempira'),
(139, 12, 'Brus Laguna'),
(140, 12, 'Ahuas'),
(141, 12, 'Juan Francisco Bulnes'),
(142, 12, 'Villeda Morales'),
(143, 12, 'Wampusirpe'),
(144, 13, 'La Esperanza'),
(145, 13, 'Camasca'),
(146, 13, 'Colomoncagua'),
(147, 13, 'Concepcion'),
(148, 13, 'Dolores'),
(149, 13, 'Intibuca'),
(150, 13, 'Jesus de Otoro'),
(151, 13, 'Magdalena'),
(152, 13, 'Masaguara'),
(153, 13, 'San Antonio'),
(154, 13, 'San Isidro'),
(155, 13, 'San Juan'),
(156, 13, 'San Juan'),
(157, 13, 'San Marcos de la Sierra'),
(158, 13, 'San Miguelito'),
(159, 13, 'Santa Lucia'),
(160, 13, 'Yamaranguila'),
(161, 13, 'San Francisco de Opalaca'),
(162, 14, 'Roatan'),
(163, 14, 'Guanaja'),
(164, 14, 'Jose Santos Guardiola'),
(165, 14, 'Utila'),
(166, 15, 'La Paz'),
(167, 15, 'Aguanqueterique'),
(168, 15, 'Cabañas'),
(169, 15, 'Cane'),
(170, 15, 'Chinacla'),
(171, 15, 'Guajiquiro'),
(172, 15, 'Lauterique'),
(173, 15, 'Marcala'),
(174, 15, 'Mercedes de Oriente'),
(175, 15, 'Opatoro'),
(176, 15, 'San Antonio del Norte'),
(177, 15, 'San Jose'),
(178, 15, 'San Juan'),
(179, 15, 'San Pedro de Tutule'),
(180, 15, 'Santa Ana'),
(181, 15, 'Santa Elena'),
(182, 15, 'Santa Maria'),
(183, 15, 'Santiago de Puringla'),
(184, 15, 'Yarula'),
(185, 16, 'Gracias'),
(186, 16, 'Belen'),
(187, 16, 'Candelaria'),
(188, 16, 'Cololaca'),
(189, 16, 'Erandique'),
(190, 16, 'Gualcince'),
(191, 16, 'Guarita'),
(192, 16, 'La Campa'),
(193, 16, 'La Iguala'),
(194, 16, 'Las Flores'),
(195, 16, 'La Union'),
(196, 16, 'La Virtud'),
(197, 16, 'Lepaera'),
(198, 16, 'Mapulaca'),
(199, 16, 'Piraera'),
(200, 16, 'San Andres'),
(201, 16, 'San Francisco'),
(202, 16, 'San Juan Guarita'),
(203, 16, 'San Manuel Colohete'),
(204, 16, 'San Rafael'),
(205, 16, 'San Sebastian'),
(206, 16, 'Santa Cruz'),
(207, 16, 'Talgua'),
(208, 16, 'Tambla'),
(209, 16, 'Tomala'),
(210, 16, 'Valladolid'),
(211, 16, 'Virginia'),
(212, 16, 'San Marcos de Caiquin'),
(213, 17, 'Ocotepeque'),
(214, 17, 'Belen Gualcho'),
(215, 17, 'Concepcion'),
(216, 17, 'Dolores Merendon'),
(217, 17, 'Fraternidad'),
(218, 17, 'La Encarnacion'),
(219, 17, 'La Labor'),
(220, 17, 'Lucerna'),
(221, 17, 'Mercedes'),
(222, 17, 'San Fernando'),
(223, 17, 'San Francisco del Valle'),
(224, 17, 'San Jorge'),
(225, 17, 'San Marcos'),
(226, 17, 'Santa Fe'),
(227, 17, 'Sensenti'),
(228, 17, 'Sinuapa'),
(229, 18, 'Juticalpa'),
(230, 18, 'Campamento'),
(231, 18, 'Catacamas'),
(232, 18, 'Concordia'),
(233, 18, 'Dulce Nombre del Culmi'),
(234, 18, 'El Rosario'),
(235, 18, 'Esquipulas del Norte'),
(236, 18, 'Gualaco'),
(237, 18, 'Guarizama'),
(238, 18, 'Guata'),
(239, 18, 'Guayape'),
(240, 18, 'Jano'),
(241, 18, 'La Union'),
(242, 18, 'Mangulile'),
(243, 18, 'Manto'),
(244, 18, 'Salama'),
(245, 18, 'San Esteban'),
(246, 18, 'San Francisco de Becerra'),
(247, 18, 'San Francisco de la Paz'),
(248, 18, 'Santa Maria del Real'),
(249, 18, 'Silca'),
(250, 18, 'Yocon'),
(251, 18, 'Patuca'),
(252, 19, 'Santa Barbara'),
(253, 19, 'Arada'),
(254, 19, 'Atima'),
(255, 19, 'Azacualpa'),
(256, 19, 'Ceguaca'),
(257, 19, 'Concepcion del Norte'),
(258, 19, 'Concepcion del Sur'),
(259, 19, 'Chinda'),
(260, 19, 'El Nispero'),
(261, 19, 'Gualala'),
(262, 19, 'Ilama'),
(263, 19, 'Las Vegas'),
(264, 19, 'Macuelizo'),
(265, 19, 'Naranjito'),
(266, 19, 'Nuevo Celilac'),
(267, 19, 'Nueva Frontera'),
(268, 19, 'Petoa'),
(269, 19, 'Proteccion'),
(270, 19, 'Quimistan'),
(271, 19, 'San Francisco de Ojuera'),
(272, 19, 'San Jose de las Colinas'),
(273, 19, 'San Luis'),
(274, 19, 'San Marcos'),
(275, 19, 'San Nicolas'),
(276, 19, 'San Pedro Zacapa'),
(277, 19, 'San Vicente Centenario'),
(278, 19, 'Santa Rita'),
(279, 19, 'Trinidad'),
(280, 20, 'Nacaome'),
(281, 20, 'Alianza'),
(282, 20, 'Amapala'),
(283, 20, 'Aramecina'),
(284, 20, 'Caridad'),
(285, 20, 'Goascoran'),
(286, 20, 'Langue'),
(287, 20, 'San Francisco de Garay'),
(288, 20, 'San Lorenzo'),
(289, 21, 'Yoro'),
(290, 21, 'Arenal'),
(291, 21, 'El Negrito'),
(292, 21, 'El Progeso'),
(293, 21, 'Jocon'),
(294, 21, 'Morazan'),
(295, 21, 'Morazan'),
(296, 21, 'Yorito'),
(297, 21, 'Olanchito'),
(298, 21, 'Santa Rita'),
(299, 21, 'Sulaco'),
(300, 9, 'Santa Cruz de Yojoa'),
(301, 21, 'Victoria');

-- --------------------------------------------------------

--
-- Table structure for table `paises`
--

CREATE TABLE `paises` (
  `id` int(11) NOT NULL,
  `pais` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paises`
--

INSERT INTO `paises` (`id`, `pais`) VALUES
(1, 'Belice'),
(2, 'Costa Rica'),
(3, 'El Salvador'),
(4, 'Guatemala'),
(5, 'Honduras'),
(6, 'Nicaragua'),
(7, 'Panamá');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `task_id` int(30) NOT NULL,
  `evaluator_id` int(30) NOT NULL,
  `efficiency` int(11) NOT NULL,
  `timeliness` int(11) NOT NULL,
  `quality` int(11) NOT NULL,
  `accuracy` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Legal Agenda', 'nandohn2003@gmail.com', '+50487787554', 'Comayagua, Honduras', '');

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

CREATE TABLE `task_list` (
  `id` int(30) NOT NULL,
  `task` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `employee_id` int(30) NOT NULL,
  `due_date` date NOT NULL,
  `completed` date NOT NULL,
  `status` int(1) NOT NULL COMMENT '0=pending, 1=on-progress,3=Completed',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `empresa` varchar(50) DEFAULT NULL,
  `carpeta` varchar(80) DEFAULT NULL,
  `seleccionado` int(11) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `plazoLegal` int(11) DEFAULT NULL,
  `documentosPendientes` varchar(400) DEFAULT NULL,
  `documentosAdjuntados` varchar(400) DEFAULT NULL,
  `numeroExpediente` varchar(100) DEFAULT NULL,
  `nombreFuncionario` varchar(40) DEFAULT NULL,
  `lugarTarea` varchar(100) DEFAULT NULL,
  `prioridad` varchar(25) DEFAULT NULL,
  `defensa` varchar(100) DEFAULT NULL,
  `numerodetelefono` int(11) DEFAULT NULL,
  `totaldinero` int(11) DEFAULT NULL,
  `joseeduardo` varchar(100) DEFAULT NULL,
  `joseduardo` varchar(100) DEFAULT NULL,
  `hola` varchar(100) DEFAULT NULL,
  `hola1` varchar(100) DEFAULT NULL,
  `hola12` varchar(100) DEFAULT NULL,
  `NOMBREDEXXXX` varchar(100) DEFAULT NULL,
  `CANTIDADDEDEMANDA` int(11) DEFAULT NULL,
  `CANTIDADDOCUMENTOS` int(11) DEFAULT NULL,
  `FECHADEJUICIO` date DEFAULT NULL,
  `JUICIOFECHA` varchar(100) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `demandado` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `juicio` date DEFAULT NULL,
  `cliente` varchar(50) DEFAULT NULL,
  `observacionnumero1` varchar(100) DEFAULT NULL,
  `hola_hola` varchar(100) DEFAULT NULL,
  `fernando_verpartidodefutbol` varchar(100) DEFAULT NULL,
  `proceso_demandalaboral` varchar(100) DEFAULT NULL,
  `cantidaddedemanda_demandadealimentos` varchar(100) DEFAULT NULL,
  `cantidaddedemanda_demandacontraaduanas` varchar(100) DEFAULT NULL,
  `fechadejuicio_demandadealimentos` date DEFAULT NULL,
  `fechadecena_cenafamiliar` date DEFAULT NULL,
  `fechadecena_crearwebapp` date DEFAULT NULL,
  `fechadecena_123` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_list`
--

INSERT INTO `task_list` (`id`, `task`, `description`, `employee_id`, `due_date`, `completed`, `status`, `date_created`, `empresa`, `carpeta`, `seleccionado`, `avatar`, `plazoLegal`, `documentosPendientes`, `documentosAdjuntados`, `numeroExpediente`, `nombreFuncionario`, `lugarTarea`, `prioridad`, `defensa`, `numerodetelefono`, `totaldinero`, `joseeduardo`, `joseduardo`, `hola`, `hola1`, `hola12`, `NOMBREDEXXXX`, `CANTIDADDEDEMANDA`, `CANTIDADDOCUMENTOS`, `FECHADEJUICIO`, `JUICIOFECHA`, `CANTIDAD`, `fecha`, `demandado`, `nombre`, `juicio`, `cliente`, `observacionnumero1`, `hola_hola`, `fernando_verpartidodefutbol`, `proceso_demandalaboral`, `cantidaddedemanda_demandadealimentos`, `cantidaddedemanda_demandacontraaduanas`, `fechadejuicio_demandadealimentos`, `fechadecena_cenafamiliar`, `fechadecena_crearwebapp`, `fechadecena_123`) VALUES
(81, 'Hola', '', 8, '2024-04-30', '0000-00-00', 0, '2024-04-21 21:56:52', 'Tecnologia Innovacion', 'Seguro Social', 0, '1713747540_120761505_106179791256286_203674836572430295_n.png', 0, '', 'sadfasdf', 'asfdasdfasdf', 'asdfasdfsadf', 'sdfsdfsdf', 'Importante', NULL, 0, 0, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hola', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'asfasf', '', 4, '2024-04-20', '0000-00-00', 0, '2024-04-21 21:57:08', 'Tecnologia Innovacion', 'Prueba 200', 0, 'no-image-available.png', 33, '', '', '', '', '', '', NULL, NULL, NULL, 'holadsfkasdfklj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'Ver partido de futbol', '', 4, '2024-05-10', '0000-00-00', 0, '2024-04-22 00:42:08', 'Tecnologia Innovacion', 'Seguro Social', 0, 'no-image-available.png', 15, 'Tarjeta de identidad, hola1, hola, 2', '', '', '', '', 'Urgente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Susana', NULL, NULL, 'adsfasfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'josecarlo', '', 4, '2024-04-27', '0000-00-00', 0, '2024-04-27 14:16:16', 'empresa los globos', 'Josecarlo', 0, 'no-image-available.png', 20, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'adsfasdfasdf', '', 4, '2024-04-27', '0000-00-00', 0, '2024-04-27 15:41:55', 'Tecnologia Innovacion', 'Prueba 200', 0, 'no-image-available.png', 333, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'ihss', '&lt;span style=&quot;font-size: 12px;&quot;&gt;&lt;b&gt;&lt;i&gt;&lt;u&gt;asdfasdfsadf&lt;/u&gt;&lt;/i&gt;&lt;/b&gt;&lt;/span&gt;', 4, '2024-04-27', '0000-00-00', 0, '2024-04-27 15:43:14', 'Tecnologia Innovacion', 'IHSS', 0, 'no-image-available.png', 0, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'Demanda Judicial', 'Demanda Jucial&lt;br&gt;Cliente Elisa Ramos&lt;br&gt;Demandado Gustavo Cerati', 5, '2024-05-03', '0000-00-00', 0, '2024-04-29 04:00:01', 'LA', 'Juciciales', 0, 'no-image-available.png', 30, 'Tarjeta de Identidad, Partida de Nacimiento', '', '', '', '', 'Nivel 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2024-05-06', NULL, 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'Demanda Violacion', 'Demanda Violacion&lt;br&gt;Cliente Cesar Carrasco&lt;br&gt;Demandado Pancho Perez&lt;br&gt;Cantidad de Demanda 10,000&lt;br&gt;Fecha Juicio&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 10/05/2024&lt;br&gt;&lt;br&gt;', 5, '2024-05-10', '0000-00-00', 0, '2024-04-29 04:09:41', 'LA', 'Civiles', 0, 'no-image-available.png', 10, '', '', '', '', '', 'Nivel 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-17', 10000, 'Pancho Perez', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'tarea con', 'afasfas', 8, '2024-04-30', '0000-00-00', 0, '2024-04-30 16:05:10', 'Tecnologia Innovacion', 'IHSS', 0, 'no-image-available.png', 52, '', '', '', '', '', 'Medio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Juan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'hola2024', '', 8, '2024-04-30', '0000-00-00', 0, '2024-04-30 16:09:14', 'Tecnologia Innovacion', 'Seguro Social', 0, 'no-image-available.png', 33, '', '', '', '', '', 'Importante', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Juan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'otra', '', 4, '2024-04-30', '0000-00-00', 0, '2024-04-30 16:18:41', 'Tecnologia Innovacion', 'Seguro Social', 0, 'no-image-available.png', 3, '', '', '', '', '', 'Urgente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Juan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'asdfasdfsdaf', 'asdf', 4, '2024-05-06', '0000-00-00', 0, '2024-05-06 21:19:30', 'Tecnologia Innovacion', 'Seguro Social', 0, 'no-image-available.png', 3, '', '', '', '', '', 'Medio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adsfadsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'fasdf', '', 4, '2024-05-08', '0000-00-00', 0, '2024-05-08 21:52:45', 'Tecnologia Innovacion', 'Seguro Social', 0, 'no-image-available.png', 50, 'gola@gmail.com,fernando@fafasd.com', '', '', '', '', 'Importante', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asfasdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'asdfaasf', '', 4, '2024-05-08', '0000-00-00', 0, '2024-05-08 22:02:33', 'Tecnologia Innovacion', 'Seguro Social', 0, 'no-image-available.png', 333, 'fernando,pedro,identidad', '', '', '', '', 'Importante', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'Demanda Alimentos', 'Cliente Xenia Elisa presenta demanda conra pareja por xxx motivo', 5, '2024-07-31', '0000-00-00', 0, '2024-05-17 23:41:51', 'empresa los globos', NULL, 0, 'no-image-available.png', 0, 'dni', '', '', '', '', 'Urgente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Xenia Elisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'Demanda Alimentos', 'Cliente Xenia elisa presenta demanda laboral contra pareja', 5, '2024-07-31', '0000-00-00', 0, '2024-05-17 23:46:17', 'empresa los globos', NULL, 0, 'no-image-available.png', 0, 'dni', '', '', '', '', 'Urgente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Xenia Elisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'Demanda de Alimentos', '', 5, '2024-07-31', '0000-00-00', 0, '2024-05-17 23:48:45', 'empresa los globos', 'Poder Judicial', 0, 'no-image-available.png', 0, '', '', '', '', '', 'Medio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Juana Maria', NULL, NULL, NULL, NULL, '100000', NULL, '2024-08-15', NULL, NULL, NULL),
(113, 'Demanda contra Aduanas', 'Demanda de Geboxcargo contra aduanas&lt;br&gt;Demanda por un valor de 1 millon de L.&lt;br&gt;Comunicarse con el cliente tel. 321xxxxx', 5, '2024-06-29', '0000-00-00', 0, '2024-05-22 02:46:12', 'empresa los globos', 'Gbox cargo', 0, 'no-image-available.png', 20, 'dni,constancia laboral,calculo de prestaciones', '', '', '', '', 'Urgente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gebox Cargo', NULL, NULL, NULL, NULL, NULL, '1,000,000', NULL, NULL, NULL, NULL),
(114, 'Certificacion de Explotacion #3', 'Cliento Gebox solicita certificiacion de explotacion', 5, '2024-10-05', '0000-00-00', 0, '2024-06-27 03:03:13', 'empresa los globos', 'Secretaria IHTT', 0, 'no-image-available.png', 0, '', 'Tarjeta de Identidad', '1234', 'Pancho Perez', '', 'Urgente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gebox Cargo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'Cena Familiar', '', 5, '2024-08-29', '0000-00-00', 0, '2024-07-06 21:27:18', 'empresa los globos', 'Tareas de Hogar', 1, 'no-image-available.png', 0, '', '', '', '', '', 'Bajo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gebox Cargo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'Crear WebApp', '', 0, '2024-07-06', '0000-00-00', 0, '2024-07-06 21:32:17', 'empresa los globos', 'Tareas de Hogar', 1, 'no-image-available.png', 0, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, '123', '', 0, '2024-07-06', '0000-00-00', 0, '2024-07-06 21:33:15', 'empresa los globos', '123', 0, 'no-image-available.png', 0, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, '123', '', 0, '2024-07-06', '0000-00-00', 0, '2024-07-06 21:49:47', 'empresa los globos', '789', 0, 'no-image-available.png', 0, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, '123', '', 0, '2024-07-06', '0000-00-00', 0, '2024-07-06 21:50:43', 'empresa los globos', 'Tareas de Hogar', 1, 'no-image-available.png', 0, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, '4456', '', 0, '2024-07-06', '0000-00-00', 0, '2024-07-06 21:50:49', 'empresa los globos', 'Tareas de Hogar', 1, 'no-image-available.png', 0, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, '56', '', 0, '2024-07-06', '0000-00-00', 0, '2024-07-06 21:50:55', 'empresa los globos', 'Tareas de Hogar', 1, 'no-image-available.png', 0, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, '678', '', 0, '2024-07-06', '0000-00-00', 0, '2024-07-06 21:51:00', 'empresa los globos', 'Tareas de Hogar', 1, 'no-image-available.png', 0, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, '789', '', 0, '2024-07-06', '0000-00-00', 0, '2024-07-06 21:51:06', 'empresa los globos', 'Tareas de Hogar', 1, 'no-image-available.png', 0, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, '478', '', 0, '2024-07-06', '0000-00-00', 0, '2024-07-06 21:51:36', 'empresa los globos', 'Tareas de Hogar', 1, 'no-image-available.png', 0, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, '893', '', 0, '2024-07-06', '0000-00-00', 0, '2024-07-06 21:51:42', 'empresa los globos', 'Tareas de Hogar', 1, 'no-image-available.png', 0, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, '7895', '', 0, '2024-07-06', '0000-00-00', 0, '2024-07-06 21:55:47', 'empresa los globos', 'Tareas de Hogar', 1, 'no-image-available.png', 0, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_progress`
--

CREATE TABLE `task_progress` (
  `id` int(11) NOT NULL,
  `task_id` int(30) NOT NULL,
  `progress` text NOT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=no,1=Yes',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `empresa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `empresa` varchar(100) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `departamento` int(11) DEFAULT NULL,
  `municipio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `avatar`, `date_created`, `empresa`, `pais`, `departamento`, `municipio`) VALUES
(1, 'Fernando', 'Caceres', 'nandohn2003@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1713541860_120761505_106179791256286_203674836572430295_n.png', '2020-11-26 10:57:04', 'Tecnologia Innovacion', 'Honduras', 7, 35),
(7, 'Carlos', 'Cáceres', 'caceres2012262020@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1712163360_Screenshot 2024-02-12 130533.png', '2024-04-03 16:56:37', 'Constructora Caceres', 'Honduras', 7, 35),
(8, 'Pedro', 'Figueroa', 'pedro@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1712174160_121237777_114609690413296_8637187836037535768_n.jpeg', '2024-04-03 19:56:22', 'Tecnologia Innovacion', 'Honduras', 7, 35),
(10, 'Jose Fernando', 'Cáceres Cerrato', 'fcaceres@aarfid.com', 'e10adc3949ba59abbe56e057f20f883e', '1712175900_photo_2022-09-08_13-16-16.jpg', '2024-04-03 20:25:53', 'Tecnologia Innovacion', 'Honduras', 7, 35),
(11, 'Jose Eduardo', 'Escober', 'eduardoescober@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'no-image-available.png', '2024-04-08 02:27:29', 'empresa los globos', 'Honduras', 11, 127),
(12, 'Jose Carlos', 'Carrasco Raudales', 'josecarrasco@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1714361400_Screenshot 2024-04-21 184343.png', '2024-04-29 03:30:51', 'empresa los globos', 'Honduras', 11, 127),
(13, 'Jose', 'Carrasco', 'josecarrasco10@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1714362780_Screenshot 2024-04-21 184132.png', '2024-04-29 03:53:28', 'LA', 'Honduras', 11, 110),
(15, 'Aldo', 'AldoJosue', 'ajrz_1992@hotmail.com', '5dd8af91e54c86fa13bca7d29cc20b33', 'no-image-available.png', '2024-08-05 02:25:23', 'Capa7', 'Honduras', 11, 110),
(16, 'Aldo', 'Josue', 'ajrz1992@hotmail.com', '5dd8af91e54c86fa13bca7d29cc20b33', 'no-image-available.png', '2024-08-05 02:26:43', 'Capa7', 'Honduras', 11, 110),
(17, 'Aldo', 'Josue', 'ajrz1992@hotmail.es', '5dd8af91e54c86fa13bca7d29cc20b33', 'no-image-available.png', '2024-08-05 02:27:26', 'Capa7', 'Honduras', 11, 110),
(18, 'Aldo', 'Rodriguez', 'mrinfinito1@gmail.com', '5dd8af91e54c86fa13bca7d29cc20b33', 'no-image-available.png', '2024-08-05 02:29:11', 'Capa7', 'Honduras', 11, 110),
(19, 'Josue', 'Zuniga', 'josuezunigapro@gmail.com', '5583413443164b56500def9a533c7c70', 'no-image-available.png', '2024-08-05 02:31:10', 'Joseepro', 'Honduras', 11, 110);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camposnuevos_tareas`
--
ALTER TABLE `camposnuevos_tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campos_tareas`
--
ALTER TABLE `campos_tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carpetas`
--
ALTER TABLE `carpetas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_list`
--
ALTER TABLE `department_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation_list`
--
ALTER TABLE `designation_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_list`
--
ALTER TABLE `employee_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluator_list`
--
ALTER TABLE `evaluator_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_list`
--
ALTER TABLE `task_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_progress`
--
ALTER TABLE `task_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camposnuevos_tareas`
--
ALTER TABLE `camposnuevos_tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `campos_tareas`
--
ALTER TABLE `campos_tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `carpetas`
--
ALTER TABLE `carpetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `department_list`
--
ALTER TABLE `department_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designation_list`
--
ALTER TABLE `designation_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_list`
--
ALTER TABLE `employee_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `evaluator_list`
--
ALTER TABLE `evaluator_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task_list`
--
ALTER TABLE `task_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `task_progress`
--
ALTER TABLE `task_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
