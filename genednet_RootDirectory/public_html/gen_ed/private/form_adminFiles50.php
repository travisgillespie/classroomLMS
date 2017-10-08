<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php") ; ?>
<?php confirm_logged_in_admin(); ?>



<?php //START CRUD//?>

<?php //create: $_POST['assType'] ?>
	<form method="post">
	<label for="colorCL" value="<?php echo $_POST['createAssignment'] ?>"> </label>
       
       <?php //create new assignment: ?>
        <?php echo "Create Assignment:"; ?>
        <?php echo "<br>"; ?>
        <?php echo "&nbsp"?>
        <?php echo "assing: "?>
        <select name="createAssignment" id="chapter" type="submit" onchange=this.form.submit()>
        	<?php if(isset($_POST['createAssignment'])){?>
			<option  seleceted value="<?php echo $_POST['createAssignment'] ; ?>"><?php echo $_POST['createAssignment'] ; ?></option>
			<?php } ?>	
			<option value=""></option>
			<option value="all">all</option>
			
				<?php //assType: ?>
	        	 assType:
		        	 <?php 
		        	 	global $connection;
					  	// 2 perform the query

					  	//MIGHT NEED TO CHANGE ALL assType to createAssignment
					  	$query  = "SELECT DISTINCT assType ";
						$query .= "FROM files50 ";
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
        
        	
        

         

        <?php //Title: ?>
	        	 <?php echo "title:"; ?>
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
					  	// 2 perform the query
					  	$query  = "SELECT DISTINCT title ";
						$query .= "FROM files50 ";
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

        <?php echo "Grade Level:"; ?>
        <select name="gradeLevel" id="chapter" type="submit" onchange=this.form.submit()>
        	<?php if(isset($_POST['gradeLevel'])){?>
			<option  seleceted value="<?php echo $_POST['gradeLevel'] ; ?>"><?php echo $_POST['gradeLevel'] ; ?></option>
			<?php } ?>
			<option value=""></option>
			<option value="all">all</option>
            <option value="m6">m6</option>
            <option value="m8">m8</option>
        </select>

        <?php echo "&nbsp"?>
        <?php echo "qty: "?>
        <select name="questions" id="chapter" type="submit" onchange=this.form.submit()>
				<?php if(isset($_POST['questions'])){?>
				<option  seleceted value="<?php echo $_POST['questions'] ; ?>"><?php echo $_POST['questions'] ; ?></option>
				<?php } ?>	
				<?php for ($i = 1; $i <= 150; $i++) { ?>
				<option value="<?php echo $i ;?>"><?php echo $i ;?></option>
				<?php } ?>
		</select>

		<?php echo "&nbsp"?>
        <?php echo "type: "?>
        <select name="questionTypeTop" id="chapter" type="submit" onchange=this.form.submit()>
			<?php if(isset($_POST['questionTypeTop'])){?>
			<option  seleceted value="<?php echo $_POST['questionTypeTop'] ; ?>"><?php echo $_POST['questionTypeTop'] ; ?></option>
			<?php } ?>	
			<option value=""></option>	
			<option value="fr">fr</option>
			<option value="mc">mc</option>
		</select>
		
        

</form>
		<?php if(isset($_POST['createAssignment'])){?>
        	<input type="" style="border-radius: 20px;" name="createAssignment" value="<?php echo $_POST['createAssignment'] ; ?>" />
        <?php } ?>
        <?php if(isset($_POST['questionTypeTop'])){?>
        	<input type="" style="border-radius: 20px;" name="questionTypeTop" value="<?php echo $_POST['questionTypeTop'] ; ?>" />
        <?php } ?>

			<?php // open file in main display   admin_createAssignment   ?>
			<?php //upload form fileds based on dropdown list ?>
			<?php //create file ?>

<?php //read: ?>
<?php echo "Read Assignment:"; ?>
	<?php
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
							$query  = "SELECT *";
							$query .= "FROM files50 ";
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
							$query .= "FROM files50 ";
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
	       
	        <?php echo "Chapter:"; ?>
	        <select name="chapter" id="chapter" type="submit" onchange=this.form.submit()>
	        	<?php if(isset($_POST['chapter'])){?>
				<option  seleceted value="<?php echo $_POST['chapter'] ; ?>"><?php echo $_POST['chapter'] ; ?></option>
				<?php } ?>	
				<option value=""></option>
				<option value="all">all</option>		
			

					<?php //chapter: ?>
		        	 chapter:
			        	 <?php

			        	 	global $connection;
			        	 	$safe_student_id = $safe_student_id;
						  	// 2 perform the query
						  	$query  = "SELECT DISTINCT chapter ";
							$query .= "FROM files50 ";
							$query .= "ORDER BY chapter ASC";
						  	$response = mysqli_query($connection, $query);
						  	if (!$response){
								die("Database query failed.");
							} else {
							while ($row = mysqli_fetch_assoc($response)){
							
							?>
							<option value="<?php echo htmlspecialchars($row['chapter']); ?>"><?php echo htmlspecialchars($row['chapter']); ?></option>
							<?php 
							}
							}
							
							?>


	        </select> 


	              <?php echo "&nbsp"?>
        <?php echo "qty: "?>
        <select name="questions" id="chapter" type="submit" onchange=this.form.submit()>
				<?php if(isset($_POST['questions'])){?>
				<option  seleceted value="<?php echo $_POST['questions'] ; ?>"><?php echo $_POST['questions'] ; ?></option>
				<?php } ?>	
				<?php for ($i = 1; $i <= 150; $i++) { ?>
				<option value="<?php echo $i ;?>"><?php echo $i ;?></option>
				<?php } ?>
		</select>

		<?php echo "&nbsp"?>
        <?php echo "type: "?>
        <select name="questionTypeTop" id="chapter" type="submit" onchange=this.form.submit()>
			<?php if(isset($_POST['questionTypeTop'])){?>
			<option  seleceted value="<?php echo $_POST['questionTypeTop'] ; ?>"><?php echo $_POST['questionTypeTop'] ; ?></option>
			<?php } ?>	
			<option value=""></option>	
			<option value="fr">fr</option>
			<option value="mc">mc</option>
		</select>
		        	   
	</form>


	<?php
	//$gradeLevel = mysql_prep($_POST['gradeLevel']);
	?>
	<?php //select parameters mini display on top ?>
	<?php 
	$studentName = explode(' ',$_POST['studentName']);
	?>

	<?php //echo "<br>"; ?>
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
			

		
	?>

<?php //update: ?>
<?php echo "Update Assignment:"; ?>
<?php echo "<br>"; ?>



<?php echo "<br>"; ?>
<?php ////////////////////////////// END OF DROPDOWN ////////////////////////
///////////////////////////// START OF PERSONAL STATS ///////////////// ?>
<?php echo "Download Assignment:"; ?>
<?php echo "<br>"; ?>
<?php // button export to csv ?>
<?php


?>
<?php //view stats main display on bottom ?>
<form method="post">
	<label for="colorCL" value="<?php echo $_POST['quantity'] ?>"> </label>
       
       <?php //Student Name: ?>
	   <?php echo "Student Name:"; ?>
        <select name="studentName" id="chapter" type="submit" onchange=this.form.submit()>
        	<?php if(isset($_POST['studentName'])){?>
			<option  seleceted value="<?php echo $_POST['studentName'] ; ?>"><?php echo $_POST['studentName'] ; ?></option>
			<?php } ?>	
			<option value=""></option>
			<option value="all">all</option>
			
			
			
			
			
				<?php //assType: ?>
	        	 Student Name:
		        	 <?php 
		        	 	global $connection;
					  	// 2 perform the query
					  	$query  = "SELECT * ";
						$query .= "FROM students ";
						$query .= "ORDER BY firstName ASC";
					  	$response = mysqli_query($connection, $query);
					  	if (!$response){
							die("Database query failed.");
						} else {
						while ($row = mysqli_fetch_assoc($response)){
						
						?>
						<option value="<?php echo htmlspecialchars(ucfirst($row['firstName'])); ?><?php echo " " ; ?><?php echo htmlspecialchars(ucfirst($row['lastName'])); ?>"><?php echo htmlspecialchars(ucfirst($row['firstName'])); ?><?php echo " " ; ?><?php echo htmlspecialchars(ucfirst($row['lastName'])); ?><?php echo " " ; ?><?php echo htmlspecialchars(ucfirst($row['period'])); ?></option>
						<?php 
						}
						}
						
						?>
	        	 
			
			
			
        </select>
	        	
	        	 
	        	 
	        	 
	        	 
	        	 
	        	 
	        	 
	        	 
	        	 
	        	 
       
        <?php echo "assType:"; ?>
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
					  	// 2 perform the query
					  	$query  = "SELECT DISTINCT assType ";
						$query .= "FROM files50 ";
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
       
       
       <?php //Title: ?>
	        	 <?php echo "title:"; ?>
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
					  	// 2 perform the query
					  	$query  = "SELECT DISTINCT title ";
						$query .= "FROM files50 ";
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
       
       
        <?php echo "Attempt:"; ?>
        <select name="attempt" id="chapter" type="submit" onchange=this.form.submit()>
        	<?php if(isset($_POST['attempt'])){?>
			<option  seleceted value="<?php echo $_POST['attempt'] ; ?>"><?php echo $_POST['attempt'] ; ?></option>
			<?php } ?>	
			<option value=""></option>
			<option value="all">all</option>		
			<?php for ($i = 1; $i <= 10; $i++) { ?>
			 <option value="<?php echo $i ;?>"><?php echo $i ;?></option>
			<?php } ?>
        </select>   




       <?php echo "Grade Level:"; ?>
        <select name="gradeLevel" id="chapter" type="submit" onchange=this.form.submit()>
        	<?php if(isset($_POST['gradeLevel'])){?>
			<option  seleceted value="<?php echo $_POST['gradeLevel'] ; ?>"><?php echo $_POST['gradeLevel'] ; ?></option>
			<?php } ?>
			<option value=""></option>
			<option value="all">all</option>
            <option value="m6">m6</option>
            <option value="m8">m8</option>
        </select>  
        
        
        
        
        
        
        <?php echo "Period:"; ?>
        <select name="period" id="chapter" type="submit" onchange=this.form.submit()>
        	<?php if(isset($_POST['period'])){?>
			<option  seleceted value="<?php echo $_POST['period'] ; ?>"><?php echo $_POST['period'] ; ?></option>
			<?php } ?>	
			<option value=""></option>
			<option value="all">all</option>		
			<?php for ($i = 0; $i <= 32; $i++) { ?>
			 <option value="<?php echo $i ;?>"><?php echo $i ;?></option>
			<?php } ?>
        </select>
	        	   
</form>


<?php
//$gradeLevel = mysql_prep($_POST['gradeLevel']);
?>
<?php //select parameters mini display on top ?>
<?php 
$studentName = explode(' ',$_POST['studentName']);
?>

    <form method="post">
        <fieldset>
            <legend>Download Results in CSV Format</legend>
            <p>
            	 <input type="submit" name="download" id="download" value="download csv file">
            	 <?php // <br/> ?>
            	
            	<?php //First Name: ?>
	        	 <input type="hidden" style="border-radius: 20px;" name="selectedFirstName" value="<?php echo htmlspecialchars($studentName[0]); ?>" />
	        	 <?php // <br/> ?>
	        	 <?php //Last Name: ?>
	        	 <input type="hidden" style="border-radius: 20px;" name="selectedLastName" value="<?php echo htmlspecialchars($studentName[1]); ?>" />
	        	 <?php // <br/> ?>
	        	 
	        	<?php //assType: ?>
	        	 <input type="hidden" style="border-radius: 20px;" name="selectedAssType" value="<?php echo htmlspecialchars($_POST['assType']); ?>" />
		         <?php // <br/> ?>
	        	 
				<?php //Title: ?>
	        	  <input type="hidden" style="border-radius: 20px;" name="selectedTitle" value="<?php echo htmlspecialchars($_POST['title']); ?>" />
            	<?php // <br/> ?>
            	 
            	<?php //Attempt: ?>
				 <input type="hidden" style="border-radius: 20px;" name="selectedAttempt" value="<?php echo htmlspecialchars($_POST['attempt']); ?>" />
				 <?php // <br/> ?>
				 
				 
  	        	 <?php //Grade Level: ?>
				 <input type="hidden" style="border-radius: 20px;" name="selectedGradeLevel" value="<?php echo htmlspecialchars($_POST['gradeLevel']); ?>" />
				 <?php // <br/> ?>
				 
  	        	 <?php //Period: ?>
				 <input type="hidden" style="border-radius: 20px;" name="selectedPeriod" value="<?php echo htmlspecialchars($_POST['period']); ?>" />
				<?php // <br/> ?>
				 
				 				 
				 
                <?php // <input type="submit" name="download" id="download" value="download csv file"> ?>
            </p>
        </fieldset>
    </form>
  
        
<?php 


?>