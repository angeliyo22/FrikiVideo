<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../php/Conector_BD.php";
require "../peliculas/DAO_Peliculas.php";
require "../carrito/DAO_Carrito.php";

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo.css">
	<link rel="icon" href="../imagenes/logos/logo.png" type="image/png"/>
    <title>FrikiVideo</title>
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
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

	<div class="container mt-5" id="main">
        <div class="row">
            <div class="jumbotron">
                <p>Gracias por su compra!</p>
                <p>
                    <a href="home.php" style="color:blue;">Regresar</a>
                </p>
            </div>
        </div>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>