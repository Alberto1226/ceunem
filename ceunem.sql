-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-12-2023 a las 01:36:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
  `id_blog` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id_blog`, `categoria`, `titulo`, `descripcion`, `img_url`, `link_url`, `estado`) VALUES
(1, 'Salud', '5 Maneras para Apoyar la Salud Mental de los Estudiantes', 'Muchos estudiantes pasan aproximadamente una sexta parte de sus horas de vigilia en la escuela, por lo que apoyar la salud mental de los estudiantes cae sobre los hombros de los docentes.', 'public/img/blog/20231124_193809_blog-1.jpg', 'https://ceunem.edu.mx/nosotros.html', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calidad`
--

CREATE TABLE `calidad` (
  `id_prog` int(11) NOT NULL,
  `nom_menu` varchar(50) NOT NULL,
  `tit_prog` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `btn_name1` varchar(20) NOT NULL,
  `btn_url1` varchar(255) NOT NULL,
  `btn_name2` varchar(20) NOT NULL,
  `btn_url2` varchar(255) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id_color` int(11) NOT NULL,
  `let_hf` varchar(10) NOT NULL,
  `let_hover` varchar(10) NOT NULL,
  `btn_font` varchar(10) NOT NULL,
  `font` varchar(10) NOT NULL,
  `btn_hfont` varchar(10) NOT NULL,
  `fondo_hf` varchar(10) NOT NULL,
  `btn_color` varchar(10) NOT NULL,
  `btn_hover` varchar(10) NOT NULL,
  `background` varchar(10) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id_color`, `let_hf`, `let_hover`, `btn_font`, `font`, `btn_hfont`, `fondo_hf`, `btn_color`, `btn_hover`, `background`, `id_usu`) VALUES
(1, '#000000', '#e61919', '#c45a5a', '#100f0f', '#b17c7c', '#ea4848', '#e02929', '#c91313', '#d8cfcf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continua`
--

CREATE TABLE `continua` (
  `id_ec` int(11) NOT NULL,
  `nom_ec` varchar(100) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `pdf_url` varchar(255) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `continua`
--

INSERT INTO `continua` (`id_ec`, `nom_ec`, `descripcion`, `img_url`, `pdf_url`, `estado`) VALUES
(1, 'Maestría en Derecho Corporativo', 'La formación va dirigida a profesionales que deseen adquirir una maestría a su profesión en Derecho Corporativo, al estudiar esta rama el estudiante adquirirá conocimientos que lo ayudarán a desempeñarse actividades de sustento jurídico para las empresas de acuerdo a teorías, instituciones, principios, normativos, en etc.', 'public/img/continua/maestriaderecho.png', 'public/docs/continua/PLAN_MAESTRIA_DERECHO.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_eq` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `puesto` varchar(60) NOT NULL,
  `img_url` varchar(250) NOT NULL,
  `rFace` text NOT NULL,
  `rTw` text NOT NULL,
  `rIns` text NOT NULL,
  `estado` int(2) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_eq`, `nombre`, `puesto`, `img_url`, `rFace`, `rTw`, `rIns`, `estado`, `id_usu`) VALUES
(2, 'Martha', 'Dirección', 'public/img/equipo/20231208_063348_team-2.jpg', 'https://es-la.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 1, 1),
(7, 'Profesionista 2', 'Dirección', 'public/img/equipo/20231208_065634_team-1.jpg', 'https://es-la.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 1, 1),
(8, 'Profesionista 3', 'Dirección', 'public/img/equipo/20231208_065905_team-3.jpg', 'https://es-la.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 1, 1),
(9, 'Profesionista 4', 'Dirección', 'public/img/equipo/20231208_065920_team-4.jpg', 'https://es-la.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id_form` int(11) NOT NULL,
  `nCompleto` int(2) NOT NULL,
  `nombre` int(2) NOT NULL,
  `apellidos` int(2) NOT NULL,
  `email` int(2) NOT NULL,
  `tel` int(2) NOT NULL,
  `face` int(2) NOT NULL,
  `mensaje` int(2) NOT NULL,
  `asunto` int(2) NOT NULL,
  `live` int(2) NOT NULL,
  `id_usu` int(11) NOT NULL
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
  `id_lic` int(11) NOT NULL,
  `nom_lic` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `pdf_url` varchar(255) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `licenciaturas`
--

INSERT INTO `licenciaturas` (`id_lic`, `nom_lic`, `descripcion`, `img_url`, `pdf_url`, `estado`) VALUES
(1, 'Lic. en Admiistración', 'La formación va dirigida a personas que deseen adquirir una licenciatura enfocada a la Administración, al estudiar esta carrera. adquirirás el desarrollo integral de las áreas administrativas de empresas y negocios.', 'public/img/licenciatura/administracion.png', 'public/docs/licenciatura/PLAN LICENCIATURA_ADMINISTRACION.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestrias`
--

CREATE TABLE `maestrias` (
  `id_mas` int(11) NOT NULL,
  `nom_mas` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `pdf_url` varchar(255) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestrias`
--

INSERT INTO `maestrias` (`id_mas`, `nom_mas`, `descripcion`, `img_url`, `pdf_url`, `estado`) VALUES
(1, 'Maestría en Administración de Negocios', 'La formación va dirigida a profesionales que deseen adquirir una maestría a su profesión en Administración de Negocios con la finalidad de formar profesionales con una visión estratégica, emprendedora en innovadora, con conocimientos y habilidades relacionados a los procesos administrativos de los negocios.', 'public/img/maestria/maestriaadministracion.png', 'public/docs/maestria/PLAN_MAESTRIA_ADMINISTRACION.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu1` varchar(150) NOT NULL,
  `menu2` varchar(150) NOT NULL,
  `menu3` varchar(150) NOT NULL,
  `menu4` varchar(150) NOT NULL,
  `submenu1` varchar(150) NOT NULL,
  `submenu2` varchar(150) NOT NULL,
  `submenu3` varchar(150) NOT NULL,
  `menu5` varchar(150) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mision`
--

CREATE TABLE `mision` (
  `id_mis` int(11) NOT NULL,
  `frase` varchar(150) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `mision` text NOT NULL,
  `img_body` varchar(255) NOT NULL,
  `estado` int(2) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mision`
--

INSERT INTO `mision` (`id_mis`, `frase`, `autor`, `mision`, `img_body`, `estado`, `id_usu`) VALUES
(1, '“Lo maravilloso de aprender algo, es que nadie puede arrebatárnoslo”', 'B. B. King', 'CEUNEM es una Institución de Educación Superior inspirada en el emprendimiento, buscando la profesionalización de manera digital de toda persona en pos de una oportunidad para potencializar su talento y capacidades tanto profesionales como personales, tomando en cuenta sus necesidades de movilidad social y laboral, brindándole la oportunidad de replantear su prospectiva como una persona productivamente exitosa, capaz de emprender y desarrollar modelos de negocios exitosos y rentables, respaldadas en el conocimiento de disciplinas formales.', 'public/img/mision/20231204_215909_nosotros-3.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

CREATE TABLE `objetivos` (
  `id_obj` int(11) NOT NULL,
  `nom_sec` varchar(100) NOT NULL,
  `img_sec` varchar(255) NOT NULL,
  `desc_sec` text NOT NULL,
  `estado` int(2) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `objetivos`
--

INSERT INTO `objetivos` (`id_obj`, `nom_sec`, `img_sec`, `desc_sec`, `estado`, `id_usu`) VALUES
(1, 'Objetivos', 'public/img/filosofia/OBJ_20231206_174623_objetivos.png', 'Empoderar académicamente a nuestros estudiantes asociados a través de la formación de conocimientos y competencias profesionales en disciplinas de corte humanista, académico-administrativo y de comunicación. Impulsar en nuestros estudiantes asociados una actitud emprendedora para superar los retos actuales de la competencia profesional laboral. Estimular en nuestros estudiantes asociados un comportamiento de responsabilidad profesional y liderazgo con carácter duradero.', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id_slider` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `tit` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `btn_name` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `tUrl` int(1) NOT NULL,
  `posicion` int(1) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id_slider`, `img`, `tit`, `descripcion`, `btn_name`, `link`, `tUrl`, `posicion`, `id_usu`) VALUES
(1, 'public/img/sliders/IMG1_20231221_193941_carousel-1.jpg', 'Creando líderes y emprendedores', 'Nuestro objetivo principal es empoderar académicamente a nuestros estudiantes a través de la formación de conocimientos y competencias profesionales en disciplinas de corte humanista, académico-administrativo y de comunicación.', 'Más Información', 'nosotros', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `smtp`
--

CREATE TABLE `smtp` (
  `id_smtp` int(11) NOT NULL,
  `dirServer` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `portServer` int(11) NOT NULL,
  `conect` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `id_tel` int(11) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `mensaje` varchar(150) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id_tel`, `numero`, `mensaje`, `id_usu`) VALUES
(1, '4271123008', 'Solicito  informes.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `estado` int(2) NOT NULL
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
  `id_val` int(11) NOT NULL,
  `nom_sec` varchar(100) NOT NULL,
  `img_sec` varchar(255) NOT NULL,
  `desc_sec` text NOT NULL,
  `estado` int(2) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valores`
--

INSERT INTO `valores` (`id_val`, `nom_sec`, `img_sec`, `desc_sec`, `estado`, `id_usu`) VALUES
(1, 'Valores', 'public/img/filosofia/VAL_20231206_185310_valores.png', 'Emprendimiento\r\n\r\nLiderazgo\r\n\r\nDisciplina\r\n\r\nInnovación', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vision`
--

CREATE TABLE `vision` (
  `id_vis` int(11) NOT NULL,
  `nom_sec` varchar(100) NOT NULL,
  `img_sec` varchar(255) NOT NULL,
  `desc_sec` text NOT NULL,
  `estado` int(2) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vision`
--

INSERT INTO `vision` (`id_vis`, `nom_sec`, `img_sec`, `desc_sec`, `estado`, `id_usu`) VALUES
(1, 'Visión', 'public/img/filosofia/VIS_20231206_003241_vision.png', 'Ser la mejor opción dentro de las Instituciones de educación Universitaria, al sobresalir en el mercado de los servicios educativos digitales que otorga un valor agregado a la enseñanza profesional, empoderando académicamente a nuestros estudiantes en el desarrollo de conocimientos, capacidades y habilidades profesionales, así como en el desarrollo de estrategias de emprendimiento para establecer proyectos de negocio exitosos y rentables.', 1, 1);

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
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_eq`);

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
-- Indices de la tabla `maestrias`
--
ALTER TABLE `maestrias`
  ADD PRIMARY KEY (`id_mas`);

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
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calidad`
--
ALTER TABLE `calidad`
  MODIFY `id_prog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `continua`
--
ALTER TABLE `continua`
  MODIFY `id_ec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_eq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `licenciaturas`
--
ALTER TABLE `licenciaturas`
  MODIFY `id_lic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `maestrias`
--
ALTER TABLE `maestrias`
  MODIFY `id_mas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mision`
--
ALTER TABLE `mision`
  MODIFY `id_mis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `id_obj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `smtp`
--
ALTER TABLE `smtp`
  MODIFY `id_smtp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id_tel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `valores`
--
ALTER TABLE `valores`
  MODIFY `id_val` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vision`
--
ALTER TABLE `vision`
  MODIFY `id_vis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
