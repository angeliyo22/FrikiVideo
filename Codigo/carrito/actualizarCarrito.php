<?php

    session_start();
    
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        require 'DAO_Carrito.php';

        $idPeliculas=$_POST['idPeliculas'];
        $cantidad=$_POST['cantidad'];

        if(is_numeric($cantidad)){
            if(array_key_exists("id Peliculas: ".$idPeliculas,$_SESSION['carrito'])){
                aumentarPelicula($idPeliculas,$cantidad);
            }
        }
        header('Location: carrito.php');
    }
?>