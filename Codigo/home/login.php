<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/fontawesome/css/all.css">
  <link rel="stylesheet" href="../css/estilo.css">
  <link rel="icon" href="../imagenes/logos/logo.png" type="image/png"/>
  <title>Login</title>
</head>
<body class="d-flex flex-column min-vh-100" style="background: url(../imagenes/fondos/fondo1.png);">
	<!-- Navbar -->
	<nav class="navbar navbar-dark bg-dark">
		<div class="container">
    		<a class="navbar-brand" href="home.php"><img src="../imagenes/logos/logo.png" alt="logo" width="60px"></a>
    	</div>
	</nav>
	<!-- Navbar -->
	<div class="container contenedorLogin" style="position:relative;">
		<div class="panelLogin">
			<h1 class="card-header">Login</h1>
        	<form action="../php/comprobarUsuario.php" class="formulario" id="formulario" method="POST">
				<!-- Usuario -->
				<div class="grupo" id="grupo_usuario">
				<label for="usuario" class="label">Usuario</label><br>
				<input class="inputs" type="text" name="usuario" id="usuario" autofocus>
				<p class="mensaje_error">Usuario incorrecto</p>
				</div>
				<!-- Password -->
				<div class="grupo" id="grupo_password">
				<label for="password" class="label">Password</label><br>
				<input class="inputs" type="password" name="password" id="password">
				<p class="mensaje_error">Password incorrecta</p>
				</div>
				<div class="enlacesLogin text-end">
					<br>
					<!-- Boton -->
					<button type="submit" class="btn boton" id="boton">Login</button><br>
					<br>
					<p class="mensaje_exito_boton" id="boton_exito">Formulario enviado exitosamente!</p>
					<p class="mensaje_error_boton" id="boton_error">Por favor rellena el formulario correctamente.</p>
					<a href="registro.php" class="enlace" style="color:black;">¡Registrate Ahora!</a>
				</div>
        	</form>
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
							<a href="../peliculas/catalogoPeliculas.php">CATALOGO PELÍCULAS</a>
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
							<a href="login.php">LOGIN</a>
						</p>
						</li>
						<li>
						<p>
							<a href="registro.php">REGISTRO</a>
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
	<script src="../js/java.js"></script>
</body>
</html>
