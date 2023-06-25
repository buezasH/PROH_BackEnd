<html>
<body>
    <div class="container pt-3">
    	<div class="row">
        	<div class="col-md-12">
            <div class="card">
                <div class="table-responsive ">
                    <table id="#myTable" class="table no-wrap user-table mb-0 table-primary table-striped table-bordered">
                      <thead class = "table-dark">
                        <tr>
                            <td class = "text-center">C&oacute;digo</td>
                            <td class = "text-center">Login</td>
                            <td class = "text-center">Activo</td>
                            <td class = "text-center">Es administrador</td>
            			</tr>
        			</thead>
       				 <tbody>
        
<?php

    $usuarios = $_REQUEST['listado-usuarios'];
    
    foreach ($usuarios as $usuario) { 
?>
        <tr>
            <td class = "text-center"><?php echo $usuario['codigo'] ?></td>
            <td class = "text-center"><?php echo $usuario['usuario'] ?></td>
            <td class = "text-center"><?php 
                    if ($usuario['activo']==1) { ?>
                		<button type="button" class="btn btn-outline-success"  onclick="Cargar('<?php AdminApp::app_dir()?>/control/CambiarEstadoUsuario.php?codigo=<?php echo $usuario['codigo'] ?>&estado=<?php echo $usuario['activo'] ?>','cuerpo')">&#10003;</button>
                <?php } else { ?>  
                		<button type="button" class="btn btn-outline-danger"  onclick="Cargar('<?php AdminApp::app_dir()?>/control/CambiarEstadoUsuario.php?codigo=<?php echo $usuario['codigo'] ?>&estado=<?php echo $usuario['activo'] ?>','cuerpo')">&#10060;</button>
                <?php } ?>    
            </td>
            <td class = "text-center"><?php 
                    if ($usuario['admin']==1) { ?>
                		<button type="button" class="btn btn-outline-success"  onclick="Cargar('<?php AdminApp::app_dir()?>/control/CambiarAdminUsuario.php?codigo=<?php echo $usuario['codigo'] ?>&admin=<?php echo $usuario['admin'] ?>','cuerpo')">&#10003;</button>
                <?php } else { ?>
                		<button type="button" class="btn btn-outline-danger"  onclick="Cargar('<?php AdminApp::app_dir()?>/control/CambiarAdminUsuario.php?codigo=<?php echo $usuario['codigo'] ?>&admin=<?php echo $usuario['admin'] ?>','cuerpo')">&#10060;</button>
                <?php } ?>    
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

