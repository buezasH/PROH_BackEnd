<html lang="es">
<head>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<title>Zona Administraci&oacute;n</title>
</head>
<body>
        <?php
        if (isset($_REQUEST['msg'])) {
            ?>
        <div style="text-align: center; color: red">
        <?php echo $_REQUEST['msg']?>
        </div>
        <?php
        }
        if (isset($_REQUEST['a_usuario'])) {
            $a_usuario = $_REQUEST['a_usuario'];
        } else {
            $a_usuario = '';
        }
        ?>


	<div class=" text-center text-lg-start">
		<div class="card mb-3">
			<div class="row g-0 d-flex align-items-center">
				<div class="col-lg-4 d-none d-lg-flex">
					<img
						src="../img/skysh.png"
						alt="SkySH Logo"
						class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
				</div>
				<div class="col-lg-8">
					<div class="card-body py-5 px-md-5">

						<form name="" method="POST" action="<?php AdminApp::app_dir()?>/control/Login.php" autocomplete="off">
							<!-- User input -->
							<div class="form-outline mb-4">
								<input type="text" id="p_usuario" name="p_usuario" class="form-control" required autocomplete="off"/> 
								<label class="form-label" for="p_usuario" >Usuario</label>
							</div>

							<!-- Password input -->
							<div class="form-outline mb-4">
								<input type="password" id="p_clave" name="p_clave" class="form-control" />
								<label class="form-label" for="p_clave">Contrase&ntilde;a</label>
							</div>
							<button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>