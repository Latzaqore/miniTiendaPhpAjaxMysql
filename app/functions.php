<?php 
	

	function get_all_products($marca_id) {
		include 'conexion.php';
		$sql      = "SELECT * FROM laptop WHERE marca_id='$marca_id'";
		$prep_sql = $pdo->prepare($sql);
		$prep_sql->execute();

		$all_products = $prep_sql->fetchAll(PDO::FETCH_ASSOC);

		if(empty($all_products)) {
			include VIEWS    . '../error_404.php';
			die;
		}

		switch ($marca_id) {
			case '1':
				$marca = 'Acer';
				break;
			
			case '2':
				$marca = 'Hp';
				break;

			case '3':
				$marca = 'Lenovo';
				break;

			case '4':
				$marca = 'Asus';
				break;

			default:
				break;
		}

		$data['marca']   = $marca;
		$data['laptops'] = $all_products;

		return $data;
	}


	function get_all_products_total() {
		include 'conexion.php';
		$sql      = "SELECT * FROM laptop";
		$prep_sql = $pdo->prepare($sql);
		$prep_sql->execute();

		$all_products = $prep_sql->fetchAll(PDO::FETCH_ASSOC);

		if(empty($all_products)) {
			include VIEWS    . '../error_404.php';
			die;
		}

		return $all_products;
	}

	// Funcion id get_url
	function get_laptop_by_id($id_laptop){ 
		$products = get_all_products_total();

		foreach($products as $index => $product) {
			if($product['id_laptop'] == $id_laptop) {
				return $products[$index];
			} 
		}

		include VIEWS    . '../error_404.php';
		die;

	}

	// Function id 
	function get_laptop_by_id_product($id_laptop){ 
		$products = get_all_products_total();

		foreach($products as $index => $product) {
			if($product['id_laptop'] == $id_laptop) {
				return $products[$index];
			} 
		}

		return false;

	}




	// Obtener 4 registros para la vista del principio
	function get_limit_laptop ($marca_id) {
		include 'conexion.php';

		$sql      = "SELECT * FROM laptop  where marca_id='$marca_id' LIMIT 4";
		$prep_sql = $pdo->prepare($sql);
		$prep_sql->execute();

		$all_products = $prep_sql->fetchAll(PDO::FETCH_ASSOC);
		
		if(empty($all_products)) {
			include INCLUDES . 'inc_header.php';
			include VIEWS    . 'error_404.php';
			die;
		}

		return $all_products;
	}


	// Formatear los precios
	function format_price($number , $symbol='$ ') {
		if(!is_bool($number) && !is_numeric($number) ) {
			$number = 0;
		}

		return $symbol . number_format($number, 2, '.' , "' ");
	}


	function load_view_verTodo() {
		include VIEWS . 'ver_todo.php';
	}







	// Calcular la cantidad de productos en total

	function count_products() {

		$cantidad_total = 0; 

		foreach($_SESSION['cart']['productos'] as $indice => $producto) {
			$cantidad_producto = $producto['cantidad']; 
			$cantidad_total    = $cantidad_total + $cantidad_producto;
		}


		return $cantidad_total;
	}


	// Crear el carrito
	function get_cart() {
		if(isset($_SESSION['cart'])) {
			$_SESSION['cart']['cart_totals'] = calculate_totals();
			return $_SESSION['cart'];
		}

		$cart =
		[
			'productos'       => [],
			'cart_totals'     => calculate_totals()
		];

		$_SESSION['cart']     = $cart; 
		return $cart;

	}


	// Agregar un producto

	function add_product ($id_laptop , $cantidad = 1) {

		$un_producto    = get_laptop_by_id_product($id_laptop);

		$producto_nuevo = 
		[
			'id_laptop'   => NULL, 
			'nombre'      => NULL,
			'descripcion' => NULL,
			'precio'      => NULL,
			'cantidad'    => NULL,
			'marca_id'    => NULL,
			'imagen'      => NULL
		];

		if(!$un_producto) {
			return false; 
		}

		$producto_nuevo = 
		[
			'id_laptop'          => $un_producto['id_laptop'], 
			'nombre'             => $un_producto['nombre'],
			'descripcion'        => $un_producto['descripcion'],
			'precio'             => $un_producto['precio'],
			'cantidad'           => $cantidad,
			'marca_id'           => $un_producto['marca_id'],
			'imagen'             => $un_producto['imagen']
		];

		if(!isset($_SESSION['cart']) || empty($_SESSION['cart']['productos'])  ) {
			$_SESSION['cart']['productos'][] = $producto_nuevo;

			return true; 
		}

		// Si pasa aqui es porque ya hay productos, aunque sea 1 pero ya cuenta que si hay y loopeamos

		foreach ($_SESSION['cart']['productos'] as $indice => $producto) {
			if($producto['id_laptop'] == $id_laptop) {
				$producto['cantidad']                   = $producto['cantidad'] + $cantidad; 
				$_SESSION['cart']['productos'][$indice] = $producto; 

				return true; 
			}

		}

		$_SESSION['cart']['productos'][] = $producto_nuevo;
		return true;

	}


	// Eliminar un producto 

	function detele_product($id) {

		if(!isset($_SESSION['cart']) || empty($_SESSION['cart']['productos'])  ) {
			return false; 
		}

		foreach ($_SESSION['cart']['productos'] as $indice => $producto) {
			if($producto['id_laptop'] == $id) {
				unset($_SESSION['cart']['productos'][$indice]); 
				return true; 
			}
		}
	}


	// Vaciar el carrito

	function vaciar_carrito() {

		unset($_SESSION['cart']);
		return true;
	}



	function updated_input($id, $cantidad) {

		foreach ($_SESSION['cart']['productos'] as $indice => $producto) {
			
			if($producto['id_laptop'] == $id) {

				if($producto['cantidad'] !== $cantidad){
					$producto['cantidad'] = $cantidad; 
					$_SESSION['cart']['productos'][$indice] = $producto; 
					return true; 
				}
				
			}	
		}
	}


	// Los totales del carrito 

	function calculate_totals() {
		
		if(!isset($_SESSION['cart']) || empty($_SESSION['cart']['productos'])  ) {
			$cart_totals = 
			[
				'subtotal'        => 0,
				'total' 		  => 0
			];

			return $cart_totals;
		}


		$subtotal = 0; 
		$total    = 0;

		// Si en caso pasa la validacion se asimila que hay productos, aunque sea uno ya cuenta que hay y loopeamos

		foreach ($_SESSION['cart']['productos'] as $producto) {
				
			$_subtotal = $producto['precio'] * $producto['cantidad'];
			$subtotal  = floatval($subtotal + $_subtotal);
		}

		$total         = floatval($subtotal);

		$cart_totals = 
		[
			'subtotal'        => $subtotal,
			'total' 		  => $total
		];

		return $cart_totals;

	}


	function loguear($usuario,$clave) {
		include 'conexion.php';

		$sql_login      = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'";
		$prep_sql_login = $pdo->prepare($sql_login);
		$prep_sql_login->execute();

		$user  = $prep_sql_login->fetch(PDO::FETCH_ASSOC);
		if(!empty($user)) {

			$usuario =
			[
				'id_usuario'     => $user['id_usuario'],
				'nombre_usuario' => $user['usuario'],
				'email'          => $user['email']
			];
			$_SESSION['usuario'] = $usuario;
			return true;
		}

		return false;
	}




	// Agregar pedido
	function add_pedido() {
		$pedido = get_cart();

		return $pedido;
	}




	function destroy_session_user() {
		unset($_SESSION['usuario']);
		return true;
	}



	// Para agregar a pedidos
	function add_pedidos ($cliente, $email, $direccion) {
		include 'conexion.php';

		$sql_insert_ped     = "INSERT INTO pedidos (cliente, email, direccion) VALUES ('$cliente', '$email', '$direccion')";
		$prepare_insert_ped = $pdo->prepare($sql_insert_ped);
		$prepare_insert_ped->execute();
		return true;

	}



	// Para agregar a detalles
	function add_detalle ($productos, $cantidad, $precio_total) {
		include 'conexion.php';

		$sql_insert_det     = "INSERT INTO detalle (productos, cantidad, precio_total) VALUES ('$productos', '$cantidad', '$precio_total')";
		$prepare_insert_det = $pdo->prepare($sql_insert_det);
		$prepare_insert_det->execute();
		return true;

	}


	function get_products_ordenes_string() {
		include 'conexion.php';
		$sql_convert  = "SELECT productos FROM detalle";
		$prep_convert = $pdo->prepare($sql_convert);
		$prep_convert->execute();

		$datos        = $prep_convert->fetchAll(PDO::FETCH_ASSOC);

		return $datos;
	}




	function get_all_pedidos_total() {
		include 'conexion.php';
		$sql      = "SELECT * FROM pedidos";
		$prep_sql = $pdo->prepare($sql);
		$prep_sql->execute();

		$all_products = $prep_sql->fetchAll(PDO::FETCH_ASSOC);
		return $all_products;
	}


	function get_all_detalles_total() {
		include 'conexion.php';
		$sql      = "SELECT * FROM detalle";
		$prep_sql = $pdo->prepare($sql);
		$prep_sql->execute();

		$all_products = $prep_sql->fetchAll(PDO::FETCH_ASSOC);
		return $all_products;
	}







	function send_email ($to, $asunto = 'Nuevo mensaje' , $mensaje = 'NULL') {

		if($mensaje == NULL) {
			$mensaje = "
			<html>
			<head>
			<title>E-mail</title>
			</head>
			<body>
				<p>Texto...</p>


			</body>
			</html>
			";
			
		}


		$headers  = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: ' . 'noreplay@latzaqore.com' . '<latzaqore@gmail.com>' . "\r\n";

		mail($to, $asunto, $mensaje, $headers);
		return true;
	}