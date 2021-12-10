<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    
    require '../php/Conector_BD.php';
    require 'DAO_Carrito.php';
    require '../pedidos/DAO_Pedidos.php';
    require '../peliculas/DAO_Peliculas.php';

    $conexion=conectar(false);
        
    $id=$_SESSION['idUsuario'];
    $total=calcularTotal();
    $fecha=date('Y-m-d');

    $comprueba=registrarPedido($conexion, $id, $total, $fecha);
    $consulta=mostrarPedido($conexion, $id, $total);
    $fila = mysqli_fetch_assoc($consulta);
    
    foreach($_SESSION['carrito'] as $indice=>$valor){
        $idPedido=$fila['idPedidos'];
        if($indice=="id Peliculas: ".$valor['id']){
            
            $idPelicula=$valor['id'];
            $precio=$valor['Precio'];
            $cantidad=$valor['cantidad'];

            $comprueba2= registrarDetallesPedido($conexion, $idPedido, $idPelicula, $precio, $cantidad);

        }
    }
    if($comprueba && $comprueba2){
        $consultaPeli=mostrarPeliId($conexion, $idPelicula);
        $fila = mysqli_fetch_assoc($consultaPeli);
        $stock=$fila['Stock'];
        $stock-=$cantidad;
        actualizarStock($conexion, $stock, $idPelicula);

        unset($_SESSION['carrito']);
        header('Location: ../home/gracias.php');
    }else{
        header('Location: carrito.php');
    }
?>