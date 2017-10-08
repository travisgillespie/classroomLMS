<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/functions.php") ; ?>
<?php 
if (((isset($_POST['login'])) && (! logged_in_student_m6() || ! logged_in_student_m8() )) || ((isset($_POST['logout'])) && (logged_in_student_m6() ||  logged_in_student_m8() ))) { 
	 	  // Process the form
		
		$loggedInUser_name = mysql_prep($_SESSION["username"]);
	 	$find_student_id = mysql_prep(find_student_id($loggedInUser_name));
    	$find_student_lastName = mysql_prep(find_student_lastName($loggedInUser_name));
    	$find_student_firstName= mysql_prep(find_student_firstName($loggedInUser_name));
    	$find_student_gradeLevel = mysql_prep(find_student_gradeLevel($loggedInUser_name));
    	
   
	    	if (isset($_POST['login'])){
				$currentLog = "login";
			} elseif(isset($_POST['logout'])){
				$currentLog = "logout";
			}
    	$log = $currentLog;
    	
global $connection;
$query  = "INSERT INTO logins( ";
$query .= " id, username, student_id, lastName, firstName, gradeLevel, log";
$query .= ") VALUES (" ;
$query .= " '', '{$loggedInUser_name}', '{$find_student_id}', '{$find_student_lastName}', '{$find_student_firstName}', '{$find_student_gradeLevel}', '{$log}' ";
$query .= ")";

$response = mysqli_query($connection, $query);

if ($response){
//echo "success";

} else {
die("Database query failed. " . mysqli_error($connection));
}
}
?>