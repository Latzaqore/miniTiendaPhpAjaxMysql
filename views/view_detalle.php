<?php 

	include '../app/config.php';

	if(isset($_SESSION['usuario'])) {
		header('Location: ../admin/index.php');
	}

	include '../includes/inc_header.php'; 

	$id_laptop = $_GET['id'];
	$laptop    = get_laptop_by_id($id_laptop);

?>
<div id="wrapper_detalle" class="container mt-4">
	<h1 class="title-page mt-2">Detalle producto</h1>
	<div class="row">
		<div class="col-5">
			<img class="img-fluid" src="<?php echo LARGE . $laptop['imagen'] ?>" alt="" width="400px" height="400">
		</div>
		
		<div class="col-5">
			<h4>
				<?php echo $laptop['nombre'] ?>
			</h4>
			<div class="text-justify">
				<?php echo $laptop['descripcion'] ?>
			</div>

			<div class="mt-2">
				<h5 class="text-info">
					Precio: <span class="price_new">
						<?php echo format_price($laptop['precio']) ?>
					</span>
					<small class="text-muted float-right" style="text-decoration: line-through;">
						<?php echo format_price($laptop['precio'] + 200) ?>
					</small>
				</h5>
			</div>

			
			<div class="mt-3">
				<input type="number" min="1" max="5" data-precio="<?php echo $laptop['precio'] ?>" class="form-control text-center d-inline input_cantidad" value="1" style="width: 80px;" data-url="">
				<button 
				data-url="" 
				data-id="<?php echo $laptop['id_laptop'] ?>"
				data-cantidad="1"
				data-nombre=""
				data-precio="<?php echo $laptop['precio'] ?>"
				class="btn btn-warning btn_add_cart" 
				><i class="fa fa-shopping-cart" ></i> 
					<span class="text">Agregar al carro</span>
				</button>
			</div>
			
		</div>
	</div>
</div>

<?php include '../includes/inc_footer.php'; ?>