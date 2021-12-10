<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require '../php/Conector_BD.php';
require 'DAO_Usuarios.php';

$id=$_GET['id'];

$conexion=conectar(false);

$resultado=mostrarUsuariosId($conexion,$id);
$fila=mysqli_fetch_assoc($resultado);

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
							<li><a class="dropdown-item" href="../consolas/catalogoConsolas.php">Consolas</a></li>
							<li><a class="dropdown-item" href="../videojuegos/catalogoVideojuegos.php">Videojuegos</a></li>
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
						<a class="nav-link active" href="../usuarios/adminUsuarios.php">Usuarios</a>
					</li>
					<li class="nav-item" style="margin-top:10px;">
						<a class="nav-link" href="../peliculas/adminPeliculas.php">Películas</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><<img src="<?php echo $_SESSION["Imagen"] ?>" width="50px" height="50px" style="border-radius: 100px"></a>
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
    <div class="container mb-5" id="main">
        <div class="row mt-5">
            <div class="col-md-12">
                <fieldset>
                    <legend>Datos de Usuarios</legend>
                    <form method="POST" action="funciones.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $fila['idUsuario'] ?>">
                    <div class="row">
                            <div class="col-md-6">
                                <!-- Usuario -->
                                <div class="form-group" id="grupo_usuario">
                                    <label for="usuario" class="label">Usuario</label><br>
                                    <input class="form-control" type="text" name="usuario" value="<?php echo $fila['Usuario'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Password -->
                                <div class="form-group" id="grupo_password">
                                    <label for="password" class="label">Password</label><br>
                                    <input class="form-control" type="text" name="password" value="<?php echo $fila['Password'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Nombre -->
                                <div class="form-group" id="grupo_nombre">
                                    <label for="nombre" class="label">Nombre</label><br>
                                    <input class="form-control" type="text" name="nombre" value="<?php echo $fila['Nombre'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Apellido1 -->
                                <div class="form-group" id="grupo_apellido1">
                                    <label for="apellido1" class="label">Apellido1</label><br>
                                    <input class="form-control" type="text" name="apellido1" value="<?php echo $fila['Apellido1'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Apellido2 -->
                                <div class="form-group" id="grupo_apellido2">
                                    <label for="apellido2" class="label">Apellido2</label><br>
                                    <input class="form-control" type="text" name="apellido2" value="<?php echo $fila['Apellido2'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Fecha de Nacimiento -->
                                <div class="form-group" id="grupo_fN">
                                    <label for="fN" class="label">Fecha de Nacimiento</label><br>
                                    <input class="form-control" type="text" name="fN" value="<?php echo $fila['FechaNacimiento'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- DNI -->
                                <div class="form-group" id="grupo_dni">
                                    <label for="dni" class="label">DNI</label><br>
                                    <input class="form-control" type="text" name="dni" value="<?php echo $fila['DNI'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Telefono -->
                                <div class="form-group" id="grupo_telefono">
                                    <label for="telefono" class="label">Telefono</label><br>
                                    <input class="form-control" type="number" name="telefono" value="<?php echo $fila['Telefono'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Email -->
                                <div class="form-group" id="grupo_email">
                                    <label for="email" class="label">Email</label><br>
                                    <input class="form-control" type="text" name="email" value="<?php echo $fila['Email'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- CP -->
                                <div class="form-group" id="grupo_cp">
                                    <label for="cp" class="label">Codigo Postal</label><br>
                                    <input class="form-control" type="number" name="cp" value="<?php echo $fila['CP'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Provincia -->
                                <div class="form-group" id="grupo_provincia">
                                    <label for="provincia" class="label">Provincia</label><br>
                                    <input class="form-control" type="text" name="provincia" value="<?php echo $fila['Provincia'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Comunidad Autonoma -->
                                <div class="form-group" id="grupo_comunidad">
                                    <label for="comunidad" class="label">Comunidad Autonoma</label><br>
                                    <input class="form-control" type="text" name="comunidad" value="<?php echo $fila['ComunidadAutonoma'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Direccion -->
                                <div class="form-group" id="grupo_direccion">
                                    <label for="direccion" class="label">Direccion</label><br>
                                    <input class="form-control"  type="text" name="direccion" value="<?php echo $fila['Direccion'] ?>"required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Imagen -->
                                <div class="form-group" id="grupo_imagen">
                                    <label for="imagen" class="label">Imagen</label><br>
                                    <input class="form-control" type="file" name="imagen">
                                    <input type="hidden" name="imagen_tmp" value="<?php echo $fila['Imagen'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Rol -->
                                <div class="form-group" id="grupo_rol">
                                    <label for="rol" class="label">Rol</label><br>
                                    <input class="form-control" type="text" name="rol" value="<?php echo $fila['Rol'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="submit" name="accion" class="btn boton" value="Actualizar">
                        <a href="adminVideojuegos.php" class="btn btn-default">Cancelar</a>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>