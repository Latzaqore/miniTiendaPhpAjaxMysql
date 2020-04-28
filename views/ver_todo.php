<?php 

	include '../app/config.php';

	if(isset($_SESSION['usuario'])) {
		header('Location: ../admin/index.php');
	}
	
	include '../includes/inc_header.php'; 

	$marca_id = $_GET['marca_id'];
	$laptops  = get_all_products($marca_id);


?>


<section class="section-pagetop bg">
<div class="container">
	<h2 class="title-page">
		Todos productos
	</h2>
	<nav>
	<ol class="breadcrumb text-white">
	    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
	    <li class="breadcrumb-item active" aria-current="page">
	    	<?php echo $laptops['marca']; ?>
	    </li>
	</ol>  
	</nav>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
<div class="container">

<div class="row">
	<aside class="col-md-3"></aside> 
	<main class="col-md-10">

<header class="border-bottom mb-4 pb-3">
		<div class="form-inline">
			<span class="mr-md-auto">
				<?php echo count($laptops['laptops']) ?> Artículos encontrados 
			</span>
		</div>
</header>

<?php foreach($laptops['laptops'] as $laptop): ?>
<article class="card card-product-list">
	<div class="row no-gutters">
		<aside class="col-md-3">
			<a href="#" class="img-wrap">
				<img src="<?php echo ITEMS . $laptop['imagen'] ?>">
			</a>
		</aside> 
		<div class="col-md-6">
			<div class="info-main">
				<a href="views/view_detalle.php?id=<?php echo $laptop['id_laptop'] ?>" class="h5 title">
					<?php echo $laptop['nombre'] ?>
				</a>
				 
				
				<p class="text-justify">
					<?php echo $laptop['descripcion'] ?>
				</p>
			</div> 
		</div> 

		<aside class="col-sm-3">
			<div class="info-aside">
				<div class="price-wrap">
					<span class="price h5">
						<?php echo format_price( $laptop['precio'] ) ?>
					</span>	
					<small class="text-muted float-right" style="text-decoration: line-through;">
						<?php echo format_price($laptop['precio'] + 200) ?>
					</small>
				</div>
				<p class="text-success">Envío gratis</p>
				<br>
				<p>
					<a href="" class="btn btn-warning btn-block btn_add_vertodo" data-id="<?php echo $laptop['id_laptop'] ?>" data-marca="<?php echo $laptop['marca_id'] ?>"><i class="fa fa-shopping-cart"></i> 
						<span class="text">Agregar al carro</span>
					</a>
				</p>
			</div>
		</aside>
	</div> 
</article> 
<?php endforeach; ?>


<!-- Paginacion  -->
<nav aria-label="Page navigation sample">
  <ul class="pagination">
    <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item disabled"><a class="page-link" href="#">Siguiente</a></li>
  </ul>
</nav>

</main> 

</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<?php include '../includes/inc_footer.php'; ?>