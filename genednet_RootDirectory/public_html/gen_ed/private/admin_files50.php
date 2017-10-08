<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/functions.php") ; ?>
<?php //require_once("personalStatsUpdate.php") ; ?>
<?php require_once("form_adminFiles50.php") ; ?>
<?php confirm_logged_in_admin(); ?>





<?php 	if (isset($_POST['createAssignment'])) {
			include("admin_createAssignment.php");
			}
?>

<?php
global $connection;
		


$loggedInUser_name = mysql_prep($_SESSION["username"]);
$student_id = mysql_prep(find_student_id($loggedInUser_name));
//$title = mysql_prep($_POST['title']);
//$attempt = $_POST['attempt'];
$score = mysql_prep($_POST['score']);
$response = mysql_prep($_POST['response' . $i]);
$studentResponse = mysql_prep($student["${'response' . $i}"]);
$startingCorrect = 0;
$startProblems = 0;
$totalIncorrect = $totalProblems - $totalCorrect ;

for ($i =1; $i <= 100; $i++){
${'response' . $i} = mysqli_real_escape_string($connection, $_POST['response' . $i]);
}
//$firstName = $_POST['selectedFirstName'];
//$lastName = $_POST['selectedLastName'];
$assType = $_POST['assType'];
$title = $_POST['title'];
$attempt = $_POST['attempt'];
$gradeLevel = $_POST['gradeLevel'];
$period = $_POST['period'];

$studentName = explode(' ',$_POST['studentName']);

//echo "{$studentName[0]}" . " "  . "{$studentName[1]} ";
//echo "{$assType}";
		$safe_student_id = mysqli_real_escape_string($connection, $student_id);
		$safe_firstName = mysqli_real_escape_string($connection, $studentName[0]);
$safe_lastName = mysqli_real_escape_string($connection, $studentName[1]);
		$query  = "SELECT * ";
		$query .= "FROM studentStats ";
		$query .= "WHERE id >= 0 ";

		if ($safe_firstName === ''){
		} elseif ($safe_firstName === 'all'){
		}else {
			$query .= " AND firstName = '{$safe_firstName}' ";
		}
		
		if ($safe_lastName === ''){
		} elseif ($safe_lastName === 'all'){
		}else {
			$query .= " AND lastName = '{$safe_lastName}' ";
		}

		if ($_POST['assType'] === ''){
		} elseif ($_POST['assType'] === 'all'){
		}else {
			$query .= " AND assType = '{$assType}' ";
		}
		
		if ($_POST['title'] === ''){
		} elseif ($_POST['title'] === 'all'){
		}else {
			$query .= " AND title = '{$title}' ";
		}

		if ($_POST['attempt'] === ''){
		} elseif ($_POST['attempt'] === 'all'){
		}else {
			$query .= " AND attempt = '{$attempt}' ";
		}
		
		if ($_POST['gradeLevel'] === ''){
		} elseif ($_POST['gradeLevel'] === 'all'){
		}else {
			$query .= " AND gradeLevel = '{$gradeLevel}' ";
		}
		
		if ($_POST['period'] === ''){
		} elseif ($_POST['period'] === 'all'){
		}else {
			$query .= " AND period = '{$period}' ";
		}
		
		$query .= "ORDER BY title ASC";
		
	
		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);
	

			
		if (!$student_set){
				die("db failure.". mysqli_error($connection));
			}
			
			
			
			
			
			
			
			
			while ($student = mysqli_fetch_assoc($student_set)){
?>

				<h2><?php echo $student["firstName"] . " " . $student["lastName"]; ?></h2>

				    
				
<table border="1">
	<tr>
		<td><?php echo "Title"; ?></td>
		<td><?php echo "Score"; ?></td>
		<td><?php echo "Attempt"; ?></td>
		<td><?php echo "Student ID"; ?></td>
	</tr>
	<tr style="text-align: center; font-size: 10pt; height: 20px;" >
		<td><?php echo $student["title"] ; ?></td>
		<td><?php echo $student["score"] . " " . "%" ; ?></td>
		<td><?php echo $student["attempt"] ; ?></td>
		<td><?php echo $student["student_id"] ; ?></td>
	</tr>
</table> 
				    
				    
				    
				    
				    
				    
				    
				    
				    
				    
				
				<?php
				echo "<hr/>";
								
				for ($i=1; $i <= 150; $i++ ){
				
				
								
				if (($student["A{$i}a"] != '') || ($student["A{$i}b"] != '')){
					if((($student["A{$i}a"] != '') && ($student["A{$i}a"] === ${'response' . $i})) || (($student["A{$i}b"] != '') && ($student["A{$i}b"] === ${'response' . $i}))){
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