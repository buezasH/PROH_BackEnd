<?php
require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $imagen = $_POST['imagen'];
    
    AccesoBD::insertarProducto( $descripcion, $precio, $stock, $imagen);
    
    header("Location: ListarProductos.php");
}
else {
    header("Location: Login.php");
}
?>