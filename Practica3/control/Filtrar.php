<?php

require_once('../AdminApp.php');
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    $filtroprod = $_POST['buscar_prod'];
    $filtrousu = $_POST['buscar_user'];
    $filtrofechamayor = $_POST['buscar_fmayor'];
    $filtrofechamenor = $_POST['buscar_fmenor'];

    if(!empty($filtroprod )){
        $detalles = [];
        $detalles = AccesoBD::obtenerListadoPedidosPorProducto($filtroprod);
        
        $_REQUEST['listado-detalles'] = $detalles;
        
        include_once '../view/FiltroProducto.php';
    }
    else { if(!empty($filtrousu)){
            $pedidos = [];
            $pedidos = AccesoBD::obtenerListadoPedidosPorUsuario($filtrousu);
            $_REQUEST['listado-pedidos'] = $pedidos;

            include_once '../view/ListadoPedidos.php';
        } else if(!empty($filtrofechamayor) && !empty($filtrofechamenor)){ 
            $pedidos = [];
            $pedidos = AccesoBD::obtenerListadoPedidosPorFecha($filtrofechamayor, $filtrofechamenor);
            $_REQUEST['listado-pedidos'] = $pedidos;

            include_once '../view/ListadoPedidos.php';
        } else if(!empty($filtrofechamayor)){
                $pedidos = [];
                $pedidos = AccesoBD::obtenerListadoPedidosPorFecha($filtrofechamayor,date('Y-m-d'));
                $_REQUEST['listado-pedidos'] = $pedidos;

                include_once '../view/ListadoPedidos.php';
            } else if(!empty($filtrofechamenor)){
                $pedidos = [];
                $pedidos = AccesoBD::obtenerListadoPedidosPorFecha("",$filtrofechamenor);
                $_REQUEST['listado-pedidos'] = $pedidos;

                include_once '../view/ListadoPedidos.php';
            } else
                header("Location:ListarPedidos.php");
    }
    
} else {
    header("Location: Login.php");
}
?>