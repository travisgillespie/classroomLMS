<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/functions.php") ; ?>
<?php require_once("personalStatsUpdate.php") ; ?>

<?php

$loggedInUser_name = mysql_prep($_SESSION["username"]);
$student_id = mysql_prep(find_student_id($loggedInUser_name));
$title = mysql_prep($_POST['title2']);
$attempt = $_POST['attempt2'];
$gradeLevel = mysql_prep(find_student_gradeLevel($loggedInUser_name));
$score = mysql_prep($_POST['score']);
$response = mysql_prep($_POST['response' . $i]);
$studentResponse = mysql_prep($student["${'response' . $i}"]);
$startingCorrect = 0;
$startProblems = 0;
$totalIncorrect = $totalProblems - $totalCorrect ;
for ($i =1; $i <= 100; $i++){
${'response' . $i} = mysqli_real_escape_string($connection, $_POST['response' . $i]);
}


//	function find_assignment_results($student_id) {
		global $connection;
		$safe_student_id = mysqli_real_escape_string($connection, $student_id);
		$query  = "SELECT * ";
		$query .= "FROM studentStats ";
		$query .= "WHERE student_id = '{$student_id}' ";
		$query .= "AND gradeLevel = '{$gradeLevel}' ";		
		$query .= "AND title = '{$title}' ";
		$query .= "AND attempt = '{$attempt}' ";
		$query .= "ORDER BY title ASC";
		
	
		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);		
			
		if (!$student_set){
				die("db failure.". mysqli_error($connection));
			}
			
			while ($student = mysqli_fetch_assoc($student_set)){
				echo "&nbsp" ;
				echo $student["title"];
				echo "<br/>";
				echo "&nbsp";
				echo "Attempt: ";
				echo $student["attempt"];
				echo "<br />";
				echo "<br />";
				echo "&nbsp" ;
				echo "Final Score: ";
				echo $student["score"];
				echo "%";
				echo "<br />";
				echo "<br />";
				echo "&nbsp";
				echo "Total Correct = $totalCorrect";
				echo "<br />";
				echo "<br/>";
				echo "&nbsp";
				echo "Total Incorrect = $totalIncorrect ";
				echo "<hr/>";
								
				for ($i=1; $i <= 150; $i++ ){
				
				
				//replace $student["A{$i}a"] WITH $student["result{$i}"]
				if (($student["A{$i}a"] != '') || ($student["A{$i}b"] != '')){
					if((($student["A{$i}a"] != '') && ($student["A{$i}a"] == ${'response' . $i})) || (($student["A{$i}b"] != '') && ($student["A{$i}b"] == ${'response' . $i}))){
						${'result' . $i} = 1;
						$totalCorrect = ($startingCorrect++) + 1;
						$totalProblems = ($startProblems++) +1; 
						} else {
						${'result' . $i} = 0;
						$totalCorrect = ($startingCorrect) + 0;
						$totalProblems = ($startProblems++) +1;
						}
						}
					
					echo "&nbsp";
					if (($student['result' . $i] != '')){
					if ($student['result' . $i] == 1){
						echo "$i) correct: ";
						echo "&nbsp" ;
						echo $student['response' . $i];
						
					}elseif ($student['result' . $i] == 0){
						echo "$i) incorrect: ";
						echo "&nbsp" ;
						echo $student['response' . $i];

					}
					
					echo "<br/>";
					echo "&nbsp" ;
					echo "<hr/>";				
				}
				
				}
				
				
				
				}
				
?>