<?
die();
	include ("common_funcs_php.php");
	//$sql = stripslashes($_POST['order']);
	worDB();
	$sql="-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Servidor: fdb2.awardspace.com
-- Tiempo de generación: 15-06-2015 a las 01:37:17
-- Versión del servidor: 5.1.73
-- Versión de PHP: 5.4.4-14+deb7u14
-- 
-- Base de datos: 'pajaronico_ad'
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla 'taskstack'
-- 

CREATE TABLE 'taskstack' (
  'tid' mediumint(9) NOT NULL AUTO_INCREMENT,
  'deadline' varchar(30) NOT NULL,
  'importance' varchar(30) NOT NULL,
  'status' varchar(30) NOT NULL,
  'foolows' text NOT NULL,
  'submission_date' varchar(30) NOT NULL,
  'context' tinytext NOT NULL,
  'user' tinytext NOT NULL,
  'content' text NOT NULL,
  PRIMARY KEY ('tid')
) ENGINE=MyISAM AUTO_INCREMENT=207 DEFAULT CHARSET=latin1 AUTO_INCREMENT=207 ;

-- 
-- Volcar la base de datos para la tabla 'taskstack'
-- 

INSERT INTO 'taskstack' VALUES (18, '', '5', '', '', '2015-01-19 11:25:43', 'absdict', '', 'agregar n campos de def; para poder exportarlo a otros lenguajes');
INSERT INTO 'taskstack' VALUES (188, '', '5', 'not ready', '', '2015-05-19 00:19:09', 'BDE', '', 'arduino zero');
INSERT INTO 'taskstack' VALUES (14, '', '5', '', '', '2015-01-18 07:12:37', 'autotel', '', 'respaldar discos NI y samsung');
INSERT INTO 'taskstack' VALUES (19, '', '5', 'not ready', '', '2015-02-13 14:14:25', 'ideas', '', 'crear flashcards para self-learners, que uno mismo pone los datos, se mete cada día y te ba creando sesiones de memorizacion, con intervalos de tiempo crecientes');
INSERT INTO 'taskstack' VALUES (196, '', '5', 'not ready', '', '2015-05-28 03:10:28', 'BDE', '', 'presupuesto y seguro salud finlandia');
INSERT INTO 'taskstack' VALUES (165, '', '5', 'not ready', '', '2015-05-05 02:18:40', 'peliculas', '', 'codigo enigma pelicula the imitation game\r\n');
INSERT INTO 'taskstack' VALUES (63, '', '5', '', '', '2015-01-18 08:14:49', 'lectura', '', 'http://www.1stwebdesigner.com/things-to-consider-international-freelancer/');
INSERT INTO 'taskstack' VALUES (64, '', '5', '', '', '2015-01-18 08:15:52', 'lectura', '', 'http://www.quora.com/How-can-a-freelance-web-designer-living-in-India-get-clients');
INSERT INTO 'taskstack' VALUES (65, '', '5', '', '', '2015-01-18 08:16:27', 'lectura', '', 'http://rhizome.org/editorial/2014/dec/11/rob-horning-and-amalia-ulman/');
INSERT INTO 'taskstack' VALUES (66, '', '5', '', '', '2015-01-18 08:17:02', 'lectura', '', 'http://www.huffingtonpost.es/amy-morin/13-cosas-que-la-gente-mentalmente_b_6376884.html?utm_hp_ref=spain');
INSERT INTO 'taskstack' VALUES (69, '', '3', 'not ready', '', '2015-01-31 14:01:37', 'autotel', '', 'hacer tarjetas');
INSERT INTO 'taskstack' VALUES (71, '', '5', '', '', '2015-01-19 00:32:35', 'ideas', '', 'lambda-calculus from semantic meaning');
INSERT INTO 'taskstack' VALUES (100, '', '5', 'not ready', '', '2015-01-23 15:59:27', 'absdict', '', 'hacer el sistema de formulario para definiciones que muestre la palabra en los contextos posibles.');
INSERT INTO 'taskstack' VALUES (158, '', '5', 'not ready', '', '2015-04-23 23:42:26', 'absdict', '', 'hacer un formulario mas claro');
INSERT INTO 'taskstack' VALUES (161, '', '5', 'not ready', '', '2015-04-28 20:04:23', 'ideas', '', 'hora de ayuda gratis a estudiantes, 50.000 clp a otros');
INSERT INTO 'taskstack' VALUES (147, '', '3', 'not ready', '', '2015-04-10 13:37:54', 'fpassport', '', 'Acceptance letter from a finnish educational institution');
INSERT INTO 'taskstack' VALUES (77, '', '5', 'not ready', '', '2015-01-19 15:02:09', 'nate', '', 'averiguar lo del mit open courses');
INSERT INTO 'taskstack' VALUES (78, '', '5', 'not ready', '', '2015-01-19 15:30:53', 'lectura', '', 'http://journal.frontiersin.org/Journal/10.3389/fpsyg.2014.01341/abstract');
INSERT INTO 'taskstack' VALUES (79, '', '5', 'not ready', '', '2015-01-19 15:31:40', 'lectura', '', 'James kerouak alan ginsberg el aullido');
INSERT INTO 'taskstack' VALUES (80, '', '5', 'not ready', '', '2015-01-19 15:32:16', 'ideas', '', 'La incapacidad de memorizaromo indicio del causantee la depresipn: disonancia entre voluntad subconciente y conciente\r\n\r\nNuevoarco de comprension para la trigonomy del cerebro');
INSERT INTO 'taskstack' VALUES (81, '', '5', 'not ready', '', '2015-01-19 15:33:06', 'ideas', '', 'videocolumnismo');
INSERT INTO 'taskstack' VALUES (82, '', '5', 'not ready', '', '2015-01-19 15:33:47', 'lectura', '', 'vygotzky');
INSERT INTO 'taskstack' VALUES (83, '', '5', 'not ready', '', '2015-01-19 15:34:27', 'ideas', '', 'Ejemplos de sistemas lineares y no lineares aprendizaje');
INSERT INTO 'taskstack' VALUES (84, '', '5', 'not ready', '', '2015-01-19 20:02:16', 'autotel', '', 'hacer otro electrojam y mandar a synthopia. a lo mejor el que haga daniel?');
INSERT INTO 'taskstack' VALUES (206, '', '5', 'not ready', '', '2015-06-13 22:57:45', 'lectura', '', 'rules of play, de de salen & zimmermannn');
INSERT INTO 'taskstack' VALUES (88, '', '5', 'not ready', '', '2015-01-20 14:02:16', 'autotel', '', 'ms compose 98 (en la croquera)');
INSERT INTO 'taskstack' VALUES (190, '', '3', 'not ready', '', '2015-05-19 03:07:24', 'fpassport', '', 'presupuesto finlandia');
INSERT INTO 'taskstack' VALUES (202, '', '5', 'not ready', '', '2015-06-06 05:03:54', 'ideas', '', 'por que los ninos prefieren los juegos que se comprab de los qie se aprnden?\r\n');
INSERT INTO 'taskstack' VALUES (200, '', '5', 'not ready', '', '2015-06-04 17:39:22', 'BDE', '', 'recordaqtprio gino contacto finlandia\r\n');
INSERT INTO 'taskstack' VALUES (156, '', '5', 'not ready', '', '2015-04-22 14:39:27', 'BDE', '', 'https://nodejs.org/');
INSERT INTO 'taskstack' VALUES (94, '', '5', 'not ready', '', '2015-01-20 14:51:43', 'ideas', '', 'sintetizador en base a formula, con attiny\r\n');
INSERT INTO 'taskstack' VALUES (143, '', '3', 'not ready', '', '2015-04-06 16:40:10', 'BDE', '', 'escribi a jorge goles quiza a max.');
INSERT INTO 'taskstack' VALUES (163, '', '3', 'not ready', '', '2015-05-04 03:04:09', 'irme', '', 'llamar a jorge arias para asegurarme qie nada interrumpe becas chile');
INSERT INTO 'taskstack' VALUES (164, '', '5', 'not ready', '', '2015-05-05 02:18:40', 'ideas', '', 'cadenas hechas d caracteres para joyeria personal decorativa');
INSERT INTO 'taskstack' VALUES (101, '', '5', 'not ready', '', '2015-01-25 19:54:13', 'taskstack', '', 'To do today');
INSERT INTO 'taskstack' VALUES (197, '', '5', 'not ready', '', '2015-05-28 17:10:37', 'BDE', '', 'das housing\r\n');
INSERT INTO 'taskstack' VALUES (198, '', '3', 'not ready', '', '2015-06-02 03:27:13', 'BDE', '', 'plan finlamdoa');
INSERT INTO 'taskstack' VALUES (103, '', '5', 'not ready', '', '2015-01-31 15:22:40', 'ideas', '', 'micronetworks: conceptnand uses potential');
INSERT INTO 'taskstack' VALUES (157, '', '5', 'not ready', '', '2015-04-22 15:44:01', 'taskstack', '', 'al poner ready y delete, hacer un reflejo de eso en el tiempo real sin que haya que refrescar');
INSERT INTO 'taskstack' VALUES (179, '', '1', 'not ready', '', '2015-05-17 19:06:34', 'homeschooling', '', 'proponer proyectos para h de vero teran');
INSERT INTO 'taskstack' VALUES (171, '', '5', 'not ready', '', '2015-05-09 18:38:21', 'nate', '', 'blog ve si hay un plugin para comentar parrafos');
INSERT INTO 'taskstack' VALUES (187, '', '5', 'not ready', '', '2015-05-18 20:52:20', 'taskstack', '', 'cuanto tiempo toma hacer esta tarea; elegir por tiepo disponible :)');
INSERT INTO 'taskstack' VALUES (169, '', '5', 'not ready', '', '2015-05-08 18:13:31', 'lectura', '', 'jeremy rifkin\r\neconomia de colaboracion');
INSERT INTO 'taskstack' VALUES (172, '', '5', 'not ready', '', '2015-05-09 18:38:21', 'BDE', '', 'adult play, adult toys...');
INSERT INTO 'taskstack' VALUES (194, '', '5', 'not ready', '', '2015-05-27 22:25:47', 'autotel', '', 'ponerse en contacto con cigarra fm para tocar.\r\nhttp://cigarra.fm/contact/\r\nQuiza con physucal brothers thambien');
INSERT INTO 'taskstack' VALUES (182, '', '5', 'not ready', '', '2015-05-18 14:02:32', 'fpassport', '', 'sanomat.snt@formin. fi\r\nemail embajada finlandia');
INSERT INTO 'taskstack' VALUES (181, '', '3', 'not ready', '', '2015-05-16 14:47:09', 'Brocs', '', 'hacer un JS brocs para poder atraer audiencia y nueva investigacion');
INSERT INTO 'taskstack' VALUES (192, '', '5', 'not ready', '', '2015-05-22 16:48:22', 'BDE', '', 'draw spirograph\r\n');
INSERT INTO 'taskstack' VALUES (128, '', '5', 'not ready', '', '2015-02-24 12:08:16', 'ideas', '', 'chat que se lee lo que se esta wscribiendo como nanifestacion de lo que se piesa y lonque se dice');
INSERT INTO 'taskstack' VALUES (148, '', '3', 'not ready', '', '2015-04-10 13:37:54', 'fpassport', '', 'Health insurance* (some conditions in email)');
INSERT INTO 'taskstack' VALUES (149, '', '3', 'not ready', '', '2015-04-10 13:37:54', 'fpassport', '', 'sufficient funds (bank account statement or scholarship)');
INSERT INTO 'taskstack' VALUES (203, '', '5', 'not ready', '', '2015-06-06 05:03:54', 'BDE', '', 'bran vat');
INSERT INTO 'taskstack' VALUES (204, '', '5', 'not ready', '', '2015-06-07 05:13:37', 'ideas', '', 'cigarros bwngala');
INSERT INTO 'taskstack' VALUES (127, '', '5', 'not ready', '', '2015-02-13 17:12:44', 'nate', '', 'Nate.cl que el PHP solo de la direccion de referencia de donde esta el contenido, pero que una funcion ajax lo cargue en demanda, así la carga es más rápida y se carga lo que se usa...');
INSERT INTO 'taskstack' VALUES (159, '', '3', 'not ready', '', '2015-04-25 15:47:20', 'irme', '', 'email a allegralab. ver en favoritos');
INSERT INTO 'taskstack' VALUES (129, '', '5', 'not ready', '', '2015-04-03 14:35:52', 'ideas', '', 'círculo de tiempos fuertes y debiles es igual al círculo de octavas');
INSERT INTO 'taskstack' VALUES (130, '', '5', 'not ready', '', '2015-04-03 14:36:07', 'lectura', '', 'http://thesprouts.org/\r\n');
INSERT INTO 'taskstack' VALUES (136, '0', '5', 'not ready', '', '2015-04-03 14:37:09', 'peliculas', '', '8 paio');
INSERT INTO 'taskstack' VALUES (133, '', '5', 'not ready', '', '2015-04-03 14:36:57', 'peliculas', '', 'plastic planet');
INSERT INTO 'taskstack' VALUES (134, '', '5', 'not ready', '', '2015-03-02 02:35:26', 'lectura', '', 'libros de karl popper');
INSERT INTO 'taskstack' VALUES (153, '', '5', 'not ready', '', '2015-04-16 02:57:33', 'beatbox', '', 'beatbox: ! for high velocity\r\n& otras ideas en elcuaderno');
INSERT INTO 'taskstack' VALUES (152, '', '5', 'not ready', '', '2015-04-16 01:41:45', 'BDE', '', 'socket.io');";
	echo "about to do: $sql";
	mysql_select_db($db);
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('<div class="phpmessage"><span class=\"naranjo\">[!]</span> Could execute because: ' . mysql_error().'</div>');
	}else{
		echo "<div class=\"phpmessage\"><span class=\"naranjo\"> action was executed </div>";
	}
	//ALTER TABLE yourtable ADD q6 VARCHAR( 255 ) after q5
	mysql_close($conn);


	
?>