<?php
	//this is from php essential training
	define("DB_SERVER", "localhost");
	define("DB_USER", "tgilles3_hgtest");
	define("DB_PASS", ";PJQ+u%0a7z@");
	define("DB_NAME", "tgilles3_gen_ed");
	
	// 1. Create a database connection
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	// Test if connection succeeded
	if(mysqli_connect_errno()) {
	die("Database connection failed: " . 
	     mysqli_connect_error() . 
	     " (" . mysqli_connect_errno() . ")"
	);
	}
?>
