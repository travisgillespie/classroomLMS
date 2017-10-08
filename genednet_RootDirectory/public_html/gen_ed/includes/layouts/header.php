<?php find_selected_page(true); ?>	<!-- this function finds the displays subpages in the navigation bar-->
<!DOCTYPE html>
<!-- structure.html by Travis Gillespie -->
<html lang='en'>
	<head>
		<meta charset="UTF-8" /> 
		<title>GenEdNet <?php if($layout_context == "student") {echo "Student"; } ?></title>
		<link href="../public/stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />	
	</head>
	<body>
	<header> 
		<div id="header">
			<div id="headerTitle">		
				<h1>Mr. G's
				 <?php if($layout_context == "student") {echo "Student"; } else {echo "Class";} ?>
				 </h1>
			</div>
			<div id="loginForm">
					<?php require_once("../public/login.php"); ?>			
			</div>
		<nav id="mainNav">
		<div id="navigation">
<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/functions.php") ; ?>				
<?php 
//This FUNCTION CONFIRMS THE LOGIN STATUS AND SETS THE CORRECT MENUBAR
confirm_login_and_set_menubar($current_menuBar, $current_page);
?>
			</div>
		</nav>
		</div>
	</header>
<?php include("../public/topBlock.php"); ?>