<?php 
	include '../app/config.php';

	if(!isset($_SESSION['usuario'])) {
		header('Location: ../index.php');
	}

	$ordenes = get_all_pedidos_total();

?>

<!DOCTYPE HTML>
<html lang="es">
<head>
<base href="<?php echo BASEPATH; ?>">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Latzhop | Órdenes</title>

<!-- CSS -->
<link href="<?php echo IMAGES; ?>favicon.png" rel="shortcut icon" type="image/x-icon">
<link href="assets/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
<link href="<?php echo CSS; ?>ui.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS; ?>responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)">
<link href="<?php echo CSS; ?>bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo CSS ?>bootstrap-toggle.min.css">

<!-- JS -->
<script src="<?php echo JS; ?>jquery.min.js"></script>
<script src="<?php echo JS; ?>bootstrap.bundle.min.js"></script>
<script src="<?php echo JS; ?>script.js"></script>
<script src="<?php echo JS; ?>bootstrap-toggle.min.js"></script>

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
		
	</div> <!-- col.// -->
	<div class="col-lg-4 col-sm-6 col-12">
		<div class="widgets-wrap float-md-right">
			<div class="widget-header icontext">
				<span class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></span>
				<div class="text">
					<div> 
						<a href="" class="btn_logout">Cerrar sesión</a>
					</div>
				</div>
			</div>
		</div> 
	</div> 
</div> 
	</div>
</section>
</header>
 <!-- section-header.// -->



<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
<div class="container">
	<h2 class="title-page">Mi cuenta</h2>
</div>
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
<div class="container">

<div class="row">
	<aside class="col-md-3">
		<ul class="list-group">
			<a class="list-group-item" href="index.php"> Home  </a>
			<a class="list-group-item active" href="admin/ordenes.php"> Mis órdenes </a>
			<a class="list-group-item" href="admin/detalle_pedido.php"> Detalle de pedidos </a>
		</ul>
	</aside> <!-- col.// -->
	<main class="col-md-9">

		<article class="card mb-3">
		<?php if(!empty($ordenes)): ?>
			<table class="table table-sm">
				<thead class="text-center">
					<tr>
						<th>N° orden</th>
						<th>Cliente</th>
						<th>E-mail</th>
						<th>Dirección</th>
					</tr>
				</thead>

				<tbody class="text-center">
				<?php foreach($ordenes as $orden): ?>
					<tr>
						<td><?php echo $orden['id_pedido']; ?></td>
						<td><?php echo $orden['cliente']; ?></td>
						<td><?php echo $orden['email']; ?></td>
						<td><?php echo $orden['direccion']; ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<div class="">
				<h2 class="text-center mt-5">No hay órdenes pendientes</h2> <br><br>
			</div>
		<?php endif; ?>
		</article>
	</main>
</div>

</div>
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top bg fixed-bottom">
	<div class="container">
		<section class="footer-bottom row">
			<div class="col-md-12">
				<p class="text-muted text-center"> &copy <?php echo date('Y'); ?> - Latzaqore </p>
			</div>
		</section>
	</div>
</footer>
<!-- ========================= FOOTER END // ========================= -->

<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>

</body>
</html>