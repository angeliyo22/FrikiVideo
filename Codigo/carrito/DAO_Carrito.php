<?php
//Carrito
function añadirPelicula($consulta, $id, $cantidad=1){
    $_SESSION['carrito']["id Peliculas: ".$id] = array(
        'id' => $consulta['idPeliculas'],
        'Titulo' => $consulta['Titulo'],
        'Imagen' => $consulta['Imagen'],
        'Precio' => $consulta['Precio'],
        'cantidad' => $cantidad
    );
}
function aumentarPelicula($id,$cantidad=FALSE){
    if($cantidad){
        $_SESSION['carrito']["id Peliculas: ".$id]['cantidad']=$cantidad;
    }else{
        $_SESSION['carrito']["id Peliculas: ".$id]['cantidad']+=1;
    } 
}
function calcularTotal(){
    $total=0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice=>$valor){
            $total+=$valor['Precio']*$valor['cantidad'];
        }
    }
    return $total;
}
function cantidad(){
    $cantidad=0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice=>$valor){
            $cantidad++;
        }
    }
    return $cantidad;
}


?>