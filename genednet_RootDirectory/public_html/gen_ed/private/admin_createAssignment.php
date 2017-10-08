<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/functions.php") ; ?>
<?php // require_once("form_adminGrades.php") ; ?>
<?php confirm_logged_in_admin(); ?>

<?php //upload form fileds based on dropdown list ?>
<?php echo $_POST['createAssignment'] ?>
<h3> <?php echo htmlentities(ucwords($_POST['createAssignment'])); ?> </h3>

<?php
$createAssignment = $_POST['createAssignment'];
$filename = mysql_prep($_POST['filename']); 
$title = mysql_prep($_POST['title']);
$gradeLevel = mysql_prep($_POST['gradeLevel']);
$assType = mysql_prep($_POST['createAssignment']);
$loggedInUser_name = $_SESSION["username"];
$chapter = mysql_prep($_POST['chapter']); 
$loggedInUsername = mysql_prep($loggedInUser_name);
$find_student_fullName = mysql_prep(find_student_by_username($loggedInUsername));
$find_student_id = mysql_prep(find_student_id($loggedInUser_name));
$find_student_firstName= find_student_firstName($loggedInUser_name);
$find_student_lastName = find_student_lastName($loggedInUser_name);
$period= mysql_prep(find_student_period($loggedInUser_name));
$find_student_fullName = find_student_by_username($loggedInUser_name);
$attempt = 0;
$currentAttempt = mysql_prep(current_attempt_value($title, $find_student_id, $gradeLevel, $attempt));
$previousAttempt = mysql_prep($currentAttempt - 1);
?>

<?php if (isset($_POST['createAssignment'])){ ?>
	<form method="post">

	  	<?php echo "Create Assignment:"; ?>
	    <?php echo "<br>"; ?>
	    <input type="hidden" style="border-radius: 20px;" name="createAssignment" value="<?php echo $createAssignment ; ?>" />

	 <p>
	 	<?php echo "&nbsp"?>
	 	<?php echo "filename: " ?>
	    <input type="" style="border-radius: 20px;" name="filename" value="<?php echo $filename ; ?>" />
	    <?php echo "<br> " ?>

	    <?php echo "title: " ?>
	    <input type="" style="border-radius: 20px;" name="title" value="<?php echo $title ; ?>" />
	    <?php echo "<br> " ?>

	    <?php //gradeLevel ?>
	    <?php echo "gradeLevel: " ?>
	    <input type="" style="border-radius: 20px;" name="gradeLevel" value="<?php echo $gradeLevel ; ?>" />
	    <?php echo "<br> " ?>

	    <?php //assType ?>
	    <?php echo "assType: " ?>
	    <input type="" style="border-radius: 20px;" name="assType" value="<?php echo $assType ; ?>" />
	    <?php echo "<br> " ?>

		<?php echo "chapter: " ?>
	    <input type="" style="border-radius: 20px;" name="chapter" value="<?php echo $chapter ; ?>" />
	    <?php echo "<br> " ?>

	    <?php echo "rankOrder: " ?>
	    <input type="" style="border-radius: 20px;" name="chapter" value="<?php echo $chapter ; ?>" />
	    <?php echo "<br> " ?>

	    <?php echo "keyTypeReview: " ?>
	    <input type="" style="border-radius: 20px;" name="chapter" value="<?php echo $chapter ; ?>" />
	    <?php echo "<br> " ?>

	    <?php echo "keyTypeAnswers: " ?>
	    <input type="" style="border-radius: 20px;" name="chapter" value="<?php echo $chapter ; ?>" />
	    <?php echo "<br> " ?>

	    <?php echo "docType: " ?>
	    <input type="" style="border-radius: 20px;" name="chapter" value="<?php echo $chapter ; ?>" />
	    <?php echo "<br> " ?>

	    <?php echo "releaseDate: " ?>
	    <input type="" style="border-radius: 20px;" name="chapter" value="<?php echo $chapter ; ?>" />
	    <?php echo "<br> " ?>

	    <?php echo "releaseTime: " ?>
	    <input type="" style="border-radius: 20px;" name="chapter" value="<?php echo $chapter ; ?>" />
	    <?php echo "<br>" ?>
	</p>


	<?php

	//include # of questions to this file... and include //admin_createDropdownQuestions.php to the # of questions file
	require("admin_createAssignment_NumberOfQuestions.php") ;
	//IF condition for PREFIX & UNITS

	//IF anskerKey-A isn't empty AND submit is hit Create file in DATABASE


	?>




	</form>
<?php } ?>