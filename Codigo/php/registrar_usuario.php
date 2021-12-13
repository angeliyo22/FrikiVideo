<?php 

	require 'Conector_BD.php';
	require '../usuarios/DAO_Usuarios.php';


	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$nombre = $_POST['nombre'];
	$apellido1 = $_POST['apellido1'];
	$apellido2 = $_POST['apellido2'];
	$dni = $_POST['dni'];
	$nacimiento = $_POST['fN'];
	$telefono = $_POST['telefono'];
	$email = $_POST['correo'];
	$cp = $_POST['cp'];
	$provincia = $_POST['provincia'];
	$comunidad = $_POST['comunidad'];
	$direccion = $_POST['direccion'];

	$nombreImg=$_FILES['imagen']['name'];
    $imagen=$_FILES['imagen']['tmp_name'];
    $rutaImg="../imagenes/fotosPerfil/".$nombreImg;

    move_uploaded_file($imagen,$rutaImg);

    if(empty($_FILES['imagen']['name'])){
        $rutaImg=$_POST['imagen_tmp'];
    }

	$conexion = conectar(false);
	$consulta = insertarUsuarios($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $nacimiento, $dni, $telefono, $email, $cp, $provincia, $comunidad, $direccion, $rutaImg);

	if($consulta){
		header('Location: ../home/login.php');
		}else {
		header('Location: ../home/registro.php');
	}
 ?>
