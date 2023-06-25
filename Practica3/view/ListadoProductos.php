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
                <table class="table no-wrap user-table mb-0 table-primary table-striped table-bordered">
                  <thead class = "table-dark">
                        <tr>
                            <td class = "text-center" >C&oacute;digo</td>
                            <td class = "text-center" >Descripci&oacute;n</td>
                            <td class = "text-center" >Precio</td>
                            <td class = "text-center" >Existencias</td>
                            <td class = "text-center" >Modificar</td>
                        </tr>
                  </thead>
    <tbody>
                   
    <?php
    
        $productos = $_REQUEST['listado-productos'];
        
        foreach ($productos as $producto) { 
    ?>
            <tr>
                <td class = "text-center"><?php echo $producto['codigo']  ?></td>
                <td class = "text-center"><?php echo $producto['descripcion'] ?> </td>
                <td class = "text-center"><?php echo $producto['precio'] ?>&euro;</td>
                <td class = "text-center"><?php echo $producto['existencias'] ?> </td>
                <td class = "text-center"><button type="button" class="btn btn-warning" onclick="Cargar('<?php AdminApp::app_dir()?>/control/ListarProducto.php?codigo=<?php echo $producto['codigo'] ?>','cuerpo')"><i class="fa fa-edit "></i></button>
                </td>
            </tr>
   
    <?php
        }
    ?>      
    </tbody>
    </table>
    <div class="row">
    	<button type="button" class="btn btn-success" onclick="Cargar('<?php AdminApp::app_dir()?>/control/ListarProducto.php','cuerpo')">Crear Producto</button>
    	
    </div>
    </div>
	</div>
    </div>
</div>
</div>

</body>
</html>