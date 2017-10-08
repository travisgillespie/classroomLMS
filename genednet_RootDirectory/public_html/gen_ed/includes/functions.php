<?php
	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit;
	}
	
	function mysql_prep($string) {
		global $connection;
		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}
	
	function confirm_query($result_set) {
	// Test if there was a query error
		if (!$result_set) {
			die("Database query failed.");
		}
	}
	
	function form_errors($errors=array()) {
	$output = "";
	if (!empty($errors)) {
	  $output .= "<div class=\"error\">";
	  $output .= "Please fix the following errors:";
	  $output .= "<ul>";
	  foreach ($errors as $key => $error) {
	    $output .= "<li>";
	    $output .= htmlentities($error);
	    $output .= "</li>";
	  }
	  $output .= "</ul>";
	  $output .= "</div>";
	}
	return $output;
}

	function form_errorsCreateAccount($errorsLogin=array()) {
	$output = "";
	if (!empty($errors)) {
	  $output .= "<div id=\"errorCreateAccount\">";
	  $output .= "Please fix the following errors:";
	  $output .= "<ul>";
	  foreach ($errors as $key => $error) {
	    $output .= "<li>";
	    $output .= htmlentities($error);
	    $output .= "</li>";
	  }
	  $output .= "</ul>";
	  $output .= "</div>";
	}
	return $output;
}
	
	function find_all_admins(){
		global $connection;
			$query  = "SELECT * ";
			$query .= "FROM admins ";
			$query .= "ORDER BY username ASC";
			$admin_set = mysqli_query($connection, $query);
			confirm_query($admin_set);
			return $admin_set;
	}
	
	function find_all_students(){
		global $connection;
			$query  = "SELECT * ";
			$query .= "FROM students ";
			$query .= "ORDER BY username ASC";
			$student_set = mysqli_query($connection, $query);
			confirm_query($student_set);
			return $student_set;
	}	

	function find_menuBar_by_id($menuBar_id, $public = true) {
		// 2. Perform database query
			global $connection;
			
			$safe_menuBar_id = mysqli_real_escape_string($connection, $menuBar_id);
			
			$query  = "SELECT * ";
			$query .= "FROM menuBar ";
			$query .= "WHERE id = {$safe_menuBar_id} ";
			if ($public) {
				$query .= "AND visible = 1 ";
			}
			$query .= "LIMIT 1";
			$menuBar_set = mysqli_query($connection, $query);
			// Test if there was a query error... confirm query is located in the functions.php file
			confirm_query($menuBar_set);
			if($menuBar = mysqli_fetch_assoc($menuBar_set)) {
				return $menuBar;
			} else {
				return null;
			}
	}
	
	function find_page_by_id($page_id, $public = true) {
		// 2. Perform database query
			global $connection;
			
			$safe_page_id = mysqli_real_escape_string($connection, $page_id);
			
			$query  = "SELECT * ";
			$query .= "FROM page ";
			$query .= "WHERE id = {$safe_page_id} ";
			if ($public) {
				$query .= "AND visible = 1 ";
			}
			$query .= "LIMIT 1";
			$page_set = mysqli_query($connection, $query);
			// Test if there was a query error... confirm query is located in the functions.php file
			confirm_query($page_set);
			if($page = mysqli_fetch_assoc($page_set)) {
				return $page;
			} else {
				return null;
			}
	}
	
	function find_admin_by_id($admin_id){
		global $connection;
			
		$safe_admin_id = mysqli_real_escape_string($connection, $admin_id);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE id = {$safe_admin_id} ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
	}
	
	function find_student_by_id($student_set){
		global $connection;
			
		$safe_student_id = mysqli_real_escape_string($connection, $student_id);
		
		$query  = "SELECT * ";
		$query .= "FROM students ";
		$query .= "WHERE id = {$safe_student_id} ";
		$query .= "LIMIT 1";
		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);
		if($student = mysqli_fetch_assoc($student_set)) {
			return $student;
		} else {
			return null;
		}
	}
	
	function find_student_by_username($username) {
		global $connection;
		$safe_username = mysqli_real_escape_string($connection, $username);
		$query  = "SELECT * ";
		$query .= "FROM students ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);
		if($student = mysqli_fetch_assoc($student_set)) {
			return $student["firstName"] . " " . $student["lastName"];		
		} else {
			return null;
		}
	}
	
	
	function find_admin_by_username($username) {
		global $connection;
			
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin["firstName"] . " " . $admin["lastName"];
		} else {
			return null;
		}
	}
		
	function find_student_by_username_m6($username) {
		global $connection;
			
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM students ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "AND gradeLevel = 'm6 ' ";
		$query .= "LIMIT 1";
		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);
		if($student = mysqli_fetch_assoc($student_set)) {
			return $student;
		} else {
			return null;
		}
		}
		
	function find_student_by_username_m8($username) {
		global $connection;
			
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM students ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "AND gradeLevel = 'm8' ";
		$query .= "LIMIT 1";
		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);
		if($student = mysqli_fetch_assoc($student_set)) {
			return $student;
		} else {
			return null;
		}
		}
	
		function find_admin_by_username_admin($username) {
		global $connection;
			
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
	}
	
	
	
	function find_student_id($username) {
		global $connection;
		$safe_username = mysqli_real_escape_string($connection, $username);
		$query  = "SELECT * ";
		$query .= "FROM students ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);
		if($student = mysqli_fetch_assoc($student_set)) {
			return $student["student_id"];		
		} else {
			return null;
		}
	}
	
	function find_student_firstName($username) {
		global $connection;
		$safe_username = mysqli_real_escape_string($connection, $username);
		$query  = "SELECT * ";
		$query .= "FROM students ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);
		if($student = mysqli_fetch_assoc($student_set)) {
			return $student["firstName"];		
		} else {
			return null;
		}
	}
	
	function find_student_lastName($username) {
		global $connection;
		$safe_username = mysqli_real_escape_string($connection, $username);
		$query  = "SELECT * ";
		$query .= "FROM students ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);
		if($student = mysqli_fetch_assoc($student_set)) {
			return $student["lastName"];		
		} else {
			return null;
		}
	}
	
	function find_student_period($username) {
		global $connection;
		$safe_username = mysqli_real_escape_string($connection, $username);
		$query  = "SELECT * ";
		$query .= "FROM students ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);
		if($student = mysqli_fetch_assoc($student_set)) {
			return $student['period'];		
		} else {
			return null;
		}
	}
	
	function find_student_gradeLevel($username) {
		global $connection;
		$safe_username = mysqli_real_escape_string($connection, $username);
		$query  = "SELECT * ";
		$query .= "FROM students ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$student_set = mysqli_query($connection, $query);
		confirm_query($student_set);
		if($student = mysqli_fetch_assoc($student_set)) {
			return $student["gradeLevel"];		
		} else {
			return null;
		}
	}

	function find_all_menuBar($public = true) {
		// 2. Perform database query
			global $connection;
			$query  = "SELECT * ";
			$query .= "FROM menuBar ";
			if ($public) {
				$query .= "WHERE visible = 1 ";
			}
			$query .= "ORDER BY position ASC";
			$menuBar_set = mysqli_query($connection, $query);
			// Test if there was a query error... confirm query is located in the functions.php file
			confirm_query($menuBar_set);
			return $menuBar_set;
	}
	
	function find_menubar_public($public = true) {
	// 2. Perform database query
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM menuBar ";
		$query .= "WHERE menu_name != 'Assignments' ";
		$query .= "AND menu_name != 'Admin' ";
		if ($public) {
			$query .= "AND visible = 1 ";
		}
		$query .= "ORDER BY position ASC";
		$menuBar_set = mysqli_query($connection, $query);
		// Test if there was a query error... confirm query is located in the functions.php file
		confirm_query($menuBar_set);
		return $menuBar_set;
	}
	
	function find_menuBar_m6($public = true) {
		// 2. Perform database query
			global $connection;
			$query  = "SELECT * ";
			$query .= "FROM menuBar ";
			$query .= "WHERE menu_name != 'Admin' ";
			$query .= "AND visible = 1 ";
			$query .= "ORDER BY position ASC";
			$menuBar_set = mysqli_query($connection, $query);
			// Test if there was a query error... confirm query is located in the functions.php file
			confirm_query($menuBar_set);
			return $menuBar_set;
	}

	function find_menuBar_m8($public = true) {
	// 2. Perform database query
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM menuBar ";
		$query .= "WHERE menu_name != 'Admin' ";
		$query .= "AND visible = 1 ";
		$query .= "ORDER BY position ASC";
		$menuBar_set = mysqli_query($connection, $query);
		// Test if there was a query error... confirm query is located in the functions.php file
		confirm_query($menuBar_set);
		return $menuBar_set;
	}
	
	function find_menuBar_admin($public = true) {
	// 2. Perform database query
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM menuBar ";
		$query .= "WHERE visible = 1 ";
		$query .= "ORDER BY position ASC";
		$menuBar_set = mysqli_query($connection, $query);
		// Test if there was a query error... confirm query is located in the functions.php file
		confirm_query($menuBar_set);
		return $menuBar_set;
	}
	
	
	function find_page_for_menuBar($menuBar_id, $public = true) {
		// 2. Perform database query
			global $connection;
			
			$safe_menuBar_id = mysqli_real_escape_string($connection, $menuBar_id);
			
			$query  = "SELECT * ";
			$query .= "FROM page ";
			$query .= "WHERE menuBar_id = {$safe_menuBar_id} ";
			if ($public) {
				$query .= "AND visible = 1 ";
			}
			$query .= "ORDER BY position ASC";
			$page_set = mysqli_query($connection, $query);
			// Test if there was a query error... confirm query is located in the functions.php file
			confirm_query($page_set);
			return $page_set;
	} //DELETE MAYBE ???
	
	function find_page_for_menuBar_public($menuBar_id, $public = true) {
		// 2. Perform database query
			global $connection;
			
			$safe_menuBar_id = mysqli_real_escape_string($connection, $menuBar_id);
			
			$query  = "SELECT * ";
			$query .= "FROM page ";
			$query .= "WHERE menuBar_id = {$safe_menuBar_id} ";
			$query .= "AND gradeLevel != 'm6' ";
			$query .= "AND gradeLevel != 'm8' ";
			$query .= "AND gradeLevel != 'all' ";
			$query .= "AND gradeLevel != 'admin31' ";
			$query .= "AND gradeLevel != 'xcode' ";
			if ($public) {
				$query .= "AND visible = 1 ";
			}
			$query .= "ORDER BY position ASC";
			$page_set = mysqli_query($connection, $query);
			// Test if there was a query error... confirm query is located in the functions.php file
			confirm_query($page_set);
			return $page_set;
	}
	
	function find_page_for_menuBar_m6($menuBar_id, $public = true) {
		// 2. Perform database query
			global $connection;
			
			$safe_menuBar_id = mysqli_real_escape_string($connection, $menuBar_id);
			
			$query  = "SELECT * ";
			$query .= "FROM page ";
			$query .= "WHERE menuBar_id = {$safe_menuBar_id} ";
			$query .= "AND gradeLevel != 'm8' ";
			$query .= "AND gradeLevel != 'admin31' ";
			if ($public) {
				$query .= "AND visible = 1 ";
			}
			$query .= "ORDER BY position ASC";
			$page_set = mysqli_query($connection, $query);
			// Test if there was a query error... confirm query is located in the functions.php file
			confirm_query($page_set);
			return $page_set;
	}
	
	function find_page_for_menuBar_m8($menuBar_id, $public = true) {
		// 2. Perform database query
			global $connection;
			
			$safe_menuBar_id = mysqli_real_escape_string($connection, $menuBar_id);
			
			$query  = "SELECT * ";
			$query .= "FROM page ";
			$query .= "WHERE menuBar_id = {$safe_menuBar_id} ";
			$query .= "AND gradeLevel != 'm6' ";
			$query .= "AND gradeLevel != 'admin31' ";
			if ($public) {
				$query .= "AND visible = 1 ";
			}
			$query .= "ORDER BY position ASC";
			$page_set = mysqli_query($connection, $query);
			// Test if there was a query error... confirm query is located in the functions.php file
			confirm_query($page_set);
			return $page_set;
	}
	
	function find_page_for_menuBar_admin($menuBar_id, $public = true) {
		// 2. Perform database query
			global $connection;
			
			$safe_menuBar_id = mysqli_real_escape_string($connection, $menuBar_id);
			$query  = "SELECT * ";
			$query .= "FROM page ";
			$query .= "WHERE menuBar_id = {$safe_menuBar_id} ";
			$query .= "AND gradeLevel != 'm6' ";
			$query .= "AND gradeLevel != 'm8' ";
			$query .= "AND visible = 1 ";
			$query .= "ORDER BY position ASC";
			$page_set = mysqli_query($connection, $query);
			// Test if there was a query error... confirm query is located in the functions.php file
			confirm_query($page_set);
			return $page_set;
	}
	
	
	
	
	
	
	
	
	
	
	

	
	function find_default_page_for_menuBar($menuBar_id) {		
		$page_set_m6 = find_page_for_menuBar_m6($menuBar_id);
		$page_set_m8 = find_page_for_menuBar_m8($menuBar_id);
		$page_set_admin = find_page_for_menuBar_admin($menuBar_id);
		
		if (logged_in_student_m6()) {
		
				if($first_page = mysqli_fetch_assoc($page_set_m6)) {
						return $first_page;
					} else {
						return null;
					}
		} elseif (logged_in_student_m8()) {	
				if($first_page = mysqli_fetch_assoc($page_set_m8)) {
						return $first_page;
					} else {
						return null;
					}
		} elseif (logged_in_admin()) {	
				if($first_page = mysqli_fetch_assoc($page_set_admin)) {
						return $first_page;
					} else {
						return null;
					}

		}			
			
	} //DELETE NO
	
	function find_default_page_for_menuBar_public($menuBar_id) {
		$page_set = find_page_for_menuBar_public($menuBar_id);
		
		if($first_page = mysqli_fetch_assoc($page_set)) {
				return $first_page;
			} else {
				return null;
			}
	}

	function find_default_page_for_menuBar_m6($menuBar_id) {
		$page_set = find_page_for_menuBar_m6($menuBar_id);
		
		if($first_page = mysqli_fetch_assoc($page_set)) {
				return $first_page;
			} else {
				return null;
			}
	}
	
	function find_default_page_for_menuBar_m8($menuBar_id) {
		$page_set = find_page_for_menuBar_m8($menuBar_id);
		
		if($first_page = mysqli_fetch_assoc($page_set)) {
				return $first_page;
			} else {
				return null;
			}
	}
	
		function find_default_page_for_menuBar_admin($menuBar_id) {
		$page_set = find_page_for_menuBar_admin($menuBar_id);
		
		if($first_page = mysqli_fetch_assoc($page_set)) {
				return $first_page;
			} else {
				return null;
			}
	}
	
	function find_selected_page($public = false){
		global $current_menuBar;
		global $current_page;
		
		if (isset($_GET["menuBar"])) {
			$current_menuBar = find_menuBar_by_id($_GET["menuBar"], $public);
			if ($current_menuBar && $public) {
				$current_page = find_default_page_for_menuBar($current_menuBar["id"]);
			} else {
				$current_page = null;
			}
		} elseif (isset($_GET["page"])) {
			$current_page = find_page_by_id($_GET["page"], $public);
			$current_menuBar = null;
		} else {
			$current_menuBar = null;
			$current_page = null;
		}
	}
	
	
	
	// PLACE formAssignments Function here
	
      	
	//navigation takes 2 arguments
	//-the current menuBar or null
	//-the current page or null
	function navigation($menuBar_array, $page_array) {
		$output = "<ul class=\"menuBar\">";
		$menuBar_set = find_all_menuBar(false);
		while($menuBar = mysqli_fetch_assoc($menuBar_set)) {
			$output .= "<li";
			if ($menuBar_array && $menuBar["id"] == $menuBar_array["id"]) {
				$output .= " class=\"selected\"";
			}
			$output .= ">";
			$output .= "<a href=\"manage_content.php?menuBar=";
			$output .= urlencode($menuBar["id"]);
			$output .= "\">";
			$output .= htmlentities($menuBar["menu_name"]);
			$output .= "</a>";
			
			$page_set = find_page_for_menuBar_admin($menuBar["id"], false);
			$output .= "<ul class=\"page\">";
			while($page = mysqli_fetch_assoc($page_set)) {
				$output .= "<li";
				if ($page_array && $page["id"] == $page_array["id"]) {
					$output .= " class=\"selected\"";
				}
				$output .= ">";
				$output .= "<a href=\"manage_content.php?page=";
				$output .= urlencode($page["id"]);
				$output .= "\">";
				$output .= htmlentities($page["menu_name"]);
				$output .= "</a></li>";
			}
			mysqli_free_result($page_set);
			$output .= "</ul></li>";
		}
		mysqli_free_result($menuBar_set);
		$output .= "</ul>";
		return $output;	}

	function navigation_public($menuBar_array, $page_array) {
		$output = "<ul class=\"menuBar\">";
		$menuBar_set = find_menubar_public();
		while($menuBar = mysqli_fetch_assoc($menuBar_set)) {
			$output .= "<li";
			if ($menuBar_array && $menuBar["id"] == $menuBar_array["id"]) {
				$output .= " class=\"selected\"";
			}
			$output .= ">";
			$output .= "<a href=\"../public/index.php?menuBar=";
			$output .= urlencode($menuBar["id"]);
			$output .= "\">";
			$output .= htmlentities($menuBar["menu_name"]);
			$output .= "</a>";
			
			if($menuBar_array["id"] == $menuBar["id"] || $page_array["menuBar_id"] == $menuBar["id"]) {
				$page_set = find_page_for_menuBar_public($menuBar["id"]);
				$output .= "<ul class=\"page\">";
				while($page = mysqli_fetch_assoc($page_set)) {
					$output .= "<li";
					if ($page_array && $page["id"] == $page_array["id"]) {
						$output .= " id=\"selected\""; //i changed class to id on this line so selected links will highilghtj
					}
					$output .= ">";
					$output .= "<a href=\"../public/index.php?page=";
					$output .= urlencode($page["id"]);
					$output .= "\">";
					$output .= htmlentities($page["menu_name"]);
					$output .= "</a></li><br />";
				}
				$output .= "</ul>";
				mysqli_free_result($page_set);
			}
			$output .= "</li>"; // end of menubar link
		}
		mysqli_free_result($menuBar_set);
		$output .= "</ul>";
		return $output;	}
		
	function navigation_m6($menuBar_array, $page_array) {
		$output = "<ul class=\"menuBar\">";
		$menuBar_set = find_menuBar_m6();
		while($menuBar = mysqli_fetch_assoc($menuBar_set)) {
			$output .= "<li";
			if ($menuBar_array && $menuBar["id"] == $menuBar_array["id"]) {
				$output .= " class=\"selected\"";
			}
			$output .= ">";
			$output .= "<a href=\"index.php?menuBar=";
			$output .= urlencode($menuBar["id"]);
			$output .= "\">";
			$output .= htmlentities($menuBar["menu_name"]);
			$output .= "</a>";
			
			if($menuBar_array["id"] == $menuBar["id"] || $page_array["menuBar_id"] == $menuBar["id"]) {
				$page_set = find_page_for_menuBar_m6($menuBar["id"]);
				$output .= "<ul class=\"page\">";
				while($page = mysqli_fetch_assoc($page_set)) {
					$output .= "<li";
					if ($page_array && $page["id"] == $page_array["id"]) {
						$output .= " id=\"selected\""; //i changed class to id on this line so selected links will highilghtj
					}
					$output .= ">";
					$output .= "<a href=\"index.php?page=";
					$output .= urlencode($page["id"]);
					$output .= "\">";
					$output .= htmlentities($page["menu_name"]);
					$output .= "</a></li><br />";
				}
				$output .= "</ul>";
				mysqli_free_result($page_set);
			}
			$output .= "</li>"; // end of menubar link
		}
		mysqli_free_result($menuBar_set);
		$output .= "</ul>";
		return $output;	}
	
	function navigation_m8($menuBar_array, $page_array) {
		$output = "<ul class=\"menuBar\">";
		$menuBar_set = find_menuBar_m8();
		while($menuBar = mysqli_fetch_assoc($menuBar_set)) {
			$output .= "<li";
			if ($menuBar_array && $menuBar["id"] == $menuBar_array["id"]) {
				$output .= " class=\"selected\"";
			}
			$output .= ">";
			$output .= "<a href=\"index.php?menuBar=";
			$output .= urlencode($menuBar["id"]);
			$output .= "\">";
			$output .= htmlentities($menuBar["menu_name"]);
			$output .= "</a>";
			
			if($menuBar_array["id"] == $menuBar["id"] || $page_array["menuBar_id"] == $menuBar["id"]) {
				$page_set = find_page_for_menuBar_m8($menuBar["id"]);
				$output .= "<ul class=\"page\">";
				while($page = mysqli_fetch_assoc($page_set)) {
					$output .= "<li";
					if ($page_array && $page["id"] == $page_array["id"]) {
						$output .= " id=\"selected\""; //i changed class to id on this line so selected links will highilghtj
					}
					$output .= ">";
					$output .= "<a href=\"index.php?page=";
					$output .= urlencode($page["id"]);
					$output .= "\">";
					$output .= htmlentities($page["menu_name"]);
					$output .= "</a></li><br />";
				}
				$output .= "</ul>";
				mysqli_free_result($page_set);
			}
			$output .= "</li>"; // end of menubar link
		}
		mysqli_free_result($menuBar_set);
		$output .= "</ul>";
		return $output;	}
	
function navigation_admin($menuBar_array, $page_array) {
		$output = "<ul class=\"menuBar\">";
		$menuBar_set = find_menuBar_admin();
		while($menuBar = mysqli_fetch_assoc($menuBar_set)) {
			$output .= "<li";
			if ($menuBar_array && $menuBar["id"] == $menuBar_array["id"]) {
				$output .= " class=\"selected\"";
			}
			$output .= ">";
			$output .= "<a href=\"index.php?menuBar=";
			$output .= urlencode($menuBar["id"]);
			$output .= "\">";
			$output .= htmlentities($menuBar["menu_name"]);
			$output .= "</a>";
			
			if($menuBar_array["id"] == $menuBar["id"] || $page_array["menuBar_id"] == $menuBar["id"]) {
				$page_set = find_page_for_menuBar_admin($menuBar["id"]);
				$output .= "<ul class=\"page\">";
				while($page = mysqli_fetch_assoc($page_set)) {
					$output .= "<li";
					if ($page_array && $page["id"] == $page_array["id"]) {
						$output .= " id=\"selected\""; //i changed class to id on this line so selected links will highilghtj
					}
					$output .= ">";
					$output .= "<a href=\"index.php?page=";
					$output .= urlencode($page["id"]);
					$output .= "\">";
					$output .= htmlentities($page["menu_name"]);
					$output .= "</a></li><br />";
				}
				$output .= "</ul>";
				mysqli_free_result($page_set);
			}
			$output .= "</li>"; // end of menubar link
		}
		mysqli_free_result($menuBar_set);
		$output .= "</ul>";
		return $output;	}

	function password_encrypt($password){
		$hash_format = "$2y$10$";
		$salt_length = 22;
		$salt = generate_salt($salt_length);
		$format_and_salt = $hash_format . $salt;
		$hash = crypt($password, $format_and_salt);
		return $hash;
	}
	
	function generate_salt($length){
		 // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));
	  
		// Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);
	  
		// But not '+' which is valid in base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);
	  
		// Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);
	  
		return $salt;	
	}
	
	function password_check($password, $existing_hash) {
	// existing hash contains format and salt at start	
		$hash = crypt($password, $existing_hash);
		if ($hash === $existing_hash) {
			return true;
		} else {
			return false;
		}
	}
	
	function attempt_login_student($username, $password) {
		$student = find_student_by_username($username);
		if ($student) {
			// found student, now check password
			if (password_check($password, $student["hashed_password"])) {
				// password matches
				return $student;
			} else {
				//password doesn't match
				return false;
			}	
		} else {
			//student not found
			return false;
		}
	} //DELETE ??? MAYBE	
	
	function attempt_login_student_m6($username, $password) {
		$student_m6 = find_student_by_username_m6($username);
		if ($student_m6) {
			// found student, now check password
			if (password_check($password, $student_m6["hashed_password"])) {
				// password matches
				return $student_m6;
			} else {
				//password doesn't match
				return false;
			}	
		} else {
			//student not found
			return false;
		}
	}
	
	function attempt_login_student_m8($username, $password) {
		$student_m8 = find_student_by_username_m8($username);
		if ($student_m8) {
			// found student, now check password
			if (password_check($password, $student_m8["hashed_password"])) {
				// password matches
				return $student_m8;
			} else {
				//password doesn't match
				return false;
			}	
		} else {
			//student not found
			return false;
		}
	}
	
	function attempt_login_admin($username, $password) {
		$admin = find_admin_by_username_admin($username);
		if ($admin) {
			// found admin, now check password
			if (password_check($password, $admin["hashed_password"])) {
				// password matches
				return $admin;
			} else {
				//password doesn't match
				return false;
			}	
		} else {
			//admin not found
			return false;
		}
	}


	function logged_in_student_m6() {
		return isset($_SESSION['student_id_m6']); //MAKE THIS M6 id's
	}
	
	function logged_in_student_m8() {
		return isset($_SESSION['student_id_m8']); //MAKE THIS M8 id's
	}
	
	function logged_in_admin() {
		return isset($_SESSION['admin_id']);
	}	

	function confirm_logged_in() {
		if (logged_in_student_m6()) {
		}elseif (logged_in_student_m8()){
		}elseif (logged_in_admin()){
		} else {
				// DISPLAY THIS MENUBAR IF NOT LOGGED IN
				redirect_to("../public/index.php?menuBar=1");
		}
	}

	function confirm_login_and_set_menubar($current_menuBar, $current_page) {
		if (logged_in_student_m6()) {
			//DISPLAY THIS MENUBAR IF LOGGED IN AS M6
			echo navigation_m6($current_menuBar, $current_page);
		}elseif (logged_in_student_m8()){
			//DISPLAY THIS MENUBAR IF LOGGED IN AS M8
			echo navigation_m8($current_menuBar, $current_page);
		}elseif (logged_in_admin()){
			//DISPLAY THIS MENUBAR IF LOGGED IN AS ADMIN
			echo navigation_admin($current_menuBar, $current_page);
		} else {
			// DISPLAY THIS MENUBAR IF NOT LOGGED IN
				echo navigation_public($current_menuBar, $current_page);
		}
	}
	

	function confirm_logged_in_student_m6(){
		if (!logged_in_student_m6()) {
		redirect_to("../public/index.php?menuBar=1");
	}
	}
	
	function confirm_logged_in_student_m8(){
		if (!logged_in_student_m8()) {
		redirect_to("../public/index.php?menuBar=1");
	}
	}
	
	function confirm_logged_in_admin(){
		if (!logged_in_admin()) {
		redirect_to("../public/index.php?menuBar=1");
	}
	}
	
?>
<?php

function find_assType($title){
	global $connection;
		$safe_title = mysqli_real_escape_string($connection, $title);
		$query  = "SELECT * ";
		$query .= "FROM files50 ";
		$query .= "WHERE title = '{$safe_title}' ";
		$query .= "LIMIT 1";
		$assType_set = mysqli_query($connection, $query);
		confirm_query($assType_set);
		if($assType = mysqli_fetch_assoc($assType_set)) {
			return $assType["assType"];		
		} else {
			return null;
		}

}
?>
<?php
function classFiles($gradeLevel, $username){
	global $connection;
  	// 2 perform the query
  	$query  = "SELECT * ";
	$query .= "FROM files50 ";
	$query .= "WHERE gradeLevel = '$gradeLevel ' ";
	$query .= "ORDER BY title ASC";
  	$response = mysqli_query($connection, $query);
  	if (!$response){
		die("Database query failed.");
	} else {
while ($row = mysqli_fetch_assoc($response)){





$find_student_period = find_student_period($username);	
$currentDate = date('Y-m-d G:i');
$currentTime = time();
$releaseTime = $row['releaseDate'] . " " . $row['releaseTime'];
$releaseTime = strtotime ("$releaseTime");
//$exactReleaseTime = $releaseTime;

if ($find_student_period === "1"){
	$firstPeriodReleaseDate = $row['releaseDate'] . " " . '08:25';
	$firstPeriod = strtotime ("$firstPeriodReleaseDate");
	$currentPeriodReleaseDate = $firstPeriodReleaseDate;
	$classPeriod = $firstPeriod;
} elseif ($find_student_period === "2"){
	$secondPeriodReleaseDate = $row['releaseDate'] . " " . '09:21';
	$secondPeriod = strtotime ("$secondPeriodReleaseDate");
	$currentPeriodReleaseDate = $firstPeriodReleaseDate;
	$currentPeriodReleaseDate = $secondPeriodReleaseDate;
	$classPeriod = $secondPeriod;
} elseif ($find_student_period === "3"){
	$thirdPeriodReleaseDate = $row['releaseDate'] . " " . '10:17';
	$thirdPeriod = strtotime ("$thirdPeriodReleaseDate");
	$currentPeriodReleaseDate = $thirdPeriodReleaseDate;
	$classPeriod = $thirdPeriod;
} elseif ($find_student_period === "4"){
	$fourthPeriodReleaseDate = $row['releaseDate'] . " " . '11:48';
	$fourthPeriod = strtotime ("$fourthPeriodReleaseDate");
	$currentPeriodReleaseDate = $fourthPeriodReleaseDate;
	$classPeriod = $fourthPeriod;
} elseif ($find_student_period === "5"){
	$fifthPeriodReleaseDate = $row['releaseDate'] . " " . '12:44';
	$fifthPeriod = strtotime ("$fifthPeriodReleaseDate");
	$currentPeriodReleaseDate = $fifthPeriodReleaseDate;
	$classPeriod = $fifthPeriod;
} elseif ($find_student_period === "6"){
	$sixthPeriodReleaseDate = $row['releaseDate'] . " " . '13:40';
	$sixthPeriod = strtotime ("$sixthPeriodReleaseDate");
	$currentPeriodReleaseDate = $sixthPeriodReleaseDate;
	$classPeriod = $sixthPeriod;
} elseif ($find_student_period === "7"){
	$seventhPeriodReleaseDate = $row['releaseDate'] . " " . '14:36';
	$seventhPeriod = strtotime ("$seventhPeriodReleaseDate");
	$currentPeriodReleaseDate = $seventhPeriodReleaseDate;
	$classPeriod = $seventhPeriod;
} elseif ($find_student_period === "8"){
	$eighthPeriodReleaseDate = $row['releaseDate'] . " " . '15:35';
	$eighthPeriod = strtotime ("$eighthPeriodReleaseDate");
	$currentPeriodReleaseDate = $eighthPeriodReleaseDate;
	$classPeriod = $eighthPeriod;
} elseif ($find_student_period === "0"){
	$zeroPeriodReleaseDate = $row['releaseDate'] . " " . '05:15';
	$zeroPeriod = strtotime ("$zeroPeriodReleaseDate");
	$currentPeriodReleaseDate = $zeroPeriodReleaseDate;
	$classPeriod = $zeroPeriod;
} elseif ($find_student_period === "31"){
	$thirtyFirstPeriodReleaseDate = $row['releaseDate'] . " " . '06:15';
	$thirtyFirstPeriod = strtotime ("$thirtyFirstPeriodReleaseDate");
	$currentPeriodReleaseDate = $thirtyFirstPeriodReleaseDate;
	$classPeriod = $thirtyFirstPeriod;
}


if ($row['releaseTime'] === "00:00:00"){
if(
(($find_student_period === "1") && ("$currentTime" < $firstPeriod))
|| (($find_student_period === "2") &&("$currentTime" < $secondPeriod))
|| (($find_student_period === "3") &&("$currentTime" < $thirdPeriod))
|| (($find_student_period === "4") &&("$currentTime" < $fourthPeriod))
|| (($find_student_period === "5") &&("$currentTime" < $fifthPeriod))
|| (($find_student_period === "6") &&("$currentTime" < $sixthPeriod))
|| (($find_student_period === "7") &&("$currentTime" < $seventhPeriod))
|| (($find_student_period === "8") &&("$currentTime" < $eighthPeriod))
|| (($find_student_period === "0") &&("$currentTime" < $zeroPeriod))
|| (($find_student_period === "31") &&("$currentTime" < $thirtyFirstPeriod))
){ 

$timeDifference = $classPeriod - time(); // change $firstPeriod to variable
$days =(int) ($timeDifference/86400) ;
$hours =(int) ($timeDifference%86400/3600) ;
$minutes =(int) ($timeDifference%3600/60) ;
$seconds =(int) ($timeDifference% 60) ;	

//echo "<br/>Period: $find_student_period";
//echo "<br/><br/>";
//echo "date: " . $currentDate;
//echo "<br/><br/>";
//echo "time: " . $time;
//echo $row['title'];
//echo "<br/>";
//echo "release time: " . $releaseTime;
//echo "<br/>";
//echo "current time:" . $currentTime;
//echo "<br/>";
//echo "current date:" . $currentDate;
//echo "<br/>";
//echo "class period:" . $classPeriod;
//echo "<br/>";
//echo "period " . $find_student_period . " release date:" . $currentPeriodReleaseDate; //change $firstPeriodReleaseDate to variable
//echo "<br/>";
//echo "release date:" . $row['releaseDate'];
//echo "<br/>";
//echo "current time:" . $currentTime;
//echo "<br/>";
//echo "first period:" . $firstPeriod;
//echo "<br/>";
//echo "time difference:" . $timeDifference;
//echo "<br/>";
//echo "Countdown: " . $days . "d " . " : " . $hours . "hr " . " : " . $minutes . "<style='color:red'>" . "min " . " : " . $seconds . "s";
//echo "<br/>";
//echo "<br/>";

}else{
		if($row['gradeLevel'] === "$gradeLevel") { ?>		
	<?php	if (!isset($_POST['chapter'])) { ?>
			<form action="../private/formAssignments.php" target= "_blank" method="post">
				<p><a href="../private/uploadFiles/<?php echo $row['assType']; ?>
				<?php echo "_" ?>
				<?php echo $row['gradeLevel']; ?>
				<?php echo "_" ?>
				<?php echo "ch" ?>
				<?php echo $row['chapter']; ?>
				<?php echo $row['rankOrder']; ?>
				<?php echo $row['keyTypeReview']; ?>
				<?php echo $row['keyTypeAnswers']; ?>
				<?php echo "." ?>
				<?php echo $row['docType']; ?> " target= "_blank" >
				<?php echo $row['title']; ?>
				</a>
				<?php if($row['keyTypeAnswers'] !== "_key") { ?>
				 <input id="formFiles" type="submit" name="title" value="<?php echo $row['title']; ?>" />				
				 <?php } ?>
				 </p>
			 </form>
			
	<?php } elseif ($_POST['chapter'] === all){ ?>
				<form action="../private/formAssignments.php" target= "_blank" method="post">
					<p><a href="../private/uploadFiles/<?php echo $row['assType']; ?>
					<?php echo "_" ?>
					<?php echo $row['gradeLevel']; ?>
					<?php echo "_" ?>
					<?php echo "ch" ?>
					<?php echo $row['chapter']; ?>
					<?php echo $row['rankOrder']; ?>
					<?php echo $row['keyTypeReview']; ?>
					<?php echo $row['keyTypeAnswers']; ?>
					<?php echo "." ?>
					<?php echo $row['docType']; ?> " target= "_blank">
					<?php echo $row['title']; ?>
					</a>
					<?php if($row['keyTypeAnswers'] !== "_key") { ?>
					<input id="formFiles" type="submit" name="title" value="<?php echo $row['title']; ?>" />
					<?php } ?>
					</p>
				</form>
				
		<?php } elseif ($_POST['chapter'] === $row['assType']){ ?>
				<form action="../private/formAssignments.php" target= "_blank" method="post">
					<p><a href="../private/uploadFiles/<?php echo $row['assType']; ?>
					<?php echo "_" ?>
					<?php echo $row['gradeLevel']; ?>
					<?php echo "_" ?>
					<?php echo "ch" ?>
					<?php echo $row['chapter']; ?>
					<?php echo $row['rankOrder']; ?>
					<?php echo $row['keyTypeReview']; ?>
					<?php echo $row['keyTypeAnswers']; ?>
					<?php echo "." ?>
					<?php echo $row['docType']; ?> " target= "_blank">
					<?php echo $row['title']; ?>
					</a>
					<?php if($row['keyTypeAnswers'] !== "_key") { ?>
					<input id="formFiles" type="submit" name="title" value="<?php echo $row['title']; ?>" />
					<?php } ?>
					</p>
				</form>
				
	<?php } elseif (($_POST['chapter'] === "test" . " " . "reviews") && ($row['keyTypeReview'] === "_testReview")){ ?>
				<form action="../private/formAssignments.php" target= "_blank" method="post">
					<p><a href="../private/uploadFiles/<?php echo $row['assType']; ?>
					<?php echo "_" ?>
					<?php echo $row['gradeLevel']; ?>
					<?php echo "_" ?>
					<?php echo "ch" ?>
					<?php echo $row['chapter']; ?>
					<?php echo $row['rankOrder']; ?>
					<?php echo $row['keyTypeReview']; ?>
					<?php echo $row['keyTypeAnswers']; ?>
					<?php echo "." ?>
					<?php echo $row['docType']; ?> " target= "_blank">
					<?php echo $row['title']; ?>
					</a>
					<?php if($row['keyTypeAnswers'] !== "_key") { ?>
					<input id="formFiles" type="submit" name="title" value="<?php echo $row['title']; ?>" />
					<?php } ?>
					</p>
				</form>
				
		<?php } elseif (($_POST['chapter'] === "tests") && ($row['assType'] === "test") && ($row['keyTypeReview'] !== "_testReview")){ ?>
				<form action="../private/formAssignments.php" target= "_blank" method="post">
					<p><a href="../private/uploadFiles/<?php echo $row['assType']; ?>
					<?php echo "_" ?>
					<?php echo $row['gradeLevel']; ?>
					<?php echo "_" ?>
					<?php echo "ch" ?>
					<?php echo $row['chapter']; ?>
					<?php echo $row['rankOrder']; ?>
					<?php echo $row['keyTypeReview']; ?>
					<?php echo $row['keyTypeAnswers']; ?>
					<?php echo "." ?>
					<?php echo $row['docType']; ?> " target= "_blank">
					<?php echo $row['title']; ?>
					</a>
					<?php if($row['keyTypeAnswers'] !== "_key") { ?>
					<input id="formFiles" type="submit" name="title" value="<?php echo $row['title']; ?>" />
					<?php } ?>
					</p>
				</form>
					
	<?php } elseif ($row['chapter'] == $_POST['chapter']) { ?>
				<form action="../private/formAssignments.php" target= "_blank" method="post">
					<p><a href="../private/uploadFiles/<?php echo $row['assType']; ?>
					<?php echo "_" ?>
					<?php echo $row['gradeLevel']; ?>
					<?php echo "_" ?>
					<?php echo "ch" ?>
					<?php echo $row['chapter']; ?>
					<?php echo $row['rankOrder']; ?>
					<?php echo $row['keyTypeReview']; ?>
					<?php echo $row['keyTypeAnswers']; ?>
					<?php echo "." ?>
					<?php echo $row['docType']; ?> " target= "_blank" >
					<?php echo $row['title']; ?>
					</a>
					<?php if($row['keyTypeAnswers'] !== "_key") { ?>
					<input id="formFiles" type="submit" name="title" value="<?php echo $row['title']; ?>" />
					<?php } ?>
					</p>
				</form>
					
				<?php } ?>
				<?php } ?>
				<?php } ?>


<?php
	
}elseif(($row['releaseTime'] > "00:00:00") && ($currentTime < $releaseTime)) {
if(
(($find_student_period === "1") && ("$currentDate" < $releaseTime))
|| (($find_student_period === "2") &&("$currentDate" < $releaseTime))
|| (($find_student_period === "3") &&("$currentDate" < $releaseTime))
|| (($find_student_period === "4") &&("$currentDate" < $releaseTime))
|| (($find_student_period === "5") &&("$currentDate" < $releaseTime))
|| (($find_student_period === "6") &&("$currentDate" < $releaseTime))
|| (($find_student_period === "7") &&("$currentDate" < $releaseTime))
|| (($find_student_period === "8") &&("$currentDate" < $releaseTime))
|| (($find_student_period === "0") &&("$currentDate" < $releaseTime))
|| (($find_student_period === "31") &&("$currentDate" < $releaseTime))
){ 

$timeDifference = $releaseTime - time(); // change $firstPeriod to variable
$days =(int) ($timeDifference/86400) ;
$hours =(int) ($timeDifference%86400/3600) ;
$minutes =(int) ($timeDifference%3600/60) ;
$seconds =(int) ($timeDifference% 60) ;	

//echo "<br/>Period: $find_student_period";
//echo "<br/><br/>";	
//echo $row['title'];
//echo "<br/>";
//echo "release time: " . $releaseTime;
//echo "<br/>";
//echo "current time:" . $currentTime;
//echo "<br/>";
//echo "current date:" . $currentDate;
//echo "<br/>";
//echo "period " . $find_student_period . " release date:" . $currentPeriodReleaseDate; //change $firstPeriodReleaseDate to variable
//echo "<br/>";
//echo "release date:" . $row['releaseDate'];
//echo "<br/>";
//echo "current time:" . $currentTime;
//echo "<br/>";
//echo "first period:" . $firstPeriod;
//echo "<br/>";
//echo "time difference:" . $timeDifference;
//echo "<br/>";
//echo "Countdown: " . $days . "d " . " : " . $hours . "hr " . " : " . $minutes . "<style='color:red'>" . "min " . " : " . $seconds . "s";
//echo "<br/>";
//echo "<br/>";	
	
}
}else{
	if($row['gradeLevel'] === "$gradeLevel") { ?>		
	<?php	if (!isset($_POST['chapter'])) { ?>
			<form action="../private/formAssignments.php" target= "_blank" method="post">
				<p><a href="../private/uploadFiles/<?php echo $row['assType']; ?>
				<?php echo "_" ?>
				<?php echo $row['gradeLevel']; ?>
				<?php echo "_" ?>
				<?php echo "ch" ?>
				<?php echo $row['chapter']; ?>
				<?php echo $row['rankOrder']; ?>
				<?php echo $row['keyTypeReview']; ?>
				<?php echo $row['keyTypeAnswers']; ?>
				<?php echo "." ?>
				<?php echo $row['docType']; ?> " target= "_blank" >
				<?php echo $row['title']; ?>
				</a>
				<?php if($row['keyTypeAnswers'] !== "_key") { ?>
				 <input id="formFiles" type="submit" name="title" value="<?php echo $row['title']; ?>" />				
				 <?php } ?>
				 </p>
			 </form>
			
	<?php } elseif ($_POST['chapter'] === all){ ?>
				<form action="../private/formAssignments.php" target= "_blank" method="post">
					<p><a href="../private/uploadFiles/<?php echo $row['assType']; ?>
					<?php echo "_" ?>
					<?php echo $row['gradeLevel']; ?>
					<?php echo "_" ?>
					<?php echo "ch" ?>
					<?php echo $row['chapter']; ?>
					<?php echo $row['rankOrder']; ?>
					<?php echo $row['keyTypeReview']; ?>
					<?php echo $row['keyTypeAnswers']; ?>
					<?php echo "." ?>
					<?php echo $row['docType']; ?> " target= "_blank">
					<?php echo $row['title']; ?>
					</a>
					<?php if($row['keyTypeAnswers'] !== "_key") { ?>
					<input id="formFiles" type="submit" name="title" value="<?php echo $row['title']; ?>" />
					<?php } ?>
					</p>
				</form>
				
		<?php } elseif ($_POST['chapter'] === $row['assType']){ ?>
				<form action="../private/formAssignments.php" target= "_blank" method="post">
					<p><a href="../private/uploadFiles/<?php echo $row['assType']; ?>
					<?php echo "_" ?>
					<?php echo $row['gradeLevel']; ?>
					<?php echo "_" ?>
					<?php echo "ch" ?>
					<?php echo $row['chapter']; ?>
					<?php echo $row['rankOrder']; ?>
					<?php echo $row['keyTypeReview']; ?>
					<?php echo $row['keyTypeAnswers']; ?>
					<?php echo "." ?>
					<?php echo $row['docType']; ?> " target= "_blank">
					<?php echo $row['title']; ?>
					</a>
					<?php if($row['keyTypeAnswers'] !== "_key") { ?>
					<input id="formFiles" type="submit" name="title" value="<?php echo $row['title']; ?>" />
					<?php } ?>
					</p>
				</form>
				
	<?php } elseif (($_POST['chapter'] === "test" . " " . "reviews") && ($row['keyTypeReview'] === "_testReview")){ ?>
				<form action="../private/formAssignments.php" target= "_blank" method="post">
					<p><a href="../private/uploadFiles/<?php echo $row['assType']; ?>
					<?php echo "_" ?>
					<?php echo $row['gradeLevel']; ?>
					<?php echo "_" ?>
					<?php echo "ch" ?>
					<?php echo $row['chapter']; ?>
					<?php echo $row['rankOrder']; ?>
					<?php echo $row['keyTypeReview']; ?>
					<?php echo $row['keyTypeAnswers']; ?>
					<?php echo "." ?>
					<?php echo $row['docType']; ?> " target= "_blank">
					<?php echo $row['title']; ?>
					</a>
					<?php if($row['keyTypeAnswers'] !== "_key") { ?>
					<input id="formFiles" type="submit" name="title" value="<?php echo $row['title']; ?>" />
					<?php } ?>
					</p>
				</form>
				
		<?php } elseif (($_POST['chapter'] === "tests") && ($row['assType'] === "test") && ($row['keyTypeReview'] !== "_testReview")){ ?>
				<form action="../private/formAssignments.php" target= "_blank" method="post">
					<p><a href="../private/uploadFiles/<?php echo $row['assType']; ?>
					<?php echo "_" ?>
					<?php echo $row['gradeLevel']; ?>
					<?php echo "_" ?>
					<?php echo "ch" ?>
					<?php echo $row['chapter']; ?>
					<?php echo $row['rankOrder']; ?>
					<?php echo $row['keyTypeReview']; ?>
					<?php echo $row['keyTypeAnswers']; ?>
					<?php echo "." ?>
					<?php echo $row['docType']; ?> " target= "_blank">
					<?php echo $row['title']; ?>
					</a>
					<?php if($row['keyTypeAnswers'] !== "_key") { ?>
					<input id="formFiles" type="submit" name="title" value="<?php echo $row['title']; ?>" />
					<?php } ?>
					</p>
				</form>
					
	<?php } elseif ($row['chapter'] == $_POST['chapter']) { ?>
				<form action="../private/formAssignments.php" target= "_blank" method="post">
					<p><a href="../private/uploadFiles/<?php echo $row['assType']; ?>
					<?php echo "_" ?>
					<?php echo $row['gradeLevel']; ?>
					<?php echo "_" ?>
					<?php echo "ch" ?>
					<?php echo $row['chapter']; ?>
					<?php echo $row['rankOrder']; ?>
					<?php echo $row['keyTypeReview']; ?>
					<?php echo $row['keyTypeAnswers']; ?>
					<?php echo "." ?>
					<?php echo $row['docType']; ?> " target= "_blank" >
					<?php echo $row['title']; ?>
					</a>
					<?php if($row['keyTypeAnswers'] !== "_key") { ?>
					<input id="formFiles" type="submit" name="title" value="<?php echo $row['title']; ?>" />
					<?php } ?>
					</p>
				</form>
					
				<?php } ?>
				<?php } ?>
				<?php } ?>
	<?php } // end of whileloop ?>
	<?php } // end of if loop ?>
<?php } // end of function  ?>
<?php 

function formAssignments($title, $find_student_id, $previousAttempt, $gradeLevel){
	global $connection;
	// 2 perform the query
	$query  = "SELECT * ";
	$query .= "FROM files50 ";
	$query .= "WHERE title = '$title ' ";
	$query .= "AND gradeLevel = '$gradeLevel ' ";
	$query .= "ORDER BY title ASC";
	$response = mysqli_query($connection, $query);
		if (!$response){
		die("Database query failed.");
		}
		while ($row = mysqli_fetch_assoc($response)) {
		echo "<h3>" . $row["title"] . "<br /></h3"; ?>
	<?php for ($columnNumber = 1; $columnNumber <= 150; $columnNumber++) { ?>
	<?php if ($row["Q" . "$columnNumber"] === "fr") { ?>
		<p>
	<?php echo $columnNumber ;?>)
	<?php echo $row["prefix" . "$columnNumber"] ?>
		<input type="hidden" style="border-radius: 20px;" name="Q<?php echo "$columnNumber"; ?>" value="Q<?php echo "$columnNumber"; ?>" readonly/>
		<input type="" style="border-radius: 20px;" name="response<?php echo "$columnNumber"; ?>" 
			value="<?php if (empty($_POST["submit"])) {
			echo htmlspecialchars(find_correct_responses_previous_attempt($title, $find_student_id, $gradeLevel, $previousAttempt, $columnNumber));
			} else {
			echo htmlspecialchars($_POST["response{$columnNumber}"]) ;
			} ?>" />	
	<?php echo $row["units" . "$columnNumber"] ?>
		<sup><?php echo $row["super" . "$columnNumber"] ?></sup>
		<sub><?php echo $row["sub" . "$columnNumber"] ?></sub>
		</p>
	<?php } elseif ($row["Q" . "$columnNumber"] === "mc") { ?>
		<p>
		<label for="colorCL" value=""><?php echo $columnNumber ;?>) </label>
		<input type="hidden" style="border-radius: 20px;" name="Q<?php echo "$columnNumber"; ?>" value="Q<?php echo "$columnNumber"; ?>" readonly/>
		<select name="response<?php echo "$columnNumber" ?>" value="" id="chapterMenu" type="submit">
		<?php if(isset($_POST['submit'])){?>
			<option  seleceted value="<?php echo htmlspecialchars($_POST["response{$columnNumber}"]) ; ?>"><?php echo htmlspecialchars($_POST["response{$columnNumber}"]) ; ?></option>
			<?php }else{ ?>
			<option seleceted value="<?php echo htmlspecialchars(find_correct_responses_previous_attempt($title, $find_student_id, $gradeLevel, $previousAttempt, $columnNumber)); ?>"><?php echo htmlspecialchars(find_correct_responses_previous_attempt($title, $find_student_id, $gradeLevel, $previousAttempt, $columnNumber)); ?></option>
		<?php } ?>
		<option value="a">a</option>
		<option value="b">b</option>
		<option value="c">c</option>
		<option value="d">d</option>
		<option value="idk">IDK</option>
		</select>
	<?php echo $row["units" . "$columnNumber"] ?>
		<sup><?php echo $row["super" . "$columnNumber"] ?></sup>
		<sub><?php echo $row["sub" . "$columnNumber"] ?></sub>
		</p>
	<?php } ?>
	<?php } ?>		
	<?php } ?>	      	
<?php }	// end of function  ?>
<?php 
function personalStats(){
	redirect_to("personalStatsStudents.php");
	} 
?>
<?php
  	function current_attempt_value($title, $find_student_id, $gradeLevel, $attempt){
    	global $connection;
			$query  = "SELECT * ";
			$query .= "FROM studentStats ";
			$query .= "WHERE title = '{$title}' ";
			$query .= "AND student_id = '{$find_student_id}' ";
			$query .= "AND gradeLevel = '$gradeLevel ' ";
			$query .= "ORDER BY title ASC";
			$attemptValue = mysqli_query($connection, $query);
			if (!$attemptValue){
				die("db failure.");
			}
			
		
				
				
			if (!$query = mysqli_fetch_assoc($attemptValue)){
				$attempt++;
				$currentAttempt = $attempt;
			} else {
				$attempt++;
				$currentAttempt = $attempt+1;
			}	
			while ($query = mysqli_fetch_assoc($attemptValue)){
				$attempt++;
				$currentAttempt = $attempt+1;
			}	
			return $currentAttempt;
		}
		
		
function find_and_grade_student_responses(){
		global $connection;
			$query  = "SELECT * ";
			$query .= "FROM studentStats ";
			$query .= "ORDER BY filename ASC";
			$file_set = mysqli_query($connection, $query);
			confirm_query($file_set);
			return $file_set;
	}


function find_correct_responses_previous_attempt($title, $find_student_id, $gradeLevel, $previousAttempt, $columnNumber){
	
	global $connection;
		$query  = "SELECT * ";
		$query .= "FROM studentStats ";
		$query .= "WHERE title = '$title ' ";
		$query .= "AND student_id = '{$find_student_id}' ";
		$query .= "AND gradeLevel = '$gradeLevel ' ";
		$query .= "AND attempt = '{$previousAttempt} ' ";
		$query .= "ORDER BY title ASC";
		$correctResponse = mysqli_query($connection, $query);
		if (!$correctResponse){
			die("db failure.");
		}
		while ($row = mysqli_fetch_assoc($correctResponse)) {

			
			if ($row["result" . "$columnNumber"] == 1) {
				echo $row["response" . "$columnNumber"];
			} else {
				//echo "function else";
			}
		}
	}

?>