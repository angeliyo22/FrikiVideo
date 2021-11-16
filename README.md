Antecedentes:
Este proyecto muestra todos los pasos a seguir para construir un portal Web empezando desde cero, para montar una tienda online de venta de películas. Donde los usuarios registrados en la misma podrán buscar y comprar las películas que deseen. Los productos que ofrece la tienda son en formato físico.
Se han utilizado distintos lenguajes de programación, como pueden ser PHP y JavaScript para su desarrollo, y estilos CSS.
Requisitos:
1. Los usuarios sin registrar podrán ver los productos de la tienda pero no podrán comprar hasta que se registren o logueen.
2. Login y registro de usuario normal.
3. Distinción entre usuario normal y administrador a la hora de loguearse.
4. El usuario administrador podrá introducir, editar y eliminar los productos de la página.
5. El usuario registrado podrá editar su perfil de usuario.
6. Los usuarios registrados podrán añadir los productos deseados al carrito de compra. Como también eliminarlos o aumentar la cantidad del producto que desean.
7. En la página principal se presentará un carrusel con distintas imágenes de los productos de la tienda, que se cambiarán de manera aleatoria si el usuario refresca la página. Distintos enlaces aparecerán si el usuario está logueado o no como el caso de modificar perfil, ver carrito.
8. Habrá un apartado donde el usuario podrá acceder al catálogo de la tienda para ver los productos de la misma.
9. Si el usuario cliquea en el producto que desea aparecerá información del mismo y un botón de añadir al carrito que solo aparecerá si el usuario está logueado en la página.
•	Diseño responsive
•	Control de errores en formularios que deben incluir como mínimo un registro de usuario
o	DNI
o	Mail
o	Fecha de nacimiento
o	Teléfono
o	Dirección
o	Provincia (se rellena automáticamente al poner el código postal)
•	Acceso restringido a usuarios no registrados
Prototipo WEB:
![inicio](https://user-images.githubusercontent.com/91693656/142055671-c8994404-5f52-4089-a09e-79caf8a7c464.PNG)
![login](https://user-images.githubusercontent.com/91693656/142055676-5c939cf3-522d-4824-8082-4b465248afe5.PNG)
![pedidos](https://user-images.githubusercontent.com/91693656/142055678-41d92851-e10f-46a5-8157-79524c66b8ce.PNG)
![peliculas](https://user-images.githubusercontent.com/91693656/142055679-65c8e6fb-268b-4b0e-98ed-a0b67f4a490f.PNG)
![registro](https://user-images.githubusercontent.com/91693656/142055680-e3932bee-3991-420e-aaaf-d44fd54627c9.PNG)
![usuarios](https://user-images.githubusercontent.com/91693656/142055682-580175dc-8abd-45bf-a74d-c7a8b27c95d3.PNG)
![(añadir_editar)Peliculas](https://user-images.githubusercontent.com/91693656/142055683-651b990e-faa9-4578-9598-580a21025044.PNG)
![(añadir_editar)Usuario](https://user-images.githubusercontent.com/91693656/142055684-fa32b4b2-dfb6-435f-a575-ead53174a5f5.PNG)
![carrito](https://user-images.githubusercontent.com/91693656/142055689-ed5e8f36-5559-4e93-b8b2-f90d5eba64e6.PNG)
![catalogo](https://user-images.githubusercontent.com/91693656/142055692-821e1b40-21e4-4cd9-9509-0843161f25cc.PNG)
![gracias](https://user-images.githubusercontent.com/91693656/142055693-c8cd1e86-e058-49d0-a81b-dac526127503.PNG)
![infoPelicula](https://user-images.githubusercontent.com/91693656/142055696-3687e1d6-cf00-4584-9b27-27309793dcb7.PNG)

Mapa WEB:
![mapa web](https://user-images.githubusercontent.com/91693656/142055628-462ea049-647b-434b-bdf9-a027daa8d249.PNG)

Guía de estilos:
Los colores que utilizaremos para los header y footers de la página será un gris oscura y en el body pondremos una imagen de fondo con temática adecuada para una tienda de películas.
Logo optaremos por una imagen de un objetivo de una cámara y el nombre de la tienda al lado suyo.
Planificación de tareas. Diagrama de Gant:
Cada día he gastado 2 horas a la realización de la página WEB, he ido completando los requisitos de la página conforme pasaban los días, salvo algunos apartados donde ha requerido más tiempo debido a fallos o a la complejidad del problema.
Diagrama E-R:
 ![diagrama entidad relacion](https://user-images.githubusercontent.com/91693656/142055617-3e4fd36a-9066-4edc-93e2-5c5766c7f0fc.PNG)

Modelo relacional:
![modelo relacional](https://user-images.githubusercontent.com/91693656/142055608-2bb9859b-48e3-4cf6-bf3a-d5e7222213b5.PNG)

Script creación BBDD:

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peliculas` (
  `idPelicula` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `Productora` varchar(45) NOT NULL,
  `Publicacion` date NOT NULL,
  `Imagen` varchar(45) DEFAULT NULL,
  `Descripcion` longtext NOT NULL,
  `Stock` int(11) NOT NULL,
  `Precio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPelicula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peliculas`
--

LOCK TABLES `peliculas` WRITE;
/*!40000 ALTER TABLE `peliculas` DISABLE KEYS */;
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
  `idPelicula` int(11) NOT NULL,
  `idDetallesPedidos` int(11) NOT NULL,
  PRIMARY KEY (`idProductos`),
  UNIQUE KEY `idProductos_UNIQUE` (`idProductos`),
  KEY `detallesPedidos_idx` (`idDetallesPedidos`),
  KEY `peliculas_idx` (`idPelicula`),
  CONSTRAINT `detallesPedidos` FOREIGN KEY (`idDetallesPedidos`) REFERENCES `detalles_pedidos` (`idDetallesPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `peliculas` FOREIGN KEY (`idPelicula`) REFERENCES `peliculas` (`idPelicula`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `DNI` varchar(45) COLLATE utf8_bin NOT NULL,
  `Telefono` varchar(10) COLLATE utf8_bin NOT NULL COMMENT 'Se comprobará que solo puedan ser teléfonos nacionales',
  `Email` varchar(45) COLLATE utf8_bin NOT NULL COMMENT 'Se comprobará que es un email válido',
  `CP` varchar(5) COLLATE utf8_bin NOT NULL,
  `Provincia` varchar(45) COLLATE utf8_bin NOT NULL COMMENT 'Se comprobará que la provincia introducida concuerda con el CP introducido',
  `ComunidadAutonoma` varchar(45) COLLATE utf8_bin NOT NULL COMMENT 'Se comprobará que la provincia seleccionada pertenece a la comunidad autónoma correspondiente',
  `Imagen` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `Rol` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `idUsuario_UNIQUE` (`idUsuario`),
  UNIQUE KEY `Usuario_UNIQUE` (`Usuario`),
  UNIQUE KEY `DNI_UNIQUE` (`DNI`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
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

-- Dump completed on 2021-11-15 19:43:43
Diseño de la interface:
Header de nuestra tienda contendrá el logo de la misma, el enlace para el catalogo, la foto del usuario en caso de que haya introducido una y este logueado y una lista desplegable con opciones que se irán adecuando en caso de que este logueado un usuario normal o un administrador o por otro caso ninguno de los dos.
El body contendrá un recuadro y dentro el contenido de la sección en cuestión en caso de la página principal un carrusel con fotos de las películas que ofrece la tienda, en el catalogo un listado de las películas, etc…
Y el footer contendrá dos secciones una con el enlace al catálogo y otra sección de usuario con los enlaces al login, registro o a modificar perfil en caso de que el usuario este logueado.
Estructura de la interface:
 ![estructura](https://user-images.githubusercontent.com/91693656/142055253-b395aa20-97f5-4d1b-a822-a4e03b98f37a.PNG)

Toda la estructura de la página es la misma.
Herramientas:
Visual Studio Code, Mamp, MySQL Workbench.
Lenguajes:
Lenguaje PHP, HTML, JavaScript y CSS.
Bibliografía:
https://www.youtube.com/watch?v=ZAtN4s7y-JQ&t
https://www.youtube.com/watch?v=yASvgVh8p5A&t
https://www.youtube.com/watch?v=IW0sR_ms1Fo
https://www.youtube.com/watch?v=jbSDXC-xjEI&t
https://www.youtube.com/watch?v=NLpK2W1TM2A
https://www.youtube.com/watch?v=TC8bT7zTdoE&t

