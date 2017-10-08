<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php") ; ?>
<?php

// INITIAL VARIABLES
// if student_id && title are the same auto_incriment $attempt
$submit = $_POST['submit'];
$attempt = $_POST['attempt'];
$assType = mysql_prep($_POST['assType']);
$title = mysql_prep($_POST['title']);
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$username = mysql_prep($_POST['username']);
$gradeLevel = mysql_prep($_POST['gradeLevel']);
$student_id = mysql_prep($_POST['studentID']);
$period = mysql_prep($_POST['period']);
$startingCorrect = 0;
$startProblems = 0;
//auto incriment response$i if it has a form field
for ($i =1; $i <= 100; $i++){
${'response' . $i} = mysqli_real_escape_string($connection, $_POST['response' . $i]);
}


//SELECT now read the ANSWER KEY by doing a query  SELECT from responseKey
//then auto generate 1's or 0's based on result and insert them into the mysql injection below using {result$i}
global $connection;
			$query  = "SELECT * ";
			$query .= "FROM files50 ";
			$query .= "WHERE title = '{$title}' ";
			$query .= "AND gradeLevel = '{$gradeLevel}' ";
			$query .= "ORDER BY title ASC";
			$answerKey = mysqli_query($connection, $query);
			if (!$answerKey){
				die("db failure.". mysqli_error($connection));
			}
			
			while ($row = mysqli_fetch_assoc($answerKey)){
			echo "&nbsp" ;
				echo $row["title"];
				echo "&nbsp";
				echo "<br/>";
				echo "Attempt: ";
				echo "<hr/>";
				
				
				echo "&nbsp";
				echo "Number of Problems Correct = $totalCorrect";
				echo "<br/>";
				echo "&nbsp";
				echo "Total Number of Problems =  $totalProblems";
				echo "<br/>";
				echo "&nbsp";
				echo "Final Score = $score" . "%";
				echo "<hr/>";
				
				
				for ($i=1; $i <= 150; $i++ ){
				if (($row["A{$i}a"] != '') || ($row["A{$i}b"] != '')){
					if((($row["A{$i}a"] != '') && ($row["A{$i}a"] == ${'response' . $i})) || (($row["A{$i}b"] != '') && ($row["A{$i}b"] == ${'response' . $i}))){
						${'result' . $i} = 1;
						$totalCorrect = ($startingCorrect++) + 1;
						$totalProblems = ($startProblems++) +1; 
						} else {
						${'result' . $i} = 0;
						$totalCorrect = ($startingCorrect) + 0;
						$totalProblems = ($startProblems++) +1;
						}
							echo "&nbsp";
					if ((${'result' . $i}) == 1){
						echo "$i) correct: ";
						echo "&nbsp" ;
						echo "${'response' . $i}";
						
					}elseif ((${'result' . $i}) == 0){
						echo "$i) incorrect: ";
						echo "&nbsp" ;
						echo "${'response' . $i}";
					}
					echo "<br/>";
					echo "&nbsp" ;
					echo "<hr/>";	
					
				}
				
				}
				echo "&nbsp";
				echo "Number of Problems Correct = $totalCorrect";
				echo "<br/>";
				echo "&nbsp";
				echo "Total Number of Problems =  $totalProblems";
				echo "<br/>";
			}

//calculate $score at the same time
//$score = $totalCorrect/$totalProblems ;
$score = (($totalCorrect/$totalProblems)*100);
echo "&nbsp";
echo "Final Score = $score" . "%";
echo "<hr/>";



//INSERT WILL BECOME A FUNCTION OR WHATEVER YOU DO A CREATE SECTION AFTER YOU HIT POST
//cross reference responses w/ key... and calculate the grade
global $connection;
$safe_firstName = mysqli_real_escape_string($connection, $firstName);
$safe_lastName = mysqli_real_escape_string($connection, $lastName);
$query  = "INSERT INTO studentStats( ";
$query .= " firstName, lastName, student_id, score, assType, title, attempt, username, gradeLevel, period, id, response1, result1, response2, result2, response3, result3, response4, result4, response5, result5, response6, result6, response7, result7, response8, result8, response9, result9, response10, result10, response11, result11, response12, result12, response13, result13, response14, result14, response15, result15, response16, result16, response17, result17, response18, result18, response19, result19, response20, result20, response21, result21, response22, result22, response23, result23, response24, result24, response25, result25, response26, result26, response27, result27, response28, result28, response29, result29, response30, result30, response31, result31, response32, result32, response33, result33, response34, result34, response35, result35, response36, result36, response37, result37, response38, result38, response39, result39, response40, result40, response41, result41, response42, result42, response43, result43, response44, result44, response45, result45, response46, result46, response47, result47, response48, result48, response49, result49, response50, result50, response51, result51, response52, result52, response53, result53, response54, result54, response55, result55, response56, result56, response57, result57, response58, result58, response59, result59, response60, result60, response61, result61, response62, result62, response63, result63, response64, result64, response65, result65, response66, result66, response67, result67, response68, result68, response69, result69, response70, result70, response71, result71, response72, result72, response73, result73, response74, result74, response75, result75, response76, result76, response77, result77, response78, result78, response79, result79, response80, result80, response81, result81, response82, result82, response83, result83, response84, result84, response85, result85, response86, result86, response87, result87, response88, result88, response89, result89, response90, result90, response91, result91, response92, result92, response93, result93, response94, result94, response95, result95, response96, result96, response97, result97, response98, result98, response99, result99, response100, result100";
$query .= ") VALUES (" ;
$query .= " '{$safe_firstName}', '{$safe_lastName}', {$student_id}, {$score}, '{$assType}', '{$title}', {$attempt}, '{$username}', '{$gradeLevel}', {$period}, '', '{$response1}', '{$result1}', '{$response2}' , '{$result2}' , '{$response3}' , '{$result3}' , '{$response4}' , '{$result4}' , '{$response5}' , '{$result5}' , '{$response6}' , '{$result6}' , '{$response7}' , '{$result7}' , '{$response8}' , '{$result8}' , '{$response9}' , '{$result9}' , '{$response10}' , '{$result10}' , '{$response11}' , '{$result11}' , '{$response12}' , '{$result12}' , '{$response13}' , '{$result13}' , '{$response14}' , '{$result14}' , '{$response15}' , '{$result15}' , '{$response16}' , '{$result16}' , '{$response17}' , '{$result17}' , '{$response18}' , '{$result18}' , '{$response19}' , '{$result19}' , '{$response20}' , '{$result20}' , '{$response21}' , '{$result21}' , '{$response22}' , '{$result22}' , '{$response23}' , '{$result23}' , '{$response24}' , '{$result24}' , '{$response25}' , '{$result25}' , '{$response26}' , '{$result26}' , '{$response27}' , '{$result27}' , '{$response28}' , '{$result28}' , '{$response29}' , '{$result29}' , '{$response30}' , '{$result30}' , '{$response31}' , '{$result31}' , '{$response32}' , '{$result32}' , '{$response33}' , '{$result33}' , '{$response34}' , '{$result34}' , '{$response35}' , '{$result35}' , '{$response36}' , '{$result36}' , '{$response37}' , '{$result37}' , '{$response38}' , '{$result38}' , '{$response39}' , '{$result39}' , '{$response40}' , '{$result40}' , '{$response41}' , '{$result41}' , '{$response42}' , '{$result42}' , '{$response43}' , '{$result43}' , '{$response44}' , '{$result44}' , '{$response45}' , '{$result45}' , '{$response46}' , '{$result46}' , '{$response47}' , '{$result47}' , '{$response48}' , '{$result48}' , '{$response49}' , '{$result49}' , '{$response50}' , '{$result50}' , '{$response51}' , '{$result51}' , '{$response52}' , '{$result52}' , '{$response53}' , '{$result53}' , '{$response54}' , '{$result54}' , '{$response55}' , '{$result55}' , '{$response56}' , '{$result56}' , '{$response57}' , '{$result57}' , '{$response58}' , '{$result58}' , '{$response59}' , '{$result59}' , '{$response60}' , '{$result60}' , '{$response61}' , '{$result61}' , '{$response62}' , '{$result62}' , '{$response63}' , '{$result63}' , '{$response64}' , '{$result64}' , '{$response65}' , '{$result65}' , '{$response66}' , '{$result66}' , '{$response67}' , '{$result67}' , '{$response68}' , '{$result68}' , '{$response69}' , '{$result69}' , '{$response70}' , '{$result70}' , '{$response71}' , '{$result71}' , '{$response72}' , '{$result72}' , '{$response73}' , '{$result73}' , '{$response74}' , '{$result74}' , '{$response75}' , '{$result75}' , '{$response76}' , '{$result76}' , '{$response77}' , '{$result77}' , '{$response78}' , '{$result78}' , '{$response79}' , '{$result79}' , '{$response80}' , '{$result80}' , '{$response81}' , '{$result81}' , '{$response82}' , '{$result82}' , '{$response83}' , '{$result83}' , '{$response84}' , '{$result84}' , '{$response85}' , '{$result85}' , '{$response86}' , '{$result86}' , '{$response87}' , '{$result87}' , '{$response88}' , '{$result88}' , '{$response89}' , '{$result89}' , '{$response90}' , '{$result90}' , '{$response91}' , '{$result91}' , '{$response92}' , '{$result92}' , '{$response93}' , '{$result93}' , '{$response94}' , '{$result94}' , '{$response95}' , '{$result95}' , '{$response96}' , '{$result96}' , '{$response97}' , '{$result97}' , '{$response98}' , '{$result98}' , '{$response99}' , '{$result99}' , '{$response100}' , '{$result100}' ";
$query .= ")";

$response = mysqli_query($connection, $query);

if ($response){
redirect_to("../public/index.php?page=4");




} else {
die("Database query failed. " . mysqli_error($connection));
}

?>