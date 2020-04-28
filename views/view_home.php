<!-- ========================= SECTION INTRO ========================= -->
<section class="section-intro padding-y-sm">
<div class="container">

<div class="intro-banner-wrap">
	<img src="assets/images/banners/banner3.png" class="img-fluid rounded">
</div>

</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->




<!-- ========================= SECTION FEATURE ========================= -->
<section class="section-content padding-y-sm">
<div class="container">
<article class="card card-body">

<div class="row">
	<div class="col-md-6 text-center">	
		<figure class="item-feature">
			<span class="text-primary"><i class="fa fa-2x fa-truck"></i></span>
			<figcaption class="pt-3">
				<h5 class="title">Entrega rápida</h5>
				<p class="text-justify">Dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore </p>
			</figcaption>
		</figure>
	</div>

    <div class="col-md-6 text-center">
		<figure class="item-feature">
			<span class="text-primary"><i class="fa fa-2x fa-lock"></i></span>
			<figcaption class="pt-3">
				<h5 class="title">Alta seguridad</h5>
				<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				 </p>
			</figcaption>
		</figure> 
	</div> 
</div>
</article>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION FEATURE END// ========================= -->


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
<div class="container">

<header class="section-heading">
	<a href="views/ver_todo.php?marca_id=3" class="btn btn-outline-info btn-sm float-right">Ver todo</a>
	<h3 class="section-title">Lenovo</h3>
</header>

	
<div class="row">
<?php foreach($lenovos as $lenovo): ?>
	<div class="col-md-3">
		<div href="#" class="card card-product-grid">
			<span class="img-wrap">
				<img class="zoom" src="assets/images/items/<?php echo $lenovo['imagen'] ?>">
			</span>
			<figcaption class="info-wrap">
				<a href="views/view_detalle.php?id=<?php echo $lenovo['id_laptop'] ?>" class="title text-truncate">
					<?php echo $lenovo['nombre'] ?>
				</a>
				<div class="price mt-1"> 
					<?php echo format_price($lenovo['precio']) ?>
					<small class="text-muted float-right" style="text-decoration: line-through;">
						<?php echo format_price($lenovo['precio'] + 200) ?>
					</small> 
				</div>
			</figcaption>
		</div>
	</div>
<?php endforeach; ?>
</div>

</div> 
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->






<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
<div class="container">

<header class="section-heading">
	<a href="views/ver_todo.php?marca_id=2" class="btn btn-outline-info btn-sm float-right">Ver todo</a>
	<h3 class="section-title">Hp</h3>
</header>

<div class="row">

<?php foreach($hps as $hp): ?>
	<div class="col-md-3">
		<div href="#" class="card card-product-grid">
			<span class="img-wrap">
				<img class="zoom" src="assets/images/items/<?php echo $hp['imagen'] ?>">
			</span>
			<figcaption class="info-wrap">
				<a href="views/view_detalle.php?id=<?php echo $hp['id_laptop'] ?>" class="title text-truncate">
					<?php echo $hp['nombre'] ?>
				</a>
				<div class="price mt-1"> 
					<?php echo format_price($hp['precio']) ?>
					<small class="text-muted float-right" style="text-decoration: line-through;">
						<?php echo format_price($hp['precio'] + 200) ?>
					</small> 
				</div>
			</figcaption>
		</div>
	</div>
<?php endforeach; ?>
</div>

</div> 
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-bottom-sm">
<div class="container">

<header class="section-heading">
	<a href="views/ver_todo.php?marca_id=4" class="btn btn-outline-info btn-sm float-right">Ver todo</a>
	<h3 class="section-title">Asus</h3>
</header>

<div class="row">
<?php foreach($asuss as $asus): ?>
	<div class="col-md-3">
		<div href="#" class="card card-product-grid">
			<span class="img-wrap">
				<img class="zoom" src="assets/images/items/<?php echo $asus['imagen'] ?>">
			</span>
			<figcaption class="info-wrap">
				<a href="views/view_detalle.php?id=<?php echo $asus['id_laptop'] ?>" class="title text-truncate">
					<?php echo $asus['nombre'] ?>
				</a>
				<div class="price mt-1"> 
					<?php echo format_price($asus['precio']) ?>
					<small class="text-muted float-right" style="text-decoration: line-through;">
						<?php echo format_price($asus['precio'] + 200) ?>
					</small> 
				</div>
			</figcaption>
		</div>
	</div>
<?php endforeach; ?>


</div>

</div>
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
<div class="container">

<header class="section-heading">
	<a href="views/ver_todo.php?marca_id=1" class="btn btn-outline-info btn-sm float-right">Ver todo</a>
	<h3 class="section-title">Acer</h3>
</header>

<div class="row">
	<?php foreach($acers as $acer): ?>
		<div class="col-md-3">
			<div href="#" class="card card-product-grid">
				<span class="img-wrap">
					<img class="zoom" src="assets/images/items/<?php echo $acer['imagen'] ?>">
				</span>
				<figcaption class="info-wrap">
					<a href="views/view_detalle.php?id=<?php echo $acer['id_laptop'] ?>" class="title text-truncate">
						<?php echo $acer['nombre'] ?>
					</a>
					<div class="price mt-1"> 
						<?php echo format_price($acer['precio']) ?>
						<small class="text-muted float-right" style="text-decoration: line-through;">
							<?php echo format_price($acer['precio'] + 200) ?>
						</small> 
					</div>
				</figcaption>
			</div>
		</div>
	<?php endforeach; ?>
</div>

</div> 
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->