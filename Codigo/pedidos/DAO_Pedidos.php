<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Pedidos
    function registrarPedido($conexion, $idUsuario, $total, $fecha){
            $consulta = "INSERT INTO `pedidos` (`idUsuario`, `PrecioTotal`, `Fecha`, `Estado`) VALUES ('$idUsuario', '$total', '$fecha', 'Finalizado')";
            $resultado = mysqli_query($conexion, $consulta);
            return $resultado; 
    }
    function mostrarPedido($conexion, $id, $precio){
        $consulta = "SELECT * FROM `pedidos` WHERE (`idUsuario` = '$id' AND `PrecioTotal` = '$precio')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function mostrarPedidoId($conexion, $id){
        $consulta = "SELECT * FROM `detalles_pedidos` WHERE (`idPedidos` = '$id')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    function registrarDetallesPedido($conexion, $idPedido, $idPelicula, $precio, $cantidad){
        $consulta = "INSERT INTO `detalles_pedidos` (`idPedidos`,`idPelicula`,`Precio`,`Cantidad`) VALUES ('$idPedido','$idPelicula','$precio','$cantidad')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado; 
    }
    function consultaPedidos($conexion){
        $consulta = "SELECT * FROM `pedidos`";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
?>