<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<div id="contentBackground">
<div id="content">
<div class="topBlockLogin"></div>
<br/>
<br/>
<br/>
<br/>
<?php //$layout_context = "public"; ?>
<?php //$layout_context = "student"; ?>


<?php
if (isset($_POST['createAdmin'])) {
?>
<div class="topBlockLogin"></div>
<div class="topBlockLogin"></div>
<div class="topBlockLogin"></div>
<?php
  // Process the form
  
  // validations
  $required_fields = array( "admin_id", "lastName", "firstName", "email",  "adminLevel",  "period",  "username", "password");  
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create

	$admin_id = mysql_prep($_POST["admin_id"]);
	$lastName = mysql_prep($_POST["lastName"]);
    $firstName = mysql_prep($_POST["firstName"]);
    $email = mysql_prep($_POST["email"]);
    $adminLevel = mysql_prep($_POST["adminLevel"]);
    $period = mysql_prep($_POST["period"]);
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);
    $year = mysql_prep($_POST["year"]);
    
    $query  = "INSERT INTO admins (";
    $query .= "  admin_id, lastName, firstName, email, adminLevel, period, username, hashed_password, year";
    $query .= ") VALUES (";
    $query .= "  '{$admin_id}', '{$lastName}', '{$firstName}', '{$email}', '{$adminLevel}', '{$period}', '{$username}', '{$hashed_password}',  '{$year}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

     if ($result) {
      // Success
      $_SESSION["message"] = "Admin created.";
      redirect_to("manage_admins.php");
    } else {
      // Failure
      $_SESSION["message"] = "Admin creation failed.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>
<?php $layout_context = ""; ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="page">
    <h2>Create Admin</h2>
    <form action="new_admin.php?" method="post">
      <p>Username:
        <input type="text" name="username" value="<?php echo htmlentities($_POST["username"]); ?>" />
      </p>
      <p>Password:
        <input type="password" name="password" value="" />
      <p>First Name:
        <input type="text" name="firstName" value="<?php echo htmlentities($_POST["firstName"]); ?>" />
	  <p>Last Name:
        <input type="text" name="lastName" value="<?php echo htmlentities($_POST["lastName"]); ?>" />
      <p>Email:
        <input type="text" name="email" value="<?php echo htmlentities($_POST["email"]); ?>" />  
      <p>Admin Id:
        <input type="number" name="admin_id" value="<?php echo htmlentities($_POST["admin_id"]); ?>" />  
       <p>Security Code:
        <input type="text" name="adminLevel" value="<?php echo htmlentities($_POST["adminLevel"]); ?>" />
      <p>Period:
        <input type="number" name="period" value="<?php echo htmlentities($_POST["period"]); ?>" /> 
      <p>
        <input type="hidden" name="year" value="2014-2015" readonly/>
        
      </p>
      	<input type="submit" name="createAdmin" value="Create Admin" />
    </form>
        <br />
    <a href="manage_admins.php">Cancel</a>
    
    <br />
    </div>
 <?php echo createAccountMessage(); ?>
 
 <?php echo form_errorsCreateAccount($errors); ?>
 
<?php include("../includes/layouts/footer.php"); ?>