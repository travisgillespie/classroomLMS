<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
$username = "";

	//determines if another user is already logged in
	if ((isset($_POST['login']) && logged_in_student_m6()) || (isset($_POST['login']) && logged_in_student_m8() ) || (isset($_POST['login']) && logged_in_admin() )) {
	
		 $_SESSION["message"] = "Another user is logged in on this computer. You must select logout before you login.";
	 
	 } elseif ((isset($_POST['login'])) && (! logged_in_student_m6() || ! logged_in_student_m8() || ! logged_in_admin() )) { 
	 	  // Process the form
		  
		  // validations
		  $required_fields = array("username", "password");
		  validate_presences($required_fields);
		  
			  if (empty($errors)) {
			    // Attempt Login
			
					$username = $_POST["username"];
					$password = $_POST["password"];
					
					$found_student_m6 = attempt_login_student_m6($username, $password);
					$found_student_m8 = attempt_login_student_m8($username, $password);
					$found_admin = attempt_login_admin($username, $password);
			    
				     if ($found_student_m6) {
				      // Success
							// Mark user as logged in
							$_SESSION["student_id_m6"] = $found_student_m6["id"];
							$_SESSION["username"] = $found_student_m6["username"];
							// THIS REDIRECT REQUIRES RELOAD redirect_to("index.php?menuBar=1");
				      
				    } elseif ($found_student_m8) {
				      // Success
							// Mark user as logged in
							$_SESSION["student_id_m8"] = $found_student_m8["id"];
							$_SESSION["username"] = $found_student_m8["username"];
							// THIS REDIRECT REQUIRES RELOAD redirect_to("index.php?menuBar=1");
					
					} elseif ($found_admin) {
				      // Success
							// Mark user as logged in
							$_SESSION["admin_id"] = $found_admin["id"];
							$_SESSION["username"] = $found_admin["username"];
							// THIS REDIRECT REQUIRES RELOAD redirect_to("index.php?menuBar=1");
				      
				    } else {
				      // Failure
				      $_SESSION["message"] = "Username/password not found.";
				      
				    }
			  
		  }
	 
	} else {
	  // This is probably a GET request
	  
	} // end: if (isset($_POST['submit']))

?>

<?php require_once("log.php"); ?>

<div id="loginForm">   
    <form action="../public/index.php?menuBar=1" method="post">
      <p>Username:
        <input type="text" style="border-radius: 20px;" name="username" value="<?php echo htmlentities($username); ?>" />
      Password:
        <input type="password" style="border-radius: 20px;" name="password" value="" />
       </p>
           <h2>
    <?php
    	// displays logged in user's first / last name
    	if (isset($_POST['createAccount'])) {
    		echo "Create Account";
    	} elseif (logged_in_student_m6() || logged_in_student_m8()) {    	
	    	$loggedInUser_name = $_SESSION["username"];
	    	$find_student_fullName = ucwords(find_student_by_username($loggedInUser_name));
	    	echo "Logged In: $find_student_fullName";
    	} elseif (logged_in_admin()) {    	
	    	$loggedInUser_name = $_SESSION["username"];
	    	$find_admin_fullName = ucwords(find_admin_by_username($loggedInUser_name));
	    	echo "Admin: $find_admin_fullName";
    	} else {
    		echo "Login";
    	}
    ?>	

<?php if ( !logged_in_student_m6() && !logged_in_student_m8() && !logged_in_admin() ) { ?>
      <input style="float: right; margin-right: 70px;" type="submit" name="login" value="Login" />     
	    </form>
	    
	    <form action="../private/new_studentCreate.php" method="post">
        <input style="float: right; margin-right: 5px; margin-top: -13px;" type="submit" name="createAccount" value="Create Account" />
	    </form>
<?php } else { ?>

		</form>
	

        <form action="logout.php" method="post">
        <input style="float: right; margin-right: 70px; margin-top: -13px;" type="submit" name="logout" value="Logout" />
	    </form>
	    </h2> 
		
<?php } ?>
</div>
	    <div id="loginError">
		   <?php  echo message(); ?>
		   <?php  echo form_errors($errors); ?>
</div>