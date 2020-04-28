$(document).ready(function() {
	//////////////////////// Prevent closing from click inside dropdown
    $(document).on('click', '.dropdown-menu', function (e) {
      e.stopPropagation();
    });


	//////////////////////// Bootstrap tooltip
	if($('[data-toggle="tooltip"]').length>0) {  // check if element exists
		$('[data-toggle="tooltip"]').tooltip()
	} // end if


	function load_cart() {
		var action  =  'LOADCART';

		var wrapper = $('#wrapper_cart');

		$.ajax({
			url     : 'ajax.php',
			method  : 'POST',
			data    : { action : action },
			success : function(rcart) {
				if(rcart.status) {
					wrapper.html(rcart.data_cart);
					$('.notify_cart').html(rcart.cant_products);
				}
			},

			dataType: 'json'
		});

		return false;
	}

	load_cart();


	// Agregar producto al carro de detalle
	$('.btn_add_cart').on('click', function(e) {
		e.preventDefault();

		var id          = $(this).data('id'),
			precio      = $(this).data('precio'),
			action      = 'ADD_PRODUCT_DETALLE',
			inputCant   = parseInt($('.input_cantidad').val());
			precioTotal = (inputCant * precio);

			$.ajax({
				url      : 'ajax.php',
				method   : 'POST',
				data     : {id, inputCant, action, precioTotal},
				success  : function(radd_detalle) {
					if(radd_detalle.status) {
						alertify.notify('Agregado al carro', 'success', 2);
						load_cart();
					}
				},

				dataType : 'json'
			});

			return false;
	});



	// Agregar producto al carro de ver todo 
	$('.btn_add_vertodo').on('click', function(e) {
		e.preventDefault();

		var id       = $(this).data('id'),
			cantidad = 1,
			action   = 'ADD_PRODUCT_DETALLEVERTODO';

			$.ajax({
				url      : 'ajax.php',
				method   : 'POST',
				data     : {id, cantidad, action},
				success  : function(radd_detalle) {
					if(radd_detalle.status) {
						alertify.notify('Agregado al carro', 'success', 2);
						load_cart();
					}
				},

				dataType : 'json'
			});

			return false;	
	});




	// Eliminar producto del carro
	$('body').on('click', '.btn_delete_product', function(e) {
		e.preventDefault();

		var id       = $(this).data('id'),
			action   = 'DELETE_PRODUCT';

			$.ajax({
				url      : 'ajax.php',
				method   : 'POST',
				data     : {id, action},
				success  : function(rdeleted) {
					if(rdeleted.status) {
						alertify.notify('Producto eliminado', 'error', 2);
						load_cart();
					}
				},

				dataType : 'json'
			});

			return false;	
	});


	// destroy cart
	$('body').on('click', '.btn_destroy_cart', function(e){
		e.preventDefault();
		var action   = 'DESTROY_CART';

		alertify.confirm('Vaciar carro', '¿Está seguro que quiere vaciar el carro?', 
			function(){
				$.ajax({
					url      : 'ajax.php',
					method   : 'POST',
					data     : {action : action},
					success  : function(rdestroy) {
						if(rdestroy.status) {
							load_cart();
							alertify.confirm().close(); 
						}
					},

					dataType : 'json'
				});

				return false;
			}, 
			function(){ return; });

		

	
	});

	// Me quedé en eliminar todo


	// Faltaria el buscador, agregar de lista, volver a lista ,admin

	// Login
	$('.btn_login').on('click', function(e) {
		e.preventDefault();
		$('#modalLogin').modal('show');
	});

	$('body').on('click', '.btn_loguear', function(e) {
		e.preventDefault();

		var  usuario     = $('input[name="usuario"]'),
			 usuario_val = $('input[name="usuario"]').val(),
		        clave = $('input[name="clave"]'),
		    clave_val    = $('input[name="clave"]').val(),
		        valid    = 0,
		        action   = 'LOGUEAR';

		  if(usuario.val() == '') {
		  	usuario.addClass('is-invalid');
		  } else {
		  	usuario.removeClass('is-invalid');
		  	valid++;
		  }

		  if(clave.val() == '') {
		  	clave.addClass('is-invalid');
		  } else {
		  	clave.removeClass('is-invalid');
		  	valid++;
		  }

		  if(valid == 2) {
		  		
		  		$.ajax({
		  			url      : 'ajax.php',
		  			method   : 'POST',
		  			data     : { usuario_val, clave_val, action },
		  			cache    : false,
		  			success  : function(rlogin) {
		  				if(rlogin.status) {
		  					$('#waitModal').waitMe({
		  						effect  : 'timer',
		  						waitTime: 1550,
		  						onClose : function() {
		  							window.location.href = 'admin/index.php';
		  						}
		  					});
		  				} else {
		  					$('#waitModal').waitMe({
		  						effect  : 'timer',
		  						waitTime: 800,
		  						onClose : function() {
		  					 		alertify.alert('Datos incorrectos', 'El registro no se encuentra en nuestra base de datos');
		  						}
		  					});
		  				}
		  			},

		  			dataType : 'json'
		  		});

		  		return false;
		  }

		  return false;
	});


	$('.btn_logout').on('click', function(e) {
		e.preventDefault();
		var action = 'CLOSEUSER';

		$.ajax({
			url      : 'ajax.php',
			method   : 'POST',
			data     : {action : action},
			success  : function(rcloseuser) {
				if(rcloseuser.status) {
					window.location.href = 'index.php';
				}
			},

			dataType : 'json'
		});

		return false;

	});


	$('body').on('click', '.btn_payment', function(e){
		e.preventDefault();

		var action         = 'PAYMENT',
			nombres        = $('input[name="nombres"]'),
			nombres_val    = $('input[name="nombres"]').val(),
			email          = $('input[name="email"]'),
			email_val      = $('input[name="email"]').val(),
			direccion      = $('textarea[name="direccion"]'),
			direccion_val  = $('textarea[name="direccion"]').val(),
			errors         = 0;


			if(nombres.val() == '') {
				nombres.addClass('is-invalid');
			} else {
				nombres.removeClass('is-invalid');
				errors++;
			}

			if(email.val() == '') {
				email.addClass('is-invalid');
			} else {
				email.removeClass('is-invalid');
				errors++;
			}


			if(direccion.val() == '') {
				direccion.addClass('is-invalid');
			} else {
				direccion.removeClass('is-invalid');
				errors++;
			}

			if(errors == 3) {
				$.ajax({
					url      : 'ajax.php',
					method   : 'POST',
					data     : { action, nombres_val, email_val, direccion_val },
					success  : function(rpayment){
						if(rpayment.status) {
							$('#wrapper_cart').waitMe({
								effect   : 'ios',
								waitTime : 3400,
								onClose  : function() {
									$('#modal_pay').html(rpayment.modal_detalle);
									$('#modal_payment').modal('show');
								}
							});
						}
					},
					dataType : 'json'  
				});

				return false;
			}

			return false;

	});


	$('body').on('click', '.close_detalle', function(e) {
		e.preventDefault();


		$('#modal_payment').modal('hide');

		var action   = 'CLOSEPAYMENT';
		$.ajax({
			url      : 'ajax.php',
			method   : 'POST',
			data     : {action : action},
			success  : function(rdestroy) {
				if(rdestroy.status) {
					$('#modal_payment').modal('hide');
					load_cart();
				}
			},

			dataType : 'json'
		});

		return false;
	});




}); 

