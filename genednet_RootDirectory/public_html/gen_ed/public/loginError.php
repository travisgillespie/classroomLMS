<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
$username = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$found_student = attempt_login_student($username, $password);

    if ($found_student) {
      // Success
			// Mark user as logged in
			$_SESSION["student_id"] = $found_student["id"];
			$_SESSION["username"] = $found_student["username"];
	
	
	
	
	// WHERE DO I WANT TO REDIRECT TO... IS THERE A WAY TO REDIRECT TO EXACT PAGE STUDENT IS TRYING TO LOGIN TO
      redirect_to("../public/index.php");
      
      
      
      
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "student"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
  <div id="navigation">
    &nbsp; 
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Login</h2>
    <form action="login.php" method="post">
      <p>Username:
        <input type="text" name="username" value="<?php echo htmlentities($username); ?>" />
      </p>
      <p>Password:
        <input type="password" name="password" value="" />
      </p>
      <input type="submit" name="submit" value="Login" />
    </form>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>