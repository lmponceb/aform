-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2014 at 08:23 PM
-- Server version: 5.5.35
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hawasol1_alianza`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividad_economica`
--

DROP TABLE IF EXISTS `actividad_economica`;
CREATE TABLE IF NOT EXISTS `actividad_economica` (
  `act_eco_id` int(10) NOT NULL AUTO_INCREMENT,
  `act_eco_tipo` char(1) NOT NULL,
  `act_eco_nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`act_eco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `actividad_economica`
--

INSERT INTO `actividad_economica` (`act_eco_id`, `act_eco_tipo`, `act_eco_nombre`) VALUES
(1, 'I', 'Negocio Propio'),
(2, 'I', 'Profesional Independiente'),
(3, 'E', 'Sueldo Fijo'),
(4, 'E', 'Sueldo y Comisiones'),
(5, 'N', 'Rentas Propias'),
(6, 'N', 'Jubilado'),
(7, 'N', 'Otros');

-- --------------------------------------------------------

--
-- Table structure for table `actividad_economica_por_persona`
--

DROP TABLE IF EXISTS `actividad_economica_por_persona`;
CREATE TABLE IF NOT EXISTS `actividad_economica_por_persona` (
  `act_eco_id` int(10) NOT NULL,
  `per_id` int(10) NOT NULL,
  PRIMARY KEY (`act_eco_id`,`per_id`),
  KEY `fk_per_act_eco_id2` (`per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actividad_economica_por_persona`
--

INSERT INTO `actividad_economica_por_persona` (`act_eco_id`, `per_id`) VALUES
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE IF NOT EXISTS `ciudad` (
  `ciu_id` int(10) NOT NULL AUTO_INCREMENT,
  `pro_id` int(10) DEFAULT NULL,
  `ciu_nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`ciu_id`),
  KEY `fk_ciu_pro_id` (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ciudad`
--

INSERT INTO `ciudad` (`ciu_id`, `pro_id`, `ciu_nombre`) VALUES
(1, 1, 'Quito');

-- --------------------------------------------------------

--
-- Table structure for table `informacion_financiera`
--

DROP TABLE IF EXISTS `informacion_financiera`;
CREATE TABLE IF NOT EXISTS `informacion_financiera` (
  `inf_fin_id` int(10) NOT NULL AUTO_INCREMENT,
  `inf_fin_nombre` varchar(50) NOT NULL,
  `inf_fin_tipo` char(1) NOT NULL,
  PRIMARY KEY (`inf_fin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `informacion_financiera`
--

INSERT INTO `informacion_financiera` (`inf_fin_id`, `inf_fin_nombre`, `inf_fin_tipo`) VALUES
(1, 'ARRIENDOS', 'I'),
(2, 'REMESAS', 'I'),
(3, 'SUELDO SOLICITANTE', 'I'),
(4, 'SUELDO CONYUGE', 'I'),
(5, 'PENSIONES', 'I'),
(6, 'INGRESOS NEGOCIO', 'I'),
(7, 'ALIMENTACION', 'E'),
(8, 'EDUCACION', 'E'),
(9, 'LUZ, AGUA, TELEFONO', 'E'),
(10, 'ARRIENDO', 'E'),
(11, 'OTROS GASTOS', 'E'),
(12, 'CUOTA MENSUAL DEUDAS', 'E'),
(13, 'COMBUSTIBLE', 'E'),
(14, 'TRANSPORTE', 'E'),
(15, 'VESTUARIO', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `informacion_financiera_por_persona`
--

DROP TABLE IF EXISTS `informacion_financiera_por_persona`;
CREATE TABLE IF NOT EXISTS `informacion_financiera_por_persona` (
  `per_id` int(10) NOT NULL,
  `inf_fin_id` int(10) NOT NULL,
  `inf_fin_valor` decimal(14,2) NOT NULL,
  PRIMARY KEY (`per_id`,`inf_fin_id`),
  KEY `fk_inf_fin_per_id2` (`inf_fin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `informacion_financiera_por_persona`
--

INSERT INTO `informacion_financiera_por_persona` (`per_id`, `inf_fin_id`, `inf_fin_valor`) VALUES
(1, 1, 200.00),
(1, 7, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE IF NOT EXISTS `pais` (
  `pai_id` int(11) NOT NULL AUTO_INCREMENT,
  `pai_nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`pai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pais`
--

INSERT INTO `pais` (`pai_id`, `pai_nombre`) VALUES
(1, 'Ecuador');

-- --------------------------------------------------------

--
-- Table structure for table `parroquia`
--

DROP TABLE IF EXISTS `parroquia`;
CREATE TABLE IF NOT EXISTS `parroquia` (
  `par_id` int(10) NOT NULL AUTO_INCREMENT,
  `ciu_id` int(10) DEFAULT NULL,
  `par_nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`par_id`),
  KEY `fk_par_ciu_id` (`ciu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `parroquia`
--

INSERT INTO `parroquia` (`par_id`, `ciu_id`, `par_nombre`) VALUES
(1, 1, 'Parroquia');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `per_id` int(10) NOT NULL AUTO_INCREMENT,
  `par_id` int(10) DEFAULT NULL,
  `pai_id` int(11) DEFAULT NULL,
  `per_documento` varchar(13) NOT NULL,
  `per_nombres` varchar(50) NOT NULL,
  `per_apellido_materno` varchar(25) NOT NULL,
  `per_apellido_paterno` varchar(25) NOT NULL,
  `per_nacimiento_lugar` varchar(50) NOT NULL,
  `per_nacimiento_fecha` date NOT NULL,
  `per_sexo` char(1) NOT NULL,
  `per_dependientes` int(11) NOT NULL,
  `per_estado_civil` char(1) NOT NULL,
  `per_conyuge_nombre` varchar(100) DEFAULT NULL,
  `per_conyuge_documento` varchar(13) DEFAULT NULL,
  `per_barrio` varchar(50) NOT NULL,
  `per_direccion` text NOT NULL,
  `per_tiempo_residencia` int(11) NOT NULL,
  `per_telefono` varchar(13) DEFAULT NULL,
  `per_celular` varchar(13) DEFAULT NULL,
  `per_email` varchar(150) DEFAULT NULL,
  `per_tipo_vivienda` char(1) NOT NULL,
  `per_numero_empleados` int(11) NOT NULL,
  `per_empresa_tipo` char(1) NOT NULL,
  `per_empresa_producto` varchar(100) NOT NULL,
  `per_empresa_inicio` date NOT NULL,
  `per_empresa_nombre` varchar(100) NOT NULL,
  `per_empresa_cargo` varchar(75) NOT NULL,
  `per_empresa_ruc` char(13) NOT NULL,
  `per_empresa_direccion` text NOT NULL,
  `per_empresa_referencia` text NOT NULL,
  `per_empresa_telefono` varchar(13) NOT NULL,
  `per_empresa_celular` varchar(13) NOT NULL,
  `per_empresa_email` varchar(150) NOT NULL,
  PRIMARY KEY (`per_id`),
  UNIQUE KEY `per_documento` (`per_documento`),
  KEY `fk_per_pai_id` (`pai_id`),
  KEY `fk_per_par_id` (`par_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`per_id`, `par_id`, `pai_id`, `per_documento`, `per_nombres`, `per_apellido_materno`, `per_apellido_paterno`, `per_nacimiento_lugar`, `per_nacimiento_fecha`, `per_sexo`, `per_dependientes`, `per_estado_civil`, `per_conyuge_nombre`, `per_conyuge_documento`, `per_barrio`, `per_direccion`, `per_tiempo_residencia`, `per_telefono`, `per_celular`, `per_email`, `per_tipo_vivienda`, `per_numero_empleados`, `per_empresa_tipo`, `per_empresa_producto`, `per_empresa_inicio`, `per_empresa_nombre`, `per_empresa_cargo`, `per_empresa_ruc`, `per_empresa_direccion`, `per_empresa_referencia`, `per_empresa_telefono`, `per_empresa_celular`, `per_empresa_email`) VALUES
(1, 1, 1, '0103097416', 'emanuel ricardo', 'vasconez', 'carrasco', 'quito', '2014-01-01', 'M', 0, 'S', '', '', 'el labrador', 'Estocolmo E2-134 y av. amazonas', 25, '2811136', '0995661449', 'emanuelcarrasco@gmail.com', 'V', 3, 'V', 'Desarrollo de software', '2010-01-01', 'Hawa Solutions', 'Presidente Ejecutivo', '1792308100001', 'El tiempo y el comercio', 'Sector Quicentro Shopping norte', '2469171', '0995661449', 'ercarrasco@hawasolutions.com');

-- --------------------------------------------------------

--
-- Table structure for table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE IF NOT EXISTS `provincia` (
  `pro_id` int(10) NOT NULL AUTO_INCREMENT,
  `pro_nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `provincia`
--

INSERT INTO `provincia` (`pro_id`, `pro_nombre`) VALUES
(1, 'Pichincha');

-- --------------------------------------------------------

--
-- Table structure for table `referencias_bancarias`
--

DROP TABLE IF EXISTS `referencias_bancarias`;
CREATE TABLE IF NOT EXISTS `referencias_bancarias` (
  `ref_ban_id` int(10) NOT NULL AUTO_INCREMENT,
  `per_id` int(10) DEFAULT NULL,
  `ref_ban_banco` varchar(200) NOT NULL,
  `ref_ban_numero_cuenta` varchar(20) NOT NULL,
  `ref_ban_tipo_cuenta` char(1) NOT NULL,
  PRIMARY KEY (`ref_ban_id`),
  KEY `fk_ref_ban_per_id` (`per_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `referencias_bancarias`
--

INSERT INTO `referencias_bancarias` (`ref_ban_id`, `per_id`, `ref_ban_banco`, `ref_ban_numero_cuenta`, `ref_ban_tipo_cuenta`) VALUES
(1, 1, 'pichincha', '1038228459', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `referencias_personales`
--

DROP TABLE IF EXISTS `referencias_personales`;
CREATE TABLE IF NOT EXISTS `referencias_personales` (
  `ref_per_id` int(10) NOT NULL AUTO_INCREMENT,
  `per_id` int(10) DEFAULT NULL,
  `ref_per_nombres` varchar(100) NOT NULL,
  `ref_per_direccion` text NOT NULL,
  `ref_per_telefono` varchar(13) NOT NULL,
  PRIMARY KEY (`ref_per_id`),
  KEY `fk_ref_per_per_id` (`per_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `referencias_personales`
--

INSERT INTO `referencias_personales` (`ref_per_id`, `per_id`, `ref_per_nombres`, `ref_per_direccion`, `ref_per_telefono`) VALUES
(1, 1, 'dsfadsfa', 'dfafadsfadsf', '1324234');

-- --------------------------------------------------------

--
-- Table structure for table `sc_log`
--

DROP TABLE IF EXISTS `sc_log`;
CREATE TABLE IF NOT EXISTS `sc_log` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `inserted_date` datetime DEFAULT NULL,
  `username` varchar(90) NOT NULL,
  `application` varchar(200) NOT NULL,
  `creator` varchar(30) NOT NULL,
  `ip_user` varchar(32) NOT NULL,
  `action` varchar(30) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=819 ;

--
-- Dumping data for table `sc_log`
--

INSERT INTO `sc_log` (`id`, `inserted_date`, `username`, `application`, `creator`, `ip_user`, `action`, `description`) VALUES
(1, '2014-01-21 14:53:44', '', 'app_Login', 'Scriptcase', '127.0.0.1', 'access', ''),
(2, '2014-01-21 14:53:52', 'admin', 'menu', 'Scriptcase', '127.0.0.1', 'access', ''),
(3, '2014-01-21 14:54:13', '', 'app_Login', 'Scriptcase', '127.0.0.1', 'access', ''),
(4, '2014-01-21 14:55:11', '', 'menu', 'Scriptcase', '127.0.0.1', 'access', ''),
(5, '2014-01-21 14:55:16', '', 'menu', 'Scriptcase', '127.0.0.1', 'access', ''),
(6, '2014-01-21 17:27:15', '', 'menu', 'Scriptcase', '127.0.0.1', 'access', ''),
(7, '2014-01-21 17:27:56', '', 'grid_pais', 'Scriptcase', '127.0.0.1', 'access', ''),
(8, '2014-01-21 17:27:58', '', 'grid_provincia', 'Scriptcase', '127.0.0.1', 'access', ''),
(9, '2014-01-21 17:27:59', '', 'grid_ciudad', 'Scriptcase', '127.0.0.1', 'access', ''),
(10, '2014-01-21 17:28:01', '', 'grid_parroquia', 'Scriptcase', '127.0.0.1', 'access', ''),
(11, '2014-01-21 17:28:03', '', 'grid_actividad_economica', 'Scriptcase', '127.0.0.1', 'access', ''),
(12, '2014-01-21 17:28:04', '', 'grid_informacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(13, '2014-01-21 17:28:06', '', 'grid_situacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(14, '2014-01-21 17:28:07', '', 'grid_situacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(15, '2014-01-21 17:28:12', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(16, '2014-01-21 17:28:56', '', 'menu', 'Scriptcase', '127.0.0.1', 'access', ''),
(17, '2014-01-21 17:28:58', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(18, '2014-01-21 17:29:00', '', 'grid_situacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(19, '2014-01-21 17:40:50', '', 'menu', 'Scriptcase', '127.0.0.1', 'access', ''),
(20, '2014-01-21 17:40:56', '', 'grid_pais', 'Scriptcase', '127.0.0.1', 'access', ''),
(21, '2014-01-21 17:40:57', '', 'grid_provincia', 'Scriptcase', '127.0.0.1', 'access', ''),
(22, '2014-01-21 17:40:58', '', 'grid_ciudad', 'Scriptcase', '127.0.0.1', 'access', ''),
(23, '2014-01-21 17:44:53', '', 'grid_actividad_economica', 'Scriptcase', '127.0.0.1', 'access', ''),
(24, '2014-01-21 17:47:00', '', 'grid_actividad_economica', 'Scriptcase', '127.0.0.1', 'access', ''),
(25, '2014-01-21 17:47:50', '', 'grid_actividad_economica', 'Scriptcase', '127.0.0.1', 'access', ''),
(26, '2014-01-21 17:48:41', '', 'grid_actividad_economica', 'Scriptcase', '127.0.0.1', 'access', ''),
(27, '2014-01-21 17:53:24', '', 'grid_ciudad', 'Scriptcase', '127.0.0.1', 'access', ''),
(28, '2014-01-21 17:57:39', '', 'grid_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(29, '2014-01-21 17:59:53', '', 'grid_ciudad', 'Scriptcase', '127.0.0.1', 'access', ''),
(30, '2014-01-21 18:00:10', '', 'grid_ciudad', 'Scriptcase', '127.0.0.1', 'access', ''),
(31, '2014-01-21 18:03:33', '', 'grid_informacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(32, '2014-01-21 18:03:53', '', 'grid_informacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(33, '2014-01-21 18:06:12', '', 'grid_pais', 'Scriptcase', '127.0.0.1', 'access', ''),
(34, '2014-01-21 18:08:19', '', 'grid_parroquia', 'Scriptcase', '127.0.0.1', 'access', ''),
(35, '2014-01-21 18:11:12', '', 'grid_provincia', 'Scriptcase', '127.0.0.1', 'access', ''),
(36, '2014-01-21 18:22:55', '', 'grid_situacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(37, '2014-01-21 18:36:26', '', 'form_actividad_economica', 'Scriptcase', '127.0.0.1', 'access', ''),
(38, '2014-01-21 18:36:48', '', 'form_actividad_economica', 'Scriptcase', '127.0.0.1', 'access', ''),
(39, '2014-01-21 18:47:53', '', 'form_ciudad', 'Scriptcase', '127.0.0.1', 'access', ''),
(40, '2014-01-21 18:48:33', '', 'form_ciudad', 'Scriptcase', '127.0.0.1', 'access', ''),
(41, '2014-01-21 18:49:08', '', 'form_ciudad', 'Scriptcase', '127.0.0.1', 'access', ''),
(42, '2014-01-21 19:02:38', '', 'form_informacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(43, '2014-01-21 19:03:24', '', 'form_informacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(44, '2014-01-21 19:05:06', '', 'form_pais', 'Scriptcase', '127.0.0.1', 'access', ''),
(45, '2014-01-21 19:05:29', '', 'form_pais', 'Scriptcase', '127.0.0.1', 'access', ''),
(46, '2014-01-21 19:08:24', '', 'form_parroquia', 'Scriptcase', '127.0.0.1', 'access', ''),
(47, '2014-01-21 19:08:48', '', 'form_parroquia', 'Scriptcase', '127.0.0.1', 'access', ''),
(48, '2014-01-21 19:19:33', '', 'form_provincia', 'Scriptcase', '127.0.0.1', 'access', ''),
(49, '2014-01-21 19:25:32', '', 'form_situacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(50, '2014-01-21 19:31:14', '', 'app_Login', 'Scriptcase', '127.0.0.1', 'access', ''),
(51, '2014-01-21 19:31:22', 'admin', 'menu', 'Scriptcase', '127.0.0.1', 'access', ''),
(52, '2014-01-21 19:31:33', 'admin', 'grid_pais', 'Scriptcase', '127.0.0.1', 'access', ''),
(53, '2014-01-21 19:31:35', 'admin', 'grid_provincia', 'Scriptcase', '127.0.0.1', 'access', ''),
(54, '2014-01-21 19:31:36', 'admin', 'grid_ciudad', 'Scriptcase', '127.0.0.1', 'access', ''),
(55, '2014-01-21 19:31:37', 'admin', 'grid_parroquia', 'Scriptcase', '127.0.0.1', 'access', ''),
(56, '2014-01-21 19:31:39', 'admin', 'grid_actividad_economica', 'Scriptcase', '127.0.0.1', 'access', ''),
(57, '2014-01-21 19:31:42', 'admin', 'grid_informacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(58, '2014-01-21 19:31:46', 'admin', 'grid_situacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(59, '2014-01-21 19:31:49', 'admin', 'grid_actividad_economica', 'Scriptcase', '127.0.0.1', 'access', ''),
(60, '2014-01-21 19:31:50', 'admin', 'grid_informacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(61, '2014-01-21 19:31:51', 'admin', 'grid_situacion_financiera', 'Scriptcase', '127.0.0.1', 'access', ''),
(62, '2014-01-21 19:31:53', 'admin', 'grid_pais', 'Scriptcase', '127.0.0.1', 'access', ''),
(63, '2014-01-21 19:31:54', 'admin', 'grid_provincia', 'Scriptcase', '127.0.0.1', 'access', ''),
(64, '2014-01-21 19:31:54', 'admin', 'grid_ciudad', 'Scriptcase', '127.0.0.1', 'access', ''),
(65, '2014-01-21 19:31:55', 'admin', 'grid_parroquia', 'Scriptcase', '127.0.0.1', 'access', ''),
(66, '2014-01-21 19:32:30', 'admin', 'grid_ciudad', 'Scriptcase', '127.0.0.1', 'access', ''),
(67, '2014-01-21 19:53:06', 'admin', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(68, '2014-01-21 19:53:15', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(69, '2014-01-21 20:13:19', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(70, '2014-01-21 20:14:36', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(71, '2014-01-21 20:15:59', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(72, '2014-01-21 20:24:06', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(73, '2014-01-21 20:31:23', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(74, '2014-01-21 20:32:01', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(75, '2014-01-21 20:32:45', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(76, '2014-01-21 20:36:20', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(77, '2014-01-21 20:37:00', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(78, '2014-01-21 20:37:54', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(79, '2014-01-21 20:38:11', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(80, '2014-01-21 20:38:43', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(81, '2014-01-21 20:39:07', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(82, '2014-01-21 20:39:49', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(83, '2014-01-21 20:40:34', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(84, '2014-01-21 20:40:51', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(85, '2014-01-21 20:41:29', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(86, '2014-01-21 20:42:02', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(87, '2014-01-21 20:42:36', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(88, '2014-01-21 20:44:22', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(89, '2014-01-21 20:46:12', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(90, '2014-01-21 20:47:09', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(91, '2014-01-21 20:55:35', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(92, '2014-01-21 21:01:18', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(93, '2014-01-21 21:07:54', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(94, '2014-01-21 21:09:46', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(95, '2014-01-21 21:10:06', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(96, '2014-01-21 21:10:50', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(97, '2014-01-21 21:11:08', 'admin', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(98, '2014-01-21 21:11:18', 'admin', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(99, '2014-01-22 14:15:59', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(100, '2014-01-22 14:17:53', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(101, '2014-01-22 14:23:08', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(102, '2014-01-22 14:26:43', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(103, '2014-01-22 14:31:10', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(104, '2014-01-22 14:32:12', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(105, '2014-01-22 14:33:40', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(106, '2014-01-22 14:34:34', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(107, '2014-01-22 14:35:44', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(108, '2014-01-22 14:37:31', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(109, '2014-01-22 14:38:53', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(110, '2014-01-22 14:48:16', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'insert', '--> keys <-- per_id : 1||--> fields <-- par_id (new)  : 1||pai_id (new)  : 1||per_documento (new)  : 0103097416||per_nombres (new)  : emanuel ricardo||per_apellido_materno (new)  : vasconez||per_apellido_paterno (new)  : carrasco||per_nacimiento_lugar (new)  : quito||per_nacimiento_fecha (new)  : 2014-01-01||per_sexo (new)  : M||per_dependientes (new)  : 0||per_estado_civil (new)  : S||per_conyuge_nombre (new)  : ||per_conyuge_documento (new)  : ||per_barrio (new)  : el labrador||per_direccion (new)  : Estocolmo E2-134 y av. amazonas||per_tiempo_residencia (new)  : 25||per_telefono (new)  : 2811136||per_celular (new)  : 0995661449||per_email (new)  : emanuelcarrasco@gmail.com||per_tipo_vivienda (new)  : V||per_numero_empleados (new)  : 3||per_empresa_tipo (new)  : V||per_empresa_producto (new)  : Desarrollo de software||per_empresa_inicio (new)  : 2010-01-01||per_empresa_nombre (new)  : Hawa Solutions||per_empresa_cargo (new)  : Presidente Ejecutivo||per_empresa_ruc (new)  : 1792308100001||per_empresa_direccion (new)  : El tiempo y el comercio||per_empresa_referencia (new)  : Sector Quicentro Shopping norte||per_empresa_telefono (new)  : 2469171||per_empresa_celular (new)  : 0995661449||per_empresa_email (new)  : ercarrasco@hawasolutions.com||informacion_financiera (new)  : ||actividad_economica (new)  : ||situacion_financiera (new)  : ||referencias_personales (new)  : ||referencias_bancarias (new)  : ||tarjeta_credito (new)  : '),
(111, '2014-01-22 14:49:47', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(112, '2014-01-22 14:50:08', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(113, '2014-01-22 14:50:40', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(114, '2014-01-22 14:51:11', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(115, '2014-01-22 14:51:41', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(116, '2014-01-22 14:51:58', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(117, '2014-01-22 14:53:26', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(118, '2014-01-22 14:57:48', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(119, '2014-01-22 14:58:43', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(120, '2014-01-22 14:59:03', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(121, '2014-01-22 14:59:40', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(122, '2014-01-22 15:02:22', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(123, '2014-01-22 15:02:44', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(124, '2014-01-22 15:03:20', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(125, '2014-01-22 15:03:44', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(126, '2014-01-22 15:03:44', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(127, '2014-01-22 15:03:44', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(128, '2014-01-22 15:03:45', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(129, '2014-01-22 15:03:45', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(130, '2014-01-22 15:03:46', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(131, '2014-01-22 15:03:46', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(132, '2014-01-22 15:07:36', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(133, '2014-01-22 15:07:46', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(134, '2014-01-22 15:07:47', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(135, '2014-01-22 15:07:48', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(136, '2014-01-22 15:07:48', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(137, '2014-01-22 15:07:49', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(138, '2014-01-22 15:07:49', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(139, '2014-01-22 15:07:49', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(140, '2014-01-22 15:07:49', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(141, '2014-01-22 15:08:08', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(142, '2014-01-22 15:08:12', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(143, '2014-01-22 15:08:13', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(144, '2014-01-22 15:08:13', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(145, '2014-01-22 15:08:13', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(146, '2014-01-22 15:08:13', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(147, '2014-01-22 15:08:14', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(148, '2014-01-22 15:08:14', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(149, '2014-01-22 15:08:37', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(150, '2014-01-22 15:08:39', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(151, '2014-01-22 15:08:39', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(152, '2014-01-22 15:08:39', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(153, '2014-01-22 15:08:39', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(154, '2014-01-22 15:08:40', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(155, '2014-01-22 15:08:40', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(156, '2014-01-22 15:08:40', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(157, '2014-01-22 15:10:01', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(158, '2014-01-22 15:10:46', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(159, '2014-01-22 15:10:54', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(160, '2014-01-22 15:10:56', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(161, '2014-01-22 15:10:56', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(162, '2014-01-22 15:10:56', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(163, '2014-01-22 15:10:57', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(164, '2014-01-22 15:10:57', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(165, '2014-01-22 15:10:57', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(166, '2014-01-22 15:10:57', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(167, '2014-01-22 15:11:36', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(168, '2014-01-22 15:11:38', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(169, '2014-01-22 15:11:39', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(170, '2014-01-22 15:11:39', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(171, '2014-01-22 15:11:39', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(172, '2014-01-22 15:11:39', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(173, '2014-01-22 15:11:40', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(174, '2014-01-22 15:11:40', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(175, '2014-01-22 15:11:48', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'insert', '--> keys <-- act_eco_id : 7||per_id : 1'),
(176, '2014-01-22 15:12:34', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(177, '2014-01-22 15:12:56', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(178, '2014-01-22 15:13:05', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(179, '2014-01-22 15:13:06', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(180, '2014-01-22 15:13:07', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(181, '2014-01-22 15:13:07', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(182, '2014-01-22 15:13:07', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(183, '2014-01-22 15:13:07', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(184, '2014-01-22 15:13:08', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(185, '2014-01-22 15:13:08', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(186, '2014-01-22 15:13:54', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(187, '2014-01-22 15:14:02', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(188, '2014-01-22 15:14:04', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(189, '2014-01-22 15:14:05', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(190, '2014-01-22 15:14:05', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(191, '2014-01-22 15:14:05', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(192, '2014-01-22 15:14:05', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(193, '2014-01-22 15:14:06', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(194, '2014-01-22 15:14:06', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(195, '2014-01-22 15:15:08', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(196, '2014-01-22 15:15:08', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(197, '2014-01-22 15:15:08', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(198, '2014-01-22 15:15:08', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(199, '2014-01-22 15:15:09', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(200, '2014-01-22 15:15:09', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(201, '2014-01-22 15:15:09', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(202, '2014-01-22 15:15:25', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'insert', '--> keys <-- act_eco_id : 6||per_id : 1'),
(203, '2014-01-22 15:16:37', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(204, '2014-01-22 15:19:17', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(205, '2014-01-22 15:27:24', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(206, '2014-01-22 15:27:39', '', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(207, '2014-01-22 15:27:41', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(208, '2014-01-22 15:27:42', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(209, '2014-01-22 15:27:42', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(210, '2014-01-22 15:27:42', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(211, '2014-01-22 15:27:43', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(212, '2014-01-22 15:27:43', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(213, '2014-01-22 15:27:43', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(214, '2014-01-22 15:27:55', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'insert', '--> keys <-- act_eco_id : 4||per_id : 1'),
(215, '2014-01-22 15:28:04', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'insert', '--> keys <-- act_eco_id : 1||per_id : 1'),
(216, '2014-01-22 15:28:18', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'delete', '--> keys <-- act_eco_id : 1||per_id : 1'),
(217, '2014-01-22 15:28:20', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'update', '--> keys <-- act_eco_id : 4||per_id : 1'),
(218, '2014-01-22 15:28:27', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'update', '--> keys <-- act_eco_id : 4||per_id : 1'),
(219, '2014-01-22 15:28:32', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'delete', '--> keys <-- act_eco_id : 4||per_id : 1'),
(220, '2014-01-22 15:29:17', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(221, '2014-01-22 15:29:26', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(222, '2014-01-22 15:29:26', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(223, '2014-01-22 15:29:26', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(224, '2014-01-22 15:29:26', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(225, '2014-01-22 15:29:27', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(226, '2014-01-22 15:29:27', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(227, '2014-01-22 15:29:27', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(228, '2014-01-22 15:29:31', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'insert', '--> keys <-- act_eco_id : 3||per_id : 1'),
(229, '2014-01-22 15:30:13', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(230, '2014-01-22 15:30:14', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(231, '2014-01-22 15:30:14', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(232, '2014-01-22 15:30:14', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(233, '2014-01-22 15:30:15', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(234, '2014-01-22 15:30:15', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(235, '2014-01-22 15:30:15', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(236, '2014-01-22 15:30:36', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(237, '2014-01-22 15:30:37', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(238, '2014-01-22 15:30:37', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(239, '2014-01-22 15:30:37', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(240, '2014-01-22 15:30:38', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(241, '2014-01-22 15:30:38', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(242, '2014-01-22 15:30:38', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(243, '2014-01-22 15:30:53', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(244, '2014-01-22 15:30:54', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(245, '2014-01-22 15:30:54', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(246, '2014-01-22 15:30:54', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(247, '2014-01-22 15:30:55', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(248, '2014-01-22 15:30:55', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(249, '2014-01-22 15:30:55', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(250, '2014-01-22 15:31:11', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(251, '2014-01-22 15:31:12', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(252, '2014-01-22 15:31:12', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(253, '2014-01-22 15:31:12', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(254, '2014-01-22 15:31:13', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(255, '2014-01-22 15:31:13', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(256, '2014-01-22 15:31:13', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(257, '2014-01-22 15:31:38', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(258, '2014-01-22 15:31:38', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(259, '2014-01-22 15:31:38', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(260, '2014-01-22 15:31:38', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(261, '2014-01-22 15:31:39', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(262, '2014-01-22 15:31:39', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(263, '2014-01-22 15:31:39', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(264, '2014-01-22 15:32:52', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(265, '2014-01-22 15:32:53', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(266, '2014-01-22 15:32:53', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(267, '2014-01-22 15:32:53', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(268, '2014-01-22 15:32:54', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(269, '2014-01-22 15:32:54', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(270, '2014-01-22 15:32:54', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(271, '2014-01-22 15:33:30', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(272, '2014-01-22 15:33:30', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(273, '2014-01-22 15:33:30', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(274, '2014-01-22 15:33:31', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(275, '2014-01-22 15:33:31', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(276, '2014-01-22 15:33:31', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(277, '2014-01-22 15:33:32', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(278, '2014-01-22 15:34:14', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(279, '2014-01-22 15:34:14', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(280, '2014-01-22 15:34:14', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(281, '2014-01-22 15:34:14', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(282, '2014-01-22 15:34:15', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(283, '2014-01-22 15:34:15', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(284, '2014-01-22 15:34:15', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(285, '2014-01-22 15:34:45', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(286, '2014-01-22 15:34:45', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(287, '2014-01-22 15:34:45', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(288, '2014-01-22 15:34:45', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(289, '2014-01-22 15:34:46', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(290, '2014-01-22 15:34:46', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(291, '2014-01-22 15:34:46', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(292, '2014-01-22 15:36:05', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(293, '2014-01-22 15:36:05', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(294, '2014-01-22 15:36:06', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(295, '2014-01-22 15:36:06', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(296, '2014-01-22 15:36:06', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(297, '2014-01-22 15:36:07', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(298, '2014-01-22 15:36:07', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(299, '2014-01-22 15:41:30', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(300, '2014-01-22 15:41:40', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(301, '2014-01-22 15:41:55', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(302, '2014-01-22 15:42:02', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(303, '2014-01-22 15:42:03', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(304, '2014-01-22 15:42:03', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(305, '2014-01-22 15:42:03', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(306, '2014-01-22 15:42:04', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(307, '2014-01-22 15:42:04', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(308, '2014-01-22 15:42:04', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(309, '2014-01-22 15:42:18', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(310, '2014-01-22 15:42:29', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(311, '2014-01-22 15:42:38', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(312, '2014-01-22 15:42:38', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(313, '2014-01-22 15:42:38', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(314, '2014-01-22 15:42:39', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(315, '2014-01-22 15:42:39', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(316, '2014-01-22 15:42:39', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(317, '2014-01-22 15:42:40', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(318, '2014-01-22 15:42:55', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(319, '2014-01-22 15:43:10', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(320, '2014-01-22 15:43:10', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(321, '2014-01-22 15:43:10', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(322, '2014-01-22 15:43:10', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(323, '2014-01-22 15:43:11', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(324, '2014-01-22 15:43:11', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(325, '2014-01-22 15:43:11', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(326, '2014-01-22 15:43:22', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(327, '2014-01-22 15:45:19', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(328, '2014-01-22 15:45:20', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(329, '2014-01-22 15:45:20', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(330, '2014-01-22 15:45:20', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(331, '2014-01-22 15:45:21', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(332, '2014-01-22 15:45:21', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(333, '2014-01-22 15:45:21', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(334, '2014-01-22 15:46:09', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(335, '2014-01-22 15:46:10', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(336, '2014-01-22 15:46:10', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(337, '2014-01-22 15:46:10', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(338, '2014-01-22 15:46:11', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(339, '2014-01-22 15:46:11', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(340, '2014-01-22 15:46:11', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(341, '2014-01-22 15:46:34', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(342, '2014-01-22 15:46:54', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(343, '2014-01-22 15:52:23', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(344, '2014-01-22 15:52:36', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(345, '2014-01-22 15:53:33', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(346, '2014-01-22 15:53:33', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(347, '2014-01-22 15:53:34', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(348, '2014-01-22 15:53:34', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(349, '2014-01-22 15:53:34', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(350, '2014-01-22 15:53:35', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(351, '2014-01-22 15:53:35', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(352, '2014-01-22 15:53:41', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(353, '2014-01-22 15:53:41', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(354, '2014-01-22 15:53:41', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(355, '2014-01-22 15:53:41', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(356, '2014-01-22 15:53:42', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(357, '2014-01-22 15:53:42', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(358, '2014-01-22 15:53:42', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(359, '2014-01-22 15:53:46', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'insert', '--> keys <-- per_id : 1||inf_fin_id : 7||--> fields <-- inf_fin_valor (new)  : 10.00'),
(360, '2014-01-22 15:54:18', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(361, '2014-01-22 15:54:26', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(362, '2014-01-22 15:54:27', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(363, '2014-01-22 15:54:27', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(364, '2014-01-22 15:54:27', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(365, '2014-01-22 15:54:28', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(366, '2014-01-22 15:54:28', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(367, '2014-01-22 15:54:28', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(368, '2014-01-22 15:55:57', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(369, '2014-01-22 15:56:26', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(370, '2014-01-22 15:56:48', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(371, '2014-01-22 15:59:23', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(372, '2014-01-22 16:54:46', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(373, '2014-01-22 16:54:47', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(374, '2014-01-22 16:54:47', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(375, '2014-01-22 16:54:47', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(376, '2014-01-22 16:54:48', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(377, '2014-01-22 16:54:48', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(378, '2014-01-22 16:54:48', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(379, '2014-01-22 17:06:17', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(380, '2014-01-22 17:09:58', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(381, '2014-01-22 17:10:11', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(382, '2014-01-22 17:10:45', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(383, '2014-01-22 17:11:03', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(384, '2014-01-22 17:14:19', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(385, '2014-01-22 17:17:03', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(386, '2014-01-22 17:17:03', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(387, '2014-01-22 17:17:04', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(388, '2014-01-22 17:17:04', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(389, '2014-01-22 17:17:04', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(390, '2014-01-22 17:17:05', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(391, '2014-01-22 17:17:05', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(392, '2014-01-22 17:17:26', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'insert', '--> keys <-- per_id : 1||sit_fin_id : 1||--> fields <-- sit_fin_valor (new)  : -10.00'),
(393, '2014-01-22 17:23:40', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(394, '2014-01-22 17:23:41', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(395, '2014-01-22 17:23:41', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(396, '2014-01-22 17:23:41', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(397, '2014-01-22 17:23:42', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(398, '2014-01-22 17:23:42', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(399, '2014-01-22 17:23:42', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(400, '2014-01-22 17:27:35', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(401, '2014-01-22 17:49:13', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(402, '2014-01-22 17:50:02', '', 'grid_pais_1', 'Scriptcase', '127.0.0.1', 'access', ''),
(403, '2014-01-22 17:50:07', '', 'form_pais_1', 'Scriptcase', '127.0.0.1', 'access', ''),
(404, '2014-01-22 17:50:17', '', 'grid_pais_1', 'Scriptcase', '127.0.0.1', 'access', ''),
(405, '2014-01-22 17:53:27', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(406, '2014-01-22 17:53:49', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(407, '2014-01-22 18:03:16', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(408, '2014-01-22 18:04:32', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(409, '2014-01-22 18:04:32', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(410, '2014-01-22 18:04:32', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(411, '2014-01-22 18:04:32', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(412, '2014-01-22 18:04:33', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(413, '2014-01-22 18:04:33', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(414, '2014-01-22 18:04:33', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(415, '2014-01-22 18:06:32', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(416, '2014-01-22 18:07:03', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(417, '2014-01-22 18:07:03', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(418, '2014-01-22 18:07:04', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(419, '2014-01-22 18:07:04', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(420, '2014-01-22 18:07:04', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(421, '2014-01-22 18:07:04', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(422, '2014-01-22 18:07:05', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(423, '2014-01-22 18:07:26', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'insert', '--> keys <-- ref_per_id : 1||--> fields <-- per_id (new)  : 1||ref_per_nombres (new)  : dsfadsfa||ref_per_direccion (new)  : dfafadsfadsf||ref_per_telefono (new)  : 1324234'),
(424, '2014-01-22 18:08:00', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(425, '2014-01-22 18:08:00', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(426, '2014-01-22 18:08:00', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(427, '2014-01-22 18:08:00', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(428, '2014-01-22 18:08:01', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(429, '2014-01-22 18:08:01', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(430, '2014-01-22 18:08:01', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(431, '2014-01-22 18:44:34', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(432, '2014-01-22 18:44:35', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(433, '2014-01-22 18:44:35', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(434, '2014-01-22 18:44:35', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(435, '2014-01-22 18:44:36', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(436, '2014-01-22 18:44:36', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(437, '2014-01-22 18:44:36', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(438, '2014-01-22 19:00:57', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(439, '2014-01-22 19:01:34', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(440, '2014-01-22 19:01:34', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(441, '2014-01-22 19:01:35', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(442, '2014-01-22 19:01:35', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(443, '2014-01-22 19:01:35', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(444, '2014-01-22 19:01:35', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(445, '2014-01-22 19:01:36', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(446, '2014-01-22 19:01:52', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'insert', '--> keys <-- ref_ban_id : 1||--> fields <-- per_id (new)  : 1||ref_ban_banco (new)  : pichincha||ref_ban_numero_cuenta (new)  : 1038228459||ref_ban_tipo_cuenta (new)  : A'),
(447, '2014-01-22 19:05:34', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(448, '2014-01-22 19:05:34', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(449, '2014-01-22 19:05:34', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(450, '2014-01-22 19:05:34', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(451, '2014-01-22 19:05:35', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(452, '2014-01-22 19:05:35', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(453, '2014-01-22 19:05:35', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(454, '2014-01-22 19:10:35', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(455, '2014-01-22 19:11:11', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(456, '2014-01-22 19:12:06', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(457, '2014-01-22 19:12:30', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(458, '2014-01-22 19:13:28', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(459, '2014-01-22 19:13:28', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(460, '2014-01-22 19:13:28', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(461, '2014-01-22 19:13:28', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(462, '2014-01-22 19:13:29', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(463, '2014-01-22 19:13:29', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(464, '2014-01-22 19:13:29', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', '');
INSERT INTO `sc_log` (`id`, `inserted_date`, `username`, `application`, `creator`, `ip_user`, `action`, `description`) VALUES
(465, '2014-01-22 19:13:56', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'insert', '--> keys <-- tar_cre_id : 1||--> fields <-- per_id (new)  : 1||tar_cre_institucion (new)  : afasdfasdf||tar_cre_numero_tarjeta (new)  : 36085700907776||tar_cre_anio_socio (new)  : 1901'),
(466, '2014-01-22 19:14:34', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(467, '2014-01-22 19:14:34', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(468, '2014-01-22 19:14:34', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(469, '2014-01-22 19:14:34', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(470, '2014-01-22 19:14:35', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(471, '2014-01-22 19:14:35', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(472, '2014-01-22 19:14:35', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(473, '2014-01-22 19:15:25', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(474, '2014-01-22 19:15:25', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(475, '2014-01-22 19:15:26', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(476, '2014-01-22 19:15:26', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(477, '2014-01-22 19:15:26', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(478, '2014-01-22 19:15:27', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(479, '2014-01-22 19:15:27', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(480, '2014-01-22 19:15:47', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(481, '2014-01-22 19:15:48', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(482, '2014-01-22 19:15:48', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(483, '2014-01-22 19:15:48', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(484, '2014-01-22 19:15:49', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(485, '2014-01-22 19:15:49', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(486, '2014-01-22 19:15:49', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(487, '2014-01-22 19:16:19', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(488, '2014-01-22 19:16:19', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(489, '2014-01-22 19:16:19', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(490, '2014-01-22 19:16:19', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(491, '2014-01-22 19:16:20', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(492, '2014-01-22 19:16:20', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(493, '2014-01-22 19:16:20', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(494, '2014-01-22 19:20:54', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(495, '2014-01-22 19:20:54', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(496, '2014-01-22 19:20:55', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(497, '2014-01-22 19:20:55', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(498, '2014-01-22 19:20:55', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(499, '2014-01-22 19:20:56', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(500, '2014-01-22 19:20:56', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(501, '2014-01-22 19:21:11', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(502, '2014-01-22 19:21:12', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(503, '2014-01-22 19:21:12', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(504, '2014-01-22 19:21:12', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(505, '2014-01-22 19:21:13', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(506, '2014-01-22 19:21:13', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(507, '2014-01-22 19:21:13', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(508, '2014-01-22 19:21:25', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(509, '2014-01-22 19:21:25', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(510, '2014-01-22 19:21:25', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(511, '2014-01-22 19:21:26', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(512, '2014-01-22 19:21:26', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(513, '2014-01-22 19:21:26', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(514, '2014-01-22 19:21:27', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(515, '2014-01-22 19:21:39', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(516, '2014-01-22 19:21:39', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(517, '2014-01-22 19:21:39', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(518, '2014-01-22 19:21:39', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(519, '2014-01-22 19:21:40', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(520, '2014-01-22 19:21:40', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(521, '2014-01-22 19:21:40', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(522, '2014-01-22 19:22:22', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(523, '2014-01-22 19:22:22', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(524, '2014-01-22 19:22:22', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(525, '2014-01-22 19:22:22', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(526, '2014-01-22 19:22:23', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(527, '2014-01-22 19:22:23', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(528, '2014-01-22 19:22:23', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(529, '2014-01-22 19:26:08', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(530, '2014-01-22 19:26:09', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(531, '2014-01-22 19:26:09', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(532, '2014-01-22 19:26:09', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(533, '2014-01-22 19:26:10', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(534, '2014-01-22 19:26:10', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(535, '2014-01-22 19:26:10', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(536, '2014-01-22 19:26:58', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(537, '2014-01-22 19:26:58', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(538, '2014-01-22 19:26:58', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(539, '2014-01-22 19:26:58', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(540, '2014-01-22 19:26:59', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(541, '2014-01-22 19:26:59', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(542, '2014-01-22 19:26:59', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(543, '2014-01-22 19:27:54', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(544, '2014-01-22 19:27:54', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(545, '2014-01-22 19:27:54', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(546, '2014-01-22 19:27:54', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(547, '2014-01-22 19:27:55', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(548, '2014-01-22 19:27:55', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(549, '2014-01-22 19:27:56', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(550, '2014-01-22 19:28:44', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(551, '2014-01-22 19:28:44', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(552, '2014-01-22 19:28:44', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(553, '2014-01-22 19:28:44', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(554, '2014-01-22 19:28:45', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(555, '2014-01-22 19:28:45', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(556, '2014-01-22 19:28:45', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(557, '2014-01-22 19:30:51', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(558, '2014-01-22 19:30:51', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(559, '2014-01-22 19:30:51', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(560, '2014-01-22 19:30:51', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(561, '2014-01-22 19:30:52', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(562, '2014-01-22 19:30:52', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(563, '2014-01-22 19:30:52', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(564, '2014-01-22 19:31:06', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(565, '2014-01-22 19:31:06', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(566, '2014-01-22 19:31:06', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(567, '2014-01-22 19:31:06', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(568, '2014-01-22 19:31:07', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(569, '2014-01-22 19:31:07', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(570, '2014-01-22 19:31:07', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(571, '2014-01-22 19:31:23', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(572, '2014-01-22 19:31:23', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(573, '2014-01-22 19:31:23', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(574, '2014-01-22 19:31:23', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(575, '2014-01-22 19:31:24', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(576, '2014-01-22 19:31:24', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(577, '2014-01-22 19:31:24', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(578, '2014-01-22 19:31:38', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(579, '2014-01-22 19:31:38', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(580, '2014-01-22 19:31:38', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(581, '2014-01-22 19:31:38', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(582, '2014-01-22 19:31:39', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(583, '2014-01-22 19:31:39', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(584, '2014-01-22 19:31:39', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(585, '2014-01-22 19:31:52', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(586, '2014-01-22 19:31:52', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(587, '2014-01-22 19:31:52', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(588, '2014-01-22 19:31:52', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(589, '2014-01-22 19:31:53', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(590, '2014-01-22 19:31:53', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(591, '2014-01-22 19:31:53', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(592, '2014-01-22 19:32:50', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(593, '2014-01-22 19:32:50', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(594, '2014-01-22 19:32:50', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(595, '2014-01-22 19:32:50', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(596, '2014-01-22 19:32:51', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(597, '2014-01-22 19:32:51', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(598, '2014-01-22 19:32:51', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(599, '2014-01-22 19:33:59', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(600, '2014-01-22 19:34:00', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(601, '2014-01-22 19:34:00', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(602, '2014-01-22 19:34:00', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(603, '2014-01-22 19:34:01', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(604, '2014-01-22 19:34:01', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(605, '2014-01-22 19:34:01', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(606, '2014-01-22 19:34:39', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(607, '2014-01-22 19:34:39', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(608, '2014-01-22 19:34:39', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(609, '2014-01-22 19:34:39', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(610, '2014-01-22 19:34:40', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(611, '2014-01-22 19:34:40', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(612, '2014-01-22 19:34:40', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(613, '2014-01-22 19:35:00', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(614, '2014-01-22 19:35:01', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(615, '2014-01-22 19:35:01', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(616, '2014-01-22 19:35:01', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(617, '2014-01-22 19:35:02', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(618, '2014-01-22 19:35:02', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(619, '2014-01-22 19:35:02', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(620, '2014-01-22 19:35:21', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(621, '2014-01-22 19:35:21', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(622, '2014-01-22 19:35:21', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(623, '2014-01-22 19:35:21', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(624, '2014-01-22 19:35:22', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(625, '2014-01-22 19:35:22', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(626, '2014-01-22 19:35:22', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(627, '2014-01-22 19:36:04', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(628, '2014-01-22 19:36:05', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(629, '2014-01-22 19:36:05', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(630, '2014-01-22 19:36:05', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(631, '2014-01-22 19:36:06', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(632, '2014-01-22 19:36:06', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(633, '2014-01-22 19:36:06', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(634, '2014-01-22 19:36:25', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(635, '2014-01-22 19:36:25', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(636, '2014-01-22 19:36:26', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(637, '2014-01-22 19:36:26', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(638, '2014-01-22 19:36:26', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(639, '2014-01-22 19:36:27', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(640, '2014-01-22 19:36:27', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(641, '2014-01-22 19:36:43', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(642, '2014-01-22 19:36:44', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(643, '2014-01-22 19:36:44', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(644, '2014-01-22 19:36:44', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(645, '2014-01-22 19:36:45', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(646, '2014-01-22 19:36:45', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(647, '2014-01-22 19:36:45', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(648, '2014-01-22 19:37:31', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(649, '2014-01-22 19:37:31', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(650, '2014-01-22 19:37:31', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(651, '2014-01-22 19:37:31', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(652, '2014-01-22 19:37:32', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(653, '2014-01-22 19:37:32', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(654, '2014-01-22 19:37:32', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(655, '2014-01-22 19:38:25', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(656, '2014-01-22 19:38:25', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(657, '2014-01-22 19:38:25', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(658, '2014-01-22 19:38:26', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(659, '2014-01-22 19:38:26', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(660, '2014-01-22 19:38:26', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(661, '2014-01-22 19:38:27', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(662, '2014-01-22 19:38:48', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(663, '2014-01-22 19:38:49', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(664, '2014-01-22 19:38:49', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(665, '2014-01-22 19:38:49', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(666, '2014-01-22 19:38:50', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(667, '2014-01-22 19:38:50', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(668, '2014-01-22 19:38:50', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(669, '2014-01-22 19:39:17', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(670, '2014-01-22 19:39:17', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(671, '2014-01-22 19:39:17', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(672, '2014-01-22 19:39:17', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(673, '2014-01-22 19:39:18', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(674, '2014-01-22 19:39:18', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(675, '2014-01-22 19:39:18', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(676, '2014-01-22 19:39:31', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(677, '2014-01-22 19:39:31', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(678, '2014-01-22 19:39:31', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(679, '2014-01-22 19:39:31', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(680, '2014-01-22 19:39:32', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(681, '2014-01-22 19:39:32', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(682, '2014-01-22 19:39:32', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(683, '2014-01-22 19:39:45', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(684, '2014-01-22 19:39:45', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(685, '2014-01-22 19:39:45', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(686, '2014-01-22 19:39:45', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(687, '2014-01-22 19:39:46', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(688, '2014-01-22 19:39:46', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(689, '2014-01-22 19:39:46', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(690, '2014-01-22 19:39:58', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(691, '2014-01-22 19:39:59', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(692, '2014-01-22 19:39:59', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(693, '2014-01-22 19:39:59', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(694, '2014-01-22 19:40:00', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(695, '2014-01-22 19:40:00', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(696, '2014-01-22 19:40:00', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(697, '2014-01-22 19:40:33', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(698, '2014-01-22 19:40:34', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(699, '2014-01-22 19:40:34', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(700, '2014-01-22 19:40:34', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(701, '2014-01-22 19:40:35', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(702, '2014-01-22 19:40:35', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(703, '2014-01-22 19:40:35', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(704, '2014-01-22 19:40:49', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(705, '2014-01-22 19:40:49', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(706, '2014-01-22 19:40:49', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(707, '2014-01-22 19:40:49', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(708, '2014-01-22 19:40:50', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(709, '2014-01-22 19:40:50', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(710, '2014-01-22 19:40:51', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(711, '2014-01-22 19:41:06', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(712, '2014-01-22 19:41:06', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(713, '2014-01-22 19:41:06', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(714, '2014-01-22 19:41:07', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(715, '2014-01-22 19:41:07', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(716, '2014-01-22 19:41:07', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(717, '2014-01-22 19:41:08', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(718, '2014-01-22 19:41:49', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(719, '2014-01-22 19:41:49', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(720, '2014-01-22 19:41:49', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(721, '2014-01-22 19:41:49', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(722, '2014-01-22 19:41:50', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(723, '2014-01-22 19:41:50', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(724, '2014-01-22 19:41:50', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(725, '2014-01-22 19:42:05', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(726, '2014-01-22 19:42:06', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(727, '2014-01-22 19:42:06', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(728, '2014-01-22 19:42:06', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(729, '2014-01-22 19:42:07', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(730, '2014-01-22 19:42:07', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(731, '2014-01-22 19:42:07', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(732, '2014-01-22 19:43:09', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(733, '2014-01-22 19:43:10', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(734, '2014-01-22 19:43:10', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(735, '2014-01-22 19:43:10', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(736, '2014-01-22 19:43:11', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(737, '2014-01-22 19:43:11', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(738, '2014-01-22 19:43:11', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(739, '2014-01-22 19:44:19', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(740, '2014-01-22 19:44:20', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(741, '2014-01-22 19:44:20', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(742, '2014-01-22 19:44:20', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(743, '2014-01-22 19:44:21', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(744, '2014-01-22 19:44:21', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(745, '2014-01-22 19:44:21', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(746, '2014-01-22 19:45:02', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(747, '2014-01-22 19:45:02', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(748, '2014-01-22 19:45:02', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(749, '2014-01-22 19:45:02', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(750, '2014-01-22 19:45:03', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(751, '2014-01-22 19:45:03', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(752, '2014-01-22 19:45:03', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(753, '2014-01-22 19:51:43', '', 'form_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(754, '2014-01-22 19:51:43', '', 'form_actividad_economica_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(755, '2014-01-22 19:51:43', '', 'form_situacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(756, '2014-01-22 19:51:43', '', 'form_informacion_financiera_por_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(757, '2014-01-22 19:51:44', '', 'form_tarjetas_credito', 'Scriptcase', '127.0.0.1', 'access', ''),
(758, '2014-01-22 19:51:44', '', 'form_referencias_bancarias', 'Scriptcase', '127.0.0.1', 'access', ''),
(759, '2014-01-22 19:51:44', '', 'form_referencias_personales', 'Scriptcase', '127.0.0.1', 'access', ''),
(760, '2014-01-22 19:54:39', '', 'app_Login', 'Scriptcase', '127.0.0.1', 'access', ''),
(761, '2014-01-22 19:54:47', 'admin', 'menu', 'Scriptcase', '127.0.0.1', 'access', ''),
(762, '2014-01-22 19:54:50', 'admin', 'grid_persona', 'Scriptcase', '127.0.0.1', 'access', ''),
(763, '2014-01-22 19:54:54', 'admin', 'grid_pais', 'Scriptcase', '127.0.0.1', 'access', ''),
(764, '2014-01-22 19:54:55', 'admin', 'grid_provincia', 'Scriptcase', '127.0.0.1', 'access', ''),
(765, '2014-01-22 19:54:57', 'admin', 'grid_parroquia', 'Scriptcase', '127.0.0.1', 'access', ''),
(766, '2014-01-22 19:54:58', 'admin', 'grid_ciudad', 'Scriptcase', '127.0.0.1', 'access', ''),
(767, '2014-01-23 08:54:42', '', 'app_Login', 'Scriptcase', '186.101.161.102', 'access', ''),
(768, '2014-01-23 08:54:52', 'admin', 'app_Login', 'User', '186.101.161.102', 'login', '¡Ingresado en el sistema!'),
(769, '2014-01-23 08:54:53', 'admin', 'menu', 'Scriptcase', '186.101.161.102', 'access', ''),
(770, '2014-01-23 08:54:57', 'admin', 'grid_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(771, '2014-01-23 08:55:01', 'admin', 'form_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(772, '2014-01-23 08:55:17', 'admin', 'grid_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(773, '2014-01-23 08:55:23', 'admin', 'form_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(774, '2014-01-23 08:55:26', 'admin', 'form_actividad_economica_por_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(775, '2014-01-23 08:55:26', 'admin', 'form_situacion_financiera_por_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(776, '2014-01-23 08:55:27', 'admin', 'form_referencias_personales', 'Scriptcase', '186.101.161.102', 'access', ''),
(777, '2014-01-23 08:55:29', 'admin', 'form_informacion_financiera_por_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(778, '2014-01-23 08:55:31', 'admin', 'form_tarjetas_credito', 'Scriptcase', '186.101.161.102', 'access', ''),
(779, '2014-01-23 08:55:32', 'admin', 'form_referencias_bancarias', 'Scriptcase', '186.101.161.102', 'access', ''),
(780, '2014-01-23 08:57:15', 'admin', 'grid_pais', 'Scriptcase', '186.101.161.102', 'access', ''),
(781, '2014-01-23 08:57:18', 'admin', 'grid_provincia', 'Scriptcase', '186.101.161.102', 'access', ''),
(782, '2014-01-23 08:57:24', 'admin', 'grid_ciudad', 'Scriptcase', '186.101.161.102', 'access', ''),
(783, '2014-01-23 08:57:28', 'admin', 'grid_parroquia', 'Scriptcase', '186.101.161.102', 'access', ''),
(784, '2014-01-23 08:57:32', '', 'app_Login', 'Scriptcase', '186.101.161.102', 'access', ''),
(785, '2014-01-23 14:11:03', '', 'app_Login', 'Scriptcase', '186.101.161.102', 'access', ''),
(786, '2014-01-23 14:11:11', 'admin', 'app_Login', 'User', '186.101.161.102', 'login', '¡Ingresado en el sistema!'),
(787, '2014-01-23 14:11:12', 'admin', 'menu', 'Scriptcase', '186.101.161.102', 'access', ''),
(788, '2014-01-23 14:11:32', 'admin', 'grid_pais', 'Scriptcase', '186.101.161.102', 'access', ''),
(789, '2014-01-23 14:11:36', 'admin', 'grid_provincia', 'Scriptcase', '186.101.161.102', 'access', ''),
(790, '2014-01-23 14:11:38', 'admin', 'grid_ciudad', 'Scriptcase', '186.101.161.102', 'access', ''),
(791, '2014-01-23 14:11:50', 'admin', 'grid_parroquia', 'Scriptcase', '186.101.161.102', 'access', ''),
(792, '2014-01-23 14:11:55', 'admin', 'grid_actividad_economica', 'Scriptcase', '186.101.161.102', 'access', ''),
(793, '2014-01-23 14:12:01', 'admin', 'grid_informacion_financiera', 'Scriptcase', '186.101.161.102', 'access', ''),
(794, '2014-01-23 14:12:09', 'admin', 'grid_situacion_financiera', 'Scriptcase', '186.101.161.102', 'access', ''),
(795, '2014-01-23 14:12:16', 'admin', 'grid_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(796, '2014-01-23 14:12:36', 'admin', 'form_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(797, '2014-01-23 14:12:41', 'admin', 'form_actividad_economica_por_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(798, '2014-01-23 14:12:42', 'admin', 'form_informacion_financiera_por_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(799, '2014-01-23 14:12:43', 'admin', 'form_referencias_personales', 'Scriptcase', '186.101.161.102', 'access', ''),
(800, '2014-01-23 14:12:45', 'admin', 'form_situacion_financiera_por_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(801, '2014-01-23 14:12:46', 'admin', 'form_tarjetas_credito', 'Scriptcase', '186.101.161.102', 'access', ''),
(802, '2014-01-23 14:12:48', 'admin', 'form_referencias_bancarias', 'Scriptcase', '186.101.161.102', 'access', ''),
(803, '2014-01-23 14:14:49', 'admin', 'form_actividad_economica_por_persona', 'Scriptcase', '186.101.161.102', 'insert', '--> keys <-- act_eco_id : 2||per_id : 1'),
(804, '2014-01-23 14:16:20', 'admin', 'form_informacion_financiera_por_persona', 'Scriptcase', '186.101.161.102', 'insert', '--> keys <-- per_id : 1||inf_fin_id : 1||--> fields <-- inf_fin_valor (new)  : 200.00'),
(805, '2014-01-23 14:17:26', '', 'app_Login', 'Scriptcase', '186.101.161.102', 'access', ''),
(806, '2014-01-23 14:18:53', '', 'app_Login', 'Scriptcase', '186.101.161.102', 'access', ''),
(807, '2014-01-23 14:19:01', 'admin', 'app_Login', 'User', '186.101.161.102', 'login', '¡Ingresado en el sistema!'),
(808, '2014-01-23 14:19:01', 'admin', 'menu', 'Scriptcase', '186.101.161.102', 'access', ''),
(809, '2014-01-23 14:19:04', 'admin', 'grid_persona', 'Scriptcase', '186.101.161.102', 'access', ''),
(810, '2014-01-23 14:19:32', 'admin', 'grid_actividad_economica', 'Scriptcase', '186.101.161.102', 'access', ''),
(811, '2014-01-23 14:20:31', 'admin', 'grid_informacion_financiera', 'Scriptcase', '186.101.161.102', 'access', ''),
(812, '2014-01-23 14:22:36', '', 'app_Login', 'Scriptcase', '186.101.161.102', 'access', ''),
(813, '2014-01-27 08:57:30', '', 'app_Login', 'Scriptcase', '190.85.159.135', 'access', ''),
(814, '2014-01-27 09:09:46', '', 'app_Login', 'Scriptcase', '190.85.159.135', 'access', ''),
(815, '2014-01-27 09:16:26', '', 'app_Login', 'Scriptcase', '190.85.159.135', 'access', ''),
(816, '2014-01-27 09:17:00', '', 'app_Login', 'Scriptcase', '190.85.159.135', 'access', ''),
(817, '2014-01-27 09:20:40', '', 'app_Login', 'Scriptcase', '190.85.159.135', 'access', ''),
(818, '2014-01-27 09:49:30', '', 'app_Login', 'Scriptcase', '190.85.159.135', 'access', '');

-- --------------------------------------------------------

--
-- Table structure for table `sec_apps`
--

DROP TABLE IF EXISTS `sec_apps`;
CREATE TABLE IF NOT EXISTS `sec_apps` (
  `app_name` varchar(128) NOT NULL,
  `app_type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`app_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sec_apps`
--

INSERT INTO `sec_apps` (`app_name`, `app_type`, `description`) VALUES
('app_change_pswd', 'contr', 'Security Application'),
('app_form_add_users', 'form', 'Security Application'),
('app_form_edit_users', 'form', 'Security Application'),
('app_form_sec_apps', 'form', 'Security Application'),
('app_form_sec_groups', 'form', 'Security Application'),
('app_form_sec_groups_apps', 'form', 'Security Application'),
('app_grid_sec_apps', 'cons', 'Security Application'),
('app_grid_sec_groups', 'cons', 'Security Application'),
('app_grid_sec_users', 'cons', 'Security Application'),
('app_Login', 'contr', 'Security Application'),
('app_retrieve_pswd', 'contr', 'Security Application'),
('app_search_sec_groups', 'filter', 'Security Application'),
('app_sync_apps', 'contr', 'Security Application'),
('form_actividad', 'form', 'Ingreso de Actividades'),
('form_asistencia', 'form', NULL),
('form_categoria', 'form', 'Ingreso de Categorías'),
('form_categoria_evento', 'form', 'Ingreso de Categoria Propia del Evento'),
('form_inscrito', 'form', 'Ingreso de Participantes'),
('form_inscrito_basico', 'form', NULL),
('form_inscrito_credencial', 'form', NULL),
('form_pais', 'form', 'Ingreso de Paises'),
('grid_actividad', 'cons', 'Visualización de Actividades'),
('grid_asistencia', 'cons', NULL),
('grid_categoria', 'cons', 'Visualización de Categorias'),
('grid_categoria_evento', 'cons', 'Visualizacion de Categorias Propias del Evento'),
('grid_inscrito', 'cons', 'Visualizacion de Participantes'),
('grid_inscrito_basico', 'cons', NULL),
('grid_inscrito_credencial', 'cons', NULL),
('grid_log', 'cons', 'Aplicación creada por ScriptCase, para ver el registro de: log_general'),
('grid_pais', 'cons', 'Visualizacion de Paises'),
('menu', 'menu', ''),
('rpt_certificado_todos', 'reportpdf', NULL),
('rpt_credencial_categorias', 'reportpdf', NULL),
('rpt_credencial_inscrito_individual', 'reportpdf', NULL),
('rpt_credencial_inscrito_todos', 'reportpdf', NULL),
('rpt_credencial_texto', 'reportpdf', NULL),
('rpt_grafico_asistencia', 'cons', NULL),
('rpt_grafico_categoria_evento', 'cons', NULL),
('rpt_no_asistencia', 'cons', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sec_groups`
--

DROP TABLE IF EXISTS `sec_groups`;
CREATE TABLE IF NOT EXISTS `sec_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `description` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sec_groups`
--

INSERT INTO `sec_groups` (`group_id`, `description`) VALUES
(1, 'Administradores');

-- --------------------------------------------------------

--
-- Table structure for table `sec_groups_apps`
--

DROP TABLE IF EXISTS `sec_groups_apps`;
CREATE TABLE IF NOT EXISTS `sec_groups_apps` (
  `group_id` int(11) NOT NULL,
  `app_name` varchar(128) NOT NULL,
  `priv_access` varchar(1) DEFAULT NULL,
  `priv_insert` varchar(1) DEFAULT NULL,
  `priv_delete` varchar(1) DEFAULT NULL,
  `priv_update` varchar(1) DEFAULT NULL,
  `priv_export` varchar(1) DEFAULT NULL,
  `priv_print` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`group_id`,`app_name`),
  KEY `sec_groups_apps_ibfk_2` (`app_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sec_groups_apps`
--

INSERT INTO `sec_groups_apps` (`group_id`, `app_name`, `priv_access`, `priv_insert`, `priv_delete`, `priv_update`, `priv_export`, `priv_print`) VALUES
(1, 'app_change_pswd', 'Y', '', '', '', '', ''),
(1, 'app_form_add_users', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'app_form_edit_users', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'app_form_sec_apps', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'app_form_sec_groups', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'app_form_sec_groups_apps', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'app_grid_sec_apps', 'Y', '', '', '', 'Y', 'Y'),
(1, 'app_grid_sec_groups', 'Y', '', '', '', 'Y', 'Y'),
(1, 'app_grid_sec_users', 'Y', '', '', '', 'Y', 'Y'),
(1, 'app_Login', 'Y', '', '', '', '', ''),
(1, 'app_retrieve_pswd', 'Y', '', '', '', '', ''),
(1, 'app_search_sec_groups', 'Y', '', '', '', '', ''),
(1, 'app_sync_apps', 'Y', '', '', '', '', ''),
(1, 'form_actividad', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'form_asistencia', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'form_categoria', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'form_categoria_evento', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'form_inscrito', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'form_inscrito_basico', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'form_inscrito_credencial', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'form_pais', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(1, 'grid_actividad', 'Y', '', '', '', 'Y', 'Y'),
(1, 'grid_asistencia', 'Y', '', '', '', 'Y', 'Y'),
(1, 'grid_categoria', 'Y', '', '', '', 'Y', 'Y'),
(1, 'grid_categoria_evento', 'Y', '', '', '', 'Y', 'Y'),
(1, 'grid_inscrito', 'Y', '', '', '', 'Y', 'Y'),
(1, 'grid_inscrito_basico', 'Y', '', '', '', 'Y', 'Y'),
(1, 'grid_inscrito_credencial', 'Y', '', '', '', 'Y', 'Y'),
(1, 'grid_log', 'Y', '', '', '', 'Y', 'Y'),
(1, 'grid_pais', 'Y', '', '', '', 'Y', 'Y'),
(1, 'menu', 'Y', '', '', '', '', ''),
(1, 'rpt_certificado_todos', 'Y', '', '', '', '', ''),
(1, 'rpt_credencial_categorias', 'Y', '', '', '', '', ''),
(1, 'rpt_credencial_inscrito_individual', 'Y', '', '', '', '', ''),
(1, 'rpt_credencial_inscrito_todos', 'Y', '', '', '', '', ''),
(1, 'rpt_credencial_texto', 'Y', '', '', '', '', ''),
(1, 'rpt_grafico_asistencia', 'Y', '', '', '', 'Y', 'Y'),
(1, 'rpt_grafico_categoria_evento', 'Y', '', '', '', 'Y', 'Y'),
(1, 'rpt_no_asistencia', 'Y', '', '', '', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sec_users`
--

DROP TABLE IF EXISTS `sec_users`;
CREATE TABLE IF NOT EXISTS `sec_users` (
  `login` varchar(32) NOT NULL,
  `pswd` varchar(32) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `active` varchar(1) DEFAULT NULL,
  `activation_code` varchar(32) DEFAULT NULL,
  `priv_admin` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sec_users`
--

INSERT INTO `sec_users` (`login`, `pswd`, `name`, `email`, `active`, `activation_code`, `priv_admin`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 'ercarrasco@hawasolutions.com', 'Y', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sec_users_groups`
--

DROP TABLE IF EXISTS `sec_users_groups`;
CREATE TABLE IF NOT EXISTS `sec_users_groups` (
  `login` varchar(32) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`login`,`group_id`),
  KEY `sec_users_groups_ibfk_2` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sec_users_groups`
--

INSERT INTO `sec_users_groups` (`login`, `group_id`) VALUES
('admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `situacion_financiera`
--

DROP TABLE IF EXISTS `situacion_financiera`;
CREATE TABLE IF NOT EXISTS `situacion_financiera` (
  `sit_fin_id` int(10) NOT NULL AUTO_INCREMENT,
  `sit_fin_nombre` varchar(50) NOT NULL,
  `sit_fin_tipo` char(1) NOT NULL,
  PRIMARY KEY (`sit_fin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `situacion_financiera`
--

INSERT INTO `situacion_financiera` (`sit_fin_id`, `sit_fin_nombre`, `sit_fin_tipo`) VALUES
(1, 'CAJAS Y BANCOS', 'A'),
(2, 'INVERSIONES', 'A'),
(3, 'CUENTAS Y DOC. POR COBRAR', 'A'),
(4, 'MERCADERIA', 'A'),
(5, 'MUEBLES Y ENSERES', 'A'),
(6, 'VEHICULOS', 'A'),
(7, 'PROPIEDADES', 'A'),
(8, 'OTROS ACTIVOS', 'A'),
(9, 'PRESTAMOS EN INST. FINANCIERAS', 'P'),
(10, 'CUENTAS Y DOC. POR PAGAR', 'P'),
(11, 'OTRAS OBLIGACIONES', 'P'),
(12, 'PRESTAMO EN ALIANZA DEL VALLE', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `situacion_financiera_por_persona`
--

DROP TABLE IF EXISTS `situacion_financiera_por_persona`;
CREATE TABLE IF NOT EXISTS `situacion_financiera_por_persona` (
  `per_id` int(10) NOT NULL,
  `sit_fin_id` int(10) NOT NULL,
  `sit_fin_valor` decimal(14,2) NOT NULL,
  PRIMARY KEY (`per_id`,`sit_fin_id`),
  KEY `fk_situacion_financiera_por_persona2` (`sit_fin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `situacion_financiera_por_persona`
--

INSERT INTO `situacion_financiera_por_persona` (`per_id`, `sit_fin_id`, `sit_fin_valor`) VALUES
(1, 1, -10.00);

-- --------------------------------------------------------

--
-- Table structure for table `tarjetas_credito`
--

DROP TABLE IF EXISTS `tarjetas_credito`;
CREATE TABLE IF NOT EXISTS `tarjetas_credito` (
  `tar_cre_id` int(10) NOT NULL AUTO_INCREMENT,
  `per_id` int(10) DEFAULT NULL,
  `tar_cre_institucion` varchar(200) NOT NULL,
  `tar_cre_numero_tarjeta` varchar(16) NOT NULL,
  `tar_cre_anio_socio` char(4) NOT NULL,
  PRIMARY KEY (`tar_cre_id`),
  KEY `fk_tar_cre_per_id` (`per_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tarjetas_credito`
--

INSERT INTO `tarjetas_credito` (`tar_cre_id`, `per_id`, `tar_cre_institucion`, `tar_cre_numero_tarjeta`, `tar_cre_anio_socio`) VALUES
(1, 1, 'afasdfasdf', '36085700907776', '1901');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividad_economica_por_persona`
--
ALTER TABLE `actividad_economica_por_persona`
  ADD CONSTRAINT `fk_per_act_eco_id` FOREIGN KEY (`act_eco_id`) REFERENCES `actividad_economica` (`act_eco_id`),
  ADD CONSTRAINT `fk_per_act_eco_id2` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`);

--
-- Constraints for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_ciu_pro_id` FOREIGN KEY (`pro_id`) REFERENCES `provincia` (`pro_id`);

--
-- Constraints for table `informacion_financiera_por_persona`
--
ALTER TABLE `informacion_financiera_por_persona`
  ADD CONSTRAINT `fk_inf_fin_per_id` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`),
  ADD CONSTRAINT `fk_inf_fin_per_id2` FOREIGN KEY (`inf_fin_id`) REFERENCES `informacion_financiera` (`inf_fin_id`);

--
-- Constraints for table `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `fk_par_ciu_id` FOREIGN KEY (`ciu_id`) REFERENCES `ciudad` (`ciu_id`);

--
-- Constraints for table `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_per_pai_id` FOREIGN KEY (`pai_id`) REFERENCES `pais` (`pai_id`),
  ADD CONSTRAINT `fk_per_par_id` FOREIGN KEY (`par_id`) REFERENCES `parroquia` (`par_id`);

--
-- Constraints for table `referencias_bancarias`
--
ALTER TABLE `referencias_bancarias`
  ADD CONSTRAINT `fk_ref_ban_per_id` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`);

--
-- Constraints for table `referencias_personales`
--
ALTER TABLE `referencias_personales`
  ADD CONSTRAINT `fk_ref_per_per_id` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`);

--
-- Constraints for table `sec_groups_apps`
--
ALTER TABLE `sec_groups_apps`
  ADD CONSTRAINT `sec_groups_apps_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `sec_groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sec_groups_apps_ibfk_2` FOREIGN KEY (`app_name`) REFERENCES `sec_apps` (`app_name`) ON DELETE CASCADE;

--
-- Constraints for table `sec_users_groups`
--
ALTER TABLE `sec_users_groups`
  ADD CONSTRAINT `sec_users_groups_ibfk_1` FOREIGN KEY (`login`) REFERENCES `sec_users` (`login`) ON DELETE CASCADE,
  ADD CONSTRAINT `sec_users_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `sec_groups` (`group_id`) ON DELETE CASCADE;

--
-- Constraints for table `situacion_financiera_por_persona`
--
ALTER TABLE `situacion_financiera_por_persona`
  ADD CONSTRAINT `fk_situacion_financiera_por_persona` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`),
  ADD CONSTRAINT `fk_situacion_financiera_por_persona2` FOREIGN KEY (`sit_fin_id`) REFERENCES `situacion_financiera` (`sit_fin_id`);

--
-- Constraints for table `tarjetas_credito`
--
ALTER TABLE `tarjetas_credito`
  ADD CONSTRAINT `fk_tar_cre_per_id` FOREIGN KEY (`per_id`) REFERENCES `persona` (`per_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
