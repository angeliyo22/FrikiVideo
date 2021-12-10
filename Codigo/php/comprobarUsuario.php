<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "Conector_BD.php";
require "../usuarios/DAO_Usuarios.php";

    $usuario=$_POST['usuario'];
    $password=$_POST['password'];

    $conexion = conectar(false);

    $login = consultaLogin($conexion, $usuario, $password);
    $fila = mysqli_fetch_assoc($login);
	$user = consultaUser($conexion, $usuario);
    $pass = consultaPassword($conexion, $password);

    if(mysqli_num_rows($login)==1){
        if($fila['Rol']=='admin'){
            crearSesion($fila);
            header("Location: ../home/home.php");
        }else{
            crearSesion($fila);
            header("Location: ../home/home.php");
        }
    }else{
        if(mysqli_num_rows($user)==1 && mysqli_num_rows($pass)==0){
            //nombre si esta registrado 
            //contraseña no esta registrada
            echo "<script>alert('Contraseña incorrecta')</script>";
            echo "<script>window.open('../home/login.php','_self')</script>";
        }else{
            if(mysqli_num_rows($user)==0 && mysqli_num_rows($pass)==1){
                //nombre no esta registrado 
                //contraseña si esta registrada
                echo "<script>alert('Usuario incorrecto')</script>";
                echo "<script>window.open('../home/login.php','_self')</script>";
            }
            else{
                //nombre no esta registrado 
                //contraseña no esta registrada
                echo "<script>alert('Usuario y Contraseña incorrectos')</script>";
                echo "<script>window.open('../home/login.php','_self')</script>";
            }
        }
    }
?>