<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php") ; ?>
<?php confirm_logged_in_admin(); ?>

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
			
			
			
			
			
				<?php //student name: ?>
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
       
       
          



        <?php //grade level: ?>
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
	        	 
	        	 
	        	 
	        	 
	        	 
	    <?php //assType: ?>    	 
       <?php  echo "<br>" ?>
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
            	 <input type="submit" name="downloadSkyward" id="download" value="download skyward file">
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