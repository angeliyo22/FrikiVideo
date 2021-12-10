<?php
// <>  

require '../php/Conector_BD.php';
require 'DAO_Peliculas.php';

$conexion=conectar(false);

//Registrar pelicula
if($_POST['accion'] === 'Registrar'){

    $titulo=$_POST['titulo'];
    $productora=$_POST['productora'];
    $publicacion=$_POST['publicacion'];
    $descripcion=$_POST['descripcion'];
    $stock=$_POST['stock'];
    $precio=$_POST['precio'];

    $nombreImg=$_FILES['imagen']['name'];
    $imagen=$_FILES['imagen']['tmp_name'];
    $caratula="../imagenes/".$nombreImg;

    move_uploaded_file($imagen,$caratula);
            
    $comprueba=registrarPeli($conexion, $titulo, $productora, $publicacion, $caratula, $descripcion, $stock, $precio);

    if($comprueba){
        header('Location: adminPeliculas.php');
    }else{
        print 'Error al registrar el pelicula';
    }
}
//Actualizar pelicula
if($_POST['accion'] === 'Actualizar'){

    $id=$_POST['id'];
    $titulo=$_POST['titulo'];
    $productora=$_POST['productora'];
    $publicacion=$_POST['publicacion'];
    $descripcion=$_POST['descripcion'];
    $stock=$_POST['stock'];
    $precio=$_POST['precio'];

    $nombreImg=$_FILES['imagen']['name'];
    $imagen=$_FILES['imagen']['tmp_name'];
    $rutaImg="../imagenes/".$nombreImg;

    move_uploaded_file($imagen,$rutaImg);

    if(empty($_FILES['imagen']['name'])){
        $rutaImg=$_POST['imagen_tmp'];
    }
    
    $comprueba=actualizarPeli($conexion,$titulo, $productora, $publicacion, $rutaImg, $descripcion, $stock, $precio, $id);

    if($comprueba){
        header('Location: adminPeliculas.php');
    }else{
        print 'Error al actualizar la pelicula';
    }
}
//Borrar pelicula
$id=$_GET['id'];

$resultado=eliminarPeli($conexion,$id);

if($resultado){
    header('Location: adminPeliculas.php');
}else{
    print 'Error al eliminar el pelicula';
}
?>