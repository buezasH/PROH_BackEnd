
<?php
require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    if(isset($_REQUEST['codigo'])){
        $codigo =  $_REQUEST['codigo'];
        
        $producto = AccesoBD::obtenerProductoporID($codigo);
        
        $_REQUEST['prod'] = $producto;
    }
        include_once '../view/producto.php';
}
else {
    header("Location: Login.php");
}
?>