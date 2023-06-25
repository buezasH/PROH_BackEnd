<html>
<body>
<?php if(isset( $_SESSION['mensaje'])){
    $msg = $_SESSION['mensaje'];
   
    ?>
    <script>alert('<?php echo $msg ?>');</script>
    <?php 
    unset($_SESSION['mensaje']);
    }?>
<div class="container pt-3">
	<div class="row">
    	<div class="col-md-12">
        <div class="card">
            <div class="table-responsive ">
                <table class="table no-wrap user-table mb-0 table-primary table-striped table-bordered caption-top">
                <caption>Detalles del pedido</caption>
                  <thead class = "table-dark">
                        <tr>
                            <td class = "text-center" >C&oacute;digo pedido</td>
                            <td class = "text-center" >Codigo Producto</td>
                            <td class = "text-center" >Unidades</td>
                            <td class = "text-center" >Precio unitario</td>
                            <td class = "text-center" >Subtotal</td>
                        </tr>
                  </thead>
    <tbody>
                   
    <?php
    
        $detalles = $_REQUEST['detalles'];
        
        foreach ($detalles as $detalles) { 
    ?>
            <tr>
                <td class = "text-center"><?php echo $detalles['codigo_pedido']  ?></td>
                <td class = "text-center"><?php echo $detalles['codigo_producto'] ?> </td>
                <td class = "text-center"><?php echo $detalles['unidades'] ?></td>
                <td class = "text-center"><?php echo $detalles['precio_unitario'] ?> &euro;</td>
                <td class = "text-center"><?php echo $detalles['precio_unitario'] * $detalles['unidades']?>&euro;</td>
            </tr>
   
    <?php
        }
    ?>      
    </tbody>
    </table>
    <button class="btn btn-primary" onclick="Cargar('<?php AdminApp::app_dir()?>/control/ListarPedidos.php','cuerpo')">Volver</button>
    </div>
	</div>
    </div>
</div>
</div>

</body>
</html>