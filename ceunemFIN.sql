-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-02-2024 a las 19:13:09
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ceunem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id_blog` int NOT NULL,
  `categoria` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id_blog`, `categoria`, `titulo`, `descripcion`, `img_url`, `link_url`, `estado`) VALUES
(1, 'Salud', '5 Maneras para Apoyar la Salud Mental de los Estudiantes', 'Muchos estudiantes pasan aproximadamente una sexta parte de sus horas de vigilia en la escuela, por lo que apoyar la salud mental de los estudiantes cae sobre los hombros de los docentes.', 'public/img/blog/20240122_194450_20240111_195830_blog_img1.jpg', 'https://ceunem.edu.mx/nosotros.html', 1),
(3, 'Administración', 'Tips para Retener a los Docentes ', 'Los docentes abandonan los puestos y la profesión docente por muchas razones. En nuestra región, los docentes son difíciles de encontrar y los puestos son a menudo difíciles de cubrir.', 'public/img/blog/20240201_231329_blog_img2.jpg', 'google.com', 1),
(4, 'Tecnología', 'Seis Recursos Digitales para el Aprendizaje', 'Llevar a los estudiantes a excursiones a museos puede ser invaluable para su educación, pero si no vives en la misma localidad o cerca de una ciudad importante, puede ser difícil encontrar museos locales para visitar.', 'public/img/blog/20240201_231353_blog_img3.jpg', 'google.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calidad`
--

CREATE TABLE `calidad` (
  `id_prog` int NOT NULL,
  `nom_menu` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tit` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `btn_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tUrl` int NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calidad`
--

INSERT INTO `calidad` (`id_prog`, `nom_menu`, `tit`, `descripcion`, `img_url`, `btn_name`, `link`, `tUrl`, `id_usu`) VALUES
(1, 'Nosotros', 'Programa de Calidad', 'Como una institución acreditada, CEUNEM proporciona a sus estudiantes una educación de la más alta calidad en un ambiente flexible. Nuestros reconocidos programas en línea incluyen instrucción en tiempo real y materiales prácticos para asegurar que cada estudiante no solo enfrente un desafío sino que también sienta el apoyo durante todo el curso. Contáctenos hoy mismo para obtener más información sobre lo que tenemos para ofrecer. Nos esforzamos por brindar educación de alta calidad, flexible y personalizada. Contamos con becas del 100% en inscripción y reinscripción así como becas del 50% en colegiaturas únicamente por ser alumno fundador CEUNEM.', 'public/img/calidad/VIDEO_20231226_205003_home_ceunem.mp4', 'Conocer más', 'nosotros', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id_color` int NOT NULL,
  `let_hf` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `let_hover` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `btn_font` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `font` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `btn_hfont` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `fondo_hf` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `btn_color` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `btn_hover` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `background` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id_color`, `let_hf`, `let_hover`, `btn_font`, `font`, `btn_hfont`, `fondo_hf`, `btn_color`, `btn_hover`, `background`, `id_usu`) VALUES
(1, '#ffffff', '#970707', '#ffffff', '#ffffff', '#ffffff', '#000000', '#990000', '#c01616', '#545454', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continua`
--

CREATE TABLE `continua` (
  `id_ec` int NOT NULL,
  `nom_ec` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `desc_detallada` text COLLATE utf8mb4_general_ci NOT NULL,
  `revoe` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pdf_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `continua`
--

INSERT INTO `continua` (`id_ec`, `nom_ec`, `descripcion`, `desc_detallada`, `revoe`, `img_url`, `pdf_url`, `estado`) VALUES
(2, 'Est ut eligendi hic ', 'Voluptatem aliquip o', 'Quo in omnis aut sed', 'Explicabo Voluptate', 'public/img/continua/20240214_180300_WhatsApp Image 2024-02-02 at 2.24.22 PM.jpeg', 'public/docs/continua/20240214_180300_CreateNewFleetDocumentation_ES.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int NOT NULL,
  `nom_curso` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `desc_detallada` text COLLATE utf8mb4_general_ci NOT NULL,
  `revoe` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pdf_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nom_curso`, `descripcion`, `desc_detallada`, `revoe`, `img_url`, `pdf_url`, `estado`) VALUES
(2, 'Proximamente ', '-', '', NULL, 'public/img/maestria/20240202_175409_proximamente.png', 'public/docs/maestria/20240202_175409_politica-riuma_es.pdf', 1),
(4, 'Consequatur perspici', 'Voluptates aut tenet', 'Velit iusto repudian', 'Magna perferendis ve', 'public/img/cursos/XML Artículo 29 fracción I de la ley del IVA y Reglas 5.2.5 fracción II 5.2.6 , 4.3.21 de las RGCE vigentes .jpeg', 'public/docs/cursos/CreateNewFleetDocumentation_ES.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_datos`
--

CREATE TABLE `curso_datos` (
  `id_curso_datos` int NOT NULL,
  `id_curso` int NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso_datos`
--

INSERT INTO `curso_datos` (`id_curso_datos`, `id_curso`, `titulo`, `descripcion`, `img_url`) VALUES
(1, 4, 'Nulla error natus fu', 'Qui ratione quo sed ', 'public/img/cursos/WhatsApp Image 2024-02-02 at 2.24.22 PM.jpeg'),
(2, 4, 'Quia excepturi in ve', 'Consequatur Eius do', 'public/img/cursos/XML Reglas 4.3.21, 5.2.5 fracción I y 5.2.6  reglas generales COMEX vigentes.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ec_datos`
--

CREATE TABLE `ec_datos` (
  `id_ec_datos` int NOT NULL,
  `id_ec` int NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ec_datos`
--

INSERT INTO `ec_datos` (`id_ec_datos`, `id_ec`, `titulo`, `descripcion`, `img_url`) VALUES
(1, 2, 'Tempora ipsum minus ', 'Aut molestias nostru', 'public/img/continua/XML Artículo 29 fracción I de la ley del IVA y Reglas 5.2.5 fracción II 5.2.6 , 4.3.21 de las RGCE vigentes .jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encabezado`
--

CREATE TABLE `encabezado` (
  `id_en` int NOT NULL,
  `encabezado` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encabezado`
--

INSERT INTO `encabezado` (`id_en`, `encabezado`, `descripcion`, `id_usu`) VALUES
(1, 'Blog', 'Mantente actualizado sobre todo lo referente al mundo universitario en México y el mundo.', 1),
(2, 'Filosofía', 'Políticas para forjar principios y valores', 1),
(3, 'Nuestro Equipo', 'Su dedicación es vital para el éxito de nuestra Universidad', 1),
(4, 'Oferta Educativa', 'Licenciaturas y posgrados enfocados en el ámbito de negocios. ', 1),
(5, 'Licenciaturas', 'Abarcamos los niveles de licenciatura y posgrado enfocados en el ámbito de negocios', 1),
(6, 'Maestrías', 'Abarcamos los niveles de licenciatura y posgrado enfocados en el ámbito de negocios', 1),
(7, 'Educación Continua', 'Abarcamos los niveles de licenciatura y posgrado enfocados en el ámbito de negocios', 1),
(9, 'Cursos', 'CRE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_eq` int NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `puesto` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `rFace` text COLLATE utf8mb4_general_ci NOT NULL,
  `rTw` text COLLATE utf8mb4_general_ci NOT NULL,
  `rIns` text COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_eq`, `nombre`, `puesto`, `img_url`, `rFace`, `rTw`, `rIns`, `estado`, `id_usu`) VALUES
(2, 'Martha', 'Dirección', 'public/img/equipo/20240122_185901_20240111_210653_WhatsApp Image 2024-01-11 at 2.06.05 PM (1).jpeg', 'https://es-la.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 1, 1),
(7, 'Profesionista 2', 'Dirección', 'public/img/equipo/20240122_185912_20240111_210705_WhatsApp Image 2024-01-11 at 2.06.05 PM.jpeg', 'https://es-la.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 1, 1),
(8, 'Profesionista 3', 'Dirección', 'public/img/equipo/20240122_185924_20240111_210713_WhatsApp Image 2024-01-11 at 2.06.05 PM (2).jpeg', 'https://es-la.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 1, 1),
(9, 'Profesionista 4', 'Dirección', 'public/img/equipo/20240122_185933_20240111_210726_WhatsApp Image 2024-01-11 at 2.06.05 PM (3).jpeg', 'https://es-la.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id_form` int NOT NULL,
  `nCompleto` int NOT NULL,
  `nombre` int NOT NULL,
  `apellidos` int NOT NULL,
  `email` int NOT NULL,
  `tel` int NOT NULL,
  `face` int NOT NULL,
  `mensaje` int NOT NULL,
  `asunto` int NOT NULL,
  `live` int NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`id_form`, `nCompleto`, `nombre`, `apellidos`, `email`, `tel`, `face`, `mensaje`, `asunto`, `live`, `id_usu`) VALUES
(1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licenciaturas`
--

CREATE TABLE `licenciaturas` (
  `id_lic` int NOT NULL,
  `nom_lic` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `desc_detallada` text COLLATE utf8mb4_general_ci NOT NULL,
  `revoe` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pdf_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `licenciaturas`
--

INSERT INTO `licenciaturas` (`id_lic`, `nom_lic`, `descripcion`, `desc_detallada`, `revoe`, `img_url`, `pdf_url`, `estado`) VALUES
(1, 'Lic. en Administración', 'La formación va dirigida a personas que deseen adquirir una licenciatura enfocada a la Administración, al estudiar esta carrera. adquirirás el desarrollo integral de las áreas administrativas de empresas y negocios.\r\n\r\n Licenciatura en Administración RVOE 2021-012\r\n', '', NULL, 'public/img/maestria/20240202_160717_administracion.png', 'public/docs/maestria/20240202_160717_PLAN DE ESTUDIOS LIC. ADMINISTRACION.pdf', 1),
(2, 'Lic. en Contabilidad', 'La formación de Contador tiene como meta que el alumno adquiera los conocimientos para el diseño, implementación y evaluación de métodos de contabilidad así como de Auditorías financieras y administrativa.\r\n\r\nLicenciatura en Contabilidad RVOE 2022-020\r\n', '', NULL, 'public/img/licenciatura/contabilidad.png', 'public/docs/licenciatura/PLAN LICENCIATURA CONTABILIDAD.pdf', 1),
(3, 'Lic. en Derecho', 'Al estudiar la carrera de Derecho el estudiante obtendrá una sólida formación en la ciencia jurídica y en uno o más campos de conocimiento de especialización de la misma, podrán desempeñarse dentro del Poder Judicial Federal o de los Estados, así como en las instancias de Procuración de Justicia.\r\n\r\nLicenciatura en Derecho RVOE 2022-043', '', NULL, 'public/img/licenciatura/derecho.png', 'public/docs/licenciatura/PLAN LICENCIATURA DERECHO.pdf', 1),
(4, 'Lic. en Mercadotecnia', 'La formación va dirigida a la formación de un Mercadólogo que se encarga de estudiar el público objetivo de una marca, comercializar un producto o aumentar las ventas de una empresa ya sea del sector público o privado.\r\n\r\nLicenciatura en Mercadotecnia RVOE 2021-073', '', NULL, 'public/img/licenciatura/mercadotecnia.png', 'public/docs/licenciatura/PLAN LICENCIATURA MERCADOTECNIA.pdf', 1),
(5, 'Lic. en Pedagogía', 'Un pedagogo es una persona que cuenta con conocimientos teórico-metodológicos que le permiten el análisis de la situación educativa de algún grupo en específico ya sea a nivel educativo o empresarial. Al poder entender sus necesidades, determina sus objetivos para poder diseñar y desarrollar planes de estudio que se adapten a las necesidades requeridas.\r\n\r\n Licenciatura en Pedagogía RVOE 2022-030\r\n', '', NULL, 'public/img/licenciatura/pedagogia.png', 'public/docs/licenciatura/politica-riuma_es.pdf', 1),
(6, 'Proximamente nuevas licenciaturas', 'Sabemos que quieres ver las nuevas Licenciaturas, pero deberás ser paciente un tiempo más. Suscríbete a nuestra lista de contacto para que te notifiquen cuando tengamos disponibles nuevos planes de estudio.', '', NULL, 'public/img/licenciatura/proximamente.png', 'public/docs/licenciatura/politica-riuma_es.pdf', 1),
(7, 'Id eaque elit praes', 'Reprehenderit asper', '', NULL, 'public/img/licenciatura/20240213_042542_WhatsApp Image 2024-02-02 at 2.24.22 PM.jpeg', 'public/docs/licenciatura/20240213_042542_formulario (6) (1).pdf', 1),
(8, 'Deserunt do autem ci', 'Error excepturi null', 'Totam qui consequatu', 'Debitis commodo id ', 'public/img/licenciatura/user.png', 'public/docs/licenciatura/formulario (6).pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lic_datos`
--

CREATE TABLE `lic_datos` (
  `id_lic_datos` int NOT NULL,
  `id_lic` int NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lic_datos`
--

INSERT INTO `lic_datos` (`id_lic_datos`, `id_lic`, `titulo`, `descripcion`, `img_url`) VALUES
(1, 8, 'Quas voluptas incidi', 'Quis sint animi dol', 'public/img/licenciatura/WhatsApp Image 2024-02-02 at 2.24.22 PM.jpeg'),
(2, 7, 'Consequatur Dolor q', 'Dolore similique sed', 'public/img/licenciatura/XML Artículo 29 fracción I de la ley del IVA y Reglas 5.2.5 fracción II 5.2.6 , 4.3.21 de las RGCE vigentes .jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestrias`
--

CREATE TABLE `maestrias` (
  `id_mas` int NOT NULL,
  `nom_mas` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `desc_detallada` text COLLATE utf8mb4_general_ci NOT NULL,
  `revoe` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pdf_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestrias`
--

INSERT INTO `maestrias` (`id_mas`, `nom_mas`, `descripcion`, `desc_detallada`, `revoe`, `img_url`, `pdf_url`, `estado`) VALUES
(1, 'Maestría en Administración de Negocios', 'La formación va dirigida a profesionales que deseen adquirir una maestría a su profesión en Administración de Negocios con la finalidad de formar profesionales con una visión estratégica, emprendedora en innovadora, con conocimientos y habilidades relacionados a los procesos administrativos de los negocios.\r\n\r\n Maestría en Administración de Negocios RVOE 2021-010', '', NULL, 'public/img/maestria/20240122_195055_20240111_195712_oferta_lic4.jpg', 'public/docs/maestria/20240122_195055_PLAN_MAESTRIA_ADMINISTRACION.pdf', 1),
(2, 'Maestría en Derecho Corporativo', 'La formación va dirigida a profesionales que deseen adquirir una maestría a su profesión en Derecho Corporativo, al estudiar esta rama el estudiante adquirirá conocimientos que lo ayudarán a desempeñarse actividades de sustento jurídico para las empresas de acuerdo a teorías, instituciones, principios, normativos, en etc.\r\n\r\nMaestría en Derecho Corporativo RVOE 2021-074\r\n', '', NULL, 'public/img/maestria/20240202_034902_maestriaderecho.png', 'public/docs/maestria/20240202_034902_politica-riuma_es.pdf', 1),
(3, 'Maestría en Marketing Digital', 'La formación va dirigida a profesionales que deseen adquirir una maestría a su profesión orientada hacia la mercadotecnia digital, especializándose en uso de herramientas digitales para poder llevar a cabo el manejo e implementación de estratégias digitales.\r\n\r\nMaestría en Marketing Digital RVOE 2021-011', '', NULL, 'public/img/maestria/20240202_034924_maestriamarketing.png', 'public/docs/maestria/20240202_034924_politica-riuma_es.pdf', 1),
(4, 'prueba', 'prueba', 'prueba', 'prueba', 'public/img/maestria/20240214_162734_WhatsApp Image 2024-02-02 at 2.24.22 PM.jpeg', 'public/docs/maestria/20240214_162734_CreateNewFleetDocumentation_ES.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mapa`
--

CREATE TABLE `mapa` (
  `id_mapa` int NOT NULL,
  `mapa` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mapa`
--

INSERT INTO `mapa` (`id_mapa`, `mapa`, `id_usu`) VALUES
(1, '   <div >\r\n    <div class=\"row\">\r\n        <div class=\"col-md-6\">\r\n	<iframe src=\"https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d934.977000893025!2d-100.00723503040223!3d20.386682655921366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjDCsDIzJzEyLjEiTiAxMDDCsDAwJzIzLjciVw!5e0!3m2!1ses!2smx!4v1706898263178!5m2!1ses!2smx\" width=\"100%\" height=\"700\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>\r\n        </div>\r\n        <div class=\"col-md-6\">\r\n            <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d277.6167372863441!2d-100.38948784319902!3d20.581902164274116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d344d6b5e04675%3A0x64817e50605ed8ab!2sIgnacio%20M.%20de%20Las%20Casas%2047-Int%204%2C%20Cimatario%2C%2076030%20Santiago%20de%20Quer%C3%A9taro%2C%20Qro.!5e0!3m2!1ses!2smx!4v1706825052349!5m2!1ses!2smx\" width=\"100%\" height=\"700\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>\r\n        </div>\r\n    </div>\r\n</div>', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mas_datos`
--

CREATE TABLE `mas_datos` (
  `id_mas_datos` int NOT NULL,
  `id_mas` int NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mas_datos`
--

INSERT INTO `mas_datos` (`id_mas_datos`, `id_mas`, `titulo`, `descripcion`, `img_url`) VALUES
(1, 1, 'prueba', 'prueba', 'public/img/maestria/WhatsApp Image 2024-02-02 at 2.24.22 PM.jpeg'),
(2, 4, 'Tips para Retener a los Docentes ', 'adssda', 'public/img/maestria/user.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int NOT NULL,
  `menu1` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `menu2` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `menu3` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `menu4` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `submenu1` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `submenu2` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `submenu3` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `menu5` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mision`
--

CREATE TABLE `mision` (
  `id_mis` int NOT NULL,
  `frase` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `autor` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mision` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_body` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mision`
--

INSERT INTO `mision` (`id_mis`, `frase`, `autor`, `mision`, `img_body`, `estado`, `id_usu`) VALUES
(1, '“Lo maravilloso de aprender algo, es que nadie puede arrebatárnoslo”', 'B. B. King', 'CEUNEM es una Institución de Educación Superior inspirada en el emprendimiento, buscando la profesionalización de manera digital de toda persona en pos de una oportunidad para potencializar su talento y capacidades tanto profesionales como personales, tomando en cuenta sus necesidades de movilidad social y laboral, brindándole la oportunidad de replantear su prospectiva como una persona productivamente exitosa, capaz de emprender y desarrollar modelos de negocios exitosos y rentables, respaldadas en el conocimiento de disciplinas formales.', 'public/img/mision/20240123_220533_20240111_195229_nosotros.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

CREATE TABLE `objetivos` (
  `id_obj` int NOT NULL,
  `nom_sec` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `img_sec` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc_sec` text COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `objetivos`
--

INSERT INTO `objetivos` (`id_obj`, `nom_sec`, `img_sec`, `desc_sec`, `estado`, `id_usu`) VALUES
(1, 'Objetivos', 'public/img/filosofia/OBJ_20240122_190009_OBJ_20240111_195050_filosofia_img2.jpg', 'Empoderar académicamente a nuestros estudiantes asociados a través de la formación de conocimientos y competencias profesionales en disciplinas de corte humanista, académico-administrativo y de comunicación. Impulsar en nuestros estudiantes asociados una actitud emprendedora para superar los retos actuales de la competencia profesional laboral. Estimular en nuestros estudiantes asociados un comportamiento de responsabilidad profesional y liderazgo con carácter duradero.', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `id_ofe` int NOT NULL,
  `tit` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `btn_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`id_ofe`, `tit`, `descripcion`, `img_url`, `btn_name`, `link`, `estado`, `id_usu`) VALUES
(1, 'Licenciaturas', 'En CEUNEM cubrimos una variedad completa de cursos en todos los niveles de creatividad y educación. Como Universidad en línea con experiencia, enseñamos una variedad de clases que abarcan los niveles licenciatura y posgrado enfocados en el ámbito de negocios.', 'public/img/oferta/Licenciaturas20240122_191409_Licenciaturas20240111_195422_oferta_lic1.jpg', 'Ver más', 'licenciatura', 1, 1),
(2, 'Maestrías', 'En CEUNEM cubrimos una variedad completa de cursos en todos los niveles de creatividad y educación. Como Universidad en línea con experiencia, enseñamos una variedad de clases que abarcan los niveles licenciatura y posgrado enfocados en el ámbito de negocios.', 'public/img/oferta/Maestrías20240122_191422_Maestrías20240111_195439_oferta_maestria3.jpg', 'Ver más', 'maestria', 1, 1),
(3, 'Educación continua', 'Sabemos que quieres ver la nueva oferta educativa, pero deberás ser paciente un tiempo más. Suscríbete a nuestra lista de contacto para que te notifiquen cuando tengamos disponibles nuevos planes de estudios.', 'public/img/oferta/Educación continua20240122_191353_Educación continua20240111_195412_oferta_lic6.jpg', 'Ver más', 'continua', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id_slider` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tit` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `btn_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tUrl` int NOT NULL,
  `posicion` int NOT NULL,
  `id_usu` int NOT NULL,
  `seccion` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id_slider`, `img`, `tit`, `descripcion`, `btn_name`, `link`, `tUrl`, `posicion`, `id_usu`, `seccion`) VALUES
(1, 'public/img/sliders/IMG1_20240122_182958_IMG1_20240118_221834_IMG1_20240111_193552_slider1.jpg', 'Creando líderes y emprendedores', 'Nuestro objetivo principal es empoderar académicamente a nuestros estudiantes a través de la formación de conocimientos y competencias profesionales en disciplinas de corte humanista, académico-administrativo y de comunicación.', 'Más Información', 'nosotros', 1, 1, 1, 'inicio'),
(2, 'public/img/sliders/IMG2_20240201_234253_slidernuevo1.jpg', 'Crea tu futuro profesional 100% online', 'Becas de hasta el 70%', 'Leer más', 'licenciatura', 1, 2, 1, 'inicio'),
(3, 'public/img/sliders/IMG2_20240122_183032_IMG2_20240118_222020_IMG2_20240111_193620_slider2_general.jpg', '-', '-', 'Más Información', 'nosotros', 1, 1, 1, 'nosotros'),
(4, 'public/img/sliders/IMG2_20240122_183032_IMG2_20240118_222020_IMG2_20240111_193620_slider2_general.jpg', 'Nosotros', 'Nosotros', 'Más Información', 'nosotros', 1, 1, 1, 'blog'),
(5, 'public/img/sliders/IMG2_20240122_183032_IMG2_20240118_222020_IMG2_20240111_193620_slider2_general.jpg', 'Nosotros', 'Nosotros', 'Más Información', 'nosotros', 1, 1, 1, 'contacto'),
(6, 'public/img/sliders/IMG1_20240201_161716_slidernuevo.jpg', '-', '-', 'Más Información', 'nosotros', 1, 1, 1, 'oferta-educativa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `smtp`
--

CREATE TABLE `smtp` (
  `id_smtp` int NOT NULL,
  `dirServer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `portServer` int NOT NULL,
  `conect` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `id_tel` int NOT NULL,
  `numero` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `mensaje` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id_tel`, `numero`, `mensaje`, `id_usu`) VALUES
(1, '4272053537', 'Solicito  informes.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id_tes` int NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `carrera` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `testimonio` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id_tes`, `nombre`, `carrera`, `testimonio`, `img_url`, `estado`, `id_usu`) VALUES
(1, 'Fernando', 'Estudiante de Derecho', 'CEUNEM es una gran universidad y una buena opción para muchas personas. En lo particular me ha brindado la oportunidad de iniciar un sueño muy anhelado', 'public/img/testimonios/20240122_194234_20240111_210748_WhatsApp Image 2024-01-11 at 2.06.05 PM (4).jpeg', 1, 1),
(2, 'Noemi', 'Estudiante de Derecho', 'Tengo muy buena experiencia con esta universidad 10/10, te atienden de lo mas amable, sus tramites son rápidos y tiene muy buenos maestros :)', 'public/img/testimonios/20240122_194302_20240111_210803_WhatsApp Image 2024-01-11 at 2.06.05 PM (5).jpeg', 1, 1),
(3, 'Miriam', 'Estudiante de Administración', 'Para mis necesidades ha sido excelente, mi mayor preocupación es sentarme a estudiar, el espacio virtual es perfecto para eso, además encuentro la libertad necesaria para compaginarlo con otras actividades de mi elección.', 'public/img/testimonios/20240122_194242_20240111_210756_WhatsApp Image 2024-01-11 at 2.06.05 PM (6).jpeg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nombre`, `email`, `pass`, `estado`) VALUES
(1, 'Diana Gonzalez', 'dianaegonzalezperez@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores`
--

CREATE TABLE `valores` (
  `id_val` int NOT NULL,
  `nom_sec` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `img_sec` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc_sec` text COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valores`
--

INSERT INTO `valores` (`id_val`, `nom_sec`, `img_sec`, `desc_sec`, `estado`, `id_usu`) VALUES
(1, 'Valores', 'public/img/filosofia/VAL_20240122_190019_VAL_20240111_195110_filosofia_img3.jpg', 'Emprendimiento\r\n\r\nLiderazgo\r\n\r\nDisciplina\r\n\r\nInnovación', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vision`
--

CREATE TABLE `vision` (
  `id_vis` int NOT NULL,
  `nom_sec` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `img_sec` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc_sec` text COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL,
  `id_usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vision`
--

INSERT INTO `vision` (`id_vis`, `nom_sec`, `img_sec`, `desc_sec`, `estado`, `id_usu`) VALUES
(1, 'Visión', 'public/img/filosofia/VIS_20240122_185958_VIS_20240111_195132_filosofia_img1.jpg', 'Ser la mejor opción dentro de las Instituciones de educación Universitaria, al sobresalir en el mercado de los servicios educativos digitales que otorga un valor agregado a la enseñanza profesional, empoderando académicamente a nuestros estudiantes en el desarrollo de conocimientos, capacidades y habilidades profesionales, así como en el desarrollo de estrategias de emprendimiento para establecer proyectos de negocio exitosos y rentables.', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indices de la tabla `calidad`
--
ALTER TABLE `calidad`
  ADD PRIMARY KEY (`id_prog`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id_color`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `continua`
--
ALTER TABLE `continua`
  ADD PRIMARY KEY (`id_ec`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `curso_datos`
--
ALTER TABLE `curso_datos`
  ADD PRIMARY KEY (`id_curso_datos`),
  ADD UNIQUE KEY `id_curso_datos_UNIQUE` (`id_curso_datos`),
  ADD KEY `id_curso_idx` (`id_curso`);

--
-- Indices de la tabla `ec_datos`
--
ALTER TABLE `ec_datos`
  ADD PRIMARY KEY (`id_ec_datos`),
  ADD UNIQUE KEY `idnew_table_UNIQUE` (`id_ec_datos`),
  ADD KEY `id_ec_idx` (`id_ec`);

--
-- Indices de la tabla `encabezado`
--
ALTER TABLE `encabezado`
  ADD PRIMARY KEY (`id_en`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_eq`),
  ADD KEY `equipo_ibfk_1` (`id_usu`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id_form`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `licenciaturas`
--
ALTER TABLE `licenciaturas`
  ADD PRIMARY KEY (`id_lic`);

--
-- Indices de la tabla `lic_datos`
--
ALTER TABLE `lic_datos`
  ADD PRIMARY KEY (`id_lic_datos`),
  ADD UNIQUE KEY `id_lic_datos_UNIQUE` (`id_lic_datos`),
  ADD KEY `id_lic_idx` (`id_lic`);

--
-- Indices de la tabla `maestrias`
--
ALTER TABLE `maestrias`
  ADD PRIMARY KEY (`id_mas`);

--
-- Indices de la tabla `mapa`
--
ALTER TABLE `mapa`
  ADD PRIMARY KEY (`id_mapa`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `mas_datos`
--
ALTER TABLE `mas_datos`
  ADD PRIMARY KEY (`id_mas_datos`),
  ADD UNIQUE KEY `id_mas_datos_UNIQUE` (`id_mas_datos`),
  ADD KEY `id_mas_idx` (`id_mas`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `mision`
--
ALTER TABLE `mision`
  ADD PRIMARY KEY (`id_mis`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`id_obj`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id_ofe`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indices de la tabla `smtp`
--
ALTER TABLE `smtp`
  ADD PRIMARY KEY (`id_smtp`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`id_tel`),
  ADD UNIQUE KEY `id_tel` (`id_tel`,`id_usu`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id_tes`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- Indices de la tabla `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`id_val`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `vision`
--
ALTER TABLE `vision`
  ADD PRIMARY KEY (`id_vis`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `calidad`
--
ALTER TABLE `calidad`
  MODIFY `id_prog` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id_color` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `continua`
--
ALTER TABLE `continua`
  MODIFY `id_ec` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `curso_datos`
--
ALTER TABLE `curso_datos`
  MODIFY `id_curso_datos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ec_datos`
--
ALTER TABLE `ec_datos`
  MODIFY `id_ec_datos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `encabezado`
--
ALTER TABLE `encabezado`
  MODIFY `id_en` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_eq` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id_form` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `licenciaturas`
--
ALTER TABLE `licenciaturas`
  MODIFY `id_lic` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `lic_datos`
--
ALTER TABLE `lic_datos`
  MODIFY `id_lic_datos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `maestrias`
--
ALTER TABLE `maestrias`
  MODIFY `id_mas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mapa`
--
ALTER TABLE `mapa`
  MODIFY `id_mapa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mas_datos`
--
ALTER TABLE `mas_datos`
  MODIFY `id_mas_datos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mision`
--
ALTER TABLE `mision`
  MODIFY `id_mis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `id_obj` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `id_ofe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id_slider` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `smtp`
--
ALTER TABLE `smtp`
  MODIFY `id_smtp` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id_tel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id_tes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `valores`
--
ALTER TABLE `valores`
  MODIFY `id_val` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vision`
--
ALTER TABLE `vision`
  MODIFY `id_vis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colores`
--
ALTER TABLE `colores`
  ADD CONSTRAINT `colores_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`),
  ADD CONSTRAINT `colores_ibfk_2` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `curso_datos`
--
ALTER TABLE `curso_datos`
  ADD CONSTRAINT `id_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ec_datos`
--
ALTER TABLE `ec_datos`
  ADD CONSTRAINT `id_ec` FOREIGN KEY (`id_ec`) REFERENCES `continua` (`id_ec`) ON DELETE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `formulario_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `lic_datos`
--
ALTER TABLE `lic_datos`
  ADD CONSTRAINT `id_lic` FOREIGN KEY (`id_lic`) REFERENCES `licenciaturas` (`id_lic`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mas_datos`
--
ALTER TABLE `mas_datos`
  ADD CONSTRAINT `id_mas` FOREIGN KEY (`id_mas`) REFERENCES `maestrias` (`id_mas`) ON DELETE CASCADE;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `mision`
--
ALTER TABLE `mision`
  ADD CONSTRAINT `mision_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `objetivos`
--
ALTER TABLE `objetivos`
  ADD CONSTRAINT `objetivos_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `smtp`
--
ALTER TABLE `smtp`
  ADD CONSTRAINT `smtp_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `telefono_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `valores`
--
ALTER TABLE `valores`
  ADD CONSTRAINT `valores_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `vision`
--
ALTER TABLE `vision`
  ADD CONSTRAINT `vision_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
