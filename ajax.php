<?php 
	
	include 'app/config.php';
	$action = $_POST['action'];

	$cart      = get_cart();
	$html_cart = '';
	switch ($action) {

		case 'LOADCART':
			if(!empty($cart['productos'])) {
				$html_cart .= '<div class="row"><main class="col-md-9"><div class="card">
			<table class="table table-borderless table-shopping-cart">
			<thead class="text-muted">
			<tr class="small text-uppercase">
			  <th scope="col">Producto</th>
			  <th class="text-center" scope="col" width="260">Cantidad</th>
			  <th scope="col" width="120">Precio</th>
			  <th scope="col" class="text-right" width="100"> </th>
			</tr>
			</thead>
			<tbody>';
			foreach($cart['productos'] as $product):
				$html_cart .='<tr>
					<td>
						<figure class="itemside">
							<div class="aside"><img src="'.ITEMS.$product['imagen'].'" class="img-sm"></div>
							<figcaption class="info">
								<span class="title text-dark mt-4">'. $product['nombre'] .'</span>
							</figcaption>
						</figure>
					</td>

					<td class="text-center">
						<span class="align-middle">'. $product['cantidad'] .'</span>
					</td>
					
					<td> 
						<div class="price-wrap"> 
							<var class="price">'. format_price($product['precio']) .'</var> 
							<small class="text-muted" style="text-decoration: line-through;">'. format_price($product['precio'] + 200) .'</small> 
						</div>
					</td>
					<td class="text-center"> 
					<a href="" class="btn btn-danger btn-sm btn_delete_product" data-id="'. $product['id_laptop'] .'"> Eliminar</a>
					</td>
				</tr>';
			endforeach;
			$html_cart .= '</tbody>
			</table>
			<div class="card-body border-top">
				<a href="index.php" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Seguir comprando </a>
				<a href="" class="btn btn-danger float-right btn_destroy_cart">  Vaciar carro </a>
			</div>	
			</div> 

			</main>'; 
			} 
			else {
				$html_cart .= '<div class="row">
				<main class="col-md-9 mt-4">
					<div class="text-center">
						<img class="img-fluid" src="'. IMAGES .'cart_empty.png" width="200px">
						<p class="text-muted">No hay productos en el carrito</p>
					</div>

					<div class="card-body border-top">
						<a href="index.php" class="btn btn-light">
							<i class="fa fa-chevron-left"></i> Regresar
						</a>
					</div> 
				</main>';
			}

			$html_cart .= '<aside class="col-md-3">
					<div class="card">
						<div class="card-body">
								<dl class="dlist-align">
								  <dt>Precio total:</dt>
								  <dd class="text-right">'. format_price($cart['cart_totals']['subtotal']) .'</dd>
								</dl>
								<dl class="dlist-align">
								  <dt>Cantidad total:</dt>';
								  if(empty($cart['productos'])) {
								  	$html_cart .= '<dd class="text-right">'. 0 .'</dd>';
								  } else {
								  	  $cantidad =  0;
									  foreach($cart['productos'] as $product):
									  	$cantidad = $cantidad + $product['cantidad'];
									  endforeach;
									  $html_cart .= '<dd class="text-right">'. $cantidad .'</dd>';
								  }
								$html_cart .= '</dl>
								<dl class="dlist-align">
								  <dt>Envío:</dt>
								  <dd class="text-right">'. format_price(0) .'</dd>
								</dl>
								<hr>
								<dl class="dlist-align">
								  <dt>Total:</dt>
								  <dd class="text-right  h5"><strong>
								  '. format_price($cart['cart_totals']['total']) .'
								  </strong></dd>
								</dl>
								
								
								<div class="card mx-auto" style="max-width:520px; margin-top:20px;">
									<article class="card-body mb-0">
										<header class="mb-1"><h6 class="card-title">Completa:</h6></header>
										<form id="form_payment">
											<div class="form-group">
												<label class="col-form-label col-form-label-sm">Nombres: </label>
												<input type="text" class="form-control form-control-sm" placeholder="" name="nombres">
												<div class="invalid-feedback">
										         	Debe completar sus nombres para poder continuar
										        </div>
											</div>

											<div class="form-group">
												<label class="col-form-label col-form-label-sm">E-mail: </label>
												<input type="text" class="form-control form-control-sm" placeholder="" name="email">
												<div class="invalid-feedback">
										         	Complete el campo por favor
										        </div>
											</div>

											<div class="form-group">
												<label class="col-form-label col-form-label-sm">Dirección y/o Referencia: </label>
												<textarea name="direccion" id="direccion" class="form-control form-control-sm" cols="7" rows="4"></textarea>
												<div class="invalid-feedback">
										       		Debe completar la información requerida
										        </div>
											</div>
											
											<div class="form-group">';
											if(empty($cart['productos'])) {
												$html_cart .= '<button class="btn btn-primary float-right" disabled>Procesar pedido <i class="fa fa-chevron-right"></i></button>';
											} else {
												$html_cart .= '<button class="btn btn-primary float-right btn_payment">Procesar pedido <i class="fa fa-chevron-right"></i></button>';
											}
											$html_cart .= '</div>
										</form>
									</article>
								</div> 
								
						</div> 
					</div> 
				</aside>';

			$cant_products = count_products();
			echo json_encode(['status' => true, 'data_cart' => $html_cart , 'cant_products' => $cant_products]);
			break;



		
			// Agregar producto
			case 'ADD_PRODUCT_DETALLE':
				if(!add_product($_POST['id'] , $_POST['inputCant'])) {
					echo json_encode(['status' => false]);
					return;
				}

				$precioTotal = format_price($_POST['precioTotal']);
				echo json_encode(['status' => true, 'precioTotal' => $precioTotal]);
				break;

			// Agregar producto ver todo
			case 'ADD_PRODUCT_DETALLEVERTODO':
				if(!add_product($_POST['id'] , $_POST['cantidad'])) {
					echo json_encode(['status' => false]);
					return;
				}


				
				echo json_encode(['status' => true]);
				break;






			// Eliminar producto
			case 'DELETE_PRODUCT':
				if(!detele_product($_POST['id'])) {
					echo json_encode(['status' => false]);
					return;
				}

				echo json_encode(['status' => true]);
				break;



			// Vaciar carro
			case 'DESTROY_CART':
				if(!vaciar_carrito()) {
					echo json_encode(['status' => false]);
					return;
				}

				echo json_encode(['status' => true]);
				break;




			// Sesion user
			case 'LOGUEAR':
				if(!loguear($_POST['usuario_val'], $_POST['clave_val'])) {
					echo json_encode(['status' => false]);
					return;
				}

				echo json_encode(['status' => true]);
				break;	




			// Cerrar sesion user
			case 'CLOSEUSER':
				if(!destroy_session_user()) {
					echo json_encode(['status' => false]);
					return;
				}

				echo json_encode(['status' => true]);
				break;




			// Procesar pedido
			case 'PAYMENT':
				$cliente['nombres']   = $_POST['nombres_val'];
				$cliente['email']     = $_POST['email_val'];
				$cliente['direccion'] = $_POST['direccion_val'];

				$_SESSION['cart']['cliente'] = $cliente;

				$cart_detalle = get_cart();
				$html_detalle = '
					<div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h6 class="modal-title" id="exampleModalLabel">Resumen de pedido</h6>
					        <button class="close close_detalle">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <div class="text-center">
					        	<img src="'. IMAGES .'compra_hecha.jpg" alt="" class="img-fluid" width="170" height="170">
					        	<small class="d-block">Hola '. $cart_detalle['cliente']['nombres'] .', estamos procesando tu pedido, te enviaremos información a tu correo electrónico, ¡Gracias!</small>
					        </div>

					        <div class="table-responsive mt-2">
					        	<table class="table table-sm table-striped">
					        		<thead>
					        			<tr>
					        				<th class="text-left">Producto</th>
					        				<th class="text-center">Cantidad</th>
					        				<th class="text-right">Subtotal</th>
					        			</tr>
					        		</thead>

					        		<tbody>';
					        			foreach($cart_detalle['productos'] as $product):
					        			$html_detalle .= '
					        			<tr>
					        				<td class="text-left">'. $product['nombre'] .'</td>
					        				<td class="text-center">'. $product['cantidad'] .'</td>
					        				<td class="text-right">'. format_price( floatval( $product['precio'] * $product['cantidad'] ) ) .'</td>
					        			</tr>';
					        			endforeach;

					        			$html_detalle .= '<tr>
					        				<td colspan="2">Envío</td>
					        				<td class="text-right" colspan="2">'. format_price(0) .'</td>
					        			</tr>
									
					        			<tr>
					        				<td colspan="1">Total</td>
					        				<td class="text-right" colspan="3">'. format_price($cart_detalle['cart_totals']['total']) .'</td>
					        			</tr>
					        		</tbody>
					        	</table>
					        </div>
					      </div>
					    </div>
					  </div>
					</div>';

				// Cuando se procese el pago también se envia a la base de datos
				$productos_cliente = '';
				$subtotal          = 0;
				$cantidad          = 0;

				foreach($cart_detalle['productos'] as $producto):
					$productos_cliente   .= $producto['nombre'] . ',';
					$_subtotal            = floatval($producto['precio'] * floatval($producto['cantidad']));
					$_cantidad            = $cantidad + $producto['cantidad'];
				endforeach;


				$nombre_cliente          = $cart_detalle['cliente']['nombres'];
				$email_cliente           = $cart_detalle['cliente']['email'];
				$direccion_cliente       = $cart_detalle['cliente']['direccion'];

				$lista_productos_cliente = $productos_cliente;
				$cantidad                = $cantidad + $_cantidad;
				$subtotal                = $subtotal + $_subtotal;

				// Agregamos a la base de datos
				add_pedidos($nombre_cliente, $email_cliente, $direccion_cliente);
				add_detalle($lista_productos_cliente, $cantidad, $subtotal);


				// Acá va detalle al correo
				$html_email = '	<div class="text-center">
						<img src="'. IMAGES .'compra_hecha.jpg" alt="" width="180px" height="180px">
						<small class="d-block">Resumen de pedido</small>
					</div>
					<div class="container">
						<span class="d-block">Nombre de cliente: '. $cart_detalle['cliente']['nombres'] .'</span>
						<span class="d-block">E-mail: '. $cart_detalle['cliente']['email'] .'</span>
						<span class="d-block">Dirección: '. $cart_detalle['cliente']['direccion'] .'</span>

						<div class="row">
							<div class="col-5">
								<table class="table table-sm table-striped">
									<thead>
										<tr>
											<th>Producto</th>
											<th class="text-center">Cantidad</th>
											<th class="">Subtotal</th>
										</tr>
									</thead>

									<tbody>';
									
									foreach($cart_detalle['productos'] as $producto):
										$html_email .= '
										<tr>
											<td>'. $producto['nombre'] .'</td>
											<td class="text-center">'. $producto['cantidad'] .'</td>
											<td  class="">'. format_price( floatval($producto['cantidad']  * $producto['precio'] ) ) .'</td>
										</tr>';
									endforeach;

									$html_email .= '<tr>
											<td colspan="2">Totallll</td>
											<td colspan="1"  class="">939393</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>';

				// Send mail
				send_email('latzaqore@localhost.com', $asunto = 'Detalle pedido' , $html_email);

				echo json_encode(['status' => true, 'modal_detalle' => $html_detalle]);
				break;



		case 'CLOSEPAYMENT':
			if(!vaciar_carrito()) {
				echo json_encode(['status' => false]);
				return;
			}

			echo json_encode(['status' => true]);
			break;




		default:
			# code...
			break;
	}