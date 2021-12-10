<?php 
    //Peliculas
    function registrarPeli($conexion, $titulo, $productora, $publicacion, $imagen, $descripcion, $stock, $precio){
        $consulta = "INSERT INTO `peliculas` (`Titulo`, `Productora`, `Publicacion`, `Imagen`, `Descripcion`, `Stock`, `Precio`) VALUES ('$titulo', '$productora', '$publicacion','$imagen', '$descripcion', '$stock', '$precio')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado; 
    }
    function actualizarPeli($conexion,$titulo, $productora, $publicacion, $imagen, $descripcion, $stock, $precio, $id){
        $consulta = "UPDATE `peliculas` SET `Titulo` = '$titulo', `Productora` = '$productora', `Publicacion` = '$publicacion',`Imagen` = '$imagen', `Descripcion` = '$descripcion', `Stock` = '$stock', `Precio` = '$precio' WHERE (`idPeliculas` = '$id')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function actualizarStock($conexion, $stock, $id){
        $consulta = "UPDATE `peliculas` SET `Stock` = '$stock' WHERE (`idPeliculas` = '$id')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function eliminarPeli($conexion,$id){
        $consulta = "DELETE FROM `peliculas` WHERE (`idPeliculas` = '$id')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function mostrarPeli($conexion){
        $consulta = "SELECT * FROM `peliculas`";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function mostrarPeliId($conexion, $id){
        $consulta = "SELECT * FROM `peliculas` WHERE `idPeliculas`=$id";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function consultaPeliculas($conexion){
		$consulta = "SELECT idPeliculas, Imagen FROM peliculas ORDER BY rand() LIMIT 4";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
?>