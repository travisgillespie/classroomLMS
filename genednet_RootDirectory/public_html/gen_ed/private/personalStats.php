<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 
//read files
echo "<hr/>";
echo "COMPLETE personal stat created now let's read the files back ";
echo "answer key read,";
echo "<br/>";
<?php
if ((isset($_POST['title']) && logged_in_student_m6()) || (isset($_POST['title']) && logged_in_student_m8() )) { ?>   
  <?php  
    	$title = $_POST['title']; 
//function files50_answer_key($title) {
	global $connection;
	$query  = "SELECT * ";
	$query .= "FROM files50 ";
	$QUERY .= "WHERE title = $title ";
	$query .= "ORDER BY title ASC";
	$files50 = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($files50)){
		if ($title === $row['title']){
			echo $row['title'];
		}
	}
	}

echo "<hr/>";
echo "COMPLETE all personal stats read back";
echo "<br/>";
function find_studentStats() {
	global $connection;
	$query  = "SELECT * ";
	$query .= "FROM studentStats ";
	$query .= "ORDER BY title ASC";
	$files50 = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($files50)) {
		var_dump($row);
		echo "<hr/>";
	}
	}
//find_studentStats();


echo "<hr/>";
echo "IN-PROGRESS try and match the titles of file25_answer_key and the single stat that was just submitted";
$titlePost = $_POST['title'];
$title25 = $row['title'];
echo "<br/>";

//calculate responses
echo "<hr/>";
echo "now it's time to read student responses";
echo "<br/>";
//while $row['answer$i'] != "" {do the caluclation on the next line}
//if $_POST['response$i'] === $row['answer1']{echo "do some math";}

echo "<hr/>";
echo "student responses read, now it's time to calculate responses if... filename, gradeLevel match up, and an actual response exist";
echo "<br/>";

//update studentStats where id = ...
echo "<hr/>";
echo "student responses have been calculated... now it's time to updatae studentStats";
echo "<br/>";

?>