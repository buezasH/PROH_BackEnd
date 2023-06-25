<html>
<body>

    <?php
    if(isset($_REQUEST['prod'])){
            $producto = $_REQUEST['prod'];
    ?>
		<div class="card">
            <form name="" method="POST" onsubmit="ProcesarForm(this,'<?php AdminApp::app_dir()?>/control/ModificarProducto.php','cuerpo');return false">
           	 <div class ="row">
                <div class="col-2">
                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $producto['codigo']?>" readonly>
                    </div>
                 </div>
                 <div class="col-6">
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $producto['descripcion']?>">
                    </div>
                </div>
              </div>
              <div class="row">
              	<div class ="col">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $producto['precio']?>&euro;">
                    </div>
                 </div>
                 <div class ="col">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $producto['existencias']?>">
                    </div>
                  </div>
                
                   <div class="col">
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="text" class="form-control" id="imagen" name="imagen" value="<?php echo $producto['imagen']?>">
                        </div>
           			</div>  
       			</div>
       			<div class="row">
                	<button type="submit" class="btn btn-primary">Modificar</button>
                </div>
            </form>
        </div>
    
    
    <?php } else{?>
		<div class="card">
	<form name="" method="POST" onsubmit="ProcesarForm(this,'<?php AdminApp::app_dir()?>/control/CrearProducto.php','cuerpo');return false">
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label for="descripcion">Descripcion</label> <input type="text"
						class="form-control" id="descripcion" name="descripcion" required>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="precio">Precio</label> <input type="text"
						class="form-control" id="precio" name="precio" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label for="stock">Stock</label> <input type="text"
						class="form-control" id="stock" name="stock" required>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="imagen">Imagen</label> <input type="text"
						class="form-control" id="imagen" name="imagen" required>
				</div>
			</div>
		</div>
		<div class="row">
			<button type="submit" class="btn btn-primary">Crear</button>
		</div>
	</form>
	</div>
	<?php }?>
</body>
</html>

