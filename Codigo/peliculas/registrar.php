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
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="icon" href="../imagenes/logos/logo.png" type="image/png"/>
    <title>FrikiVideo</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top sticky-top">
        <div class="container">
            <a class="navbar-brand" href="../home/home.php"><img src="../imagenes/logos/logo.png" alt="logo" width="60px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <?php if(isset($_SESSION["Usuario"])) {?>
			<div class=" justify-content-end" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li class="nav-item" style="margin-top:10px;">
						<a class="nav-link" href="../pedidos/pedidos.php">Pedidos</a>
					</li>
					<li class="nav-item" style="margin-top:10px;">
						<a class="nav-link" href="../usuarios/adminUsuarios.php">Usuarios</a>
					</li>
					<li class="nav-item" style="margin-top:10px;">
						<a class="nav-link active" href="../peliculas/adminPeliculas.php">Películas</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?php echo $_SESSION["Imagen"] ?>" width="50px" height="50px" style="border-radius: 100px"></a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../php/modificarPerfil.php">Modificar Perfil</a></li>
							<li><a class="dropdown-item" href="../php/cerrarSesion.php">Cerrar Sesion</a></li>
						</ul>
					</li>
				</ul>
    		</div>
			<?php }else{header("Location: ../php/cerrarSesion.php");} ?>
        </div>
    </nav>
    <div class="container" id="main">
        <div class="row mt-5">
            <div class="col-md-12">
                <fieldset>
                    <legend>Datos de Películas</legend>
                    <form method="POST" action="funciones.php" enctype="multipart/form-data" id="registroPeliculas">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Titulo -->
                                <div class="form-group" id="grupo_titulo">
                                    <label for="titulo" class="label">Titulo</label><br>
                                    <input class="form-control inputs" type="text" name="titulo" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Productora -->
                                <div class="form-group" id="grupo_productora">
                                    <label for="productora" class="label">Productora</label><br>
                                    <input class="form-control inputs" type="text" name="productora" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Publicacion -->
                                <div class="form-group" id="grupo_publicacion">
                                    <label for="publicacion" class="label">Publicacion</label><br>
                                    <input class="form-control inputs" type="text" name="publicacion" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Imagen -->
                                <div class="form-group" id="grupo_imagen">
                                    <label for="imagen" class="label">Imagen</label><br>
                                    <input class="form-control inputs" type="file" name="imagen" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Descripcion -->
                                <div class="form-group" id="grupo_descripcion">
                                    <label for="descripcion" class="label">Descripcion</label><br>
                                    <textarea class="form-control inputs"  name="descripcion" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Stock -->
                                <div class="form-group" id="grupo_stock">
                                    <label for="stock" class="label">Stock</label><br>
                                    <input class="form-control inputs" type="text" name="stock" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Precio -->
                                <div class="form-group" id="grupo_precio">
                                    <label for="precio" class="label">Precio</label><br>
                                    <input class="form-control inputs" type="text" name="precio" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="submit" name="accion" class="btn boton" value="Registrar">
                        <a href="adminPeliculas.php" class="btn btn-default">Cancelar</a>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="../js/javaAdminPeliculas.js"></script>
</body>
</html>