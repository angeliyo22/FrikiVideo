<?php 

require '../php/Conector_BD.php';
require 'DAO_Usuarios.php';

$id=$_GET['id'];

$conexion=conectar(false);

$resultado=eliminarUsuario($conexion,$id);

if($resultado){
    header('Location: adminUsuarios.php');
}else{
    print 'Error al eliminar el videojuego';
}

?>