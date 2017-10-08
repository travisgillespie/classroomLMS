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
if (isset($_POST['createStudent'])) {
?>
<div class="topBlockLogin"></div>
<div class="topBlockLogin"></div>
<div class="topBlockLogin"></div>
<?php
  // Process the form
  
  // validations
  $required_fields = array( "student_id", "lastName", "firstName", "email",  "gradeLevel",  "period",  "username", "password");  
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create

	$student_id = mysql_prep($_POST["student_id"]);
	$lastName = mysql_prep($_POST["lastName"]);
    $firstName = mysql_prep($_POST["firstName"]);
    $email = mysql_prep($_POST["email"]);
    $gradeLevel = mysql_prep($_POST["gradeLevel"]);
    $period = mysql_prep($_POST["period"]);
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);
    $year = mysql_prep($_POST["year"]);
    
    $query  = "INSERT INTO students (";
    $query .= "  student_id, lastName, firstName, email, gradeLevel, period, username, hashed_password, year";
    $query .= ") VALUES (";
    $query .= "  '{$student_id}', '{$lastName}', '{$firstName}', '{$email}', '{$gradeLevel}', '{$period}', '{$username}', '{$hashed_password}',  '{$year}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      //$_SESSION["createAccountMessage"] = "student created.";
      redirect_to("../public/index.php?menuBar=1");
    } else {
      // Failure
      //$_SESSION["createAccountMessage"] = "student creation failed.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>
<?php $layout_context = ""; ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="page">
    <h2>Create student</h2>
    <form action="new_studentCreate.php" method="post">
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
      <p>Student Id:
        <input type="number" name="student_id" value="<?php echo htmlentities($_POST["student_id"]); ?>" />  
       <p>Grade:
        <input type="text" name="gradeLevel" value="<?php echo htmlentities($_POST["gradeLevel"]); ?>" />
      <p>Period:
        <input type="number" name="period" value="<?php echo htmlentities($_POST["period"]); ?>" />  
      <p>
        <input type="hidden" name="year" value="2014-2015" readonly/>
        
      </p>
      	<input type="submit" name="createStudent" value="Create Student" />
    </form>
    
    <br />
    </div>
 <?php echo createAccountMessage(); ?>
 
 
 
 
 <?php echo form_errorsCreateAccount($errors); ?>
 
<?php include("../includes/layouts/footer.php"); ?>