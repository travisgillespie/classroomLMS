<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php find_selected_page(); ?>

<?php
if(!$current_menuBar) {
		// menuBar ID was missing or invalid or menuBar couldn't be found in db
		redirect_to("manage_content.php");
	}
?>

<?php
if (isset($_POST['submit'])) {
	//Process the form
	
		
	// validations
	$required_fields = array("menu_name", "position", "visible");
	validate_presences($required_fields);
	
	$fields_with_max_lengths = array("menu_name" => 30);
	validate_max_lengths($fields_with_max_lengths);
	
	if(empty($errors)) {
		// Perform Update
		
		
		// Often these are form values in $_POST, but in this case they are coming from the $_Post
		$id = $current_menuBar["id"];
		$menu_name = mysql_prep($_POST["menu_name"]);
		$position = (int) $_POST["position"];
		$visible = (int) $_POST["visible"];
	
		
		// 2. Perform database query
		$query  = "UPDATE menuBar SET ";
		$query .= "menu_name = '{$menu_name}', ";
		$query .= "position = {$position}, ";
		$query .= "visible = {$visible} ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";
		$result = mysqli_query($connection, $query);
	
		if ($result && mysqli_affected_rows($connection) >= 0) {
			// Success
			$_SESSION["message"] = "Menubar updated.";
			redirect_to("manage_content.php");
		} else {
			// Failure
			$message = "Menubar update failed.";
		}
	}
} else {

} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>		

<div id="main">
	<!-- navigation float on top-->
	<div id="navigation">
		<!-- change all class names from menuBars to menuBar... on all php files and css stylesheet -->
		<?php echo navigation($current_menuBar, $current_page); ?>
	</div>
	
	<!-- page align center-->
	<div id="page">
	<?php // $message is just a variable, doesn't use the SESSION
		if (!empty($message)){
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		}
	?>
	<?php echo form_errors($errors); ?>
	
		<h2>Edit Menu Name: <?php echo htmlentities($current_menuBar["menu_name"]); ?></h2>
		
		<form action="edit_menuBar.php?menuBar=<?php echo urlencode($current_menuBar["id"]); ?>" method="post">
			<p>Menu name:
				<input type="text" name="menu_name" value="<?php echo htmlentities($current_menuBar["menu_name"]); ?>" />
			</p>
			<p>Position:
				<select name="position">
				<?php
					$menuBar_set = find_all_menuBar(false);
					$menuBar_count = mysqli_num_rows($menuBar_set);
					for($count=1; $count <= $menuBar_count; $count++) {
					
					
					
						echo "<option value=\"{$count}\"";
						if ($current_menuBar["position"] == $count) {
						
							echo " selected";
						}
						echo ">{$count}</option>";
					}
				?>
				</select>
			</p>
			<p>Visible:
				<input type="radio" name="visible" value="0" <?php if ($current_menuBar["visible"] == 0) { echo "checked"; } ?> /> No 
				&nbsp;
				<input type="radio" name="visible" value="1" <?php if ($current_menuBar["visible"] == 1) { echo "checked"; } ?> /> Yes
			</p>
			<input type="submit" name="submit" value="Edit menuBar" />
		</form>
		<br />
		<a href="manage_content.php">Cancel</a>
		&nbsp;
		&nbsp;
		<a href="delete_menuBar.php?menuBar=<?php echo urlencode($current_menuBar["id"]); ?>" onclick="return confirm('Are you sure?');">Delete Menu Name</a>
		
	</div>
</div>
	
<?php include("../includes/layouts/footer.php"); ?>