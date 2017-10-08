<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/functions.php") ; ?>

<?php confirm_logged_in_student_m6() ; ?>

<?php include("formChapterSelect.php"); ?>
	<div id="classFiles">

		<?php
		$title = mysql_prep($_POST['title']);
		$loggedInUser_name = $_SESSION["username"];
		$gradeLevel = mysql_prep(find_student_gradeLevel($loggedInUser_name));
		?>
		<?php classFiles($gradeLevel, $loggedInUser_name) ; ?>

		</div>