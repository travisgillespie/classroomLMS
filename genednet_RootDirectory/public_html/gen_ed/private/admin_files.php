<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php") ; ?>
<?php confirm_logged_in_admin(); ?>

<?php echo "File Selection:"; ?>
<?php include("formChapterSelect.php"); ?>
	<div id="classFiles">

		<?php 
		$title = mysql_prep($_POST['title']);
		$gradeLevel = mysql_prep($_POST['gradeLevel']);
		?>
		<?php classFiles($gradeLevel) ; ?>

		</div>