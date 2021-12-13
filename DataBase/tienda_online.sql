-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tienda_online
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `detalles_pedidos`
--

DROP TABLE IF EXISTS `detalles_pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalles_pedidos` (
  `idDetallesPedidos` int(11) NOT NULL AUTO_INCREMENT,
  `idPedidos` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `Precio` varchar(45) NOT NULL,
  `Cantidad` varchar(45) NOT NULL,
  PRIMARY KEY (`idDetallesPedidos`),
  UNIQUE KEY `idDetallesPedidos_UNIQUE` (`idDetallesPedidos`),
  KEY `pedido_idx` (`idPedidos`),
  CONSTRAINT `pedidos` FOREIGN KEY (`idPedidos`) REFERENCES `pedidos` (`idPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_pedidos`
--

LOCK TABLES `detalles_pedidos` WRITE;
/*!40000 ALTER TABLE `detalles_pedidos` DISABLE KEYS */;
INSERT INTO `detalles_pedidos` VALUES (1,1,5,'8.40','1'),(2,1,4,'8','1'),(3,3,11,'11.94','1');
/*!40000 ALTER TABLE `detalles_pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `idPedidos` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `PrecioTotal` varchar(45) COLLATE utf8_bin NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idPedidos`),
  UNIQUE KEY `idPedidos_UNIQUE` (`idPedidos`),
  KEY `usuario_idx` (`idUsuario`),
  CONSTRAINT `usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,2,'16.4','2021-12-09','Finalizado'),(2,2,'6','2021-12-09','Finalizado'),(3,2,'11.94','2021-12-09','Finalizado');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peliculas` (
  `idPeliculas` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(45) NOT NULL,
  `Productora` longtext NOT NULL,
  `Publicacion` date NOT NULL,
  `Imagen` varchar(200) DEFAULT NULL,
  `Descripcion` longtext NOT NULL,
  `Stock` int(11) NOT NULL,
  `Precio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPeliculas`),
  UNIQUE KEY `idPelicula_UNIQUE` (`idPeliculas`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peliculas`
--

LOCK TABLES `peliculas` WRITE;
/*!40000 ALTER TABLE `peliculas` DISABLE KEYS */;
INSERT INTO `peliculas` VALUES (1,'Shang-Chi y la leyenda de los Diez Anillos','Marvel Studios','2021-09-03','../imagenes/shang-chi.jpg','Shang-Chi y la leyenda de los Diez Anillos (en inglés: Shang-Chi and the Legend of the Ten Rings) es una película estadounidense de superhéroes basada en el personaje de Marvel, Shang-Chi y confirmada oficialmente en la Convención Internacional de Cómics de San Diego de 2019. Producida por Marvel Studios y distribuida por Walt Disney Studios Motion Pictures, es la vigésima quinta película en el Universo cinematográfico de Marvel. La cinta está dirigida por Destin Daniel Cretton, escrita por David Callaham y Cretton y protagonizada por Simu Liu como Shang-Chi, junto a Tony Leung y Awkwafina.',5,'20'),(2,'Venom: Let There Be Carnage','	Columbia Pictures, Marvel Entertainment','2021-10-01','../imagenes/venom2.jpg','Venom: Let There Be Carnage (conocida como Venom: Carnage liberado en Hispanoamérica y Venom: Habrá Matanza en España) es una película estadounidense de superhéroes basada en el personaje de Marvel Comics, Venom, producida por Columbia Pictures en asociación con Marvel y Tencent Pictures y distribuida por Sony Pictures Releasing. Es la secuela de Venom (2018), y la segunda película dentro del Universo Spider-Man de Sony. Andy Serkis dirigió la película a partir del guion de Kelly Marcel, contando con los actores Tom Hardy como Eddie Brock / Venom junto con Woody Harrelson como Cletus Kasady / Carnage, Michelle Williams, Reid Scott y Naomie Harris.',8,'25'),(3,'Coco','Walt Disney Pictures, Pixar Animation Studios','2017-12-01','../imagenes/coco.jpg','Coco es una película de animación por ordenador producida por Pixar Animation Studios y distribuida por Walt Disney Studios Motion Pictures. Su argumento está basado en una idea de Lee Unkrich, quien también ejerció como director del proyecto, a la par que Adrián Molina como codirector, y contó con un elenco de voces casi completamente de origen latino, al estar conformado por Anthony Gonzalez, Gael García Bernal, Benjamin Bratt, Alanna Ubach, Renée Victor, Ana Ofelia Murguía y Edward James Olmos, entre otros. La trama gira en torno a Miguel, un chico de doce años que es transportado accidentalmente al mundo de los muertos, donde busca ayuda para encontrar a su tatarabuelo músico fallecido y así poder volver con su familia de entre los vivos y que esta quite la prohibición que impone a sus miembros sobre tocar música.\r\n\r\nLa celebración mexicana del Día de Muertos fue la principal inspiración a la hora de preparar el guion, cuyo trabajo fue obra de Molina y Matthew Aldrich, a partir de la historia sugerida por este par de trabajadores, así como de Unkrich y Jason Katz. La fase de animación comenzó en 2016 y, para llegar a tal paso, Unkrich y otros miembros de Pixar realizaron viajes a México a modo de investigación, especialmente a los estados de Guanajuato, Michoacán y Oaxaca. Allí, aparte de visitar varios de los lugares que más adelante se tomarían como referencia para diseñar los escenarios de la cinta, también estuvieron conviviendo con varias familias locales, con las que aprendieron sobre las tradiciones del país y tomaron sus rasgos físicos para el modelado de los personajes. Por su parte, la banda sonora fue obra de Michael Giacchino, quien ya había colaborado con otros largometrajes de la compañía. Asimismo, el coste de producción fue de 175 millones USD.\r\n\r\nEl lanzamiento del filme fue llevado a cabo el 20 de octubre de 2017 en el Festival Internacional de Cine de Morelia en México, y a la semana siguiente se exhibió en las principales salas de cine del país —una semana antes del Día de Muertos—, mientras que en Estados Unidos hubo que esperar hasta el 22 de noviembre de ese mismo año. La cinta fue elogiada por su animación, los actores de voz, la música, su historia emocional y el respeto hacia la cultura del país; tal es así que consiguió unos ingresos en taquilla por valor de más de 800 millones USD. Es más, el filme fue nominado a varios premios, entre los que ganó el par de Óscar a la mejor película de animación y a la mejor canción original, con el sencillo «Recuérdame».',10,'4.97'),(4,'El viaje de Chihiro','Studio Ghibli','2002-10-25','../imagenes/elViajeDeChihiro.jpg','El viaje de Chihiro (千と千尋の神隠し Sen to Chihiro no Kamikakushi, lit. La misteriosa desaparición de Sen y Chihiro)​ es una película de animación japonesa de 2001 dirigida por Hayao Miyazaki y producida por Studio Ghibli. Se trata del séptimo largometraje dirigido por Miyazaki dentro del estudio y de la decimosegunda producción de Ghibli. El filme cuenta la historia de una niña de doce años llamada Chihiro, quien durante una mudanza se ve atrapada en un mundo mágico y sobrenatural, teniendo como misión buscar su libertad y la de sus padres, y así poder regresar a su mundo.\r\n\r\nMiyazaki escribió el guion después de haber decidido que la película estaría basada sobre la hija de diez años de un amigo, quien iba a visitar su casa cada verano. En ese momento Miyazaki estaba trabajando en dos proyectos personales, pero ambos fueron rechazados. Con un presupuesto de 1900 millones de yenes —19 millones de dólares estadounidenses—, la producción de El viaje de Chihiro comenzó en 2000.\r\n\r\nDesde su estreno, que fue el 20 de julio de 2001, El viaje de Chihiro alcanzó un gran éxito dentro y fuera de Japón. Con una recaudación mayor a los 30 mil millones de yenes —229 millones de dólares—, fue la película más taquillera en la historia del cine japonés; (hasta la llegada de la película de Demon Slayer en 2020), mientras que a nivel mundial recaudó más de 264 millones de dólares. Aclamada por la crítica internacional, la película es considerada una de las mejores de la década de los 2000, y una de las mejores películas animadas de todos los tiempos.​ En cuanto a premios, ganó un Óscar en la categoría de mejor película de animación —la única película de anime que ha recibido dicha condecoración hasta ahora—; también ganó el Oso de oro, ex aequo con Domingo sangriento, en el Festival Internacional de Cine de Berlín de 2002, siendo la única película de animación en conseguirlo hasta la fecha. Además, se encuentra en el top 10 de las 50 películas que deberías ver a los 14 años según el British Film Institute.',15,'8'),(5,'El Gigante De Hierro','Warner Bros, Feature Animation','1999-07-09','../imagenes/ironGiant.jpg','El gigante de hierro es una película de animación de ciencia ficción, dirigida por Brad Bird para la división de animación de Warner Bros. Se basa en la novela The Iron Man del escritor británico Ted Hughes y su guion fue redactado por Tim McCanlies a partir de un tratamiento de la historia del propio Bird. Los personajes principales tienen las voces de Eli Marienthal, Christopher McDonald, Jennifer Aniston, Harry Connick, Jr., John Mahoney y Vin Diesel. Ambientada en 1957, en plena Guerra Fría, la película trata sobre un niño llamado Hogarth Hughes que descubre y entabla amistad con un robot gigante que ha caído del espacio. Con la ayuda del artista Dean McCoppin, intentan evitar que el Ejército de los Estados Unidos y Kent Mansley, un paranoico agente del FBI, encuentren y destruyan al gigante.\r\n\r\nEl desarrollo de la película comenzó en 1994 en forma de musical con la implicación de Pete Townshend, de la banda The Who, aunque el proyecto no tomó verdadera forma hasta que Bird fue contratado como director y este fichó a McCanlies como guionista en 1996. La película se creó con animación tradicional, aunque el gigante protagonista es una imagen generada por computadora. La película fue creada con un reducido equipo de artistas y con la mitad de tiempo y presupuesto que otros largometrajes de animación. La banda sonora fue compuesta por Michael Kamen e interpretada por la Orquesta Filarmónica Checa.\r\n\r\nEl estreno de El gigante de hierro tuvo lugar en el Teatro Chino Manns de Los Ángeles el 31 de julio de 1999 y se estrenó en todo el mundo el día 6 de agosto. En su exhibición en cines el filme tuvo una baja recaudación, pues solo recaudó 31,3 millones de dólares frente a un presupuesto de producción de 50 millones, algo que se atribuyó a la inusualmente pobre campaña publicitaria de Warner y al escepticismo hacia sus producciones de animación después del fracaso de la anterior Quest for Camelot. Sin embargo, la película recibió alabanzas generales de la crítica de cine, que elogió la historia, la animación, los personajes y al robot del título, así como las interpretaciones de los actores de voz. El filme fue nominado a diversos premios y ganó nueve premios Annie de quince nominaciones. A través de su estreno en vídeo doméstico y su exhibición en televisión, El gigante de hierro se ha convertido en una película de culto que hoy es recordada como un clásico moderno del cine de animación.​ En 2015 una versión extendida y remasterizada fue reestrenada en cines y publicada en disco Blu-ray al año siguiente.',6,'8.40'),(6,'Robots','Blue Sky Studios, 20th Century Fox Animation','2005-03-11','../imagenes/robots.jpg','Robots es una película de animación estadounidense de 2005 producida por Blue Sky Studios y distribuida por 20th Century Fox, dirigida por Chris Wedge y Carlos Saldanha, estrenada el 4 de marzo de 2005. Se basa en una historia del escritor de libros para niños William Joyce y cuenta con las voces en su versión original de [Ewan Mcgregor]], Mel brooks, Halle Berry, Jennifer Colidge, Amanda Bynes, Drew Carey y Robin Williams. La película recaudó más de 260 millones de dólares con un presupuesto de 75 millones.',12,'9.70'),(7,'Big Hero 6','Walt Disney Pictures, Walt Disney Animation Studios','2015-02-06','../imagenes/bigHero6.jpg','Big Hero 6 (Grandes héroes en Hispanoamérica) es una película animada de superhéroes producida por Walt Disney Animation Studios basada en el cómic Big Hero 6 de Marvel Comics.\r\n\r\nLa película está dirigida por Don Hall, codirector de Winnie the Pooh, junto a Chris Williams, codirector de Bolt, producida por Roy Conli, productor de Enredados, El jorobado de Notre Dame y El planeta del tesoro.\r\n\r\nEs largometraje número 54 en canon de Walt Disney Animation y la primera producción de animación de Disney que cuenta con personajes de Marvel desde su adquisición por parte de la primera, en el 2009. El 22 de febrero de 2015, ganó el premio Oscar al mejor largometraje animado.',3,'4.97'),(8,'Ted','Media Rights Capital, Fuzzy Door Productions, Bluegrass Films, Smart Entertainment','2012-06-29','../imagenes/ted.jpg','Ted es una película estadounidense de comedia dirigida por Seth MacFarlane y protagonizada por Mark Wahlberg, Mila Kunis y MacFarlane. El rodaje comenzó en mayo de 2011 en Boston y Swampscott, Massachusetts.​ El film fue producido por Working Title Films y Media Rights Capital y distribuido por Universal Pictures. MacFarlane debuta como director al frente de la producción.\r\n\r\nLa película se estrenó el 29 de junio de 2012 través de Universal Pictures los críticos le dieron reseñas favorables para mixtas elogiando la dirección y actuación vocal de MacFarlane, las actuaciones de Wahlberg y Kunis, los efectos visuales, los chistes de doble sentido y la banda sonora de Murphy pero teniendo críticas por su guion pero los adultos la disfrutaron mucho y le regalaron 549 millones USD en contra de un presupuesto de 69 millones USD siendo un éxito rentable. Ted recibió una nominación a los Premios Óscar de 2013 por Mejor Canción Original pero la perdió contra Skyfall.',1,'5.95'),(9,'Shrek','DreamWorks Animation Pacific Data Images (PDI)','2001-07-13','../imagenes/shrek.jpg','Shrek es una película animada estadounidense de 2001, dirigida por el neozelandés Andrew Adamson y la estadounidense Vicky Jenson. La cinta cuenta con las voces de Mike Myers, Cameron Diaz, Eddie Murphy y John Lithgow, entre otros. Está basada en el libro titulado Shrek!, de William Steig (1990). La película ganó el Óscar a la mejor película animada y participó en la selección oficial del Festival de Cine de Cannes de 2001.​ Forma parte del AFIs 10 Top 10 en la categoría películas de animación. En 2020, fue seleccionada para su preservación en el National Film Registry de la Biblioteca del Congreso de los Estados Unidos.​ Esta película estuvo inspirada con el luchador francés, Maurice Tillet',6,'5.22'),(10,'It','New Line Cinema, RatPac-Dune Entertainment, Vertigo Entertainment, Lin Pictures, KatzSmith Productions','2017-09-08','../imagenes/it.jpg','It (titulada: It (Eso) en Hispanoamérica) es una película de 2017 producida por New Line Cinema, KatzSmith Productions, Lin Pictures y Vertigo Entertainment, y distribuida por Warner Bros Pictures.​ Es la segunda adaptación de la novela homónima de Stephen King y está destinada a ser la primera entrega de una duología planificada. La novela fue adaptada previamente en una miniserie de 1990. La película cuenta la historia de siete niños en Derry, Maine, que son aterrorizados por un ser epónimo, sólo para hacer frente a sus propios demonios personales en el proceso.\r\n\r\nLa película está dirigida por el argentino Andrés Muschietti y escrita por Chase Palmer, Cary Fukunaga y Gary Dauberman.​ Jaeden Martell interpreta a Bill Denbrough y Bill Skarsgård a Pennywise, el payaso, con Jeremy Ray Taylor, Sophia Lillis, Finn Wolfhard, Wyatt Oleff, Chosen Jacobs, Jack Dylan Grazer, Nicholas Hamilton y Jackson Robert Scott como protagonistas.\r\n\r\nFilmada en el sur de Ontario, la fotografía principal comenzó en Riverdale, Toronto, el 27 de junio de 2016 y terminó el 21 de septiembre de 2016. Otros lugares de Ontario que también fueron utilizados en el rodaje son Port Hope y Oshawa.\r\n\r\nIt se estrenó en Los Ángeles el 6 de septiembre de 2017 y fue lanzada en los Estados Unidos el 8 de septiembre de 2017.19​20​ La película ha recaudado más de 700 millones de dólares en todo el mundo, convirtiéndose así en la película de terror más taquillera de la historia. Ha recibido críticas positivas, con críticos elogiando la actuación, dirección y fidelidad a la novela.',4,'6'),(11,'Annabelle','New Line Cinema, Atomic Monster Productions, Evergreen Media Group, Productions, The Safran Company','2014-10-03','../imagenes/annabelle.jpg','Annabelle es una película estadounidense de terror dirigida por John R. Leonetti y escrita por Gary Dauberman. Se trata de un spin-off de la película The Conjuring, siendo además la segunda entrega de The Conjuring Universe. Protagonizada por Annabelle Wallis y Ward Horton, se estrenó el 3 de octubre de 2014 en Estados Unidos.​ Las críticas fueron mayormente negativas, pero esto no impidió que se posicionara en el segundo lugar en su primera semana de estreno (película de 2014). Además, recaudó un total de 257 millones de dólares habiendo tenido un presupuesto de $6,5 millones.',0,'11.94'),(12,'Alerta roja','Flynn Picture Company, Legendary Entertainmentz Seven Bucks Productions','2021-11-12','../imagenes/alertaRoja.jpg','Red Notice (en español Alerta roja) es una película de suspenso y comedia de acción estadounidense escrita y dirigida por Rawson Marshall Thurber. Está protagonizada por Dwayne Johnson, Gal Gadot y Ryan Reynolds. Esta es la tercera colaboración entre Johnson y Thurber después de Central Intelligence (2016) y Skyscraper (2018). Originalmente iba ser estrenada por Universal Pictures, Netflix adquirió los derechos de distribución el 8 de julio de 2019,​ y la película se estrenó el 5 de noviembre de 2021.',7,'8.50'),(13,'Hotel Transylvania 3: Summer Vacation','Sony Pictures Animation, Media Rights Capital, Perfect World Pictures','2018-07-13','../imagenes/hotalTrnasilvania3.jpg','Hotel Transylvania 3: Summer Vacation (Hotel Transylvania 3: Monstruos de vacaciones en Hispanoamérica, Hotel Transilvania 3: Unas vacaciones monstruosas en España y conocido a nivel internacional como Hotel Transylvania 3: A Monster Vacation) es una película estadounidense de comedia, fantasía y animación 3D por ordenador, producida por Sony Pictures Animation. Los papeles de Adam Sandler, Andy Samberg, Selena Gomez, David Pala, Troy Baker, Steve Buscemi, Molly Shannon, Keegan-Michael Key, Kevin James, Fran Drescher, Asher Blinkoff y Mel Brooks regresan en esta historia, es la tercera entrega de la franquicia de Hotel Transylvania y la secuela a Hotel Transylvania 2 (2015). Fue estrenada el 6 de julio de 2018 por Columbia Pictures.',7,'9.50');
/*!40000 ALTER TABLE `peliculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL AUTO_INCREMENT,
  `idDetallesPedidos` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  PRIMARY KEY (`idProductos`),
  UNIQUE KEY `idProductos_UNIQUE` (`idProductos`),
  KEY `detallesPedidos_idx` (`idDetallesPedidos`),
  KEY `pelicula_idx` (`idPelicula`),
  KEY `peliculas_idx` (`idPelicula`),
  CONSTRAINT `detallesPedidos` FOREIGN KEY (`idDetallesPedidos`) REFERENCES `detalles_pedidos` (`idDetallesPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `peliculas` FOREIGN KEY (`idPelicula`) REFERENCES `peliculas` (`idPeliculas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(20) COLLATE utf8_bin NOT NULL COMMENT 'El usuario debe ser único en la Base de Datos. Además debe tener una longitud mínima de 6 caracteres.',
  `Password` varchar(45) COLLATE utf8_bin NOT NULL COMMENT 'La contraseña no puede ser nula.\nTiene que tener una longitud mínima de 8 caracteres, contener números y algún carácter especial de la siguiente lista (!,@,#,$,%,&,?,¿,*,€)',
  `Nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `Apellido1` varchar(45) COLLATE utf8_bin NOT NULL,
  `Apellido2` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `FechaNacimiento` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `DNI` varchar(45) COLLATE utf8_bin NOT NULL,
  `Telefono` varchar(10) COLLATE utf8_bin NOT NULL COMMENT 'Se comprobará que solo puedan ser teléfonos nacionales',
  `Email` varchar(45) COLLATE utf8_bin NOT NULL COMMENT 'Se comprobará que es un email válido',
  `CP` varchar(5) COLLATE utf8_bin NOT NULL,
  `Provincia` varchar(45) COLLATE utf8_bin NOT NULL COMMENT 'Se comprobará que la provincia introducida concuerda con el CP introducido',
  `ComunidadAutonoma` varchar(45) COLLATE utf8_bin NOT NULL COMMENT 'Se comprobará que la provincia seleccionada pertenece a la comunidad autónoma correspondiente',
  `Direccion` varchar(200) COLLATE utf8_bin NOT NULL,
  `Imagen` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `Rol` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `idUsuario_UNIQUE` (`idUsuario`),
  UNIQUE KEY `Usuario_UNIQUE` (`Usuario`),
  UNIQUE KEY `DNI_UNIQUE` (`DNI`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'AdminPrueba','A?111111','Angel','Perez','Roldan','2000-04-30','45317232X','693037455','angeliyopr2@gmail.com','52005','Melilla','Melilla','Calle Padre Oses','../imagenes/fotosPerfil/thumb-1920-713297.png','admin'),(2,'Naruto','A?222222','Ramon','Castillo','Navarro','1999-05-16','65004204V','682451767','uzumaki@gmail.com','51007','Ceuta','Ceuta','prueba','../imagenes/fotosPerfil/frisk.jpg','usuario'),(3,'Prueba','A?333333','OTAKU','Pruebas','CORNER','1999-05-12','99999999R','693037455','pecosete2010@gmail.com','52005','Melilla','Melilla','aaaaaaa','../imagenes/fotosPerfil/Ghost_by_lluluchwan_Swing_Night_Sitting_552598_300x165.jpg','usuario');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-13 21:37:12
