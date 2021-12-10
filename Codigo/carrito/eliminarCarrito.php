<?php 

session_start();


if(isset($_GET['idPeliculas']) OR is_numeric($_GET['idPeliculas'])){

    if(!isset($_GET['idPeliculas']) OR !is_numeric($_GET['idPeliculas'])){
        header("Location: carrito.php");
    }

    $idPeliculas=$_GET['idPeliculas'];
    
    if(isset($_SESSION['carrito'])){
        if(isset($_SESSION['carrito']["id Peliculas: ".$idPeliculas])){
            unset($_SESSION['carrito']["id Peliculas: ".$idPeliculas]);
            header("Location: carrito.php");
        }
    }else{
        header("Location: ../home/home.php");
    }
}



    
    

?>