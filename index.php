<?php 
	
	include 'app/config.php';	



	if(isset($_SESSION['usuario'])) {
		header('Location: admin/index.php');
	}


		// Laptops limites
		$lenovos = get_limit_laptop (3);
		$hps     = get_limit_laptop (2);
		$asuss   = get_limit_laptop (4); 
		$acers   = get_limit_laptop (1);


	include 'includes/inc_header.php'; 
	
	include 'views/view_home.php';


	include 'includes/inc_footer.php'; 
?>


