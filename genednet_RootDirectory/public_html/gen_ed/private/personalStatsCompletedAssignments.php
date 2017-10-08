<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/functions.php") ; ?>

<?php 
//$studentId = find_student_id($_SESSION["username"]);
$student_id = find_student_id($loggedInUser_name);
$loggedInUser_name = $_SESSION["username"];
$safe_student_id = mysqli_real_escape_string($connection, $student_id);
?>

<?php //view stats main display on bottom ?>
<form method="post">
	<label for="colorCL" value="<?php echo $_POST['quantity'] ?>"> </label>
       
       <?php //Title: ?>
	    <?php echo "Title:"; ?>
        <select name="title" id="chapter" type="submit" onchange=this.form.submit()>
        	<?php if(isset($_POST['title'])){?>
			<option  seleceted value="<?php echo $_POST['title'] ; ?>"><?php echo $_POST['title'] ; ?></option>
			<?php } ?>	
			<option value=""></option>
			<option value="all">all</option>
			

				<?php //title: ?>
	        	 Title:
		        	 <?php 
		        	 	global $connection;
		        	 	$safe_student_id = $safe_student_id;
					  	// 2 perform the query
						$query  = "SELECT DISTINCT title ";
						$query .= "FROM studentStats ";
						$query .= "WHERE student_id = '{$safe_student_id}' ";
						$query .= "AND username = '{$loggedInUser_name}' ";
						$query .= "ORDER BY title ASC";
					  	$response = mysqli_query($connection, $query);
					  	if (!$response){
							die("Database query failed.");
						} else {
						while ($row = mysqli_fetch_assoc($response)){
						
						?>
						<option value="<?php echo htmlspecialchars($row['title']); ?>"><?php echo htmlspecialchars($row['title']); ?></option>
						<?php 
						}
						}
						
						?>
        </select>

        <?php //Type: ?>
		<?php echo "Type:"; ?>
        <select name="assType" id="chapter" type="submit" onchange=this.form.submit()>
        	<?php if(isset($_POST['assType'])){?>
			<option  seleceted value="<?php echo $_POST['assType'] ; ?>"><?php echo $_POST['assType'] ; ?></option>
			<?php } ?>	
			<option value=""></option>
			<option value="all">all</option>

			
				<?php //assType: ?>
	        	 assType:
		        	 <?php 
		        	 	global $connection;
		        	 	$safe_student_id = $safe_student_id;
					  	// 2 perform the query
						$query  = "SELECT DISTINCT assType ";
						$query .= "FROM studentStats ";
						$query .= "WHERE student_id = '{$safe_student_id}' ";
						$query .= "AND username = '{$loggedInUser_name}' ";
						$query .= "ORDER BY title ASC";
					  	$response = mysqli_query($connection, $query);
					  	if (!$response){
							die("Database query failed.");
						} else {
						while ($row = mysqli_fetch_assoc($response)){
						
						?>
						<option value="<?php echo htmlspecialchars($row['assType']); ?>"><?php echo htmlspecialchars($row['assType']); ?></option>
						<?php 
						}
						}
						
						?>

			
        </select>
       
        <?php echo "Attempt:"; ?>
        <select name="attempt" id="chapter" type="submit" onchange=this.form.submit()>
        	<?php if(isset($_POST['attempt'])){?>
			<option  seleceted value="<?php echo $_POST['attempt'] ; ?>"><?php echo $_POST['attempt'] ; ?></option>
			<?php } ?>	
			<option value=""></option>
			<option value="all">all</option>		
		

				<?php //attempt: ?>
	        	 assType:
		        	 <?php

		        	 	global $connection;
		        	 	$safe_student_id = $safe_student_id;
					  	// 2 perform the query
					  	$query  = "SELECT DISTINCT attempt ";
						$query .= "FROM studentStats ";
						$query .= "WHERE student_id = '{$safe_student_id}' ";
						$query .= "AND username = '{$loggedInUser_name}' ";
						$query .= "ORDER BY attempt ASC";
					  	$response = mysqli_query($connection, $query);
					  	if (!$response){
							die("Database query failed.");
						} else {
						while ($row = mysqli_fetch_assoc($response)){
						
						?>
						<option value="<?php echo htmlspecialchars($row['attempt']); ?>"><?php echo htmlspecialchars($row['attempt']); ?></option>
						<?php 
						}
						}
						
						?>


        </select> 
	        	   
</form>


<?php
//$gradeLevel = mysql_prep($_POST['gradeLevel']);
?>
<?php //select parameters mini display on top ?>
<?php 
$studentName = explode(' ',$_POST['studentName']);
?>

<?php echo "<br>"; ?>
<?php

//	function find_student_assignments($student_id) {
		global $connection;
		$safe_student_id = $safe_student_id;
		$query  = "SELECT * ";
		$query .= "FROM studentStats ";
		$query .= "WHERE student_id = '{$safe_student_id}' ";
		$query .= "AND username = '{$loggedInUser_name}' ";
		
		// TITLE
			if ($_POST['title'] === 'all') {
					// show all files
					$query .= "AND title = title ";
			} elseif ($_POST['title'] === '') {
					// show all files
					$query .= "AND title = title ";
			} elseif ($_POST['title']){
					$title = $_POST['title'] ;
					$query .= "AND title = '{$title}' ";
			} else {
					// no response
					$query .= "AND title = title ";
			}

		// assType
			if ($_POST['assType'] === 'all') {
					// show all files
					$query .= "AND assType = assType ";
			} elseif ($_POST['assType'] === '') {
					// show all files
					$query .= "AND assType = assType ";
			} elseif ($_POST['assType']){
					$assType = $_POST['assType'] ;
					$query .= "AND assType = '{$assType}' ";
			} else {
					// no response
					$query .= "AND assType = assType ";
			}

		// ATTEMPT
			if ($_POST['attempt'] === 'all') {
					// show all files
					$query .= "AND title = title ";
			} elseif ($_POST['attempt'] === '') {
					// show all files
					$query .= "AND title = title ";
			} elseif ($_POST['attempt']){
					$attempt = $_POST['attempt'] ;
					$query .= "AND attempt = '{$attempt}' ";
			} else {
					// no response
					$query .= "AND attempt = attempt ";
			}

		
		$query .= "ORDER BY title ASC, attempt ASC";
		
	
		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);
		while($student = mysqli_fetch_assoc($student_set)) {

		?>
		
<form action="../public/index.php?page=4" method="post">
	<?php //Title ?>
        <input type="hidden" style="border-radius: 20px;" name="title2" value="<?php echo $student["title"] ; ?>" />
        <input type="hidden" style="border-radius: 20px;" name="attempt2" value="<?php echo $student["attempt"] ; ?>" />		
		<input style="float: ; margin-right: 100px;" type="submit" name="findAssignmentResults" value="<?php echo $student["title"] . " - " . "Attempt: " . $student["attempt"];?> " />
			
</form>

			<?php 		
			echo "<hr />";	
?>

<?php		
		}
		
//	}
	
	
//	find_student_assignments();
	
?>