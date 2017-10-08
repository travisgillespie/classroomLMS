<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>		
<?php find_selected_page(); ?>

<div id="main">
	<!-- navigation float on top-->
	<div id="navigation">
		<!-- change all class names from menuBars to menuBar... on all php files and css stylesheet -->
		<?php echo navigation($current_menuBar, $current_page); ?>
	</div>
	
	<!-- page align center-->
	<div id="page">
	<?php echo message(); ?>
	<?php $errors = errors(); ?>
	<?php echo form_errors($errors); ?>
	
		<h2>Create Menu Name</h2>
		
		<form action="create_menuBar.php" method="post">
			<p>Menu name:
				<input type="text" name="menu_name" value="" />
			</p>
			<p>Position:
				<select name="position">
				<?php 
					$menuBar_set = find_all_menuBar(false);
					$menuBar_count = mysqli_num_rows($menuBar_set);
					for($count = 1; $count <= ($menuBar_count + 1); $count++) {
						echo "<option value=\"{$count}\">{$count}</option>";
					}
				
				?>
				</select>
			</p>
			<p>Visible:
				<input type="radio" name="visible" value="0" /> No 
				&nbsp;
				<input type="radio" name="visible" value="1" /> Yes
			</p>
			<input type="submit" name="submit" value="Create menuBar" />
		</form>
		<br />
		<a href="manage_content.php">Cancel</a>
	</div>
</div>
	
<?php include("../includes/layouts/footer.php"); ?>