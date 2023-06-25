<?php

require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    
    $cod = $_GET['codigo'];
    
    $detalles = AccesoBD::obtenerListadoDetalles($cod);
    $_REQUEST['detalles'] = $detalles;
    
    include_once '../view/ListadoDetalles.php';
} else {
    
    header("Location: Login.php");
}

?>