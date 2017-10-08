<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
$current_menuBar = find_menuBar_by_id($_GET["menuBar"], false);
if(!$current_menuBar) {
		// menuBar ID was missing or invalid or menuBar couldn't be found in db
		redirect_to("manage_content.php");
	}
	
	$pages_set = find_page_for_menuBar($current_menuBar["id"]);
	if (mysqli_num_rows($pages_set)>0){
		//Failure
			$_SESSION["message"] = "Can't delete menu name with pages.";
			redirect_to("manage_content.php?menuBar={$current_menuBar["id"]}");
	}
	
	$id = $current_menuBar["id"];
	$query = "DELETE FROM menuBar WHERE id = {$id} LIMIT 1";
	$result = mysqli_query($connection, $query);
	
		if ($result && mysqli_affected_rows($connection) == 1){
			//Success
			$_SESSION["message"] = "Menu Name Deleted.";
			redirect_to("manage_content.php");
		} else {
			//Failure
			$_SESSION["message"] = "Menu Name deletion failed.";
			redirect_to("manage_content.php?menuBar={$id}");
		}
?>