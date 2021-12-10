<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Conector_BD.php';
require '../usuarios/DAO_Usuarios.php';

$conexion=conectar(false);

if($_POST['accion'] === 'Actualizar'){

    $id=$_POST['id'];
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $nombre=$_POST['nombre'];
    $apellido1=$_POST['apellido1'];
    $apellido2=$_POST['apellido2'];
    $nacimiento=$_POST['fN'];
    $dni=$_POST['dni'];
    $telefono=$_POST['telefono'];
    $email=$_POST['email'];
    $cp=$_POST['cp'];
    $provincia=$_POST['provincia'];
    $comunidadAutonoma=$_POST['comunidad'];
    $direccion=$_POST['direccion'];

    $nombreImg=$_FILES['imagen']['name'];
    $imagen=$_FILES['imagen']['tmp_name'];
    $rutaImg="../imagenes/fotosPerfil/".$nombreImg;

    move_uploaded_file($imagen,$rutaImg);

    if(empty($_FILES['imagen']['name'])){
        $rutaImg=$_POST['imagen_tmp'];
    }

    $comprueba=editarUsuarios($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $nacimiento, $dni, $telefono, $email, $cp, $provincia, $comunidadAutonoma, $direccion, $rutaImg, $id);

    if($comprueba){

        $login = consultaLogin($conexion, $usuario, $password);
        $fila = mysqli_fetch_assoc($login);
        crearSesion($fila);
        header("Location: ../home/home.php");
    }else{
        print 'Error al actualizar el usuario';
    }
}
if($_POST['accion'] === 'Darse de baja'){

    $id=$_POST['id'];

    $resultado=eliminarUsuario($conexion,$id);

    if($resultado){
        header('Location: cerrarSesion.php');
    }else{
        print 'Error al darse de baja';
    }
}

?>