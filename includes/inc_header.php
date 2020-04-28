<!DOCTYPE HTML>
<html lang="es">
<head>
<base href="<?php echo BASEPATH; ?>">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Latzhop | Home</title>

<!-- CSS -->
<link href="<?php echo IMAGES; ?>favicon.png" rel="shortcut icon" type="image/x-icon">
<link href="assets/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
<link href="<?php echo CSS; ?>ui.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS; ?>responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)">
<link href="<?php echo CSS; ?>bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo WAITME ?>waitMe.min.css">
<link rel="stylesheet" href="<?php echo ALERTIFY ?>css/themes/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo ALERTIFY ?>css/alertify.min.css">


<!-- JS -->
<script src="<?php echo JS; ?>jquery.min.js"></script>
<script src="<?php echo JS; ?>bootstrap.bundle.min.js"></script>
<script src="<?php echo JS; ?>script.js"></script>
<script src="<?php echo WAITME ?>waitMe.min.js"></script>
<script src="<?php echo ALERTIFY ?>alertify.min.js"></script>

</head>
<body>

 <!-- section-header -->
<header class="section-header">

<nav class="navbar navbar-dark navbar-expand p-0 bg-primary">
<div class="container">
    <ul class="navbar-nav d-none d-md-flex mr-auto">
		<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
    </ul>
    
    <ul class="navbar-nav">
		<li class="nav-item"><span class="nav-link"> Cel: +51 950 772 205 </span></li>
	</ul>
</nav>

<section class="header-main border-bottom">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-2 col-6">
		<a href="index.php" class="brand-wrap">
			<img class="logo" src="assets/images/logotipo.png">
		</a>
	</div>
	<div class="col-lg-6 col-12 col-sm-12">
		<form action="#" class="search">
			<div class="input-group w-100">
			    <input type="text" class="form-control" placeholder="Buscar">
			    <div class="input-group-append">
			      <button class="btn btn-primary" type="submit">
			        <i class="fa fa-search"></i>
			      </button>
			    </div>
		    </div>
		</form>
	</div> <!-- col.// -->
	<div class="col-lg-4 col-sm-6 col-12">
		<div class="widgets-wrap float-md-right">
			<div class="widget-header  mr-3">
				<a href="views/view_carrito.php" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
				<span class="badge badge-pill badge-danger notify notify_cart">0</span>
			</div>

			<div class="widget-header icontext">
				<span class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></span>
				<div class="text">
					<div> 
						<a href="#" class="btn_login">Iniciar sesión</a>
					</div>
				</div>
			</div>
		</div> 
	</div> 
</div> 
	</div>
</section>
</header>


<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog mx-auto" role="document" style="max-width: 400px!important;">
    <div id="waitModal" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Iniciar sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_login" action="" method="POST">
        	<div class="form-group">
        		<label for="usuario" class="col-form-label col-form-label-sm">Usuario:</label>
        		<input type="text" id="usuario" name="usuario" class="form-control form-control-sm">
        		<div class="invalid-feedback">
			     	Debe ingresar su nombre de usuario
			    </div>
        	</div>
			
			<div class="form-group">
        		<label for="password" class="col-form-label col-form-label-sm">Password:</label>
        		<input type="password" id="password" name="clave" class="form-control form-control-sm">
        		<div class="invalid-feedback">
			     	Debe ingresar la contraseña
			    </div>
        	</div>

	       <div class="modal-footer">
	        	<button type="button" class="btn btn-primary btn-sm btn_loguear">Aceptar</button>
	       </div>
        </form>
      </div>
    </div>
  </div>
</div>
 <!-- section-header.// -->


 <div id="modal_pay"></div>

