<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/functions.php") ; ?>

<?php // if ( !logged_in_student_m6() && !logged_in_student_m8()) { ?>

   
   
<?php
if ((isset($_POST['title']) && logged_in_student_m6()) || (isset($_POST['title']) && logged_in_student_m8() )) { ?>   
  <?php 
    	$title = mysql_prep($_POST['title']);
    	$assType = mysql_prep(find_assType($title));
    	$loggedInUser_name = $_SESSION["username"];
    	$loggedInUsername = mysql_prep($loggedInUser_name);
    	$find_student_fullName = mysql_prep(find_student_by_username($loggedInUsername));
    	$find_student_id = mysql_prep(find_student_id($loggedInUser_name));
    	//$find_student_firstName= mysql_prep(find_student_firstName($loggedInUser_name));
    	//$find_student_lastName = mysql_prep(find_student_lastName($loggedInUser_name));
    	$find_student_firstName= find_student_firstName($loggedInUser_name);
    	$find_student_lastName = find_student_lastName($loggedInUser_name);
    	$gradeLevel = mysql_prep(find_student_gradeLevel($loggedInUser_name));
    	$period= mysql_prep(find_student_period($loggedInUser_name));
    	
    	$find_student_fullName = find_student_by_username($loggedInUser_name);
    	
    	$attempt = 0;
    	$currentAttempt = mysql_prep(current_attempt_value($title, $find_student_id, $gradeLevel, $attempt));
		$previousAttempt = mysql_prep($currentAttempt - 1);
		
    	?>
  <?php
if (isset($_POST['submit'])){
	for ($i=1; $i <= 150; $i++ ){
	//$total = 0;
	if($_POST['Q' . $i] != ''){
	${'response' . $i} = $_POST['response' . $i];
	//change this if statement below so that it only processes the form action if all responses !empty... you may want to look into using a foreach loop or an array_filter
	if (${'response' . $i} != ""){
		//successful form submission
		//redirect to next page
		//echo "response $i ) " . "=" . "${'response' . $i}";
		//$total = $total +1;
		//if ($total === 5){
		//${'response' . $i} = $_POST['response' . $i];
		
	} else {
		//SESSION_$message "there were some errors";
		//htmlspecialchars
		
		echo "<h4>! CAUTION ! Problem $i can't be blank</h4>";
?>	<form action="formAssignments.php" method="post"> <?php
	}
	

	
	//}
	//if ($total === 5){
	//	redirect_to("personalStatsCreate.php");
	//} else { // end of if isset
	//	// this sets the value on formAssignment function to empty string
	//	for ($i=1; $i <= 5; $i++ ){
	//	$_POST["response{$i}"] = "";
	//	echo $_POST["response{$i}"];
	//}
	//}
}

}

?>	<form action="../public/index.php?page=4" method="post"> <?php
}
	
?>    	
    	
    <form action="formAssignments.php" method="post">
      <p>
     <h3> <?php echo htmlentities(ucwords($find_student_fullName)); ?> </h3>
      <!-- First Name: -->
      <input type="hidden" style="border-radius: 20px;" name="firstName" value="<?php echo htmlspecialchars(ucfirst($find_student_firstName)); ?>"  readonly />
		
	  	<!-- Last Name: -->
        <input type="hidden" style="border-radius: 20px;" name="lastName" value="<?php echo htmlspecialchars(ucfirst($find_student_lastName)) ; ?>"  readonly />
       
       
       <?php //Student Id: ?>
	   <input type="hidden" style="border-radius: 20px;" name="studentID" value="<?php echo htmlentities($find_student_id); ?>" />
 
        <?php //username ?>
        <input type="hidden" style="border-radius: 20px;" name="username" value="<?php echo htmlentities($loggedInUser_name) ; ?>" />

        
        <?php //gradeLevel ?>
        <input type="hidden" style="border-radius: 20px;" name="gradeLevel" value="<?php echo htmlentities($gradeLevel) ; ?>" />
        
        <?php //class period ?>
        <input type="hidden" style="border-radius: 20px;" name="period" value="<?php echo htmlentities($period) ; ?>" />
        
        <?php //assType ?>
        <input type="hidden" style="border-radius: 20px;" name="assType" value="<?php echo $assType ; ?>" />
        
        <?php //Title ?>
        <input type="hidden" style="border-radius: 20px;" name="title" value="<?php echo $title ; ?>" />
        
        <?php //attempt ?>
         <?php //this will need to bring in an if or for statement to read the database, increment attement$i, and fill in the value ?>
          <?php //set type to hidden ?>

        <input type="hidden" style="border-radius: 20px;" name="attempt" value="<?php echo $currentAttempt ; ?>" />

<?php    /*   DELETE PREVIOUS ATTEMPT:
        <input type="" style="border-radius: 20px;" name="attempt" value="<?php echo $previousAttempt ; ?>" />
*/ ?>        
		<input style="float: right; margin-right: 100px;" type="submit" name="submit" value="Submit" />
       </p> 
       
      <!-- While fetch Row assoc...  FETCH a response key for the Assignment that was selected -->

      <?php formAssignments($title, $find_student_id, $previousAttempt, $gradeLevel); ?>
      
      <input style="float: right; margin-right: 100px;" type="submit" name="submit" value="Submit" />
	  </form>
 <h4> <?php echo "Select submit twice to complete the assignment."; ?> </h4>

<?php } else { ?>
<?php	redirect_to("www.apple.com"); ?>
<?php } ?>

<? /* YOU MAY NEED TO PLACE THIS ABOVE THE FORM... WHEN form is SUBMITTED... make sure there are no errors, OR questions unanswered... if there are stay on page, echo back the fields that are already submitted so student doesn't have to re-enter them 
	  	 
	    YOU MAY NEED TO PLACE THIS ABOVE THE FORM...  WHEN form is SUBMITTED... log their response in the database and label this file as their frist trial/attempt attached to the end... Redirect_to RESULTS.php... cross refrecne the database responseAnswerKey... show students their score, show students answers that are correct, and mark problems INCORRECT if student got the question wrong DON'T SHOW THE ANSWER FOR INCCORECT RESPONSE, student will have the opportunity to go back and rework incorrect problems 
	   
	   YOU MAY NEED TO PLACE THIS ABOVE THE FORM... RETRY or ADDITIONAL ATTEMPTS... 
	  - check database for previous attempts on assignment... pull correc responses from previous attempt(s) and echo these responses into the form and leave the incorrect responses marked as blank...
	  - upon submittion run through the same error checking as stated above, log score, log their response in the database and label this file name with an incrimintted trial/attempt id attached at the end... 
	  - redirect to results.php and run through same sequence as above	  
 */ ?>	  
	  
<?php // } ?>