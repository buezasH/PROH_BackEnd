<?php

require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    $codigo =  $_GET['codigo'];
    $admin =  $_GET['estado'];
    AccesoBD::cambiarEstadoPedido( $codigo, $admin);
    
    header("Location: ListarPedidos.php");
}
else {
    header("Location: Login.php");
}
?>