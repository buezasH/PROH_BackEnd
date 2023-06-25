<?php
require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $imagen = $_POST['imagen'];
        
        
        if(AccesoBD::actualizarProducto($codigo, $descripcion, $precio, $stock, $imagen)){
            $_SESSION['mensaje'] = "Producto actualizado correctamente";
        } else {
            $_SESSION['mensaje'] = "No se pudo actualizar el producto";
        }
        
        header("Location: ListarProductos.php");
}
else {
    header("Location: Login.php");
}
?>