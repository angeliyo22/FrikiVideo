<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require "../carrito/DAO_Carrito.php";
require '../php/Conector_BD.php';
require 'DAO_Peliculas.php';

$id=$_GET['id'];

$conexion=conectar(false);

$consulta=mostrarPeliId($conexion, $id);
$fila=mysqli_fetch_assoc($consulta);

$idPeliculas=$fila['idPeliculas'];

$consultaPeliculas=mostrarPeliId($conexion,$idPeliculas);
$mostrarPeliculas=mysqli_fetch_array($consultaPeliculas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
	<link rel="stylesheet" href="../css/estilo.css">
    <link rel="icon" href="../imagenes/logos/logo.png" type="image/png"/>
    <title>FrikiVideo</title>
</head>
<body class="d-flex flex-column min-vh-100" style="background: url(../imagenes/fondos/fondo1.png);">
    <!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="../home/home.php"><img src="../imagenes/logos/logo.png" alt="logo" width="60px"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catalogo</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="../peliculas/catalogoPeliculas.php">Películas</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
				<div id="navbarSupportedContent">
					<ul class="navbar-nav">
						<?php if(!isset($_SESSION["Usuario"])) {?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Invitado</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="../home/login.php">Login</a></li>
							</ul>
						</li>
						<?php } ?>
						<?php if(isset($_SESSION["Usuario"])) {?>
							<?php if($_SESSION["Rol"]=="usuario") {?>
							<li class="nav-item" style="margin-top:10px;">
								<a class="nav-link" href="../carrito/carrito.php">Carrito<span class="badge"><?php echo cantidad();?></span></a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?php echo $_SESSION["Imagen"] ?>" width="50px" height="50px" style="border-radius: 100px"></a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="../php/modificarPerfil.php">Modificar Perfil</a></li>
									<li><a class="dropdown-item" href="../php/cerrarSesion.php">Cerrar Sesion</a></li>
								</ul>
								<?php } ?>
								<?php if($_SESSION["Rol"]=="admin") {?>
								<li class="nav-item" style="margin-top:10px;">
									<a class="nav-link" href="../pedidos/pedidos.php">Pedidos</a>
								</li>
								<li class="nav-item" style="margin-top:10px;">
									<a class="nav-link" href="../usuarios/adminUsuarios.php">Usuarios</a>
								</li>
								<li class="nav-item" style="margin-top:10px;">
									<a class="nav-link" href="../peliculas/adminPeliculas.php">Películas</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?php echo $_SESSION["Imagen"] ?>" width="50px" height="50px" style="border-radius: 100px"></a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
										<li><a class="dropdown-item" href="../php/modificarPerfil.php">Modificar Perfil</a></li>
										<li><a class="dropdown-item" href="../php/cerrarSesion.php">Cerrar Sesion</a></li>
									</ul>
								</li>
							</li>
							<?php }?>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- Navbar -->
	<div class="container contenedorDetalles pt-5 mb-5" style="position:relative;">
		<div class="panelDetalles">
			<div class="producto">
                <div class="caratula">
                    <img src="<?php echo $mostrarPeliculas['Imagen'] ?>" class="imagenDetalles" alt="">
                </div>
                <div class="detalles">
                    <div class="shadowDetalles">
                        <div class="titulo" style="padding-bottom:5px"><h1><?php echo $mostrarPeliculas['Titulo'] ?></h1></div>
                        <div class="subInfo" style="height:10%;">
							<?php if($fila['Stock']==0){
							?>
							<div class="pt-3"><u><i><b>Fuera de Stock</u> <i class="fas fa-times"></i></i></b></i></div>
							<?php } else{?>
							<div class="pt-3"><u><i><b>En Stock</u> <i class="fas fa-check"></i></b></i></div>
							<?php }?>
                            <div class="compañia mt-3"><u><i><b>Productora:</u> </b></i><?php echo $mostrarPeliculas['Productora'] ?></div>
                            <div class="fecha mt-3 pb-3"><u><i><b>Publicación:</u> </b></i><?php echo $mostrarPeliculas['Publicacion'] ?></div>
                        </div>
                    </div>
					<?php if(!isset($_SESSION["Usuario"])) {?>
					<div class="footer">
                        <div class="precioDetalles"><?php echo $fila['Precio'] ?>€</div>
                        <a onClick="return confirm('¡Tiene que haber iniciado sesion para usar el carrito!');" href="../home/login.php" class="btn carrito">Comprar <i class="fas fa-cart-plus"></i></a>
                    </div>
					<?php } ?>
					<?php if(isset($_SESSION["Usuario"])) {?>
						<?php if($fila['Stock']==0) {?>
					<div class="footer">
                        <div class="precioDetalles"><?php echo $fila['Precio'] ?>€</div>
                        <a onClick="return confirm('¡No puede comprar un articulo fuera de stock!');" href="infoPeliculas.php?id=<?php echo $id?>" class="btn carrito">Comprar <i class="fas fa-cart-plus"></i></a>
                    </div>
						<?php }else{ ?>
					<div class="footer">
                        <div class="precioDetalles"><?php echo $fila['Precio'] ?>€</div>
                        <a href="../carrito/carrito.php?idPeliculas=<?php echo $id?>" class="btn carrito">Comprar <i class="fas fa-cart-plus"></i></a>
                    </div>
						<?php } ?>
					<?php } ?>
                </div>
            </div>
			<div class="descripcion" id="columnaDetalles"><?php echo $mostrarPeliculas['Descripcion'] ?></div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="page-footer font-small bg-dark pt-4 mt-auto" style="color:white; position:relative;">
		<div class="container text-center text-md-left">
			<div class="row">
				<hr class="clearfix w-100 d-md-none">
				<div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
					<h5 class="font-weight-bold text-uppercase mb-4">Página</h5>
					<ul class="list-unstyled">
						<li>
							<a href="../peliculas/catalogoPeliculas.php">Catalogo Películas</a>
						</p>
						</li>
					</ul>
				</div>
				<div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
					<h5 class="font-weight-bold text-uppercase mb-4">Usuario</h5>
					<ul class="list-unstyled">
					<?php if(!isset($_SESSION["Usuario"])) {?>
						<li>
						<p>
							<a href="../home/login.php">LOGIN</a>
						</p>
						</li>
						<li>
						<p>
							<a href="../home/registro.php">REGISTRO</a>
						</p>
						</li>
					<?php }?>
					<?php if(isset($_SESSION["Usuario"])) {?>
						<li>
						<p>
							<a href="../php/modificarPerfil.php">MODIFICAR PERFIL</a>
						</p>
						</li>
						<li>
						<p>
							<a href="../php/cerrarSesion.php">CERRAR SESION</a>
						</p>
						</li>
					<?php }?>
					</ul>
				</div>
				<hr class="clearfix w-100 d-md-none">
				<div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
					<h5 class="font-weight-bold text-uppercase mb-4">Dirección</h5>
					<ul class="list-unstyled">
						<li>
						<p>
							<i class="fas fa-home mr-3"></i> Avda. de la Estación, 14 28580 Ambite, Madrid</p>
						</li>
						<li>
						<p>
							<i class="fas fa-phone mr-3"></i> +34 690 373 530</p>
						</li>
						<li>
					</ul>
				</div>
				<hr class="clearfix w-100 d-md-none">
				<div class="col-md-2 col-lg-2 text-center mx-auto my-4">
					<h5 class="font-weight-bold text-uppercase mb-4">Síguenos</h5>
					<a class="btn me-1" style="color: #fff; background-color: #3b5998; border-radius: 2rem;" href="https://es-es.facebook.com/" role="button">
						<i class="fab fa-facebook-f"></i>
					</a>
					<a class="btn me-1" style="color: #fff; background-color: #55acee; border-radius: 2rem;" href="https://twitter.com/" role="button">
						<i class="fab fa-twitter"></i>
					</a>
					<a class="btn me-1" style="color: #fff; background-color: #dd4b39; border-radius: 2rem;" href="https://www.google.es/" role="button">
						<i class="fab fa-google"></i>
					</a>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer -->
	
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
