<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
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
							<li><a class="dropdown-item" href="../consolas/catalogoConsolas.php">Consolas</a></li>
							<li><a class="dropdown-item" href="../videojuegos/catalogoVideojuegos.php">Videojuegos</a></li>
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
									<a class="nav-link active" href="../usuarios/adminUsuarios.php">Usuarios</a>
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
  
  <div class="container" id="main" style="margin-left:10%">
    <div class="row">
      <div class="col-md-12 text-end mt-5" style="margin-left:20%">
        <div> 
          <a href="registrar.php" class="btn boton"><i class="fas fa-user-plus"></i> Nuevo</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <fieldset>
          <legend>Listado de Usuarios</legend>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th id="centrado">#</th>
                <th id="centrado">Usuario</th>
                <th id="centrado">Password</th>
                <th id="centrado">Nombre</th>
                <th id="centrado">Apellido1</th>
                <th id="centrado">Apellido2</th>
                <th id="centrado">Fecha de Nacimiento</th>
                <th id="centrado">DNI</th>
                <th id="centrado">Telefono</th>
                <th id="centrado">Email</th>
                <th id="centrado">CP</th>
                <th id="centrado">Provincia</th>
                <th id="centrado">Comunidad Autonoma</th>
                <th id="centrado">Direccion</th>
                <th id="centrado">Imagen</th>
                <th id="centrado">Rol</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                require '../php/Conector_BD.php';
                require 'DAO_Usuarios.php';

                $conexion=conectar(false);

                $consulta=mostrarUsuario($conexion);
                
                while($mostrar=mysqli_fetch_array($consulta)){
              ?>
              <tr>
                <td id="centrado"><?php echo $mostrar['idUsuario']?></td>
                <td id="centrado"><?php echo $mostrar['Usuario'];?></td>
                <td id="centrado"><?php echo $mostrar['Password'];?></td>
                <td id="centrado"><?php echo $mostrar['Nombre'];?></td>
                <td id="centrado"><?php echo $mostrar['Apellido1'];?></td>
                <td id="centrado"><?php echo $mostrar['Apellido2']?></td>
                <td id="centrado"><?php echo $mostrar['FechaNacimiento']?></td>
                <td id="centrado"><?php echo $mostrar['DNI'];?></td>
                <td id="centrado"><?php echo $mostrar['Telefono'];?></td>
                <td id="centrado"><?php echo $mostrar['Email'];?></td>
                <td id="centrado"><?php echo $mostrar['CP'];?></td>
                <td id="centrado"><?php echo $mostrar['Provincia'];?></td>
                <td id="centrado"><?php echo $mostrar['ComunidadAutonoma'];?></td>
                <td id="centrado"><?php echo $mostrar['Direccion']?></td>
                <td id="centrado"><img src="<?php echo $mostrar['Imagen'] ?>" width="100px" height="100px" style="border-radius: 100px"></td>
                <td id="centrado"><?php echo $mostrar['Rol'];?></td>
                <td id="centrado">
                  <a onClick="return confirm('¿Estas seguro de eliminar este usuario?');" href="borrar.php?id=<?php echo $mostrar['idUsuario'] ?>" class="btn btn-danger"><i class="fas fa-user-minus"></i></a>
                  <a href="actualizar.php?id=<?php echo $mostrar['idUsuario'] ?>" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
                </td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </fieldset>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>