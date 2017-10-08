<?php require_once("../includes/session.php") ; ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php") ; ?>

<?php
	$loggedInUser_name = mysql_prep($_SESSION["username"]);
	$student_id = mysql_prep(find_student_id($loggedInUser_name));
	$submit = $_POST['submit'];
	$attempt = mysql_prep($_POST['attempt2']);
	$title = mysql_prep($_POST['title2']);
	$lastName = mysql_prep($_POST['lastName']);
	$firstName = mysql_prep($_POST['firstName']);
	$gradeLevel = mysql_prep(find_student_gradeLevel($loggedInUser_name));
	$response = mysql_prep($_POST['response' . $i]);
	$studentResponse = mysql_prep($student["${'response' . $i}"]);
	$startingCorrect = 0;
	$startProblems = 0;

	//reading results from 
	global $connection;
	$query  = "SELECT * ";
	$query .= "FROM studentStats ";
	$query .= "WHERE student_id = '{$student_id}' ";
	$query .= "AND title = '{$title}' ";
	$query .= "AND attempt = '{$attempt}' ";
	$query .= "ORDER BY title ASC";
	$responseFetch = mysqli_query($connection, $query);

	if (!$responseFetch){
		die("db failure.". mysqli_error($connection));
	}

	while ($responseRead = mysqli_fetch_assoc($responseFetch)){		
		for ($i =1; $i <= 100; $i++){
			${'response' . $i} = mysqli_real_escape_string($connection, $responseRead['response' . $i]);
		}
	}

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
		}
		
		}

	}

	$score = (($totalCorrect/$totalProblems)*100);

	global $connection;
	$query  = "UPDATE studentStats SET ";
	$query .= "score = '{$score}', "; 
	$query .= "result1 = '{$result1}', "; 
	$query .= "result2 = '{$result2}', "; 
	$query .= "result3 = '{$result3}', "; 
	$query .= "result4 = '{$result4}', "; 
	$query .= "result5 = '{$result5}', "; 
	$query .= "result6 = '{$result6}', "; 
	$query .= "result7 = '{$result7}', "; 
	$query .= "result8 = '{$result8}', "; 
	$query .= "result9 = '{$result9}', "; 
	$query .= "result10 = '{$result10}', "; 
	$query .= "result11 = '{$result11}', "; 
	$query .= "result12 = '{$result12}', "; 
	$query .= "result13 = '{$result13}', "; 
	$query .= "result14 = '{$result14}', "; 
	$query .= "result15 = '{$result15}', "; 
	$query .= "result16 = '{$result16}', "; 
	$query .= "result17 = '{$result17}', "; 
	$query .= "result18 = '{$result18}', "; 
	$query .= "result19 = '{$result19}', "; 
	$query .= "result20 = '{$result20}', "; 
	$query .= "result21 = '{$result21}', "; 
	$query .= "result22 = '{$result22}', "; 
	$query .= "result23 = '{$result23}', "; 
	$query .= "result24 = '{$result24}', "; 
	$query .= "result25 = '{$result25}', "; 
	$query .= "result26 = '{$result26}', "; 
	$query .= "result27 = '{$result27}', "; 
	$query .= "result28 = '{$result28}', "; 
	$query .= "result29 = '{$result29}', "; 
	$query .= "result30 = '{$result30}', "; 
	$query .= "result31 = '{$result31}', "; 
	$query .= "result32 = '{$result32}', "; 
	$query .= "result33 = '{$result33}', "; 
	$query .= "result34 = '{$result34}', "; 
	$query .= "result35 = '{$result35}', "; 
	$query .= "result36 = '{$result36}', "; 
	$query .= "result37 = '{$result37}', "; 
	$query .= "result38 = '{$result38}', "; 
	$query .= "result39 = '{$result39}', "; 
	$query .= "result40 = '{$result40}', "; 
	$query .= "result41 = '{$result41}', "; 
	$query .= "result42 = '{$result42}', "; 
	$query .= "result43 = '{$result43}', "; 
	$query .= "result44 = '{$result44}', "; 
	$query .= "result45 = '{$result45}', "; 
	$query .= "result46 = '{$result46}', "; 
	$query .= "result47 = '{$result47}', "; 
	$query .= "result48 = '{$result48}', "; 
	$query .= "result49 = '{$result49}', "; 
	$query .= "result50 = '{$result50}', "; 
	$query .= "result51 = '{$result51}', "; 
	$query .= "result52 = '{$result52}', "; 
	$query .= "result53 = '{$result53}', "; 
	$query .= "result54 = '{$result54}', "; 
	$query .= "result55 = '{$result55}', "; 
	$query .= "result56 = '{$result56}', "; 
	$query .= "result57 = '{$result57}', "; 
	$query .= "result58 = '{$result58}', "; 
	$query .= "result59 = '{$result59}', "; 
	$query .= "result60 = '{$result60}', "; 
	$query .= "result61 = '{$result61}', "; 
	$query .= "result62 = '{$result62}', "; 
	$query .= "result63 = '{$result63}', "; 
	$query .= "result64 = '{$result64}', "; 
	$query .= "result65 = '{$result65}', "; 
	$query .= "result66 = '{$result66}', "; 
	$query .= "result67 = '{$result67}', "; 
	$query .= "result68 = '{$result68}', "; 
	$query .= "result69 = '{$result69}', "; 
	$query .= "result70 = '{$result70}', "; 
	$query .= "result71 = '{$result71}', "; 
	$query .= "result72 = '{$result72}', "; 
	$query .= "result73 = '{$result73}', "; 
	$query .= "result74 = '{$result74}', "; 
	$query .= "result75 = '{$result75}', "; 
	$query .= "result76 = '{$result76}', "; 
	$query .= "result77 = '{$result77}', "; 
	$query .= "result78 = '{$result78}', "; 
	$query .= "result79 = '{$result79}', "; 
	$query .= "result80 = '{$result80}', "; 
	$query .= "result81 = '{$result81}', "; 
	$query .= "result82 = '{$result82}', "; 
	$query .= "result83 = '{$result83}', "; 
	$query .= "result84 = '{$result84}', "; 
	$query .= "result85 = '{$result85}', "; 
	$query .= "result86 = '{$result86}', "; 
	$query .= "result87 = '{$result87}', "; 
	$query .= "result88 = '{$result88}', "; 
	$query .= "result89 = '{$result89}', "; 
	$query .= "result90 = '{$result90}', "; 
	$query .= "result91 = '{$result91}', "; 
	$query .= "result92 = '{$result92}', "; 
	$query .= "result93 = '{$result93}', "; 
	$query .= "result94 = '{$result94}', "; 
	$query .= "result95 = '{$result95}', "; 
	$query .= "result96 = '{$result96}', "; 
	$query .= "result97 = '{$result97}', "; 
	$query .= "result98 = '{$result98}', "; 
	$query .= "result99 = '{$result99}', "; 
	$query .= "result100 = '{$result100}' ";

	$query .= "WHERE title = '{$title}' ";
	$query .= "AND attempt = '{$attempt}' ";
	$query .= "AND username = '{$loggedInUser_name}' ";
	$query .= "AND student_id = '{$student_id}' ";
	$query .= "AND gradeLevel = '{$gradeLevel}' ";

	$response = mysqli_query($connection, $query);

	if ($response){
		echo "success";
	} else {
		die("Database query failed. " . mysqli_error($connection));
	}
?>