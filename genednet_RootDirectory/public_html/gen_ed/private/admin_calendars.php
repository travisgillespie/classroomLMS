<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php") ; ?>
<?php confirm_logged_in_admin(); ?>

<h4>
<?php
if (!isset($_POST['gradeLevel'])){
	//echo " all grade levels";
}elseif ($_POST['gradeLevel'] === m6){ ?>

	<?php
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM page ";
		$query .= "WHERE menu_name = 'Math 6' ";
		$query .= "LIMIT 1";
		$calendar_set = mysqli_query($connection, $query);
		// Test if there was a query error... confirm query is located in the functions.php file
		confirm_query($calendar_set);
		if($current_calendar = mysqli_fetch_assoc($calendar_set)) {
		} else {
			echo "no calendar to display";
		}
	?>

	
	<?php echo '<iframe id="classCalendar" '?> 
	<?php echo 'src="' ?>
	<?php echo $current_calendar['include']; ?>
	<?php echo 'style=" border-width:0" width="200" height="300"  frameborder="0" scrolling="no">' ?>
	<?php echo '</iframe>' ?>
	
	
<?php }elseif ($_POST['gradeLevel'] === m8){ ?>
	
	<?php
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM page ";
		$query .= "WHERE menu_name = 'Math 8' ";
		$query .= "LIMIT 1";
		$calendar_set = mysqli_query($connection, $query);
		// Test if there was a query error... confirm query is located in the functions.php file
		confirm_query($calendar_set);
		if($current_calendar = mysqli_fetch_assoc($calendar_set)) {
		} else {
			echo "no calendar to display";
		}
	?>
	
	<?php echo '<iframe id="classCalendar" '?> 
	<?php echo 'src="' ?>
	<?php echo $current_calendar['include']; ?>
	<?php echo 'style=" border-width:0" frameborder="0" scrolling="no">' ?>
	<?php echo '</iframe>' ?>
	
<?php
}elseif ($_POST['chapter'] === wu){
	echo " warm up files";
}elseif ($_POST['chapter'] === "test" . " " . "reviews"){
	echo " test review files";
}elseif ($_POST['assType'] === tests){
	echo " chapter tests";
}elseif ($_POST['chapter'] == 1){
	echo " chapter {$_POST['chapter']} files";
}else{
	echo "sorry there aren't any files to display";
}
?>
</h4>