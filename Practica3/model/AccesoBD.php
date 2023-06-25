<?php

class AccesoBD
{
    private static function conectar()
    {
       $bbdd = mysqli_connect("localhost","root","","bddtienda");
       if (mysqli_connect_error()) {
          printf("Error conectando a la base de datos: %s\n",mysqli_connect_error());
          exit();
       }
       return $bbdd;
    }
    
    private static function desconectar($bbdd)
    {
       mysqli_close($bbdd);
    }
    
    public static function comprobarUsuarioAdmin($login,$clave) {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;
        
        if ($st = mysqli_prepare($bbdd, "SELECT * FROM usuarios WHERE usuario=? and clave=? and admin=1")) {
            mysqli_stmt_bind_param($st,"ss",$login,$clave);
            mysqli_stmt_execute($st);
           
            $result=mysqli_stmt_fetch($st);
         
            AccesoBD::desconectar($bbdd);
        }
        
        return $result;
    }
    
    public static function obtenerListadoUsuarios() {
        
        $bbdd = AccesoBD::conectar();
         
        $usuarios= [];
        
        if ($resultado = mysqli_query($bbdd,"SELECT codigo, usuario, activo, admin  FROM usuarios")) {
            while ($fila = mysqli_fetch_array($resultado)) {
                array_push($usuarios, $fila);
            }
            
        }
        
        AccesoBD::desconectar($bbdd);
        
        return $usuarios;
    } 
    
    public static function obtenerListadoProductos(){
        
        $bbdd = AccesoBD::conectar();
        
        $productos = [];
        
        if($resultado = mysqli_query($bbdd,"SELECT * FROM productos")){
            while ($fila = mysqli_fetch_array($resultado)) {
                array_push($productos, $fila);
            }
        }
        
        AccesoBD::desconectar($bbdd);
        
        return $productos;
    }

    public static function obtenerProductoporID($codigo){
        
        $bbdd = AccesoBD::conectar();
        
        if($resultado = mysqli_query($bbdd,"SELECT * FROM productos WHERE codigo=".$codigo))
            $producto = mysqli_fetch_array($resultado);

        AccesoBD::desconectar($bbdd);

        return $producto;
    }
    
    public static function obtenerListadoPedidos() {
        
        $bbdd = AccesoBD::conectar();
        
        $pedidos = [];
        
        if($resultado = mysqli_query($bbdd,"SELECT * FROM pedidos")){
            while ($fila = mysqli_fetch_array($resultado)){
                array_push($pedidos,$fila);
            }
        }
        AccesoBD::desconectar($bbdd);
        
        return $pedidos;
    }

    public static function obtenerListadoDetalles($codigo) {
        
        $bbdd = AccesoBD::conectar();
        
        $detalles = [];
        
        if($resultado = mysqli_prepare($bbdd,"SELECT * FROM detalle WHERE codigo_pedido =?")){
            mysqli_stmt_bind_param($resultado,"i",$codigo);
            mysqli_stmt_execute($resultado);
            $resultado = mysqli_stmt_get_result($resultado);
            while ($fila = mysqli_fetch_array($resultado)){
                array_push($detalles,$fila);
            }
            
        }
        AccesoBD::desconectar($bbdd);
        
        return $detalles;
    }

    public static function obtenerListadoPedidosPorProducto($descripcion) {
        
        $bbdd = AccesoBD::conectar();
        
        $pedidos = [];
        $descripcion = "%".$descripcion."%";
        
        if($resultado = mysqli_prepare($bbdd,"SELECT * FROM detalle WHERE codigo_producto IN (SELECT codigo FROM productos WHERE UPPER(descripcion) LIKE UPPER(?)) ORDER BY codigo_pedido")){
            mysqli_stmt_bind_param($resultado,"s",$descripcion);
            mysqli_stmt_execute($resultado);
            $resultado = mysqli_stmt_get_result($resultado);
            while ($fila = mysqli_fetch_array($resultado)){
                array_push($pedidos,$fila);
            }
            
        }
        AccesoBD::desconectar($bbdd);
        
        return $pedidos;
    }
    public static function obtenerListadoPedidosPorUsuario($usuario) {
        
        $bbdd = AccesoBD::conectar();
        
        $pedidos = [];
        $usuario = "%".$usuario."%";
        
        if($resultado = mysqli_prepare($bbdd,"SELECT * FROM pedidos WHERE persona IN (SELECT codigo FROM usuarios WHERE UPPER(usuario) LIKE UPPER(?)) ORDER BY codigo")){
            mysqli_stmt_bind_param($resultado,"s",$usuario);
            mysqli_stmt_execute($resultado);
            $resultado = mysqli_stmt_get_result($resultado);
            while ($fila = mysqli_fetch_array($resultado)){
                array_push($pedidos,$fila);
            }
            
        }
        AccesoBD::desconectar($bbdd);
        
        return $pedidos;
    }
    //funcion que recibe una o varias fechas y devuelve un array con los pedidos que se han realizado entre esas fechas 
    public static function obtenerListadoPedidosPorFecha($fecha1,$fecha2) {
        
        $bbdd = AccesoBD::conectar();
        
        $pedidos = [];
        
        if($resultado = mysqli_prepare($bbdd,"SELECT * FROM pedidos WHERE fecha BETWEEN ? AND ?")){
            mysqli_stmt_bind_param($resultado,"ss",$fecha1,$fecha2);
            mysqli_stmt_execute($resultado);
            $resultado = mysqli_stmt_get_result($resultado);
            while ($fila = mysqli_fetch_array($resultado)){
                array_push($pedidos,$fila);
            }
            
        }
        AccesoBD::desconectar($bbdd);
        
        return $pedidos;
    }
    public static function cambiarEstadoPedido($codigo,$estado){
            
            $bbdd = AccesoBD::conectar();
            $result = FALSE;

            if ($st = mysqli_prepare($bbdd, "UPDATE pedidos SET estado = ? WHERE codigo = ?")) {
                mysqli_stmt_bind_param($st,"ii", $estado,$codigo);
                mysqli_stmt_execute($st);
                
                $result=$st->affected_rows > 0;
                
                AccesoBD::desconectar($bbdd);
            } 

            return $result;
    }
    
    public static function insertarProducto($descripcion,$precio,$existencias,$imagen) {
    
        $bbdd = AccesoBD::conectar();
        $result = FALSE;
        
        if ($st = mysqli_prepare($bbdd, "INSERT INTO productos (codigo,descripcion,precio,existencias,imagen) VALUES (NULL,?,?,?,?)")) {
            mysqli_stmt_bind_param($st,"sdis",$descripcion,$precio,$existencias,$imagen);
            mysqli_stmt_execute($st);
    
            $result=$st->affected_rows > 0;
         
            AccesoBD::desconectar($bbdd);
        } 
        
        return $result;
    }

    public static function actualizarProducto($codigo,$descripcion,$precio,$existencias,$imagen) {
        
        $bbdd = AccesoBD::conectar();
        $result = FALSE;
        
        if ($st = mysqli_prepare($bbdd, "UPDATE productos SET descripcion=?,precio=?,existencias=?,imagen=? WHERE codigo=?")) {
            mysqli_stmt_bind_param($st,"sdisi",$descripcion,$precio,$existencias,$imagen,$codigo);
            mysqli_stmt_execute($st);
    
            $result=$st->affected_rows > 0;
         
            AccesoBD::desconectar($bbdd);
        } 
        
        return $result;
    }

    public static function cambiarEstadoUsu($codigo,$estado)
    {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;
        
        $estado = !$estado;
        if ($st = mysqli_prepare($bbdd, "UPDATE usuarios SET activo = ? WHERE codigo = ?")) {
            mysqli_stmt_bind_param($st,"ii", $estado,$codigo);
            mysqli_stmt_execute($st);
            
            $result=$st->affected_rows > 0;
            
            AccesoBD::desconectar($bbdd);
        } 
        
        return $result;
    }
    public static function CambiarAdminUsu( $codigo, $admin)
    {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;
        
        $admin = !$admin;
        if ($st = mysqli_prepare($bbdd, "UPDATE usuarios SET admin = ? WHERE codigo = ?")) {
            mysqli_stmt_bind_param($st,"ii", $admin,$codigo);
            mysqli_stmt_execute($st);
            
            $result=$st->affected_rows > 0;
            
            AccesoBD::desconectar($bbdd);
        }
        
        return $result;
    }
}
?>
