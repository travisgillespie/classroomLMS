<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in_admin(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<?php include("formChapterSelect.php"); ?>
	<div id="classFiles">

		<?php 
		$title = mysql_prep($_POST['title']);
		$gradeLevel = "m6";
		?>
		<?php classFiles($gradeLevel) ; ?>

		</div>
		
			
<div id="main">
	<div id="navigation">
		&nbsp;
	</div>
	<div id="page">
		<h2>Drop-Down Menu</h2>
		<p>Welcome to the admin area, <?php echo htmlentities($_SESSION["username"]); ?>.</p>
		<ul>
			<li><a href="manage_content.php">Manage Website Content</a></li>
			<li><a href="manage_admins.php">Manage Admin Users</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>




