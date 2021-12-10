<?php 
    //Usuarios
	function insertarUsuarios($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $nacimiento, $dni, $telefono, $email, $cp, $provincia, $comunidadAutonoma, $direccion, $imagen){
        $consulta = "INSERT INTO `usuario` (`Usuario`, `Password`, `Nombre`, `Apellido1`, `Apellido2`, `FechaNacimiento`, `DNI`, `Telefono`, `Email`, `CP`, `Provincia`, `ComunidadAutonoma`, `Direccion`, `Imagen`, `Rol`) VALUES ('$usuario', '$password', '$nombre','$apellido1', '$apellido2', '$nacimiento', '$dni', '$telefono', '$email', '$cp', '$provincia', '$comunidadAutonoma', '$direccion', '$imagen','usuario')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function adminInsertarUsuarios($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $nacimiento, $dni, $telefono, $email, $cp, $provincia, $comunidadAutonoma, $direccion, $imagen, $rol){
        $consulta = "INSERT INTO `usuario` (`Usuario`, `Password`, `Nombre`, `Apellido1`, `Apellido2`, `FechaNacimiento`, `DNI`, `Telefono`, `Email`, `CP`, `Provincia`, `ComunidadAutonoma`, `Direccion`, `Imagen`, `Rol`) VALUES ('$usuario', '$password', '$nombre','$apellido1', '$apellido2', '$nacimiento', '$dni', '$telefono', '$email', '$cp', '$provincia', '$comunidadAutonoma', '$direccion', '$imagen','$rol')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function editarUsuarios($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $nacimiento, $dni, $telefono, $email, $cp, $provincia, $comunidadAutonoma, $direccion, $rutaImg, $id){
        $consulta = "UPDATE `usuario` SET `Usuario` = '$usuario', `Password` = '$password', `Nombre` = '$nombre', `Apellido1` = '$apellido1', `Apellido2` = '$apellido2', `FechaNacimiento` = '$nacimiento', `DNI` = '$dni', `Telefono` = '$telefono', `Email` = '$email', `CP` = '$cp', `Provincia` = '$provincia', `ComunidadAutonoma` = '$comunidadAutonoma', `Direccion` = '$direccion', `Imagen` = '$rutaImg' WHERE (`idUsuario` = '$id')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function eliminarUsuario($conexion,$id){
        $consulta = "DELETE FROM `usuario` WHERE (`idUsuario` = '$id')";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function mostrarUsuario($conexion){
        $consulta = "SELECT * FROM `usuario`";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function mostrarUsuariosId($conexion, $id){
        $consulta = "SELECT * FROM `usuario` WHERE `idUsuario`=$id";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function consultaLogin($conexion, $usuario, $password){
        $consulta = "SELECT * FROM `usuario` WHERE `Usuario`='$usuario' AND `Password` ='$password'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function consultaUser($conexion, $usuario){
        $consulta = "SELECT `Usuario` FROM `usuario` WHERE `Usuario`='$usuario'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function consultaPassword($conexion, $password){
        $consulta = "SELECT `Password` FROM `usuario` WHERE `Password`='$password'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function recuperarPassword($conexion, $email){
        $consulta = "SELECT * FROM `usuario` WHERE `Email`='$email'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }
    function crearSesion($usuario){
        session_id($usuario['Usuario']);
        session_start();
        foreach($usuario as $indice=>$valor){
            $_SESSION[$indice] = $valor;
        }
    }

?>