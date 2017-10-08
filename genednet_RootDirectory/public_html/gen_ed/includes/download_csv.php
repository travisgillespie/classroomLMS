<?php 
function download_csv($firstName,$lastName,$assType,$title,$attempt,$gradeLevel,$period){
if (isset($_POST['download'])) {
	global $connection;
	$safe_firstName = mysqli_real_escape_string($connection, $firstName);
	$safe_lastName = mysqli_real_escape_string($connection, $lastName);
		$query  = "SELECT firstName, lastName, student_id, score, assType, title, attempt, gradeLevel, period ";
		$query .= "FROM studentStats ";
		$query .= "WHERE id >= 0 ";

		if ($_POST['selectedFirstName'] === ''){
		} elseif ($_POST['selectedFirstName'] === 'all'){
		}else {
			$query .= " AND firstName = '{$safe_firstName}' ";
		}
		
		if ($_POST['selectedLastName'] === ''){
		} elseif ($_POST['selectedLastName'] === 'all'){
		}else {
			$query .= " AND lastName = '{$safe_lastName}' ";
		}

		if ($_POST['selectedAssType'] === ''){
		} elseif ($_POST['selectedAssType'] === 'all'){
		}else {
			$query .= " AND assType = '{$assType}' ";
		}
		
		if ($_POST['selectedTitle'] === ''){
		} elseif ($_POST['selectedTitle'] === 'all'){
		}else {
			$query .= " AND title = '{$title}' ";
		}

		if ($_POST['selectedAttempt'] === ''){
		} elseif ($_POST['selectedAttempt'] === 'all'){
		}else {
			$query .= " AND attempt = '{$attempt}' ";
		}
		
		if ($_POST['selectedGradeLevel'] === ''){
		} elseif ($_POST['selectedGradeLevel'] === 'all'){
		}else {
			$query .= " AND gradeLevel = '{$gradeLevel}' ";
		}
		
		if ($_POST['selectedPeriod'] === ''){
		} elseif ($_POST['selectedPeriod'] === 'all'){
		}else {
			$query .= " AND period = '{$period}' ";
		}

		$query .= "ORDER BY title ASC";

		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);
		header('Content-Type: text/csv');
		header("Content-Disposition: attachment;filename=grades_{$gradeLevel}_{$title}.csv");
		header('Cache-Control: no-cache, no-store, must-revalidate');
		header('Pragma: no-cache');
		header('Expires: 0');
		$csvoutput = fopen('php://output', 'w');
		$student = mysqli_fetch_assoc($student_set);
		$headers = array_keys($student);
		fputcsv($csvoutput, $headers);
		fputcsv($csvoutput, $student);
		while ($student = mysqli_fetch_assoc($student_set)) {
			fputcsv($csvoutput, $student);
		}
		fclose($csvoutput);
		exit;
	}
}
$firstName = $_POST['selectedFirstName'];
$lastName = $_POST['selectedLastName'];
$assType = $_POST['selectedAssType'];
$title = $_POST['selectedTitle'];
$attempt = $_POST['selectedAttempt'];
$gradeLevel = $_POST['selectedGradeLevel'];
$period = $_POST['selectedPeriod'];
download_csv($firstName,$lastName,$assType,$title,$attempt,$gradeLevel,$period);
?>