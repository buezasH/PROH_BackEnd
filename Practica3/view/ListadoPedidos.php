<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
</head>
<body>
<div class="container pt-3">
	<div class="row">
    	<div class="col-md-12">
        <div class="card">
            <form name="" method="POST" onsubmit="ProcesarForm(this,'<?php AdminApp::app_dir()?>/control/Filtrar.php','cuerpo');return false">
                <div class ="row">
                    <div class="col">
                        <label for="buscar_prod">Filtrar por producto</label>
                        <input type="text" name="buscar_prod" placeholder="Filtrar por producto" class="form-control">
                    </div>
                    <div class="col">
                        <label for="buscar_user">Filtrar por usuario</label>
                        <input type="text" name="buscar_user" placeholder="Filtrar por usuario" class="form-control">
                    </div>
                    <div class="col">
                        <label for="buscar_f"> Mayor que</label>
                        <input type="date" name="buscar_fmayor" class="form-control">
                    </div>
                    <div class="col">
                        <label for="buscar_f"> Menor que</label>
                        <input type="date" name="buscar_fmenor" class="form-control">
                    </div>
                    <div class="col">
                        <input type="submit" value="Buscar" class="btn btn-primary">
                    </div>
                </div>
            </form>

            <div class="table-responsive ">
                <table id="myTable" class="table no-wrap user-table mb-0 table-primary table-striped table-bordered">
                  <thead class = "table-dark">
                        <tr>
                            <td class = "text-center" >C&oacute;digo</td>
                            <td class = "text-center" >Id Usuario</td>
                            <td class = "text-center" >Fecha</td>
                            <td class = "text-center" >Importe</td>
                            <td class = "text-center" >Estado</td>
                            <td class = "text-center" ></td>
                        </tr>
                  </thead>
    <tbody>
                   
    <?php
    
        $pedidos = $_REQUEST['listado-pedidos'];
        
        foreach ($pedidos as $pedido) { 
    ?>
            <tr>
                <td class = "text-center"><?php echo $pedido['codigo'] ?></td>
                <td class = "text-center"><?php echo $pedido['persona'] ?></td>
                <td class = "text-center"><?php echo $pedido['fecha'] ?></td>
                <td class = "text-center"><?php echo $pedido['importe']?>&euro; </td>
                <td class = "text-center"><?php 
                        if($pedido['estado'] == 0) {?>
							Pendiente
                		<button type="button" class="btn btn-warning " onclick="Cargar('<?php AdminApp::app_dir()?>/control/CambiarEstadoPedido.php?codigo=<?php echo $pedido['codigo'] ?>&estado=1 ','cuerpo')">Enviar <i class="fa-solid fa-truck"></i></button>
                		<?php } else if($pedido['estado'] == 1) {?>
                        			Enviado
                        			<button type="button" class="btn btn-success" onclick="Cargar('<?php AdminApp::app_dir()?>/control/CambiarEstadoPedido.php?codigo=<?php echo $pedido['codigo'] ?>&estado=2 ','cuerpo')" >Recibir <i class="fa-solid fa-box-open"></i> </button>
                			
                			<?php } else if($pedido['estado'] == 2) {?>
                				Recibido
                				<?php } else if($pedido['estado'] == 3) {?>
                					Cancelado
                					<?php } else {?>
                							Desconocido
                					<?php }?>
                               
                </td>
                <td class = "text-center">
                <?php if($pedido['estado'] != 3 and $pedido['estado'] != 2){?>
                	<button type="button" class="btn btn-danger " onclick="Cargar('<?php AdminApp::app_dir()?>/control/CambiarEstadoPedido.php?codigo=<?php echo $pedido['codigo'] ?>&estado=3 ','cuerpo')">Cancelar </button>
                	<?php }?>
                	<button type="button" class="btn btn-primary " onclick="Cargar('<?php AdminApp::app_dir()?>/control/MostrarDetallesPedido.php?codigo=<?php echo $pedido['codigo'] ?>','cuerpo')"><i class="fa-solid fa-receipt"></i> </button>
                </td>
            </tr>
    <?php
        }
    ?>      
    </tbody>
    </table>
    </div>
	</div>
    </div>
</div>
</div>
</body>
</html>