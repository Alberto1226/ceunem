-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla ceunem.blog: ~0 rows (aproximadamente)
DELETE FROM `blog`;
INSERT INTO `blog` (`id_blog`, `categoria`, `titulo`, `descripcion`, `img_url`, `link_url`, `estado`) VALUES
	(1, 'Salud', '5 Maneras para Apoyar la Salud Mental de los Estudiantes', 'Muchos estudiantes pasan aproximadamente una sexta parte de sus horas de vigilia en la escuela, por lo que apoyar la salud mental de los estudiantes cae sobre los hombros de los docentes.', 'public/img/blog/20231124_193809_blog-1.jpg', 'https://ceunem.edu.mx/nosotros.html', 1);

-- Volcando datos para la tabla ceunem.calidad: ~0 rows (aproximadamente)
DELETE FROM `calidad`;
INSERT INTO `calidad` (`id_prog`, `nom_menu`, `tit`, `descripcion`, `img_url`, `btn_name`, `link`, `tUrl`, `id_usu`) VALUES
	(1, 'Nosotros', 'Programa de Calidad', 'Como una institución acreditada, CEUNEM proporciona a sus estudiantes una educación de la más alta calidad en un ambiente flexible. Nuestros reconocidos programas en línea incluyen instrucción en tiempo real y materiales prácticos para asegurar que cada estudiante no solo enfrente un desafío sino que también sienta el apoyo durante todo el curso. Contáctenos hoy mismo para obtener más información sobre lo que tenemos para ofrecer. Nos esforzamos por brindar educación de alta calidad, flexible y personalizada. Contamos con becas del 100% en inscripción y reinscripción así como becas del 50% en colegiaturas únicamente por ser alumno fundador CEUNEM.', 'public/img/calidad/VIDEO_20231226_205003_home_ceunem.mp4', 'Conocer más', 'nosotros', 1, 1);

-- Volcando datos para la tabla ceunem.colores: ~0 rows (aproximadamente)
DELETE FROM `colores`;
INSERT INTO `colores` (`id_color`, `let_hf`, `let_hover`, `btn_font`, `font`, `btn_hfont`, `fondo_hf`, `btn_color`, `btn_hover`, `background`, `id_usu`) VALUES
	(1, '#222183', '#203fbc', '#2d25a7', '#1a1986', '#211a84', '#3238e2', '#0e1177', '#33206a', '#0f103e', 1);

-- Volcando datos para la tabla ceunem.continua: ~0 rows (aproximadamente)
DELETE FROM `continua`;
INSERT INTO `continua` (`id_ec`, `nom_ec`, `descripcion`, `img_url`, `pdf_url`, `estado`) VALUES
	(1, 'Maestría en Derecho Corporativo', 'La formación va dirigida a profesionales que deseen adquirir una maestría a su profesión en Derecho Corporativo, al estudiar esta rama el estudiante adquirirá conocimientos que lo ayudarán a desempeñarse actividades de sustento jurídico para las empresas de acuerdo a teorías, instituciones, principios, normativos, en etc.', 'public/img/continua/maestriaderecho.png', 'public/docs/continua/PLAN_MAESTRIA_DERECHO.pdf', 1);

-- Volcando datos para la tabla ceunem.encabezado: ~8 rows (aproximadamente)
DELETE FROM `encabezado`;
INSERT INTO `encabezado` (`id_en`, `encabezado`, `descripcion`, `id_usu`) VALUES
	(1, 'Blog', 'Mantente actualizado sobre todo lo referente al mundo universitario en México y el mundo.', 1),
	(2, 'Filosofía', 'Políticas para forjar principios y valores', 1),
	(3, 'Nuestro Equipo', 'Su dedicación es vital para el éxito de nuestra Universidad', 1),
	(4, 'Oferta Educativa', 'Licenciaturas y posgrados enfocados en el ámbito de negocios. ', 1),
	(5, 'Licenciaturas', 'Abarcamos los niveles de licenciatura y posgrado enfocados en el ámbito de negocios', 1),
	(6, 'Maestrías', 'Abarcamos los niveles de licenciatura y posgrado enfocados en el ámbito de negocios', 1),
	(7, 'Educación Continua', 'Abarcamos los niveles de licenciatura y posgrado enfocados en el ámbito de negocios', 1),
	(8, 'Testimonios', 'Conoce los testimonios de éxito de alumnos y egresados', 1);

-- Volcando datos para la tabla ceunem.equipo: ~4 rows (aproximadamente)
DELETE FROM `equipo`;
INSERT INTO `equipo` (`id_eq`, `nombre`, `puesto`, `img_url`, `rFace`, `rTw`, `rIns`, `estado`, `id_usu`) VALUES
	(2, 'Martha', 'Dirección', 'public/img/equipo/20231208_063348_team-2.jpg', 'https://es-la.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 1, 1),
	(7, 'Profesionista 2', 'Dirección', 'public/img/equipo/20231208_065634_team-1.jpg', 'https://es-la.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 1, 1),
	(8, 'Profesionista 3', 'Dirección', 'public/img/equipo/20231208_065905_team-3.jpg', 'https://es-la.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 1, 1),
	(9, 'Profesionista 4', 'Dirección', 'public/img/equipo/20231208_065920_team-4.jpg', 'https://es-la.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 1, 1);

-- Volcando datos para la tabla ceunem.formulario: ~0 rows (aproximadamente)
DELETE FROM `formulario`;
INSERT INTO `formulario` (`id_form`, `nCompleto`, `nombre`, `apellidos`, `email`, `tel`, `face`, `mensaje`, `asunto`, `live`, `id_usu`) VALUES
	(1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1);

-- Volcando datos para la tabla ceunem.licenciaturas: ~0 rows (aproximadamente)
DELETE FROM `licenciaturas`;
INSERT INTO `licenciaturas` (`id_lic`, `nom_lic`, `descripcion`, `img_url`, `pdf_url`, `estado`) VALUES
	(1, 'Lic. en Admiistración', 'La formación va dirigida a personas que deseen adquirir una licenciatura enfocada a la Administración, al estudiar esta carrera. adquirirás el desarrollo integral de las áreas administrativas de empresas y negocios.', 'public/img/licenciatura/administracion.png', 'public/docs/licenciatura/PLAN LICENCIATURA_ADMINISTRACION.pdf', 1);

-- Volcando datos para la tabla ceunem.maestrias: ~0 rows (aproximadamente)
DELETE FROM `maestrias`;
INSERT INTO `maestrias` (`id_mas`, `nom_mas`, `descripcion`, `img_url`, `pdf_url`, `estado`) VALUES
	(1, 'Maestría en Administración de Negocios', 'La formación va dirigida a profesionales que deseen adquirir una maestría a su profesión en Administración de Negocios con la finalidad de formar profesionales con una visión estratégica, emprendedora en innovadora, con conocimientos y habilidades relacionados a los procesos administrativos de los negocios.', 'public/img/maestria/maestriaadministracion.png', 'public/docs/maestria/PLAN_MAESTRIA_ADMINISTRACION.pdf', 1);

-- Volcando datos para la tabla ceunem.mapa: ~0 rows (aproximadamente)
DELETE FROM `mapa`;
INSERT INTO `mapa` (`id_mapa`, `mapa`, `id_usu`) VALUES
	(1, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29905.860789428338!2d-99.9774779!3d20.45563765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1704223837896!5m2!1ses!2smx" width="650" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>', 1);

-- Volcando datos para la tabla ceunem.menu: ~0 rows (aproximadamente)
DELETE FROM `menu`;

-- Volcando datos para la tabla ceunem.mision: ~0 rows (aproximadamente)
DELETE FROM `mision`;
INSERT INTO `mision` (`id_mis`, `frase`, `autor`, `mision`, `img_body`, `estado`, `id_usu`) VALUES
	(1, '“Lo maravilloso de aprender algo, es que nadie puede arrebatárnoslo”', 'B. B. King', 'CEUNEM es una Institución de Educación Superior inspirada en el emprendimiento, buscando la profesionalización de manera digital de toda persona en pos de una oportunidad para potencializar su talento y capacidades tanto profesionales como personales, tomando en cuenta sus necesidades de movilidad social y laboral, brindándole la oportunidad de replantear su prospectiva como una persona productivamente exitosa, capaz de emprender y desarrollar modelos de negocios exitosos y rentables, respaldadas en el conocimiento de disciplinas formales.', 'public/img/mision/20231204_215909_nosotros-3.jpg', 1, 1);

-- Volcando datos para la tabla ceunem.objetivos: ~0 rows (aproximadamente)
DELETE FROM `objetivos`;
INSERT INTO `objetivos` (`id_obj`, `nom_sec`, `img_sec`, `desc_sec`, `estado`, `id_usu`) VALUES
	(1, 'Objetivos', 'public/img/filosofia/OBJ_20231206_174623_objetivos.png', 'Empoderar académicamente a nuestros estudiantes asociados a través de la formación de conocimientos y competencias profesionales en disciplinas de corte humanista, académico-administrativo y de comunicación. Impulsar en nuestros estudiantes asociados una actitud emprendedora para superar los retos actuales de la competencia profesional laboral. Estimular en nuestros estudiantes asociados un comportamiento de responsabilidad profesional y liderazgo con carácter duradero.', 1, 1);

-- Volcando datos para la tabla ceunem.oferta: ~3 rows (aproximadamente)
DELETE FROM `oferta`;
INSERT INTO `oferta` (`id_ofe`, `tit`, `descripcion`, `img_url`, `btn_name`, `link`, `estado`, `id_usu`) VALUES
	(1, 'Licenciaturas', 'En CEUNEM cubrimos una variedad completa de cursos en todos los niveles de creatividad y educación. Como Universidad en línea con experiencia, enseñamos una variedad de clases que abarcan los niveles licenciatura y posgrado enfocados en el ámbito de negocios.', 'public/img/oferta/Licenciaturas20231228_002657_licenciaturas.png', 'Ver más', 'licenciatura', 1, 1),
	(2, 'Maestrías', 'En CEUNEM cubrimos una variedad completa de cursos en todos los niveles de creatividad y educación. Como Universidad en línea con experiencia, enseñamos una variedad de clases que abarcan los niveles licenciatura y posgrado enfocados en el ámbito de negocios.', 'public/img/oferta/Maestrías20231228_002837_maestrias.png', 'Ver más', 'maestria', 1, 1),
	(3, 'Educación continua', 'Sabemos que quieres ver la nueva oferta educativa, pero deberás ser paciente un tiempo más. Suscríbete a nuestra lista de contacto para que te notifiquen cuando tengamos disponibles nuevos planes de estudios.', 'public/img/oferta/Educación continua20231228_003030_educacion.png', 'Ver más', 'continua', 1, 1);

-- Volcando datos para la tabla ceunem.sliders: ~2 rows (aproximadamente)
DELETE FROM `sliders`;
INSERT INTO `sliders` (`id_slider`, `img`, `tit`, `descripcion`, `btn_name`, `link`, `tUrl`, `posicion`, `id_usu`, `seccion`) VALUES
	(1, 'public/img/sliders/IMG1_20231222_182206_carousel-1.jpg', 'Creando líderes y emprendedores', 'Nuestro objetivo principal es empoderar académicamente a nuestros estudiantes a través de la formación de conocimientos y competencias profesionales en disciplinas de corte humanista, académico-administrativo y de comunicación.', 'Más Información', 'nosotros', 1, 1, 1, 'inicio'),
	(2, 'public/img/sliders/IMG1_20231222_182602_carousel-2.jpg', 'Crea tu futuro profesional 100% online', 'Becas de hasta el 70%', 'Más Información', 'contacto', 1, 2, 1, 'inicio');

-- Volcando datos para la tabla ceunem.smtp: ~0 rows (aproximadamente)
DELETE FROM `smtp`;

-- Volcando datos para la tabla ceunem.telefono: ~0 rows (aproximadamente)
DELETE FROM `telefono`;
INSERT INTO `telefono` (`id_tel`, `numero`, `mensaje`, `id_usu`) VALUES
	(1, '4271123008', 'Solicito  informes.', 1);

-- Volcando datos para la tabla ceunem.testimonios: ~3 rows (aproximadamente)
DELETE FROM `testimonios`;
INSERT INTO `testimonios` (`id_tes`, `nombre`, `carrera`, `testimonio`, `img_url`, `estado`, `id_usu`) VALUES
	(1, 'Fernando', 'Estudiante de Derecho', 'CEUNEM es una gran universidad y una buena opción para muchas personas. En lo particular me ha brindado la oportunidad de iniciar un sueño muy anhelado', 'public/img/testimonios/20231228_235044_testimonial-1.jpg', 1, 1),
	(2, 'Noemi', 'Estudiante de Derecho', 'Tengo muy buena experiencia con esta universidad 10/10, te atienden de lo mas amable, sus tramites son rápidos y tiene muy buenos maestros :)', 'public/img/testimonios/20231229_015701_testimonial-2.jpg', 1, 1),
	(3, 'Miriiam', 'Estudiante de Administración', 'Para mis necesidades ha sido excelente, mi mayor preocupación es sentarme a estudiar, el espacio virtual es perfecto para eso, además encuentro la libertad necesaria para compaginarlo con otras actividades de mi elección.', 'public/img/testimonios/20231229_001204_testimonial-3.jpg', 1, 1);

-- Volcando datos para la tabla ceunem.usuarios: ~0 rows (aproximadamente)
DELETE FROM `usuarios`;
INSERT INTO `usuarios` (`id_usu`, `nombre`, `email`, `pass`, `estado`) VALUES
	(1, 'Diana Gonzalez', 'dianaegonzalezperez@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1);

-- Volcando datos para la tabla ceunem.valores: ~0 rows (aproximadamente)
DELETE FROM `valores`;
INSERT INTO `valores` (`id_val`, `nom_sec`, `img_sec`, `desc_sec`, `estado`, `id_usu`) VALUES
	(1, 'Valores', 'public/img/filosofia/VAL_20231206_185310_valores.png', 'Emprendimiento\r\n\r\nLiderazgo\r\n\r\nDisciplina\r\n\r\nInnovación', 1, 1);

-- Volcando datos para la tabla ceunem.vision: ~0 rows (aproximadamente)
DELETE FROM `vision`;
INSERT INTO `vision` (`id_vis`, `nom_sec`, `img_sec`, `desc_sec`, `estado`, `id_usu`) VALUES
	(1, 'Visión', 'public/img/filosofia/VIS_20231206_003241_vision.png', 'Ser la mejor opción dentro de las Instituciones de educación Universitaria, al sobresalir en el mercado de los servicios educativos digitales que otorga un valor agregado a la enseñanza profesional, empoderando académicamente a nuestros estudiantes en el desarrollo de conocimientos, capacidades y habilidades profesionales, así como en el desarrollo de estrategias de emprendimiento para establecer proyectos de negocio exitosos y rentables.', 1, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
