<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php //confirm_logged_in(); ?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create
	$student_id = mysql_prep($_POST["student_id"]);
	$firstName = mysql_prep($_POST["firstName"]);
	$lastName = mysql_prep($_POST["lastName"]);
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);
    
    $year = mysql_prep($_POST["year"]);
    
    $query  = "INSERT INTO students (";
    $query .= "  'student_id', 'lastName', 'firstName', 'gradeLevel', 'username', 'hashed_password', 'year'";
    $query .= ") VALUES (";
    $query .= "  '{$student_id}', '{$lastName}', '{$firstName}', '', '{$username}', '{$hashed_password}', '{$year}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Student created.";
      redirect_to("login.php");
    } else {
      // Failure
      $_SESSION["message"] = "Student creation failed.";
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
    
    <h2>Create Student</h2>
    <form action="new_student.php" method="post">
      <p>
		First:<input type="text" name="firstName" value="" />
		Last:<input type="text" name="lastName" value="" />
		Username:<input type="text" name="username" value="" />
		Student ID:<input type="number" name="student_id" value="" />
		Password:<input type="password" name="password" value="" />
		Year:<input type="" name="year" value="2014-2015" />
      </p>
     
      <input type="submit" name="submit" value="Create Student(s)" />
    </form>
    <br />
    <a href="manage_students.php">Cancel</a>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>