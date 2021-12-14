<?php


    require '../php/Conector_BD.php';
    require '../peliculas/DAO_Peliculas.php';
    require 'DAO_Carrito.php';

    session_start();

    $conexion=conectar(false);

    if(isset($_GET['idPeliculas']) OR is_numeric($_GET['idPeliculas'])){
        $id=$_GET['idPeliculas'];

        $consultaPeli=mostrarPeliId($conexion,$id);
        $mostrarPeli=mysqli_fetch_array($consultaPeli);

        if(!$mostrarPeli){
            header("Location: ../home/home.php");
        }
    
        if(isset($_SESSION['carrito'])){//Si existe el carrito
    
            if(array_key_exists("id Peliculas: ".$id,$_SESSION['carrito'])){//Si la pelicula ya esta en el carrito
                aumentarPelicula($id);
            }else{
                añadirPelicula($mostrarPeli, $id);
            }
    
        }else{
            añadirPelicula($mostrarPeli, $id);//Si no existe el carrito
        }
    }
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
    <title>PlayGame</title>
</head>
<body class="d-flex flex-column min-vh-100">
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
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- Navbar -->
    <div class="container" id="main">
        <div class="row">
            <div class="col-md-12 mb-5 mt-5">
                <fieldset>
                    <legend>Carrito</legend>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                              <th id="centrado">#</th>
                              <th id="centrado">Nombre del Producto</th>
                              <th id="centrado">Imagen</th>
                              <th id="centrado">Precio</th>
                              <th id="centrado">Cantidad</th>
                              <th id="centrado">Total</th>
                              <th id="centrado"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($_SESSION['carrito'])){
                                    $c=0;
                                    foreach($_SESSION['carrito'] as $indice=>$valor){
                                        ++$c;
                                        $total= $valor['Precio']*$valor['cantidad'];
                            ?>
                            <tr>
                                <form action="actualizarCarrito.php" method="post">
                                    <td id="centrado"><?php echo $c ?></td>
                                    <td id="centrado"><?php echo $valor['Titulo'] ?></td>
                                    <td id="centrado"><img src="<?php echo $valor['Imagen'] ?>" alt="" width="100" height="100"></td>
                                    <td id="centrado"><?php echo $valor['Precio'] ?></td>
                                    <td id="centrado">
                                    <?php 
                                        if($indice=="id Peliculas: ".$valor['id']){
                                    ?>
                                        <input type="hidden" name="idPeliculas" value="<?php echo $valor['id'] ?>">
                                    <?php 
                                    }
                                    ?>
                                        <input type="text" name="cantidad" class="form-control" size="5" value="<?php echo $valor['cantidad'] ?>">
                                    </td>
                                    <td id="centrado"><?php echo $total?></td>
                                    <td id="centrado">
                                    <?php 
                                        if($indice=="id Peliculas: ".$valor['id']){
                                    ?>
                                        <a onClick="return confirm('¿Estas seguro de eliminar este producto del carrito?');" href="eliminarCarrito.php?idPeliculas=<?php echo  $valor['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    <?php 
                                    }
                                    ?>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i></button>
                                    </td>
                                </form>
                          </tr>
                            <?php
                                    } 
                                }else{
                            ?>
                            <tr>
                                <td id="centrado" colspan="7">NO HAY PRODUCTOS EN EL CARRITO</td>
                            </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-end">Total</td>
                                <td id="centrado"><?php echo calcularTotal(); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </fieldset>
                <hr>
                <?php 
                    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                ?>
                <div class="float-start">
                    <a href="../peliculas/catalogoPeliculas.php" class="btn btn-info">Seguir Comprando</a>
                </div>
                <div class="float-end">
                <a href="completarPedido.php" class="btn btn-success">Finalizar Compra</a>
                </div>
                <?php 
                    }else{
                ?>
                <div class="float-start">
                    <a href="../peliculas/catalogoPeliculas.php" class="btn btn-info">Seguir Comprando</a>
                </div>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Footer -->
	<footer class="page-footer font-small bg-dark pt-4 mt-auto" style="color:white;">
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>
