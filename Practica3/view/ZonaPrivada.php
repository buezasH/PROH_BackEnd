<html lang = "es">
<head>
	 <title>SkySH Administraci&oacute;n</title>
	 <meta charset="UTF-8">
	 <script src="<?php AdminApp::app_dir()?>/js/libCapas2122.js"></script>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	 <link rel="icon" type="img/ico" href="<?php AdminApp::app_dir()?>/img/skysh.png" sizes="64x64">
	 <link href=" <?php AdminApp::app_dir()?>/css/usuarios.css " rel=" stylesheet " >
	 <script src="https://kit.fontawesome.com/a3dfeeadb2.js"></script>
</head>
 <body onload="Cargar('<?php AdminApp::app_dir()?>/control/ListarUsuarios.php','cuerpo')">
 
	 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	 	<div class="container-fluid">
		    <a class="navbar-brand" href="#">
		    	<img src="<?php AdminApp::app_dir()?>/img/skysh.png" alt="SkySH Logo" style="width:60px;" class="rounded-pill"> 
		    </a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    		</button>

	      	<div class="collapse navbar-collapse" id="navbarNavDropdown">
			 	<ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link" href="#" onclick="Cargar('<?php AdminApp::app_dir()?>/control/ListarUsuarios.php','cuerpo')">Usuarios</a>
			      </li>
			     <li class="nav-item">
			        <a class="nav-link" href="#" onclick="Cargar('<?php AdminApp::app_dir()?>/control/ListarProductos.php','cuerpo')">Productos</a>
			      </li>
			      <li class="nav-item"> 
			        <a class="nav-link" href="#" onclick="Cargar('<?php AdminApp::app_dir()?>/control/ListarPedidos.php','cuerpo')">Pedidos</a>
			      </li>
			    </ul>
			    <ul class="navbar-nav">
			    <li class ="nav-item">
			      	<a class = "nav-link" href="<?php AdminApp::app_dir()?>/control/Logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</a>
			    </li>
			    </ul>
			 </div>
		 </div>
	 </nav>
	 <div id="cuerpo"></div>
	 <footer >
	 	<div class="mt-5 p-4 bg-dark text-white text-center">
	 		&copy; <?php echo date("Y"); ?> SkySH
	 	</div>
	 </footer>
 </body>
 