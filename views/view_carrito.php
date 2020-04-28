
<?php 
	
	include '../app/config.php';

	if(isset($_SESSION['usuario'])) {
		header('Location: ../admin/index.php');
	}
	
	include '../includes/inc_header.php'; 

	
?>

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
<div class="container">
	<h2 class="title-page">Carrito de compras</h2>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
<div class="container">

<div id="wrapper_cart">

<!-- <div class="row">

<main class="col-md-9">
<div class="card">
<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Producto</th>
  <th scope="col" width="120">Cantidad</th>
  <th scope="col" width="120">Precio</th>
  <th scope="col" class="text-right" width="100"> </th>
</tr>
</thead>
<tbody>
<tr>
	<td>
		<figure class="itemside">
			<div class="aside"><img src="<?php echo ITEMS ?>Laptop_Acer_Aspire_3_A315-41-R05S.png" class="img-sm"></div>
			<figcaption class="info">
				<span class="title text-dark mt-4">Nombre producto</span>
			</figcaption>
		</figure>
	</td>
	<td> 
		<select class="form-control">
			<option>1</option>
			<option>2</option>	
			<option>3</option>	
			<option>4</option>
			<option>5</option>	
		</select> 
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">$1156.00</var> 
			<small class="text-muted"> $315.20  </small> 
		</div>
	</td>
	<td class="text-center"> 
	<a href="" class="btn btn-danger btn-sm"> Eliminar</a>
	</td>
</tr>

<tr>
	<td>
		<figure class="itemside">
			<div class="aside"><img src="<?php echo ITEMS ?>Laptop_Acer_Nitro_AN515-52.png" class="img-sm"></div>
			<figcaption class="info">
				<span class="title text-dark mt-4">Nombre producto</span>
			</figcaption>
		</figure>
	</td>
	<td> 
		<select class="form-control">
			<option>1</option>
			<option>2</option>	
			<option>3</option>	
			<option>4</option>
			<option>5</option>	
		</select> 
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">$149.97</var> 
			<small class="text-muted"> $75.00  </small>  
		</div> 
	</td>
	<td class="text-center"> 
	<a href="" class="btn btn-danger btn-sm"> Eliminar</a>
	</td>
</tr>
</tbody>
</table>

<div class="card-body border-top">
	<a href="index.php" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Seguir comprando </a>
</div>	
</div> 

</main>

	<aside class="col-md-3">
		<div class="card">
			<div class="card-body">
					<dl class="dlist-align">
					  <dt>Precio total:</dt>
					  <dd class="text-right">USD 568</dd>
					</dl>
					<dl class="dlist-align">
					  <dt>Descuento:</dt>
					  <dd class="text-right">USD 658</dd>
					</dl>
					<dl class="dlist-align">
					  <dt>Total:</dt>
					  <dd class="text-right  h5"><strong>$1,650</strong></dd>
					</dl>
					<hr>
					
					<div class="card mx-auto" style="max-width:520px; margin-top:5px;">
						<article class="card-body mb-0">
							<header class="mb-1"><h6 class="card-title">Completa:</h6></header>
							<form>
								<div class="form-group">
									<label class="col-form-label col-form-label-sm">Nombres: </label>
									<input type="text" class="form-control form-control-sm" placeholder="">
								</div>

								<div class="form-group">
									<label class="col-form-label col-form-label-sm">Dirección y/o Referencia: </label>
									<textarea name="direccion" id="direccion" class="form-control form-control-sm" cols="7" rows="4"></textarea>
								</div>
								
								<div class="form-group">
									<button class="btn btn-primary float-right">Procesar compra <i class="fa fa-chevron-right"></i></button>
								</div>
							</form>
						</article>
					</div> 
					
			</div> 
		</div> 
	</aside>-->


</div>

</div>
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<?php  include '../includes/inc_footer.php'; ?>

</body>
</html>
