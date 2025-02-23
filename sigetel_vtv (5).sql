-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-02-2025 a las 20:19:45
-- Versión del servidor: 8.0.41-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sigetel_vtv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Accesorios`
--

CREATE TABLE `Accesorios` (
  `ID_Accesorio` int NOT NULL,
  `N_Accesorio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Accesorios`
--

INSERT INTO `Accesorios` (`ID_Accesorio`, `N_Accesorio`) VALUES
(1, 'Cargador'),
(2, 'Forro'),
(5, 'Auriculares'),
(6, 'Teclado'),
(7, 'Mouse');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asignaciones`
--

CREATE TABLE `Asignaciones` (
  `ID_Asignado` int NOT NULL,
  `Responsable` int NOT NULL,
  `Responsable_ret` int DEFAULT NULL,
  `Solicitante` int NOT NULL,
  `Ubicacion` int NOT NULL,
  `status` int NOT NULL,
  `status_eq_asg` int DEFAULT NULL,
  `tipo_asg` int NOT NULL,
  `fecha_entrega` date NOT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  `observacion_rec` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `n_control_a` varchar(15) DEFAULT NULL,
  `n_control_d` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Asignaciones`
--

INSERT INTO `Asignaciones` (`ID_Asignado`, `Responsable`, `Responsable_ret`, `Solicitante`, `Ubicacion`, `status`, `status_eq_asg`, `tipo_asg`, `fecha_entrega`, `fecha_devolucion`, `observacion`, `observacion_rec`, `n_control_a`, `n_control_d`) VALUES
(50, 1, 1, 1, 23, 2, 2, 1, '2025-02-11', '2025-02-11', 'prueba de asignacion', 'prueba de asignacion - retorno', 'A-1034-839145', 'D-1027-650192'),
(51, 1, 1, 13, 24, 2, 3, 2, '2025-02-11', '2025-02-11', 'prestamo', 'prestamo - retorno', NULL, 'D-1001-471863'),
(52, 1, NULL, 1, 23, 1, NULL, 1, '2025-02-17', NULL, 'prueba de asignacion 1', NULL, 'A-7583-174025', NULL),
(53, 18, 18, 1, 23, 2, 5, 1, '2025-02-18', '2025-02-20', 'prueba de asignacion 2', 'prueba de asignacion 2 -m retorno a 55', 'A-1095-179532', 'D-1043-065871'),
(54, 1, 1, 13, 24, 2, 3, 1, '2025-02-18', '2025-02-11', 'prueba de asignacion 3', 'prestamo prueba dañado', 'A-9042-628531', NULL),
(55, 1, 1, 1, 23, 2, 2, 2, '2025-02-18', '2025-02-20', 'prestamo', 'prestamo - prueba retrono apple\r\n', NULL, 'D-1002-187326'),
(56, 1, 18, 1, 23, 2, 2, 1, '2025-02-18', '2025-02-20', 'prueba', 'prueba - prueba', 'A-7604-530761', 'D-1024-157480');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asig_lineas`
--

CREATE TABLE `asig_lineas` (
  `ID_Linea_asig` int NOT NULL,
  `responsable` int NOT NULL,
  `responsable_ret` int NOT NULL,
  `solicitante` int NOT NULL,
  `ubicacion` int NOT NULL,
  `status` int NOT NULL,
  `estado_linea_asg` int DEFAULT NULL,
  `tipo_asg` int NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `observacion_rec` varchar(500) DEFAULT NULL,
  `fecha_entrega` date NOT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `n_control_a` varchar(15) DEFAULT NULL,
  `n_control_d` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cargos`
--

CREATE TABLE `Cargos` (
  `ID_cargo` int NOT NULL,
  `N_cargo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FKEY_division` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Cargos`
--

INSERT INTO `Cargos` (`ID_cargo`, `N_cargo`, `FKEY_division`) VALUES
(1, 'Asistente Al Vicepresidente', 1),
(2, 'Gerente', 1),
(3, 'Jefe De Division', 1),
(4, 'Vicepresidente (E)', 1),
(5, 'no', 1),
(6, 'Abogado Sustanciador (Nivel 4)', 2),
(7, 'Jefe De Division', 2),
(8, 'Adjunto Al Gerente (E)', 3),
(9, 'Coordinador', 3),
(10, 'Jefe De Division', 3),
(11, 'Promotor Deportivo I (Nivel 3)', 3),
(12, 'Asistente Administrativo I (Nivel 3)', 3),
(13, 'Asistente Administrativo I (Nivel 2)', 3),
(14, 'Docente De Aula (Nivel 2)', 3),
(15, 'Docente De Aula (Nivel 3)', 3),
(16, 'Auxiliar De Preescolar (Nivel 2)', 3),
(17, 'Psicologo (Nivel 4)', 3),
(18, 'Supervisor Escolar (Nivel 3)', 3),
(19, 'Auxiliar De Preescolar (Nivel 3)', 3),
(20, 'Coordinador (E)', 3),
(21, 'Docente De Aula (Nivel 4)', 3),
(22, 'Analista Profesional (Nivel 3)', 3),
(23, 'Enfermera (Nivel 3)', 3),
(24, 'Asistente Administrativo II (Nivel 2)', 3),
(25, 'Supervisor (E)', 3),
(26, 'Medico Especialista (Nivel 4)', 3),
(27, 'Cocinero (Nivel 2)', 3),
(28, 'Asistente Administrativo I (Nivel 1)', 3),
(29, 'Docente De Aula (Nivel 1)', 3),
(30, 'Ayudante De Cocina (Nivel 1)', 3),
(31, 'Auxiliar De Preescolar (Nivel 1)', 3),
(32, 'Analista Tecnico (Nivel 3)', 3),
(33, 'Medico Especialista (Nivel 1)', 3),
(34, 'Promotor Deportivo II (Nivel 3)', 3),
(35, 'Medico Especialista (Nivel 2)', 3),
(36, 'Supervisor Escolar (E)', 3),
(37, 'Cocinero (Nivel 1)', 3),
(38, 'Promotor Deportivo II (Nivel 1)', 3),
(39, 'Promotor Deportivo I (Nivel 1)', 3),
(40, 'Enfermera (Nivel 1)', 3),
(41, 'Analista (Nivel 1)', 3),
(42, 'Analista I (Nivel 1)', 3),
(43, 'Asistente Administrativo II (Nivel 1)', 3),
(44, 'Enfermera (Nivel 2)', 3),
(45, 'Productor III (Nivel 6)', 4),
(46, 'Coordinador', 4),
(47, 'Director Tecnico Iv (Nivel 6)', 4),
(48, 'Director Tecnico III (Nivel 6)', 4),
(49, 'Jefe De Division (E)', 4),
(50, 'Coordinador (E)', 4),
(51, 'Director Tecnico II (Nivel 5)', 4),
(52, 'Productor III (Nivel 4)', 4),
(53, 'Chequeador De Pauta (Nivel 4)', 4),
(54, 'Director De Piso (Nivel 5)', 4),
(55, 'Director De Piso (Nivel 7)', 4),
(56, 'Productor III (Nivel 5)', 4),
(57, 'Chequeador De Pauta (Nivel 2)', 4),
(58, 'Operador De Telepromter (Nivel 1)', 4),
(59, 'Productor III (Nivel 1)', 4),
(60, 'Director Tecnico I (Nivel 2)', 4),
(61, 'Chequeador De Pauta (Nivel 1)', 4),
(62, 'Director Tecnico I (Nivel 1)', 4),
(63, 'Director Tecnico II (Nivel 3)', 4),
(64, 'Director Tecnico Iv (Nivel 5)', 4),
(65, 'Coordinador', 5),
(66, 'Analista (Nivel 6)', 5),
(67, 'Profesional II (Nivel 5)', 5),
(68, 'Gerente (E)', 5),
(69, 'Analista Tecnico (Nivel 5)', 5),
(70, 'Analista (Nivel 5)', 5),
(71, 'Mensajero Interno (Nivel 5)', 5),
(72, 'Mensajero Interno (Nivel 2)', 5),
(73, 'Analista Profesional (Nivel 4)', 5),
(74, 'Analista (Nivel 7)', 5),
(75, 'Asistente De Contenido Al Vicepresidente', 6),
(76, 'Productor III (Nivel 3)', 6),
(77, 'Post Productor III (Nivel 3)', 6),
(78, 'Asistente De Contenido Al Vicepresidente (E)', 6),
(79, 'Asistente Al Vicepresidente (E)', 6),
(80, 'Vicepresidente (E)', 6),
(81, 'Productor I (Nivel 2)', 6),
(82, 'Conductor Integral De Vehiculos (Nivel 5)', 6),
(83, 'Analista (Nivel 2)', 6),
(84, 'Post Productor II (Nivel 2)', 6),
(85, 'Post Productor I (Nivel 1)', 6),
(86, 'Post Productor III (Nivel 2)', 6),
(87, 'Productor III (Nivel 1)', 6),
(88, 'Jefe De Division', 7),
(89, 'Analista (Nivel 5)', 7),
(90, 'Coordinador', 7),
(91, 'Analista (Nivel 3)', 7),
(92, 'Analista (Nivel 4)', 7),
(93, 'Analista Tecnico (Nivel 4)', 7),
(94, 'Analista Tecnico (Nivel 6)', 7),
(95, 'Maquillador Peluquero II (Nivel 5)', 8),
(96, 'Jefe De Division', 8),
(97, 'Coordinador', 8),
(98, 'Maquillador Peluquero I (Nivel 3)', 8),
(99, 'Vestuarista II (Nivel 4)', 8),
(100, 'Maquillador Peluquero I (Nivel 1)', 8),
(101, 'Vestuarista I (Nivel 1)', 8),
(102, 'Maquillador Peluquero II (Nivel 3)', 8),
(103, 'Coordinador', 9),
(104, 'Jefe De Division (E)', 9),
(105, 'Operador Integral (Nivel 6)', 9),
(106, 'Coordinador (E)', 9),
(107, 'Tecnico II (Nivel 5)', 9),
(108, 'Supervisor (E)', 9),
(109, 'Tecnico II (Nivel 2)', 9),
(110, 'Operador Integral (Nivel 5)', 9),
(111, 'Operador Integral (Nivel 3)', 9),
(112, 'Operador Integral (Nivel 2)', 9),
(113, 'Asistente Administrativo I (Nivel 1)', 9),
(114, 'Tecnico II (Nivel 1)', 9),
(115, 'Tecnico II (Nivel 3)', 9),
(116, 'Tecnico III (Nivel 1)', 9),
(117, 'Operador Integral (Nivel 1)', 9),
(118, 'Tecnico I (Nivel 1)', 9),
(119, 'Coordinador', 10),
(120, 'Jefe De Division', 10),
(121, 'Analista (Nivel 1)', 10),
(122, 'Asistente Administrativo I (Nivel 2)', 10),
(123, 'Analista Profesional (Nivel 3)', 10),
(124, 'Analista Profesional (Nivel 4)', 10),
(125, 'Coordinador', 10),
(126, 'Jefe De Division', 10),
(127, 'Analista (Nivel 2)', 10),
(128, 'Asistente Administrativo I (Nivel 2)', 10),
(129, 'Analista Profesional (Nivel 3)', 10),
(130, 'Analista Profesional (Nivel 4)', 10),
(131, 'Coordinador (E)', 11),
(132, 'Jefe De Division (E)', 11),
(133, 'Productor II (Nivel 1)', 11),
(135, 'Disenador Grafico I (Nivel 1)', 11),
(136, 'Director De Fotografia (Nivel 5)', 12),
(137, 'Coordinador', 12),
(138, 'Operario De Talleres I (Nivel 5)', 12),
(139, 'Operario De Talleres II (Nivel 6)', 12),
(140, 'Servicios Escenograficos Especializado (Nivel 5)', 12),
(141, 'Operario De Talleres II (Nivel 7)', 12),
(142, 'Operario De Talleres II (Nivel 5)', 12),
(143, 'Operario De Talleres II (Nivel 4)', 12),
(144, 'Director De Fotografia (Nivel 2)', 12),
(145, 'Operario De Talleres I (Nivel 2)', 12),
(146, 'Servicios Escenograficos Especializado (Nivel 3)', 12),
(147, 'Director De Fotografia (Nivel 1)', 12),
(148, 'Manualista Realizador (Nivel 6)', 12),
(149, 'Camarografo Iv (Nivel 5)', 13),
(150, 'Camarografo III (Nivel 5)', 13),
(151, 'Operador De Exteriores (Nivel 5)', 13),
(152, 'Camarografo II (Nivel 3)', 13),
(153, 'Camarografo I (Nivel 3)', 13),
(154, 'Coordinador', 13),
(155, 'Jefe De Division (E)', 13),
(156, 'Luminotecnico II (Nivel 5)', 13),
(157, 'Asistente Tecnico Integral (Nivel 3)', 13),
(158, 'Camarografo Iv (Nivel 7)', 13),
(159, 'Chequeador De Estudio (Nivel 3)', 13),
(160, 'Luminotecnico II (Nivel 3)', 13),
(161, 'Chequeador De Estudio (Nivel 5)', 13),
(162, 'Luminotecnico I (Nivel 5)', 13),
(163, 'Coordinador (E)', 13),
(164, 'Operador De Audio I (Nivel 2)', 13),
(165, 'Camarografo III (Nivel 4)', 13),
(166, 'Operador De Grua (Nivel 5)', 13),
(167, 'Camarografo III (Nivel 6)', 13),
(168, 'Operador De Video (Nivel 5)', 13),
(169, 'Camarografo II (Nivel 5)', 13),
(170, 'Camarografo I (Nivel 2)', 13),
(171, 'Asistente Tecnico Integral (Nivel 2)', 13),
(172, 'Maquinista (Nivel 5)', 13),
(173, 'Asistente Tecnico Integral (Nivel 5)', 13),
(174, 'Operador De Grua (Nivel 4)', 13),
(175, 'Camarografo I (Nivel 4)', 13),
(176, 'Luminotecnico I (Nivel 3)', 13),
(177, 'Asistente Tecnico Integral (Nivel 1)', 13),
(178, 'Chequeador De Estudio (Nivel 2)', 13),
(179, 'Operador De Video (Nivel 1)', 13),
(180, 'Chequeador De Pauta (Nivel 1)', 13),
(181, 'Productor I (Nivel 7)', 13),
(182, 'Operador De Exteriores (Nivel 7)', 13),
(183, 'Operador De Audio II (Nivel 7)', 13),
(184, 'Luminotecnico I (Nivel 1)', 13),
(185, 'Operador De Audio I (Nivel 1)', 13),
(186, 'Camarografo Iv (Nivel 6)', 13),
(187, 'Operador De Audio II (Nivel 1)', 13),
(188, 'Adjunto Al Gerente (E)', 14),
(189, 'Gerente (E)', 14),
(190, 'Asistente Administrativo I (Nivel 1)', 14),
(191, 'Mensajero Interno (Nivel 2)', 14),
(192, 'Productor I (Nivel 1)', 14),
(193, 'Asistente Administrativo II (Nivel 6)', 14),
(194, 'Adjunto Al Gerente (E)', 14),
(195, 'Gerente (E)', 14),
(196, 'Asistente Administrativo I (Nivel 1)', 14),
(197, 'Mensajero Interno (Nivel 2)', 14),
(198, 'Productor I (Nivel 1)', 14),
(199, 'Asistente Administrativo II (Nivel 6)', 14),
(200, 'Adjunto Al Gerente (E)', 14),
(201, 'Gerente (E)', 14),
(202, 'Asistente Administrativo I (Nivel 1)', 14),
(203, 'Mensajero Interno (Nivel 2)', 14),
(204, 'Productor I (Nivel 1)', 14),
(205, 'Asistente Administrativo II (Nivel 6)', 14),
(206, 'Asistente Administrativo I (Nivel 4)', 15),
(207, 'Adjunto Al Gerente (E)', 15),
(208, 'Periodista III (Nivel 3)', 15),
(209, 'Gerente (E)', 15),
(210, 'Productor I (Nivel 1)', 15),
(211, 'Periodista I (Nivel 1)', 15),
(212, 'Coordinador', 15),
(213, 'Asistente Administrativo I (Nivel 4)', 15),
(214, 'Adjunto Al Gerente (E)', 15),
(215, 'Periodista III (Nivel 3)', 15),
(216, 'Gerente (E)', 15),
(217, 'Productor I (Nivel 1)', 15),
(218, 'Periodista I (Nivel 1)', 15),
(219, 'Coordinador', 15),
(220, 'Coordinador', 16),
(221, 'Analista Profesional (Nivel 3)', 16),
(222, 'Coordinador (E)', 16),
(223, 'Asistente Administrativo II (Nivel 2)', 16),
(224, 'Analista (Nivel 2)', 16),
(225, 'Gerente (E)', 16),
(226, 'Jefe De Division (E)', 16),
(227, 'Analista Profesional (Nivel 4)', 16),
(228, 'Asistente Administrativo I (Nivel 2)', 16),
(229, 'Analista Tecnico (Nivel 4)', 16),
(230, 'Analista Profesional (Nivel 2)', 16),
(231, 'Analista Tecnico (Nivel 5)', 16),
(232, 'Analista Profesional (Nivel 5)', 16),
(233, 'Coordinador', 17),
(234, 'Jefe De Division', 17),
(235, 'Analista Profesional (Nivel 3)', 17),
(236, 'Analista Tecnico (Nivel 2)', 17),
(237, 'Analista Profesional (Nivel 4)', 17),
(238, 'Analista Profesional (Nivel 2)', 17),
(239, 'Coordinador (E)', 17),
(240, 'Analista (Nivel 1)', 17),
(241, 'Analista Profesional (Nivel 1)', 17),
(242, 'Coordinador', 18),
(243, 'Adjunto Al Gerente (E)', 18),
(244, 'Analista Tecnico (Nivel 2)', 18),
(245, 'Gerente (E)', 18),
(246, 'Coordinador', 18),
(247, 'Adjunto Al Gerente (E)', 18),
(248, 'Analista Tecnico (Nivel 2)', 18),
(249, 'Gerente (E)', 18),
(250, 'Coordinador', 19),
(251, 'Jefe De Division (E)', 19),
(252, 'Operador De Microondas Fija (Nivel 3)', 19),
(253, 'Tecnico II (Nivel 3)', 19),
(254, 'Tecnico I (Nivel 3)', 19),
(255, 'Tecnico III (Nivel 5)', 19),
(256, 'Tecnico II (Nivel 5)', 19),
(257, 'Tecnico III (Nivel 4)', 19),
(258, 'Electricista II (Nivel 5)', 19),
(259, 'Coordinador (E)', 19),
(260, 'Tecnico I (Nivel 4)', 19),
(261, 'Tecnico I (Nivel 2)', 19),
(262, 'Tecnico II (Nivel 1)', 19),
(263, 'Operador De Microondas Fija (Nivel 2)', 19),
(264, 'Tecnico III (Nivel 2)', 19),
(265, 'Tecnico II (Nivel 4)', 19),
(266, 'Tecnico I (Nivel 5)', 19),
(267, 'Operador Movil (Nivel 4)', 19),
(268, 'Tecnico I (Nivel 6)', 19),
(269, 'Tecnico I (Nivel 1)', 19),
(270, 'Camarografo Iv (Nivel 1)', 19),
(271, 'Asistente Tecnico Integral (Nivel 5)', 19),
(272, 'Tecnico III (Nivel 1)', 19),
(273, 'Tecnico III (Nivel 6)', 19),
(274, 'Operador De Microondas Fija (Nivel 1)', 19),
(275, 'Asistente Tecnico Integral (Nivel 1)', 19),
(276, 'Tecnico III (Nivel 7)', 19),
(277, 'Asistente Tecnico Integral (Nivel 3)', 19),
(278, 'Asistente Tecnico Integral (Nivel 4)', 19),
(279, 'Coordinador', 19),
(280, 'Jefe De Division (E)', 19),
(281, 'Operador De Microondas Fija (Nivel 3)', 19),
(282, 'Tecnico II (Nivel 3)', 19),
(283, 'Tecnico I (Nivel 3)', 19),
(284, 'Tecnico III (Nivel 5)', 19),
(285, 'Tecnico II (Nivel 5)', 19),
(286, 'Tecnico III (Nivel 4)', 19),
(287, 'Electricista II (Nivel 5)', 19),
(288, 'Coordinador (E)', 19),
(289, 'Tecnico I (Nivel 4)', 19),
(290, 'Tecnico I (Nivel 2)', 19),
(291, 'Tecnico II (Nivel 1)', 19),
(292, 'Operador De Microondas Fija (Nivel 2)', 19),
(293, 'Tecnico III (Nivel 2)', 19),
(294, 'Tecnico II (Nivel 4)', 19),
(295, 'Tecnico I (Nivel 5)', 19),
(296, 'Operador Movil (Nivel 4)', 19),
(297, 'Tecnico I (Nivel 6)', 19),
(298, 'Tecnico I (Nivel 1)', 19),
(299, 'Camarografo Iv (Nivel 1)', 19),
(300, 'Asistente Tecnico Integral (Nivel 5)', 19),
(301, 'Tecnico III (Nivel 1)', 19),
(302, 'Tecnico III (Nivel 6)', 19),
(303, 'Operador De Microondas Fija (Nivel 1)', 19),
(304, 'Asistente Tecnico Integral (Nivel 1)', 19),
(305, 'Tecnico III (Nivel 7)', 19),
(306, 'Asistente Tecnico Integral (Nivel 3)', 19),
(307, 'Asistente Tecnico Integral (Nivel 4)', 19),
(308, 'Coordinador', 20),
(309, 'Coordinador', 21),
(310, 'Periodista II (Nivel 2)', 21),
(311, 'Corrector De Contenido (Nivel 3)', 21),
(312, 'Periodista II (Nivel 3)', 21),
(313, 'Periodista II (Nivel 5)', 21),
(314, 'Periodista I (Nivel 3)', 21),
(315, 'Periodista II (Nivel 4)', 21),
(316, 'Corrector De Contenido (Nivel 7)', 21),
(317, 'Presentador II (Nivel 4)', 21),
(318, 'Periodista II (Nivel 1)', 21),
(319, 'Periodista I (Nivel 2)', 21),
(320, 'Coordinador (E)', 21),
(321, 'Jefe De Division (E)', 21),
(322, 'Corrector De Contenido (Nivel 1)', 21),
(323, 'Periodista I (Nivel 1)', 21),
(324, 'Corrector De Contenido (Nivel 2)', 21),
(325, 'Adjunto Al Gerente (E)', 21),
(326, 'Coordinador', 22),
(327, 'Periodista III (Nivel 3)', 22),
(328, 'Jefe De Division', 22),
(329, 'Asignador II (Nivel 3)', 22),
(330, 'Periodista II (Nivel 3)', 22),
(331, 'Coordinador (E)', 22),
(332, 'Periodista II (Nivel 2)', 22),
(333, 'Periodista III (Nivel 4)', 22),
(334, 'Periodista III (Nivel 1)', 22),
(335, 'Asignador II (Nivel 4)', 22),
(336, 'Presentador II (Nivel 3)', 22),
(337, 'Presentador III (Nivel 4)', 22),
(338, 'Presentador III (Nivel 5)', 22),
(339, 'Presentador III (Nivel 3)', 22),
(340, 'Presentador I (Nivel 2)', 22),
(341, 'Presentador III (Nivel 6)', 22),
(342, 'Camarografo II (Nivel 4)', 22),
(343, 'Periodista II (Nivel 5)', 22),
(344, 'Periodista III (Nivel 5)', 22),
(345, 'Productor II (Nivel 4)', 22),
(346, 'Camarografo II (Nivel 2)', 22),
(347, 'Editor I (Nivel 2)', 22),
(348, 'Asignador I (Nivel 2)', 22),
(349, 'Presentador III (Nivel 2)', 22),
(350, 'Interprete De Lengua De Senas Venezolanas (Nivel 2)', 22),
(351, 'Periodista I (Nivel 1)', 22),
(352, 'Productor I (Nivel 2)', 22),
(353, 'Periodista II (Nivel 1)', 22),
(354, 'Productor I (Nivel 1)', 22),
(355, 'Interprete De Lengua De Senas Venezolanas (Nivel 1)', 22),
(356, 'Camarografo II (Nivel 1)', 22),
(357, 'Periodista III (Nivel 6)', 22),
(358, 'Asignador I (Nivel 1)', 22),
(359, 'Periodista II (Nivel 4)', 22),
(360, 'Camarografo I (Nivel 1)', 22),
(361, 'Jefe De Division', 23),
(363, 'Coordinador (E)', 23),
(364, 'Profesional I (Nivel 1)', 23),
(365, 'Coordinador', 24),
(366, 'Coordinador (E)', 24),
(367, 'Tecnico II (Nivel 5)', 24),
(368, 'Tecnico III (Nivel 4)', 24),
(369, 'Jefe De Division (E)', 24),
(370, 'Tecnico II (Nivel 1)', 24),
(371, 'Tecnico I (Nivel 2)', 24),
(372, 'Tecnico III (Nivel 6)', 24),
(373, 'Tecnico I (Nivel 1)', 24),
(374, 'Coordinador', 25),
(375, 'Asistente Administrativo I (Nivel 2)', 25),
(376, 'Asistente Administrativo I (Nivel 1)', 25),
(377, 'Auxiliar De Mantenimiento (Nivel 1)', 25),
(378, 'Supervisor (Nivel 1)', 25),
(379, 'Analista (Nivel 1)', 25),
(380, 'Mensajero Interno (Nivel 1)', 25),
(381, 'Analista Profesional (Nivel 2)', 25),
(382, 'Analista Profesional (Nivel 1)', 25),
(383, 'Analista Tecnico (Nivel 1)', 25),
(384, 'Asesor', 25),
(385, 'Jefe De Division (E)', 26),
(386, 'Disenador Grafico II (Nivel 5)', 26),
(387, 'Coordinador (E)', 26),
(388, 'Disenador Grafico I (Nivel 2)', 26),
(389, 'Operador Generador De Caracteres (Nivel 1)', 26),
(390, 'Disenador Grafico III (Nivel 1)', 26),
(391, 'Disenador Grafico I (Nivel 1)', 26),
(392, 'Auditor Interno (E)', 27),
(393, 'Auditor Integral (Nivel 3)', 27),
(394, 'Auditor Integral (Nivel 1)', 27),
(395, 'Auditor De Sistemas (Nivel 2)', 27),
(396, 'Gerente (E)', 28),
(397, 'Analista (Nivel 5)', 28),
(398, 'Mensajero Interno (Nivel 5)', 28),
(399, 'Analista (Nivel 2)', 28),
(400, 'Productor I (Nivel 2)', 28),
(401, 'Coordinador', 29),
(402, 'Adjunto Al Gerente', 29),
(403, 'Analista Profesional (Nivel 5)', 29),
(404, 'Analista Tecnico (Nivel 2)', 29),
(405, 'Gerente (E)', 29),
(406, 'Analista (Nivel 2)', 29),
(407, 'Coordinador (E)', 29),
(408, 'Analista (Nivel 1)', 29),
(409, 'Jefe De Division', 30),
(410, 'Documentalista Audiovisual (Nivel 6)', 30),
(411, 'Documentalista Audiovisual (Nivel 3)', 30),
(412, 'Coordinador (E)', 30),
(413, 'Documentalista Audiovisual (Nivel 5)', 30),
(414, 'Documentalista Audiovisual (Nivel 1)', 30),
(415, 'Operador De Ingesta (Nivel 1)', 30),
(416, 'Jefe De Division', 31),
(417, 'Dibujante (Nivel 5)', 31),
(418, 'Profesional II (Nivel 5)', 31),
(419, 'Electricista I (Nivel 5)', 31),
(420, 'Coordinador (E)', 31),
(421, 'Supervisor (E)', 31),
(422, 'Electricista I (Nivel 1)', 31),
(423, 'Coordinador', 32),
(424, 'Coordinador (E)', 32),
(425, 'Jefe De Division (E)', 32),
(426, 'Productor I (Nivel 3)', 32),
(427, 'Productor I (Nivel 2)', 32),
(428, 'Periodista II (Nivel 3)', 32),
(429, 'Periodista II (Nivel 5)', 32),
(430, 'Productor III (Nivel 5)', 32),
(431, 'Periodista II (Nivel 4)', 32),
(432, 'Presentador III (Nivel 6)', 32),
(433, 'Periodista III (Nivel 4)', 32),
(434, 'Periodista I (Nivel 2)', 32),
(435, 'Post Productor II (Nivel 3)', 32),
(436, 'Presentador III (Nivel 3)', 32),
(437, 'Periodista I (Nivel 1)', 32),
(438, 'Productor I (Nivel 1)', 32),
(439, 'Editor I (Nivel 1)', 32),
(440, 'Productor III (Nivel 7)', 32),
(441, 'Coordinador', 33),
(442, 'Promotor Social (Nivel 4)', 33),
(443, 'Gerente (E)', 34),
(444, 'Productor De Ingesta (Nivel 2)', 34),
(445, 'Productor De Ingesta (Nivel 1)', 34),
(446, 'Coordinador (E)', 34),
(447, 'Operador De Ingesta (Nivel 1)', 34),
(448, 'Asistente Administrativo I (Nivel 1)', 34),
(449, 'Asistente Al Presidente', 35),
(450, 'Coordinador', 35),
(451, 'Gerente', 35),
(452, 'Coordinador (E)', 35),
(453, 'Asistente Al Presidente (E)', 35),
(454, 'Chofer - Escolta (Nivel 2)', 35),
(455, 'Chofer - Escolta (Nivel 3)', 35),
(456, 'Chofer - Escolta (Nivel 4)', 35),
(457, 'Asesor', 35),
(458, 'Productor III (Nivel 2)', 35),
(459, 'Agente De Seguridad (Nivel 2)', 35),
(460, 'Presentador III (Nivel 5)', 35),
(461, 'Chofer - Escolta (Nivel 1)', 35),
(462, 'Mensajero Motorizado (Nivel 3)', 35),
(463, 'Ayudante De Cocina (Nivel 1)', 35),
(464, 'Auxiliar De Mantenimiento (Nivel 1)', 35),
(465, 'Asistente Administrativo I (Nivel 1)', 35),
(466, 'Mesonero (Nivel 1)', 35),
(467, 'Cocinero (Nivel 1)', 35),
(468, 'Analista Especialista (Nivel 1)', 35),
(469, 'Asistente Administrativo II (Nivel 1)', 35),
(470, 'Productor II (Nivel 1)', 35),
(471, 'Agente De Seguridad (Nivel 1)', 35),
(472, 'Asesor Creativo (Nivel 7)', 35),
(473, 'Conductor Integral De Vehiculos (Nivel 1)', 35),
(474, 'Asesor Creativo (Nivel 4)', 35),
(475, 'Conductor Integral De Vehiculos (Nivel 3)', 35),
(476, 'Jefe De Division (E)', 36),
(477, 'Coordinador (E)', 36),
(478, 'Tecnico Almacenista (Nivel 3)', 36),
(479, 'Tecnico Almacenista (Nivel 1)', 36),
(480, 'Jefe De Division', 37),
(481, 'Responsable De Transmisiones (Nivel 6)', 37),
(482, 'Responsable De Transmisiones (Nivel 3)', 37),
(483, 'Analista (Nivel 1)', 37),
(484, 'Responsable De Transmisiones (Nivel 5)', 37),
(485, 'Analista Profesional (Nivel 4)', 37),
(486, 'Adjunto Al Gerente (E)', 37),
(487, 'Responsable De Transmisiones (Nivel 4)', 37),
(488, 'Adjunto Al Gerente (E)', 38),
(489, 'Consultor Juridico (E)', 38),
(490, 'Abogado (Nivel 1)', 38),
(491, 'Coordinador', 39),
(492, 'Periodista III (Nivel 3)', 39),
(493, 'Periodista III (Nivel 6)', 39),
(494, 'Corrector De Contenido (Nivel 2)', 39),
(495, 'Jefe De Division (E)', 39),
(496, 'Periodista III (Nivel 1)', 39),
(497, 'Coordinador (E)', 39),
(498, 'Periodista I (Nivel 1)', 39),
(499, 'Corrector De Contenido (Nivel 5)', 39),
(500, 'Periodista II (Nivel 3)', 39),
(501, 'Coordinador', 40),
(502, 'Coordinador (E)', 40),
(503, 'Analista Tecnico (Nivel 3)', 40),
(504, 'Operadora (Nivel 2)', 40),
(505, 'Agente De Seguridad (Nivel 2)', 40),
(506, 'Agente De Seguridad (Nivel 4)', 40),
(507, 'Agente De Seguridad (Nivel 1)', 40),
(508, 'Recepcionista (Nivel 2)', 40),
(509, 'Recepcionista (Nivel 1)', 40),
(510, 'Operadora (Nivel 1)', 40),
(511, 'Jefe De Division (E)', 40),
(512, 'Agente De Seguridad (Nivel 3)', 40),
(513, 'Asistente Administrativo I (Nivel 1)', 40),
(514, 'Coordinador', 41),
(515, 'Adjunto Al Gerente (E)', 42),
(516, 'Gerente (E)', 42),
(517, 'Promotor Social (Nivel 1)', 42),
(518, 'Coordinador', 42),
(519, 'Coordinador', 43),
(520, 'Asistente De Protocolo (Nivel 2)', 43),
(521, 'Asistente De Protocolo (Nivel 5)', 43),
(522, 'Asistente De Protocolo (Nivel 1)', 43),
(523, 'Coordinador', 44),
(524, 'Coordinador', 45),
(525, 'Periodista I (Nivel 3)', 45),
(526, 'Coordinador (E)', 45),
(527, 'Adjunto Al Gerente (E)', 45),
(528, 'Asistente Administrativo I (Nivel 2)', 45),
(529, 'Gerente (E)', 45),
(530, 'Coordinador', 46),
(531, 'Jefe De Division (E)', 46),
(532, 'Coordinador (E)', 46),
(533, 'Jefe De Division', 47),
(534, 'Coordinador', 47),
(535, 'Analista Profesional (Nivel 4)', 47),
(536, 'Analista Tecnico (Nivel 3)', 47),
(537, 'Analista Profesional (Nivel 2)', 47),
(538, 'Coordinador', 48),
(539, 'Logistico (Nivel 4)', 48),
(540, 'Logistico (Nivel 3)', 48),
(541, 'Logistico (Nivel 2)', 48),
(542, 'Coordinador (E)', 48),
(543, 'Logistico (Nivel 1)', 48),
(544, 'Gerente (E)', 49),
(545, 'Adjunto Al Gerente', 49),
(546, 'Coordinador (E)', 49),
(547, 'Analista Tecnico (Nivel 5)', 49),
(548, 'Mensajero Interno (Nivel 4)', 49),
(549, 'Asistente Administrativo I (Nivel 3)', 49),
(550, 'Auxiliar De Mantenimiento (Nivel 1)', 49),
(551, 'Jefe De Division (E)', 49),
(552, 'Jefe De Division', 50),
(553, 'Abogado Sustanciador (Nivel 5)', 50),
(554, 'Adjunto Al Gerente (E)', 51),
(555, 'Analista Tecnico (Nivel 3)', 51),
(556, 'Gerente (E)', 52),
(557, 'Jefe De Division (E)', 52),
(558, 'Coordinador', 52),
(559, 'Tecnico II (Nivel 6)', 52),
(560, 'Tecnico III (Nivel 5)', 52),
(561, 'Profesional I (Nivel 5)', 52),
(562, 'Tecnico II (Nivel 5)', 52),
(563, 'Coordinador (E)', 52),
(564, 'Profesional I (Nivel 2)', 52),
(565, 'Tecnico II (Nivel 2)', 52),
(566, 'Tecnico I (Nivel 2)', 52),
(567, 'Tecnico I (Nivel 1)', 52),
(568, 'Vicepresidente (E)', 53),
(569, 'Profesional II (Nivel 3)', 53),
(570, 'Asistente Administrativo I (Nivel 4)', 53),
(571, 'Director Tecnico Iv (Nivel 2)', 53),
(572, 'Tecnico III (Nivel 1)', 53),
(573, 'Tecnico III (Nivel 2)', 53),
(574, 'Operador Integral (Nivel 1)', 53),
(575, 'Productor III (Nivel 1)', 53),
(576, 'Asistente Tecnico Integral (Nivel 1)', 53),
(577, 'Camarografo III (Nivel 2)', 53),
(578, 'Electricista II (Nivel 4)', 53),
(579, 'Camarografo Iv (Nivel 2)', 53),
(580, 'Chofer - Escolta (Nivel 1)', 53),
(581, 'Operador De Audio I (Nivel 3)', 53),
(582, 'Asistente Tecnico Integral (Nivel 2)', 53),
(583, 'Electricista I (Nivel 3)', 53),
(584, 'Coordinador', 53),
(585, 'Logistico (Nivel 3)', 53),
(586, 'Operador De Audio II (Nivel 2)', 53),
(587, 'Coordinador', 54),
(588, 'Almacenista (Nivel 4)', 54),
(589, 'Analista (Nivel 3)', 54),
(590, 'Coordinador (E)', 55),
(591, 'Jefe De Division (E)', 55),
(592, 'Responsable De Transmisiones (Nivel 1)', 55),
(593, 'Evaluador De Contenido (Nivel 1)', 55),
(594, 'Presentador II (Nivel 3)', 56),
(595, 'Realizador (Nivel 5)', 56),
(596, 'Realizador (Nivel 4)', 56),
(597, 'Jefe De Division (E)', 56),
(598, 'Post Productor II (Nivel 3)', 57),
(599, 'Jefe De Division', 57),
(600, 'Post Productor III (Nivel 2)', 57),
(601, 'Post Productor III (Nivel 5)', 57),
(602, 'Coordinador', 57),
(603, 'Editor II (Nivel 5)', 57),
(604, 'Post Productor I (Nivel 5)', 57),
(605, 'Post Productor I (Nivel 1)', 57),
(606, 'Post Productor II (Nivel 1)', 57),
(607, 'Editor I (Nivel 1)', 57),
(608, 'Analista Profesional (Nivel 5)', 58),
(609, 'Adjunto Al Gerente (E)', 58),
(610, 'Asistente Administrativo I (Nivel 2)', 58),
(611, 'Profesional II (Nivel 3)', 59),
(612, 'Tecnico III (Nivel 5)', 59),
(613, 'Coordinador (E)', 59),
(614, 'Profesional I (Nivel 2)', 59),
(615, 'Jefe De Division (E)', 59),
(616, 'Tecnico I (Nivel 2)', 59),
(617, 'Tecnico III (Nivel 1)', 59),
(618, 'Tecnico I (Nivel 1)', 59),
(619, 'Analista (Nivel 3)', 60),
(620, 'Coordinador (E)', 60),
(621, 'Analista (Nivel 2)', 60),
(622, 'Analista Tecnico (Nivel 5)', 60),
(623, 'Analista Tecnico (Nivel 2)', 60),
(624, 'Analista Profesional (Nivel 4)', 60),
(625, 'Jefe De Division (E)', 60),
(626, 'Asistente Administrativo I (Nivel 1)', 60),
(627, 'Analista (Nivel 1)', 60),
(628, 'Gerente (E)', 61),
(629, 'Jefe De Division (E)', 61),
(630, 'Analista Profesional (Nivel 4)', 61),
(631, 'Adjunto Al Gerente (E)', 61),
(632, 'Analista Tecnico (Nivel 3)', 61),
(633, 'Corrector De Contenido (Nivel 5)', 62),
(634, 'Presentador III (Nivel 4)', 62),
(635, 'Analista (Nivel 5)', 62),
(636, 'Asistente Administrativo I (Nivel 3)', 62),
(637, 'Gerente (E)', 62),
(638, 'Analista Profesional (Nivel 4)', 62),
(639, 'Analista Profesional (Nivel 6)', 62),
(640, 'Coordinador (E)', 63),
(641, 'Jefe De Division (E)', 63),
(642, 'Documentalista Audiovisual (Nivel 5)', 63),
(643, 'Documentalista Audiovisual (Nivel 3)', 63),
(644, 'Documentalista Audiovisual (Nivel 4)', 63),
(645, 'Documentalista Audiovisual (Nivel 1)', 63),
(646, 'Documentalista Audiovisual (Nivel 2)', 63),
(647, 'Periodista III (Nivel 3)', 64),
(648, 'Periodista II (Nivel 3)', 64),
(649, 'Presentador III (Nivel 5)', 64),
(650, 'Presentador I (Nivel 3)', 64),
(651, 'Presentador II (Nivel 3)', 64),
(652, 'Presentador II (Nivel 2)', 64),
(653, 'Presentador I (Nivel 2)', 64),
(654, 'Presentador I (Nivel 2)', 64),
(655, 'Periodista III (Nivel 5)', 64),
(656, 'Periodista III (Nivel 4)', 64),
(657, 'Periodista II (Nivel 2)', 64),
(658, 'Productor III (Nivel 6)', 64),
(659, 'Corrector De Contenido (Nivel 1)', 64),
(660, 'Periodista I (Nivel 1)', 64),
(661, 'Coordinador (E)', 64),
(662, 'Jefe De Division (E)', 64),
(663, 'Coordinador (E)', 65),
(664, 'Analista (Nivel 5)', 65),
(665, 'Jefe De Division (E)', 65),
(666, 'Analista Especialista (Nivel 5)', 65),
(667, 'Ejecutivo De Ventas (Nivel 3)', 66),
(668, 'Asistente Administrativo I (Nivel 2)', 66),
(669, 'Ejecutivo De Ventas (Nivel 2)', 66),
(670, 'Jefe De Division (E)', 66),
(671, 'Ejecutivo De Ventas (Nivel 3)', 66),
(672, 'Analista Tecnico (Nivel 3)', 66),
(673, 'Asistente Administrativo I (Nivel 3)', 67),
(674, 'Analista (Nivel 2)', 67),
(675, 'Adjunto Al Gerente (E)', 67),
(676, 'Analista Profesional (Nivel 6)', 67),
(677, 'Mensajero Interno (Nivel 7)', 67),
(678, 'Analista Tecnico (Nivel 1)', 67),
(679, 'Analista (Nivel 1)', 67),
(680, 'Ejecutivo De Ventas (Nivel 3)', 66),
(681, 'Asistente Administrativo I (Nivel 2)', 66),
(682, 'Ejecutivo De Ventas (Nivel 2)', 66),
(683, 'Jefe De Division (E)', 66),
(684, 'Ejecutivo De Ventas (Nivel 3)', 66),
(685, 'Analista Tecnico (Nivel 3)', 66),
(686, 'Asistente Administrativo I (Nivel 3)', 67),
(687, 'Analista (Nivel 2)', 67),
(688, 'Adjunto Al Gerente (E)', 67),
(689, 'Analista Profesional (Nivel 6)', 67),
(690, 'Mensajero Interno (Nivel 7)', 67),
(691, 'Analista Tecnico (Nivel 1)', 67),
(692, 'Analista (Nivel 1)', 67),
(693, 'Asistente Al Vicepresidente (E)', 68),
(694, 'Vicepresidente (E)', 68),
(695, 'Coordinador (E)', 68),
(696, 'Chofer - Escolta (Nivel 1)', 68),
(697, 'Gerente', 68),
(698, 'Coordinador (E)', 69),
(699, 'Inspector De Seguridad Industrial (Nivel 3)', 70),
(700, 'Inspector De Seguridad Industrial (Nivel 2)', 70),
(701, 'Inspector De Seguridad Industrial (Nivel 5)', 70),
(702, 'Inspector De Seguridad Industrial (Nivel 1)', 70),
(703, 'Analista Tecnico (Nivel 3)', 71),
(704, 'Coordinador (E)', 71),
(705, 'Almacenista (Nivel 4)', 71),
(706, 'Analista Profesional (Nivel 1)', 71),
(707, 'Asistente Administrativo I (Nivel 3)', 71),
(708, 'Analista (Nivel 1)', 71),
(709, 'Asistente Administrativo I (Nivel 1)', 71),
(710, 'Auxiliar De Mantenimiento (Nivel 2)', 72),
(711, 'Servicios Generales Especializado (Nivel 3)', 72),
(712, 'Operario De Mantenimiento (Nivel 2)', 72),
(713, 'Auxiliar De Mantenimiento (Nivel 6)', 72),
(714, 'Auxiliar De Mantenimiento (Nivel 5)', 72),
(715, 'Servicios Generales Especializado (Nivel 5)', 72),
(716, 'Supervisor (Nivel 5)', 72),
(717, 'Supervisor (E)', 72),
(718, 'Coordinador (E)', 72),
(719, 'Ayudante De Servicios Generales (Nivel 5)', 72),
(720, 'Supervisor (Nivel 4)', 72),
(721, 'Servicios Generales Especializado (Nivel 4)', 72),
(722, 'Auxiliar De Mantenimiento (Nivel 4)', 72),
(723, 'Auxiliar De Mantenimiento (Nivel 1)', 72),
(724, 'Auxiliar De Mantenimiento (Nivel 3)', 72),
(725, 'Jefe De Division (E)', 72),
(726, 'Asistente Administrativo II (Nivel 1)', 72),
(727, 'Servicios Generales Especializado (Nivel 1)', 72),
(728, 'Operario De Mantenimiento (Nivel 1)', 72),
(729, 'Asistente Administrativo I (Nivel 1)', 72),
(730, 'Supervisor (Nivel 1)', 72),
(731, 'Operario De Talleres II (Nivel 7)', 72),
(732, 'Supervisor (Nivel 7)', 72),
(733, 'Ayudante De Servicios Generales (Nivel 3)', 72),
(734, 'Adjunto Al Gerente (E)', 73),
(735, 'Coordinador (E)', 73),
(736, 'Gerente (E)', 73),
(737, 'Analista (Nivel 3)', 73),
(738, 'Inspector De Seguridad Industrial (Nivel 2)', 73),
(739, 'Agente De Seguridad (Nivel 1)', 73),
(740, 'Asesor', 73),
(741, 'Tecnico III (Nivel 5)', 74),
(742, 'Jefe De Division (E)', 74),
(743, 'Coordinador (E)', 74),
(744, 'Tecnico II (Nivel 1)', 74),
(745, 'Analista Especialista (Nivel 5)', 75),
(746, 'Coordinador (E)', 75),
(747, 'Jefe De Division (E)', 75),
(748, 'Analista Profesional (Nivel 3)', 75),
(749, 'Gerente (E)', 75),
(750, 'Profesional II (Nivel 5)', 76),
(751, 'Analista Tecnico (Nivel 5)', 76),
(752, 'Conductor Integral De Vehiculos (Nivel 2)', 77),
(753, 'Conductor Integral De Vehiculos (Nivel 5)', 77),
(754, 'Mensajero Motorizado (Nivel 5)', 77),
(755, 'Conductor Integral De Vehiculos (Nivel 7)', 77),
(756, 'Analista Profesional (Nivel 4)', 77),
(757, 'Investigador (Nivel 2)', 77),
(758, 'Coordinador (E)', 77),
(759, 'Conductor Integral De Vehiculos (Nivel 4)', 77),
(760, 'Mecanico (Nivel 2)', 77),
(761, 'Conductor Integral De Vehiculos (Nivel 1)', 77),
(762, 'Mecanico (Nivel 1)', 77),
(763, 'Supervisor (Nivel 2)', 77),
(764, 'Asistente Mecanico (Nivel 1)', 77),
(765, 'Supervisor (Nivel 1)', 77),
(766, 'Promotor Social (Nivel 5)', 78),
(767, 'Promotor Social (Nivel 1)', 77),
(768, 'Coordinador (E)', 79),
(769, 'Programador De Pauta (Nivel 5)', 79),
(770, 'Evaluador De Contenido (Nivel 4)', 79),
(771, 'Programador De Pauta (Nivel 1)', 79),
(772, 'Asistente Tecnico Integral (Nivel 5)', 79),
(773, 'Asistente Tecnico Integral (Nivel 4)', 79),
(774, 'Camarografo I (Nivel 3)', 79),
(775, 'Camarografo III (Nivel 3)', 79),
(776, 'Camarografo Iv (Nivel 3)', 79),
(777, 'Asistente Tecnico Integral (Nivel 1)', 79),
(778, 'Camarografo I (Nivel 4)', 79),
(779, 'Promotor Social (Nivel 5)', 78),
(780, 'Promotor Social (Nivel 1)', 78),
(781, 'Coordinador (E)', 79),
(782, 'Programador De Pauta (Nivel 5)', 80),
(783, 'Evaluador De Contenido (Nivel 4)', 80),
(784, 'Programador De Pauta (Nivel 1)', 80),
(785, 'Asistente Tecnico Integral (Nivel 5)', 81),
(786, 'Asistente Tecnico Integral (Nivel 4)', 81),
(787, 'Camarografo I (Nivel 3)', 81),
(788, 'Camarografo III (Nivel 3)', 81),
(789, 'Camarografo Iv (Nivel 3)', 81),
(790, 'Asistente Tecnico Integral (Nivel 1)', 81),
(791, 'Camarografo I (Nivel 4)', 81),
(792, 'Corrector De Contenido (Nivel 2)', 82),
(793, 'Jefe De Division (E)', 82),
(794, 'Coordinador (E)', 82),
(795, 'Periodista I (Nivel 1)', 82),
(796, 'Periodista III (Nivel 1)', 82),
(797, 'Coordinador (E)', 83),
(798, 'Analista Profesional (Nivel 7)', 84),
(799, 'Agente De Seguridad (Nivel 1)', 85),
(800, 'Jubilado', 86),
(801, 'Realizador (Nivel 6)', 91),
(802, 'Realizador (Nivel 3)', 91),
(803, 'Presentador II (Nivel 3)', 91),
(804, 'Realizador (Nivel 5)', 91),
(805, 'Realizador (Nivel 5)', 91),
(806, 'Realizador (Nivel 4)', 91),
(807, 'Jefe De Division (E)', 91),
(808, 'Realizador (Nivel 4)', 91),
(809, 'Jefe De Division (E)', 91),
(810, 'Jefe De Division (E)', 87),
(811, 'Locutor II (Nivel 6)', 87),
(812, 'Locutor I (Nivel 3)', 87),
(813, 'Productor Creativo II (Nivel 3)', 87),
(814, 'Locutor I (Nivel 7)', 87),
(815, 'Locutor II (Nivel 5)', 87),
(816, 'Locutor I (Nivel 4)', 87),
(817, 'Asistente Tecnico Integral (Nivel 2)', 87),
(818, 'Productor Creativo II (Nivel 2)', 87),
(819, 'Locutor II (Nivel 4)', 87),
(820, 'Coordinador (E)', 87),
(821, 'Productor I (Nivel 1)', 87),
(822, 'Productor Creativo I (Nivel 1)', 87),
(823, 'Operador Generador De Caracteres (Nivel 1)', 87),
(824, 'Locutor I (Nivel 1)', 87),
(825, 'Camarografo I (Nivel 1)', 87),
(826, 'Jefe De Division (E)', 88),
(827, 'Musicalizador (Nivel 5)', 88),
(828, 'Musicalizador (Nivel 3)', 88),
(829, 'Coordinador (E)', 88),
(830, 'Post Productor I (Nivel 1)', 88),
(831, 'Productor III (Nivel 3)', 90),
(832, 'Productor II (Nivel 3)', 90),
(833, 'Productor I (Nivel 3)', 90),
(834, 'Productor III (Nivel 2)', 90),
(835, 'Adjunto Al Gerente (E)', 90),
(836, 'Presentador I (Nivel 3)', 90),
(837, 'Productor I (Nivel 1)', 90),
(838, 'Productor III (Nivel 5)', 90),
(839, 'Productor III (Nivel 4)', 90),
(840, 'Periodista III (Nivel 5)', 90),
(841, 'Productor II (Nivel 4)', 90),
(842, 'Productor II (Nivel 2)', 90),
(843, 'Productor II (Nivel 5)', 90),
(844, 'Periodista II (Nivel 3)', 90),
(845, 'Periodista III (Nivel 3)', 90),
(846, 'Editor II (Nivel 2)', 90),
(847, 'Periodista I (Nivel 2)', 90),
(848, 'Productor I (Nivel 2)', 90),
(849, 'Productor III (Nivel 1)', 90),
(850, 'Post Productor III (Nivel 1)', 90),
(851, 'Productor II (Nivel 1)', 90),
(852, 'Periodista II (Nivel 1)', 90),
(853, 'Presentador I (Nivel 2)', 90),
(854, 'Interprete De Lengua De Senas Venezolanas (Nivel 3)', 90),
(855, 'Interprete De Lengua De Senas Venezolanas (Nivel 1)', 90),
(856, 'Periodista III (Nivel 1)', 90),
(857, 'Productor III (Nivel 6)', 90),
(858, 'Periodista I (Nivel 1)', 90),
(859, 'Presentador III (Nivel 7)', 90),
(860, 'Camarografo Iv (Nivel 5)', 92),
(861, 'Director De Piso (Nivel 6)', 92),
(862, 'Coordinador', 92),
(863, 'Director De Piso (Nivel 3)', 92),
(864, 'Editor II (Nivel 3)', 92),
(865, 'Director De Transmisiones Especiales (Nivel 7)', 92),
(866, 'Editor II (Nivel 7)', 92),
(867, 'Asistente Tecnico Integral (Nivel 3)', 92),
(868, 'Camarografo II (Nivel 3)', 92),
(869, 'Productor I (Nivel 2)', 92),
(870, 'Camarografo II (Nivel 5)', 92),
(871, 'Camarografo III (Nivel 3)', 92),
(872, 'Camarografo III (Nivel 2)', 92),
(873, 'Director De Transmisiones Especiales (Nivel 3)', 92),
(874, 'Productor II (Nivel 3)', 92),
(875, 'Productor II (Nivel 2)', 92),
(876, 'Camarografo Iv (Nivel 6)', 92),
(877, 'Editor II (Nivel 5)', 92),
(878, 'Post Productor II (Nivel 5)', 92),
(879, 'Director De Piso (Nivel 5)', 92),
(880, 'Director Tecnico Iv (Nivel 7)', 92),
(881, 'Camarografo Iv (Nivel 7)', 92),
(882, 'Periodista I (Nivel 5)', 92),
(883, 'Camarografo Iv (Nivel 4)', 92),
(884, 'Productor III (Nivel 4)', 92),
(885, 'Editor I (Nivel 2)', 92),
(886, 'Camarografo Iv (Nivel 2)', 92),
(887, 'Asistente Tecnico Integral (Nivel 5)', 92),
(888, 'Camarografo I (Nivel 5)', 92),
(889, 'Coordinador (E)', 92),
(890, 'Camarografo Iv (Nivel 3)', 92),
(891, 'Productor II (Nivel 5)', 92),
(892, 'Productor III (Nivel 5)', 92),
(893, 'Luminotecnico I (Nivel 4)', 92),
(894, 'Productor I (Nivel 3)', 92),
(895, 'Camarografo I (Nivel 6)', 92),
(896, 'Director Tecnico De Transmisiones I (Nivel 7)', 92),
(897, 'Post Productor III (Nivel 4)', 92),
(898, 'Asistente Tecnico Integral (Nivel 1)', 92),
(899, 'Camarografo I (Nivel 1)', 92),
(900, 'Asistente Tecnico Integral (Nivel 2)', 92),
(901, 'Camarografo III (Nivel 5)', 92),
(902, 'Productor I (Nivel 1)', 92),
(903, 'Productor III (Nivel 3)', 92),
(904, 'Post Productor II (Nivel 1)', 92),
(905, 'Camarografo II (Nivel 1)', 92),
(906, 'Camarografo I (Nivel 2)', 92),
(907, 'Periodista I (Nivel 1)', 92),
(908, 'Productor III (Nivel 1)', 92),
(909, 'Editor I (Nivel 1)', 92),
(910, 'Corrector De Contenido (Nivel 1)', 92),
(911, 'Jefe De Division (E)', 92),
(912, 'Director De Piso (Nivel 1)', 92),
(913, 'Productor II (Nivel 1)', 92),
(914, 'Editor II (Nivel 1)', 92),
(915, 'Programador De Pauta (Nivel 3)', 13),
(916, 'Presidente Ejecutivo\r\n', 1),
(917, 'Pensionado', 86),
(918, 'Gerente', 58),
(919, 'Logistico (Nivel 1)', 3),
(921, 'Logistico (Nivel 2)', 3),
(922, 'Operario De Mantenimiento (Nivel 2)', 3),
(923, 'Auxiliar De Mantenimiento (Nivel 1)', 3),
(924, 'Medico Especialista (Nivel 2)', 3),
(925, 'Medico Especialista (Nivel 3)', 3),
(926, 'Medico Especialista (Nivel 4)', 3),
(927, 'Medico Especialista (Nivel 5)', 3),
(928, 'Medico Especialista (Nivel 6)', 3),
(929, 'Medico Especialista (Nivel 7)', 3),
(930, 'Supervisor (Nivel 1)', 3),
(931, 'Director Tecnico I (Nivel 2)', 4),
(932, 'Director Tecnico I (Nivel 3)', 4),
(933, 'Adjunto Al Gerente (E)', 4),
(934, 'Post Productor III (Nivel 5)', 11),
(935, 'Operario De Talleres II (Nivel 3)', 12),
(936, 'Camarografo II (Nivel 4)', 13),
(937, 'Operador De Video (Nivel 3)', 13),
(938, 'Camarografo II (Nivel 2)', 13),
(939, 'Camarografo I (Nivel 1)', 13),
(940, 'Operador De Audio I (Nivel 1)', 13),
(941, 'Coordinador (E)', 28),
(942, 'Asistente Administrativo I (Nivel 2)', 14),
(943, 'Productor I (Nivel 3)', 14),
(944, 'Analista Tecnico (Nivel 6)', 16),
(945, 'Analista Tecnico (Nivel 2)', 16),
(946, 'Electricista I (Nivel 2)', 19),
(947, 'Presentador I (Nivel 1)', 22),
(948, 'Productor III (Nivel 4)', 22),
(949, 'Productor III (Nivel 1)', 22),
(950, 'Asistente Tecnico Integral (Nivel 1)', 22),
(951, 'Interprete De Lengua De Senas Venezolanas (Nivel 3)', 22),
(952, 'Asistente Administrativo II (Nivel 3)', 25),
(953, 'Analista Profesional (Nivel 1)', 29),
(954, 'Documentalista Audiovisual (Nivel 4)', 30),
(955, 'Electricista III (Nivel 4)', 31),
(956, 'Tecnico I (Nivel 3)', 31),
(957, 'Tecnico I (Nivel 4)', 31),
(958, 'Electromecanico I (Nivel 1)', 31),
(959, 'Productor II (Nivel 2)', 32),
(960, 'Periodista III (Nivel 3)', 32),
(961, 'Periodista III (Nivel 3)', 32),
(962, 'Periodista II (Nivel 2)', 32),
(963, 'Post Productor II (Nivel 1)', 32),
(964, 'Periodista II (Nivel 1)', 32),
(965, 'Productor II (Nivel 1)', 32),
(966, 'Post Productor I (Nivel 1)', 32),
(967, 'Productor II (Nivel 3)', 32),
(968, 'Periodista II (Nivel 1)', 32),
(969, 'Asistente Administrativo I (Nivel 1)', 36),
(970, 'Periodista III (Nivel 2)', 39),
(971, 'Corrector De Contenido (Nivel 1)', 39),
(972, 'Corrector De Contenido (Nivel 4)', 39),
(973, 'Periodista II (Nivel 1)', 39),
(974, 'Periodista III (Nivel 2)', 39),
(975, 'Operadora (Nivel 5)', 40),
(976, 'Asistente De Protocolo (Nivel 1)', 45),
(977, 'Analista Profesional (Nivel 3)', 47),
(978, 'Analista (Nivel 4)', 49),
(979, 'Analista Profesional (Nivel 4)', 49),
(980, 'Analista (Nivel 1)', 49),
(981, 'Asistente Al Vicepresidente (E)', 53),
(982, 'Tecnico III (Nivel 3)', 53),
(983, 'Chofer - Escolta (Nivel 3)', 53),
(984, 'Almacenista (Nivel 1)', 54),
(985, 'Responsable De Transmisiones (Nivel 3)', 55),
(986, 'Tecnico III (Nivel 4)', 59),
(987, 'Analista Profesional (Nivel 3)', 60),
(988, 'Corrector De Contenido (Nivel 2)', 64),
(989, 'Periodista II (Nivel 1)', 64),
(990, 'Asistente Administrativo I (Nivel 1)', 65),
(991, 'Periodista III (Nivel 3)', 68),
(992, 'Investigador (Nivel 5)', 70),
(993, 'Almacenista (Nivel 5)', 71),
(994, 'Analista Profesional (Nivel 2)', 71),
(995, 'Servicios Generales Especializado (Nivel 2)', 72),
(996, 'Operario De Mantenimiento (Nivel 3)', 72),
(997, 'Agente De Seguridad (Nivel 3)', 73),
(999, 'Tecnico I (Nivel 1)', 74),
(1000, 'Operador De Audio I (Nivel 1)', 76),
(1001, 'Camarografo III (Nivel 1)', 76),
(1002, 'Tecnico III (Nivel 1)', 76),
(1003, 'Conductor Integral De Vehiculos (Nivel 3)', 77),
(1004, 'Analista Profesional (Nivel 5)', 77),
(1005, 'Asistente Administrativo I (Nivel 1)', 77),
(1006, 'Jefe De Division (E)', 77),
(1007, 'Camarografo II (Nivel 3)', 81),
(1008, 'Camarografo II (Nivel 4)', 81),
(1009, 'Periodista II (Nivel 1)', 82),
(1010, 'Periodista III (Nivel 5)', 82),
(1011, 'Corrector De Contenido (Nivel 1)', 82),
(1012, 'Investigador (Nivel 2)', 83),
(1013, 'Productor III (Nivel 3)', 87),
(1014, 'Servicios Escenograficos Especializado (Nivel 2)', 87),
(1015, 'Camarografo Iv (Nivel 1)', 87),
(1016, 'Productor Creativo II (Nivel 1)', 87),
(1023, 'Productor III (Nivel 7)', 90),
(1024, 'Coordinador (E)', 90),
(1025, 'Periodista III (Nivel 2)', 90),
(1026, 'Presentador III (Nivel 4)', 90),
(1027, 'Presentador III (Nivel 6)', 90),
(1028, 'Camarografo III (Nivel 6)', 92),
(1029, 'Post Productor II (Nivel 3)', 92),
(1030, 'Camarografo II (Nivel 2)', 92),
(1031, 'Camarografo II (Nivel 4)', 92),
(1032, 'Asistente Al Vicepresidente (E)', 92),
(1033, 'Editor II (Nivel 4)', 92),
(1034, 'Productor III (Nivel 7)', 92),
(1035, 'Jefe De Division', 93),
(1036, 'Programador De Pauta (Nivel 3)', 93),
(1037, 'Gerente (E)', 93),
(1038, 'Responsable De Transmisiones (Nivel 1)', 93),
(1040, 'Coordinador (E)', 93),
(1043, 'Evaluador De Contenido (Nivel 1)', 93),
(1044, 'Responsable De Transmisiones (Nivel 1)', 93),
(1045, 'Realizador (Nivel 3)', 94),
(1046, 'Realizador (Nivel 4)', 94),
(1047, 'Realizador (Nivel 5)', 94),
(1048, 'Realizador (Nivel 6)', 94),
(1049, 'Jefe De Division (E)', 94),
(1092, 'Productor I (Nivel 1)', 11),
(1093, 'Asesor', 35),
(1100, 'Maquillador', 8),
(1102, 'Analista Tecnico (Nivel I)', 16),
(1103, 'Productor III (Nivel 3)', 92),
(1104, 'Carpintero', 12),
(1105, 'Coordinador', 82),
(1106, 'Coordinador', 11),
(1107, 'Asistente Administrativo L (Nivel 1)', 27),
(1108, 'Jefe De División (E)', 23),
(1109, 'Técnico I (Nivel 1)', 23),
(1110, 'Técnico I (Nivel 2)', 23),
(1111, 'Técnico I (Nivel 3)', 23),
(1112, 'Técnico I (Nivel 4 )', 23),
(1113, 'Técnico II (Nivel 1)', 23),
(1114, 'Técnico II (Nivel 2)', 23),
(1115, 'Técnico II (Nivel 3)', 23),
(1116, 'Técnico II (Nivel 4)', 23),
(1117, 'Técnico III (Nivel 1)', 23),
(1118, 'Técnico III (Nivel 2)', 23),
(1119, 'Técnico III (Nivel 3)', 23),
(1120, 'Técnico III (Nivel 4)', 23),
(1121, 'Electricista I (Nivel 1)', 72),
(1122, 'Conductor Integral De Vehiculos (Nivel 1)', 72),
(1123, 'Asistente Administrativo II (Nivel 1)', 36),
(1124, 'Tecnico II (Nivel 1)', 58),
(1125, 'Analista (Nivel 1)', 61),
(1126, 'Periodista III (Paso 1)', 39),
(1127, 'Camarografo I (Paso 1)', 13),
(1128, 'Corrector De Contenido (Paso I)', 39),
(1129, 'Ayudante De Cocina (Medio) (Paso I)', 3),
(1130, 'Auditor Integral (Paso I)', 2),
(1131, 'Asistente Tecnico Integral (Nivel 1)', 90),
(1132, 'Camarografo I (Nivel 1)', 28),
(1133, 'Promotor Deportivo I (Nivel 2)', 3),
(1134, 'Psicologo (Nivel 3)', 3),
(1135, 'Productor III (Nivel 1)', 32),
(1136, 'Supervisor (Nivel 2)', 3),
(1137, 'Profesional I (Nivel 1)', 31),
(1138, 'Periodista II (Nivel 5)', 21),
(1139, 'Periodista II (Nivel 5)', 21),
(1140, 'Asistente Administrativo I (Nivel 1)', 3),
(1141, 'Mensajero Interno (Nivel 1)', 3),
(1142, 'Promotor Deportivo II (Nivel 2)', 3),
(1143, 'Archivista (Paso I)', 25),
(1144, 'Asistente Administrativo I (Nivel 2)', 46),
(1145, 'Enfermera (Paso 1)', 3),
(1146, 'Ayudante De Cocina (Medio) (Paso I) | Ayudante De Cocina (Paso I)', 3),
(1147, 'Documentalista Audiov. I (Paso I)', 30),
(1148, 'Documentalista Audiovisual II (Paso I)', 30),
(1149, 'Asistente Al Vicepresidente', 35),
(1150, 'Analista Especialista (Nivel 3)', 35),
(1151, 'Fotografo (Nivel 2)', 35),
(1152, 'Ayudante De Cocina (Medio) (Paso I) | Ayudante De Cocina (Paso I)', 35),
(1153, 'Presidente Ejecutivo', 35),
(1154, 'Adjunto Al Presidente', 35),
(1155, 'Productor Creativo I (Paso I)', 35),
(1156, 'Jefe De Cocina (E)', 35),
(1157, 'Productor III (Nivel 1)', 35),
(1158, 'Analista I (Paso I)', 1),
(1159, 'Jefe De Division', 53),
(1160, 'Asistente Administrativo I (Paso I)', 53),
(1161, 'Operador De Audio II (Paso I)', 53),
(1162, 'Camarografo III (Nivel 1)', 53),
(1163, 'Analista II (Paso I)', 68),
(1164, 'Operario De Talleres II (Nivel 4)', 14),
(1165, 'Maquillador Peluquero I (Nivel 1)', 26),
(1166, 'Analista Tecnico (Nivel 3)', 7),
(1167, 'Ayudante De Cocina (Medio) (Paso I)', 48),
(1168, 'Ayudante De Cocina (Nivel 1)', 48),
(1169, 'Supervisor Paso 4', 48),
(1170, 'Analista Tecnico (Nivel 4)', 75),
(1171, 'Analista Profesional (Nivel 7)', 17),
(1172, 'Analista Tecnico (Nivel 1)', 17),
(1173, 'Programador De Pauta (Nivel 1)', 93),
(1174, 'Analista Profesional (Nivel 1)', 61),
(1175, 'Profesional II (Nivel 2)', 61),
(1176, 'Asistente Administrativo I (Paso I)', 61),
(1177, 'Asistente Administrativo I (Nivel 2)', 71),
(1178, 'Analista (Nivel 1)', 47),
(1179, 'Asistente Administrativo I (Nivel 1)', 43),
(1180, 'Post Productor III (Nivel 6)', 92),
(1181, 'Realizador (Paso I)', 56),
(1182, 'Tecnico I (Nivel 1)', 5),
(1183, 'Camarografo I (Nivel 3)', 92),
(1184, 'Profesional I (Nivel 4)', 9),
(1185, 'Tecnico I (Nivel 5)', 52),
(1186, 'Operador Integral (Nivel 1)', 9),
(1187, 'Productor III (Nivel 5)', 64),
(1188, 'Productor III (Nivel 7)', 90),
(1189, 'Jefe De Division', 82),
(1190, 'Asistente Administrativo I (Nivel 3)', 15),
(1191, 'Productor 1 (Nivel 3)', 11),
(1192, 'Periodista I', 11),
(1193, 'Periodista I', 39),
(1194, 'Periodista III (Nivel 1)', 15),
(1195, 'Coordinador', 70),
(1196, 'Inspector De Seguridad Industrial (Nivel 2)', 40),
(1197, 'Operadora (Nivel 2)', 40),
(1198, 'Jefe De Division (E)', 73),
(1199, 'Adjunto Al Gerente', 40),
(1200, 'Adjunto Al Gerente', 73),
(1201, 'Auditor Integral (Nivel 3)', 50),
(1202, 'Auditor Integral (Nivel 1)', 50),
(1203, 'Periodista II (Nivel 2)', 21),
(1204, 'Adjunto Al Gerente', 21),
(1205, 'Periodista III (Nivel1)', 22),
(1206, 'Asistente Administrativo I (Nivel 1)', 35),
(1207, 'Productor I (Nivel 1)', 92),
(1208, 'Periodista II (Nivel 1)', 64),
(1209, 'Asistente Tecnico Integral (Nivel 1)', 13),
(1210, 'Facilitador (Nivel 1)', 3),
(1211, 'Analista (Nivel 1)', 15),
(1212, 'Asistente Administrativo I (Nivel 1)', 24),
(1213, 'Supervisor De Logística (Nivel 1)', 3),
(1214, 'Supervisor De Cocina (Nivel 1)', 3),
(1215, 'Analista (Nivel 3)', 27),
(1216, 'Director Tecnico I (Nivel 3)', 92),
(1217, 'Ayudante De Servicios Generales (Nivel 1)', 72),
(1218, 'Supervisor (E)', 49),
(1219, 'Director Tecnico I (Nivel 1)', 92),
(1220, 'Coordinador (E)', 18),
(1221, 'Coordinador (E)', 66),
(1222, 'Chofer - Escolta (Nivel 5)', 68),
(1223, 'Analista Profesional (Nivel 4)', 68),
(1224, 'Chofer - Escolta (Nivel 4)', 68),
(1225, 'Asistente Administrativo I (Nivel 1)', 49),
(1226, '	Asistente Administrativo II (Nivel 1)', 5),
(1227, 'Mensajero Motorizado (Nivel 1)', 77),
(1228, 'Periodista III (Nivel 2)', 22),
(1229, 'Agente De Seguridad (Nivel 7)', 40),
(1230, 'Operadora (Nivel 6)', 40),
(1231, 'Corrector De Contenido (Nivel 5)	', 11),
(1232, 'Periodista II (Nivel 4)', 64),
(1233, 'Periodista II (Nivel 4)', 64),
(1234, 'Realizador (Nivel 4)', 81),
(1235, 'Camarografo III (Nivel 4)', 81),
(1236, 'Camarografo Iv (Nivel 4)', 81),
(1237, 'Presentador III (Nivel 5)', 62),
(1238, 'Presentador I (Nivel 3)', 62),
(1239, 'Presentador II (Nivel 3)', 62),
(1240, 'Presentador II (Nivel 2)', 62),
(1241, 'Presentador I (Nivel 2)', 62),
(1242, 'Productor III (Nivel 2)', 90),
(1243, 'Post Productor III (Nivel 1)', 62),
(1244, 'Adjunto Al Gerente (E)', 62),
(1245, 'Periodista III (Nivel 2)', 64),
(1246, 'Asistente Tecnico Integral (Nivel 2)', 81),
(1247, 'Periodista II (Nivel 3)', 64),
(1248, 'Interprete De Lengua De Senas Venezolanas (Nivel 1)', 62),
(1249, 'Interprete De Lengua De Senas Venezolanas (Nivel 3)', 62),
(1250, 'Periodista I (Nivel 1)', 90),
(1251, 'Editor II (Nivel 1)', 90),
(1252, 'Periodista I (Nivel 3)', 64),
(1253, 'Post Productor III (Nivel 4)', 90),
(1254, 'Presentador III (Nivel 6)', 62),
(1255, 'Analista Profesional (Nivel 7)', 62),
(1256, 'Presentador III (Nivel 7)', 62),
(1257, 'Presentador III (Nivel 3)', 62),
(1258, 'Presentador I (Nivel 1)', 90),
(1259, 'Analista Técnico (Nivel 1)', 10),
(1260, 'Gerente', 5),
(1261, 'Editor I (Nivel 1)', 15),
(1262, 'Analista Profesional (Nivel 1)', 35),
(1263, 'Asistente Administrativo I (Nivel 1)', 93),
(1265, 'Analista Profesional (Nivel 1)', 35),
(1266, 'Asistente Administrativo I (Nivel 1)', 93),
(1267, 'Analista Administrativo (Nivle1)', 35),
(1268, 'Productor III (Nivel 1)', 1),
(1269, 'Electromecánico I (Nivel 1)', 72),
(1270, 'Responsable De Transmisiones', 93),
(1271, 'Electricista I (Nivel 1)', 19),
(1272, 'Camarografo II (Nivel 1)', 13),
(1273, 'Ejecitivo De Ventas ( Nivel 1)', 66),
(1274, 'Jefe Division (E)', 37),
(1275, 'Periodista I (Nivel 2)', 22),
(1276, 'Analista', 76),
(1277, 'Camarografo Iv', 53),
(1278, 'Tecnico Ii', 53),
(1279, 'Mecanico', 53),
(1280, 'Tecnico Almacenista', 53),
(1281, 'Odontologo (Nivel 1)', 3),
(1282, 'Higienista Dental (Nivel 1)', 3),
(1283, 'Fisioterapeuta (Nivel 3', 3),
(1284, 'Operario De Mantenimiento (Nivel 1)', 72),
(1285, 'Almacenista (Nivel 1)', 72),
(1286, 'Facilitador (Nivel 1)', 65),
(1287, 'Productor I (Nivel 1)', 68),
(1288, 'Terapista Ocupacional (Nivel 1)', 3),
(1289, 'Coordinador De Mesa De Ayuda', 24),
(1290, 'Periodista I (Nivel 1)', 15),
(1291, 'Asignador I (Nivel 1)', 21),
(1292, 'Abogado Sustanciador (Nivel 1)', 38),
(1293, 'Analista Especialista  (Nivel 1)', 25),
(1294, 'Ejecutivo de Ventas (Nivel 5)', 66),
(1296, 'Zprueba', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_equipo`
--

CREATE TABLE `detalle_equipo` (
  `ID_Detalle_Equipo` int NOT NULL,
  `FK_Equipo` int NOT NULL,
  `FK_Marca` int NOT NULL,
  `FK_Modelo` int NOT NULL,
  `FK_Estado` int NOT NULL,
  `Bien_nacional` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `FK_Ubicacion` int NOT NULL,
  `img_equipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `detalle_equipo`
--

INSERT INTO `detalle_equipo` (`ID_Detalle_Equipo`, `FK_Equipo`, `FK_Marca`, `FK_Modelo`, `FK_Estado`, `Bien_nacional`, `serial`, `FK_Ubicacion`, `img_equipo`) VALUES
(65, 6, 10, 9, 2, 'vtv-554321', '12345', 24, '../../assets/img/img_equipos/65.png'),
(75, 6, 9, 25, 2, '12345', '12345-vtv', 24, '../../assets/img/img_equipos/75.png'),
(76, 7, 10, 28, 2, '12345-vtv', 'prueba-123', 24, '../../assets/img/img_equipos/76.png'),
(77, 6, 10, 9, 1, '12345-vtvt', 'y67yui', 23, '../../assets/img/img_equipos/77.png'),
(78, 7, 12, 27, 2, 'test-1', 'test-1', 24, '../../assets/img/img_equipos/78.jpeg'),
(79, 6, 9, 26, 5, 'test-2', 'test-2', 24, '../../assets/img/img_equipos/79.png'),
(80, 6, 9, 25, 2, 'grdgf', 'hgfhgf', 24, '../../assets/img/img_equipos/80.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Divisiones`
--

CREATE TABLE `Divisiones` (
  `ID_division` int NOT NULL,
  `N_division` varchar(60) NOT NULL,
  `FKEY_gerencia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Divisiones`
--

INSERT INTO `Divisiones` (`ID_division`, `N_division`, `FKEY_gerencia`) VALUES
(1, 'VicePresidencia Ejecutiva', 6),
(2, 'Determinación de Responsabilidades', 12),
(3, 'Beneficios', 2),
(4, 'Apoyo Logístico', 21),
(5, 'G. Servicios Informativos', 22),
(6, 'VicePresidencia Ejecutiva de Producción', 26),
(7, 'Tesorería', 10),
(8, 'Maquillaje y Vestuario', 4),
(9, 'Control Central', 8),
(10, 'Finanzas', 10),
(11, 'Producción', 5),
(12, 'Escenografía', 4),
(13, 'Operaciones', 21),
(14, 'G. Imagen', 4),
(15, 'G. Multimedios', 5),
(16, 'Gestión de Pagos', 2),
(17, 'Planificación', 14),
(18, 'G. Comercialización y Ventas', 18),
(19, 'Exteriores', 21),
(20, 'Coordinación de Litigios', 16),
(21, 'Redacción', 22),
(22, 'Asignaciones', 22),
(23, 'Desarrollo de Sistemas', 9),
(24, 'Soporte Técnico y Mesa De Ayuda', 9),
(25, 'G. Gestión Humana', 2),
(26, 'Grafismo', 4),
(27, 'Unidad de Auditoría Interna', 12),
(28, 'G. Servicios a la Producción', 21),
(29, 'G. Administración y Finanzas', 10),
(30, 'Archivo de Prensa', 11),
(31, 'Infraestructura', 3),
(32, 'Investigación y Temáticos', 22),
(33, 'Coordinación Participación Ciudadana', 17),
(34, 'G. Archivo Audiovisual', 11),
(35, 'Presidencia Ejecutiva', 1),
(36, 'Almacén Técnico', 8),
(37, 'G. Programación', 15),
(38, 'Consultoría Jurídica', 16),
(39, 'Web', 5),
(40, 'Seguridad de Activos e Infraestructura', 13),
(41, 'Coordinación Pautas Comerciales', 18),
(42, 'Ofic. Atención Ciudadana', 17),
(43, 'Coordinación de Protocolo', 20),
(44, 'Coordinación de Contratos', 16),
(45, 'G. Asuntos Públicos', 20),
(46, 'Relaciones Laborales', 2),
(47, 'Compras y Servicios', 19),
(48, 'Coordinación de Logística', 10),
(49, 'G. Infraestructura y Servicios Generales', 3),
(50, 'Control Posterior', 12),
(51, 'G. Ingeniería', 8),
(52, 'Ingeniería de Planta', 8),
(53, 'ViceP. de Soporte Tecnológico', 24),
(54, 'Unidad de Almacén', 3),
(55, 'Gestión de Contenidos', 15),
(56, 'Realización', 22),
(57, 'Post Producción', 21),
(58, 'G. Tecnología de La Comunicación e Información', 9),
(59, 'Redes y Servidores', 9),
(60, 'Planificación de Gestión Humana', 2),
(61, 'Contrataciones', 19),
(62, 'G. Programas', 7),
(63, 'Archivo de Programación', 11),
(64, 'Contenido y Asignaciones', 7),
(65, 'Formación y Desarrollo', 2),
(66, 'Ventas', 18),
(67, 'G. Planificación y Presupuesto', 14),
(68, 'VicePresidencia Ejecutiva de Información', 25),
(69, 'Coordinación de Asuntos Laborales', 16),
(70, 'Coordinación Seguridad Industrial Lopcymat', 13),
(71, 'G. Contrataciones Públicas', 19),
(72, 'Servicios Generales', 3),
(73, 'G. Seguridad Integral', 13),
(74, 'Soporte Multimedia', 9),
(75, 'Presupuesto', 14),
(76, 'VicePresidencia de Soporte Tecnológico', 24),
(77, 'Transporte', 3),
(78, 'Coordinación Responsabilidad Social', 17),
(79, 'Coordinación de Comunicaciones Corporativas', 20),
(80, 'Programación', 15),
(81, 'Comunicación Estratégica', 7),
(82, 'Redes Sociales', 5),
(83, 'Unidad de Investigación', 13),
(84, 'Unidad de Archivo Central', 10),
(85, 'Seguridad', 13),
(86, 'Jubilados y Pensionados', 2),
(87, 'Producción', 4),
(88, 'Post Producción', 4),
(90, 'Producción', 7),
(91, 'Realización', 7),
(92, 'Producción\r\n', 22),
(93, 'Operaciones', 15),
(94, 'Realización ', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleados`
--

CREATE TABLE `Empleados` (
  `ID_empleado` int NOT NULL,
  `p_Nombre_empleado` varchar(60) NOT NULL,
  `s_Nombre_empleado` varchar(60) NOT NULL,
  `p_Apellido_empleado` varchar(60) NOT NULL,
  `s_Apellido_empleado` varchar(60) NOT NULL,
  `cedula` int NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `extension` varchar(50) NOT NULL,
  `FKEY_gerencia` int NOT NULL,
  `FKEY_division` int NOT NULL,
  `FKEY_cargo` int NOT NULL,
  `correo` varchar(60) NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Empleados`
--

INSERT INTO `Empleados` (`ID_empleado`, `p_Nombre_empleado`, `s_Nombre_empleado`, `p_Apellido_empleado`, `s_Apellido_empleado`, `cedula`, `telefono`, `extension`, `FKEY_gerencia`, `FKEY_division`, `FKEY_cargo`, `correo`, `foto`) VALUES
(1, 'Jose', 'Alejandro', 'Arocha', 'Paez', 31187173, '04124174258', '1642', 9, 24, 366, 'jaarocha@vtv.gob.ve', '../../assets/img/img_user/1.jpeg'),
(13, 'Keiler', 'Octavio', 'Duran', 'Ramirez', 17123114, '04124445522', '8', 9, 24, 369, 'KDURAN@VTV.GOB.VE', '../../assets/img/img_user/13.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Equipos`
--

CREATE TABLE `Equipos` (
  `ID_Equipo` int NOT NULL,
  `N_Equipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Equipos`
--

INSERT INTO `Equipos` (`ID_Equipo`, `N_Equipo`) VALUES
(6, 'Celular'),
(7, 'Laptop'),
(8, 'Repetidor WIFI'),
(9, 'ROUTER'),
(10, 'MONITOR'),
(11, 'Computador'),
(12, 'Camara');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_accesorio`
--

CREATE TABLE `equipo_accesorio` (
  `ID_Equipo_accesorio` int NOT NULL,
  `FK_accesorio` int NOT NULL,
  `FK_equipo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `equipo_accesorio`
--

INSERT INTO `equipo_accesorio` (`ID_Equipo_accesorio`, `FK_accesorio`, `FK_equipo`) VALUES
(1, 1, 6),
(2, 1, 7),
(4, 2, 6),
(8, 5, 6),
(3, 5, 7),
(6, 6, 11),
(9, 7, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_accesorio_asig`
--

CREATE TABLE `equipo_accesorio_asig` (
  `ID_accesorio_asig` int NOT NULL,
  `FK_accesorio_asg` int NOT NULL,
  `FK_equipo_asg` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `equipo_accesorio_asig`
--

INSERT INTO `equipo_accesorio_asig` (`ID_accesorio_asig`, `FK_accesorio_asg`, `FK_equipo_asg`) VALUES
(18, 1, 51),
(23, 1, 55),
(19, 2, 52),
(20, 2, 53),
(21, 2, 54),
(17, 5, 50),
(22, 5, 54),
(24, 5, 55),
(25, 5, 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_asig`
--

CREATE TABLE `equipo_asig` (
  `ID_Equipo_asig` int NOT NULL,
  `fkey_equipo` int NOT NULL,
  `fkey_asig` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `equipo_asig`
--

INSERT INTO `equipo_asig` (`ID_Equipo_asig`, `fkey_equipo`, `fkey_asig`) VALUES
(42, 65, 50),
(43, 65, 51),
(46, 65, 54),
(47, 76, 55),
(44, 77, 52),
(48, 78, 56),
(45, 79, 53);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_asignaciones`
--

CREATE TABLE `estado_asignaciones` (
  `id_estado_asig` int NOT NULL,
  `N_Estado` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estado_asignaciones`
--

INSERT INTO `estado_asignaciones` (`id_estado_asig`, `N_Estado`) VALUES
(1, 'Entregado'),
(2, 'Reincorporado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estado_equipo`
--

CREATE TABLE `Estado_equipo` (
  `ID_Estado` int NOT NULL,
  `Estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Estado_equipo`
--

INSERT INTO `Estado_equipo` (`ID_Estado`, `Estado`) VALUES
(1, 'Asignado'),
(2, 'Bueno'),
(3, 'Dañado'),
(4, 'Prestado'),
(5, 'Recuperable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_linea`
--

CREATE TABLE `estado_linea` (
  `ID_Estado_linea` int NOT NULL,
  `N_estado_linea` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estado_linea`
--

INSERT INTO `estado_linea` (`ID_Estado_linea`, `N_estado_linea`) VALUES
(1, 'Activo'),
(5, 'Prestado'),
(6, 'Asignado'),
(7, 'Bloqueada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_usuarios`
--

CREATE TABLE `estado_usuarios` (
  `id_status_user` int NOT NULL,
  `estado_usuario` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estado_usuarios`
--

INSERT INTO `estado_usuarios` (`id_status_user`, `estado_usuario`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Bloqueado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Gerencia`
--

CREATE TABLE `Gerencia` (
  `ID_gerencia` int NOT NULL,
  `N_gerencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Gerencia`
--

INSERT INTO `Gerencia` (`ID_gerencia`, `N_gerencia`) VALUES
(1, 'Presidencia Ejecutiva'),
(2, 'Gestion Humana'),
(3, 'Infraestructura y Servicios Generales'),
(4, 'Imagen'),
(5, 'Multimedia'),
(6, 'Vicepresidencia Ejecutiva'),
(7, 'Programas'),
(8, 'Ingenieria'),
(9, 'Tecnologia'),
(10, 'Administracion y Finanzas'),
(11, 'Archivo Audiovisual'),
(12, 'Unidad de Auditoria Interna'),
(13, 'Seguridad Integral'),
(14, 'Planificacion y Presupuesto'),
(15, 'Programacion'),
(16, 'Consultoria Juridica'),
(17, 'Oficina de Atencion Ciudadana'),
(18, 'Comercializacion y Ventas'),
(19, 'Contrataciones Publicas'),
(20, 'Asuntos Publicos'),
(21, 'Servicios a La Produccion'),
(22, 'Servicios Informativos'),
(24, 'Vicepresidencia de Soporte Tecnologico'),
(25, 'Vicepresidencia de Informacion'),
(26, 'Vicepresidencia Ejecutiva de Produccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Lineas`
--

CREATE TABLE `Lineas` (
  `ID_Linea` int NOT NULL,
  `FKEY_Linea` int NOT NULL,
  `FKEY_Operadora` int NOT NULL,
  `FKEY_Estado` int NOT NULL,
  `FK_Ubicacion` int NOT NULL,
  `Numero` varchar(50) NOT NULL,
  `Cod_puk` varchar(50) NOT NULL,
  `Pin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Lineas`
--

INSERT INTO `Lineas` (`ID_Linea`, `FKEY_Linea`, `FKEY_Operadora`, `FKEY_Estado`, `FK_Ubicacion`, `Numero`, `Cod_puk`, `Pin`) VALUES
(28, 5, 6, 1, 24, '0414417425', '0000', '0000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Lineas_asignadas`
--

CREATE TABLE `Lineas_asignadas` (
  `ID_Linea_asignada` int NOT NULL,
  `fkey_linea` int NOT NULL,
  `fkey_asig_lineas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Marcas`
--

CREATE TABLE `Marcas` (
  `id_Marca` int NOT NULL,
  `N_Marca` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Marcas`
--

INSERT INTO `Marcas` (`id_Marca`, `N_Marca`) VALUES
(9, 'SAMSUNG'),
(10, 'APPLE'),
(11, 'TP-LINK'),
(12, 'ASUS'),
(13, 'RAZER'),
(14, 'LENOVO'),
(21, 'prueba1'),
(25, 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas_equipos`
--

CREATE TABLE `marcas_equipos` (
  `ID_marca_equipo` int NOT NULL,
  `FKEY_Marca` int NOT NULL,
  `FKEY_Equipo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `marcas_equipos`
--

INSERT INTO `marcas_equipos` (`ID_marca_equipo`, `FKEY_Marca`, `FKEY_Equipo`) VALUES
(1, 9, 6),
(6, 9, 6),
(14, 9, 6),
(19, 9, 6),
(20, 9, 6),
(2, 9, 7),
(3, 10, 6),
(17, 10, 6),
(18, 10, 6),
(4, 10, 7),
(5, 10, 7),
(7, 10, 7),
(15, 10, 7),
(22, 10, 7),
(16, 10, 9),
(12, 10, 11),
(8, 11, 8),
(9, 11, 9),
(11, 12, 6),
(10, 12, 7),
(21, 12, 7),
(13, 14, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Modelo`
--

CREATE TABLE `Modelo` (
  `ID_Modelo` int NOT NULL,
  `N_Modelo` varchar(255) NOT NULL,
  `FK_Marca_equipo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Modelo`
--

INSERT INTO `Modelo` (`ID_Modelo`, `N_Modelo`, `FK_Marca_equipo`) VALUES
(9, 'Iphone 13', 3),
(25, 's23 ultra', 19),
(26, 'A 55', 20),
(27, 'rog strix a16', 21),
(28, 'M1', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Operadoras`
--

CREATE TABLE `Operadoras` (
  `ID_Operadora` int NOT NULL,
  `N_Operadora` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Operadoras`
--

INSERT INTO `Operadoras` (`ID_Operadora`, `N_Operadora`) VALUES
(4, 'Movilnet'),
(5, 'Interna'),
(6, 'Movistar'),
(14, 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Roles`
--

CREATE TABLE `Roles` (
  `ID_rol` int NOT NULL,
  `Rol_user` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Roles`
--

INSERT INTO `Roles` (`ID_rol`, `Rol_user`) VALUES
(1, 'Administrador'),
(2, 'Coordinador'),
(3, 'Tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_asignacion`
--

CREATE TABLE `tipo_asignacion` (
  `ID_tipo_asig` int NOT NULL,
  `N_tipo_asig` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_asignacion`
--

INSERT INTO `tipo_asignacion` (`ID_tipo_asig`, `N_tipo_asig`) VALUES
(1, 'Asignacion'),
(2, 'Prestamo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_linea`
--

CREATE TABLE `tipo_linea` (
  `ID_tipolinea` int NOT NULL,
  `N_tipolinea` varchar(60) NOT NULL,
  `FK_operadora` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_linea`
--

INSERT INTO `tipo_linea` (`ID_tipolinea`, `N_tipolinea`, `FK_operadora`) VALUES
(2, 'GSM', 6),
(3, 'GSM', 5),
(5, 'EDGE', 6),
(7, 'IPprueba1', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_asg_ret`
--

CREATE TABLE `user_asg_ret` (
  `ID_user` int NOT NULL,
  `FK_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `ID_usuario` int NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `FKEY_empleado` int NOT NULL,
  `FKEY_ROL` int NOT NULL,
  `FK_estado_u` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`ID_usuario`, `usuario`, `contraseña`, `FKEY_empleado`, `FKEY_ROL`, `FK_estado_u`) VALUES
(1, 'Jarocha', 'Vtv123456*', 1, 1, 1),
(18, 'pruebat', 'Vtv123456*', 13, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Accesorios`
--
ALTER TABLE `Accesorios`
  ADD PRIMARY KEY (`ID_Accesorio`);

--
-- Indices de la tabla `Asignaciones`
--
ALTER TABLE `Asignaciones`
  ADD PRIMARY KEY (`ID_Asignado`),
  ADD KEY `E_L_Asignado` (`Responsable`,`Solicitante`,`Ubicacion`),
  ADD KEY `Ubicacion` (`Ubicacion`),
  ADD KEY `Solicitante` (`Solicitante`),
  ADD KEY `status` (`status`),
  ADD KEY `status_eq_asg` (`status_eq_asg`),
  ADD KEY `tipo_asg` (`tipo_asg`),
  ADD KEY `Responsable_ret` (`Responsable_ret`);

--
-- Indices de la tabla `asig_lineas`
--
ALTER TABLE `asig_lineas`
  ADD PRIMARY KEY (`ID_Linea_asig`),
  ADD KEY `responsable` (`responsable`,`solicitante`,`ubicacion`),
  ADD KEY `responsable_2` (`responsable`,`solicitante`,`ubicacion`),
  ADD KEY `solicitante` (`solicitante`),
  ADD KEY `ubicacion` (`ubicacion`),
  ADD KEY `status` (`status`),
  ADD KEY `estado_linea_asg` (`estado_linea_asg`,`tipo_asg`),
  ADD KEY `tipo_asg` (`tipo_asg`),
  ADD KEY `responsable_ret` (`responsable_ret`);

--
-- Indices de la tabla `Cargos`
--
ALTER TABLE `Cargos`
  ADD PRIMARY KEY (`ID_cargo`),
  ADD KEY `FKEY_division` (`FKEY_division`);

--
-- Indices de la tabla `detalle_equipo`
--
ALTER TABLE `detalle_equipo`
  ADD PRIMARY KEY (`ID_Detalle_Equipo`),
  ADD KEY `FK_Equipo` (`FK_Equipo`),
  ADD KEY `FK_Marca` (`FK_Marca`,`FK_Modelo`,`FK_Estado`,`FK_Ubicacion`),
  ADD KEY `FK_Modelo` (`FK_Modelo`),
  ADD KEY `FK_Estado` (`FK_Estado`),
  ADD KEY `FK_Ubicacion` (`FK_Ubicacion`);

--
-- Indices de la tabla `Divisiones`
--
ALTER TABLE `Divisiones`
  ADD PRIMARY KEY (`ID_division`),
  ADD KEY `FKEY_gerencia` (`FKEY_gerencia`);

--
-- Indices de la tabla `Empleados`
--
ALTER TABLE `Empleados`
  ADD PRIMARY KEY (`ID_empleado`),
  ADD KEY `FKEY_gerencia` (`FKEY_gerencia`,`FKEY_division`,`FKEY_cargo`),
  ADD KEY `FKEY_division` (`FKEY_division`),
  ADD KEY `FKEY_cargo` (`FKEY_cargo`);

--
-- Indices de la tabla `Equipos`
--
ALTER TABLE `Equipos`
  ADD PRIMARY KEY (`ID_Equipo`);

--
-- Indices de la tabla `equipo_accesorio`
--
ALTER TABLE `equipo_accesorio`
  ADD PRIMARY KEY (`ID_Equipo_accesorio`),
  ADD KEY `FK_accesorio` (`FK_accesorio`,`FK_equipo`),
  ADD KEY `FK_equipo` (`FK_equipo`);

--
-- Indices de la tabla `equipo_accesorio_asig`
--
ALTER TABLE `equipo_accesorio_asig`
  ADD PRIMARY KEY (`ID_accesorio_asig`),
  ADD KEY `FK_accesorio_asg` (`FK_accesorio_asg`,`FK_equipo_asg`),
  ADD KEY `FK_accesorio_asg_2` (`FK_accesorio_asg`,`FK_equipo_asg`),
  ADD KEY `FK_equipo_asg` (`FK_equipo_asg`);

--
-- Indices de la tabla `equipo_asig`
--
ALTER TABLE `equipo_asig`
  ADD PRIMARY KEY (`ID_Equipo_asig`),
  ADD KEY `fkey_equipo` (`fkey_equipo`,`fkey_asig`),
  ADD KEY `fkey_asig` (`fkey_asig`);

--
-- Indices de la tabla `estado_asignaciones`
--
ALTER TABLE `estado_asignaciones`
  ADD PRIMARY KEY (`id_estado_asig`);

--
-- Indices de la tabla `Estado_equipo`
--
ALTER TABLE `Estado_equipo`
  ADD PRIMARY KEY (`ID_Estado`);

--
-- Indices de la tabla `estado_linea`
--
ALTER TABLE `estado_linea`
  ADD PRIMARY KEY (`ID_Estado_linea`);

--
-- Indices de la tabla `estado_usuarios`
--
ALTER TABLE `estado_usuarios`
  ADD PRIMARY KEY (`id_status_user`);

--
-- Indices de la tabla `Gerencia`
--
ALTER TABLE `Gerencia`
  ADD PRIMARY KEY (`ID_gerencia`);

--
-- Indices de la tabla `Lineas`
--
ALTER TABLE `Lineas`
  ADD PRIMARY KEY (`ID_Linea`),
  ADD KEY `FKEY_Linea` (`FKEY_Linea`,`FKEY_Operadora`,`FKEY_Estado`),
  ADD KEY `FKEY_Operadora` (`FKEY_Operadora`),
  ADD KEY `FKEY_Estado` (`FKEY_Estado`),
  ADD KEY `FK_Ubicacion` (`FK_Ubicacion`);

--
-- Indices de la tabla `Lineas_asignadas`
--
ALTER TABLE `Lineas_asignadas`
  ADD PRIMARY KEY (`ID_Linea_asignada`),
  ADD KEY `fkey_linea` (`fkey_linea`,`fkey_asig_lineas`),
  ADD KEY `fkey_lina_aasig` (`fkey_linea`,`fkey_asig_lineas`),
  ADD KEY `fkey_asig_lineas` (`fkey_asig_lineas`);

--
-- Indices de la tabla `Marcas`
--
ALTER TABLE `Marcas`
  ADD PRIMARY KEY (`id_Marca`);

--
-- Indices de la tabla `marcas_equipos`
--
ALTER TABLE `marcas_equipos`
  ADD PRIMARY KEY (`ID_marca_equipo`),
  ADD KEY `FKEY_Marca` (`FKEY_Marca`,`FKEY_Equipo`),
  ADD KEY `FKEY_Equipo` (`FKEY_Equipo`);

--
-- Indices de la tabla `Modelo`
--
ALTER TABLE `Modelo`
  ADD PRIMARY KEY (`ID_Modelo`),
  ADD KEY `FK_Marca` (`FK_Marca_equipo`);

--
-- Indices de la tabla `Operadoras`
--
ALTER TABLE `Operadoras`
  ADD PRIMARY KEY (`ID_Operadora`);

--
-- Indices de la tabla `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`ID_rol`);

--
-- Indices de la tabla `tipo_asignacion`
--
ALTER TABLE `tipo_asignacion`
  ADD PRIMARY KEY (`ID_tipo_asig`);

--
-- Indices de la tabla `tipo_linea`
--
ALTER TABLE `tipo_linea`
  ADD PRIMARY KEY (`ID_tipolinea`),
  ADD KEY `FK_operadora` (`FK_operadora`);

--
-- Indices de la tabla `user_asg_ret`
--
ALTER TABLE `user_asg_ret`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `FK_user` (`FK_user`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD KEY `FKEY_empleado` (`FKEY_empleado`,`FKEY_ROL`),
  ADD KEY `FKEY_ROL` (`FKEY_ROL`),
  ADD KEY `FK_estado_u` (`FK_estado_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Accesorios`
--
ALTER TABLE `Accesorios`
  MODIFY `ID_Accesorio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Asignaciones`
--
ALTER TABLE `Asignaciones`
  MODIFY `ID_Asignado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `asig_lineas`
--
ALTER TABLE `asig_lineas`
  MODIFY `ID_Linea_asig` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `Cargos`
--
ALTER TABLE `Cargos`
  MODIFY `ID_cargo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1297;

--
-- AUTO_INCREMENT de la tabla `detalle_equipo`
--
ALTER TABLE `detalle_equipo`
  MODIFY `ID_Detalle_Equipo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `Divisiones`
--
ALTER TABLE `Divisiones`
  MODIFY `ID_division` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `Empleados`
--
ALTER TABLE `Empleados`
  MODIFY `ID_empleado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `Equipos`
--
ALTER TABLE `Equipos`
  MODIFY `ID_Equipo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `equipo_accesorio`
--
ALTER TABLE `equipo_accesorio`
  MODIFY `ID_Equipo_accesorio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `equipo_accesorio_asig`
--
ALTER TABLE `equipo_accesorio_asig`
  MODIFY `ID_accesorio_asig` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `equipo_asig`
--
ALTER TABLE `equipo_asig`
  MODIFY `ID_Equipo_asig` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `Estado_equipo`
--
ALTER TABLE `Estado_equipo`
  MODIFY `ID_Estado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado_linea`
--
ALTER TABLE `estado_linea`
  MODIFY `ID_Estado_linea` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `estado_usuarios`
--
ALTER TABLE `estado_usuarios`
  MODIFY `id_status_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Gerencia`
--
ALTER TABLE `Gerencia`
  MODIFY `ID_gerencia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `Lineas`
--
ALTER TABLE `Lineas`
  MODIFY `ID_Linea` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `Lineas_asignadas`
--
ALTER TABLE `Lineas_asignadas`
  MODIFY `ID_Linea_asignada` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `Marcas`
--
ALTER TABLE `Marcas`
  MODIFY `id_Marca` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `marcas_equipos`
--
ALTER TABLE `marcas_equipos`
  MODIFY `ID_marca_equipo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `Modelo`
--
ALTER TABLE `Modelo`
  MODIFY `ID_Modelo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `Operadoras`
--
ALTER TABLE `Operadoras`
  MODIFY `ID_Operadora` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `Roles`
--
ALTER TABLE `Roles`
  MODIFY `ID_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_asignacion`
--
ALTER TABLE `tipo_asignacion`
  MODIFY `ID_tipo_asig` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_linea`
--
ALTER TABLE `tipo_linea`
  MODIFY `ID_tipolinea` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `user_asg_ret`
--
ALTER TABLE `user_asg_ret`
  MODIFY `ID_user` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `ID_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Asignaciones`
--
ALTER TABLE `Asignaciones`
  ADD CONSTRAINT `Asignaciones_ibfk_2` FOREIGN KEY (`Solicitante`) REFERENCES `Empleados` (`ID_empleado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Asignaciones_ibfk_3` FOREIGN KEY (`Responsable`) REFERENCES `Usuarios` (`ID_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Asignaciones_ibfk_4` FOREIGN KEY (`status`) REFERENCES `estado_asignaciones` (`id_estado_asig`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Asignaciones_ibfk_5` FOREIGN KEY (`Ubicacion`) REFERENCES `Divisiones` (`ID_division`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Asignaciones_ibfk_6` FOREIGN KEY (`status_eq_asg`) REFERENCES `Estado_equipo` (`ID_Estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Asignaciones_ibfk_7` FOREIGN KEY (`tipo_asg`) REFERENCES `tipo_asignacion` (`ID_tipo_asig`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Asignaciones_ibfk_8` FOREIGN KEY (`Responsable_ret`) REFERENCES `Usuarios` (`ID_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `asig_lineas`
--
ALTER TABLE `asig_lineas`
  ADD CONSTRAINT `asig_lineas_ibfk_1` FOREIGN KEY (`responsable`) REFERENCES `Usuarios` (`ID_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asig_lineas_ibfk_2` FOREIGN KEY (`solicitante`) REFERENCES `Empleados` (`ID_empleado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asig_lineas_ibfk_4` FOREIGN KEY (`status`) REFERENCES `estado_asignaciones` (`id_estado_asig`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asig_lineas_ibfk_5` FOREIGN KEY (`ubicacion`) REFERENCES `Divisiones` (`ID_division`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asig_lineas_ibfk_6` FOREIGN KEY (`estado_linea_asg`) REFERENCES `estado_linea` (`ID_Estado_linea`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asig_lineas_ibfk_7` FOREIGN KEY (`tipo_asg`) REFERENCES `tipo_asignacion` (`ID_tipo_asig`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asig_lineas_ibfk_8` FOREIGN KEY (`responsable_ret`) REFERENCES `Usuarios` (`ID_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Cargos`
--
ALTER TABLE `Cargos`
  ADD CONSTRAINT `Cargos_ibfk_1` FOREIGN KEY (`FKEY_division`) REFERENCES `Divisiones` (`ID_division`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_equipo`
--
ALTER TABLE `detalle_equipo`
  ADD CONSTRAINT `detalle_equipo_ibfk_4` FOREIGN KEY (`FK_Estado`) REFERENCES `Estado_equipo` (`ID_Estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_equipo_ibfk_6` FOREIGN KEY (`FK_Equipo`) REFERENCES `Equipos` (`ID_Equipo`),
  ADD CONSTRAINT `detalle_equipo_ibfk_7` FOREIGN KEY (`FK_Modelo`) REFERENCES `Modelo` (`ID_Modelo`),
  ADD CONSTRAINT `detalle_equipo_ibfk_8` FOREIGN KEY (`FK_Marca`) REFERENCES `Marcas` (`id_Marca`),
  ADD CONSTRAINT `detalle_equipo_ibfk_9` FOREIGN KEY (`FK_Ubicacion`) REFERENCES `Divisiones` (`ID_division`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Divisiones`
--
ALTER TABLE `Divisiones`
  ADD CONSTRAINT `Divisiones_ibfk_1` FOREIGN KEY (`FKEY_gerencia`) REFERENCES `Gerencia` (`ID_gerencia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Empleados`
--
ALTER TABLE `Empleados`
  ADD CONSTRAINT `Empleados_ibfk_1` FOREIGN KEY (`FKEY_gerencia`) REFERENCES `Gerencia` (`ID_gerencia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Empleados_ibfk_2` FOREIGN KEY (`FKEY_division`) REFERENCES `Divisiones` (`ID_division`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Empleados_ibfk_3` FOREIGN KEY (`FKEY_cargo`) REFERENCES `Cargos` (`ID_cargo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo_accesorio`
--
ALTER TABLE `equipo_accesorio`
  ADD CONSTRAINT `equipo_accesorio_ibfk_1` FOREIGN KEY (`FK_accesorio`) REFERENCES `Accesorios` (`ID_Accesorio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_accesorio_ibfk_2` FOREIGN KEY (`FK_equipo`) REFERENCES `Equipos` (`ID_Equipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo_accesorio_asig`
--
ALTER TABLE `equipo_accesorio_asig`
  ADD CONSTRAINT `equipo_accesorio_asig_ibfk_1` FOREIGN KEY (`FK_accesorio_asg`) REFERENCES `Accesorios` (`ID_Accesorio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_accesorio_asig_ibfk_2` FOREIGN KEY (`FK_equipo_asg`) REFERENCES `Asignaciones` (`ID_Asignado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo_asig`
--
ALTER TABLE `equipo_asig`
  ADD CONSTRAINT `equipo_asig_ibfk_1` FOREIGN KEY (`fkey_asig`) REFERENCES `Asignaciones` (`ID_Asignado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_asig_ibfk_2` FOREIGN KEY (`fkey_equipo`) REFERENCES `detalle_equipo` (`ID_Detalle_Equipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Lineas`
--
ALTER TABLE `Lineas`
  ADD CONSTRAINT `Lineas_ibfk_1` FOREIGN KEY (`FKEY_Operadora`) REFERENCES `Operadoras` (`ID_Operadora`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Lineas_ibfk_2` FOREIGN KEY (`FKEY_Linea`) REFERENCES `tipo_linea` (`ID_tipolinea`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Lineas_ibfk_3` FOREIGN KEY (`FKEY_Estado`) REFERENCES `estado_linea` (`ID_Estado_linea`),
  ADD CONSTRAINT `Lineas_ibfk_4` FOREIGN KEY (`FK_Ubicacion`) REFERENCES `Divisiones` (`ID_division`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Lineas_asignadas`
--
ALTER TABLE `Lineas_asignadas`
  ADD CONSTRAINT `Lineas_asignadas_ibfk_1` FOREIGN KEY (`fkey_asig_lineas`) REFERENCES `asig_lineas` (`ID_Linea_asig`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Lineas_asignadas_ibfk_2` FOREIGN KEY (`fkey_linea`) REFERENCES `Lineas` (`ID_Linea`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `marcas_equipos`
--
ALTER TABLE `marcas_equipos`
  ADD CONSTRAINT `marcas_equipos_ibfk_1` FOREIGN KEY (`FKEY_Marca`) REFERENCES `Marcas` (`id_Marca`),
  ADD CONSTRAINT `marcas_equipos_ibfk_2` FOREIGN KEY (`FKEY_Equipo`) REFERENCES `Equipos` (`ID_Equipo`);

--
-- Filtros para la tabla `Modelo`
--
ALTER TABLE `Modelo`
  ADD CONSTRAINT `Modelo_ibfk_1` FOREIGN KEY (`FK_Marca_equipo`) REFERENCES `marcas_equipos` (`ID_marca_equipo`);

--
-- Filtros para la tabla `tipo_linea`
--
ALTER TABLE `tipo_linea`
  ADD CONSTRAINT `tipo_linea_ibfk_1` FOREIGN KEY (`FK_operadora`) REFERENCES `Operadoras` (`ID_Operadora`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`FKEY_ROL`) REFERENCES `Roles` (`ID_rol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Usuarios_ibfk_2` FOREIGN KEY (`FKEY_empleado`) REFERENCES `Empleados` (`ID_empleado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Usuarios_ibfk_3` FOREIGN KEY (`FK_estado_u`) REFERENCES `estado_usuarios` (`id_status_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
