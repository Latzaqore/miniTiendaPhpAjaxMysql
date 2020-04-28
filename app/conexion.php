<?php 	
	
	$user     = 'root';
	$password = '';

	try {
	    $pdo = new PDO('mysql:host=localhost;dbname=latzhop', $user, $password);
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   	return $pdo;
	}

	catch (PDOException $e) {
	    print "¡Error!: " . $e->getMessage() . "<br/>";
	    die();
	}