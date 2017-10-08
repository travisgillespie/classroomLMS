<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("log.php"); ?>
<?php 
	// v1: simple logout
	// session_start();
	//LOGOUT m6

	//	$_SESSION["student_id_m6"] = null;
	//	$_SESSION["student_id_m8"] = null;
	//	$_SESSION["username"] = null;
		
	//	redirect_to("index.php?menuBar=1");
	

	//LOGOUT m8

?>
<?php 
	// v2: destroy session
	// assumes nothing else in session to keep
	// session_start();
	 $_SESSION = array();
	 if (isset($_COOKIE[session_name()])) {
	   setcookie(session_name(), '', time()-604800, '/');
	 }
	 session_destroy(); 
	 redirect_to("index.php?menuBar=1");
?>